<div class="row">
    <div class="col-lg-12">
        <div class="card-extra">
            <div class="card-tab btn-group nav nav-tabs">
                <a class="btn btn-xs btn-white @if(request()->is('publisher/account/login-info')) active @endif border-light" id="username-tab" href="{{ route("publisher.account.login-info.index") }}">
                    <h6 class="py-2 text-black font-size14">Username</h6>
                </a>
                <a class="btn btn-xs btn-white @if(request()->is('publisher/account/login-info/change-email')) active @endif border-light" id="user_email-tab" href="{{ route("publisher.account.login-info.change-email") }}">
                    <h6 class="py-2 text-black font-size14">User Email</h6>
                </a>
                <a class="btn btn-xs btn-white border-light @if(request()->is('publisher/account/login-info/change-password')) active @endif" id="login_password-tab" href="{{ route("publisher.account.login-info.change-password") }}">
                    <h6 class="py-2 text-black font-size14">Login Password</h6>
                </a>
            </div>
        </div>
        <div class="tab-content mt-4">
            <div class="tab-pane fade @if(request()->is('publisher/account/login-info')) active show @endif" id="username" role="" aria-labelledby="username-tab">

                @if(request()->is('publisher/account/login-info'))
                    @include("template.publisher.settings.login_info.username", compact('user'))
                @endif

            </div>
            <div class="tab-pane fade @if(request()->is('publisher/account/login-info/change-email')) active show @endif" id="user_email" role="" aria-labelledby="user_email-tab">

                @if(request()->is('publisher/account/login-info/change-email'))
                    @include("template.publisher.settings.login_info.change_email", compact('user'))
                @endif

            </div>
            <div class="tab-pane fade @if(request()->is('publisher/account/login-info/change-password')) active show @endif" id="login_password" role="" aria-labelledby="login_password-tab">

                @if(request()->is('publisher/account/login-info/change-password'))
                    @include("template.publisher.settings.login_info.change_password", compact('user'))
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


