@extends("layouts.panel_guest")

@push('styles')
    <style>
        .auth-wrapper {
    min-height: 100vh;
    background: linear-gradient(135deg, #f6f6fb, #ecebff);
}

.auth-card {
    border-radius: 14px;
}

.btn-icon {
    margin-left: 8px;
    transition: transform 0.3s ease;
}

.auth-header {
    background: #5b47fb;
    color: #fff;
    border-top-left-radius: 14px;
    padding: 8px 24px !important;
    border-top-right-radius: 14px;
}

.auth-btn {
    display: block !important;
    width: 100% !important;
    padding: 8px !important;
    text-align: center;
    border-radius: 12px;
    font-weight: 600;
    font-size: 1rem;
    text-decoration: none;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    z-index: 1;
    background: #5b47fb;
}

.auth-btn:hover {
    background-color: #4a39e3;
    border-color: #4a39e3;
}

.field-icon {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
}

    </style>
@endpush

@push("scripts")
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
@endpush

@section("content")
<div class="auth-wrapper d-flex align-items-center justify-content-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-12">

                @include("partial.admin.alert")
                
                <div class="card auth-card shadow-sm border-0">
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <a href="https://www.linkscircle.com/">
                                <img src="{{ asset('publisher_dashboard/img/visa.png') }}" alt="LinksCircle Affiliate Network" class="img-fluid" style="max-width: 180px;">
                            </a>
                            <h2 class="mt-5">Sign In</h2>
                        </div>
                        <form method="POST" action="{{ route('login', ['type' => $type]) }}" id="loginForm">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">
                                    Email Address <span class="text-danger">*</span>
                                </label>
                                <input type="email"
                                       id="email"
                                       name="email"
                                       class="form-control"
                                       value="{{ old('email') }}"
                                       placeholder="Enter your email"
                                       autofocus>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">
                                    Password <span class="text-danger">*</span>
                                </label>
                                <div class="position-relative">
                                    <input type="password"
                                           id="password"
                                           name="password"
                                           class="form-control"
                                           placeholder="Enter your password"
                                           autocomplete="current-password">
                                    <i class="fa fa-eye-slash field-icon text-muted"
                                       id="password-icon"
                                       onclick="showPassword('password')"></i>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-4">

                                <a href="{{ route('password.request') }}"
                                   class="text-decoration-none text-muted">
                                    Forgot password?
                                </a>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn auth-btn text-white fw-semibold py-0 px-0">
                                    Sign In
                                    <i class="fas fa-arrow-right btn-icon"></i>
                                </button>
                            </div>

                        </form>
                    </div>
                </div>

                @if($admin != $type)
                    <div class="text-center mt-4">
                        <p class="mb-0">
                            Don’t have an account?
                            <a href="{{ route('register', ['type' => $type]) }}"
                               class="fw-semibold text-decoration-none"
                               style="color:#5b47fb;">
                                Sign up
                            </a>
                        </p>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>

@endsection
