<div class="row">
    <div class="col-lg-12">
        <div class="card-extra">
            <div class="card-tab btn-group nav nav-tabs">
                <a class="btn btn-xs btn-white @if(request()->is('publisher/payments/payment-settings/paypal')) active @endif border-light" id="username-tab" href="{{ route("publisher.payments.payment-settings.index", ["type" => "paypal"]) }}">
                    <h6 class="py-2">Paypal</h6>
                </a>
                <a class="btn btn-xs btn-white @if(request()->is('publisher/payments/payment-settings/payoneer')) active @endif border-light" id="user_email-tab" href="{{ route("publisher.payments.payment-settings.index", ["type" => "payoneer"]) }}">
                    <h6 class="py-2">Payoneer</h6>
                </a>
                <a class="btn btn-xs btn-white border-light @if(request()->is('publisher/payments/payment-settings/bank-wire')) active @endif" id="login_password-tab" href="{{ route("publisher.payments.payment-settings.index", ["type" => "bank-wire"]) }}">
                    <h6 class="py-2">Bank Wire</h6>
                </a>
            </div>
        </div>
        <div class="tab-content mt-4">
            <div class="tab-pane fade @if(request()->is('publisher/payments/payment-settings/paypal')) active show @endif" id="paypal" role="" aria-labelledby="paypal-tab">

                @if(request()->is('publisher/payments/payment-settings/paypal'))

                    @include("partial.admin.alert")
                    @include("template.publisher.settings.payment_settings.form.paypal")

                @endif

            </div>
            <div class="tab-pane fade @if(request()->is('publisher/payments/payment-settings/payoneer')) active show @endif" id="user_email" role="" aria-labelledby="user_email-tab">

                @if(request()->is('publisher/account/login-info/change-email'))

                    @include("partial.admin.alert")
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email" class="font-weight-bold text-black font-size14">User Email</label>
                                <input type="email" disabled class="form-control" id="email" name="email" placeholder="User Email" value="{{ $user->email ?? null }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#changeEmailModal" class="btn text-white btn-primary btn-sm btn-default btn-squared text-capitalize">Change Email</a>
                        </div>
                    </div>

                @endif

            </div>
            <div class="tab-pane fade @if(request()->is('publisher/payments/payment-settings/bank-wire')) active show @endif" id="login_password" role="" aria-labelledby="login_password-tab">

                @if(request()->is('publisher/account/login-info/change-password'))

                    @include("partial.admin.alert")

                    <form action="{{ route("publisher.change-password.update") }}" method="POST" id="changePasswordForm" enctype="multipart/form-data">
                        @csrf
                        @method("PATCH")
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="current_password" class="font-weight-bold text-black font-size14">Current Password</label>
                                    <input type="password" class="form-control" id="current_password" name="current_password" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password" class="font-weight-bold text-black font-size14">New password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password_confirmation" class="font-weight-bold text-black font-size14">Confirm New Password</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn text-white btn-primary btn-sm btn-default btn-squared text-capitalize">Update</button>
                            </div>
                        </div>
                    </form>

                @endif

            </div>
        </div>
    </div>
</div>

<div class="loader-overlay display-hidden" id="showLoader">
    <div class="atbd-spin-dots spin-lg">
        <span class="spin-dot badge-dot dot-primary"></span>
        <span class="spin-dot badge-dot dot-primary"></span>
        <span class="spin-dot badge-dot dot-primary"></span>
        <span class="spin-dot badge-dot dot-primary"></span>
    </div>
</div>


