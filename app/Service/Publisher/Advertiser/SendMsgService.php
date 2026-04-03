<?php

namespace App\Service\Publisher\Advertiser;

use App\Http\Requests\Publisher\SendMessageToAdvertiserRequest;
use App\Models\ChatMessage;

class SendMsgService
{
    /**
     * @param SendMessageToAdvertiserRequest $request
     * @return array|string[]
     */
    public function init(SendMessageToAdvertiserRequest $request): array
    {
        try
        {
            ChatMessage::create([
                "advertiser_id" => $request->advertiser_id,
                "advertiser_name" => $request->advertiser_name,
                "publisher_id" => auth()->user()->id,
                "publisher_name" => auth()->user()->first_name . " " . auth()->user()->last_name,
                "subject" => $request->subject,
                "comments" => $request->question_or_comment
            ]);

            return [
                "type" => "success",
                "message" => "Msg sent successfully."
            ];
        }
        catch (\Exception $exception)
        {
            return [
                "type" => "error",
                "message" => $exception->getMessage()
            ];
        }
    }
}
