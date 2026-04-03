@extends("layouts.admin.panel_table")

@pushonce('scripts')
    <script type="text/javascript">
        function showDetails()
        {
            $('#datatableStatisticDeepLink').dataTable({
                order:          [[0, 'desc']],
                scrollY:        true,
                scrollX:        true,
                scrollCollapse: true,
                paging:         true,
                autoWidth:      true,
                deferRender:    true,
                sScrollXInner:  "150%",
                ajax: {
                    url: "{{ route('admin.statistics.deeplinks.show', ['deeplink' => $deeplink->id]) }}"
                },
                columns: [
                    {data: 'ip_address', name: 'ip_address', },
                    {data: 'operating_system', name: 'operating_system'},
                    {data: 'browser', name: 'browser'},
                    {data: 'device', name: 'device'},
                    {data: 'referer_url', name: 'referer_url'},
                    {data: 'country', name: 'country'},
                    {data: 'iso2', name: 'iso2'},
                    {data: 'region', name: 'region'},
                    {data: 'city', name: 'city'},
                    {data: 'zipcode', name: 'zipcode'},
                    {data: 'created_at', name: 'created_at'}
                ],
                columnDefs: [{
                    orderable: false,
                    className: '',
                    targets: 0
                }, {
                }],
                buttons: [{}]
            });

            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

            $("#detail-tab").removeAttr("onclick")
        }
    </script>
@endpushonce

@pushonce('styles')

    <style>
        table{
            margin: 0 auto;
            width: 100%;
            clear: both;
            border-collapse: collapse;
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
    </style>

@endpushonce

@section("content")
    <div class="contents">

        <div class="container-fluid">
            <div class="social-dash-wrap">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="breadcrumb-main">
                            <h4 class="text-capitalize breadcrumb-title">{{ trans('global.show') }} {{ trans('link.statistics.links.title_singular') }}</h4>
                            <div class="breadcrumb-action justify-content-center flex-wrap">
                                <div class="action-btn">
                                    <a href="{{ route("admin.statistics.deeplinks.index") }}" class="breadcrumb-remove border-0 color-danger content-center bg-white fs-12 fw-500 ml-10 radius-md">
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
                                        <a class="btn btn-xs btn-white active border-light" id="basic_intro_tab" data-toggle="tab" href="#basic_intro" role="tab" area-controls="intro" aria-selected="true">Intro</a>
                                        <a class="btn btn-xs btn-white border-light" id="detail-tab" data-toggle="tab" href="#detail" role="tab" area-controls="detail" aria-selected="false" onclick="showDetails()">Tracking Detail</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0">

                                @include("partial.admin.alert")

                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="basic_intro" role="" aria-labelledby="basic_intro_tab">
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
                                                            {{ trans('link.statistics.links.fields.publisher_name') }}
                                                        </th>
                                                        <td>
                                                            {{ isset($deeplink->publisher->first_name) && isset($deeplink->publisher->last_name) ? $deeplink->publisher->first_name . " " . $deeplink->publisher->last_name : "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('link.statistics.links.fields.advertiser_name') }}
                                                        </th>
                                                        <td>
                                                            {{ $deeplink->advertiser->name ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('link.statistics.links.fields.website_name') }}
                                                        </th>
                                                        <td>
                                                            {{ $deeplink->website->name ?? "-" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('link.statistics.links.fields.click_through_url') }}
                                                        </th>
                                                        <td>
                                                            <a href="{{ $deeplink->click_through_url }}" target="_blank">{{ $deeplink->click_through_url }}</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('link.statistics.links.fields.tracking_url') }}
                                                        </th>
                                                        <td>
                                                            <a href="{{ $deeplink->tracking_url }}" target="_blank">{{ $deeplink->tracking_url }}</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('link.statistics.links.fields.hits') }}
                                                        </th>
                                                        <td>
                                                            {{ $deeplink->hits ?? "0" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('link.statistics.links.fields.unique_visitor') }}
                                                        </th>
                                                        <td>
                                                            {{ $deeplink->unique_visitor ?? "0" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('link.statistics.links.fields.generated_at') }}
                                                        </th>
                                                        <td>
                                                            {{ \Carbon\Carbon::parse($deeplink->created_at)->format("Y-m-d h:i:s a") }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('link.statistics.links.fields.last_activity') }}
                                                        </th>
                                                        <td>
                                                            {{ \Carbon\Carbon::parse($deeplink->updated_at)->format("Y-m-d h:i:s a") }}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade p-3" id="detail" role="" aria-labelledby="detail-tab">
                                        <table class="table m-0 table-bordered adv-table adv-data-table footable footable-1 footable-filtering footable-filtering-right footable-paging footable-paging-right breakpoint-lg"
                                               id="datatableStatisticDeepLink">
                                            <thead>
                                                <tr class="userDatatable-header footable-header">
                                                    <th class="footable-sortable footable-first-visible table-cell">
                                                        {{ trans('link.statistics.links.fields.ip_address') }}
                                                    </th>
                                                    <th class="footable-sortable footable-first-visible table-cell">
                                                        {{ trans('link.statistics.links.fields.operating_system') }}
                                                    </th>
                                                    <th class="footable-sortable footable-first-visible table-cell">
                                                        {{ trans('link.statistics.links.fields.browser') }}
                                                    </th>
                                                    <th class="footable-sortable footable-first-visible table-cell">
                                                        {{ trans('link.statistics.links.fields.device') }}
                                                    </th>
                                                    <th class="footable-sortable footable-first-visible table-cell">
                                                        {{ trans('link.statistics.links.fields.referer_url') }}
                                                    </th>
                                                    <th class="footable-sortable footable-first-visible table-cell">
                                                        {{ trans('link.statistics.links.fields.country') }}
                                                    </th>
                                                    <th class="footable-sortable footable-first-visible table-cell">
                                                        {{ trans('link.statistics.links.fields.iso2') }}
                                                    </th>
                                                    <th class="footable-sortable footable-first-visible table-cell">
                                                        {{ trans('link.statistics.links.fields.region') }}
                                                    </th>
                                                    <th class="footable-sortable footable-first-visible table-cell">
                                                        {{ trans('link.statistics.links.fields.city') }}
                                                    </th>
                                                    <th class="footable-sortable footable-first-visible table-cell">
                                                        {{ trans('link.statistics.links.fields.zipcode') }}
                                                    </th>
                                                    <th class="footable-sortable footable-first-visible table-cell">
                                                        {{ trans('link.statistics.links.fields.created_at') }}
                                                    </th>
                                                </tr>
                                            </thead>
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
@endsection
