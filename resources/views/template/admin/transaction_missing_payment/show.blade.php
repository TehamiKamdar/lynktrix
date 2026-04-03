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
        .width-25 {
            width: 25%;
        }
        .min-height-zero {
            min-height: 0
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
                            <h4 class="text-capitalize breadcrumb-title">{{ trans('global.show') }} {{ trans('cruds.transaction.title_singular') }}</h4>
                            <div class="breadcrumb-action justify-content-center flex-wrap">
                                <div class="action-btn">
                                    <a href="{{ route("admin.transactions.index") }}" class="breadcrumb-remove border-0 color-danger content-center bg-white fs-12 fw-500 ml-10 radius-md">
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
                                <h6></h6>
                                <div class="card-extra">
                                    <div class="card-tab btn-group nav nav-tabs">
                                        <a class="btn btn-xs btn-white active border-light" id="overview_tab" data-toggle="tab" href="#overview" role="tab" area-controls="intro" aria-selected="true">Overview</a>
                                        <a class="btn btn-xs btn-white border-light" id="commission_rates-tab" data-toggle="tab" href="#commission_rates" role="tab" area-controls="commission_rates" aria-selected="false">Commissions & Amount</a>
                                        <a class="btn btn-xs btn-white border-light" id="terms-tab" data-toggle="tab" href="#terms" role="tab" area-controls="terms" aria-selected="false">Text</a>
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
                                                        <th scope="col"  class="width-25">Field</th>
                                                        <th scope="col">Value</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>
                                                            {{ trans('cruds.transaction.fields.id') }}
                                                        </th>
                                                        <td>
                                                            {{ $transaction->transaction_id }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('cruds.transaction.fields.advertiser_name') }}
                                                        </th>
                                                        <td>
                                                            {{ $transaction->advertiser->name }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('cruds.transaction.fields.campaign_name') }}
                                                        </th>
                                                        <td>
                                                            {{ $transaction->campaign_name ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('cruds.transaction.fields.site_name') }}
                                                        </th>
                                                        <td>
                                                            {{ $transaction->site_name ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('cruds.transaction.fields.url') }}
                                                        </th>
                                                        <td>
                                                            {{ $transaction->url ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('cruds.transaction.fields.publisher_url') }}
                                                        </th>
                                                        <td>
                                                            {{ $transaction->publisher_url ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('cruds.transaction.fields.publisher_id') }}
                                                        </th>
                                                        <td>
                                                            {{ $transaction->publisher_id ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('cruds.transaction.fields.commission_sharing_publisher_id') }}
                                                        </th>
                                                        <td>
                                                            {{ $transaction->commission_sharing_publisher_id ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('cruds.transaction.fields.commission_sharing_selected_rate_publisher_id') }}
                                                        </th>
                                                        <td>
                                                            {{ $transaction->commission_sharing_selected_rate_publisher_id ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('cruds.transaction.fields.payment_id') }}
                                                        </th>
                                                        <td>
                                                            {{ $transaction->payment_id ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('cruds.transaction.fields.transaction_query_id') }}
                                                        </th>
                                                        <td>
                                                            {{ $transaction->transaction_query_id ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('cruds.transaction.fields.customer_country') }}
                                                        </th>
                                                        <td>
                                                            {{ $transaction->customer_country ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('cruds.transaction.fields.click_refs') }}
                                                        </th>
                                                        <td>
                                                            {{ isset($transaction->click_refs) ? implode(" | ", $transaction->click_refs) : "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('cruds.transaction.fields.click_date') }}
                                                        </th>
                                                        <td>
                                                            {{ $transaction->click_date ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('cruds.transaction.fields.transaction_date') }}
                                                        </th>
                                                        <td>
                                                            {{ $transaction->transaction_date ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('cruds.transaction.fields.validation_date') }}
                                                        </th>
                                                        <td>
                                                            {{ $transaction->validation_date ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('cruds.transaction.fields.voucher_code') }}
                                                        </th>
                                                        <td>
                                                            {{ $transaction->voucher_code ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('cruds.transaction.fields.lapse_time') }}
                                                        </th>
                                                        <td>
                                                            {{ $transaction->lapse_time ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('cruds.transaction.fields.click_device') }}
                                                        </th>
                                                        <td>
                                                            {{ $transaction->click_device ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('cruds.transaction.fields.advertiser_country') }}
                                                        </th>
                                                        <td>
                                                            {{ $transaction->advertiser_country ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('cruds.transaction.fields.order_ref') }}
                                                        </th>
                                                        <td>
                                                            {{ $transaction->order_ref ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('cruds.transaction.fields.ip_hash') }}
                                                        </th>
                                                        <td>
                                                            {{ $transaction->ip_hash ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('cruds.transaction.fields.source') }}
                                                        </th>
                                                        <td>
                                                            {{ $transaction->source ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('cruds.transaction.fields.custom_parameters') }}
                                                        </th>
                                                        <td>
                                                            {!! $transaction->custom_parameters ? "<ol><li>".implode("</li><li>", array_column($transaction->custom_parameters, "value"))."</li></ol>" : "-" !!}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="commission_rates" role="" aria-labelledby="commission_rates-tab">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-social">
                                                <thead>
                                                    <tr>
                                                        <th scope="col"  class="width-25">Field</th>
                                                        <th scope="col">Value</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>
                                                            {{ trans('cruds.transaction.fields.commission_type') }}
                                                        </th>
                                                        <td>
                                                            {{ $transaction->commission_type ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('cruds.transaction.fields.commission_status') }}
                                                        </th>
                                                        <td>
                                                            {{ ucwords($transaction->commission_status) }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('cruds.transaction.fields.received_sale_amount') }}
                                                        </th>
                                                        <td>
                                                            {{ $transaction->received_sale_amount ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('cruds.transaction.fields.received_commission') }}
                                                        </th>
                                                        <td>
                                                            {{ $transaction->received_commission_amount ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('cruds.transaction.fields.received_commission_amount_currency') }}
                                                        </th>
                                                        <td>
                                                            {{ $transaction->received_commission_amount_currency ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('cruds.transaction.fields.commission_amount') }}
                                                        </th>
                                                        <td>
                                                            {{ $transaction->commission_amount ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('cruds.transaction.fields.commission_amount_currency') }}
                                                        </th>
                                                        <td>
                                                            {{ $transaction->commission_amount_currency ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('cruds.transaction.fields.sale_amount') }}
                                                        </th>
                                                        <td>
                                                            {{ $transaction->sale_amount ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('cruds.transaction.fields.sale_amount_currency') }}
                                                        </th>
                                                        <td>
                                                            {{ $transaction->sale_amount_currency ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('cruds.transaction.fields.old_sale_amount') }}
                                                        </th>
                                                        <td>
                                                            {{ $transaction->old_sale_amount ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('cruds.transaction.fields.old_commission_amount') }}
                                                        </th>
                                                        <td>
                                                            {{ $transaction->old_commission_amount ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('cruds.transaction.fields.tracked_currency_amount') }}
                                                        </th>
                                                        <td>
                                                            {{ $transaction->tracked_currency_amount ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('cruds.transaction.fields.tracked_currency_currency') }}
                                                        </th>
                                                        <td>
                                                            {{ $transaction->tracked_currency_currency ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('cruds.transaction.fields.paid_to_publisher') }}
                                                        </th>
                                                        <td>
                                                            {{ $transaction->paid_to_publisher ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('cruds.transaction.fields.original_sale_amount') }}
                                                        </th>
                                                        <td>
                                                            {{ $transaction->original_sale_amount ?? "-" }}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="terms" role="" aria-labelledby="terms-tab">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-social min-height-zero">
                                                <thead>
                                                <tr>
                                                    <th scope="col"  class="width-25">Field</th>
                                                    <th scope="col">Value</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>
                                                            {{ trans('cruds.transaction.fields.amended_reason') }}
                                                        </th>
                                                        <td>
                                                            {!! $transaction->amended_reason ?? "-" !!}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('cruds.transaction.fields.decline_reason') }}
                                                        </th>
                                                        <td>
                                                            {!! $transaction->decline_reason ?? "-" !!}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('cruds.transaction.fields.customer_acquisition') }}
                                                        </th>
                                                        <td>
                                                            {!! $transaction->customer_acquisition ?? "-" !!}
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
