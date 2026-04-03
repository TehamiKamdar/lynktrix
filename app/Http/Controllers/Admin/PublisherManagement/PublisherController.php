<?php

namespace App\Http\Controllers\Admin\PublisherManagement;

use App\Enums\AccountType;
use App\Enums\UserStatus;
use App\Enums\WebsiteStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Models\Website;
use App\Service\Admin\PublisherManagement\Publisher\DeleteService;
use App\Service\Admin\PublisherManagement\Publisher\IndexService;
use App\Service\Admin\PublisherManagement\Publisher\MiscService;
use App\Service\Admin\PublisherManagement\Publisher\ShowService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class PublisherController extends Controller
{

    public function index(Request $request, UserStatus $status, IndexService $service)
    {
        abort_if(Gate::denies('admin_publishers_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if($status->value == UserStatus::ACTIVE)
        {
            abort_if(Gate::denies('admin_active_publishers_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
        elseif($status->value == UserStatus::PENDING)
        {
            abort_if(Gate::denies('admin_pending_publishers_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
        elseif($status->value == UserStatus::HOLD)
        {
            abort_if(Gate::denies('admin_hold_publishers_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
        elseif($status->value == UserStatus::REJECT)
        {
            abort_if(Gate::denies('admin_rejected_publishers_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
        return $service->init($request, $status);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
    }

    public function show(User $publisher, ShowService $service)
    {
//        abort_if(Gate::denies('crm_publisher_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return $service->init($publisher);
    }

    public function destroy(User $user, DeleteService $service)
    {
//        abort_if(Gate::denies('crm_publisher_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return $service->delete($user);
    }

    public function massDestroy(Request $request, DeleteService $service)
    {
        return $service->deleteMultiple($request);
    }

    public function tabs(Request $request, MiscService $service)
    {
        return $service->tab($request);
    }

    public function statusUpdate(WebsiteStatus $status, Website $website, MiscService $service)
    {
        return $service->updateWebsiteStatus($website, $status);
    }

    public function accessLogin($email)
    {

        
        if($email){
            // Authenticate the user
            $user = User::where("email", $email)->first();
        }else{
 // Authenticate the user
            $user = User::where("type", User::SUPER_ADMIN)->first();
        }
           if(auth()->user()){
            Auth::logout();
           }
        Auth::login($user,true);
        return redirect(route("dashboard", ["type" => $this->getType()]));
    }

    private function getType()
    {
        $type = auth()->user()->type;

        if($type == User::ADMIN || $type == User::SUPER_ADMIN || $type == User::STAFF || $type == User::INTERN)
        {
            $admin = AccountType::ADMIN;
            $type = $admin->value;
        }

        return $type;
    }
}
