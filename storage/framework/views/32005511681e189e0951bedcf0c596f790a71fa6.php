<?php if(auth()->user()->profile_complete_per < 100): ?>
    <div class="row">
        <div class="col-md-3">
            <div class="sales-target__progress-bar">
                <div class="left"></div>
                <div class="right">
                    <div class="back"></div>
                </div>
                <div class="barOverflow">
                    <div class="bar">
                        <div class="top-circle"></div>
                    </div>

                </div>
                <div class="total-count">
                    <span><?php echo e(auth()->user()->profile_complete_per); ?></span>%
                    <div class="total-count__text">
                        Profile Completeness
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-9 mb-25">
            <div class="user-group radius-xl bg-white media-ui media-ui--onHold pt-30 pb-20">
                <div class="px-30">
                    <div class="media user-group-media d-flex justify-content-between">
                        <div class="media-body d-flex align-items-center flex-wrap text-capitalize my-sm-0 my-n2">
                            <h6 class="mt-0  fw-500 user-group media-ui__title">Complete your profile to apply more advertisers </h6>
                        </div>
                    </div>
                    <div class="user-group-people mt-15">
                        <p class="mb-0">Please complete your profile to get more brand approvals. To complete your profile, you must submit the logo and all the details in <a href="<?php echo e(route("publisher.profile.basic-information.index")); ?>">profile picture</a>, <a href="<?php echo e(route("publisher.profile.basic-information.index")); ?>">basic</a>, <a href="<?php echo e(route("publisher.profile.company.index")); ?>">company</a>, <a href="<?php echo e(route("publisher.payments.billing-information.index")); ?>">billing</a>, and <a href="<?php echo e(route("publisher.payments.payment-settings.index")); ?>">payments</a>.</p>
                    </div>
                    <div class="user-group-progress-bar">

                        <div class="progress-wrap d-flex align-items-center mb-0">

                            <div class="progress">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo e(auth()->user()->profile_complete_per); ?>%;" aria-valuenow="<?php echo e(auth()->user()->profile_complete_per); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                            <span class="progress-percentage"><?php echo e(auth()->user()->profile_complete_per); ?>%</span>

                        </div>

                        <p class="color-light fs-12 mb-0"><?php echo e(count(auth()->user()->profile_complete_section ?? [])); ?> / 5 settings completed</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\tech\resources\views/template/publisher/widgets/profile_completion_percentage.blade.php ENDPATH**/ ?>