<?php if (! $__env->hasRenderedOnce('f079891f-32ae-46d0-b2ea-00bd9ed93a2d')): $__env->markAsRenderedOnce('f079891f-32ae-46d0-b2ea-00bd9ed93a2d');
$__env->startPush('styles'); ?>

<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('e6cb8f0e-38c1-4262-a50e-f8a5c75daafd')): $__env->markAsRenderedOnce('e6cb8f0e-38c1-4262-a50e-f8a5c75daafd');
$__env->startPush('scripts'); ?>
<?php $__env->stopPush(); endif; ?>

<?php $__env->startSection("content"); ?>

    <?php if(auth()->user()->status == "active"): ?>
        <?php echo $__env->make("template.publisher.dashboard.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
        <?php echo $__env->make("template.publisher.dashboard.not_active", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.publisher.publisher_panel", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Downloads\application\resources\views/template/publisher/dashboard/index.blade.php ENDPATH**/ ?>