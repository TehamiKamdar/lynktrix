    <div class="row g-0">
        <div class="col-12 col-lg-4">

            <div class="steps-sidebar">
                <div class="steps-title">
                    <h3>Registration Steps</h3>
                    <p>Complete all steps to get started</p>
                </div>

                @if(($isStepOne && !$isStepTwo && !$isStepThree && !$isStepFour) || (!$isStepOne && !$isStepTwo && !$isStepThree && !$isStepFour))
                    @include("auth.publisher_register.steps.one")

                @elseif(!$isStepOne && $isStepTwo && !$isStepThree && !$isStepFour)
                    @include("auth.publisher_register.steps.two")

                @elseif(!$isStepOne && !$isStepTwo && $isStepThree && !$isStepFour)
                    @include("auth.publisher_register.steps.three")

                @elseif(!$isStepOne && !$isStepTwo && !$isStepThree && $isStepFour)
                    @include("auth.publisher_register.steps.four")

                @endif
            </div>
        </div>
        <div class="col-12 col-lg-8">
            <div class="form-sidebar">
                @yield("step_form_content")
            </div>
        </div><!-- ends: col -->
    </div>