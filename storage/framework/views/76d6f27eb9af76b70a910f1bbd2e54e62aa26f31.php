<div class="card border-0">
    <div class="card-header">
        <h6>Top Advertisers by <strong>Clicks</strong></h6>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table--default">
                <tbody>
                <?php if(count($topClicks)): ?>
                        <?php $__currentLoopData = $topClicks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topClick): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(isset($topClick['advertiser']['sid'])): ?>
                                <tr>
                                    <td>
                                        <div class="title">
                                            <a href="<?php echo e(route("publisher.view-advertiser", ['sid' => $topClick['advertiser']['sid']])); ?>">
                                                <?php echo e($topClick['advertiser']['name']); ?>

                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <strong>
                                            <?php echo e($topClick['tracking']); ?>

                                        </strong>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4">
                                <small class="text-center">No Top Advertisers by Clicks Data Exist</small>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\tech\resources\views/template/publisher/widgets/top_advertisers_by_clicks.blade.php ENDPATH**/ ?>