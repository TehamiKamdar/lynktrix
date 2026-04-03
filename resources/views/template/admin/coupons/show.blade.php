@extends("layouts.admin.panel_app")

@pushonce('styles')

    <style>
        .table-social tbody tr td:not(:first-child) {
            text-align: left !important;
        }
        .card-header {
            padding: 0.75rem 1rem !important;
        }
        .card .card-header {
            text-transform: none !important;
            min-height: 40px !important;
        }
        .changelog__according .card .card-header {
            min-height: 40px !important;
            height: 40px !important;
        }
        .changelog__accordingCollapsed {
            height: 40px !important;
        }
        .v-num {
            font-size: 14px !important;
        }
        .btn-xs {
            line-height: 1.7 !important;
            font-size: 10px !important;
        }
        .table, .changelog__according .card:not(:last-child) {
            margin-bottom: 0 !important;
        }
        .social-dash-wrap .card.card-overview {
            margin-bottom: 5%;
        }
        .social-dash-wrap .card-body {
            padding: 0 !important;
        }
        .changelog__according {
            margin-top: 0 !important;
        }
    </style>

@endpushonce

@section("content")
    <div class="contents">

        <div class="container-fluid">
            <div class="social-dash-wrap">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="breadcrumb-main">
                            <h4 class="text-capitalize breadcrumb-title">{{ trans('global.show') }} {{ trans('cruds.publisher.title_singular') }}</h4>
                            <div class="breadcrumb-action justify-content-center flex-wrap">
                                <div class="action-btn">
                                    <a href="{{ route("admin.creative-management.coupons.index") }}" class="breadcrumb-remove border-0 color-danger content-center bg-white fs-12 fw-500 ml-10 radius-md">
                                        <i class="la la-undo mr-2"></i> {{ trans('global.back_to_list') }}</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-overview border-0">
                            <div class="card-header">
                                <h6>{{ $publisher->first_name }} {{ $publisher->last_name }}</h6>
                                <div class="card-extra">
                                    <div class="card-tab btn-group nav nav-tabs">
                                        <a class="btn btn-xs btn-white active border-light" id="basic_intro-tab" data-toggle="tab" href="#basic_intro" role="tab" area-controls="intro" aria-selected="true">Intro</a>
                                        <a class="btn btn-xs btn-white border-light" id="websites-tab" data-toggle="tab" href="#websites" role="tab" area-controls="intro" aria-selected="false">Websites</a>
                                        <a class="btn btn-xs btn-white border-light" id="companies-tab" data-toggle="tab" href="#companies" role="tab" area-controls="intro" aria-selected="false">Companies</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="basic_intro" role="" aria-labelledby="basic_intro-tab">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-social">
                                                <thead>
                                                <tr>
                                                    <th scope="col" style="width: 15%">Field</th>
                                                    <th scope="col">Value</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <th>
                                                        {{ trans('cruds.publisher.fields.id') }}
                                                    </th>
                                                    <td>
                                                        {{ $publisher->id }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        {{ trans('cruds.publisher.fields.first_name') }}
                                                    </th>
                                                    <td>
                                                        {{ $publisher->first_name }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        {{ trans('cruds.publisher.fields.last_name') }}
                                                    </th>
                                                    <td>
                                                        {{ $publisher->last_name }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        {{ trans('cruds.publisher.fields.user_name') }}
                                                    </th>
                                                    <td>
                                                        {{ $publisher->user_name }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        {{ trans('cruds.publisher.fields.email') }}
                                                    </th>
                                                    <td>
                                                        {{ $publisher->email }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        {{ trans('cruds.publisher.fields.email_verified_at') }}
                                                    </th>
                                                    <td>
                                                        {{ $publisher->email_verified_at ?? "N/A" }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        {{ trans('cruds.publisher.fields.remember_token') }}
                                                    </th>
                                                    <td>
                                                        {{ $publisher->remember_token ? "YES" : "NO" }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        {{ trans('cruds.publisher.fields.status') }}
                                                    </th>
                                                    <td>
                                                        <?php
                                                        $status = $publisher->status;
                                                        $class = $status == "active" ? "badge-success" : (($status == "pending") ? "badge-warning" : "badge-danger");
                                                        ?>
                                                        <div class="float-left">
                                                            {!! "<span class='badge {$class}'>".ucwords($status)."</span>" !!}
                                                        </div>
                                                        @if($publisher->email_verified_at)
                                                            <div class="float-right">
                                                                @if($publisher->status != "active")
                                                                    <a href="{{ route("admin.user-management.users.statusUpdate", ["user" => $publisher->id, "status" => "active"]) }}" class="mr-2 btn btn-xs btn-success text-white float-left">Active</a>
                                                                @endif
                                                                @if($publisher->status != "hold")
                                                                    <a href="{{ route("admin.user-management.users.statusUpdate", ["user" => $publisher->id, "status" => "hold"]) }}" class="mr-2 btn btn-xs btn-info text-white float-left">Hold</a>
                                                                @endif
                                                                @if($publisher->status != "rejected")
                                                                    <a href="{{ route("admin.user-management.users.statusUpdate", ["user" => $publisher->id, "status" => "rejected"]) }}" class="btn btn-xs btn-danger text-white float-left">Rejected</a>
                                                                @endif
                                                            </div>
                                                        @else
                                                            <small class="float-right">
                                                                Email Not Verified
                                                            </small>
                                                        @endif
                                                        <div class="clearfix"></div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="websites" role="" aria-labelledby="websites-tab">
                                        <div class="changelog__according">
                                            <div class="changelog__accordingWrapper">
                                                <div id="accordionWebsites">
                                                    @foreach($publisher->websites as $key => $website)
                                                            <?php
                                                            $url = $website->url ? "<a href='{$website->url}'>{$website->url}</a>" : "N/A";
                                                            ?>
                                                        <div class="card">
                                                            <div class="card-header w-100" id="websiteContent{{ $website->id }}">
                                                                <div role="button" class="w-100 changelog__accordingCollapsed {{ $key > 0 ? "collapsed" : null }}" data-toggle="collapse" data-target="#collapse{{ $website->id }}" aria-expanded="{{ $key == 0 }}" aria-controls="collapse{{ $website->id }}">
                                                                    <div class="changelog__accordingTitle d-flex justify-content-between w-100">
                                                                        <div class="v-num">Website Information ({!! strtolower($url) !!})</div>
                                                                        <div class="changelog__accordingArrow">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="collapse{{ $website->id }}" class="collapse {{ $key == 0 ? "show" : null }}" aria-labelledby="websiteContent{{ $website->id }}" data-parent="#accordionWebsites">
                                                                <div class="card-body">
                                                                    <div class="table-responsive">
                                                                        <table class="table table-bordered table-social">
                                                                            <thead>
                                                                            <tr>
                                                                                <th scope="col" style="width: 15%">Field</th>
                                                                                <th scope="col">Value</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th>
                                                                                        {{ trans('cruds.publisher.website.fields.id') }}
                                                                                    </th>
                                                                                    <td>
                                                                                        {{ $website->id }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>
                                                                                        {{ trans('cruds.publisher.website.fields.category') }}
                                                                                    </th>
                                                                                    <td>
                                                                                        {{ implode(', ', \App\Helper\PublisherData::getMixNames($website->categories)) }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>
                                                                                        {{ trans('cruds.publisher.website.fields.partner_type') }}
                                                                                    </th>
                                                                                    <td>
                                                                                        {{ implode(', ', \App\Helper\PublisherData::getMixNames($website->partner_types)) }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>
                                                                                        {{ trans('cruds.publisher.website.fields.url') }}
                                                                                    </th>
                                                                                    <td>
                                                                                        {!! $url !!}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>
                                                                                        {{ trans('cruds.publisher.website.fields.status') }}
                                                                                    </th>
                                                                                    <td>
                                                                                        <?php
                                                                                        $status = $website->status;
                                                                                        $class = $status == "active" ? "badge-success" : (($status == "pending") ? "badge-warning" : (($status == "hold") ? "badge-info" :  "badge-danger"));
                                                                                        $status = "<span class='badge {$class}'>".ucwords($status)."</span>";
                                                                                        ?>
                                                                                        <div class="float-left">
                                                                                            {!! $status ?? "N/A" !!}
                                                                                        </div>
                                                                                        <div class="float-right">
                                                                                            @if($publisher->email_verified_at)
                                                                                                @if($website->status != "active")
                                                                                                    <a href="{{ route("admin.publisher-management.publishers.statusUpdate", ["website" => $website->id, "status" => "active"]) }}" class="mr-2 btn btn-xs btn-success text-white float-left">Active</a>
                                                                                                @endif
                                                                                                @if($website->status != "hold")
                                                                                                    <a href="{{ route("admin.publisher-management.publishers.statusUpdate", ["website" => $website->id, "status" => "hold"]) }}" class="mr-2 btn btn-xs btn-info text-white float-left">Hold</a>
                                                                                                @endif
                                                                                                @if($website->status != "rejected")
                                                                                                    <a href="{{ route("admin.publisher-management.publishers.statusUpdate", ["website" => $website->id, "status" => "rejected"]) }}" class="btn btn-xs btn-danger text-white float-left">Rejected</a>
                                                                                                @endif
                                                                                            @else
                                                                                                <small class="float-right">
                                                                                                    Email Not Verified
                                                                                                </small>
                                                                                            @endif
                                                                                        </div>
                                                                                        <div class="clearfix"></div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>
                                                                                        {{ trans('cruds.publisher.website.fields.intro') }}
                                                                                    </th>
                                                                                    <td>
                                                                                        {!! $website->intro ?? "N/A" !!}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>
                                                                                        {{ trans('cruds.publisher.website.fields.media_kit') }}
                                                                                    </th>
                                                                                    <td>
                                                                                        {{ $website->media_kit ?? "N/A" }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>
                                                                                        {{ trans('cruds.publisher.website.fields.website_logo') }}
                                                                                    </th>
                                                                                    <td>
                                                                                        {!! $website->website_logo ? "<img class='w-25' src='{$website->website_logo}$' class='img-thumbnail img-responsive' />" : "N/A" !!}
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="companies" role="" aria-labelledby="companies-tab">
                                        <div class="changelog__according">
                                            <div class="changelog__accordingWrapper">
                                                <div id="accordionCompanies">
                                                    @foreach($publisher->companies as $key => $company)
                                                        <div class="card">
                                                            <div class="card-header w-100" id="companyContent{{ $company->id }}">
                                                                <div role="button" class="w-100 changelog__accordingCollapsed {{ $key > 0 ? "collapsed" : null }}" data-toggle="collapse" data-target="#collapse{{ $company->id }}" aria-expanded="{{ $key == 0 }}" aria-controls="collapse{{ $company->id }}">
                                                                    <div class="changelog__accordingTitle d-flex justify-content-between w-100">
                                                                        <div class="v-num">Company Information ({{ $company->company_name }})</div>
                                                                        <div class="changelog__accordingArrow">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="collapse{{ $company->id }}" class="collapse {{ $key == 0 ? "show" : null }}" aria-labelledby="companyContent{{ $company->id }}" data-parent="#accordionCompanies">
                                                                <div class="card-body">
                                                                    <div class="table-responsive">
                                                                        <table class="table table-bordered table-social">
                                                                            <thead>
                                                                            <tr>
                                                                                <th scope="col" style="width: 15%">Field</th>
                                                                                <th scope="col">Value</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            <tr>
                                                                                <th>
                                                                                    {{ trans('cruds.publisher.company.fields.id') }}
                                                                                </th>
                                                                                <td>
                                                                                    {{ $company->id }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>
                                                                                    {{ trans('cruds.publisher.company.fields.company_name') }}
                                                                                </th>
                                                                                <td>
                                                                                    {{ $company->company_name }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>
                                                                                    {{ trans('cruds.publisher.company.fields.legal_entity_type') }}
                                                                                </th>
                                                                                <td>
                                                                                    {{ $company->legal_entity_type }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>
                                                                                    {{ trans('cruds.publisher.company.fields.country') }}
                                                                                </th>
                                                                                <td>
                                                                                    {{ $company->country }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>
                                                                                    {{ trans('cruds.publisher.company.fields.city') }}
                                                                                </th>
                                                                                <td>
                                                                                    {{ $company->city }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>
                                                                                    {{ trans('cruds.publisher.company.fields.state') }}
                                                                                </th>
                                                                                <td>
                                                                                    {{ $company->state }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>
                                                                                    {{ trans('cruds.publisher.company.fields.zip_code') }}
                                                                                </th>
                                                                                <td>
                                                                                    {{ $company->zip_code }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>
                                                                                    {{ trans('cruds.publisher.company.fields.address') }}
                                                                                </th>
                                                                                <td>
                                                                                    {{ $company->address }}
                                                                                </td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
