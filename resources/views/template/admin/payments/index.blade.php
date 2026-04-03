@extends("layouts.admin.panel_table")

@pushonce('styles')
    <style>
    </style>
@endpushonce

@pushonce('scripts')
    <script type="text/javascript">

        function sendStatusData(ids, status)
        {
            $.ajax({
                url: "{{ route('admin.payment-management.statusUpdate') }}",
                type: 'POST',
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                data: { transaction_ids: ids, status: status }
            }).done(function () { location.reload() });
        }

        $(function () {

            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

            function statusChange(status, approveButtonTrans, color)
            {
                let approveButton = {
                    text: approveButtonTrans,
                    className: `btn-${color} btn-xs ml-3`,
                    action: function (e, dt, node, config) {
                        let ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
                            return $(entry).attr("id");
                        });
                        if (ids.length === 0) {
                            alert('{{ trans('global.datatables.zero_selected') }}')
                            return
                        }
                        if (confirm('{{ trans('global.areYouSure') }}')) {
                            sendStatusData(ids, status)
                        }
                    }
                }
                dtButtons.push(approveButton)
            }

            @if($section->value == \App\Models\PaymentHistory::PENDING_TO_PAY)

                statusChange("confirm", "Confirm", "success")
                statusChange("reject", "Reject", "danger")

            @elseif($section->value == \App\Models\PaymentHistory::PAID_TO_PUBLISHER)

                statusChange("release", "Release", "success")
                // statusChange("view", "View", "info")

            @endif

            $('#datatableTransaction').dataTable({
                order:          [[1, 'desc']],
                scrollY:        true,
                scrollX:        true,
                scrollCollapse: true,
                paging:         true,
                autoWidth:      true,
                deferRender:    true,
                sScrollXInner:  "99.5%",
                ajax: {
                    url: `{{ route("admin.payment-management.index", ["section" => $section->value ]) }}`,
                    data: function (d) {
                        d.source = $('#source').val();
                        d.publisher = $('#publisher').val();

                        @if(count($columns))
                            d.search_filter = $('#search_filter').val();
                        @endif
                    }
                },
                columns: [
                    {data: 'id', name: 'id', orderable: false, searchable: false, width: "0%"},
                    {data: 'transaction_date', name: 'transaction_date'},
                    {data: 'transaction_id', name: 'transaction_id'},
                    {data: 'advertiser_name', name: 'advertiser_name', orderable: false, searchable: false},
                    {data: 'sale_amount', name: 'sale_amount'},
                    {data: 'commission_amount', name: 'commission_amount'},
                    {data: 'name', name: 'name'},
                    {data: 'source', name: 'source'},
                    {data: 'payment_status', name: 'payment_status'},
                    {data: 'action', name: 'action', orderable: false, searchable: false, width: "0%"},
                ],
                buttons: dtButtons
            });

            $('#source').change(() => {
                $('#datatableTransaction').DataTable().draw();
            });

            $('#publisher').change(() => {
                $('#datatableTransaction').DataTable().draw();
            });

            @if(count($columns))

                $('#search_filter').change(() => {
                    $('#datatableTransaction').DataTable().draw();
                });

            @endif

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
                            <h4 class="text-capitalize breadcrumb-title">{{ $title }} {{ trans('global.list') }}</h4>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="breadcrumb-main">
                            <div class="container">
                                <div class="row">
                                    @if(empty($columns))
                                        <div class="col-lg-4">
                                        </div>
                                    @endif
                                    <div class="col-lg-4">
                                        <select class="js-example-basic-single js-states form-control" id="publisher" name="publisher">
                                            <option value="" disabled selected>Select Publisher</option>
                                            @foreach($publishers as $publisher)
                                                <option value="{{ $publisher['id'] }}">{{ $publisher['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <select class="js-example-basic-single js-states form-control" id="source" name="source">
                                            <option value="" disabled selected>Select Network</option>
                                            @foreach(\App\Helper\Static\Vars::OPTION_LIST as $list)
                                                <option value="{{ $list }}">{{ ucwords($list) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if(count($columns))
                                        <div class="col-lg-4">
                                            <select class="js-example-basic-single js-states form-control" id="search_filter" name="search_filter">
                                                <option value="" disabled selected>Search Filter</option>
                                                @foreach($columns as $column)
                                                    <option value="{{ $column }}">{{ $column }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
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

                                <table class="table table table-condensed table-bordered table-striped table-hover datatable"
                                       id="datatableTransaction">
                                    <thead>
                                        <tr class="userDatatable-header footable-header">
                                            <th></th>
                                            <th>
                                                {{ trans('cruds.paymentManagement.fields.transaction_date') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.paymentManagement.fields.transaction_id') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.paymentManagement.fields.advertiser_name') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.paymentManagement.fields.sale_amount') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.paymentManagement.fields.commission_amount') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.paymentManagement.fields.publisher_domain') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.paymentManagement.fields.network') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.paymentManagement.fields.status') }}
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
