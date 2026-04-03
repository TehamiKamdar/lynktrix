<div class="row justify-content-center">
    <div class="col-xl-8 col-12">
        <div class="checkout-progress-indicator content-center">
            <div class="checkout-progress justify-content-center">

                @if(($isStepOne && !$isStepTwo && !$isStepThree) || (!$isStepOne && !$isStepTwo && !$isStepThree))

                    <div class="step current" id="1">
                        <span>1</span>
                    </div>
                    <div class="current"><img src="{{ \App\Helper\Static\Methods::staticAsset("img/svg/checkout.svg") }}" alt="img" class="svg"></div>
                    <div class="step" id="2">
                        <span>2</span>
                    </div>
                    <div class="current"><img src="{{ \App\Helper\Static\Methods::staticAsset("img/svg/checkout.svg") }}" alt="img" class="svg"></div>
                    <div class="step" id="3">
                        <span>3</span>
                    </div>

                @elseif(!$isStepOne && $isStepTwo && !$isStepThree)

                    <div class="step completed" id="1">
                        <span class="las la-check"></span>
                    </div>
                    <div class="current"><img src="{{ \App\Helper\Static\Methods::staticAsset("img/svg/checkoutin.svg") }}" alt="img" class="svg"></div>
                    <div class="step current" id="2">
                        <span>2</span>
                    </div>
                    <div class="current"><img src="{{ \App\Helper\Static\Methods::staticAsset("img/svg/checkout.svg") }}" alt="img" class="svg"></div>
                    <div class="step" id="3">
                        <span>3</span>
                    </div>

                @elseif(!$isStepOne && !$isStepTwo && $isStepThree)

                    <div class="step completed" id="1">
                        <span class="las la-check"></span>
                    </div>
                    <div class="current"><img src="{{ \App\Helper\Static\Methods::staticAsset("img/svg/checkoutin.svg") }}" alt="img" class="svg"></div>
                    <div class="step completed" id="1">
                        <span class="las la-check"></span>
                    </div>
                    <div class="current"><img src="{{ \App\Helper\Static\Methods::staticAsset("img/svg/checkout.svg") }}" alt="img" class="svg"></div>
                    <div class="step current" id="3">
                        <span>3</span>
                    </div>

                @endif

            </div>
        </div><!-- ends: .checkout-progress-indicator -->
        @yield('step_form_content')
    </div>
</div>
