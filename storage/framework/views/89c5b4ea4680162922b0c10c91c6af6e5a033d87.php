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

        <?php echo $__env->yieldPushContent('top_scripts'); ?>

    </head>

    <body>
        <main class="main-content">
            <?php echo $__env->yieldContent("content"); ?>
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
        <script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/js/jquery.validate.min.js")); ?>"></script>

        <?php echo $__env->yieldPushContent('scripts'); ?>

        <script>
            function showPassword(id)
            {
                let password = "password", text = "text";

                if($(`#${id}`).attr("type") == password)
                {
                    $(`#${id}`).attr('type', text);
                    $(`#${id}-icon`).removeClass('fa-eye-slash');
                    $(`#${id}-icon`).addClass('fa-eye');
                }
                else if($(`#${id}`).attr("type") == text)
                {
                    $(`#${id}`).attr('type', password);
                    $(`#${id}-icon`).removeClass('fa-eye');
                    $(`#${id}-icon`).addClass('fa-eye-slash');
                }
            }

            // Preloader
            window.addEventListener('load', function () {

                $(".loader-overlay").delay(500).fadeOut("slow");
                $("#overlayer").fadeOut(500, function () {
                    $('body').removeClass('overlayScroll');
                });

                document.querySelector('body').classList.add("loaded")

                /* feather icon */
                feather.replace();

            });
        </script>

        <?php if(env("APP_ENV") == "production" && empty(request()->search)): ?>
            <!-- Hotjar Tracking Code for https://app.linkscircle.com/ -->
            <script>
                (function(h,o,t,j,a,r){
                    h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
                    h._hjSettings={hjid:3451709,hjsv:6};
                    a=o.getElementsByTagName('head')[0];
                    r=o.createElement('script');r.async=1;
                    r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
                    a.appendChild(r);
                })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
            </script>
        <?php endif; ?>

    </body>
</html>
<?php /**PATH C:\Users\lenovo\Downloads\application\resources\views/layouts/panel_guest.blade.php ENDPATH**/ ?>