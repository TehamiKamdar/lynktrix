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
                            <div
                                class="text-capitalize mb-md-30 mb-15 d-flex align-items-center justify-content-md-start justify-content-center">
                                <a class="wh-36 bg-primary text-white radius-md mr-10 content-center" href="index.html">a</a>
                                <span class="text-dark">admin</span>
                            </div>
                            <h1>Bootstrap 4 React Web Application</h1>
                        </div><!-- End: .signUP-admin-left__content  -->
                        <div class="signUP-admin-left__img">
                            <img class="img-fluid svg" src="{{ asset('img/svg/signupillustration.svg') }}" alt="img"/>
                        </div><!-- End: .signUP-admin-left__img  -->
                    </div><!-- End: .signUP-admin-left  -->
                </div><!-- End: .col-xl-4  -->
                <div class="col-xl-8 col-lg-7 col-md-7 col-sm-8">

                    @include("partial.admin.alert")

                    <div class="row mt-4">
                        <div class="col-lg-4">
                            <div class="card h-100">
                                <div class="card-body p-30">
                                    <div class="pricing d-flex align-items-center">
                                        <span class=" pricing__tag color-dark order-bg-opacity-dark rounded-pill ">Free Forever</span>
                                    </div>
                                    <div class="pricing__price rounded">
                                        <p class="pricing_value display-3 color-dark d-flex align-items-center text-capitalize fw-600 mb-1">
                                            Publisher
                                        </p>
                                        <p class="pricing_subtitle mb-0">For Individuals</p>
                                    </div>
                                    <div class="pricing__features">
                                        <ul>
                                            <li>
                                                <span class="fa fa-check"></span>100MB file space
                                            </li>

                                            <li>
                                                <span class="fa fa-check"></span>2 active projects
                                            </li>
                                            <li>
                                                <span class="fa fa-check"></span>Limited boards
                                            </li>
                                            <li>
                                                <span class="fa fa-check"></span>Basic project management
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="price_action d-flex pb-30 pl-30">
                                    <a href="{{ route('register', ['type' => 'publisher']) }}" class="btn btn-default btn-squared btn-outline-light text-capitalize px-30 color-gray fw-500">Register </a>
                                    <a href="{{ route('login', ['type' => 'publisher']) }}" class="btn btn-default btn-squared btn-outline-light text-capitalize px-30 color-gray fw-500 ml-3">Login </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card h-100">
                                <div class="card-body p-30">
                                    <div class="pricing d-flex align-items-center">
                                        <span class=" pricing__tag color-dark order-bg-opacity-dark rounded-pill ">Free Forever</span>
                                    </div>
                                    <div class="pricing__price rounded">
                                        <p class="pricing_value display-3 color-dark d-flex align-items-center text-capitalize fw-600 mb-1">
                                            Advertiser
                                        </p>
                                        <p class="pricing_subtitle mb-0">For Individuals</p>
                                    </div>
                                    <div class="pricing__features">
                                        <ul>
                                            <li>
                                                <span class="fa fa-check"></span>100MB file space
                                            </li>

                                            <li>
                                                <span class="fa fa-check"></span>2 active projects
                                            </li>
                                            <li>
                                                <span class="fa fa-check"></span>Limited boards
                                            </li>
                                            <li>
                                                <span class="fa fa-check"></span>Basic project management
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="price_action d-flex pb-30 pl-30">
                                    <a href="{{ route('register', ['type' => 'advertiser']) }}" class="btn btn-default btn-squared btn-outline-light text-capitalize px-30 color-gray fw-500">Register </a>
                                    <a href="{{ route('login', ['type' => 'advertiser']) }}" class="btn btn-default btn-squared btn-outline-light text-capitalize px-30 color-gray fw-500 ml-3">Login </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End: .col-xl-8  -->
            </div>
        </div>
    </div><!-- End: .signUP-admin  -->
@endsection
