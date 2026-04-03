<?php

namespace App\Console\Commands;

use App\Models\FetchDailyData;
use App\Models\History;
use Illuminate\Console\Command;

class StuckJobCheckCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:stuck-job-check-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Stuck Job Check Command (Sync Data, Make History, etc...)';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        // Call the function for both models
        $this->resetProcessing(History::class);
        $this->resetProcessing(FetchDailyData::class);

    }

    function resetProcessing($model)
    {
        $jobCheck = $model::where('status', 1)
            ->where('is_processing', 2)
            ->where('updated_at', '<', now()->subHours(2))
            ->count();

        if ($jobCheck) {
            $model::where('status', 1)
                ->where('is_processing', 2)
                ->where('updated_at', '<', now()->subHours(2))
                ->update([
                    'is_processing' => 0,
                ]);
        }
    }

}
