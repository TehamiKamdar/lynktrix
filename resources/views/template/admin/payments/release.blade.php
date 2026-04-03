@extends("layouts.admin.panel_table")

@pushonce('styles')
    <style>
    </style>
@endpushonce

@pushonce('scripts')
    <script type="text/javascript">

        function sendStatusData(id)
        {
            $("#paymentID").val(id);
            $("#comments").val('');
        }

        $(function () {

            let columns, sortColumn = 0;

            @if($section->value == \App\Models\PaymentHistory::RELEASE_PAYMENT)
                columns = [
                    {data: 'created_at', name: 'created_at'},
                    {data: 'url', name: 'url'},
                    {data: 'payment_method', name: 'payment_method'},
                    {data: 'payment_details', name: 'payment_details'},
                    {data: 'payment_option', name: 'payment_option'},
                    {data: 'amount', name: 'amount'},
                    {data: 'amount_to_pay', name: 'amount_to_pay'},
                    {data: 'action', name: 'action', orderable: false, searchable: false, width: "10%"},
                ];
            @else
                columns = [
                    {data: 'created_at', name: 'created_at'},
                    {data: 'paid_date', name: 'paid_date'},
                    {data: 'url', name: 'url'},
                    {data: 'payment_method', name: 'payment_method'},
                    {data: 'payment_details', name: 'payment_details'},
                    {data: 'payment_option', name: 'payment_option'},
                    {data: 'amount', name: 'amount'},
                    {data: 'amount_to_pay', name: 'amount_to_pay'},
                    {data: 'action', name: 'action', orderable: false, searchable: false, width: "10%"},
                ];
                sortColumn = 1;
            @endif

            $('#datatableTransaction').dataTable({
                order:          [[sortColumn, 'desc']],
                scrollY:        true,
                scrollX:        true,
                scrollCollapse: true,
                paging:         true,
                autoWidth:      true,
                deferRender:    true,
                sScrollXInner:  "120%",
                ajax: {
                    url: `{{ route("admin.payment-management.index", ["section" => $section->value ]) }}`,
                    data: function (d) {
                        d.publisher = $('#publisher').val();
                    }
                },
                columns: columns,
                buttons: [],
                columnDefs: [{
                    'targets': 0,
                    'checkboxes': {
                        'selectRow': true
                    }
                }]
            });

            $('#publisher').change(() => {
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
                    <div class="col-lg-2">
                        <div class="breadcrumb-main">
                            <h4 class="text-capitalize breadcrumb-title">{{ $title }} {{ trans('global.list') }}</h4>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="breadcrumb-main p-0">
                            <a href="{{ route("admin.payment-management.releasePaymentExport") }}" class="btn btn-xs btn-primary">Export XSLX</a>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="breadcrumb-main">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-4">
                                    </div>
                                    <div class="col-lg-4">
                                    </div>
                                    <div class="col-lg-4">
                                        <select class="js-example-basic-single js-states form-control" id="publisher" name="publisher">
                                            <option value="" disabled selected>Select Publisher</option>
                                            @foreach($publishers as $publisher)
                                                <option value="{{ $publisher['id'] }}">{{ $publisher['name'] }}</option>
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

                                <table class="table table table-condensed table-bordered table-striped table-hover datatable"
                                       id="datatableTransaction">
                                    <thead>
                                        <tr class="userDatatable-header footable-header">
                                            <th>
                                                {{ trans('cruds.paymentManagement.fields.created_at') }}
                                            </th>
                                            @if($section->value == \App\Models\PaymentHistory::PAYMENT_HISTORY)
                                                <th>
                                                    Paid Date
                                                </th>
                                            @endif
                                            <th>
                                                {{ trans('cruds.paymentManagement.fields.publisher_domain') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.paymentManagement.fields.payment_method') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.paymentManagement.fields.payment_details') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.paymentManagement.fields.payment_option') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.paymentManagement.fields.amount') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.paymentManagement.fields.amount_to_pay') }}
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

        <div class="modal-basic modal fade" id="modal-basic" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <form action="{{ route("admin.payment-management.statusUpdateReleasePayment") }}" method="POST">
                    @csrf
                    <input type="hidden" id="paymentID" name="paymentID">

                    <div class="modal-content modal-bg-white ">
                        <div class="modal-header">
                            <h6 class="modal-title">Release Payment</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span data-feather="x"></span></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="converted_amount" class="font-weight-bold mt-1 text-black">Converted Amount:</label>
                                <input class="form-control" name="converted_amount" id="converted_amount" />
                            </div>
                            <div class="form-group">
                                <label for="transaction_id" class="font-weight-bold mt-1 text-black">Transaction ID:</label>
                                <input class="form-control" name="transaction_id" id="transaction_id" />
                            </div>
                            <div class="form-group">
                                <label for="comments" class="font-weight-bold mt-1 text-black">Add Comments:</label>
                                <textarea class="form-control" rows="4" cols="4" name="comments" id="comments"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm">Release</button>
                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection
