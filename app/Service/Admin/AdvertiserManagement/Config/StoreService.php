<?php

namespace App\Service\Admin\AdvertiserManagement\Config;

use App\Http\Requests\Admin\AdvertiserConfigRequest;
use App\Models\AdvertiserConfig;

class StoreService
{

    public function init(AdvertiserConfigRequest $request)
    {
        try {

            AdvertiserConfig::create($request->validated());

            $response = [
                "type" => "success",
                "message" => "Advertiser Config Successfully Added."
            ];

        } catch (\Exception $exception) {

            $response = [
                "type" => "error",
                "message" => $exception->getMessage()
            ];

        }

        return redirect()->route('admin.settings.advertiser-configs.index')->with($response['type'], $response['message']);
    }
}
