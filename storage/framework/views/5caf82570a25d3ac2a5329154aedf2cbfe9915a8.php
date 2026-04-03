<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="verify-admitad" content="67b8b56253">
    <link rel="icon" type="image/png" href="<?php echo e(\App\Helper\Static\Methods::staticAsset("img/favicon.png")); ?>">

    <?php echo SEOMeta::generate(); ?>

    <?php echo OpenGraph::generate(); ?>

    <?php echo Twitter::generate(); ?>

    <?php echo JsonLd::generate(); ?>


    <!-- Favicon -->
    <link rel="stylesheet" href="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/css/bootstrap/bootstrap.css")); ?>">
    <link rel="stylesheet" href="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/css/fontawesome.css")); ?>">
    <link rel="stylesheet" href="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/css/line-awesome.min.css")); ?>">
    <link rel="stylesheet" href="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/css/style.css")); ?>">

    <style>
        @media (max-width:768px){
            .signUP-admin {
                padding: 30px 0;
            }
            .logo-div {
                margin-bottom: 20px!important;
            }
            .signUP-admin .signup-button .card {
                margin-left: 0!important;
                margin-right: 0!important;
            }
        }
        .bg-transparent {background:transparent;}
        .arrow-icon {
            position: absolute;
            right: 8%;
            top: 30%;
            font-size: 25px;
        }
        .signup-button {color:#272b41;}
        .signup-button:hover {color:#5f63f2;}
        .signup-button:hover .card {outline: 1px solid #5f63f2;}
    </style>
</head>
<body>

    <main class="main-content ">
        <div class="signUP-admin" style="background-color: #f6f6fb;">
            <div class="container-fluid">
                <div class="signUp-admin-right p-md-30">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <div class="logo-div text-center">
                                <a href="https://www.linkscircle.com/"><img src="<?php echo e(\App\Helper\Static\Methods::staticAsset("img/logo.png")); ?>" alt="LinksCircle Affiliate Network" width="200px" class="img-fluid"></a>
                            </div>
                            <div class="edit-profile mt-md-25 mt-0">
                                <div class="card border-0 bg-transparent">
                                    <div class="card-header border-0  pb-md-15 pb-10 pt-md-20 pt-10 bg-transparent">
                                        <div class="edit-profile__title"><h6>Let's Get Started!</h6>
                                            <p>Select the account type that best fits your role.</p>
                                        </div>
                                    </div>
                                </div>
                                <a class="signup-button" href="<?php echo e(route('register', ['type' => 'publisher'])); ?>">
                                    <div class="card border-0 mx-30 mb-20 shadow">
                                        <div class="card-body">
                                            <div class="edit-profile__body">

                                                <div class="edit-profile__title"><h6 class="mb-1">Publisher</h6>
                                                    <p class="mb-0 w-90">I have a website and searching for brands to promote.</p>
                                                    <div class="arrow-icon"><i class="fas fa-arrow-right"></i></div>
                                                </div>

                                            </div>
                                        </div><!-- End: .card-body -->
                                    </div><!-- End: .card -->
                                </a>
                                <a class="signup-button" href="<?php echo e(route('register', ['type' => 'advertiser'])); ?>">
                                    <div class="card border-0 mx-30 mb-10 shadow">
                                        <div class="card-body">
                                            <div class="edit-profile__body">

                                                <div class="edit-profile__title"><h6 class="mb-1">Advertiser</h6>
                                                    <p class="mb-0 w-90">I want to promote my brand by partnering with top publishers.</p>
                                                    <div class="arrow-icon"><i class="fas fa-arrow-right"></i></div>
                                                </div>

                                            </div>
                                        </div><!-- End: .card-body -->
                                    </div><!-- End: .card -->
                                </a>
                                <div class="card border-0 bg-transparent">
                                    <div class="card-body bg-transparent">
                                        <p class="iq-fw-3 iq-ls-3">Already have an account?</p>
                                        <a href="<?php echo e(route('login', ['type' => 'advertiser'])); ?>" class="btn btn-primary btn-default btn-block btn-squared text-capitalize lh-normal px-50 py-15 text-white">Log in</a>
                                    </div>
                                </div>


                            </div><!-- End: .edit-profile -->

                        </div><!-- End: .col-xl-5 -->
                    </div>
                </div><!-- End: .signUp-admin-right  -->
            </div>
        </div><!-- End: .signUP-admin  -->
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

    <script>

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
<?php /**PATH C:\xampp\htdocs\tech\resources\views/auth/login_view.blade.php ENDPATH**/ ?>