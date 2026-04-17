<?php $__env->startPush('title', 'Publisher Login'); ?>

<?php $__env->startPush('styles'); ?>
    <style>
        :root {
            --bs-accent: #C22437;
            --bs-accent-dark: #9e1b2c;
            --bs-bg-white: #ffffff;
            --bs-text-dark: #1a1a2e;
            --bs-text-gray: #6c6c7a;
            --bs-border-light: #e8e8f0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: var(--bs-bg-white);
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

        .btn-accent {
            background: linear-gradient(135deg, var(--bs-accent) 0%, var(--bs-accent-dark) 100%);
            border: none;
            color: white;
            transition: all 0.3s ease;
        }

        .btn-accent:hover {
            box-shadow: 0 8px 20px rgba(194, 36, 55, 0.3);
            color: white;
        }

        /* Main Row Centering */
        .auth-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            /* vertical center */
            justify-content: center;
            /* horizontal center */
            padding: 2rem;
        }

        /* Row full width but balanced */
        .auth-box {
            width: 100%;
            max-width: 1280px;
        }

        /* Left Side - Simple Brand with Perks */
        .brand-section {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            position: relative;
        }

        .brand-content {
            max-width: 430px;
            width: 100%;
        }

        .brand-logo {
            font-family: 'Quicksand', sans-serif;
            font-size: 2.2rem;
            font-weight: 800;
            color: var(--bs-text-dark);
            text-decoration: none;
            display: inline-block;
            margin-bottom: 2rem;
        }

        .brand-logo span {
            color: var(--bs-accent);
        }

        .brand-tagline {
            font-size: 0.9rem;
            color: var(--bs-text-gray);
            margin-bottom: 2rem;
            line-height: 1.5;
        }

        .perks-list {
            list-style: none;
            padding-left: 0;
        }

        .perks-list li {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1.2rem;
            font-size: 0.95rem;
            color: var(--bs-text-dark);
        }

        .perks-list li i {
            color: var(--bs-accent);
            font-size: 1.2rem;
        }

        /* Right Side - Login Form */
        .login-section {
            background: white;
            display: flex;
            align-items: center;
            padding: 2rem 2rem 2rem 0;
            margin-right: 3rem;
        }

        .login-card {
            width: 100%;
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 20px 40px -12px rgba(0, 0, 0, 0.1);
            border: 1px solid var(--bs-border-light);
        }

        .login-header {
            margin-bottom: 1.8rem;
        }

        .login-title {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: var(--bs-text-dark);
        }

        .login-subtitle {
            color: var(--bs-text-gray);
            font-size: 0.9rem;
        }

        .form-control {
            background: #f8f9ff;
            border: 2px solid var(--bs-border-light);
            color: var(--bs-text-dark);
            padding: 0.8rem 1rem;
            border-radius: 8px;
            transition: all 0.2s;
        }

        .form-control:focus {
            background: white;
            border-color: var(--bs-accent);
            box-shadow: 0 0 0 3px rgba(194, 36, 55, 0.1);
        }

        .form-control::placeholder {
            color: #b0b0c0;
        }

        .form-label {
            font-size: 0.85rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: var(--bs-text-dark);
        }

        .input-group-text {
            background: #f8f9ff;
            border: 1px solid var(--bs-border-light);
            border-right: none;
            color: var(--bs-accent);
            border-radius: 8px 0 0 8px;
        }

        .input-group .form-control {
            border-radius: 0 8px 8px 0;
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .form-check-input {
            background-color: #f8f9ff;
            border-color: var(--bs-border-light);
        }

        .form-check-input:checked {
            background-color: var(--bs-accent);
            border-color: var(--bs-accent);
        }

        .form-check-label {
            font-size: 0.85rem;
            color: var(--bs-text-gray);
        }

        .forgot-link {
            color: var(--bs-accent);
            text-decoration: none;
            font-size: 0.85rem;
        }

        .forgot-link:hover {
            text-decoration: underline;
        }

        .login-btn {
            width: 100%;
            padding: 0.25rem;
            border-radius: 40px;
            font-weight: 600;
            font-size: 1rem;
            margin-bottom: 1.5rem;
        }

        .signup-link {
            text-align: center;
            margin-top: 1.5rem;
            font-size: 0.85rem;
            color: var(--bs-text-gray);
        }

        .signup-link a {
            color: var(--bs-accent);
            text-decoration: none;
            font-weight: 600;
        }

        .signup-link a:hover {
            text-decoration: underline;
        }

        /* Responsive */
        @media (max-width: 1000px) {
            .login-section {
                width: 420px;
                margin-right: 2rem;
            }
        }

        @media (max-width: 850px) {
            .login-layout {
                flex-direction: column;
            }

            .brand-section {
                padding: 2rem;
                min-height: auto;
            }

            .brand-content {
                text-align: center;
                max-width: 100%;
            }

            .perks-list li {
                justify-content: center;
            }

            .login-section {
                width: 100%;
                margin-right: 0;
                padding: 2rem;
            }

            .login-card {
                max-width: 450px;
                margin: 0 auto;
            }
        }

        @media (max-width: 576px) {
            .brand-section {
                padding: 1.5rem;
            }

            .login-section {
                padding: 1rem;
            }

            .login-card {
                padding: 1.5rem;
            }

            .social-login {
                flex-direction: column;
            }
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush("scripts"); ?>
    <script>
        $("#loginForm").validate({
            rules: {
                "email": {
                    required: true,
                },
                "password": {
                    required: true,
                }
            },
            highlight: function (element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error');
            },
            unhighlight: function (element) { // un-hightlight error inputs
                $(element)
                    .closest('.form-group').removeClass('has-error');
            },
            errorPlacement: function (error, element) {
                error.insertAfter(element.closest('.input-modal-group'));
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection("content"); ?>
    <div class="container-fluid auth-wrapper">
        <div class="row g-0 auth-box align-items-center">

            <!-- LEFT SIDE -->
            <div class="col-lg-6" data-aos="zoom-out-right" data-aos-duration="1400">
                <div class="brand-section">

                    <div class="brand-content">

                        <div class="mb-4" data-aos="flip-left" data-aos-delay="250" data-aos-duration="1200">
                            <img src="<?php echo e(asset('new/logo.webp')); ?>" alt="" class="img-fluid">
                        </div>

                        <p class="brand-tagline" data-aos="fade-right" data-aos-delay="450" data-aos-duration="1000">
                            The performance marketing network trusted by advertisers & publishers worldwide.
                        </p>

                        <ul class="perks-list">

                            <li data-aos="fade-right" data-aos-delay="650">
                                <i class="ri-checkbox-circle-fill"></i>
                                High-converting offers across 15+ verticals
                            </li>

                            <li data-aos="fade-right" data-aos-delay="800">
                                <i class="ri-checkbox-circle-fill"></i>
                                Weekly payouts with zero minimum threshold
                            </li>

                            <li data-aos="fade-right" data-aos-delay="950">
                                <i class="ri-checkbox-circle-fill"></i>
                                AI-powered smartlink optimization
                            </li>

                            <li data-aos="fade-right" data-aos-delay="1100">
                                <i class="ri-checkbox-circle-fill"></i>
                                24/7 dedicated account support
                            </li>

                        </ul>

                    </div>

                </div>
            </div>


            <!-- RIGHT SIDE -->
            <div class="col-lg-6" data-aos="zoom-out-left" data-aos-duration="1400">
                <div class="login-section">

                    <div class="login-card" data-aos="fade-up" data-aos-delay="250" data-aos-duration="1200">

                        <div class="login-header" data-aos="fade-down" data-aos-delay="400">
                            <h2 class="login-title">Welcome back</h2>
                            <p class="login-subtitle">Sign in to your account</p>
                        </div>

                        <?php echo $__env->make("partial.admin.alert", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <form method="POST" action="<?php echo e(route('login', ['type' => $type])); ?>" id="loginForm">
                            <?php echo csrf_field(); ?>

                            <div class="mb-3" data-aos="fade-up" data-aos-delay="550">
                                <label class="form-label">Email address</label>
                                <input type="email" name="email" value="<?php echo e(old('email')); ?>" class="form-control"
                                    placeholder="Email Address" required autofocus>
                            </div>

                            <div class="mb-3" data-aos="fade-up" data-aos-delay="700">
                                <label class="form-label">Password</label>

                                <div class="position-relative">
                                    <input type="password" id="password" name="password" class="form-control"
                                        placeholder="Enter your password">

                                    <i class="ri-eye-line field-icon text-muted" id="password-icon"
                                        onclick="showPassword('password')"></i>
                                </div>
                            </div>

                            <div class="remember-forgot" data-aos="fade-up" data-aos-delay="850">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember">
                                    <label class="form-check-label" for="remember">
                                        Remember me
                                    </label>
                                </div>

                                <a href="<?php echo e(route('password.request')); ?>" class="forgot-link">
                                    Forgot password?
                                </a>
                            </div>

                            <button type="submit" class="btn btn-accent login-btn" data-aos="zoom-in-up"
                                data-aos-delay="1000">
                                Sign in <i class="ri-arrow-right-line ms-1"></i>
                            </button>
                        </form>

                        <?php if($admin != $type): ?>
                            <div class="signup-link" data-aos="fade-up" data-aos-delay="1150">
                                Don't have an account?
                                <a href="<?php echo e(route('register', ['type' => $type])); ?>">
                                    Create an account
                                </a>
                            </div>
                        <?php endif; ?>

                    </div>

                </div>
            </div>

        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.panel_guest", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\lynktrix\resources\views/auth/login.blade.php ENDPATH**/ ?>