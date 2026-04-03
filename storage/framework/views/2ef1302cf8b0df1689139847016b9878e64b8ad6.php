<?php if (! $__env->hasRenderedOnce('0404eeed-3811-47e1-81a3-9ce9cd345fb8')): $__env->markAsRenderedOnce('0404eeed-3811-47e1-81a3-9ce9cd345fb8');
$__env->startPush('styles'); ?>

<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('6736b0ee-d4fa-4ee2-be26-74d1d8c8d833')): $__env->markAsRenderedOnce('6736b0ee-d4fa-4ee2-be26-74d1d8c8d833');
$__env->startPush('scripts'); ?>
<?php $__env->stopPush(); endif; ?>

<?php $__env->startSection("content"); ?>

    <?php if(auth()->user()->status == "active"): ?>
        <?php echo $__env->make("template.publisher.dashboard.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
        <?php echo $__env->make("template.publisher.dashboard.not_active", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.publisher.publisher_panel", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\lynktrix\resources\views/template/publisher/dashboard/index.blade.php ENDPATH**/ ?>