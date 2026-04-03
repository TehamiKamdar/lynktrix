@extends("layouts.publisher.publisher_panel")

@pushonce('styles')
    <link rel="stylesheet" href="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/css/select2.min.css") }}"/>
    <style>
        .contents {
            margin-top: 60px;
        }
        .sidebarTextColor {
            font-size: 16px;
            font-weight: 600;
            color: #000;
        }
        .width-14 {
            width: 14px;
        }
        #verify-modal .modal-footer {
            justify-content: center !important;
        }
        .sidebar-fixed {
            height: 100%;
            width: 22.5%;
            position: fixed;
            overflow-x: hidden;
            z-index: 1;
        }
    </style>
@endpushonce

@pushonce('scripts')
    <script src="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/select2.full.min.js") }}"></script>
    <script src="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/jquery.validate.min.js") }}"></script>
    <script>

        document.addEventListener("DOMContentLoaded", function () {
            $("#datepickerdob").datepicker({
                dateFormat: "d MM yy",
                duration: "medium",
                changeMonth: true,
                changeYear: true,
                yearRange: "{{ now()->subYears(100)->format("Y") }}:{{ now()->format("Y") }}",
            });
            $("#file-upload").change(function () {

                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#profilePic').attr('src', e.target.result);
                    $('#sidebarProfilePic').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);

                $("#profile-image-form").submit();
            });
            $("#profile-image-form").submit(function () {
                $.ajax({
                    url: "{{ route("publisher.upload-profile-image") }}",
                    method: 'POST',
                    data: new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(response)
                    {
                        $("#profileImg").attr("src", response.image)
                    },
                    error: function(response) {
                        showErrors(response.message)
                    }
                });
            });
        });
    </script>

    @if($type == \App\Helper\Static\Vars::BASIC_INFO)
        @include("template.publisher.settings.basic_info.js")
    @elseif($type == \App\Helper\Static\Vars::COMPANY_INFO)
        @include("template.publisher.settings.company_info.js")
    @elseif($type == \App\Helper\Static\Vars::WEBSITES)
        @include("template.publisher.settings.websites.js")
    @elseif($type == \App\Helper\Static\Vars::LOGIN_INFO)
        @include("template.publisher.settings.login_info.js")
    @elseif($type == \App\Helper\Static\Vars::API_INFO)
        @include("template.publisher.settings.api_info.js")
    @elseif($type == \App\Helper\Static\Vars::BILLING_INFO)
        @include("template.publisher.settings.payment.billing_info.js")
    @elseif($type == \App\Helper\Static\Vars::PAYMENT_SETTINGS)
        @include("template.publisher.settings.payment.payment_settings.js")
    @endif

@endpushonce

