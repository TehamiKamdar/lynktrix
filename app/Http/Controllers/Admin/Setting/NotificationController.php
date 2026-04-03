<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class NotificationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('admin_notification_settings_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $setting = Setting::where("key", "notification")->first();
        return view('template.admin.settings.notification.create', compact('setting'));
    }

    public function store(Request $request)
    {
        Setting::updateOrCreate([
            'key'       =>      'notification',
        ], [
            "value" => $request->message
        ]);

        return redirect()->back()->with("success", "Notification Successfully Updated.");
    }
}
