<?php $__env->startPush("scripts"); ?>
    <script>
        $("#loginForm").validate({
            rules: {
                "email": {
                    required: true,
                },
                "password": {
                    required: true,
                }
            },
            highlight: function (element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error');
            },
            unhighlight: function (element) { // un-hightlight error inputs
                $(element)
                    .closest('.form-group').removeClass('has-error');
            },
            errorPlacement: function (error, element) {
                error.insertAfter(element.closest('.input-modal-group'));
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection("content"); ?>
    <div class="signUP-admin" style="background-color: #f6f6fb;">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-7 col-md-7 col-sm-8">
                    <div class="signUp-admin-right signIn-admin-right  p-md-40 p-10">
                        <?php echo $__env->make("partial.admin.alert", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <div class="row justify-content-center">
                            <div class="col-xl-7 col-lg-8 col-md-12">
                                <div class="logo-div text-center">
                                    <a href="https://www.linkscircle.com/"><img src="<?php echo e(\App\Helper\Static\Methods::staticAsset("img/logo.png")); ?>" alt="LinksCircle Affiliate Network" width="200px" class="img-fluid"></a>
                                </div>
                                <div class="edit-profile mt-md-25 mt-0">
                                    <div class="card border-0">
                                        <div class="card-header border-0  pb-md-15 pb-10 pt-md-20 pt-10 ">
                                            <div class="edit-profile__title">
                                                <?php if($type == $advertiser): ?>
                                                    <h6>Sign in as <span class='color-primary'>Advertiser</span></h6>
                                                <?php elseif($type == $publisher): ?>
                                                    <h6>Sign in as <span class='color-primary'>Publisher</span></h6>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="edit-profile__body">

                                                <div class="btn-group atbd-button-group btn-group-normal nav mb-20">
                                                    <a class="btn btn-sm btn-outline-light nav-link <?php if($type == $advertiser): ?> active text-white <?php endif; ?>" href="<?php echo e(route("login", ["type" => $advertiser])); ?>">Advertiser</a>
                                                    <a class="btn btn-sm btn-outline-light nav-link <?php if($type == $publisher): ?> active text-white <?php endif; ?>" href="<?php echo e(route("login", ["type" => $publisher])); ?>">Publisher</a>
                                                </div>

                                                <form method="POST" action="<?php echo e(route('login', ["type" => $type])); ?>" id="loginForm">
                                                    <?php echo csrf_field(); ?>
                                                    <div class="form-group mb-20">
                                                        <label for="email"><?php echo e(__('Email Address')); ?><span class="text-danger">*</span></label>
                                                        <input id="email" class="form-control" type="email" name="email"
                                                               value="<?php echo e(old('email')); ?>" autofocus
                                                               placeholder="Please Enter Email Address">
                                                    </div>
                                                    <div class="form-group mb-15">
                                                        <label for="password">Password<span class="text-danger">*</span></label>
                                                        <div class="position-relative">
                                                            <input id="password" class="form-control"
                                                                   type="password"
                                                                   name="password"
                                                                   autocomplete="current-password"
                                                                   placeholder="Please Enter Password">
                                                            <div class="fa fa-fw fa-eye-slash text-light fs-16 field-icon" id="password-icon" onclick="showPassword('password')"></div>
                                                        </div>
                                                    </div>
                                                    <div class="signUp-condition signIn-condition">
                                                        <div class="checkbox-theme-default custom-checkbox ">
                                                            <input class="checkbox" type="checkbox" id="remember" name="remember" value="1">
                                                            <label for="remember">
                                                                <span class="checkbox-text"><?php echo e(__('Remember me')); ?></span>
                                                            </label>
                                                        </div>
                                                        <a href="<?php echo e(route("password.request")); ?>">forget password</a>
                                                    </div>
                                                    <div
                                                        class="button-group d-flex pt-1 justify-content-md-start justify-content-center">
                                                        <button
                                                            class="btn btn-primary btn-default btn-block btn-squared text-capitalize lh-normal px-50 py-15 signIn-createBtn">
                                                            sign in
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div><!-- End: .card-body -->
                                    </div><!-- End: .card -->
                                </div><!-- End: .edit-profile -->

                                <?php if($admin != $type): ?>
                                    <div
                                        class="signUp-topbar d-flex align-items-center justify-content-center mt-20">
                                        <p class="mb-0">
                                            Don't have an account?
                                            <a href="<?php echo e(route("register", ["type" => $type])); ?>" class="color-primary">
                                                Sign up
                                            </a>
                                        </p>
                                    </div><!-- End: .signUp-topbar  -->
                                <?php endif; ?>

                            </div><!-- End: .col-xl-5 -->
                        </div>
                    </div><!-- End: .signUp-admin-right  -->
                </div><!-- End: .col-xl-8  -->
            </div>
        </div>
    </div><!-- End: .signUP-admin  -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.panel_guest", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tech\resources\views/auth/login.blade.php ENDPATH**/ ?>