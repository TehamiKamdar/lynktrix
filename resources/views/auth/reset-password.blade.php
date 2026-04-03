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
                                                <h6>Add New Password</h6>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="edit-profile__body">
                                                <form method="POST" action="{{ route('password.store') }}">
                                                    @csrf

                                                    <!-- Password Reset Token -->
                                                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                                    <div class="form-group mb-20">
                                                        <label for="email">{{ __('Email Address')}}</label>
                                                        <input id="email" class="form-control" type="email" name="email"
                                                               value="{{ old('email', $request->email) }}" required readonly
                                                               placeholder="Please Enter Email Address">
                                                    </div>
                                                    <div class="form-group mb-15">
                                                        <label for="password">Password</label>
                                                        <div class="position-relative">
                                                            <input id="password" class="form-control"
                                                                   type="password"
                                                                   name="password"
                                                                   required autocomplete="current-password" autofocus
                                                                   placeholder="Please Enter Password">
                                                            <div
                                                                class="fa fa-fw fa-eye-slash text-light fs-16 field-icon toggle-password2"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-15">
                                                        <label for="password_confirmation">Confirm Password</label>
                                                        <div class="position-relative">
                                                            <input id="password_confirmation" class="form-control"
                                                                   type="password"
                                                                   name="password_confirmation"
                                                                   required autocomplete="current-password"
                                                                   placeholder="Please Enter Confirm Password">
                                                            <div
                                                                class="fa fa-fw fa-eye-slash text-light fs-16 field-icon toggle-password2"></div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="button-group d-flex pt-1 justify-content-md-start justify-content-center">
                                                        <button
                                                            class="btn btn-primary btn-default btn-squared mr-15 text-capitalize lh-normal px-50 py-15 signIn-createBtn ">
                                                            {{ __('Reset Password') }}
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
