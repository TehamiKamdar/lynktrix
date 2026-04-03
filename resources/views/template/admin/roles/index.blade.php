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
                url: "{{ route('admin.user-management.roles.massDestroy') }}",
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

            $('#datatableRole').dataTable({
                order:          [[1, 'asc']],
                scrollY:        true,
                scrollX:        true,
                scrollCollapse: true,
                paging:         true,
                autoWidth:      true,
                deferRender:    true,
                sScrollXInner:  "99.5%",
                ajax: "{{ route('admin.user-management.roles.index') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'title', name: 'title'},
                    {data: 'permissions', name: 'permissions'},
                    {data: 'action', name: 'action', orderable: false, searchable: false, width: "0%"},
                ],
                buttons: dtButtons
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
                            <h4 class="text-capitalize breadcrumb-title">{{ trans('cruds.role.title') }} {{ trans('global.list') }}</h4>

                            <div class="breadcrumb-action justify-content-center flex-wrap">
                                <div class="action-btn">
                                    <a href="{{ route("admin.user-management.roles.create") }}" class="btn btn-sm btn-primary btn-add">
                                        <i class="la la-plus"></i> {{ trans('global.add') }} {{ trans('cruds.role.title_singular') }}
                                    </a>
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
                                       id="datatableRole">
                                    <thead>
                                    <tr class="userDatatable-header footable-header">
                                        <th></th>
                                        <th>
                                            {{ trans('cruds.role.fields.title') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.role.fields.permissions') }}
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
