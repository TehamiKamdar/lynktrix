<div class="tab-content spin-embadded" id="ap-tabContent">

    <!-- Start Table Responsive -->
    <div class="table-responsive">
        <table class="table mb-0 table-hover table-primary border-0">
            <thead>
                <tr class="userDatatable-header">
                    <th>
                        <span class="userDatatable-title">Invoice#</span>
                    </th>
                    <th>
                        <span class="userDatatable-title">Date</span>
                    </th>
                    <th>
                        <span class="userDatatable-title">Payment ID</span>
                    </th>
                    <th>
                        <span class="userDatatable-title">Domain</span>
                    </th>
                    <th>
                        <span class="userDatatable-title">Method</span>
                    </th>
                    <th>
                        <span class="userDatatable-title">Amount</span>
                    </th>
                    <th>
                        <span class="userDatatable-title">LC Revshare</span>
                    </th>
                    <th>
                        <span class="userDatatable-title">Paid Amount</span>
                    </th>
                    <th>
                        <span class="userDatatable-title">Paid Date</span>
                    </th>
                    <th>
                        <span class="userDatatable-title">Status</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @if(count($payments))
                    @foreach($payments as $payment)

                        <tr>

                            <td>
                                <div class="orderDatatable-title">
                                    {{ $payment->invoice_id }}
                                </div>
                            </td>
                            <td>
                                <div class="orderDatatable-title">
                                    {{ \Carbon\Carbon::parse($payment->created_at)->format("d-m-Y") }}
                                </div>
                            </td>
                            <td>
                                <div class="orderDatatable-title">
                                    {{ $payment->payment_id }}
                                </div>
                            </td>
                            <td>
                                <div class="orderDatatable-title">
                                    @php
                                    $website = App\Models\Website::find($payment->website_id)
                                    @endphp
                                    @if($website)
                                    {{$website->name  }}
                                    @endif

                                </div>
                            </td>
                            <td>
                                <div class="orderDatatable-title">
                                    {{ ucwords($payment->payment_method->payment_method ?? "-") }}
                                </div>
                            </td>
                            <td>
                                <div class="orderDatatable-title">
                                    ${{ number_format($payment->commission_amount, 2) ?? 0 }}
                                </div>
                            </td>
                            <td>
                                <div class="orderDatatable-title">
                                    ${{ number_format($payment->commission_amount - $payment->lc_commission_amount, 2) ?? 0 }}
                                </div>
                            </td>
                            <td>
                                <div class="orderDatatable-title">
                                    @php
                                        if($payment->is_new_invoice == \App\Models\PaymentHistory::INVOICE_NEW)
                                        {
                                            $cappedAmount = 30;
                                            if($payment->payment_method->payment_method == \App\Helper\Static\Vars::PAYONEER) {
                                                $cappedAmount = 20;
                                            }
                                            $processingFees = $payment->lc_commission_amount * 0.02;
                                            $processingFees = $processingFees > $cappedAmount ? round($cappedAmount, 1) : round($processingFees, 1);
                                            $amount = "$".number_format($payment->lc_commission_amount - $processingFees, 2);
                                        }
                                        else
                                        {
                                            $amount = "$".number_format($payment->lc_commission_amount, 2);
                                        }

                                    @endphp
                                    {{ $amount ?? 0 }}
                                </div>
                            </td>
                            <td>
                                <div class="orderDatatable-title">
                                    {{ $payment->paid_date ?? "-" }}
                                </div>
                            </td>
                            <td>
                                @if($payment->status == \App\Models\PaymentHistory::PENDING)
                                    <div class="orderDatatable-status d-inline-block">
                                        <span class="order-bg-opacity-warning  text-warning rounded-pill active">Pending</span>
                                    </div>
                                @elseif($payment->status == \App\Models\PaymentHistory::PAID)
                                    <div class="orderDatatable-status d-inline-block">
                                        <span class="order-bg-opacity-primary  text-primary rounded-pill active">Paid</span>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group atbd-button-group btn-group-normal" role="group ">
                                    @php
                                        $status = $payment->status == \App\Models\Transaction::STATUS_PAID ? "paid" : "pending";
                                    @endphp
                                    <a href="{{ route("publisher.reports.transactions.list") }}?payment_id={{ $payment->id }}&r_name={{ $status }}" type="button" class="btn  btn-xs btn-outline-dark">Transactions</a>
                                    @if($payment->status == \App\Models\PaymentHistory::PAID)
                                        <a href="{{ route("publisher.payments.invoice", ['payment_history' => $payment->id]) }}" type="button" class="btn btn-xs btn-outline-dark">Invoice</a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        <!-- End: tr -->

                    @endforeach
                @else
                    <tr>
                        <td colspan="10">
                            <h6 class="text-center my-2">Transaction Data Not Exist</h6>
                        </td>
                    </tr>
                @endif

            </tbody>
        </table>
    </div>
    <!-- Table Responsive End -->

    @include("template.publisher.widgets.loader")

</div>

@if(count($payments) && $payments instanceof \Illuminate\Pagination\LengthAwarePaginator )

    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-sm-end justify-content-star mt-1 mb-30">

                {{ $payments->withQueryString()->links() }}

            </div>
        </div>
    </div>

@endif
