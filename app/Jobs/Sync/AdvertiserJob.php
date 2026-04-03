<?php

namespace App\Jobs\Sync;

use App\Helper\Static\Methods;
use App\Models\Advertiser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class AdvertiserJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $source, $page, $data, $jobID, $isStatusChange;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->jobID = $data['job_id'];
        $this->isStatusChange = $data['is_status_change'];
        unset($data['job_id']);
        unset($data['is_status_change']);
        $this->source = $data['source'];
        $this->page = $data['page'];
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {

            $url = env("APP_SERVER_API_URL");
            $response = Http::get("{$url}api/sync-advertisers?source={$this->source}&page={$this->page}");
            if($response->ok())
            {
                $advertisers = $response->json();
                foreach ($advertisers['data'] as $advertiser)
                {
                    $data = Advertiser::where("advertiser_id", $advertiser['advertiser_id'])->where('source', $advertiser['source'])->first();
                    $advertiser['api_advertiser_id'] = $advertiser['id'];

                    if(isset($data->id))
                    {
                       
                        if($data->commission == null || $data->commission == 0){
                            $data->commission = $advertiser['commission'];
                        $data->commission_type = $advertiser['commission_type'];
                        }else{
                             $advertiser['commission'] =  $data->commission;
                             $advertiser['commission_type'] = $data->commission_type;
                        }
                        
                        if($data->fetch_logo_url == '' || $data->fetch_logo_url == null){
                            $data->fetch_logo_url = $advertiser['fetch_logo_url'];
                        }else{
                            $advertiser['fetch_logo_url'] = $data->fetch_logo_url;
                        }
                        
                         if($data->logo == '' || $data->logo == null){
                            $data->logo = $advertiser['logo'];
                        }else{
                            $advertiser['logo'] = $data->logo;
                        }
                        
                        if($data->description == '' || $data->description == null){
                            $data->description = $advertiser['description'];
                        }else{
                            $advertiser['description'] = $data->description;
                        }
                        $advertiser['status'] = 1;
                        unset($advertiser['sid']);
                        unset($advertiser['logo']);
                        if($advertiser['source'] == 'City Ad' || $advertiser['source'] == 'Rakuten' || $advertiser['source'] == 'TakeAds' ||  $advertiser['source'] == 'Takeads'){
                            $advertiser['is_active'] = 0;
                            $advertiser['is_available'] = 0;
                            $advertiser['status'] = 0;
                        }else{
                         $data->is_active = $advertiser['is_available'];
                         $data->is_available =  $advertiser['is_available'];
                         $advertiser['is_active'] = $advertiser['is_available'];
                         $advertiser['status'] = $data->status;
                        }
                        $data->update($advertiser);
                    }
                    else
                    {
                        $advertiser['status'] = 1;
                        if($advertiser['source'] == 'City Ad' || $advertiser['source'] == 'Rakuten' || $advertiser['source'] == 'TakeAds' ||  $advertiser['source'] == 'Takeads' ){
                            $advertiser['is_active'] = 0;
                            $advertiser['is_available'] = 0;
                            $advertiser['status'] = 0;
                        }else{
                            $advertiser['is_active'] = $advertiser['is_available'];
                            $advertiser['status'] = $advertiser['is_available'];
                        }
                       
                        Advertiser::create($advertiser);
                    }
                }
            }

            Methods::tryBodyFetchDaily($this->jobID, $this->isStatusChange);

        } catch (\Throwable $exception) {

            Methods::catchBodyFetchDaily("SYNC ADVERTISER JOB", $exception, $this->jobID);

        }
    }
}
