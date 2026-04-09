{{-- <div class="az-header">
    <div class="container">
        <div class="az-header-left">
            <a href="index.html" class="az-logo"><span></span> azia</a>
            <a href="" id="azMenuShow" class="az-header-menu-icon d-lg-none"><span></span></a>
        </div><!-- az-header-left -->
        <div class="az-header-menu">
            <div class="az-header-menu-header">
                <a href="index.html" class="az-logo"><span></span> azia</a>
                <a href="" class="close">&times;</a>
            </div><!-- az-header-menu-header -->
            <ul class="nav">
                <li class="nav-item {{ Route::is("dashboard", ["type" => "publisher"]) ? "active" : "" }}">
                    <a href="{{ route("dashboard", ["type" => "publisher"]) }}" class="nav-link"><i
                            class="typcn typcn-chart-area-outline"></i> Dashboard</a>
                </li>
                <li
                    class="nav-item {{ Route::is("publisher.find-advertisers") || Route::is("publisher.own-advertisers") || Route::is('publisher.view-advertiser') ? "active" : "" }}">
                    <a href="" class="nav-link with-sub"><i class="typcn typcn-shopping-cart"></i>Brands</a>
                    <nav class="az-menu-sub">
                        <a href="page-signin.html" class="nav-link">Brand Insights</a>
                        <a href="{{ route("publisher.find-advertisers") }}" class="nav-link">All Brands</a>
                        <a href="{{ route("publisher.find-advertisers") }}?section=new" class="nav-link">Latest
                            Brands</a>
                        <a href="{{ route("publisher.own-advertisers") }}" class="nav-link">Approved Brands</a>
                    </nav>
                </li>




                <li
                    class="nav-item {{ Route::is("publisher.creatives.coupons.list") || Route::is("publisher.creatives.text-links.list") || Route::is("publisher.tools.deep-links.generate") ? "active" : "" }}">
                    <a href="" class="nav-link with-sub"><i class="typcn typcn-link-outline"></i>Campaign Materials</a>
                    <nav class="az-menu-sub">
                        <a href="{{ route("publisher.creatives.coupons.list") }}" class="nav-link">Special Offers</a>
                        <a href="{{ route("publisher.creatives.text-links.list") }}" class="nav-link">Affiliate
                            Links</a>
                        <a href="{{ route("publisher.tools.deep-links.generate") }}" class="nav-link">Deep Link
                            Generator</a>
                    </nav>
                </li>

                <li
                    class="nav-item {{ Route::is("publisher.reports.performance-by-transactions.list") || Route::is("publisher.reports.transactions.list") ? "active" : "" }}">
                    <a href="" class="nav-link with-sub"><i class="typcn typcn-chart-pie"></i>Analytics</a>
                    <nav class="az-menu-sub">
                        <a href="{{ route("publisher.reports.performance-by-transactions.list") }}"
                            class="nav-link">Analytical Report</a>
                        <a href="{{ route("publisher.reports.transactions.list") }}" class="nav-link">All
                            Conversions</a>

                    </nav>
                </li>

                <li class="nav-item {{ Route::is("publisher.payments.index") ? "active" : "" }}">
                    <a href="{{ route("publisher.payments.index") }}" class="nav-link"><i
                            class="typcn typcn-input-checked-outline"></i>Payouts</a>
                </li>
            </ul>
        </div><!-- az-header-menu -->
        <div class="az-header-right">
            <div class="dropdown az-profile-menu">
                <a href="" class="az-img-user"><img src="{{ asset('publisher_dashboard/img/faces/face1.jpg') }}"
                        alt=""></a>
                <div class="dropdown-menu">
                    <div class="az-dropdown-header d-sm-none">
                        <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
                    </div>
                    <div class="az-header-profile">
                        <div class="az-img-user">
                            <img src="{{ asset('publisher_dashboard/img/faces/face1.jpg') }}" alt="">
                        </div><!-- az-img-user -->
                        <h6>{{ auth()->user()->full_name }}</h6>
                        <span>{{ auth()->user()->getRoleName() }} | ID: {{ auth()->user()->sid }}</span>
                    </div><!-- az-header-profile -->

                    <a href="" class="dropdown-item"><i class="typcn typcn-user-outline"></i> My Profile</a>
                    <a href="" class="dropdown-item"><i class="typcn typcn-edit"></i> Edit Profile</a>
                    <a href="" class="dropdown-item"><i class="typcn typcn-time"></i> Activity Logs</a>
                    <a href="" class="dropdown-item"><i class="typcn typcn-cog-outline"></i> Account Settings</a>
                    <a href="javascript:void(0)"
                        onclick="event.preventDefault(); document.getElementById('logoutform').submit();"
                        class="dropdown-item"><i class="typcn typcn-power-outline"></i> Sign Out</a>
                    <form id="logoutform" action="{{ route('logout') }}" method="POST" class="display-hidden">
                        {{ csrf_field() }}
                    </form>
                </div><!-- dropdown-menu -->
            </div>
        </div><!-- az-header-right -->
    </div><!-- container -->
</div><!-- az-header --> --}}

<aside class="dashboard-sidebar" id="dashboardSidebar">
    <div class="sidebar-brand">
      <div class="brand-logo">
        <img src="{{ asset("new/logo.jpg") }}" class="img-fluid" alt="">
      </div>
    </div>

    <div class="sidebar-nav">
      <ul class="list-unstyled">
        <li class="nav-item">
          <a href="#" class="nav-link active" id="navDashboard">
            <i class="bi bi-speedometer2"></i>
            <span class="tooltip-text-nav">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="bi bi-bar-chart-line"></i>
            <span class="tooltip-text-nav">Partners</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="bi bi-envelope-paper"></i>
            <span class="tooltip-text-nav">Campaigns</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="bi bi-people"></i>
            <span class="tooltip-text-nav">Payments</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="bi bi-folder2-open"></i>
            <span class="tooltip-text-nav">Messages</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="bi bi-gear"></i>
            <span class="tooltip-text-nav">Settings</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="bi bi-question-circle"></i>
            <span class="tooltip-text-nav">Help</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="bi bi-box-arrow-right"></i>
            <span class="tooltip-text-nav">Logout</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>