@extends("layouts.admin.panel_table")

@pushonce('styles')
@endpushonce

@pushonce('scripts')
    <script type="text/javascript">
        function movePendingToPay(ids) {
            $.ajax({
                url: "{{ route('admin.transactions.missing.payment.store') }}",
                type: 'POST',
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                data: { transaction_ids: ids }
            }).done(function () {
                location.reload();
            });
        }

        $(document).ready(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);

            function addStatusChangeButton(text, color) {
                dtButtons.push({
                    text: text,
                    className: `btn-${color} btn-xs ml-3`,
                    action: function (e, dt, node, config) {
                        let ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
                            return $(entry).attr("id");
                        });
                        if (ids.length === 0) {
                            alert('{{ trans('global.datatables.zero_selected') }}');
                            return;
                        }
                        if (confirm('{{ trans('global.areYouSure') }}')) {
                            movePendingToPay(ids);
                        }
                    }
                });
            }

            addStatusChangeButton("Approve", "success");

            let table = $('#datatableTransaction').DataTable({
                order: [[2, 'desc']],
                scrollY: true,
                scrollX: true,
                scrollCollapse: true,
                paging: true,
                autoWidth: false,
                deferRender: true,
                sScrollXInner: "190%",
                ajax: {
                    url: "{{ route('admin.transactions.rakuten.payment') }}",
                    data: function (d) {
                        d.country = $('#country').val();
                    }
                },
                columns: [
                    { data: 'transaction_id', name: 'transaction_id' },
                    { data: 'order_ref', name: 'order_ref' },
                    { data: 'transaction_date', name: 'transaction_date' },
                    { data: 'advertiser_name', name: 'advertiser_name' },
                    { data: 'publisher_domain', name: 'publisher_domain' },
                    { data: 'commission_status', name: 'commission_status' },
                    { data: 'commission_amount', name: 'commission_amount' },
                    { data: 'commission_amount_currency', name: 'commission_amount_currency' },
                    { data: 'received_commission_amount', name: 'received_commission_amount' },
                    { data: 'received_commission_amount_currency', name: 'received_commission_amount_currency' },
                    { data: 'sale_amount', name: 'sale_amount' },
                    { data: 'received_sale_amount', name: 'received_sale_amount' },
                    { data: 'action', name: 'action', orderable: false, searchable: false, width: "0%" }
                ],
                columnDefs: [
                    { orderable: false, targets: 12 }
                ],
                buttons: dtButtons
            });

            // Event to select or deselect row on any column click
            $('#datatableTransaction tbody').on('click', 'tr', function() {
                let table = $('#datatableTransaction').DataTable();
                if ($(this).hasClass('selected')) {
                    $(this).removeClass('selected');
                    table.row(this).deselect();
                } else {
                    $(this).addClass('selected');
                    table.row(this).select();
                }
            });

            // Filter data based on selected country
            $('#country').change(function() {
                table.ajax.reload();
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
                            <h4 class="text-capitalize breadcrumb-title">Transaction Rakuten Payment List</h4>
                            <div class="breadcrumb-action justify-content-center flex-wrap">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="source" class="font-weight-bold text-black">Country: </label>
                                        <select class="js-example-basic-single js-states form-control" id="country" name="country">
                                            <option value="" disabled selected>Select</option>
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

                                <table class="table table table-condensed table-bordered table-striped table-hover datatable"
                                       id="datatableTransaction">
                                    <thead>
                                        <tr class="userDatatable-header footable-header">
                                            <th>
                                                Transaction ID
                                            </th>
                                            <th>
                                                Order ID
                                            </th>
                                            <th>
                                                Transaction Date
                                            </th>
                                            <th>
                                                Advertiser Name
                                            </th>
                                            <th>
                                                Publisher Domain
                                            </th>
                                            <th>
                                                Commission Status
                                            </th>
                                            <th>
                                                Commission Amount
                                            </th>
                                            <th>
                                                Commission Amount Currency
                                            </th>
                                            <th>
                                                Received Commission Amount
                                            </th>
                                            <th>
                                                Received Commission Amount Currency
                                            </th>
                                            <th>
                                                Sales Amount
                                            </th>
                                            <th>
                                                Received Sales Amount
                                            </th>
                                            <th>
                                                Action
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
