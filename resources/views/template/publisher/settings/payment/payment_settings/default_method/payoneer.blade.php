
<div class="card-body mt-30 bg-normal bg-shadow radius-xl px-sm-20 px-10 pt-15  mb-20">
    <div class="crc__title mb-25">
        <h6 class="color-gray">Default Payment Method</h6> <span class="badge badge-round badge-success badge-lg">Active</span>
    </div>
    <div class="d-flex mb-20 align-items-center">
        <div class="radio-theme-default custom-radio pt-2 mr-2">
            <input class="radio" type="radio" name="radio-vertical2" value="1" id="radio-vl6" checked>
            <label for="radio-vl6">
                <span class="radio-text"></span>
            </label>
        </div>
        <span class="crc__method"><img class="h-auto"
                                       src="{{ \App\Helper\Static\Methods::staticAsset("img/payoneer.png") }}"
                                       alt="img"> @if($payment->payoneer_holder_name){{ str_repeat('•', strlen($payment->payoneer_holder_name) - 6) . substr($payment->payoneer_holder_name, -6) }}@endif</span>
    </div>
    <button type="button"
            class="border-0 crc__title-btn shadow-none bg-transparent color-info content-center fs-13 fw-500 p-0"
            onclick="changePaymentMethod()"><span data-feather="refresh-cw"></span> @if($isPaymentChangeable) Change @else View @endif Payment Method
    </button>
</div>
