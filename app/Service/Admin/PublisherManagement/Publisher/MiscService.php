<?php

namespace App\Service\Admin\PublisherManagement\Publisher;

use App\Helper\Static\Vars;
use App\Jobs\Admitad\CreateWebsite;
use App\Models\FetchDailyData;
use App\Models\Role;
use App\Models\Website;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MiscService
{
    public function tab(Request $request)
    {
        $roles = Role::all()->pluck('title', 'id');
        if(decrypt($request->tab) == "advertiser") {
            return view("template.admin.users.add.advertiser_form", compact('roles'));
        }
        else {
            return view("template.admin.users.add.publisher_form", compact('roles'));
        }
    }

    /**
     * @param Website $website
     * @param $status
     * @return RedirectResponse
     */
    public function updateWebsiteStatus(Website $website, $status): \Illuminate\Http\RedirectResponse
    {
        try {

            if($website)
            {
                $user = $website->users->first();

                $website->update([
                    'status' => $status->value
                ]);

                if($status->value == Website::ACTIVE && empty($user->active_website_id))
                {
                    $user->update([
                        'active_website_id' => $website->id
                    ]);

//                    FetchDailyData::updateOrCreate([
//                        "path" => "AdmitadCreateWebsite",
//                        "process_date" => now()->format(Vars::CUSTOM_DATE_FORMAT_3),
//                        "queue" => Vars::ADMITAD_ON_QUEUE,
//                        "source" => Vars::ADMITAD
//                    ], [
//                        "name" => "Admitad Create Website",
//                        "payload" => json_encode(['website_id' => $website->id]),
//                        "date" => now()->format(Vars::CUSTOM_DATE_FORMAT_2),
//                    ]);
//                    CreateWebsite::dispatch($website->id)->onQueue(Vars::ADMITAD_ON_QUEUE);
                }

                $response = [
                    "type" => "success",
                    "message" => "Website Status Successfully Updated."
                ];

            }

            $response = [
                "type" => "error",
                "message" => "Website Status Not Updated."
            ];


        } catch (\Exception $exception) {

            $response = [
                "type" => "error",
                "message" => $exception->getMessage()
            ];

        }

        return redirect()->back()->with($response['type'], $response['message']);
    }
}
