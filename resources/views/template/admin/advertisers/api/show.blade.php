@extends("layouts.admin.panel_app")

@pushonce('styles')

    <style>
        .width-100 {
            width: 100px;
        }
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
        .width-15 {
            width: 15%;
        }
        .min-height-zero {
            min-height: 0
        }
    </style>

@endpushonce

@section("content")
    @php
        $mix = new \App\Models\Mix();
        $methods = $mix->whereIn("id", $api_advertiser->promotional_methods ?? [])->get()->pluck("name")->toArray();
        $restrictions = $mix->whereIn("id", $api_advertiser->program_restrictions ?? [])->get()->pluck("name")->toArray();
        $categories = $mix->whereIn("id", $api_advertiser->categories ?? [])->get()->pluck("name")->toArray();
    @endphp
    <div class="contents">

        <div class="container-fluid">
            <div class="social-dash-wrap">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="breadcrumb-main">
                            <h4 class="text-capitalize breadcrumb-title">{{ trans('global.show') }} {{ trans('advertiser.api-advertiser.title_singular') }}</h4>
                            <div class="breadcrumb-action justify-content-center flex-wrap">
                                <div class="action-btn">
                                    <a href="{{ route("admin.advertiser-management.api-advertisers.index") }}" class="breadcrumb-remove border-0 color-danger content-center bg-white fs-12 fw-500 ml-10 radius-md">
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
                                <h6>{{ $api_advertiser->name }}</h6>
                                <div class="card-extra">
                                    <div class="card-tab btn-group nav nav-tabs">
                                        <a class="btn btn-xs btn-white active border-light" id="overview_tab" data-toggle="tab" href="#overview" role="tab" area-controls="intro" aria-selected="true">Overview</a>
                                        <a class="btn btn-xs btn-white border-light" id="commission_rates-tab" data-toggle="tab" href="#commission_rates" role="tab" area-controls="commission_rates" aria-selected="false">Commission Rates</a>
                                        <a class="btn btn-xs btn-white border-light" id="terms-tab" data-toggle="tab" href="#terms" role="tab" area-controls="terms" aria-selected="false">Terms</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0">

                                @include("partial.admin.alert")

                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="overview" role="" aria-labelledby="overview_tab">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-social">
                                                <thead>
                                                    <tr>
                                                        <th scope="col"  class="width-15">Field</th>
                                                        <th scope="col">Value</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>
                                                            {{ trans('advertiser.api-advertiser.fields.logo') }}
                                                        </th>
                                                        <td>
                                                            <img src="{{ \App\Helper\Static\Methods::isImageShowable($api_advertiser->logo) }}" alt="{{ $api_advertiser->name }}" class="width-100">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('advertiser.api-advertiser.fields.id') }}
                                                        </th>
                                                        <td>
                                                            {{ $api_advertiser->id }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('advertiser.api-advertiser.fields.network_advertiser_id') }}
                                                        </th>
                                                        <td>
                                                            {{ $api_advertiser->advertiser_id ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('advertiser.api-advertiser.fields.our_advertiser_id') }}
                                                        </th>
                                                        <td>
                                                            {{ $api_advertiser->sid ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('advertiser.api-advertiser.fields.name') }}
                                                        </th>
                                                        <td>
                                                            {{ $api_advertiser->name ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('advertiser.api-advertiser.fields.primary_region') }}
                                                        </th>
                                                        <td>
                                                            {{ $api_advertiser->primary_regions ? implode(" | ", $api_advertiser->primary_regions) : "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('advertiser.api-advertiser.fields.country_full_name') }}
                                                        </th>
                                                        <td>
                                                            {{ $api_advertiser->country_full_name ? implode(" | ", $api_advertiser->country_full_name) : "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('advertiser.api-advertiser.fields.currency_code') }}
                                                        </th>
                                                        <td>
                                                            {{ $api_advertiser->currency_code ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('advertiser.api-advertiser.fields.average_payment_time') }}
                                                        </th>
                                                        <td>
                                                            {{ $api_advertiser->average_payment_time ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('advertiser.api-advertiser.fields.validation_days') }}
                                                        </th>
                                                        <td>
                                                            {{ $api_advertiser->validation_days ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('advertiser.api-advertiser.fields.goto_cookie_lifetime') }}
                                                        </th>
                                                        <td>
                                                            {{ $api_advertiser->goto_cookie_lifetime ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('advertiser.api-advertiser.fields.epc') }}
                                                        </th>
                                                        <td>
                                                            {{ $api_advertiser->epc ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('advertiser.api-advertiser.fields.source_type') }}
                                                        </th>
                                                        <td>
                                                            {{ strtoupper($api_advertiser->type) }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('advertiser.api-advertiser.fields.deeplink_enabled') }}
                                                        </th>
                                                        <td>
                                                            {{ $api_advertiser->deeplink_enabled ? "true" : "false" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('advertiser.api-advertiser.fields.exclusive') }}
                                                        </th>
                                                        <td>
                                                            {{ $api_advertiser->exclusive ? "true" : "false" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('advertiser.api-advertiser.fields.status') }}
                                                        </th>
                                                        <td>
                                                            @if($api_advertiser->is_active == 1)
                                                                Active
                                                            @elseif($api_advertiser->is_active == 0)
                                                                Hold
                                                            @else
                                                                Not Active
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                           Show to Publisher
                                                        </th>
                                                        <td>
                                                            @if($api_advertiser->is_show == 1)
                                                                Yes
                                                            @elseif($api_advertiser->is_show == 2)
                                                                Hold
                                                            @else
                                                                No
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('advertiser.api-advertiser.fields.commission') }}
                                                        </th>
                                                        <td>
                                                            {{ $api_advertiser->commission ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('advertiser.api-advertiser.fields.commission_type') }}
                                                        </th>
                                                        <td>
                                                            {{ $api_advertiser->commission_type ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('advertiser.api-advertiser.fields.url') }}
                                                        </th>
                                                        <td>
                                                            @php
                                                                $url = "-";
                                                                $href = "-";
                                                                if(isset($api_advertiser->url)):
                                                                    $url = $api_advertiser->url;
                                                                    $href = route("redirect.url") . "?url=" . urlencode($url);
                                                                endif;
                                                            @endphp
                                                            <a href="{{ $href }}" target="_blank">{{ $url }}</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('advertiser.api-advertiser.fields.click_through_url') }}
                                                        </th>
                                                        <td>
                                                            <a href="{{ $api_advertiser->click_through_url ?? "-" }}" target="_blank">{{ $api_advertiser->click_through_url ?? "-" }}</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('advertiser.api-advertiser.fields.tracking_url_short') }}
                                                        </th>
                                                        <td>
                                                            <a href="{{ $api_advertiser->tracking_url_short ?? "-" }}" target="_blank">{{ $api_advertiser->tracking_url_short ?? "-" }}</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('advertiser.api-advertiser.fields.valid_domains') }}
                                                        </th>
                                                        <td>
                                                            {!! $api_advertiser->valid_domains ? "<ol><li>".implode("</li><li>", $api_advertiser->valid_domains)."</li></ol>" : "-" !!}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('advertiser.api-advertiser.fields.promotional_methods') }}
                                                        </th>
                                                        <td>
                                                            {!! $methods ? "<ol><li>".implode("</li><li>", $methods)."</li></ol>" : "-" !!}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('advertiser.api-advertiser.fields.program_restrictions') }}
                                                        </th>
                                                        <td>
                                                            {!! $restrictions ? "<ol><li>".implode("</li><li>", $restrictions)."</li></ol>" : "-" !!}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('advertiser.api-advertiser.fields.categories') }}
                                                        </th>
                                                        <td>
                                                            {!! $categories ? "<ol><li>".implode("</li><li>", $categories)."</li></ol>" : "-" !!}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('advertiser.api-advertiser.fields.tags') }}
                                                        </th>
                                                        <td>
                                                            {!! $api_advertiser->tags ? "<ol><li>".implode("</li><li>", $api_advertiser->tags)."</li></ol>" : "-" !!}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('advertiser.api-advertiser.fields.offer_type') }}
                                                        </th>
                                                        <td>
                                                            {{ $api_advertiser->offer_type ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('advertiser.api-advertiser.fields.supported_regions') }}
                                                        </th>
                                                        <td>
                                                            {!! $api_advertiser->supported_regions ? "<ol><li>".implode("</li><li>", $api_advertiser->supported_regions)."</li></ol>" : "-" !!}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('advertiser.api-advertiser.fields.source') }}
                                                        </th>
                                                        <td>
                                                            {{ $api_advertiser->source ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Description
                                                        </th>
                                                        <td>
                                                            {{ $api_advertiser->description ?? "-" }}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="commission_rates" role="" aria-labelledby="commission_rates-tab">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-social min-height-zero">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Date</th>
                                                        <th scope="col">Condition</th>
                                                        <th scope="col">Rate</th>
                                                        <th scope="col">Type</th>
                                                        <th scope="col">Additional Info</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($api_advertiser->commissions as $commission)
                                                        <tr>
                                                            <td>
                                                                {{ $commission->date ?? "-" }}
                                                            </td>
                                                            <td>
                                                                {{ $commission->condition ?? "-" }}
                                                            </td>
                                                            <td>
                                                                {{ $commission->rate ?? "-" }}
                                                            </td>
                                                            <td>
                                                                {{ $commission->type ?? "-" }}
                                                            </td>
                                                            <td>
                                                                {{ $commission->info ?? "-" }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="terms" role="" aria-labelledby="terms-tab">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-social min-height-zero">
                                                <thead>
                                                <tr>
                                                    <th scope="col"  class="width-15">Field</th>
                                                    <th scope="col">Value</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>
                                                            Program Terms
                                                        </th>
                                                        <td>
                                                            {!! $api_advertiser->program_policies ?? "-" !!}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
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
