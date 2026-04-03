@php
    $currencySign = "$";
@endphp
<table id="cart" class="table table-borderless">
    <thead>
    <tr class="product-cart__header">
        <th scope="col">Payment ID</th>
        <th scope="col">Description</th>
        <th scope="col" class="text-right">Quantity</th>
        <th scope="col" class="text-right">Amount</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th>{{ str_replace('LC-INV-', '', $paymentHistory->invoice_id) }}</th>
        <td class="Product-cart-title">
            <div class="media  align-items-center">
                <div class="media-body">
                    <h5 class="mt-0">Payment of Commissions up to {{ \Carbon\Carbon::parse($paymentHistory->paid_date)->format("d-m-Y") }}</h5>
                </div>
            </div>
        </td>
        <td class="invoice-quantity text-right">{{ count($paymentHistory->transaction_idz) }}</td>
        <td class="text-right order">{{ $currencySign }}{{ number_format($paymentHistory->commission_amount, 2) }}</td>
    </tr>
    </tbody>
    <tfoot>
    <tr>
        <td colspan="2"></td>
        <td class="order-summery float-right">
            <div class="total">
                <div class="subtotalTotal mb-0 text-right">
                    Subtotal :
                </div>
                <div class="shipping mb-0 text-right">
                    LinksCircle Revshare ({{ 100 - $paymentHistory->commission_percentage }}%) :
                </div>
                @if($paymentHistory->is_new_invoice == \App\Models\PaymentHistory::INVOICE_NEW)
                    <div class="shipping mb-0 text-right">
                        Processing Fee (2%) :
                    </div>
                @endif
            </div>
            <div class="total-money d-flex justify-content-between align-items-center mt-2 text-right float-right">
                <h6>Total Paid:</h6>
            </div>
        </td>

        <td>
            <div class="total-order float-right text-right fs-14 fw-500">
                <p>{{ $currencySign }}{{ number_format($paymentHistory->commission_amount, 2) }}</p>
                <p>{{ $currencySign }}{{ number_format($paymentHistory->commission_amount - $paymentHistory->lc_commission_amount, 2) }}</p>
                @if($paymentHistory->is_new_invoice == \App\Models\PaymentHistory::INVOICE_NEW)
                    @php
                        $cappedAmount = 30;
                        $feeCurrencySign = "AU$";
                        if($paymentHistory->payment_method->payment_method == \App\Helper\Static\Vars::PAYONEER) {
                            $feeCurrencySign = "$";
                            $cappedAmount = 20;
                        }
                        $processingFees = $paymentHistory->lc_commission_amount * 0.02;
                        $processingFees = $processingFees > $cappedAmount ? round($cappedAmount, 1) : round($processingFees, 1);
                    @endphp
                    <p>{{ $feeCurrencySign }}{{ number_format($processingFees, 2) }}</p>
                @endif
                @if(!empty($paymentHistory->converted_amount))
<h5 class="text-primary">{{ $currencySign }}{{ number_format((float) preg_replace('/[^\d.\-]/', '', $paymentHistory->converted_amount), 2) }}</h5>
                @else
 <h5 class="text-primary">{{ $currencySign }}{{ number_format($paymentHistory->lc_commission_amount - $processingFees, 2) }}</h5>
                @endif
               
            </div>
        </td>
    </tr>
    </tfoot>
</table>
