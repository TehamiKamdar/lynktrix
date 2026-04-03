@extends("layouts.admin.panel_table")

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
                            <h4 class="text-capitalize breadcrumb-title">{{ trans('global.show') }} {{ trans('cruds.advertiser_configuration.title_singular') }}</h4>
                            <div class="breadcrumb-action justify-content-center flex-wrap">
                                <div class="action-btn">
                                    <a href="{{ route("admin.settings.advertiser-configs.index") }}" class="breadcrumb-remove border-0 color-danger content-center bg-white fs-12 fw-500 ml-10 radius-md">
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
                                <h6>{{ $advertiserConfig->name }}</h6>
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
                                                            {{ trans('cruds.advertiser_configuration.fields.id') }}
                                                        </th>
                                                        <td>
                                                            {{ $advertiserConfig->id }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('cruds.advertiser_configuration.fields.name') }}
                                                        </th>
                                                        <td>
                                                            {{ $advertiserConfig->name }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('cruds.advertiser_configuration.fields.key') }}
                                                        </th>
                                                        <td>
                                                            {{ $advertiserConfig->key }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('cruds.advertiser_configuration.fields.value') }}
                                                        </th>
                                                        <td>
                                                            {{ $advertiserConfig->value }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            &nbsp;
                                                        </th>
                                                        <td>
                                                            &nbsp;
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            &nbsp;
                                                        </th>
                                                        <td>
                                                            &nbsp;
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            &nbsp;
                                                        </th>
                                                        <td>
                                                            &nbsp;
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
