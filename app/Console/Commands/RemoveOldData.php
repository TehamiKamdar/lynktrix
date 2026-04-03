<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\FetchDailyData;
use Illuminate\Support\Facades\DB;

class RemoveOldData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remove:data';

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
        $deleted = DB::table('fetch_daily_data')->where('is_processing',1)->where('status',0)
        ->where('created_at', '<', now()->subDays(30))
        ->delete();

        $deletedGenerated = DB::table('generate_links')->where('is_processing',1)->where('status',0)
        ->where('created_at', '<', now()->subDays(30))
        ->delete();

        $deletedclick = DB::table('clicks')->where('is_processing',1)->where('status',0)
        ->where('created_at', '<', now()->subDays(30))
        ->delete();
    }
}
