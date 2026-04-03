<header class="header-top">
    <nav class="navbar navbar-light">
        <div class="navbar-left">
            <a href="{{ route("dashboard", ["type" => "advertiser"]) }}" class="sidebar-toggle">
                <img class="svg" src="{{ asset("img/svg/bars.svg") }}" alt="img">
            </a>
            <a class="navbar-brand" href="{{ route("dashboard", ["type" => "advertiser"]) }}">
                <img class="dark" src="{{ asset("img/logo.png") }}" alt="svg" style="width: 200px">
                <img class="light" src="{{ asset("img/logo.png") }}" alt="img" style="width: 200px">
            </a>
            <form action="/" class="search-form">
                <span data-feather="search"></span>
                <input class="form-control mr-sm-2 box-shadow-none" type="text" placeholder="Search...">
            </form>
            <div class="top-menu">

                <div class="strikingDash-top-menu position-relative">
                    <ul>
                        @can('publisher_dashboard')
                            <li>
                                <a href="#" class="">Dashboard</a>
                            </li>
                        @endcan
                        @can('publisher_advertiser_access')
                            <li @if(\App\Helper\PublisherData::getAdvertisersAccess()) class="has-subMenu" @endif>
                                <a href="#" class="">Advertisers</a>
                                @if(\App\Helper\PublisherData::getAdvertisersAccess())
                                    <ul class="subMenu">
                                        @can('publisher_my_advertiser')
                                            <li class="l_sidebar">
                                                <a href="#" data-layout="light">My Advertisers</a>
                                            </li>
                                        @endcan
                                        @can('publisher_find_advertiser')
                                            <li class="l_sidebar">
                                                <a href="#" data-layout="dark">Find Advertisers</a>
                                            </li>
                                        @endcan
                                    </ul>
                                @endif
                            </li>
                        @endcan
                        @can('publisher_reports_access')
                            <li @if(\App\Helper\PublisherData::getReportsAccess()) class="has-subMenu" @endif>
                                <a href="#" class="">Reports</a>
                                @if(\App\Helper\PublisherData::getReportsAccess())
                                    <ul class="subMenu">
                                        @can('publisher_reports_performance')
                                            <li class="l_sidebar">
                                                <a href="#" data-layout="light">Performance</a>
                                            </li>
                                        @endcan
                                        @can('publisher_reports_transactions')
                                            <li class="l_sidebar">
                                                <a href="#" data-layout="dark">Transactions</a>
                                            </li>
                                        @endcan
                                    </ul>
                                @endif
                            </li>
                        @endcan
                        @can('publisher_links_access')
                            <li @if(\App\Helper\PublisherData::getLinksAccess()) class="has-subMenu" @endif>
                                <a href="#" class="">Links</a>
                                @if(\App\Helper\PublisherData::getLinksAccess())
                                    <ul class="subMenu">
                                        @can('publisher_links_banners')
                                            <li class="l_sidebar">
                                                <a href="#" data-layout="light">Banners</a>
                                            </li>
                                        @endcan
                                        @can('publisher_links_text_n_emails')
                                            <li class="l_sidebar">
                                                <a href="#" data-layout="dark">Text/Emails</a>
                                            </li>
                                        @endcan
                                        @can('publisher_links_coupons')
                                            <li class="l_sidebar">
                                                <a href="#" data-layout="dark">Coupons</a>
                                            </li>
                                        @endcan
                                        @can('publisher_links_products')
                                            <li class="l_sidebar">
                                                <a href="#" data-layout="dark">Products</a>
                                            </li>
                                        @endcan
                                        @can('publisher_links_brand_datafeeds')
                                            <li class="l_sidebar">
                                                <a href="#" data-layout="dark">Brands Datafeeds</a>
                                            </li>
                                        @endcan
                                    </ul>
                                @endif
                            </li>
                        @endcan
                        @can('publisher_payments_access')
                            <li @if(\App\Helper\PublisherData::getPaymentsAccess()) class="has-subMenu" @endif>
                                <a href="#" class="">Payments</a>
                                @if(\App\Helper\PublisherData::getPaymentsAccess())
                                    <ul class="subMenu">
                                        @can('publisher_payments_summary')
                                            <li class="l_sidebar">
                                                <a href="#" data-layout="light">Summary</a>
                                            </li>
                                        @endcan
                                        @can('publisher_payments_details')
                                            <li class="l_sidebar">
                                                <a href="#" data-layout="dark">Details</a>
                                            </li>
                                        @endcan
                                        @can('publisher_payments_transaction_inquiries')
                                            <li class="l_sidebar">
                                                <a href="#" data-layout="dark">Transaction Inquiries</a>
                                            </li>
                                        @endcan
                                    </ul>
                                @endif
                            </li>
                        @endcan
                        @can('publisher_settings')
                            <li>
                                <a href="#" class="">Settings</a>
                            </li>
                        @endcan
                    </ul>
                </div>

            </div>
        </div>
        <!-- ends: navbar-left -->

        <div class="navbar-right">
            <ul class="navbar-right__menu">
                <!-- ends: nav-message -->
{{--                <li class="nav-notification">--}}
{{--                    <div class="dropdown-custom">--}}
{{--                        <a href="javascript:;" class="nav-item-toggle">--}}
{{--                            <span data-feather="bell"></span></a>--}}
{{--                        <div class="dropdown-wrapper">--}}
{{--                            <h2 class="dropdown-wrapper__title">Notifications <span class="badge-circle badge-warning ml-1">4</span></h2>--}}
{{--                            <ul>--}}
{{--                                <li class="nav-notification__single nav-notification__single--unread d-flex flex-wrap">--}}
{{--                                    <div class="nav-notification__type nav-notification__type--primary">--}}
{{--                                        <span data-feather="inbox"></span>--}}
{{--                                    </div>--}}
{{--                                    <div class="nav-notification__details">--}}
{{--                                        <p>--}}
{{--                                            <a href="" class="subject stretched-link text-truncate" style="max-width: 180px;">James</a>--}}
{{--                                            <span>sent you a message</span>--}}
{{--                                        </p>--}}
{{--                                        <p>--}}
{{--                                            <span class="time-posted">5 hours ago</span>--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li class="nav-notification__single nav-notification__single--unread d-flex flex-wrap">--}}
{{--                                    <div class="nav-notification__type nav-notification__type--secondary">--}}
{{--                                        <span data-feather="upload"></span>--}}
{{--                                    </div>--}}
{{--                                    <div class="nav-notification__details">--}}
{{--                                        <p>--}}
{{--                                            <a href="" class="subject stretched-link text-truncate" style="max-width: 180px;">James</a>--}}
{{--                                            <span>sent you a message</span>--}}
{{--                                        </p>--}}
{{--                                        <p>--}}
{{--                                            <span class="time-posted">5 hours ago</span>--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li class="nav-notification__single nav-notification__single--unread d-flex flex-wrap">--}}
{{--                                    <div class="nav-notification__type nav-notification__type--success">--}}
{{--                                        <span data-feather="log-in"></span>--}}
{{--                                    </div>--}}
{{--                                    <div class="nav-notification__details">--}}
{{--                                        <p>--}}
{{--                                            <a href="" class="subject stretched-link text-truncate" style="max-width: 180px;">James</a>--}}
{{--                                            <span>sent you a message</span>--}}
{{--                                        </p>--}}
{{--                                        <p>--}}
{{--                                            <span class="time-posted">5 hours ago</span>--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li class="nav-notification__single nav-notification__single d-flex flex-wrap">--}}
{{--                                    <div class="nav-notification__type nav-notification__type--info">--}}
{{--                                        <span data-feather="at-sign"></span>--}}
{{--                                    </div>--}}
{{--                                    <div class="nav-notification__details">--}}
{{--                                        <p>--}}
{{--                                            <a href="" class="subject stretched-link text-truncate" style="max-width: 180px;">James</a>--}}
{{--                                            <span>sent you a message</span>--}}
{{--                                        </p>--}}
{{--                                        <p>--}}
{{--                                            <span class="time-posted">5 hours ago</span>--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li class="nav-notification__single nav-notification__single d-flex flex-wrap">--}}
{{--                                    <div class="nav-notification__type nav-notification__type--danger">--}}
{{--                                        <span data-feather="heart"></span>--}}
{{--                                    </div>--}}
{{--                                    <div class="nav-notification__details">--}}
{{--                                        <p>--}}
{{--                                            <a href="" class="subject stretched-link text-truncate" style="max-width: 180px;">James</a>--}}
{{--                                            <span>sent you a message</span>--}}
{{--                                        </p>--}}
{{--                                        <p>--}}
{{--                                            <span class="time-posted">5 hours ago</span>--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                            <a href="" class="dropdown-wrapper__more">See all incoming activity</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </li>--}}
                <!-- ends: .nav-notification -->
                <li class="nav-author">
                    <div class="dropdown-custom">
                        <a href="javascript:;" class="nav-item-toggle">
                            <img src="{{ \App\Helper\Static\Methods::staticAsset("img/author-nav.jpg") }}" alt="" class="rounded-circle">
                        </a>
                        <div class="dropdown-wrapper">
                            <div class="nav-author__info">
                                <div class="author-img">
                                    <img src="{{ \App\Helper\Static\Methods::staticAsset("img/author-nav.jpg") }}" alt="" class="rounded-circle">
                                </div>
                                <div>
                                    <h6>{{ auth()->user()->full_name }}</h6>
                                    <span>{{ auth()->user()->getRoleName() }} ID: {{ auth()->user()->sid }}</span>
                                </div>
                            </div>
                            <div class="nav-author__options">
                                <ul>
                                    @if(auth()->user()->type == \App\Models\User::PUBLISHER)
                                        <li>
                                            <a href="{{ route("publisher.profile.basic-information.index") }}">
                                                <span data-feather="settings"></span> Settings
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <span data-feather="grid"></span> Websites
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <span data-feather="key"></span> Payment Settings
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <span data-feather="user-plus"></span> Refer A Friend
                                            </a>
                                        </li>
                                    @else
                                        <li>
                                            <a href="">
                                                <span data-feather="user"></span> Profile
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <span data-feather="settings"></span> Settings</a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <span data-feather="key"></span> Billing</a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <span data-feather="users"></span> Activity</a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <span data-feather="bell"></span> Help</a>
                                        </li>
                                    @endif
                                </ul>
                                <a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logoutform').submit();" class="nav-author__signout">
                                    <span data-feather="log-out"></span> Sign Out</a>
                                <form id="logoutform" action="{{ route('logout') }}" method="POST" class="display-hidden">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                        <!-- ends: .dropdown-wrapper -->
                    </div>
                </li>
                <!-- ends: .nav-author -->
            </ul>
            <!-- ends: .navbar-right__menu -->
            <div class="navbar-right__mobileAction d-md-none">
                <a href="#" class="btn-search">
                    <span data-feather="search"></span>
                    <span data-feather="x"></span></a>
                <a href="#" class="btn-author-action">
                    <span data-feather="more-vertical"></span></a>
            </div>
        </div>
        <!-- ends: .navbar-right -->
    </nav>
</header>
