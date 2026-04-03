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
        :root {
            --primary-color: #5b47fb;
            --primary-light: #f0eeff;
            --primary-dark: #4a3bd9;
            --text-dark: #272b41;
            --text-light: #6c757d;
            --border-color: #eaeaea;
            --shadow-light: 0 5px 15px rgba(0, 0, 0, 0.05);
            --shadow-medium: 0 10px 25px rgba(0, 0, 0, 0.08);
            --shadow-card: 0 20px 40px rgba(91, 71, 251, 0.1);
            --gradient-primary: linear-gradient(135deg, #5b47fb 0%, #7b68ff 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: #f9fafc;
            color: var(--text-dark);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }

        /* Background decorative elements */
        .bg-circle {
            position: fixed;
            border-radius: 50%;
            z-index: -1;
        }

        .bg-circle-1 {
            width: 400px;
            height: 400px;
            background: linear-gradient(135deg, rgba(91, 71, 251, 0.05) 0%, rgba(123, 104, 255, 0.05) 100%);
            top: -200px;
            right: -200px;
        }

        .bg-circle-2 {
            width: 300px;
            height: 300px;
            background: linear-gradient(135deg, rgba(91, 71, 251, 0.03) 0%, rgba(123, 104, 255, 0.03) 100%);
            bottom: -150px;
            left: -150px;
        }

        .main-container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .logo-section {
            text-align: center;
            margin-bottom: 50px;
        }

        .logo-section img {
            height: 45px;
            width: auto;
        }

        .logo-section p {
            color: var(--text-light);
            font-size: 1.1rem;
            margin-top: 15px;
        }

        .selection-wrapper {
            display: flex;
            gap: 30px;
            justify-content: center;
            align-items: stretch;
        }

        .selection-card {
            flex: 1;
            max-width: 480px;
            background: white;
            border-radius: 24px;
            box-shadow: var(--shadow-card);
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1);
            position: relative;
            border: 1px solid rgba(91, 71, 251, 0.1);
        }

        .selection-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(91, 71, 251, 0.15);
        }

        .card-header {
            padding: 40px 40px 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .card-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: var(--gradient-primary);
        }

        .card-icon {
            width: 80px;
            height: 80px;
            border-radius: 20px;
            background: var(--primary-light);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            color: var(--primary-color);
            font-size: 2.2rem;
            position: relative;
        }

        .card-icon::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 20px;
            background: var(--gradient-primary);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .selection-card:hover .card-icon::after {
            opacity: 0.1;
        }

        .card-icon i {
            position: relative;
            z-index: 1;
        }

        .card-title {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--text-dark);
        }

        .card-subtitle {
            color: var(--text-light);
            font-size: 1rem;
            max-width: 300px;
            margin: 0 auto;
        }

        .card-body {
            padding: 0 40px 30px;
        }

        .features-list {
            list-style: none;
            margin-bottom: 35px;
            min-height: 250px;
        }

        .features-list li {
            padding: 12px 0;
            display: flex;
            align-items: center;
            border-bottom: 1px solid rgba(234, 234, 234, 0.5);
            min-height: 75px;
        }

        .features-list li:last-child {
            border-bottom: none;
        }

        .feature-icon {
            width: 22px;
            height: 22px;
            border-radius: 50%;
            background: var(--primary-light);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            flex-shrink: 0;
            color: var(--primary-color);
            font-size: 0.8rem;
        }

        .feature-text {
            color: var(--text-light);
            font-size: 0.95rem;
        }

        .card-footer {
            padding: 0 40px 40px;
            border-top: none;
        }

        .btn-card {
            display: block;
            width: 100%;
            padding: 16px;
            text-align: center;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1rem;
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .btn-primary-card {
            background: var(--gradient-primary);
            color: white;
            box-shadow: 0 5px 15px rgba(91, 71, 251, 0.2);
        }

        .btn-primary-card:hover {
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(91, 71, 251, 0.3);
        }

        .btn-outline-card {
            background: transparent;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
        }

        .btn-outline-card:hover {
            background: var(--primary-light);
            color: var(--primary-color);
            transform: translateY(-3px);
        }

        .btn-icon {
            margin-left: 8px;
            transition: transform 0.3s ease;
        }

        .btn-card:hover .btn-icon {
            transform: translateX(5px);
        }

        .or-divider {
            text-align: center;
            margin: 40px 0;
            position: relative;
        }

        .or-divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: var(--border-color);
        }

        .or-divider span {
            display: inline-block;
            background: white;
            padding: 0 20px;
            color: var(--text-light);
            font-size: 0.9rem;
            position: relative;
            z-index: 1;
        }

        .footer-section {
            text-align: center;
            margin-top: 50px;
            color: var(--text-light);
            font-size: 0.95rem;
        }

        .footer-link {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            margin-left: 5px;
        }

        .footer-link:hover {
            text-decoration: underline;
        }

        /* Badge for existing users */
        .user-badge {
            display: inline-block;
            padding: 4px 12px;
            background: rgba(91, 71, 251, 0.1);
            color: var(--primary-color);
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-left: 10px;
            vertical-align: middle;
        }

        /* Responsive design */
        @media (max-width: 992px) {
            .selection-wrapper {
                flex-direction: column;
                align-items: center;
            }

            .selection-card {
                width: 100%;
                max-width: 500px;
            }
        }

        @media (max-width: 576px) {
            .card-header, .card-body, .card-footer {
                padding: 30px 25px;
            }

            .card-title {
                font-size: 1.5rem;
            }

            .card-icon {
                width: 70px;
                height: 70px;
                font-size: 1.8rem;
            }
        }

        /* Preloader styles */
        #overlayer {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: white;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .loader-overlay {
            text-align: center;
        }

        .atbd-spin-dots {
            display: flex;
            gap: 10px;
            justify-content: center;
        }

        .spin-dot {
            width: 14px;
            height: 14px;
            border-radius: 50%;
            background: var(--gradient-primary);
            animation: dot-pulse 1.5s infinite ease-in-out;
        }

        .spin-dot:nth-child(1) { animation-delay: -0.32s; }
        .spin-dot:nth-child(2) { animation-delay: -0.16s; }
        .spin-dot:nth-child(3) { animation-delay: 0s; }

        @keyframes dot-pulse {
            0%, 80%, 100% { transform: scale(0.8); opacity: 0.5; }
            40% { transform: scale(1); opacity: 1; }
        }

        /* Animation for cards */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .selection-card {
            animation: fadeInUp 0.6s ease forwards;
        }

        .selection-card:nth-child(2) {
            animation-delay: 0.2s;
            opacity: 0;
        }
    </style>
