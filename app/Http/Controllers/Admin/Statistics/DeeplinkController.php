<?php

namespace App\Http\Controllers\Admin\Statistics;

use App\Http\Controllers\Controller;
use App\Models\DeeplinkTracking;
use App\Service\Admin\Statistics\Deeplink\IndexService;
use App\Service\Admin\Statistics\Deeplink\ShowService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class DeeplinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, IndexService $service)
    {
        abort_if(Gate::denies('admin_statistics_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        abort_if(Gate::denies('admin_deep_links_statistics_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return $service->init($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, DeeplinkTracking $deeplink, ShowService $service)
    {
        abort_if(Gate::denies('admin_deep_links_statistics_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return $service->init($request, $deeplink);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
