<div class="tab-content" id="ap-tabContent">
    <div class="tab-pane fade show active" id="all-transactions" role="tabpanel" aria-labelledby="all-transactions-tab">

        <?php echo $__env->make("template.publisher.widgets.loader", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Start Table Responsive -->
        <div class="table-responsive">
            <table class="table table-hover table-primary">
                <thead>
                    <tr>
                        <th scope="col" colspan="6" class="text-center">
                            <h5 class="fw-bold">Earnings</h5>
                        </th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <span class="userDatatable-title font-weight-bold text-black">Advertiser</span>
                    </td>
                    <td>
                        <span class="userDatatable-title font-weight-bold text-black">Transactions</span>
                    </td>
                    <td>
                        <span class="userDatatable-title font-weight-bold text-black">Sale Amount</span>
                    </td>
                    <td>
                        <span class="userDatatable-title font-weight-bold text-black">Commission</span>
                    </td>
                    <td>
                        <span class="userDatatable-title font-weight-bold text-black">Commission Payout</span>
                    </td>
                    <td>
                        <span class="userDatatable-title font-weight-bold text-black">Avg. Payout</span>
                    </td>
                </tr>
                <?php if($performanceOverviewList && count($performanceOverviewList)): ?>
                    <?php $__currentLoopData = $performanceOverviewList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $totalClicks = $list->total_clicks ?? 0;
                            $totalTransactions = $list->total_transactions ?? 0;
                            $totalSaleAmount = $list->total_sale_amount ?? 0;
                            $totalCommissionAmount = $list->total_commission_amount ?? 0;
                            $totalCommissionPayoutAmount = ((float)\App\Helper\Static\Vars::COMMISSION_PERCENTAGE/100) * (float)$list->total_commission_amount;
                        ?>
                        <tr>
                            <td>
                                <a target="_blank" href="<?php echo e(route("publisher.reports.transactions.list", ['search_by_name' => $list->external_advertiser_id ?? "-", 'start_date' => request()->start_date ?? now()->format("Y-m-01"), 'end_date' => now()->format("Y-m-t")])); ?>"><?php echo e($list->advertiser_name ?? "-"); ?> <br><span class="fs-12 color-gray">(<?php echo e($list->external_advertiser_id); ?>)</span></a>
                            </td>
                            <td><a target="_blank" href="<?php echo e(route("publisher.reports.transactions.list", ['search_by_name' => $list->external_advertiser_id ?? "-", 'start_date' => request()->start_date ?? now()->format("Y-m-01"), 'end_date' => now()->format("Y-m-t")])); ?>"><?php echo e(number_format($totalTransactions)); ?></a></td>
                            <td><?php echo e($list->sale_amount_currency ?? "USD"); ?> <?php echo e(number_format($totalSaleAmount, 2)); ?></td>
                            <td><?php echo e($list->commission_amount_currency ?? "USD"); ?> <?php echo e(number_format($totalCommissionAmount, 2)); ?></td>
                            <td><?php echo e($list->commission_amount_currency ?? "USD"); ?> <?php echo e(number_format($totalCommissionPayoutAmount, 2)); ?></td>
                            <?php if($totalCommissionAmount > 0 && $totalSaleAmount > 0): ?>
                                <td><?php echo e(number_format(round($totalCommissionAmount / $totalSaleAmount * 100), 1)); ?>%</td>
                            <?php else: ?>
                                <td><?php echo e(number_format(0, 1)); ?>%</td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">
                            <h6 class="my-2 text-center">Performance Overview Data Not Exist</h6>
                        </td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
        <!-- Table Responsive End -->
    </div>
</div>

<?php if(count($performanceOverviewList) && $performanceOverviewList instanceof \Illuminate\Pagination\LengthAwarePaginator ): ?>

    <div class="d-flex justify-content-sm-end justify-content-start mt-15 pt-25 border-top">

        <?php echo e($performanceOverviewList->withQueryString()->links()); ?>


    </div>

<?php endif; ?>
<?php /**PATH C:\Users\lenovo\Downloads\application\resources\views/template/publisher/reports/performance/transaction/list_view.blade.php ENDPATH**/ ?>