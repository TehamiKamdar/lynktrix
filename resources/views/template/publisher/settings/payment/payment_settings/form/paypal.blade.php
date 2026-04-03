<div class="card-body bg-white">
    <div class="form-cc">
        <div class="text-capitalize alert alert-primary alert-dismissible fade show" role="alert">
            <div class="alert-content">
                We transfer funds in Australian Dollars (AUD) at the current date conversion rates.
            </div>
        </div>
        <div class="form-group mb-10">
            <label for="bankCountry" class="font-weight-bold text-black font-size14">
                PayPal Country
            </label>
            <select class="js-example-basic-single js-states form-control" id="paypal_country" name="paypal_country" @if(!$isPaymentChangeable) disabled @endif>
                <option value="">Select PayPal Account Location</option>
                @foreach($countries as $country)
                    <option {{ isset($payment->paypal_country) && $payment->paypal_country == $country['id'] ? "selected" : null }}  value="{{ $country['id'] }}">{{ ucwords($country['name']) }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-10">
            <label for="paypal_holder_name" class="font-weight-bold text-black font-size14">PayPal Account Name</label>
            <input type="text" class="form-control" id="paypal_holder_name" name="paypal_holder_name" placeholder="Enter PayPal Account Holder Name" value="{{ $payment->paypal_holder_name ?? null }}" @if(!$isPaymentChangeable) disabled @endif>
        </div>
        <div class="form-group mb-10">
            <label for="paypal_email" class="font-weight-bold text-black font-size14">PayPal Email Address</label>
            <input type="text" class="form-control" id="paypal_email" name="paypal_email" placeholder="Enter PayPal Email Address" value="{{ $payment->paypal_email ?? null }}" @if(!$isPaymentChangeable) disabled @endif>
        </div>
        <div class="form-group mb-10">
            <p> <i class="la la-exclamation-circle text-warning"></i> 2% processing fee will be charged, capped to AUD 30.00</p>
        </div>
    </div>
</div>
