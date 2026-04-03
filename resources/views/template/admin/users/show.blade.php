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
                            <h4 class="text-capitalize breadcrumb-title">{{ trans('global.show') }} {{ trans('cruds.user.title_singular') }}</h4>
                            <div class="breadcrumb-action justify-content-center flex-wrap">
                                <div class="action-btn">
                                    <a href="{{ route("admin.user-management.users.index") }}" class="breadcrumb-remove border-0 color-danger content-center bg-white fs-12 fw-500 ml-10 radius-md">
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
                                <h6>{{ $user->first_name }} {{ $user->last_name }}</h6>
                                <div class="card-extra">
                                    <div class="card-tab btn-group nav nav-tabs">
                                        <a class="btn btn-xs btn-white active border-light" id="basic_intro-tab" data-toggle="tab" href="#basic_intro" role="tab" area-controls="intro" aria-selected="true">Intro</a>
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
                                                        {{ $user->id }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        {{ trans('cruds.publisher.fields.first_name') }}
                                                    </th>
                                                    <td>
                                                        {{ $user->first_name }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        {{ trans('cruds.publisher.fields.last_name') }}
                                                    </th>
                                                    <td>
                                                        {{ $user->last_name }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        {{ trans('cruds.publisher.fields.user_name') }}
                                                    </th>
                                                    <td>
                                                        {{ $user->user_name }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        {{ trans('cruds.publisher.fields.email') }}
                                                    </th>
                                                    <td>
                                                        {{ $user->email }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        {{ trans('cruds.publisher.fields.email_verified_at') }}
                                                    </th>
                                                    <td>
                                                        {{ $user->email_verified_at ?? "N/A" }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        {{ trans('cruds.publisher.fields.remember_token') }}
                                                    </th>
                                                    <td>
                                                        {{ $user->remember_token ? "YES" : "NO" }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        {{ trans('cruds.publisher.fields.status') }}
                                                    </th>
                                                    <td>
                                                        <?php
                                                        $status = $user->status;
                                                        $class = $status == "active" ? "badge-success" : (($status == "pending") ? "badge-warning" : "badge-danger");
                                                        ?>
                                                        <div class="float-left">
                                                            {!! "<span class='badge {$class}'>".ucwords($status)."</span>" !!}
                                                        </div>
                                                        <div class="float-right">
                                                            @if($user->status != "active")
                                                                <a href="{{ route("admin.user-management.users.statusUpdate", ["user" => $user->id, "status" => "active"]) }}" class="mr-2 btn btn-xs btn-success text-white float-left">Active</a>
                                                            @endif
                                                            @if($user->status != "hold")
                                                                <a href="{{ route("admin.user-management.users.statusUpdate", ["user" => $user->id, "status" => "hold"]) }}" class="mr-2 btn btn-xs btn-info text-white float-left">Hold</a>
                                                            @endif
                                                            @if($user->status != "rejected")
                                                                <a href="{{ route("admin.user-management.users.statusUpdate", ["user" => $user->id, "status" => "rejected"]) }}" class="btn btn-xs btn-danger text-white float-left">Rejected</a>
                                                            @endif
                                                        </div>
                                                        <div class="clearfix"></div>
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
