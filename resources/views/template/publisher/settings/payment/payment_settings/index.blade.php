<!-------------- Panel ---->
<style>
    .lc-payment {
        margin-left: 30px;
        border:0;
    }
    .lc-payment .atbd-collapse-item__header label input {
        position: absolute;
        margin-left: -50px;
    }
    .lc-payment .atbd-collapse-item {
        margin-bottom: 25px;
    }
    .lc-payment .atbd-collapse-item__header .item-link {
        display: unset;
        padding: unset;
    }
    .lc-payment .atbd-collapse-item__header label {
        width: 100%;
        margin: 0;
        padding-top: 25px;
        padding-bottom: 25px;
    }
    .lc-payment .atbd-collapse-item__header img {
        width: auto;
    }
    .lc-payment .atbd-collapse-item__header:hover {
        outline: 1px solid #5f63f2;
        -webkit-box-shadow: 0 0, 0px 5px 20px #5f63f21a;
        box-shadow: 0 0, 0px 5px 20px #5f63f21a;
    }
    .atbd-collapse .atbd-collapse-item {
        border-bottom: 0;
    }
    .atbd-collapse .atbd-collapse-item__header {
        border-radius: 5px;
    }
    .lc-payment .atbd-collapse-item:not(:first-child) .atbd-collapse-item__header {
        border-radius: 5px;
    }
    .atbd-collapse .atbd-collapse-item:not(:last-child) .atbd-collapse-item__header {
        border-radius: 5px;
    }
    .lc-payment .atbd-collapse-item__header h6{
        font-size: 17px;
        font-weight: 600;
    }
    .lc-payment .atbd-collapse-item .atbd-collapse-item__header.active ~ .lc-payment .atbd-collapse-item {
        border: 1px solid #5f63f2!important;
        border-radius: 5px;
    }
    .lc-payment .atbd-collapse-item__body .collapse-body-text {
        padding: 0;
    }
    .payment-method-card {
        border-top-left-radius: 0px;
        border-top-right-radius: 0px;
        border-bottom-right-radius: 5px;
        border-bottom-left-radius: 5px;
    }
</style>

@include("partial.admin.alert")
<form action="{{ route("publisher.payments.payment-settings.update") }}" method="POST" id="paymentSettingForm" enctype="multipart/form-data">
    @csrf
    @method("PATCH")

    <div class="row border-bottom mb-10 pb-10">

        <div class="col-md-6">
            <div class="form-group">
                <label for="payment_frequency" class="font-weight-bold text-black font-size14">Payment Frequency <span class="text-danger">*</span></label>
                <select class="form-control " id="payment_frequency" name="payment_frequency" aria-invalid="false">
                    <option value="" selected="" disabled="">Please Select</option>
{{--                    <option {{ isset($payment->payment_frequency) && $payment->payment_frequency == "every_week" ? "selected" : "" }} value="every_week">Every Week</option>--}}
                    <option {{ isset($payment->payment_frequency) && $payment->payment_frequency == "every_month" ? "selected" : "" }} value="every_month">Every Month</option>
                    <option {{ isset($payment->payment_frequency) && $payment->payment_frequency == "after_45_days" ? "selected" : "" }} value="after_45_days">After 45 Days</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="payment_threshold" class="font-weight-bold text-black font-size14">Payment Threshold <span class="text-danger">*</span></label>
                <select class="form-control " id="payment_threshold" name="payment_threshold" aria-invalid="false"><option value="" selected="" disabled="">Please Select</option>
{{--                    <option {{ isset($payment->payment_threshold) && $payment->payment_threshold == "50" ? "selected" : "" }} value="50">$50</option>--}}
                    <option {{ isset($payment->payment_threshold) && $payment->payment_threshold == "100" ? "selected" : "" }} value="100">$100</option>
                    <option {{ isset($payment->payment_threshold) && $payment->payment_threshold == "500" ? "selected" : "" }} value="500">$500</option>
                    <option {{ isset($payment->payment_threshold) && $payment->payment_threshold == "1000" ? "selected" : "" }} value="1000">$1000</option>
                    <option {{ isset($payment->payment_threshold) && $payment->payment_threshold == "2500" ? "selected" : "" }} value="2500">$2500</option>
                    <option {{ isset($payment->payment_threshold) && $payment->payment_threshold == "5000" ? "selected" : "" }} value="5000">$5000</option>
                    <option {{ isset($payment->payment_threshold) && $payment->payment_threshold == "10000" ? "selected" : "" }} value="10000">$10000</option>
                </select>
            </div>
        </div>
        <small class="alert fs-12 pt-0 pb-0">Note: You can schedule when you would like to receive your commission payments and at what threshold your Approved commissions must reach before pay out.</small>
    </div>


    <h3 class="fw-500">Payment Method</h3>
    <small class="fs-12 mb-20">Select your active payment method where you want to withdraw funds.</small>

    @php
        $isPaymentChangeable = false;
        if(session()->has("is_payment_viewed") || !isset($payment->payment_method)) {
            $isPaymentChangeable = true;
        }
    @endphp

    @if(isset($payment->payment_method) && $payment->payment_method)

        @if($payment->payment_method == "bank")
            @include("template.publisher.settings.payment.payment_settings.default_method.bank", compact('payment', 'isPaymentChangeable'))
        @elseif($payment->payment_method == "paypal")
            @include("template.publisher.settings.payment.payment_settings.default_method.paypal", compact('payment', 'isPaymentChangeable'))
        @elseif($payment->payment_method == "payoneer")
            @include("template.publisher.settings.payment.payment_settings.default_method.payoneer", compact('payment', 'isPaymentChangeable'))
        @endif

    @else
        <div class="card-body radius-xl px-sm-20 px-10 pt-15"></div>
    @endif

    <div id="settingOptions">
        @include("template.publisher.settings.payment.payment_settings.form.options", compact('payment', 'countries', 'isPaymentChangeable'))
    </div>

</form>
    <!-------------- Panel End ----->


