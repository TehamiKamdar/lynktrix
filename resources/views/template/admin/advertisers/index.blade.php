@extends("layouts.admin.panel_table")

@pushonce('styles')
@endpushonce

@pushonce('scripts')
    <script type="text/javascript">
        $(function () {

            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.advertiser-management.advertisers.massDestroy') }}",
                className: 'btn-danger btn-xs ml-3',
                action: function (e, dt, node, config) {
                    let ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
                        return $(entry).attr("id");
                    });
                    if (ids.length === 0) {
                        alert('{{ trans('global.datatables.zero_selected') }}')
                        return
                    }
                    if (confirm('{{ trans('global.areYouSure') }}')) {
                        $.ajax({
                            headers: {'x-csrf-token': $('meta[name="csrf-token"]').attr('content')},
                            method: 'POST',
                            url: config.url,
                            data: { ids: ids, _method: 'DELETE' }})
                            .done(function () { location.reload() })
                    }
                }
            }
            dtButtons.push(deleteButton)

            $('#datatableAdvertiser').dataTable({
                order:          [[1, 'desc']],
                scrollY:        true,
                scrollX:        true,
                scrollCollapse: true,
                paging:         true,
                autoWidth:      true,
                deferRender:    true,
                sScrollXInner:  "99.5%",
                ajax: "{{ route('admin.advertiser-management.advertisers.index') }}",
                columns: [
                    {data: 'created_at', name: 'created_at'},
                    {data: 'first_name', name: 'first_name'},
                    {data: 'last_name', name: 'last_name'},
                    {data: 'user_name', name: 'user_name'},
                    {data: 'email', name: 'email'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action', orderable: false, searchable: false, width: "0%"},
                ],
                buttons: dtButtons,
                columnDefs: [{
                    'targets': 0,
                    'checkboxes': {
                        'selectRow': false
                    }
                }],
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
                            <h4 class="text-capitalize breadcrumb-title">{{ trans('cruds.advertiser.title') }} {{ trans('global.list') }}</h4>
                            @can('role_create')
                                <div class="breadcrumb-action justify-content-center flex-wrap">
                                    <div class="action-btn">
                                        <a href="{{ route("admin.user-management.users.create") }}" class="btn btn-sm btn-primary btn-add">
                                            <i class="la la-plus"></i> {{ trans('global.add') }} {{ trans('cruds.advertiser.title_singular') }}
                                        </a>
                                    </div>
                                </div>
                            @endcan
                        </div>

                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">

                                @include("partial.admin.alert")

                                <table class="table table table-condensed table-bordered table-striped table-hover datatable"
                                       id="datatableAdvertiser">
                                    <thead>
                                        <tr class="userDatatable-header footable-header">
                                            <th>
                                                {{ trans('cruds.advertiser.fields.created_at') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.advertiser.fields.first_name') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.advertiser.fields.last_name') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.advertiser.fields.user_name') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.advertiser.fields.email') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.advertiser.fields.status') }}
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
