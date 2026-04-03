<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Helper\Static\Vars;
use App\Models\FetchDailyData;
use App\Models\Setting;
use App\Traits\Main;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use App\Models\SyncData as SyncDataModel;


class SyncTransaction extends Command
{
    use Main;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:transaction';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->syncTransactions(true);
    }

    private function onMonthSyncTransactions($source, $type)
    {
        $url = env("APP_SERVER_API_URL");
        $url = "{$url}api/sync-transactions?source={$source}";
        $start_date = now()->subDays(Vars::LIMIT_5)->format("Y-m-d");
        $end_date = now()->addDays(1)->format("Y-m-d");
        $url = "{$url}&start_date=$start_date&end_date=$end_date";
        $response = Http::timeout(200)->get($url);
        $this->makeTransactionJobs($response, $source, $type, $start_date, $end_date);
    }

    private function onCustomMonthsSyncTransactions($source, $type)
    {
        // Get the date 6 months ago from the current date
        $startDate = Carbon::now()->subMonths(9)->startOfMonth();

        // Loop through each month within the past 6 months
        for ($i = 0; $i <= 9; $i++) {
            // Calculate the starting and ending dates of the current month
            $month_start_date = $startDate->copy()->startOfMonth();
            $month_end_date = $startDate->copy()->endOfMonth();

            // Output the starting and ending dates for the current month
            $url = "https://server.linkscircle.com/";
            $url = "{$url}api/sync-transactions?source={$source}";
            $start_date = $month_start_date->toDateString();
            $end_date = $month_end_date->toDateString();
            $url = "{$url}&start_date=$start_date&end_date=$end_date";
           
            $response = Http::timeout(200)->get($url);
           
            $this->makeTransactionJobs($response, $source, $type, $start_date, $end_date);

            // Move to the next month
            $startDate->addMonth();
        }
    }

    private function makeTransactionJobs($response, $source, $type, $start_date, $end_date)
    {

        $name = $type == Vars::TRANSACTION ? "Sync {$source} Transaction Job" : "Sync {$source} Transaction Short Job";

        if($response->ok())
        {
            $get = $this->getQueueName($source);
            $queue = strtolower($get);

            $advertisers = $response->json();

            if(isset($advertisers['total']) && isset($advertisers['per_page']))
            {
                for ($no = 1; $no <= ceil($advertisers['total'] / $advertisers['per_page']); $no++)
                {
                    FetchDailyData::updateOrCreate([
                        "path" => "Sync{$get}TransactionJob",
                        "process_date" => now()->format(Vars::CUSTOM_DATE_FORMAT_3),
                        "offset" => $no,
                        "queue" => "{$queue}_trans",
                        "source" => $source,
                        "type" => $type,
                        "start_date" => $start_date,
                        "end_date" => $end_date,
                    ], [
                        "name" => $name,
                        "payload" => json_encode([
                            "source" => $source,
                            "page" => $no,
                            "start_date" => $start_date,
                            "end_date" => $end_date,
                        ]),
                        "status" => 1,
                        "is_processing" => 0,
                        "date" => now()->format(Vars::CUSTOM_DATE_FORMAT_2),
                        "sort" => $this->setSortingFetchDailyData($source)
                    ]);
                }
            }

            SyncDataModel::where("source", $source)->update([
                "is_sync" => Vars::SYNC
            ]);
        }
    }

    private function getQueueName($source)
    {
        return str_replace(" ", "", $source);
    }


    private function syncTransactions($short = false)
    {
        $type = $short ? Vars::TRANSACTION_SHORT : Vars::TRANSACTION;
        $sources = SyncDataModel::where("type", $type)->where("is_sync", Vars::NOT_SYNC)->get();
        $this->info($sources->count());
        foreach ($sources as $source)
        {
            if($short) {
                $this->onMonthSyncTransactions($source->source, $type);
            }
            else
            {
                $this->onCustomMonthsSyncTransactions($source->source, $type);
            }
        }
    }
}
