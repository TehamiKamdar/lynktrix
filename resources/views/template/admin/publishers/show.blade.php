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
                                    <a href="" class="breadcrumb-remove border-0 color-danger content-center bg-white fs-12 fw-500 ml-10 radius-md">
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
                                        <a class="btn btn-xs btn-white active border-light" id="basic_intro-tab" data-toggle="tab" href="#basic_intro" role="tab" area-controls="basic_intro" aria-selected="true">Intro</a>
                                        <a class="btn btn-xs btn-white border-light" id="basic_intro_detail-tab" data-toggle="tab" href="#basic_intro_detail" role="tab" area-controls="basic_intro_detail" aria-selected="true">Detail</a>
                                        <a class="btn btn-xs btn-white border-light" id="media_kits-tab" data-toggle="tab" href="#media_kits" role="tab" area-controls="media_kits" aria-selected="false">Media Kits</a>
                                        <a class="btn btn-xs btn-white border-light" id="websites-tab" data-toggle="tab" href="#websites" role="tab" area-controls="websites" aria-selected="false">Websites</a>
                                        <a class="btn btn-xs btn-white border-light" id="companies-tab" data-toggle="tab" href="#companies" role="tab" area-controls="companies" aria-selected="false">Companies</a>
                                        <a class="btn btn-xs btn-white border-light" id="billing-info-tab" data-toggle="tab" href="#billing-info" role="tab" area-controls="billing-info" aria-selected="false">Billing Information</a>
                                        <a class="btn btn-xs btn-white border-light" id="payment-setting-tab" data-toggle="tab" href="#payment-setting" role="tab" area-controls="payment-setting" aria-selected="false">Payment Settings</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="basic_intro" role="" aria-labelledby="basic_intro-tab">
                                        @include("template.admin.publishers.intro", compact('publisher'))
                                    </div>
                                    <div class="tab-pane fade" id="basic_intro_detail" role="" aria-labelledby="basic_intro_detail-tab">
                                        @include("template.admin.publishers.intro_detail", compact('publisher'))
                                    </div>
                                    <div class="tab-pane fade" id="media_kits" role="" aria-labelledby="media_kits-tab">
                                        @include("template.admin.publishers.kits", compact('publisher'))
                                    </div>
                                    <div class="tab-pane fade" id="websites" role="" aria-labelledby="websites-tab">
                                        @include("template.admin.publishers.websites", compact('publisher'))
                                    </div>
                                    <div class="tab-pane fade" id="companies" role="" aria-labelledby="companies-tab">
                                        @include("template.admin.publishers.companies", compact('publisher'))
                                    </div>
                                    <div class="tab-pane fade" id="billing-info" role="" aria-labelledby="billing-info-tab">
                                        @include("template.admin.publishers.billing-info", compact('publisher'))
                                    </div>
                                    <div class="tab-pane fade" id="payment-setting" role="" aria-labelledby="payment-setting-tab">
                                        @include("template.admin.publishers.payment-settings", compact('publisher'))
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
