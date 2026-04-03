<?php

namespace App\Http\Controllers\Publisher\Notifications;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function actionNotificationCenter($category = null)
    {
        $notifications = Notification::where("publisher_id", auth()->user()->id);

        if($category)
        {
            $category = str_replace('-', ' ', $category);
            $notifications = $notifications->where('category', ucwords($category));
        }

        $notifications = $notifications->orderBy('created_at', 'DESC')->paginate(10);

        return view("template.publisher.notifications.index", compact("notifications"));
    }
    public function actionNotificationView(Notification $notification)
    {
        if($notification->is_new)
            $notification->update(['is_new' => 0]);
        return view("template.publisher.notifications.show", compact("notification"));
    }
}
