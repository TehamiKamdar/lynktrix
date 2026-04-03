@extends("layouts.panel_guest")

@section("content")
    <div class="signUP-admin">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-5 p-0">
                    <div class="signUP-admin-left signIn-admin-left position-relative">
                        <div class="signUP-overlay">
                            <img class="svg signupTop" src="{{ asset('img/svg/signuptop.svg') }}" alt="img"/>
                            <img class="svg signupBottom" src="{{ asset('img/svg/signupbottom.svg') }}" alt="img"/>
                        </div><!-- End: .signUP-overlay  -->
                        <div class="signUP-admin-left__content">
                            <div class="logo-div">
                                <a href="https://www.linkscircle.com/"><img src="{{ \App\Helper\Static\Methods::staticAsset("img/logo.png") }}" alt="LinksCircle Affiliate Network" class="img-fluid"></a>
                            </div>
                        </div><!-- End: .signUP-admin-left__content  -->
                        <div class="signUP-admin-left__img">
                            <img class="img-fluid svg" src="{{ asset('img/svg/signupillustration.svg') }}" alt="img"/>
                        </div><!-- End: .signUP-admin-left__img  -->
                    </div><!-- End: .signUP-admin-left  -->
                </div><!-- End: .col-xl-4  -->
                <div class="col-xl-8 col-lg-7 col-md-7 col-sm-8">
                    <div class="signUp-admin-right signIn-admin-right  p-md-40 p-10">

                        @include("partial.admin.alert")

                        <div class="row justify-content-center">
                            <div class="col-xl-7 col-lg-8 col-md-12">
                                <div class="edit-profile mt-md-25 mt-0">
                                    <div class="card border-0">
                                        <div class="card-header border-0  pb-md-15 pb-10 pt-md-20 pt-10 ">
                                            <div class="edit-profile__title">
                                                <h6>Forgot Password</h6>
                                                <small>
                                                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                                                </small>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="edit-profile__body">

                                                <form method="POST" action="{{ route('password.email') }}">
                                                    @csrf
                                                    <div class="form-group mb-20">
                                                        <label for="email">{{ __('Email Address')}}</label>
                                                        <input id="email" class="form-control" type="email" name="email"
                                                               value="{{ old('email') }}" required autofocus
                                                               placeholder="Please Enter Email Address">
                                                    </div>
                                                    <div
                                                        class="button-group d-flex pt-1 justify-content-md-start justify-content-center">
                                                        <button
                                                            class="btn btn-primary btn-default btn-squared mr-15 text-capitalize lh-normal px-50 py-15 signIn-createBtn ">
                                                            {{ __('Email Password Reset Link') }}
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
