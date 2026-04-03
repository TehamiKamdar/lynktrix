<?php

namespace App\Service\Admin\AdvertiserManagement\Advertiser;

use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DeleteService
{
    public function delete($advertiser)
    {
        try {

            $user = User::find($advertiser);
            $user->delete();

            $response = [
                "type" => "success",
                "message" => "Advertiser Successfully deleted."
            ];

        } catch (\Exception $exception) {

            $response = [
                "type" => "error",
                "message" => $exception->getMessage()
            ];

        }

        return redirect()->route('admin.advertiser-management.advertisers.index')->with($response['type'], $response['message']);
    }

    public function deleteMultiple(Request $request)
    {
        User::whereIn('id', $request->ids)->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
