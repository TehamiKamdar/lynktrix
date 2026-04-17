<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="verify-admitad" content="67b8b56253">
    <link rel="icon" type="image/png" href="<?php echo e(asset("img/favicon.png")); ?>">
    <title>Get Started with Lynktrix</title>
    <?php echo SEOMeta::generate(); ?>

    <?php echo OpenGraph::generate(); ?>

    <?php echo Twitter::generate(); ?>

    <?php echo JsonLd::generate(); ?>


    <!-- Favicon -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Quicksand:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset("vendor_assets/css/bootstrap/bootstrap.css")); ?>">
    <link rel="stylesheet" href="<?php echo e(asset("vendor_assets/css/remixicon.css")); ?>">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        :root {
            --bs-accent: #C22437;
            --bs-accent-dark: #9e1b2c;
            --bs-bg-dark: #05071e;
            --bs-bg-light: #f8f9ff;
            --bs-text-dark: #1a1a2e;
            --bs-text-gray: #6c6c7a;
            --bs-card-bg: #ffffff;
            --bs-border-light: #e8e8f0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #fafaff 0%, #ffffff 100%);
            font-family: 'Poppins', sans-serif;
            color: var(--bs-text-dark);
            min-height: 100vh;
            overflow-x: hidden;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Quicksand', sans-serif;
            font-weight: 700;
            letter-spacing: -0.02em;
        }

        .text-accent {
            color: var(--bs-accent) !important;
        }

        .bg-accent {
            background-color: var(--bs-accent) !important;
        }

        /* Get Started Page Styles */
        .get-started-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 4rem 1.5rem;
            position: relative;
            overflow: hidden;
        }

        /* Animated background elements */
        .get-started-page::before {
            content: '';
            position: absolute;
            top: -30%;
            left: -20%;
            width: 80%;
            height: 80%;
            background: radial-gradient(circle, rgba(194, 36, 55, 0.04) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        .get-started-page::after {
            content: '';
            position: absolute;
            bottom: -20%;
            right: -10%;
            width: 60%;
            height: 60%;
            background: radial-gradient(circle, rgba(194, 36, 55, 0.03) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        /* Page Header */
        .page-head {
            margin-bottom: 3.5rem;
        }

        .page-head h1 {
            font-size: 3rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--bs-text-dark) 0%, var(--bs-accent) 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 0.75rem;
        }

        .page-head p {
            font-size: 1.1rem;
            color: var(--bs-text-gray);
            max-width: 500px;
            margin: 0 auto;
        }

        /* Choice Cards Container */
        .choice-stack {
            display: flex;
            justify-content: center;
            gap: 2rem;
            flex-wrap: wrap;
            max-width: 1000px;
            margin: 0 auto;
        }

        /* Individual Choice Card */
        .choice-card {
            flex: 1;
            min-width: 280px;
            max-width: 400px;
            background: var(--bs-card-bg);
            border-radius: 20px;
            padding: 2rem 1.8rem;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 1.2rem;
            transition: all 0.35s cubic-bezier(0.2, 0.9, 0.4, 1.1);
            border: 1px solid var(--bs-border-light);
            box-shadow: 0 10px 25px -8px rgba(0, 0, 0, 0.05);
            position: relative;
            overflow: hidden;
        }

        .choice-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--bs-accent), var(--bs-accent-dark));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s ease;
        }

        .choice-card:hover {
            box-shadow: 0 25px 40px -12px rgba(194, 36, 55, 0.2);
            border-color: rgba(194, 36, 55, 0.3);
        }

        /* Icon Styling */
        .choice-icon {
            width: 64px;
            height: 64px;
            background: rgba(194, 36, 55, 0.1);
            border-radius: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .choice-icon i {
            font-size: 2rem;
            color: var(--bs-accent);
            transition: all 0.3s ease;
        }

        .choice-card:hover .choice-icon {
            background: var(--bs-accent);
            transform: scale(1.05);
        }

        .choice-card:hover .choice-icon i {
            color: white;
        }

        /* Content Styling */
        .choice-content {
            flex: 1;
        }

        .choice-content h3 {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 0.3rem;
            color: var(--bs-text-dark);
        }

        .choice-content p {
            font-size: 0.85rem;
            color: var(--bs-text-gray);
            margin-bottom: 0;
            line-height: 1.4;
        }

        /* Arrow Icon */
        .choice-arrow {
            width: 36px;
            height: 36px;
            background: rgba(194, 36, 55, 0.08);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .choice-arrow i {
            font-size: 1.2rem;
            color: var(--bs-accent);
            transition: all 0.3s ease;
        }

        .choice-card:hover .choice-arrow {
            background: var(--bs-accent);
            transform: translateX(5px);
        }

        .choice-card:hover .choice-arrow i {
            color: white;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .get-started-page {
                padding: 3rem 1rem;
            }

            .page-head h1 {
                font-size: 2.2rem;
            }

            .page-head p {
                font-size: 0.95rem;
            }

            .choice-card {
                padding: 1.5rem;
                gap: 1rem;
            }

            .choice-icon {
                width: 52px;
                height: 52px;
            }

            .choice-icon i {
                font-size: 1.6rem;
            }

            .choice-content h3 {
                font-size: 1.1rem;
            }
        }

        @media (max-width: 480px) {
            .choice-card {
                flex-direction: column;
                text-align: center;
            }

            .choice-arrow {
                align-self: flex-end;
            }
        }
    </style>
</head>

<body>
    <!-- Background decorative elements -->
    <section class="get-started-page">
        <div class="container">
            <!-- Heading -->
            <div class="text-center page-head" data-aos="fade-down" data-aos-duration="1000">
                <h1>Get Started</h1>
                <p>Choose how you'd like to continue with Lynktrix.</p>
            </div>

            <!-- Cards Column -->
            <div class="choice-stack">
                <!-- New Here Card -->
                <a href="<?php echo e(route('register', ['type' => 'publisher'])); ?>" class="choice-card" data-aos="fade-up-right" data-aos-delay="150" data-aos-duration="1100"   >
                    <div class="choice-icon">
                        <i class="ri-user-add-line"></i>
                    </div>
                    <div class="choice-content">
                        <h3>New Here?</h3>
                        <p>Create your account and start growing with our platform.</p>
                    </div>
                    <div class="choice-arrow">
                        <i class="ri-arrow-right-up-line"></i>
                    </div>
                </a>

                <!-- Already Member Card -->
                <a href="<?php echo e(route('login', ['type' => 'publisher'])); ?>" class="choice-card" data-aos="fade-up-left" data-aos-delay="300" data-aos-duration="1100">
                    <div class="choice-icon">
                        <i class="ri-login-circle-line"></i>
                    </div>
                    <div class="choice-content">
                        <h3>Already a Member?</h3>
                        <p>Sign in to access your dashboard and manage your account.</p>
                    </div>
                    <div class="choice-arrow">
                        <i class="ri-arrow-right-up-line"></i>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <script src="<?php echo e(asset("vendor_assets/js/jquery/jquery-3.5.1.min.js")); ?>"></script>
    <script src="<?php echo e(asset("vendor_assets/js/jquery/jquery-ui.js")); ?>"></script>
    <script src="<?php echo e(asset("vendor_assets/js/bootstrap/popper.js")); ?>"></script>
    <script src="<?php echo e(asset("vendor_assets/js/bootstrap/bootstrap.min.js")); ?>"></script>
    <script src="<?php echo e(asset("vendor_assets/js/feather.min.js")); ?>"></script>
    <script src="<?php echo e(asset("vendor_assets/js/jquery.validate.min.js")); ?>"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            offset: 20
        });
    </script>

    <?php if(env("APP_ENV") == "production" && empty(request()->search)): ?>
        <!-- Hotjar Tracking Code for https://app.linkscircle.com/ -->
        <script>
            (function (h, o, t, j, a, r) {
                h.hj = h.hj || function () { (h.hj.q = h.hj.q || []).push(arguments) };
                h._hjSettings = { hjid: 3451709, hjsv: 6 };
                a = o.getElementsByTagName('head')[0];
                r = o.createElement('script'); r.async = 1;
                r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
                a.appendChild(r);
            })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
        </script>
    <?php endif; ?>
</body>

</html><?php /**PATH D:\lynktrix\resources\views/auth/login_view.blade.php ENDPATH**/ ?>