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
        <?php echo $__env->yieldPushContent('styles'); ?>
        <?php echo $__env->yieldPushContent('extended_styles'); ?>
        <link href="<?php echo e(\App\Helper\Static\Methods::staticAsset("publisher_dashboard/lib/ionicons/css/ionicons.min.css")); ?>" rel="stylesheet">
        <link href="<?php echo e(\App\Helper\Static\Methods::staticAsset("publisher_dashboard/lib/typicons.font/typicons.css")); ?>" rel="stylesheet">
        <link href="<?php echo e(\App\Helper\Static\Methods::staticAsset("publisher_dashboard/lib/flag-icon-css/css/flag-icon.min.css")); ?>" rel="stylesheet">
        <!-- Bootstrap 5 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <!-- azia CSS -->
        <link rel="stylesheet" href="<?php echo e(\App\Helper\Static\Methods::staticAsset("publisher_dashboard/css/azia.css")); ?>">


    </head>

    <style>
        /* Dim background when loader is active */
.zero-point-one-opacity {
    opacity: 0.1;
    pointer-events: none;
}

/* Loader container */
.spin-container {
    position: absolute;
    inset: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
}

/* Adjustment for top spacing */
.top-minus-25px {
    margin-top: -25px;
}

/* Spinner wrapper */
.atbd-spin-dots {
    display: flex;
    gap: 6px;
}

/* Individual dots */
.atbd-spin-dots .spin-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background-color: #5b47fb;
    animation: spinDots 1.2s infinite ease-in-out;
}

.display-hidden{
    display: none;
}

/* Animation delay for each dot */
.atbd-spin-dots .spin-dot:nth-child(1) { animation-delay: 0s; }
.atbd-spin-dots .spin-dot:nth-child(2) { animation-delay: 0.15s; }
.atbd-spin-dots .spin-dot:nth-child(3) { animation-delay: 0.3s; }
.atbd-spin-dots .spin-dot:nth-child(4) { animation-delay: 0.45s; }

