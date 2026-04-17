    <div class="row g-0">
        <div class="col-12 col-lg-4">

            <div class="steps-sidebar">
                <div class="steps-title">
                    <h3>Registration Steps</h3>
                    <p>Complete all steps to get started</p>
                </div>

                <?php if(($isStepOne && !$isStepTwo && !$isStepThree && !$isStepFour) || (!$isStepOne && !$isStepTwo && !$isStepThree && !$isStepFour)): ?>
                    <?php echo $__env->make("auth.publisher_register.steps.one", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php elseif(!$isStepOne && $isStepTwo && !$isStepThree && !$isStepFour): ?>
                    <?php echo $__env->make("auth.publisher_register.steps.two", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php elseif(!$isStepOne && !$isStepTwo && $isStepThree && !$isStepFour): ?>
                    <?php echo $__env->make("auth.publisher_register.steps.three", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php elseif(!$isStepOne && !$isStepTwo && !$isStepThree && $isStepFour): ?>
                    <?php echo $__env->make("auth.publisher_register.steps.four", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php endif; ?>
            </div>
        </div>
        <div class="col-12 col-lg-8">
            <div class="form-sidebar">
                <?php echo $__env->yieldContent("step_form_content"); ?>
            </div>
        </div><!-- ends: col -->
    </div><?php /**PATH D:\lynktrix\resources\views/auth/publisher_register/base.blade.php ENDPATH**/ ?>