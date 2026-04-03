<?php

namespace App\Service\Admin\AdvertiserManagement\Api;

use App\Models\Advertiser;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DeleteService
{
    public function delete(Advertiser $advertiser)
    {
        try {

            $advertiser->delete();

            $response = [
                "type" => "success",
                "message" => "Advertiser API Successfully deleted."
            ];

        } catch (\Exception $exception) {

            $response = [
                "type" => "error",
                "message" => $exception->getMessage()
            ];

        }

        return redirect()->route('admin.advertiser-management.api-advertisers.index')->with($response['type'], $response['message']);
    }

    public function deleteMultiple(Request $request)
    {
        Advertiser::whereIn('id', $request->ids)->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
