<?php

namespace App\Service\Admin\AdvertiserManagement\Config;

use App\Models\AdvertiserConfig;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DeleteService
{
    public function delete(AdvertiserConfig $advertiserConfig)
    {
        try {

            $advertiserConfig->delete();

            $response = [
                "type" => "success",
                "message" => "Advertiser Config Setting Successfully deleted."
            ];

        } catch (\Exception $exception) {

            $response = [
                "type" => "error",
                "message" => $exception->getMessage()
            ];

        }

        return redirect()->route('admin.settings.advertiser-configs.index')->with($response['type'], $response['message']);
    }

    public function deleteMultiple(Request $request)
    {
        AdvertiserConfig::whereIn('id', $request->ids)->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
