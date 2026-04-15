

<aside class="dashboard-sidebar" id="dashboardSidebar">
    <div class="sidebar-brand">
      <div class="brand-logo">
        <img src="<?php echo e(asset("new/logo.jpg")); ?>" class="img-fluid" alt="">
      </div>
    </div>

    <div class="sidebar-nav">
      <ul class="list-unstyled">
        <li class="nav-item">
          <a href="#" class="nav-link <?php echo e(Route::is("dashboard", ["type" => "publisher"]) ? "active" : ""); ?>" id="navDashboard">
            <i class="fas fa-gauge-high"></i>
            <span class="tooltip-text-nav">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo e(route("publisher.find-advertisers")); ?>" class="nav-link <?php echo e(Route::is("publisher.find-advertisers") ? 'active' : ''); ?>">
            <i class="far fa-handshake"></i>
            <span class="tooltip-text-nav">Partners</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo e(route("publisher.creatives.coupons.list")); ?>" class="nav-link <?php echo e(Route::is("publisher.creatives.coupons.list") ? 'active' : ''); ?>">
            <i class="fas fa-bullhorn"></i>
            <span class="tooltip-text-nav">Campaigns</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo e(route("publisher.creatives.text-links.list")); ?>" class="nav-link <?php echo e(Route::is("publisher.creatives.text-links.list") ? 'active' : ''); ?>">
            <i class="fas fa-link"></i>
            <span class="tooltip-text-nav">Links Promotion</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo e(route("publisher.reports.performance-by-transactions.list")); ?>" class="nav-link <?php echo e(Route::is("publisher.reports.performance-by-transactions.list") ? 'active' : ''); ?>">
            <i class="fas fa-chart-line"></i>
            <span class="tooltip-text-nav">Analytics</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo e(route("publisher.reports.transactions.list")); ?>" class="nav-link <?php echo e(Route::is("publisher.reports.transactions.list") ? 'active' : ''); ?>">
            <i class="fas fa-money-bill-transfer"></i>
            <span class="tooltip-text-nav">Transactions</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo e(route("publisher.payments.index")); ?>" class="nav-link <?php echo e(Route::is("publisher.payments.index") ? 'active' : ''); ?>">
            <i class="fas fa-hand-holding-dollar"></i>
            <span class="tooltip-text-nav">Payments</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logoutform').submit();" class="nav-link">
            <i class="fas fa-right-from-bracket"></i>
            <span class="tooltip-text-nav">Logout</span>
            <form id="logoutform" action="<?php echo e(route('logout')); ?>" method="POST" class="display-hidden">
                <?php echo e(csrf_field()); ?>

            </form>
          </a>
        </li>
      </ul>
    </div>
  </aside><?php /**PATH D:\lynktrix\resources\views/partial/publisher/new_header.blade.php ENDPATH**/ ?>