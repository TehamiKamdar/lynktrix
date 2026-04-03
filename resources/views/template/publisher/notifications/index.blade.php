@extends("layouts.publisher.publisher_panel")

@pushonce('styles')

    <style>
        .application-faqs .panel {
            margin-bottom: 25px !important;
        }
        .application-faqs .panel {
            background: #fff;
            margin: 10px 0;
        }
        .application-faqs .panel-title .title-foot {
            display: contents;
        }
        .application-faqs .panel-title .category {
            position: absolute;
            right: 30px;
            font-size: 13px;
            line-height: 20px;
            top: 10px;
        }
    </style>

@endpushonce

@pushonce('scripts')

@endpushonce

@section("content")

    <div class="contents">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="breadcrumb-main">
                        <h4 class="text-capitalize breadcrumb-title">Notification Center</h4>
                        <div class="breadcrumb-action justify-content-center flex-wrap">
{{--                            <div class="action-btn">--}}

{{--                                <div class="form-group mb-0">--}}
{{--                                    <div class="input-container icon-left position-relative">--}}
{{--                                            <span class="input-icon icon-left">--}}
{{--                                                <span data-feather="calendar"></span>--}}
{{--                                            </span>--}}
{{--                                        <input type="text" class="form-control form-control-default date-ranger" name="date-ranger" placeholder="Oct 30, 2019 - Nov 30, 2019">--}}
{{--                                        <span class="input-icon icon-right">--}}
{{--                                                <span data-feather="chevron-down"></span>--}}
{{--                                            </span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-sm-5">
                    <!-- Card 1 -->
                    <div class="card shadow-lg">
                        <div class="card-body p-0">
                            <div class="faqs-wrapper">

                                <div class="project-search shop-search  global-shadow px-20 pt-35">
                                    <form action="/" class="order-search__form w-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                        <input class="form-control mr-sm-2 border-0 box-shadow-none" type="search" placeholder="Search by Name" aria-label="Search">
                                    </form>
                                </div>

                                <div class="faqs-wrapper-tab p-15 pt-25 pb-30">
                                    <div class="nav flex-column text-left mb-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link @if(empty(request()->route()->parameter("category"))) active @endif" href="{{ route("publisher.notification-center.index") }}">
                                            <span class="dot bg-primary"></span>All Notifications</a>
                                        <a class="nav-link @if(request()->route()->parameter("category") == 'approvals') active @endif" href="{{ route("publisher.notification-center.index", ['category' => 'approvals']) }}">
                                            <span class="dot bg-success"></span>Approvals</a>
                                        <a class="nav-link @if(request()->route()->parameter("category") == 'rejections') active @endif" href="{{ route("publisher.notification-center.index", ['category' => 'rejections']) }}">
                                            <span class="dot bg-danger"></span>Rejections</a>
                                        <a class="nav-link @if(request()->route()->parameter("category") == 'promotions') active @endif" href="{{ route("publisher.notification-center.index", ['category' => 'promotions']) }}">
                                            <span class="dot bg-warning"></span>Promotions</a>
                                        <a class="nav-link @if(request()->route()->parameter("category") == 'advertiser-updates') active @endif" href="{{ route("publisher.notification-center.index", ['category' => 'advertiser-updates']) }}">
                                            <span class="dot bg-info"></span>Advertiser Updates</a>
                                        <a class="nav-link @if(request()->route()->parameter("category") == 'linkscircle-updates') active @endif" href="{{ route("publisher.notification-center.index", ['category' => 'linkscircle-updates']) }}">
                                            <span class="dot bg-info"></span>LinksCircle Updates</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div><!-- ends: col -->

                <div class="col-xl-9 col-sm-7">
                    <div class="mb-30">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <!-- Edit Profile -->
                                <div class="application-faqs">
                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                        @include("template.publisher.notifications.content", compact('notifications'))
                                    </div>
                                </div>
                                <!-- Edit Profile End -->
                            </div>
                        </div>
                    </div>
                </div><!-- ends: col -->
            </div>
        </div>
    </div>

@endsection
