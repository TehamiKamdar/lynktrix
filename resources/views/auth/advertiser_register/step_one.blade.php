@extends("auth.advertiser_register.base")

@section("step_form_content")

    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-12 col-sm-12">
            <div class="card checkout-shipping-form px-30 pt-2 pb-30 border-color" style="margin-top: 40px;">
                <div class="card-header border-bottom-0 pb-sm-0 pb-1 px-0">
                    <h4 class="fw-500">1. Advertiser Basic Info</h4>
                </div>
                <div class="card-body p-0">
                    <div class="edit-profile__body">
                        <form id="stepOne" class="stepOne" action="javascript:void(0)">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="first_name" class="font-weight-bold text-black">First name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="" value="{{ $stepOne['first_name'] ?? null }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="last_name" class="font-weight-bold text-black">Last name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="last_name"  name="last_name" placeholder="" value="{{ $stepOne['last_name'] ?? null }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="font-weight-bold text-black">Email Address<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="" value="{{ $stepOne['email'] ?? null }}">
                            </div>
                            <div class="form-group">
                                <label for="user_name" class="font-weight-bold text-black">Username<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="user_name" name="user_name" placeholder="" value="{{ $stepOne['user_name'] ?? null }}">
                            </div>
                            <div class="form-group">
                                <label for="password" class="font-weight-bold text-black">Password<span class="text-danger">*</span></label>
                                <div class="position-relative">
                                    <input id="password" type="password" class="form-control" name="password" value="{{ $stepOne['password'] ?? null }}">
                                    <span class="fa fa-fw fa-eye-slash text-light fs-16 field-icon" id="password-icon" onclick="showPassword('password')"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation" class="font-weight-bold text-black">Confirm Password<span class="text-danger">*</span></label>
                                <div class="position-relative">
                                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" value="{{ $stepOne['password_confirmation'] ?? null }}">
                                    <span class="fa fa-fw fa-eye-slash text-light fs-16 field-icon" id="password_confirmation-icon" onclick="showPassword('password_confirmation')"></span>
                                </div>
                            </div>

                            <div class="button-group d-flex pt-3 justify-content-between flex-wrap">
                                <button type="submit" class="btn text-white btn-primary btn-default btn-squared text-capitalize m-1">Save &amp; Next<i class="ml-10 mr-0 las la-arrow-right"></i></button>
                            </div>
                        </form>
                    </div>
                </div>

            </div><!-- ends: .card -->
            <p class="social-connector text-center mb-md-25 mb-15  mt-md-30 mt-20 "><span>Or</span></p>
            <div class="button-group d-flex align-items-center  justify-content-center">
                <p class="mb-0">
                    Already have an account?
                    <a href="{{ route("login", $account) }}" class="color-primary">
                        Sign in
                    </a>
                </p>
            </div>
        </div><!-- ends: .col -->

    </div>

@endsection
