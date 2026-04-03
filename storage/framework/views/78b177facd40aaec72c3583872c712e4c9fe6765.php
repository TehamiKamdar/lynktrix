<aside class="sidebar-wrapper">
    <div class="sidebar collapsed" id="sidebar">
        <div class="sidebar__menu-group">
            <ul class="sidebar_nav">
                <li class="menu-title">
                    <span>Main menu</span>
                </li>
                <li>
                    <a href="<?php echo e(route("dashboard", ["type" => "publisher"])); ?>" class="<?php echo e(\App\Helper\PublisherData::isDashboardActive()); ?>">
                        <span class="menu-text">Dashboard</span>
                    </a>
                </li>
                <li class="has-child">
                    <a href="javascript:void(0)" class="<?php echo e(\App\Helper\PublisherData::isAdvertiserActive()); ?>">
                        <span class="menu-text">Advertisers</span>
                        <span class="toggle-icon"></span>
                    </a>
                    <ul style="display: none;">
                        <li>
                            <a href="<?php echo e(route("publisher.own-advertisers")); ?>">My Advertisers</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route("publisher.find-advertisers")); ?>">Find Advertisers</a>
                        </li>
                    </ul>
                </li>
                <li class="has-child">
                    <a href="javascript:void(0)" class="<?php echo e(\App\Helper\PublisherData::isReportActive()); ?>">
                        <span class="menu-text">Reports</span>
                        <span class="toggle-icon"></span>
                    </a>
                    <ul style="display: none;">
                        <li>
                            <a href="<?php echo e(route("publisher.reports.performance-by-clicks.list")); ?>">Clicks Performance</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route("publisher.reports.performance-by-transactions.list")); ?>">Advertiser Performance</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route("publisher.reports.performance-by-clicks.list")); ?>">Clicks Performance</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route("publisher.reports.transactions.list")); ?>">Transactions</a>
                        </li>
                    </ul>
                </li>
                <li class="has-child">
                    <a href="javascript:void(0)" class="<?php echo e(\App\Helper\PublisherData::isCreativeActive()); ?>">
                        <span class="menu-text">Creatives</span>
                        <span class="toggle-icon"></span>
                    </a>
                    <ul style="display: none;">
                        <li>
                            <a href="#">Banners</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route("publisher.creatives.coupons.list")); ?>">Coupons</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route("publisher.creatives.text-links.list")); ?>">Text Links</a>
                        </li>






                    </ul>
                </li>
                <li class="has-child">
                    <a href="javascript:void(0)" class="<?php echo e(\App\Helper\PublisherData::isToolActive()); ?>">
                        <span class="menu-text">Tools</span>
                        <span class="toggle-icon"></span>
                    </a>
                    <ul class="subMenu">
                        <li>
                            <a href="<?php echo e(route("publisher.tools.deep-links.generate")); ?>" class="">Deep Links</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo e(route("publisher.payments.index")); ?>" class="">
                        <span class="menu-text">Payments</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="">
                        <span class="menu-text">Settings</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>
<?php /**PATH C:\Users\lenovo\Downloads\application\resources\views/partial/publisher/aside.blade.php ENDPATH**/ ?>