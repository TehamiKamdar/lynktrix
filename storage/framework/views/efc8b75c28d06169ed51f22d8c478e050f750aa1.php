<?php $__env->startPush('title', 'Verify Email'); ?>

<?php if (! $__env->hasRenderedOnce('fd6f93a4-2da7-481c-b2c9-7497b6f90450')): $__env->markAsRenderedOnce('fd6f93a4-2da7-481c-b2c9-7497b6f90450');
$__env->startPush('styles'); ?>
<style>
    .loaded {
        background: #fff !important;
    }

    .coming-soon {
        padding: unset !important;
    }

    .coming-soon__body {
        margin-top: 68px !important;
        margin-bottom: unset !important;
        padding: 0 30px !important;
    }
</style>
<?php $__env->stopPush(); endif; ?>

<?php $__env->startSection("content"); ?>
    <!-- Logout Button -->
    <div class="logout-btn">
        <form method="POST" action="<?php echo e(route('logout')); ?>">
            <?php echo csrf_field(); ?>
            <button type="submit" class="btn-logout">
                <i class="ri-logout-box-r-line"></i> Log Out
            </button>
        </form>
    </div>

    <div class="verification-wrapper">
        <div class="verification-container">
            <div class="verification-card">

                <!-- Logo Section -->
                <div class="logo-section">
                    <img src="<?php echo e(asset('new/logo.webp')); ?>" alt="Lynktrix Logo">
                </div>

                <!-- Icon Section -->
                <div class="icon-section">
                    <div class="email-icon">
                        <i class="ri-mail-send-line"></i>
                    </div>
                </div>

                <!-- Content Section -->
                <div class="content-section">
                    <h1 class="content-title">Email Verification Required</h1>
                    <p class="content-subtitle">
                        Thanks for signing up! Before getting started, could you verify your email address by clicking on
                        the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
                    </p>

                    <?php if(session('status') == 'verification-link-sent'): ?>
                        <div id="successAlert" class="alert-success"">
                            <i class="ri-mail-check-line"></i>
                            <p><?php echo e(__('A new verification link has been sent to the email address you provided during registration.')); ?></p>
                        </div>
                    <?php endif; ?>

                    <!-- Info Box -->
                    <div class="info-box">
                        <i class="ri-mail-unread-line"></i>
                        <p>Check your spam/junk folder if you don't see the email in your inbox within a few minutes.</p>
                    </div>

                    <!-- Resend Form -->
                    <form method="POST" action="<?php echo e(route('verification.send')); ?>">
                        <button type="submit" class="btn-resend" id="resendBtn">
                            <i class="ri-mail-send-line"></i>
                            <?php echo e(__('Resend Verification Email')); ?>

                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.panel_guest", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\lynktrix\resources\views/auth/verify-email.blade.php ENDPATH**/ ?>