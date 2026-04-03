<?php

namespace App\Http\Controllers\Admin\Statistics;

use App\Http\Controllers\Controller;
use App\Models\Tracking;
use App\Service\Admin\Statistics\TrackingLink\IndexService;
use App\Service\Admin\Statistics\TrackingLink\ShowService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class LinkController extends Controller
{
    public function index(Request $request, IndexService $service)
    {
        abort_if(Gate::denies('admin_statistics_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        abort_if(Gate::denies('admin_tracking_links_statistics_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return $service->init($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Request $request, Tracking $link, ShowService $service)
    {
        abort_if(Gate::denies('admin_tracking_links_statistics_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return $service->init($request, $link);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
