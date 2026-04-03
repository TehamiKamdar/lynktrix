<?php

namespace App\Http\Controllers;

use App\Helper\Static\Vars;
use App\Models\Setting;
use App\Models\TrackingClick;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ClicksManualController extends Controller
{
    public function index()
    {
        $this->processTrackingData("deeplink_tracking_details", "deeplink");
    }

    protected function processTrackingData($detailTable, $linkType)
    {
        // Check if there are any new records to process
        $count = DB::table($detailTable)
            ->select('id')
            ->where('is_deleted', 0)
            ->where('is_new', 1)
            ->take(3)
            ->count();

        if ($count === 0) {
            return false; // No new records to process
        }

//        Setting::where("key", "is_processing_tracking_deeplinks")->update([
//            'value' => true
//        ]);

        $limit = Vars::LIMIT_200;

        DB::beginTransaction();
        try {
            // Fetch records in one batch
            $records = DB::table($detailTable)
                ->select(
                    'publisher_id',
                    'advertiser_id',
                    'website_id',
                    'id',
                    'created_at',
                    DB::raw('DATE(created_at) as date'),
                    DB::raw('COUNT(*) as total_clicks')
                )
                ->where('is_deleted', 0)
                ->where('is_new', 1)
                ->groupBy('publisher_id', 'website_id', 'advertiser_id', 'date')
                ->orderBy('date', 'DESC')
                ->limit($limit)
                ->get();

            $updateRecords = [];
            foreach ($records as $data) {

                // Use caching for repetitive operations
                $parsedDate = Carbon::parse($data->date);
                $year = $parsedDate->format('Y');

                // Use firstOrNew to handle updates or inserts
                $trackingClick = TrackingClick::firstOrNew([
                    'publisher_id' => $data->publisher_id,
                    'advertiser_id' => $data->advertiser_id,
                    'website_id' => $data->website_id,
                    'date' => $data->date,
                    'link_type' => $linkType
                ]);

                $trackingClick->link_id = $data->id;
                $trackingClick->created_year = $year;
                $trackingClick->total_clicks = ($trackingClick->total_clicks ?? 0) + $data->total_clicks;
                $trackingClick->save();

                // Collect records for bulk update
                $updateRecords[] = [
                    'publisher_id' => $data->publisher_id,
                    'advertiser_id' => $data->advertiser_id,
                    'website_id' => $data->website_id,
                    'date' => $data->date
                ];
            }

            // Bulk update `is_new` for processed records
            foreach (array_chunk($updateRecords, $limit) as $batch) {
                $this->bulkUpdateProcessed($detailTable, $batch);
            }

            DB::commit();
            return true;

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Error processing records in {$detailTable}: {$e->getMessage()}");
            return false;
        }
    }

    protected function bulkUpdateProcessed($detailTable, array $records)
    {
        foreach ($records as $record) {
            DB::table($detailTable)
                ->where('publisher_id', $record['publisher_id'])
                ->where('advertiser_id', $record['advertiser_id'])
                ->where('website_id', $record['website_id'])
                ->whereDate('created_at', $record['date'])
                ->where('is_new', 1)
                ->update(['is_new' => 0]);
        }
    }
}
