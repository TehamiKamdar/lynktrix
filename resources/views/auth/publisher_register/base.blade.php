<div class="row justify-content-center">
    <div class="col-xl-12">
            <div class="col-12">
                <div class="checkout-progress-indicator border-bottom pb-3">
                    @if(($isStepOne && !$isStepTwo && !$isStepThree && !$isStepFour) || (!$isStepOne && !$isStepTwo && !$isStepThree && !$isStepFour))
                        @include("auth.publisher_register.steps.one")

                    @elseif(!$isStepOne && $isStepTwo && !$isStepThree && !$isStepFour)
                        @include("auth.publisher_register.steps.two")

                    @elseif(!$isStepOne && !$isStepTwo && $isStepThree && !$isStepFour)
                        @include("auth.publisher_register.steps.three")

                    @elseif(!$isStepOne && !$isStepTwo && !$isStepThree && $isStepFour)
                        @include("auth.publisher_register.steps.four")

                    @endif
                </div><!-- checkout -->
            </div>
            <div class="col-6 mx-auto">
                @yield("step_form_content")
            </div><!-- ends: col -->
    </div><!-- ends: col -->
</div>
