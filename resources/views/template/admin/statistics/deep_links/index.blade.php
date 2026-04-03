@extends("layouts.admin.panel_table")

@pushonce('styles')
@endpushonce

@pushonce('scripts')
    <script type="text/javascript">
        $(function () {

            $('#datatableStatisticDeepLink').dataTable({
                order:          [[0, 'asc']],
                scrollY:        true,
                scrollX:        true,
                scrollCollapse: true,
                paging:         true,
                autoWidth:      true,
                deferRender:    true,
                sScrollXInner:  "99.5%",
                ajax: {
                    url: "{{ route('admin.statistics.deeplinks.index') }}",
                    data: function (d) {

                    }
                },
                columns: [
                    {data: 'publisher_name', name: 'publisher_name'},
                    {data: 'advertiser_name', name: 'advertiser_name'},
                    {data: 'website_name', name: 'website_name'},
                    {data: 'last_activity', name: 'last_activity'},
                    {data: 'hits', name: 'hits'},
                    {data: 'unique_visitor', name: 'unique_visitor'},
                    {data: 'action', name: 'action', orderable: false, searchable: false, width: "0%"},
                ],
                columnDefs: [{
                    // orderable: false,
                    // className: '',
                    // targets: 0
                }, {
                }],
                buttons: [{}]
            });

        });
    </script>
@endpushonce

@section("content")

    <div class="contents">

        <div class="container-fluid">
            <div class="social-dash-wrap">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="breadcrumb-main">
                            <h4 class="text-capitalize breadcrumb-title">{{ trans('link.statistics.links.deep_title') }} {{ trans('global.list') }}</h4>
                        </div>

                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">

                                @include("partial.admin.alert")

                                <table class="table table table-condensed table-bordered table-striped table-hover datatable"
                                       id="datatableStatisticDeepLink">
                                    <thead>
                                    <tr class="userDatatable-header footable-header">
                                        <th>
                                            {{ trans('link.statistics.links.fields.publisher_name') }}
                                        </th>
                                        <th>
                                            {{ trans('link.statistics.links.fields.advertiser_name') }}
                                        </th>
                                        <th>
                                            {{ trans('link.statistics.links.fields.website_name') }}
                                        </th>
                                        <th>
                                            {{ trans('link.statistics.links.fields.last_activity') }}
                                        </th>
                                        <th>
                                            {{ trans('link.statistics.links.fields.hits') }}
                                        </th>
                                        <th>
                                            {{ trans('link.statistics.links.fields.unique_visitor') }}
                                        </th>
                                        <th>
                                            {{ trans('global.action') }}
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

@endsection
