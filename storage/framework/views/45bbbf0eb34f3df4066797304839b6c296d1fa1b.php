<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <link rel="icon" type="image/png" href="<?php echo e(\App\Helper\Static\Methods::staticAsset("img/favicon.png")); ?>">

    <?php echo SEOMeta::generate(); ?>

    <?php echo OpenGraph::generate(); ?>

    <?php echo Twitter::generate(); ?>

    <?php echo JsonLd::generate(); ?>


    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- inject:css-->
    <link rel="stylesheet" href="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/css/bootstrap/bootstrap.css")); ?>">
    <link rel="stylesheet" href="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/css/fontawesome.css")); ?>">
    <link rel="stylesheet" href="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/css/line-awesome.min.css")); ?>">

    <?php echo $__env->yieldPushContent('styles'); ?>

    <link rel="stylesheet" href="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/css/style.css")); ?>">

    <style>
        .contents {
            padding: 60px 15px 72px 295px !important;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__clear {
            margin: -3px -6px;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            margin: 10px 0 !important;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__rendered li,
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            margin: 7px 0 7px 10px !important;
        }
        .select2-container--default .select2-selection--single, .select2-container--default .select2-selection--multiple {
            padding: unset !important;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            margin-bottom: 5px;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__rendered {
            padding: 0 20px 0 5px !important;
        }
    </style>

</head>

<body class="side-menu layout-light overlayScroll">

    <?php echo $__env->make("partial.admin.mobile", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make("partial.admin.header", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main class="main-content">
        <?php echo $__env->make("partial.admin.aside", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent("content"); ?>
        <?php echo $__env->make("partial.admin.footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </main>

    <div id="overlayer">
        <span class="loader-overlay">
            <div class="atbd-spin-dots spin-lg">
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
            </div>
        </span>
    </div>

    <script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/js/jquery/jquery-3.5.1.min.js")); ?>"></script>
    <script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/js/jquery/jquery-ui.js")); ?>"></script>
    <script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/js/bootstrap/popper.js")); ?>"></script>
    <script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/js/bootstrap/bootstrap.min.js")); ?>"></script>
    <script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/js/feather.min.js")); ?>"></script>
    <script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/js/admin_extra.js")); ?>"></script>

    <?php echo $__env->yieldPushContent("editor"); ?>

    <?php echo $__env->yieldPushContent('scripts'); ?>
    <?php echo $__env->yieldPushContent('extended_scripts'); ?>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\tech\resources\views/layouts/admin/panel_app.blade.php ENDPATH**/ ?>