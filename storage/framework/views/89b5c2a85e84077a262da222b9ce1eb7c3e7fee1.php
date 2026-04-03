<div class="row justify-content-center">
    <div class="col-xl-12">
            <div class="col-12">
                <div class="checkout-progress-indicator border-bottom pb-3">
                    <?php if(($isStepOne && !$isStepTwo && !$isStepThree && !$isStepFour) || (!$isStepOne && !$isStepTwo && !$isStepThree && !$isStepFour)): ?>
                        <?php echo $__env->make("auth.publisher_register.steps.one", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php elseif(!$isStepOne && $isStepTwo && !$isStepThree && !$isStepFour): ?>
                        <?php echo $__env->make("auth.publisher_register.steps.two", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php elseif(!$isStepOne && !$isStepTwo && $isStepThree && !$isStepFour): ?>
                        <?php echo $__env->make("auth.publisher_register.steps.three", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php elseif(!$isStepOne && !$isStepTwo && !$isStepThree && $isStepFour): ?>
                        <?php echo $__env->make("auth.publisher_register.steps.four", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php endif; ?>
                </div><!-- checkout -->
            </div>
            <div class="col-6 mx-auto">
                <?php echo $__env->yieldContent("step_form_content"); ?>
            </div><!-- ends: col -->
    </div><!-- ends: col -->
</div>
<?php /**PATH C:\Users\lenovo\Downloads\application\resources\views/auth/publisher_register/base.blade.php ENDPATH**/ ?>