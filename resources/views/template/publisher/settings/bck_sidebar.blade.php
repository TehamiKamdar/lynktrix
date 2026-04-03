<div class="card mb-25 sidebar-fixed">
    <div class="card-body text-center p-0">
        <div class="account-profile border-bottom pt-25 px-25 pb-0 flex-column d-flex align-items-center ">
            <form action="javascript:void(0)" id="profile-image-form" enctype="multipart/form-data">
                @csrf
                <div class="ap-img mb-20 pro_img_wrapper">
                    <input id="file-upload" type="file" name="fileUpload" class="d-none">
                    <label for="file-upload">
                        <!-- Profile picture image-->
                        <img id="sidebarProfilePic" class="ap-img__main rounded-circle wh-120" src="{{ \App\Helper\Static\Methods::staticAsset(isset($publisher->image) && $publisher->image ? $publisher->image : "img/blank_profile_img.png") }}" alt="profile">
                        <span class="cross" id="remove_pro_pic">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-camera"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                    </span>
                    </label>
                </div>
            </form>
            <div class="ap-nameAddress pb-3">
                <h5 class="ap-nameAddress__title">{{ $user->first_name }} {{ $user->last_name }}</h5>
                <p class="ap-nameAddress__subTitle fs-14 m-0">{{ $user->getRoleName() }} ID: {{ $user->sid }}</p>
            </div>
        </div>
        <div class="ps-tab p-20 pb-25">
            <div class="nav flex-column text-left" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <p class="mb-3 sidebarTextColor">
                    <span data-feather="settings" class="width-14"></span>
                    PROFILE
                </p>
                <a class="nav-link @if(request()->is('publisher/profile/basic-informationrmation')) active @endif" id="v-pills-basic-settings-tab" href="{{ route("publisher.profile.basic-information.index") }}" aria-controls="v-pills-basic-settings" aria-selected="{{ request()->is('publisher/profile/basic-informationrmation/*') }}">
                    Basic Info
                </a>
                <a class="nav-link @if(request()->is('publisher/profile/company')) active @endif" id="v-pills-company-settings-tab" href="{{ route("publisher.profile.company.index") }}" aria-controls="v-pills-company-settings" aria-selected="{{ request()->is('publisher/profile/company/*') }}">
                    Company Info
                </a>
                <a class="nav-link @if(request()->is('publisher/profile/websites')) active @endif" id="v-pills-websites-tab" href="{{ route("publisher.profile.websites.index") }}" aria-controls="v-pills-websites" aria-selected="{{ request()->is('publisher/profile/websites/*') }}">
                    Websites
                </a>
                <p class="mt-4 mb-3 sidebarTextColor">
                    <span data-feather="settings" class="width-14"></span>
                    ACCOUNT
                </p>
                <a class="nav-link @if(request()->is('publisher/account/login-info') || request()->is('publisher/account/login-info/*')) active @endif" id="v-pills-login-information-tab" href="{{ route("publisher.account.login-info.index") }}" aria-controls="v-pills-login-information" aria-selected="{{ request()->is('publisher/account/login-info/*') }}">
                    Login Information
                </a>
                <a class="nav-link @if(request()->is('publisher/payments/payment-settings/*')) active @endif" id="v-pills-payment-settings-tab" href="{{ route("publisher.payments.payment-settings.index", ["type" => "paypal"]) }}" aria-controls="v-pills-payment-settings" aria-selected="{{ request()->is('publisher/payments/payment-settings/*') }}">
                    Payment Settings
                </a>
            </div>
        </div>
    </div>
</div>
