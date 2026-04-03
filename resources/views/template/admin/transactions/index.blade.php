@extends("layouts.admin.panel_table")

@pushonce('styles')
@endpushonce

@pushonce('scripts')

    <script type="text/javascript">
        $(function () {

            $('#datatableTransaction').dataTable({
                order:          [[2, 'desc']],
                scrollY:        true,
                scrollX:        true,
                scrollCollapse: true,
                paging:         true,
                autoWidth:      true,
                deferRender:    true,
                sScrollXInner:  "170%",
                ajax: {
                    url: "{{ route('admin.transactions.index') }}",
                    data: function (d) {
                        d.source = $('#source').val();
                        d.country = $('#country').val();
                        d.search_filter = $('#search_filter').val();
                        d.payment_id = "{{ request()->input('payment_id') ?? '' }}";
                        d.r_name = "{{ request()->input('r_name') ?? '' }}";
                    },
                     dataSrc: function (json) {
           console.log("🔍 FULL DATATABLE RESPONSE:", json.totalCommission);
document.getElementById('totalCommission').innerHTML = 'Total Commission = $'+ json.totalCommission;

            return json.data; // important for DataTable
        }
                },
                columns: [
                    {data: 'transaction_id', name: 'transaction_id'},
                    {data: 'advertiser_name', name: 'advertiser_name', orderable: false, searchable: false},
                    {data: 'transaction_date', name: 'transaction_date'},
                    {data: 'customer_country', name: 'customer_country'},
                    {data: 'advertiser_country', name: 'advertiser_country'},
                    {data: 'paid_to_publisher', name: 'paid_to_publisher'},
                    {data: 'commission_status', name: 'commission_status'},
                    {data: 'payment_status', name: 'payment_status'},
                    {data: 'commission_amount', name: 'commission_amount'},
                    {data: 'commission_amount_currency', name: 'commission_amount_currency'},
                    {data: 'sale_amount', name: 'sale_amount'},
                    {data: 'received_commission_amount', name: 'received_commission_amount'},
                    {data: 'received_sale_amount', name: 'received_sale_amount'},
                    {data: 'sale_amount_currency', name: 'sale_amount_currency'},
                    {data: 'received_commission_amount_currency', name: 'received_commission_amount_currency'},
                    {data: 'source', name: 'source'},
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

            $('#source').change(() => {
                $('#datatableTransaction').DataTable().draw();
            });

            $('#country').change(() => {
                $('#datatableTransaction').DataTable().draw();
            });

            $('#search_filter').change(() => {
                $('#datatableTransaction').DataTable().draw();
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
                            <h4 class="text-capitalize breadcrumb-title">{{ trans('cruds.transaction.title') }} {{ trans('global.list') }}</h4>
                            <div class="breadcrumb-action justify-content-center flex-wrap">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="source" class="font-weight-bold text-black">Source: </label>
                                        <select class="js-example-basic-single js-states form-control" id="source" name="source">
                                            <option value="" disabled selected>Select</option>
                                            @foreach(\App\Helper\Static\Vars::OPTION_LIST as $list)
                                                <option value="{{ $list }}">{{ ucwords($list) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="source" class="font-weight-bold text-black">Country: </label>
                                        <select class="js-example-basic-single js-states form-control" id="country" name="country">
                                            <option value="" disabled selected>Select</option>
                                            @foreach($countries as $country)
                                                <option value="{{ $country['iso2'] }}">{{ $country['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="source" class="font-weight-bold text-black">Search Filter: </label>
                                        <select class="js-example-basic-single js-states form-control" id="search_filter" name="search_filter">
                                            <option value="" disabled selected>Select</option>
                                            @foreach($columns as $column)
                                                <option value="{{ $column }}">{{ $column }}</option>
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
                                <span id="totalCommission" style="text-align: end;display: block;font-size: 16px;font-weight: 800;margin: 15px;"></span>
                                @include("partial.admin.alert")

                                <table class="table table table-condensed table-bordered table-striped table-hover datatable"
                                       id="datatableTransaction">
                                    <thead>
                                    <tr class="userDatatable-header footable-header">
                                        <th>
                                            {{ trans('cruds.transaction.fields.transaction_id') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.transaction.fields.advertiser_name') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.transaction.fields.transaction_date') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.transaction.fields.customer_country') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.transaction.fields.advertiser_country') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.transaction.fields.paid_to_publisher') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.transaction.fields.commission_status') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.transaction.fields.payment_status') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.transaction.fields.commission_amount') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.transaction.fields.commission_amount_currency') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.transaction.fields.sale_amount') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.transaction.fields.received_commission_amount') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.transaction.fields.received_sale_amount') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.transaction.fields.sale_amount_currency') }}
                                        </th>
                                        <th>
                                            {{ trans('advertiser.api-advertiser.fields.received_commission_amount_currency') }}
                                        </th>
                                        <th>
                                            {{ trans('advertiser.api-advertiser.fields.source') }}
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
