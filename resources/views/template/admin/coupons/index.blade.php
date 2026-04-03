@extends("layouts.admin.panel_table")

@pushonce('styles')
    <style>
    </style>
@endpushonce

@pushonce('scripts')
    <script type="text/javascript">
        $(function () {

            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.creative-management.coupons.massDestroy') }}",
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

            $('#datatableCoupon').dataTable({
                order:          [[1, 'asc']],
                scrollY:        true,
                scrollX:        true,
                scrollCollapse: true,
                paging:         true,
                autoWidth:      true,
                deferRender:    true,
                sScrollXInner:  "99.5%",
                ajax: {
                    url: "{{ route('admin.creative-management.coupons.index') }}",
                },
                columns: [
                    {data: 'id', name: 'id', width: "1%"},
                    {data: 'advertiser_name', name: 'advertiser_name', width: "25%"},
                    {data: 'title', name: 'title', width: "35%"},
                    {data: 'start_date', name: 'start_date', width: "10%"},
                    {data: 'end_date', name: 'end_date', width: "10%"},
                    {data: 'source', name: 'source', width: "1%"},
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
                            <h4 class="text-capitalize breadcrumb-title">{{ trans('creative.creativeManagement.coupon.title') }} {{ trans('global.list') }}</h4>
                            @can('role_create')
                                <div class="breadcrumb-action justify-content-center flex-wrap">
                                    <div class="action-btn">
                                        <a href="{{ route("admin.creative-management.coupons.create") }}" class="btn btn-sm btn-primary btn-add">
                                            <i class="la la-plus"></i> {{ trans('global.add') }} {{ trans('cruds.creativeManagement.coupon.title_singular') }}
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
                                       id="datatableCoupon">
                                    <thead>
                                        <tr class="userDatatable-header footable-header">
                                            <th></th>
                                            <th>
                                                {{ trans('creative.creativeManagement.coupon.fields.advertiser_name') }}
                                            </th>
                                            <th>
                                                {{ trans('creative.creativeManagement.coupon.fields.title') }}
                                            </th>
                                            <th>
                                                {{ trans('creative.creativeManagement.coupon.fields.start_date') }}
                                            </th>
                                            <th>
                                                {{ trans('creative.creativeManagement.coupon.fields.end_date') }}
                                            </th>
                                            <th>
                                                {{ trans('creative.creativeManagement.coupon.fields.source') }}
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