/* Dot animation */
@keyframes spinDots {
    0% {
        transform: scale(1);
        opacity: 0.3;
    }
    50% {
        transform: scale(1.6);
        opacity: 1;
    }
    100% {
        transform: scale(1);
        opacity: 0.3;
    }
}

    </style>

    <body class="layout-light top-menu overlayScroll">

        <div class="notification-wrapper top-right"></div>


        <?php echo $__env->make("partial.publisher.new_header", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <main class="az-dashboard">
            <?php echo $__env->yieldContent("content"); ?>
        </main>
        <?php echo $__env->make("partial.publisher.footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>




    <script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("publisher_dashboard/lib/jquery/jquery.min.js")); ?>"></script>
    <script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("publisher_dashboard/lib/bootstrap/js/bootstrap.bundle.min.js")); ?>"></script>
    <script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("publisher_dashboard/lib/ionicons/ionicons.js")); ?>"></script>
    <script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("publisher_dashboard/lib/jquery.flot/jquery.flot.js")); ?>"></script>
    <script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("publisher_dashboard/lib/jquery.flot/jquery.flot.resize.js")); ?>"></script>
    <script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("publisher_dashboard/lib/chart.js/Chart.bundle.min.js")); ?>"></script>
    <script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("publisher_dashboard/lib/peity/jquery.peity.min.js")); ?>"></script>

    <script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("publisher_dashboard/js/azia.js")); ?>"></script>
    <script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("publisher_dashboard/js/chart.flot.sampledata.js")); ?>"></script>
    <script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("publisher_dashboard/js/dashboard.sampledata.js")); ?>"></script>
    <script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("publisher_dashboard/js/cookie.js")); ?>" type="text/javascript"></script>

        <?php echo $__env->yieldPushContent('scripts'); ?>
        <?php echo $__env->yieldPushContent('extended_scripts'); ?>

        <script>

            let toastCount = 0;

            function createToast(type, content){
                let icon = '', toast = '';
                const notificationShocase = $('.notification-wrapper');

                if(type)
                    icon = 'check-circle';
                else
                    icon = 'x-circle';

                toast =`
                    <div class="atbd-notification-box notification-${type} notification-${toastCount}">
                        <div class="atbd-notification-box__content media">
                            <div class="atbd-notification-box__icon">
                                <span data-feather="${icon}"></span>
                            </div>
                            <div class="atbd-notification-box__text media-body">
                                <h6>Notification</h6>
                                ${content}
                            </div>
                        </div>
                        <a href="#" class="atbd-notification-box__close" data-toast="close">
                            <span data-feather="x"></span>
                        </a>
                    </div>
                    `;

                notificationShocase.append(toast);
                toastCount++;
            }

            function normalMsg(response)
            {
                let content = `<p>${response.message}</p>`;

                let duration = (optionValue, defaultValue) =>
                    typeof optionValue === "undefined" ? defaultValue : optionValue;

                let type = "danger";
                if(response.success)
                    type = "success";

                createToast(type, content);
                feather.replace();
                let thisToast = toastCount - 1;

                $('*[data-toast]').on('click',function(){
                    $(this).parent('.atbd-notification-box').remove();
                })

                setTimeout(function(){
                    $(document).find(".notification-"+thisToast).remove();
                },duration(6000));
            }

            function copyToClipboard(elem) {
                // create hidden text element, if it doesn't already exist
                var targetId = "_hiddenCopyText_";
                var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
                var origSelectionStart, origSelectionEnd;
                if (isInput) {
                    // can just use the original source element for the selection and copy
                    target = elem;
                    origSelectionStart = elem.selectionStart;
                    origSelectionEnd = elem.selectionEnd;
                } else {
                    // must use a temporary form element for the selection and copy
                    target = document.getElementById(targetId);
                    if (!target) {
                        var target = document.createElement("textarea");
                        target.style.position = "absolute";
                        target.style.left = "-9999px";
                        target.style.top = "0";
                        target.id = targetId;
                        document.body.appendChild(target);
                    }
                    target.textContent = elem.textContent;
                }
                // select the content
                var currentFocus = document.activeElement;
                target.focus();
                target.setSelectionRange(0, target.value.length);

                // copy the selection
                var succeed;
                try {
                    succeed = document.execCommand("copy");
                } catch(e) {
                    succeed = false;
                }
                // restore original focus
                if (currentFocus && typeof currentFocus.focus === "function") {
                    currentFocus.focus();
                }

                if (isInput) {
                    // restore prior selection
                    elem.setSelectionRange(origSelectionStart, origSelectionEnd);
                } else {
                    // clear temporary content
                    target.textContent = "";
                }
                return succeed;
            }

            function showErrors(response)
            {
                let duration = (optionValue, defaultValue) =>
                    typeof optionValue === "undefined" ? defaultValue : optionValue;

                let errorContent = "";

                if(response.responseJSON.hasOwnProperty("errors")) {
                    Object.values(response.responseJSON.errors).forEach(errors => {
                        errors.forEach(error => {
                            errorContent += `<p>${error}</p>`
                        });
                    });
                } else if(response.responseJSON.hasOwnProperty("message"))
                {
                    errorContent += `<p>${response.responseJSON.message}</p>`
                }

                createToast("danger", errorContent);
                feather.replace();
                let thisToast = toastCount - 1;

                $('*[data-toast]').on('click',function(){
                    $(this).parent('.atbd-notification-box').remove();
                })

                setTimeout(function(){
                    $(document).find(".notification-"+thisToast).remove();
                },duration(6000));
            }

            document.addEventListener("DOMContentLoaded", function () {
                $(".btn-author-action").on("click", function () {
                    $(".mobile-author-actions").toggleClass("show");
                    $(".mobile-search").removeClass("show");
                    $(".btn-search").removeClass("search-active");
                });
                $(".sales-target__progress-bar").each(function () {
                    var bar = $(this).find(".bar");
                    var val = $(this).find("span");
                    var per = parseInt(val.text(), 10);
                    var $right = $('.right');
                    var $back = $('.back');

                    $({
                        p: 0
                    }).animate({
                        p: per
                    }, {
                        duration: 3000,
                        step: function (p) {
                            bar.css({
                                transform: "rotate(" + (45 + (p * 1.8)) + "deg)"
                            });
                            val.text(p | 0);
                        }
                    }).delay(200);

                    if (per == 100) {
                        $back.delay(2600).animate({
                            'top': '18px'
                        }, 200);
                    }
                    if (per == 0) {
                        $('.left').css('background', 'gray');
                    }
                });
            });

            // Preloader
            window.addEventListener('load', function () {

                $(".loader-overlay").delay(500).fadeOut("slow");
                $("#overlayer").fadeOut(500, function () {
                    $('body').removeClass('overlayScroll');
                });

                document.querySelector('body').classList.add("loaded")

                /* sidebar collapse  */
                const sidebarToggle = document.querySelector(".sidebar-toggle");

                function sidebarCollapse() {
                    $('.overlay-dark-sidebar').toggleClass('show');
                    document.querySelector(".sidebar").classList.toggle("sidebar-collapse");
                    document.querySelector(".sidebar").classList.toggle("collapsed");
                    document.querySelector(".contents").classList.toggle("expanded");
                }

                if (sidebarToggle) {
                    sidebarToggle.addEventListener("click", function (e) {
                        e.preventDefault();
                        sidebarCollapse();
                    });
                }

                /* sidebar nav events */
                $(".sidebar_nav .has-child ul").hide();
                $(".sidebar_nav .has-child.open ul").show();
                $(".sidebar_nav .has-child >a").on("click", function (e) {
                    e.preventDefault();
                    $(this).parent().next("has-child").slideUp();
                    $(this).parent().parent().children(".has-child").children("ul").slideUp();
                    $(this).parent().parent().children(".has-child").removeClass("open");
                    if ($(this).next().is(":visible")) {
                        $(this).parent().removeClass("open");
                    } else {
                        $(this).parent().addClass("open");
                        $(this).next().slideDown();
                    }
                });

                /* Header mobile view */
                $(window).on('resize', function () {
                    var screenSize = window.innerWidth;
                    if ($(this).width() <= 767.98) {
                        $(".navbar-right__menu").appendTo(".mobile-author-actions");
                        // $(".search-form").appendTo(".mobile-search");
                        $(".contents").addClass("expanded");
                        $(".sidebar ").removeClass("sidebar-collapse");
                        $(".sidebar ").addClass("collapsed");
                    } else {
                        $(".navbar-right__menu").appendTo(".navbar-right");
                    }
                })
                    .trigger("resize");

                $(window)
                    .bind("resize", function () {
                        var screenSize = window.innerWidth;
                        if ($(this).width() > 767.98) {
                            $(".atbd-mail-sidebar").addClass("show");
                        }
                    })
                    .trigger("resize");

                $(window)
                    .bind("resize", function () {
                        var screenSize = window.innerWidth;
                        if ($(this).width() <= 991) {
                            $(".sidebar").removeClass("sidebar-collapse");
                            $(".sidebar").addClass("collapsed");
                            $(".sidebar-toggle").on("click", function () {
                                $(".overlay-dark-sidebar").toggleClass("show");
                            });
                            $(".overlay-dark-sidebar").on("click", function () {
                                $(this).removeClass("show");
                                $(".sidebar").removeClass("sidebar-collapse");
                                $(".sidebar").addClass("collapsed");
                            });
                        }
                    })
                    .trigger("resize");

                /* Mobile Menu */
                $(window)
                    .bind("resize", function () {
                        var screenSize = window.innerWidth;
                        if ($(this).width() <= 991.98) {
                            $(".menu-horizontal").appendTo(".mobile-nav-wrapper");
                        }
                    })
                    .trigger("resize");
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Optional: Add some interactivity
    document.addEventListener('DOMContentLoaded', function() {
        const accordionButtons = document.querySelectorAll('.accordion-button');

        accordionButtons.forEach(button => {
            button.addEventListener('click', function() {
                // You can add custom logic here
                console.log('Accordion toggled:', this.querySelector('.advertiser-name').textContent.trim());
            });
        });
    });
</script>
<?php /**PATH C:\Users\lenovo\Downloads\application\resources\views/layouts/publisher/publisher_panel.blade.php ENDPATH**/ ?>