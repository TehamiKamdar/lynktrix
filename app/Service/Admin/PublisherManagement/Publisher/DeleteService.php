<?php

namespace App\Service\Admin\PublisherManagement\Publisher;

use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class DeleteService
{
    public function delete(User $user)
    {
        try {

            $user->delete();

            $response = [
                "type" => "success",
                "message" => "User Successfully deleted."
            ];

        } catch (\Exception $exception) {

            $response = [
                "type" => "error",
                "message" => $exception->getMessage()
            ];

        }

        return redirect()->route('admin.user-management.users.index')->with($response['type'], $response['message']);
    }

    public function deleteMultiple($request)
    {
        User::whereIn('id', $request->ids)->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }

}
