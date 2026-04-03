<div class="card border-0">
    <div class="card-header">
        <h6>Account Summary</h6>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table--default">
                <tbody>
                    <?php $__currentLoopData = $accountSummary; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $summary): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <div class="title">
                                    <?php echo e(ucwords($summary['status'])); ?> Advertisers
                                </div>
                            </td>
                            <td>
                                <strong><?php echo e($summary['total']); ?></strong>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\tech\resources\views/template/publisher/widgets/account_summary.blade.php ENDPATH**/ ?>