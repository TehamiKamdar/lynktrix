<div class="card card-overview-progress border-0">
    <div class="card-header border-0">
        <div class="d-flex justify-content-between w-100 align-items-center">
            <h6>Earnings Overview</h6>
        </div>
    </div>
    <?php
    if(isset($earningOverview['pending'])){
      $pendingCurrency = $earningOverview['pending']['commission_amount_currency'] ?? "";
        $pending = $earningOverview['pending']['total_commission_amount'] ?? 0;

    }else{
    $pendingCurrency = $earningOverview['Pending']['commission_amount_currency'] ?? "";
        $pending = $earningOverview['Pending']['total_commission_amount'] ?? 0;
    }
      
        
        $approvedCurrency = $earningOverview['approved']['commission_amount_currency'] ?? "";
        $paid = $earningOverview['paid_status'] ?? 0;
        $approved = $earningOverview['approved']['total_commission_amount'] ?? 0;
        $approved = $approved - $paid;
        $percentage = ($pending + $paid) - $approved;
        if($percentage > 0 && $approved > 0) {
            $percentage = abs(round($percentage / $approved * 100));
        } else {
            $percentage = 0;
        }
        $pending = number_format($pending, 2);
        $approved = number_format($approved, 2);
    ?>
    <div class="card-body">
        <div class="card-progress">
            <div class="card-progress__summery d-flex justify-content-between">
                <div>
                    <strong class="color-dark">Pending</strong>
                    <span>Commissions Waiting for Approval</span>
                </div>
                <div>
                    <strong class="color-primary"><?php echo e($pendingCurrency); ?> <?php echo e($pending); ?></strong>
                </div>
            </div>
            <div class="card-progress__bar">
                <div class="progress-excerpt">
                    <?php if(isset($earningOverview['pending']['growth'])): ?>
                        <?php if($earningOverview['pending']['growth'] == "up"): ?>
                            <p class="progress-upword">
                                <strong>
                                    <span class="la la-arrow-up"></span>
                                    <?php echo e($earningOverview['pending']['percentage']); ?>

                                </strong>
                                From Previous Period
                            </p>
                        <?php else: ?>
                            <p class="progress-downword">
                                <strong>
                                    <span class="la la-arrow-down"></span>
                                    <?php echo e($earningOverview['pending']['percentage']); ?>

                                </strong>
                                From Previous Period
                            </p>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div><!-- ends: .card-progress -->
        <div class="card-progress">
            <div class="card-progress__summery d-flex justify-content-between">
                <div>
                    <strong class="color-dark">Approved</strong>
                    <span>Waiting for Advertiser to Pay</span>
                </div>
                <div>
                    <strong class="color-success"><?php echo e($approvedCurrency); ?> <?php echo e($approved); ?></strong>
                </div>
            </div>
            <div class="card-progress__bar">
                <div class="progress">
                    <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo e($percentage); ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="progress-excerpt">
                    <?php if(isset($earningOverview['approved']['growth'])): ?>
                        <?php if($earningOverview['approved']['growth'] == "up"): ?>
                            <p class="progress-upword">
                                <strong>
                                    <span class="la la-arrow-up"></span>
                                    <?php echo e($earningOverview['approved']['percentage']); ?>

                                </strong>
                                From Previous Period
                            </p>
                        <?php else: ?>
                            <p class="progress-downword">
                                <strong>
                                    <span class="la la-arrow-down"></span>
                                    <?php echo e($earningOverview['approved']['percentage']); ?>

                                </strong>
                                From Previous Period
                            </p>
                        <?php endif; ?>
                    <?php endif; ?>

                </div>
            </div>
        </div><!-- ends: .card-progress -->
        <div class="card-progress">
            <div class="card-progress__summery d-flex justify-content-between mb-0">
                <div>
                    <strong class="color-dark">Declined</strong>
                </div>
                <div>
                    <strong class="color-danger"><?php echo e($earningOverview['declined']['commission_amount_currency'] ?? ""); ?> <?php echo e(isset($earningOverview['declined']['total_commission_amount']) ? number_format($earningOverview['declined']['total_commission_amount'], 2) : 0); ?></strong>
                </div>
            </div>
        </div><!-- ends: .card-progress -->
            <div class="card-progress">
                <div class="card-progress__summery d-flex justify-content-between mb-0">
                    <div class="">
                        <strong class="color-dark">Paid</strong>
                    </div>
                    <div>
                        <strong>USD <?php echo e(number_format($earningOverview['paid_status'] ?? 0, 2)); ?></strong>
                    </div>
                </div>
                <?php if(\App\Helper\Static\Methods::getAdminAuthorizeCheck()): ?>
                    <div class="card-progress__summery d-flex justify-content-between mb-0">
                        <div>
                            <strong class="color-dark">Pending Release</strong>
                        </div>
                        <div>
                            <strong>USD <?php echo e(number_format($earningOverview['peending_status'] ?? 0, 2)); ?></strong>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
    </div>
</div><!-- ends: card-overview-progress -->
<?php /**PATH C:\xampp\htdocs\tech\resources\views/template/publisher/widgets/earning_overview.blade.php ENDPATH**/ ?>