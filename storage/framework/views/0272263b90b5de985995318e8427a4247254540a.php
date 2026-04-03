<?php if (! $__env->hasRenderedOnce('a46452a1-6048-4c9a-9aca-4eef45214b97')): $__env->markAsRenderedOnce('a46452a1-6048-4c9a-9aca-4eef45214b97');
$__env->startPush('styles'); ?>

<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('e8f63563-1e1d-43ce-83eb-2598993d9c67')): $__env->markAsRenderedOnce('e8f63563-1e1d-43ce-83eb-2598993d9c67');
$__env->startPush('scripts'); ?>
<?php $__env->stopPush(); endif; ?>

<?php $__env->startSection("content"); ?>

    <?php if(auth()->user()->status == "active"): ?>
        <?php echo $__env->make("template.publisher.dashboard.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
        <?php echo $__env->make("template.publisher.dashboard.not_active", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.publisher.publisher_panel", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tech\resources\views/template/publisher/dashboard/index.blade.php ENDPATH**/ ?>