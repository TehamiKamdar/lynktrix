<?php $__env->startSection("step_form_content"); ?>

   <div class="card border-0 bg-gray">

    <!-- Status Card -->
    <div class="card mt-0">
        <div class="card-body text-center py-4">

            <div class="d-flex justify-content-center mb-3">
                <div class="rounded-circle bg-success d-flex align-items-center justify-content-center"
                     style="width:40px; height:40px;">
                    <span class="las la-check text-white"></span>
                </div>
            </div>

            <h4 class="font-weight-normal mb-0">Account Created</h4>
        </div>
    </div>

    <!-- Content -->
    <div class="card-body mt-4 p-0">
        <div class="text-center px-3">

            <h5 class="mb-3">You're Only One Step Away!</h5>

            <p class="mb-2">
                An email has been sent to your inbox. Please verify your email to complete registration.
            </p>

            <p class="text-muted mb-4">
                If you didn’t receive the email, check your spam folder or resend it below.
            </p>

            <form id="stepFour" action="javascript:void(0)">
                <button type="submit"
                        class="btn btn-primary text-white px-4">
                    Resend Verification Email
                </button>
            </form>

        </div>
    </div>

</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make("auth.publisher_register.base", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Downloads\application\resources\views/auth/publisher_register/step_four.blade.php ENDPATH**/ ?>