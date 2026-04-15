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


<header class="dashboard-header">
    <div class="header-left-area">
        <button class="mobile-toggle-btn" id="mobileToggleBtn" aria-label="Toggle sidebar">
            <i class="bi bi-list"></i>
        </button>
        <div class="header-search-wrapper">
            <i class="bi bi-search search-icon"></i>
            <input type="text" class="search-input" placeholder="Search dashboard...">
        </div>
    </div>
    <div class="header-title">
        <h6><?php echo $__env->yieldPushContent('title'); ?></h6>
    </div>
    <div class="header-actions">
        <div class="action-icon">
            <i class="bi bi-bell"></i>
            <span class="badge-notify">3</span>
        </div>
        <div class="user-profile">
            <div class="user-avatar">
                <img src="<?php echo e(asset('publisher_dashboard/img/faces/face1.jpg')); ?>" style="width: 40px;" class="rounded-circle shadow-4" alt="">
            </div>
            <div class="user-info">
                <div class="user-name"><?php echo e(auth()->user()->full_name); ?></div>
                <div class="user-role"><?php echo e(auth()->user()->getRoleName()); ?> | ID: <?php echo e(auth()->user()->sid); ?></div>
            </div>
        </div>
    </div>
</header><?php /**PATH D:\lynktrix\resources\views/partial/publisher/header.blade.php ENDPATH**/ ?>