<?php

namespace App\Service\Admin\AdvertiserManagement\Config;

use App\Http\Requests\Admin\AdvertiserConfigRequest;
use App\Models\AdvertiserConfig;

class UpdateService
{
    public function init(AdvertiserConfigRequest $request, AdvertiserConfig $advertiserConfig)
    {
        try {

            $advertiserConfig->update($request->validated());

            $response = [
                "type" => "success",
                "message" => "Advertiser Config Successfully Updated."
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
