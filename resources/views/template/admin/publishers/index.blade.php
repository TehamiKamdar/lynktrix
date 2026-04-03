@extends("layouts.admin.panel_table")

@pushonce('styles')
    <style>
    </style>
@endpushonce

@pushonce('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        function goToLogin(email)
        {

            Swal.fire({
                title: 'Access Publisher Account',
                text: "If you access publisher account. Then Admin account will be logout. Do you want to access?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Login'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Please Wait!',
                        text: "Your publisher account will be access is few minutes.",
                        showConfirmButton: false,
                    });
                    window.location.href = `{{ url('/') }}/{{ \App\Helper\Static\Vars::ADMIN_ROUTE }}/access-login/${email}`;
                }
            })
        }
        $(function () {

            {{--let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)--}}
            {{--@can('crm_publisher_delete')--}}
            {{--let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'--}}
            {{--let deleteButton = {--}}
            {{--    text: deleteButtonTrans,--}}
            {{--    url: "{{ route('admin.publisher-management.publishers.massDestroy') }}",--}}
            {{--    className: 'btn-danger btn-xs ml-3',--}}
            {{--    action: function (e, dt, node, config) {--}}
            {{--        let ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {--}}
            {{--            return $(entry).attr("id");--}}
            {{--        });--}}
            {{--        if (ids.length === 0) {--}}
            {{--            alert('{{ trans('global.datatables.zero_selected') }}')--}}
            {{--            return--}}
            {{--        }--}}
            {{--        if (confirm('{{ trans('global.areYouSure') }}')) {--}}
            {{--            $.ajax({--}}
            {{--                headers: {'x-csrf-token': $('meta[name="csrf-token"]').attr('content')},--}}
            {{--                method: 'POST',--}}
            {{--                url: config.url,--}}
            {{--                data: { ids: ids, _method: 'DELETE' }})--}}
            {{--                .done(function () { location.reload() })--}}
            {{--        }--}}
            {{--    }--}}
            {{--}--}}
            {{--dtButtons.push(deleteButton)--}}
            {{--@endcan--}}

            $('#datatablePublisher').dataTable({
                order:          [[1, 'desc']],
                scrollY:        true,
                scrollX:        true,
                scrollCollapse: true,
                paging:         true,
                autoWidth:      true,
                deferRender:    true,
                sScrollXInner:  "99.5%",
                ajax: {
                    url: "{{ route('admin.publisher-management.publishers.index', ['status' => $status->value]) }}",
                },
                columns: [
                    {data: 'created_at', name: 'created_at'},
                    {data: 'sid', name: 'sid', width: "15%"},
                    {data: 'first_name', name: 'first_name', width: "15%"},
                    {data: 'last_name', name: 'last_name', width: "15%"},
                    {data: 'user_name', name: 'user_name', width: "15%"},
                    {data: 'email', name: 'email', width: "25%"},
                    {data: 'status', name: 'status', width: "1%"},
                    {data: 'access_login', name: 'access_login', width: "10%"},
                    {data: 'action', name: 'action', orderable: false, searchable: false, width: "0%"},
                ],
                columnDefs: [{
                    'targets': 0,
                    'checkboxes': {
                        'selectRow': false
                    }
                }],
                buttons: []
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
                            <h4 class="text-capitalize breadcrumb-title">{{ ucwords($status->value) }} {{ trans('cruds.publisher.title') }}</h4>
                            @can('role_create')
                                <div class="breadcrumb-action justify-content-center flex-wrap">
                                    <div class="action-btn">
                                        <a href="{{ route("admin.user-management.users.create") }}" class="btn btn-sm btn-primary btn-add">
                                            <i class="la la-plus"></i> {{ trans('global.add') }} {{ trans('cruds.publisher.title_singular') }}
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
                                       id="datatablePublisher">
                                    <thead>
                                        <tr class="userDatatable-header footable-header">
                                            <th>
                                                {{ trans('cruds.publisher.fields.created_at') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.publisher.fields.sid') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.publisher.fields.first_name') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.publisher.fields.last_name') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.publisher.fields.user_name') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.publisher.fields.email') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.publisher.fields.status') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.publisher.fields.access_login') }}
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
