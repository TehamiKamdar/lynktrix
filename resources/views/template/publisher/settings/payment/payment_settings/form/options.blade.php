<div class="atbd-collapse atbd-accordion lc-payment {{ isset($payment->id) ? 'display-hidden' : '' }}" id="paymentContent">

    @if(isset($payment->payment_method) && $payment->payment_method == "bank" || $isPaymentChangeable || $payment->payment_method == "")
        <div class="atbd-collapse-item">
            <div class="atbd-collapse-item__header border-0">
                <label for='bank' class="form-control d-flex align-items-center justify-content-between">
                    <input type='radio' id='bank' name='payment_method' class="radio" value="bank" required {{ isset($payment->payment_method) && $payment->payment_method == "bank" ? "checked" : "" }} /><h6>Bank Transfer</h6>
                    <a href="javascript:void(0)" class="item-link" data-toggle="collapse" data-target="#collapse-body-a-1" aria-expanded="true" aria-controls="collapse-body-a-1">
                    </a>
                    <img src="{{ \App\Helper\Static\Methods::staticAsset("img/bank.png") }}" alt="bank" class="d-lg-block d-none">
                </label>
            </div>
            <div id="collapse-body-a-1" class="@if(isset($payment->payment_method) && $payment->payment_method == "bank") atbd-collapse-item__body collapse show @else collapse atbd-collapse-item__body @endif">
                <div class="collapse-body-text">
                    <div class="card payment-method-card w-100 bg-normal px-sm-25 px-15 pt-20 pb-20 mb-20">
                        @include("template.publisher.settings.payment.payment_settings.form.bank", compact('payment', 'isPaymentChangeable'))
                    </div><!-- ends: .card -->
                </div>
            </div>
        </div>
    @endif

    @if(isset($payment->payment_method) && $payment->payment_method == "paypal" || $isPaymentChangeable || $payment->payment_method == "")
        <div class="atbd-collapse-item">
            <div class="atbd-collapse-item__header border-0">
                <label for='paypal' class="form-control d-flex align-items-center justify-content-between">
                    <input type='radio' id='paypal' name='payment_method' class="radio" value="paypal" required {{ isset($payment->payment_method) && $payment->payment_method == "paypal" ? "checked" : "" }} /><h6>PayPal</h6>
                    <a href="javascript:void(0)" class="item-link" data-toggle="collapse" data-target="#collapse-body-a-2" aria-expanded="true" aria-controls="collapse-body-a-2">
                    </a>
                    <img src="{{ \App\Helper\Static\Methods::staticAsset("img/paypal.png") }}" alt="paypal" class="d-lg-block d-none h-20">
                </label>
            </div>
            <div id="collapse-body-a-2" class="@if(isset($payment->payment_method) && $payment->payment_method == "paypal") atbd-collapse-item__body collapse show @else collapse atbd-collapse-item__body @endif">
                <div class="collapse-body-text">
                    <div class="card payment-method-card w-100 bg-normal px-sm-25 px-15 pt-20 pb-20 mb-20">
                        @include("template.publisher.settings.payment.payment_settings.form.paypal", compact('payment'))
                    </div><!-- ends: .card -->
                </div>
            </div>
        </div>
    @endif

    @if(isset($payment->payment_method) && $payment->payment_method == "payoneer" || $isPaymentChangeable || $payment->payment_method == "")
        <div class="atbd-collapse-item">
            <div class="atbd-collapse-item__header border-0">
                <label for='payoneer' class="form-control d-flex align-items-center justify-content-between">
                    <input type='radio' id='payoneer' name='payment_method' class="radio" value="payoneer" required {{ isset($payment->payment_method) && $payment->payment_method == "payoneer" ? "checked" : "" }} /><h6>Payoneer</h6>
                    <a href="javascript:void(0)" class="item-link" data-toggle="collapse" data-target="#collapse-body-a-3" aria-expanded="true" aria-controls="collapse-body-a-3"></a>
                    <img src="{{ \App\Helper\Static\Methods::staticAsset("img/payoneer.png") }}" alt="Payoneer" class="d-lg-block d-none h-20">
                </label>
            </div>
            <div id="collapse-body-a-3" class="@if(isset($payment->payment_method) && $payment->payment_method == "payoneer") atbd-collapse-item__body collapse show @else collapse atbd-collapse-item__body @endif">
                <div class="collapse-body-text">
                    <div class="card payment-method-card w-100 bg-normal px-sm-25 px-15 pt-20 pb-20 mb-20">
                        @include("template.publisher.settings.payment.payment_settings.form.payoneer", compact('payment'))
                    </div><!-- ends: .card -->
                </div>
            </div>
        </div>
   @endif


</div>

@if(session()->has("is_payment_viewed"))
    <div class="button-group d-flex flex-wrap pt-30 mb-15">
        <button class="btn btn-primary btn-default btn-squared mr-15 text-capitalize">{{ isset($payment->id) ? "update" : "save" }}</button>
    </div>
@endif
