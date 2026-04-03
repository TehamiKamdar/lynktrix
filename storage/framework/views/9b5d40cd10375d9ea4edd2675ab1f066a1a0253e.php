<?php if (! $__env->hasRenderedOnce('4c1f6254-0a27-44aa-bf79-e3343ac09594')): $__env->markAsRenderedOnce('4c1f6254-0a27-44aa-bf79-e3343ac09594');
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

    <div class="signUP-admin">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="signUp-admin-right signIn-admin-right p-md-40 p-10">
                        <div
                            class="signUp-topbar d-flex align-items-center justify-content-md-end justify-content-center mt-md-0 mb-md-0 mt-20 mb-1">
                            <form method="POST" action="<?php echo e(route('logout')); ?>">
                                <?php echo csrf_field(); ?>

                                <button type="submit" class="btn btn-sm btn-danger">
                                    <?php echo e(__('Log Out')); ?>

                                </button>
                            </form>
                        </div><!-- End: .signUp-topbar  -->
                    </div><!-- End: .signUp-admin-right  -->
                    <div class="bg-white my-30 content-center">
                        <div class="coming-soon text-center">
                            <a href="/"><img src="https://www.linkscircle.com/images/logo.png"></a>
                            <div class="coming-soon__body">
                                <h1>Email Verification Required</h1>
                                <p class="subtitle">
                                    <?php echo e(__('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.')); ?>

                                </p>

                                <?php if(session('status') == 'verification-link-sent'): ?>
                                    <div class="alert alert-success" role="alert">
                                        <div class="alert-content">
                                            <p><?php echo e(__('A new verification link has been sent to the email address you provided during registration.')); ?></p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <form class="form-inline justify-content-center my-n10 subscribe-bar" method="POST" action="<?php echo e(route('verification.send')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div>
                                        <button type="submit" class="btn btn-primary m-10 text-uppercase btn-lg px-20"><?php echo e(__('Resend Verification Email')); ?></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div><!-- End: .col-xl-8  -->
            </div>
        </div>
    </div><!-- End: .signUP-admin  -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.panel_guest", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Downloads\application\resources\views/auth/verify-email.blade.php ENDPATH**/ ?>