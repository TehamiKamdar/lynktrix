<?php

namespace App\Service\Admin\AdvertiserManagement\Advertiser;

use App\Enums\WebsiteStatus;
use App\Models\Role;
use App\Models\Website;
use Illuminate\Http\Request;

class MiscService
{
    public function tabs(Request $request)
    {
        $roles = $this->getRoles();
        if(decrypt($request->tab) == "advertiser") {
            return view("template.admin.users.add.advertiser_form", compact('roles'));
        }
        else {
            return view("template.admin.users.add.publisher_form", compact('roles'));
        }
    }

    public function statusUpdate(WebsiteStatus $status, Website $website)
    {
        $response = $this->updateWebsiteStatus($website, $status);
        return redirect()->back()->with($response['type'], $response['message']);
    }
    private function updateWebsiteStatus(Website $website, $status): array
    {
        try {

            $website->update([
                'status' => $status
            ]);

            $response = [
                "type" => "success",
                "message" => "Website Status Successfully Updated."
            ];

        } catch (\Exception $exception) {

            $response = [
                "type" => "error",
                "message" => $exception->getMessage()
            ];

        }

        return $response;
    }

    private function getRoles()
    {
        return Role::all()->pluck('title', 'id');
    }
}
