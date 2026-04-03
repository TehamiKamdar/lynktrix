<?php $__env->startSection("step_form_content"); ?>

    <div class="card checkout-shipping-form border-0 bg-gray" style="padding-bottom: 20px;">
        <div class="card-body">
            <div class="edit-profile__body">
                <form id="stepOne" class="stepOne" action="javascript:void(0)">
                    <div class="form-group">
                        <label for="first_name" class="font-weight-bold">First name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="<?php echo e($stepOne['first_name'] ?? null); ?>">
                    </div>
                    <div class="form-group">
                        <label for="last_name" class="font-weight-bold">Last name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="<?php echo e($stepOne['last_name'] ?? null); ?>">
                    </div>
                    <div class="form-group">
                        <label for="user_name" class="font-weight-bold">Username<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Username" value="<?php echo e($stepOne['user_name'] ?? null); ?>">
                    </div>
                    <div class="form-group">
                        <label for="email" class="font-weight-bold">Email Address<span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="username@email.com" value="<?php echo e($stepOne['email'] ?? null); ?>">
                    </div>
                    <div class="form-group create-passord">
                        <label for="password" class="font-weight-bold">Password<span class="text-danger">*</span></label>
                        <div class="position-relative">
                            <input id="password" class="form-control"
                                   type="password"
                                   name="password"
                                   required autocomplete="current-password"
                                   value="<?php echo e($stepOne['password'] ?? null); ?>">
                            <div class="fa fa-fw fa-eye-slash text-light fs-16 field-icon" id="password-icon" onclick="showPassword('password')"></div>
                        </div>
                    </div>
                    <div class="form-group create-passord">
                        <label for="password_confirmation" class="font-weight-bold">Confirm Password<span class="text-danger">*</span></label>
                        <div class="position-relative">
                            <input id="password_confirmation" class="form-control"
                                   type="password"
                                   name="password_confirmation"
                                   required autocomplete="current-password_confirmation"
                                   value="<?php echo e($stepOne['password_confirmation'] ?? null); ?>">
                            <div class="fa fa-fw fa-eye-slash text-light fs-16 field-icon" id="password_confirmation-icon" onclick="showPassword('password_confirmation')"></div>
                        </div>
                    </div>
                    <div class="form-group edit-profile__body mb-0">
                        <div class="custom-control checkbox-theme-default custom-checkbox pl-0">
                            <input type="checkbox" class="checkbox" id="agree" name="agree" value="1" <?php echo e(isset($stepOne['agree']) && $stepOne['agree'] ? "checked" : null); ?> />
                            <label for="agree">I Agree with the
                                <a href="https://www.linkscircle.com/terms">Terms and Conditions</a>.</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="terms" name="terms" hidden value="<?php echo e($stepOne['terms'] ?? null); ?>" />
                    </div>
                    <div class="button-group d-flex pt-20 mb-20 justify-content-md-end justify-content-center">
                        <button type="submit" class="btn text-white btn-primary btn-default btn-squared text-capitalize m-1">Save &amp; Next<i class="ml-10 mr-0 las la-arrow-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- ends: card -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make("auth.publisher_register.base", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Downloads\application\resources\views/auth/publisher_register/step_one.blade.php ENDPATH**/ ?>