</head>
<body>
    <!-- Background decorative elements -->
    <div class="bg-circle bg-circle-1"></div>
    <div class="bg-circle bg-circle-2"></div>

    <!-- Preloader -->
    <div id="overlayer">
        <div class="loader-overlay">
            <div class="atbd-spin-dots spin-lg">
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
            </div>
        </div>
    </div>

    <main class="main-content">
        <div class="main-container">
            <!-- Logo Section -->
            <div class="logo-section">
                <a href="https://www.linkscircle.com/">
                    <img src="<?php echo e(\App\Helper\Static\Methods::staticAsset("img/logo.png")); ?>" alt="LinksCircle Affiliate Network">
                </a>
                <p>Join thousands of publishers who are growing with LinksCircle</p>
            </div>

            <!-- Side-by-side Selection Cards -->
            <div class="selection-wrapper">
                <!-- Register Card -->
                <div class="selection-card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <h2 class="card-title">Create New Account</h2>
                        <p class="card-subtitle">Join as a publisher and start earning commissions</p>
                    </div>

                    <div class="card-body">
                        <ul class="features-list">
                            <li>
                                <div class="feature-icon">
                                    <i class="fas fa-check"></i>
                                </div>
                                <div class="feature-text">Promote top brands and earn commissions</div>
                            </li>
                            <li>
                                <div class="feature-icon">
                                    <i class="fas fa-check"></i>
                                </div>
                                <div class="feature-text">Access exclusive affiliate programs</div>
                            </li>
                            <li>
                                <div class="feature-icon">
                                    <i class="fas fa-check"></i>
                                </div>
                                <div class="feature-text">Advanced tracking and analytics dashboard</div>
                            </li>
                            <li>
                                <div class="feature-icon">
                                    <i class="fas fa-check"></i>
                                </div>
                                <div class="feature-text">Timely payments and dedicated support</div>
                            </li>
                        </ul>
                    </div>

                    <div class="card-footer">
                        <a href="<?php echo e(route('register', ['type' => 'publisher'])); ?>" class="btn-card btn-primary-card">
                            Sign Up as Publisher
                            <i class="fas fa-arrow-right btn-icon"></i>
                        </a>
                    </div>
                </div>

                <!-- Login Card -->
                <div class="selection-card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-sign-in-alt"></i>
                        </div>
                        <h2 class="card-title">
                            Existing Account
                        </h2>
                        <p class="card-subtitle">Welcome back! Access your publisher dashboard</p>
                    </div>

                    <div class="card-body">
                        <ul class="features-list">
                            <li>
                                <div class="feature-icon">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <div class="feature-text">View your earnings and performance metrics</div>
                            </li>
                            <li>
                                <div class="feature-icon">
                                    <i class="fas fa-bullhorn"></i>
                                </div>
                                <div class="feature-text">Manage your active campaigns</div>
                            </li>
                            <li>
                                <div class="feature-icon">
                                    <i class="fas fa-file-invoice-dollar"></i>
                                </div>
                                <div class="feature-text">Access invoices and payment history</div>
                            </li>
                            <li>
                                <div class="feature-icon">
                                    <i class="fas fa-cog"></i>
                                </div>
                                <div class="feature-text">Update account settings and preferences</div>
                            </li>
                        </ul>
                    </div>

                    <div class="card-footer">
                        <a href="<?php echo e(route('login', ['type' => 'publisher'])); ?>" class="btn-card btn-outline-card">
                            Log In to Dashboard
                            <i class="fas fa-arrow-right btn-icon"></i>
                        </a>
                    </div>
                </div>
            </div>

            <a href="https://www.linkscircle.com/" class="btn-card btn-primary-card border-0 mx-auto mt-5 mb-0">
                <i class="fas fa-home"></i>
                Back to Homepage
            </a>
            <!-- Footer Section -->
            <div class="footer-section">
                <p>Need help? <a href="https://www.linkscircle.com/contact" class="footer-link">Contact our support team</a></p>
                <p style="margin-top: 10px; font-size: 0.85rem;">&copy; <?php echo e(date('Y')); ?> LinksCircle Affiliate Network. All rights reserved.</p>
            </div>
        </div>
    </main>

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

            document.querySelector('body').classList.add("loaded");

            /* feather icon */
            feather.replace();

            // Add hover effects with mouse tracking
            const cards = document.querySelectorAll('.selection-card');

            cards.forEach(card => {
                card.addEventListener('mousemove', function(e) {
                    const rect = this.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;

                    const centerX = rect.width / 2;
                    const centerY = rect.height / 2;

                    const rotateY = (x - centerX) / 25;
                    const rotateX = (centerY - y) / 25;

                    this.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-10px)`;
                });

                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) translateY(-10px)';
                });
            });

            // Set active state based on URL
            const currentPath = window.location.pathname;
            if (currentPath.includes('register')) {
                cards[0].style.zIndex = '10';
            } else if (currentPath.includes('login')) {
                cards[1].style.zIndex = '10';
            }
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
<?php /**PATH C:\Users\lenovo\Downloads\application\resources\views/auth/login_view.blade.php ENDPATH**/ ?>