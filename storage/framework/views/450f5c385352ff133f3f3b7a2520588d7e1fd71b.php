<div class="card border-0">
    <div class="card-header">
        <h6>Top Advertisers by <strong>Sales</strong></h6>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table--default">
                <tbody>
                    <?php if(count($topSales)): ?>
                        <?php $__currentLoopData = $topSales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topSale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <div class="title">
                                        <a href="<?php echo e(route("publisher.view-advertiser", ['sid' => $topSale->external_advertiser_id])); ?>">
                                            <?php echo e($topSale->advertiser_name); ?>

                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <strong>
                                        <?php echo e($topSale->sale_amount_currency); ?> <?php echo e(number_format($topSale->total_sales_amount, 2)); ?>

                                    </strong>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4">
                                <small class="text-center">No Top Advertisers by Sales Data Exist</small>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\tech\resources\views/template/publisher/widgets/top_advertisers_by_sales.blade.php ENDPATH**/ ?>