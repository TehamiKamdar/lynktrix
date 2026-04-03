<?php
    $notificationsCount = \App\Helper\Static\Methods::newNotificationCount();
?>

<?php if($notificationsCount == 0): ?>
    <style>
        .navbar-right__menu .nav-notification .nav-item-toggle:before {
            background: unset;
        }
    </style>
<?php endif; ?>
<header class="header-top">
    <nav class="navbar navbar-light">
        <div class="navbar-left">
            <a href="<?php echo e(route("dashboard", ["type" => "publisher"])); ?>" class="sidebar-toggle">
                <img class="svg" src="<?php echo e(asset("img/svg/bars.svg")); ?>" alt="img">
            </a>
            <a class="navbar-brand" href="<?php echo e(route("dashboard", ["type" => "publisher"])); ?>">
                <?php if(env("APP_ENV") == "production"): ?>
                    <img class="dark" src="<?php echo e(asset("img/logo.png")); ?>" alt="svg" style="width: 200px">
                    <img class="light" src="<?php echo e(asset("img/logo.png")); ?>" alt="img" style="width: 200px">
                <?php endif; ?>
            </a>
            <form action="/" class="search-form">
                <span data-feather="search"></span>
                <input class="form-control mr-sm-2 box-shadow-none" type="text" placeholder="Search...">
            </form>
            <div class="top-menu">

                <div class="strikingDash-top-menu position-relative">
                    <ul>
                        <li>
                            <a href="<?php echo e(route("dashboard", ["type" => "publisher"])); ?>" class="<?php echo e(\App\Helper\PublisherData::isDashboardActive()); ?>">Dashboard</a>
                        </li>
                        <li class="has-subMenu">
                            <a href="javascript:void(0)" class="<?php echo e(\App\Helper\PublisherData::isAdvertiserActive()); ?>">Advertisers</a>
                            <ul class="subMenu">
                                <li class="l_sidebar">
                                    <a href="<?php echo e(route("publisher.find-advertisers")); ?>?section=new" data-layout="light">New Advertisers</a>
                                </li>
                                <li class="l_sidebar">
                                    <a href="<?php echo e(route("publisher.own-advertisers")); ?>" data-layout="light">My Advertisers</a>
                                </li>
                                <li class="l_sidebar">
                                    <a href="<?php echo e(route("publisher.find-advertisers")); ?>" data-layout="dark">Find Advertisers</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-subMenu">
                            <a href="javascript:void(0)" class="<?php echo e(\App\Helper\PublisherData::isReportActive()); ?>">Reports</a>
                            <ul class="subMenu">
                                <li class="l_sidebar">
                                    <a href="<?php echo e(route("publisher.reports.performance-by-clicks.list")); ?>" data-layout="light">Clicks Performance</a>
                                </li>
                                <li class="l_sidebar">
                                    <a href="<?php echo e(route("publisher.reports.performance-by-transactions.list")); ?>" data-layout="light">Advertiser Performance</a>
                                </li>
                                <li class="l_sidebar">
                                    <a href="<?php echo e(route("publisher.reports.transactions.list")); ?>" data-layout="dark">Transactions</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-subMenu">
                            <a href="javascript:void(0)" class="<?php echo e(\App\Helper\PublisherData::isCreativeActive()); ?>">Creatives</a>
                            <ul class="subMenu">
                                <li class="l_sidebar">
                                    <a href="<?php echo e(route("publisher.creatives.coupons.list")); ?>" data-layout="dark">Coupons</a>
                                </li>
                                <li class="l_sidebar">
                                    <a href="<?php echo e(route("publisher.creatives.text-links.list")); ?>" data-layout="dark">Text Links</a>
                                </li>
                                <li class="l_sidebar">
                                    <a href="<?php echo e(route("publisher.creatives.deep-links.list")); ?>" data-layout="dark">Deep Links</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-subMenu">
                            <a href="javascript:void(0)" class="<?php echo e(\App\Helper\PublisherData::isToolActive()); ?>">Tools</a>
                            <ul class="subMenu">
                                <li>
                                    <a href="<?php echo e(route("publisher.tools.deep-links.generate")); ?>" class="">Deep Link Generator</a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route("publisher.tools.api-info.index")); ?>" class="">API</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo e(route("publisher.payments.index")); ?>" class="">Payments</a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
        <!-- ends: navbar-left -->

        <div class="navbar-right">
            <ul class="navbar-right__menu">
                <?php
                    $headerWebsites = auth()->user()->websites->where("status", \App\Models\Website::ACTIVE)->where('id', '!=', auth()->user()->active_website_id);
                ?>
                <?php if(count($headerWebsites) && isset(auth()->user()->active_website->name)): ?>
                    <li class="nav-flag-select">
                        <div class="dropdown dropdown-click">
                                <a class="btn-link" href="" aria-expanded="false" aria-haspopup="true" data-toggle="dropdown">
                                    <span style="width: 7px; height: 7px; border-radius: 50%; margin-right: 4px; display: inline-block; position: relative; top: -1px; background: #20c997;"></span> <?php echo e(auth()->user()->active_website->name); ?> (active)
                                    <span data-feather="chevron-down"></span>
                                </a>
                                <div class="dropdown-default dropdown-menu" style="top: 20px !important;">
                                    <?php $__currentLoopData = $headerWebsites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $website): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a class="dropdown-item" href="<?php echo e(route("publisher.set-website", ["website" => $website->id])); ?>"><?php echo e($website->name); ?></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                        </div>
                    </li>
                <?php endif; ?>
                <!-- ends: nav-message -->
                <!-- ends: nav-message -->
                <li class="nav-notification">
                    <div class="dropdown-custom">
                        <a href="javascript:;" class="nav-item-toggle">
                            <span data-feather="bell"></span>
                        </a>
                        <div class="dropdown-wrapper">
                            <h2 class="dropdown-wrapper__title">Notifications
                                <?php if($notificationsCount): ?>
                                    <span class="badge-circle badge-warning ml-1"><?php echo e($notificationsCount); ?></span>
                                <?php endif; ?>
                            </h2>
                            <ul>
                                <?php $__currentLoopData = \App\Helper\Static\Methods::getNotifications(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="nav-notification__single nav-notification__single--unread d-flex flex-wrap">
                                        <div class="nav-notification__type nav-notification__type--primary">
                                            <span data-feather="inbox"></span>
                                        </div>
                                        <div class="nav-notification__details">
                                            <p style="max-width: 180px;">
                                                <a href="<?php echo e(route("publisher.notification-center.show", $notification->id)); ?>" class="subject stretched-link text-truncate-custom">
                                                    <?php echo e($notification->notification_header); ?>

                                                </a>
                                            </p>
                                            <p>
                                                <span class="time-posted"><?php echo e($notification->created_at->diffForHumans()); ?></span>
                                            </p>
                                        </div>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <a href="<?php echo e(route("publisher.notification-center.index")); ?>" class="dropdown-wrapper__more">See all incoming activity</a>
                        </div>
                    </div>
                </li>
                <!-- ends: .nav-notification -->
                <li class="nav-support">
                    <div class="dropdown-custom">
                        <a href="javascript:;" class="nav-item-toggle">
                            <span data-feather="help-circle"></span></a>
                        <div class="dropdown-wrapper card shadow-lg">
                            <div class="card-body py-0 px-0">
                                <div class="faq-support text-center">
                                    <img src="<?php echo e(\App\Helper\Static\Methods::staticAsset("img/svg/faq-support.svg")); ?>" alt="support" class="svg img-fluid w-50">
                                    <h5 class="fw-600 mt-20 mb-20 color-dark">Need help?</h5>
                                    <h6 class="fw-400 mt-0 mb-20">Connect with your Account Manager</h6>
                                    <div class="content-center">
                                        <button onclick="window.open('https://join.skype.com/invite/rGeSJpSJ8kuq','_blank')" class="btn btn-primary btn-default btn-squared text-capitalize px-30"><i class="la la-skype" style="font-size:25px;"></i> Add to Skype
                                        </button>
                                    </div>
                                    <h6 class="fw-400 mt-20 mb-0 color-light">live:.cid.9cd2316ea40009f1</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-author">
                    <div class="dropdown-custom">
                        <a href="javascript:;" class="nav-item-toggle">
                            <img id="profilePic" src="<?php echo e(\App\Helper\Static\Methods::staticAsset(isset(auth()->user()->publisher->image) && auth()->user()->publisher->image ? auth()->user()->publisher->image : "img/author-nav.jpg")); ?>" alt="" class="rounded-circle">
                        </a>
                        <div class="dropdown-wrapper">
                            <div class="nav-author__info">
                                <div class="author-img">
                                    <img src="<?php echo e(\App\Helper\Static\Methods::staticAsset(isset(auth()->user()->publisher->image) && auth()->user()->publisher->image ? auth()->user()->publisher->image : "img/author-nav.jpg")); ?>" alt="" class="rounded-circle">
                                </div>
                                <div>
                                    <h6><?php echo e(auth()->user()->full_name); ?></h6>
                                    <span><?php echo e(auth()->user()->getRoleName()); ?> ID: <?php echo e(auth()->user()->sid); ?></span>
                                </div>
                            </div>
                            <div class="nav-author__options">
                                <ul>
                                    <?php if(auth()->user()->type == \App\Models\User::PUBLISHER): ?>
                                        <li>
                                            <a href="<?php echo e(route("publisher.profile.basic-information.index")); ?>">
                                                <span data-feather="settings"></span> Settings
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(route("publisher.profile.websites.index")); ?>">
                                                <span data-feather="grid"></span> Websites
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(route("publisher.payments.payment-settings.index")); ?>">
                                                <span data-feather="key"></span> Payment Settings
                                            </a>
                                        </li>
                                    <?php else: ?>
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
                                    <?php endif; ?>
                                </ul>
                                <a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logoutform').submit();" class="nav-author__signout">
                                    <span data-feather="log-out"></span> Sign Out</a>
                                <form id="logoutform" action="<?php echo e(route('logout')); ?>" method="POST" class="display-hidden">
                                    <?php echo e(csrf_field()); ?>

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
                <a href="#" class="btn-author-action">
                    <span data-feather="more-vertical"></span></a>
            </div>
        </div>
        <!-- ends: .navbar-right -->
    </nav>
</header>
<?php /**PATH C:\xampp\htdocs\tech\resources\views/partial/publisher/header.blade.php ENDPATH**/ ?>