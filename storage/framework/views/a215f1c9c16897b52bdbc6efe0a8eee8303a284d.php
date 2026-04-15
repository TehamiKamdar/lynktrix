

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
            <i class="bi bi-speedometer2"></i>
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
  </aside><?php /**PATH D:\lynktrix\resources\views/partial/publisher/new_header.blade.php ENDPATH**/ ?>