@section("content")

    <div class="contents">

        <div class="profile-setting">
            <div class="container-fluid">
                @include("template.publisher.widgets.profile_completion_percentage")
                <div class="row">
                    <div class="col-xxl-3 col-lg-4 col-sm-5">
                        <!-- Profile Acoount -->
                        @include("template.publisher.settings.sidebar")
                        <!-- Profile Acoount End -->
                    </div>
                    <div class="col-xxl-9 col-lg-8 col-sm-7">
                        <div class="mb-50">
                            <div class="tab-content" id="v-pills-tabContent">
                                @if(request()->is('publisher/profile/basic-information'))
                                    <div class="tab-pane fade @if(request()->is('publisher/profile/basic-information')) active show @endif" id="v-pills-basic-settings" role="tabpanel" aria-labelledby="v-pills-basic-settings-tab">
                                    @if($type == \App\Helper\Static\Vars::BASIC_INFO)
                                        <!-- Edit Profile -->
                                        <div class="edit-profile">
                                            <div class="card">
                                                <div class="card-header px-sm-25 px-3">
                                                    <div class="edit-profile__title">
                                                        <h6 class="font-weight-bold">Basic Information</h6>
                                                        <span class="fs-13 color-light fw-400">Set up your personal
                                                                information</span>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    @include("template.publisher.settings.basic_info.index")
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Edit Profile End -->
                                    @endif
                                </div>
                                @elseif(request()->is('publisher/profile/company'))
                                    <div class="tab-pane fade @if(request()->is('publisher/profile/company')) active show @endif" id="v-pills-company-settings" role="tabpanel" aria-labelledby="v-pills-company-settings-tab">
                                        @if($type == \App\Helper\Static\Vars::COMPANY_INFO)
                                            <!-- Edit Profile -->
                                            <div class="edit-profile">
                                                <div class="card">
                                                    <div class="card-header px-sm-25 px-3">
                                                        <div class="edit-profile__title">
                                                            <h6 class="font-weight-bold">Company</h6>
                                                            <span class="fs-13 color-light fw-400">Set up your company</span>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        @include("template.publisher.settings.company_info.index")
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Edit Profile End -->
                                        @endif
                                    </div>
                                @elseif(request()->is('publisher/profile/websites'))
                                    <div class="tab-pane fade @if(request()->is('publisher/profile/websites')) active show @endif" id="v-pills-websites" role="tabpanel" aria-labelledby="v-pills-websites-tab">
                                        @if($type == \App\Helper\Static\Vars::WEBSITES)
                                            <!-- Edit Profile -->
                                            <div class="edit-profile">
                                                <div class="card">
                                                    <div class="card-header px-sm-25 px-3">
                                                        <div class="edit-profile__title">
                                                            <h6 class="font-weight-bold">Websites</h6>
                                                            <span class="fs-13 color-light fw-400">Set up your website</span>
                                                        </div>

                                                        <div class="breadcrumb-action justify-content-center flex-wrap">
                                                            <div class="action-btn">
                                                                <a href="javascript:void(0)" data-toggle="modal"
                                                                   data-target="#website-modal"  class="btn btn-sm btn-primary btn-add"
                                                                   onclick="openWebsiteModal()"><i class="la la-plus"></i> Add</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        @include("template.publisher.settings.websites.index")
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Edit Profile End -->
                                        @endif
                                    </div>
                                @elseif(request()->is('publisher/payments/billing-information'))
                                    <div class="tab-pane fade @if(request()->is('publisher/payments/billing-information')) active show @endif" id="v-pills-basic-settings" role="tabpanel" aria-labelledby="v-pills-basic-settings-tab">
                                        @if($type == \App\Helper\Static\Vars::BILLING_INFO)
                                            <!-- Edit Profile -->
                                            <div class="edit-profile">
                                                <div class="card">
                                                    <div class="card-header px-sm-25 px-3">
                                                        <div class="edit-profile__title">
                                                            <h6 class="font-weight-bold">Billing Information</h6>
                                                            <span class="fs-13 color-light fw-400">Set Up Your Billing Information For Payment Clearance</span>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        @include("template.publisher.settings.payment.billing_info.index")
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Edit Profile End -->
                                        @endif
                                    </div>
                                @elseif(request()->is('publisher/payments/payment-settings'))
                                    <div class="tab-pane fade @if(request()->is('publisher/payments/payment-settings')) active show @endif" id="v-pills-payment-settings" role="tabpanel" aria-labelledby="v-pills-payment-settings-tab">
                                        @if($type == \App\Helper\Static\Vars::PAYMENT_SETTINGS)
                                            <!-- Edit Profile -->
                                            <div class="edit-profile">
                                                <div class="card">
                                                    <div class="card-header px-sm-25 px-3">
                                                        <div class="edit-profile__title">
                                                            <h6 class="font-weight-bold">Payment Settings</h6>
                                                            <span class="fs-13 color-light fw-400">Set Up Your Payment Methods To Withdraw Funds.</span>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        @if($billing)
                                                            @include("template.publisher.settings.payment.payment_settings.index")
                                                        @else
                                                            <div class="alert-icon-big alert alert-danger " role="alert">
                                                                <div class="alert-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                                                                </div>
                                                                <div class="alert-content">
                                                                    <h3 class="alert-heading">Notice</h3>
                                                                    <p>Please complete billing information to add payment methods.</p>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Edit Profile End -->
                                        @endif
                                    </div>
                                @elseif(request()->is('publisher/account/login-info') || request()->is('publisher/account/login-info/*'))
                                    <div class="tab-pane fade @if(request()->is('publisher/account/login-info') || request()->is('publisher/account/login-info/*')) active show @endif" id="v-pills-login-information" role="tabpanel" aria-labelledby="v-pills-login-information-tab">
                                        @if($type == \App\Helper\Static\Vars::LOGIN_INFO)
                                            <!-- Edit Profile -->
                                            <div class="edit-profile">
                                                <div class="card">
                                                    <div class="card-header px-sm-25 px-3">
                                                        <div class="edit-profile__title">
                                                            <h6 class="font-weight-bold">Login Information</h6>
                                                            <span class="fs-13 color-light fw-400">Set up your login information</span>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        @include("template.publisher.settings.login_info.index")
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Edit Profile End -->
                                        @endif
                                    </div>
                                @elseif(request()->is('publisher/account/api-info') || request()->is('publisher/account/api-info/*'))
                                    <div class="tab-pane fade @if(request()->is('publisher/account/api-info') || request()->is('publisher/account/api-info/*')) active show @endif" id="v-pills-api-information" role="tabpanel" aria-labelledby="v-pills-api-information-tab">
                                        @if($type == \App\Helper\Static\Vars::API_INFO)
                                            <!-- Edit Profile -->
                                            <div class="edit-profile">
                                                <div class="card">
                                                    <div class="card-header px-sm-25 px-3">
                                                        <div class="edit-profile__title">
                                                            <h6 class="font-weight-bold">API Information</h6>
                                                            <span class="fs-13 color-light fw-400">View your api information</span>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        @include("template.publisher.settings.api_info.index")
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Edit Profile End -->
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--        <div class="row">--}}
        {{--            <div class="col-lg-3">--}}
        {{--                <ul class="list-group">--}}
        {{--                    <li class="list-group-item active">--}}
        {{--                        <a href="{{ route("publisher.settings.index") }}" class="text-white">--}}
        {{--                            Basic Settings--}}
        {{--                        </a>--}}
        {{--                    </li>--}}
        {{--                    <li class="list-group-item">--}}
        {{--                        <a href="{{ route("publisher.settings.index") }}" class="text-black">--}}
        {{--                            Company Info--}}
        {{--                        </a>--}}
        {{--                    </li>--}}
        {{--                    <li class="list-group-item">--}}
        {{--                        <a href="{{ route("publisher.settings.index") }}" class="text-black">--}}
        {{--                            Websites--}}
        {{--                        </a>--}}
        {{--                    </li>--}}
        {{--                    <li class="list-group-item">--}}
        {{--                        <a href="{{ route("publisher.settings.index") }}" class="text-black">--}}
        {{--                            Login Information--}}
        {{--                        </a>--}}
        {{--                    </li>--}}
        {{--                    <li class="list-group-item">--}}
        {{--                        <a href="{{ route("publisher.settings.index") }}" class="text-black">--}}
        {{--                            Payment Settings--}}
        {{--                        </a>--}}
        {{--                    </li>--}}
        {{--                </ul>--}}
        {{--            </div>--}}
        {{--            <div class="col-lg-9">--}}
        {{--                <div class="card card-overview border-0">--}}
        {{--                    <div class="card-body p-0">--}}
        {{--                        <div class="container">--}}
        {{--                            <form action="" class="my-5 px-5" id="settingForm">--}}
        {{--                                <div class="row">--}}
        {{--                                    <div class="col-md-12">--}}
        {{--                                        <div class="row">--}}
        {{--                                            <div class="col-md-2 basic-info-avatar">--}}
        {{--                                                <img src="{{ \App\Helper\Static\Methods::staticAsset("img/blank_profile_img.png") }}" class="rounded w-100" alt="Cinque Terre">--}}
        {{--                                            </div>--}}
        {{--                                            <div class="col-md-10">--}}
        {{--                                                <h3 class="mt-5 mb-3">--}}
        {{--                                                    {{ ucwords($user->user_name) }}--}}
        {{--                                                </h3>--}}
        {{--                                                <a href="">Change Profile Photo</a>--}}
        {{--                                            </div>--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                                <div class="row mt-3">--}}
        {{--                                    <div class="col-md-12">--}}
        {{--                                        <div class="form-group">--}}
        {{--                                            <label for="intro" class="font-weight-bold text-black">Bio</label>--}}
        {{--                                            <br>--}}
        {{--                                            <small>This is your chance to tell brands about yourself and the kinds of projects you’re looking for.</small>--}}
        {{--                                            <textarea class="form-control" id="intro" name="intro" rows="3" cols="100" placeholder="">{{ $publisher->intro }}</textarea>--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                                <div class="row">--}}
        {{--                                    <div class="col-md-12">--}}
        {{--                                        <div class="form-group">--}}
        {{--                                            <label for="intro" class="font-weight-bold text-black">Language</label>--}}
        {{--                                            <select name="language[]" id="language" class="form-control" multiple>--}}
        {{--                                                @foreach($languages as $language)--}}
        {{--                                                    <option value="{{ $language }}" @if(in_array($language, isset($publisher->language) && $publisher->language ? @json_decode($publisher->language, true) : [])) selected @endif>{{ $language }}</option>--}}
        {{--                                                @endforeach--}}
        {{--                                            </select>--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                                <div class="row">--}}
        {{--                                    <div class="col-md-12">--}}
        {{--                                        <div class="form-group">--}}
        {{--                                            <label for="intro" class="font-weight-bold text-black">Customer Reach</label>--}}
        {{--                                            <select name="customer_reach[]" id="customer_reach" class="form-control" multiple>--}}
        {{--                                                @foreach($countries as $country)--}}
        {{--                                                    <option value="{{ $country['id'] }}" @if(in_array($country['id'], isset($publisher->customer_reach) && $publisher->customer_reach ? @json_decode($publisher->customer_reach, true) : [])) selected @endif>{{ $country['name'] }}</option>--}}
        {{--                                                @endforeach--}}
        {{--                                            </select>--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                                <div class="row">--}}
        {{--                                    <div class="col-md-6">--}}
        {{--                                        <div class="form-group">--}}
        {{--                                            <label for="first_name" class="font-weight-bold text-black">First Name</label>--}}
        {{--                                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="{{ $user->first_name ?? null }}">--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}
        {{--                                    <div class="col-md-6">--}}
        {{--                                        <div class="form-group">--}}
        {{--                                            <label for="last_name" class="font-weight-bold text-black">Last Name</label>--}}
        {{--                                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="{{ $user->last_name ?? null }}">--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                                <div class="row">--}}
        {{--                                    <div class="col-md-6">--}}
        {{--                                        <div class="form-group">--}}
        {{--                                            <label for="user_name" class="font-weight-bold text-black">User Name</label>--}}
        {{--                                            <input type="text" class="form-control" id="user_name" name="user_name" placeholder="User Name" value="{{ $user->user_name ?? null }}">--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}
        {{--                                    <div class="col-md-6">--}}
        {{--                                        <div class="form-group">--}}
        {{--                                            <label for="gender" class="font-weight-bold text-black">Gender</label>--}}
        {{--                                            <select class="form-control" id="gender" name="gender">--}}
        {{--                                                <option value="" selected disabled>Please Select</option>--}}
        {{--                                                <option value="male">Male</option>--}}
        {{--                                                <option value="female">Female</option>--}}
        {{--                                                <option value="nonbinary">Nonbinary</option>--}}
        {{--                                            </select>--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                                <div class="row">--}}
        {{--                                    <div class="col-md-4">--}}
        {{--                                        <div class="form-group">--}}
        {{--                                            <label for="year" class="font-weight-bold text-black">Year</label>--}}
        {{--                                            <select class="form-control" id="year" name="year">--}}
        {{--                                                <option value="" selected disabled>Please Select</option>--}}
        {{--                                                @foreach($years as $year)--}}
        {{--                                                    <option value="{{ $year }}">{{ $year }}</option>--}}
        {{--                                                @endforeach--}}
        {{--                                            </select>--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}
        {{--                                    <div class="col-md-4">--}}
        {{--                                        <label for="month" class="font-weight-bold text-black">Month</label>--}}
        {{--                                        <select class="form-control" id="month" name="month">--}}
        {{--                                            <option value="" selected disabled>Please Select</option>--}}
        {{--                                            @foreach($months as $key => $month)--}}
        {{--                                                <option value="{{ ($key + 1) }}">{{ ucwords($month) }}</option>--}}
        {{--                                            @endforeach--}}
        {{--                                        </select>--}}
        {{--                                    </div>--}}
        {{--                                    <div class="col-md-4">--}}
        {{--                                        <label for="month" class="font-weight-bold text-black">Day</label>--}}
        {{--                                        <select class="form-control" id="day" name="day">--}}
        {{--                                            <option value="" selected disabled>Please Select Year & Month</option>--}}
        {{--                                        </select>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                                <div class="row">--}}
        {{--                                    <div class="col-md-4">--}}
        {{--                                        <div class="form-group">--}}
        {{--                                            <label for="location_country" class="font-weight-bold text-black">Country</label>--}}
        {{--                                            <select class="form-control" id="location_country" name="location_country">--}}
        {{--                                                <option value="" selected disabled>Please Select</option>--}}
        {{--                                                @foreach($countries as $country)--}}
        {{--                                                    <option value="{{ $country['id'] }}" @if($publisher->location_country == $country['id']) selected @endif>{{ ucwords($country['name']) }}</option>--}}
        {{--                                                @endforeach--}}
        {{--                                            </select>--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}
        {{--                                    <div class="col-md-4">--}}
        {{--                                        <label for="location_state" class="font-weight-bold text-black">State</label>--}}
        {{--                                        <select class="form-control" id="location_state" name="location_state">--}}
        {{--                                            <option value="" selected disabled>Please Select Country</option>--}}
        {{--                                        </select>--}}
        {{--                                    </div>--}}
        {{--                                    <div class="col-md-4">--}}
        {{--                                        <label for="location_city" class="font-weight-bold text-black">City</label>--}}
        {{--                                        <select class="form-control" id="location_city" name="location_city">--}}
        {{--                                            <option value="" selected disabled>Please Select State</option>--}}
        {{--                                        </select>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                                <div class="row">--}}
        {{--                                    <div class="col-md-12">--}}
        {{--                                        <label for="address_1" class="font-weight-bold text-black">Address Line 1</label>--}}
        {{--                                        <textarea id="address_1" name="address_1" class="form-control" rows="3"></textarea>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                                <div class="row mt-3">--}}
        {{--                                    <div class="col-md-12">--}}
        {{--                                        <label for="address_2" class="font-weight-bold text-black">Address Line 2</label>--}}
        {{--                                        <textarea id="address_2" name="address_2" class="form-control" rows="3"></textarea>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                                <div class="row mt-3">--}}
        {{--                                    <div class="col-md-12">--}}
        {{--                                        <label for="postal_code" class="font-weight-bold text-black">Postal Code</label>--}}
        {{--                                        <input type="text" class="form-control" id="postal_code" name="postal_code" placeholder="" value="{{ $publisher->postal_code ?? null }}">--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                                <div class="row mt-3">--}}
        {{--                                    <div class="col-md-12">--}}
        {{--                                        <label for="postal_code" class="font-weight-bold text-black">Media Kit</label>--}}
        {{--                                        <table class="table table-bordered">--}}
        {{--                                            <thead>--}}
        {{--                                                <tr>--}}
        {{--                                                    <th>Name</th>--}}
        {{--                                                    <th>Size</th>--}}
        {{--                                                    <th></th>--}}
        {{--                                                </tr>--}}
        {{--                                            </thead>--}}
        {{--                                            <tbody>--}}
        {{--                                                <tr>--}}
        {{--                                                    <td>--}}
        {{--                                                        <a href="">Revounts-Media-Kit (1).pdf</a>--}}
        {{--                                                    </td>--}}
        {{--                                                    <td>--}}
        {{--                                                        1.0Kb--}}
        {{--                                                    </td>--}}
        {{--                                                    <td class="text-center">--}}
        {{--                                                        <span data-feather="trash-2"></span>--}}
        {{--                                                    </td>--}}
        {{--                                                </tr>--}}
        {{--                                            </tbody>--}}
        {{--                                        </table>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                                <div class="row mt-3">--}}
        {{--                                    <div class="col-md-12">--}}
        {{--                                        <label for="postal_code" class="font-weight-bold text-black">Postal Code</label>--}}
        {{--                                        <input type="text" class="form-control" id="postal_code" name="postal_code" placeholder="" value="{{ $publisher->postal_code ?? null }}">--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                            </form>--}}
        {{--                            <div class="loader-overlay" id="showLoader" style="display: none;">--}}
        {{--                                <div class="atbd-spin-dots spin-lg">--}}
        {{--                                    <span class="spin-dot badge-dot dot-primary"></span>--}}
        {{--                                    <span class="spin-dot badge-dot dot-primary"></span>--}}
        {{--                                    <span class="spin-dot badge-dot dot-primary"></span>--}}
        {{--                                    <span class="spin-dot badge-dot dot-primary"></span>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
    </div>

@endsection
