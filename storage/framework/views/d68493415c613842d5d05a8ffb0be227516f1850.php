<?php if (! $__env->hasRenderedOnce('24061d3e-a86c-4209-a63c-8a6ee15d4d25')): $__env->markAsRenderedOnce('24061d3e-a86c-4209-a63c-8a6ee15d4d25');
$__env->startPush('styles'); ?>

<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('285bfc1e-d3fc-45f1-94a8-17d8de5de05b')): $__env->markAsRenderedOnce('285bfc1e-d3fc-45f1-94a8-17d8de5de05b');
$__env->startPush('scripts'); ?>

<?php $__env->stopPush(); endif; ?>

<?php $__env->startSection("content"); ?>

    <div class="az-content az-content-dashboard">

        <div class="container-fluid">
            <div class="az-content-body">
                <?php
                    $title = "Deep Link Generator";
                    $description = "Create a Link with our super fast deep link generator tool and promote any brand easily.";
                ?>
                <?php echo $__env->make("template.publisher.widgets.deeplink", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.publisher.publisher_panel", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Downloads\application\resources\views/template/publisher/tools/deeplink/view.blade.php ENDPATH**/ ?>