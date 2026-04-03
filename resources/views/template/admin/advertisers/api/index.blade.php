@extends("layouts.admin.panel_table")

@pushonce('styles')
@endpushonce

@pushonce('scripts')
    <script type="text/javascript">
        function showOnPublisher(id)
        {
            $.ajax({
                url: `/{{ \App\Helper\Static\Vars::ADMIN_ROUTE }}/advertiser-management/api-advertisers/status/${id}`,
                type: 'GET',
            });
        }
        $(function () {

            $('#datatableApiAdvertiser').dataTable({
                order:          [[1, 'asc']],
                scrollY:        true,
                scrollX:        true,
                scrollCollapse: true,
                paging:         true,
                autoWidth:      true,
                deferRender:    true,
                sScrollXInner:  "99.5%",
                ajax: {
                    url: "{{ route('admin.advertiser-management.api-advertisers.index') }}",
                    data: function (d) {
                        d.manual_update = $('#manualUpdate').val();
                        d.source = $('#source').val();
                        d.country = $('#country').val();
                        d.status = $('#status').val();
                    }
                },
                columns: [
                    {data: 'advertiser_id', name: 'advertiser_id'},
                    {data: 'name', name: 'name'},
                    {data: 'url', name: 'url'},
                     {data: 'commission', name: 'commission'},
                      {data: 'commission_type', name: 'commission_type'},
                    {data: 'source', name: 'source'},
                    {data: 'click_through_url', name: 'click_through_url'},
                    {data: 'manual_update', name: 'manual_update', orderable: false, searchable: false},
                    {data: 'action', name: 'action', orderable: false, searchable: false, width: "0%"},
                ],
                columnDefs: [{
                    orderable: false,
                    className: '',
                    targets: 0
                }, {
                }],
                buttons: [{}]
            });

            $('#manualUpdate').change(() => {
                $('#datatableApiAdvertiser').DataTable().draw();
            });

            $('#source').change(() => {
                $('#datatableApiAdvertiser').DataTable().draw();
            });

            $('#country').change(() => {
                $('#datatableApiAdvertiser').DataTable().draw();
            });

            $('#status').change(() => {
                $('#datatableApiAdvertiser').DataTable().draw();
            });

        });
    </script>
@endpushonce

@section("content")

    <div class="contents">

        <div class="container-fluid">
            <div class="social-dash-wrap">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="breadcrumb-main">
                            <h4 class="text-capitalize breadcrumb-title">{{ trans('advertiser.api-advertiser.title') }} {{ trans('global.list') }}</h4>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="breadcrumb-main">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <select class="js-example-basic-single js-states form-control" id="manualUpdate" name="manualUpdate">
                                            <option value="" disabled selected>Select Manual Update</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-3">
                                        <select class="js-example-basic-single js-states form-control" id="status" name="status">
                                            <option value="" disabled selected>Status</option>
                                            <option value="1">Active</option>
                                            <option value="0">InActive</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <select class="js-example-basic-single js-states form-control" id="source" name="source">
                                            <option value="" disabled selected>Select Source</option>
                                            @foreach(\App\Helper\Static\Vars::OPTION_LIST as $list)
                                                <option value="{{ $list }}">{{ ucwords($list) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <select class="js-example-basic-single js-states form-control" id="country" name="country">
                                            <option value="" disabled selected>Select Country</option>
                                            @foreach($countries as $country)
                                                <option value="{{ $country['iso2'] }}">{{ $country['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">

                                @include("partial.admin.alert")

                                <table class="table table-bordered table-striped table-hover datatable"
                                       id="datatableApiAdvertiser">
                                    <thead>
                                        <tr class="userDatatable-header footable-header">
                                            <th>
                                                {{ trans('advertiser.api-advertiser.fields.short_advertiser_id') }}
                                            </th>
                                            <th>
                                                {{ trans('advertiser.api-advertiser.fields.name') }}
                                            </th>
                                            <th>
                                                {{ trans('advertiser.api-advertiser.fields.url') }}
                                            </th>
                                             <th>
                                                {{ trans('advertiser.api-advertiser.fields.commission') }}
                                            </th>

                                             <th>
                                                {{ trans('advertiser.api-advertiser.fields.commission_type') }}
                                            </th>
                                            <th>
                                                {{ trans('advertiser.api-advertiser.fields.source') }}
                                            </th>
                                            <th>
                                                {{ trans('advertiser.api-advertiser.fields.is_available_tracking_url') }}
                                            </th>
                                            <th>
                                                {{ trans('advertiser.api-advertiser.fields.manual_update') }}
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
