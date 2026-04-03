<div class="tab-content spin-embadded" id="ap-tabContent">

    <!-- Start Table Responsive -->
    <div class="table-responsive">
        <table class="table mb-0 table-hover table-borderless border-0">
            <thead>
                <tr class="userDatatable-header">
                    <th>
                        <span class="userDatatable-title float-right font-weight-bold text-black">Date</span>
                    </th>
                    <th>
                        <span class="userDatatable-title font-weight-bold text-black">Advertiser</span>
                    </th>
                    <th>
                        <span class="userDatatable-title font-weight-bold text-black">Transaction ID</span>
                    </th>

                    <th>
                        <span class="userDatatable-title font-weight-bold text-black">Sale Amount</span>
                    </th>

                    <th>
                        <span class="userDatatable-title font-weight-bold text-black">Commission</span>
                    </th>

                    <th>
                        <span class="userDatatable-title font-weight-bold text-black">Last Commission</span>
                    </th>

                    <th>
                        <span class="userDatatable-title font-weight-bold text-black">Status</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="userDatatable-header">
                    <th>
                    </th>
                    <th>
                    </th>
                    <th>
                    </th>
                    <th>
                        <span class="userDatatable-title font-weight-bold text-black"><?php if(count($transactions)): ?><?php echo e(implode(', ', array_unique($transactions->pluck("sale_amount_currency")->toArray()))); ?> <?php echo e(number_format($totalSaleAmount, 2)); ?> <?php else: ?> - <?php endif; ?></span>
                    </th>
                    <th>
                        <span class="userDatatable-title font-weight-bold text-black"><?php if(count($transactions)): ?><?php echo e(implode(', ', array_unique($transactions->pluck("commission_amount_currency")->toArray()))); ?> <?php echo e(number_format($totalCommissionAmount, 2)); ?> <?php else: ?> - <?php endif; ?></span>
                    </th>
                    <th>
                        
                    </th>
                </tr>

                <?php if(count($transactions)): ?>
                    <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr>
                            <td>
                                <div class="orderDatatable-title float-right">
                                    <?php echo e(\Carbon\Carbon::parse($transaction->transaction_date)->format("F d, Y")); ?>

                                </div>
                            </td>
                            <td>
                                <div class="orderDatatable-title">
                                    <?php echo e($transaction->advertiser_name); ?> <br>
                                    <span class="fs-12 color-gray">(<?php echo e($transaction->external_advertiser_id); ?>)</span>
                                </div>
                            </td>
                            <td>
                                <?php if($transaction->sub_id): ?>
                                    <div class="orderDatatable-title">
                                        <?php echo e($transaction->transaction_id); ?><br>
                                        <a href="javascript:void(0)" onclick="showSubID('<?php echo e($key); ?>')"><i class="fas fa-plus-circle fs-12"></i></a><br>
                                        <span class="fs-12 display-hidden" id="subID<?php echo e($key); ?>">Sub ID: <?php echo e($transaction->sub_id); ?></span>
                                    </div>
                                <?php else: ?>
                                    <div class="orderDatatable-title">
                                        <?php echo e($transaction->transaction_id); ?>

                                    </div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="orderDatatable-title">
                                    <?php echo e($transaction->sale_amount_currency . " " . number_format($transaction->sale_amount, 2)); ?>

                                </div>
                            </td>
                            <td>
                                <div class="orderDatatable-title">
                                    <?php echo e($transaction->commission_amount_currency . " " . number_format($transaction->commission_amount, 2)); ?>

                                </div>
                            </td>

                            <td>
                                <div class="orderDatatable-title">
                                    <?php if(!empty($transaction->old_commission_amount) || $transaction->old_commission_amount != 0): ?>
                                    <?php echo e($transaction->commission_amount_currency . " " . number_format($transaction->old_commission_amount, 2)); ?>

                                    <?php else: ?>
                                    <?php echo e($transaction->commission_amount_currency . " " . number_format($transaction->commission_amount, 2)); ?>

                                    <?php endif; ?>
                                </div>
                            </td>

                            <td>
                                <div class="orderDatatable-status d-inline-block">
                                    <?php if($transaction->payment_status == \App\Models\Transaction::PAYMENT_STATUS_RELEASE_PAYMENT || $transaction->payment_status == \App\Models\Transaction::PAYMENT_STATUS_CONFIRM): ?>
                                    <?php if(isset($transaction->yespaid) && $transaction->yespaid == 1): ?>
                                        <span class="order-bg-opacity-success text-success rounded-pill active"><?php echo e(\App\Models\Transaction::STATUS_PAID); ?></span>
                                        <?php else: ?>
                                        <span class="order-bg-opacity-success text-success rounded-pill active"><?php echo e(\App\Models\Transaction::STATUS_APPROVED); ?></span>
                                        <?php endif; ?>
                                    <?php elseif($transaction->payment_status == \App\Models\Transaction::PAYMENT_STATUS_RELEASE): ?>
                                        <span class="order-bg-opacity-success text-warning rounded-pill active"><?php echo e(ucwords(str_replace('_', ' ', \App\Models\Transaction::STATUS_PENDING_PAID))); ?></span>
                                    <?php elseif($transaction->commission_status == \App\Models\Transaction::STATUS_PENDING || $transaction->commission_status == 'Pending'): ?>
                                        <span class="order-bg-opacity-warning text-warning rounded-pill active"><?php echo e(\App\Models\Transaction::STATUS_PENDING); ?></span>
                                    <?php elseif($transaction->commission_status == \App\Models\Transaction::STATUS_HOLD): ?>
                                        <span class="order-bg-opacity-info text-info rounded-pill active"><?php echo e(\App\Models\Transaction::STATUS_HOLD); ?></span>
                                    <?php elseif($transaction->commission_status == \App\Models\Transaction::STATUS_APPROVED): ?>
                                        <span class="order-bg-opacity-success text-success rounded-pill active"><?php echo e(\App\Models\Transaction::STATUS_APPROVED); ?></span>
                                    <?php elseif($transaction->commission_status == \App\Models\Transaction::STATUS_PAID): ?>
                                        <span class="order-bg-opacity-primary text-primary rounded-pill active"><?php echo e(\App\Models\Transaction::STATUS_PAID); ?></span>
                                    <?php elseif($transaction->commission_status == \App\Models\Transaction::STATUS_DECLINED): ?>
                                        <span class="order-bg-opacity-danger text-danger rounded-pill active"><?php echo e(\App\Models\Transaction::STATUS_DECLINED); ?></span>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">
                            <h6 class="text-center mt-5">Transaction Data Not Exist</h6>
                        </td>
                    </tr>
                <?php endif; ?>

            </tbody>
        </table>
    </div>
    <!-- Table Responsive End -->

    <?php echo $__env->make("template.publisher.widgets.loader", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</div>

<?php if(count($transactions) && $transactions instanceof \Illuminate\Pagination\LengthAwarePaginator ): ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-sm-end justify-content-star mt-1 mb-30">

                <?php echo e($transactions->withQueryString()->links()); ?>


            </div>
        </div>
    </div>

<?php endif; ?>

<script>
    function showSubID(key)
    {
        $(`#subID${key}`).toggle();
    }
</script>
<?php /**PATH C:\xampp\htdocs\tech\resources\views/template/publisher/reports/transaction/list_view.blade.php ENDPATH**/ ?>