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
    <div class="header-actions">
        <div class="action-icon">
            <i class="bi bi-bell"></i>
            <span class="badge-notify">3</span>
        </div>
        <div class="action-icon">
            <i class="bi bi-chat-dots"></i>
        </div>
        <div class="user-profile">
            <div class="user-avatar">
                <i class="bi bi-person-fill" style="font-size: 1.1rem;"></i>
            </div>
            <div class="user-info">
                <div class="user-name">Alex Morgan</div>
                <div class="user-role">Admin</div>
            </div>
        </div>
    </div>
</header><?php /**PATH D:\lynktrix\resources\views/partial/publisher/header.blade.php ENDPATH**/ ?>