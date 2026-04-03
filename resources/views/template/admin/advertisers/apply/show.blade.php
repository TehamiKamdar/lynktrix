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

@pushonce('scripts')
    <script>
        function openModal(status)
        {
            $("#status").val(status)
            $("#programStatus").html(`STATUS: ${status.toUpperCase()}`)
        }
    </script>
@endpushonce

@section("content")
    <div class="contents">

        <div class="container-fluid">
            <div class="social-dash-wrap">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="breadcrumb-main">
                            <h4 class="text-capitalize breadcrumb-title">{{ trans('global.show') }} {{ trans('advertiser.approval.title_singular') }}</h4>
                            <div class="breadcrumb-action justify-content-center flex-wrap">
                                <div class="action-btn">
                                    <a href="{{ route("admin.approval.index", ['status' => $status->value]) }}" class="breadcrumb-remove border-0 color-danger content-center bg-white fs-12 fw-500 ml-10 radius-md">
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
                                <h6>{{ $approval->publisher_name }}</h6>
                                <div class="card-extra">
                                    <div class="card-tab btn-group nav nav-tabs">
                                        <a class="btn btn-xs btn-white active border-light" id="overview_tab" data-toggle="tab" href="#overview" role="tab" area-controls="intro" aria-selected="true">Info</a>
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
                                                            {{ trans('advertiser.approval.fields.advertiser_name') }}
                                                        </th>
                                                        <td>
                                                            {{ $approval->advertiser_name ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('advertiser.approval.fields.publisher_name') }}
                                                        </th>
                                                        <td>
                                                            {{ $approval->publisher_name ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('advertiser.approval.fields.approver_name') }}
                                                        </th>
                                                        <td>
                                                            {{ $approval->approver->name ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('advertiser.approval.fields.website_url') }}
                                                        </th>
                                                        <td>
                                                            <a href="{{ $approval->website->url ?? "-" }}" target="_blank">{{ $approval->website->url ?? "-" }}</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('advertiser.approval.fields.status') }}
                                                        </th>
                                                        <td>
                                                            {{ ucwords($approval->status ?? "-") }}
                                                            <div class="float-right">
                                                                @if($approval->status != \App\Models\AdvertiserApply::STATUS_ACTIVE)
                                                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-basic" onclick="openModal('{{ \App\Models\AdvertiserApply::STATUS_ACTIVE }}')" class="mr-2 btn btn-xs btn-success text-white float-left" >Active</a>
                                                                @endif
                                                                @if($approval->status != \App\Models\AdvertiserApply::STATUS_HOLD)
                                                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-basic" onclick="openModal('{{ \App\Models\AdvertiserApply::STATUS_HOLD }}')" class="mr-2 btn btn-xs btn-info text-white float-left" >Hold</a>
                                                                @endif
                                                                @if($approval->status != \App\Models\AdvertiserApply::STATUS_REJECTED)
                                                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-basic" onclick="openModal('{{ \App\Models\AdvertiserApply::STATUS_REJECTED }}')" class="btn btn-xs btn-danger text-white float-left" >Rejected</a>
                                                                @endif
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('advertiser.approval.fields.type') }}
                                                        </th>
                                                        <td>
                                                            {{ strtoupper($approval->type ?? "-") }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('advertiser.approval.fields.source') }}
                                                        </th>
                                                        <td>
                                                            {{ strtoupper($approval->source ?? "-") }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('advertiser.approval.fields.publisher_apply_message') }}
                                                        </th>
                                                        <td>
                                                            {{ $approval->message ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('advertiser.approval.fields.reject_approve_reason') }}
                                                        </th>
                                                        <td>
                                                            {{ $approval->reject_approve_reason ?? "-" }}
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

        <div class="modal-basic modal fade" id="modal-basic" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <form action="{{ route("admin.approval.statusUpdate") }}" method="POST">
                    @csrf
                    <input type="hidden" id="a_id" name="a_id[]" value="{{ $approval->id }}">
                    <input type="hidden" id="status" name="status">
                    <input type="hidden" id="current_status" name="current_status" value="{{ $status->value }}">
                    <div class="modal-content modal-bg-white ">
                        <div class="modal-header">
                            <h6 class="modal-title">Approve To Program</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span data-feather="x"></span></button>
                        </div>
                        <div class="modal-body">
                            <h6 class="ap-nameAddress__title text-black" id="programStatus"></h6>
                            <h6 class="ap-nameAddress__subTitle text-left justify-content-start fs-14 pt-1 m-0" id="advertiserID"></h6>
                            <p class="font-weight-bold mt-3 text-black">Optional: Tell us about the reason of Approval / Rejection / Hold.</p>
                            <textarea class="form-control" rows="4" cols="4" name="message"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm">Apply</button>
                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
