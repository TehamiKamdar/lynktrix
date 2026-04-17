<?php $__env->startSection("step_form_content"); ?>
    <div class="verification-container">
        <div class="verification-card">

            <!-- Status Section -->
            <div class="status-section">
                <div class="success-icon">
                    <i class="ri-check-line"></i>
                </div>
                <h2 class="status-title">Account Created!</h2>
                <span class="status-badge">
                    <i class="ri-mail-check-line me-1"></i> Awaiting Verification
                </span>
            </div>

            <!-- Content Section -->
            <div class="content-section">
                <h5 class="content-title">You're Only One Step Away!</h5>

                <p class="content-text">
                    An email has been sent to <strong>your inbox</strong>. Please verify your email to complete registration
                    and start using Lynktrix.
                </p>

                <div class="alert-box">
                    <i class="ri-mail-unread-line"></i>
                    <p>If you didn't receive the email, check your spam folder or resend it below.</p>
                </div>

                <form id="stepFour">
                    <button type="submit" class="btn-resend">
                        <i class="ri-mail-send-line"></i>
                        Resend Verification Email
                    </button>
                </form>
            </div>

        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make("auth.publisher_register.base", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\lynktrix\resources\views/auth/publisher_register/step_four.blade.php ENDPATH**/ ?>