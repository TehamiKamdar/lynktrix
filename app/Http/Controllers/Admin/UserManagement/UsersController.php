<?php

namespace App\Http\Controllers\Admin\UserManagement;

use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Models\Website;
use App\Service\Admin\UserManagement\UserService;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;
use App\Exports\RakutenTransactionExport;
use Maatwebsite\Excel\Facades\Excel;

class UsersController extends Controller
{
    protected object $service;
    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        abort_if(Gate::denies('admin_roles_users_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if($request->ajax())
            return $this->service->index($request);

        SEOMeta::setTitle(trans('cruds.user.title') . " " . trans('global.list'));

        return view('template.admin.users.index');
    }


    public function correct_password(){
        // $user = User::find('707ef4ef-15bf-4dd3-9a77-92ec2f836f84');
        // if($user){
        //     $user->password = Hash::make('1PaD3G(Z~Z7M');
        //     $user->update();
        // }
    }

    public function getcsvdownload()
       
{
    // Fixed date range: Jan 1, 2021 to Dec 31, 2025
    $start_date = '2021-01-01 00:00:00';
    $end_date = '2025-12-31 23:59:59';
    $paymentID = null; // No payment ID filter

    $filename = "rakuten_transactions_{$start_date}_to_{$end_date}.csv";

    return Excel::download(
        new RakutenTransactionExport($start_date, $end_date, $paymentID),
        $filename,
        \Maatwebsite\Excel\Excel::CSV
    );
}
    

    public function create()
    {
//        abort_if(Gate::denies('crm_user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $roles = $this->service->getRoles();
        SEOMeta::setTitle(trans('global.add') . " " . trans('cruds.user.title_singular'));
        return view('template.admin.users.create', compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        $response = $this->service->store($request);
        return redirect()->route('admin.user-management.users.index')->with($response['type'], $response['message']);
    }

    public function edit(User $user)
    {
        $roles = $this->service->getRoles();
        $this->service->loadRoles($user);
        SEOMeta::setTitle(trans('global.edit') . " " . trans('cruds.user.title_singular'));
        return view('template.admin.users.edit', compact('roles', 'user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $response = $this->service->update($request, $user);
        return redirect()->route('admin.user-management.users.index')->with($response['type'], $response['message']);
    }

    public function show(User $user)
    {
//        abort_if(Gate::denies('crm_user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $this->service->loadRoles($user);

        SEOMeta::setTitle(trans('global.show') . " " . trans('cruds.user.title_singular'));

        return view('template.admin.users.show', compact('user'));
    }

    public function destroy(User $user)
    {
//        abort_if(Gate::denies('crm_user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $response = $this->service->delete($user);

        return redirect()->route('admin.user-management.users.index')->with($response['type'], $response['message']);
    }

    public function massDestroy()
    {
        $this->service->deleteMultiple();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function tabs(Request $request)
    {
        $roles = $this->service->getRoles();

        if(decrypt($request->tab) == "advertiser") {
            return view("template.admin.users.add.advertiser_form", compact('roles'));
        }
        else {
            return view("template.admin.users.add.publisher_form", compact('roles'));
        }
    }

    public function statusUpdate(UserStatus $status, User $user)
    {
        $response = $this->service->updateStatus($status, $user);

        return redirect()->back()->with($response['type'], $response['message']);
    }

  function getpublisherwebsite()
{
    $publishers = User::where('status', 'active')
        ->where('type', 'publisher')
        ->with('websites') // eager load in one query
        ->get();

    $data = [];

    foreach ($publishers as $publisher) {
        $websites = [];

        foreach ($publisher->websites as $w) { // match relationship name
            $websites[] = $w->url;
        }

        $data[] = [
            "name" => $publisher->user_name,
            "website"=>$websites
        ];
        
    }

    return response()->json($data);
}

}
