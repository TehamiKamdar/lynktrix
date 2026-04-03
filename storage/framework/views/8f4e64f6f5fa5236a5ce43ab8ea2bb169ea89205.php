<?php
    $urlType = \App\Enums\AccountType::ADMIN->value;
?>

<aside class="sidebar-wrapper">
    <div class="sidebar sidebar-collapse" id="sidebar">
        <div class="sidebar__menu-group">
            <ul class="sidebar_nav">
                <li class="menu-title">
                    <span>Main menu</span>
                </li>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_dashboard_access')): ?>
                    <li>
                        <a href="<?php echo e(route('dashboard', ['type' => $urlType])); ?>" class="">
                            <span data-feather="home" class="nav-icon"></span>
                            <span class="menu-text"><?php echo e(trans('cruds.dashboard.title')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_publishers_access')): ?>
                    <li class="has-child <?php echo e((request()->is("$urlType/publisher-management/publishers") || request()->is("$urlType/publisher-management/publishers/*") || request()->is("$urlType/publisher-management/publisher/*") || request()->is("$urlType/publisher-management/approval") || request()->is("$urlType/publisher-management/approval/*")) ? "open" : null); ?>">
                        <a href="#" class="<?php echo e((request()->is("$urlType/publisher-management/publishers") || request()->is("$urlType/publisher-management/publishers/*") || request()->is("$urlType/publisher-management/publisher/*") || request()->is("$urlType/publisher-management/approval") || request()->is("$urlType/publisher-management/approval/*")) ? "active" : null); ?>">
                            <span data-feather="layout" class="nav-icon"></span>
                            <span class="menu-text"><?php echo e(trans('cruds.publisherManagement.title')); ?></span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_pending_publishers_access')): ?>
                                <li>
                                    <a href="<?php echo e(route("admin.publisher-management.publishers.index", ['status' => 'pending'])); ?>" data-layout="light" class="<?php echo e(request()->is("$urlType/publisher-management/publisher/pending") ? "active" : null); ?>">
                                        Pending <?php echo e(trans('cruds.publisher.title')); ?>

                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_hold_publishers_access')): ?>
                                <li>
                                    <a href="<?php echo e(route("admin.publisher-management.publishers.index", ['status' => 'hold'])); ?>" data-layout="light" class="<?php echo e(request()->is("$urlType/publisher-management/publisher/hold") ? "active" : null); ?>">
                                        Hold <?php echo e(trans('cruds.publisher.title')); ?>

                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_active_publishers_access')): ?>
                                <li>
                                    <a href="<?php echo e(route("admin.publisher-management.publishers.index", ['status' => 'active'])); ?>" data-layout="light" class="<?php echo e(request()->is("$urlType/publisher-management/publisher/active") ? "active" : null); ?>">
                                        Active <?php echo e(trans('cruds.publisher.title')); ?>

                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_rejected_publishers_access')): ?>
                                <li>
                                    <a href="<?php echo e(route("admin.publisher-management.publishers.index", ['status' => 'rejected'])); ?>" data-layout="light" class="<?php echo e(request()->is("$urlType/publisher-management/publisher/rejected") ? "active" : null); ?>">
                                        Rejected <?php echo e(trans('cruds.publisher.title')); ?>

                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_approval_requests_access')): ?>
                    <li class="has-child <?php echo e((request()->is("$urlType/approval/pending") || request()->is("$urlType/approval/pending/*") || request()->is("$urlType/approval/joined") || request()->is("$urlType/approval/joined/*") || request()->is("$urlType/approval/rejected") || request()->is("$urlType/approval/rejected/*") || request()->is("$urlType/approval/hold") || request()->is("$urlType/approval/hold/*") || request()->is("$urlType/approval/admitad_hold") || request()->is("$urlType/approval/admitad_hold/*")) ? "open" : null); ?>">
                        <a href="#" class="<?php echo e((request()->is("$urlType/approval/pending") || request()->is("$urlType/approval/pending/*") || request()->is("$urlType/approval/joined") || request()->is("$urlType/approval/joined/*") || request()->is("$urlType/approval/rejected") || request()->is("$urlType/approval/rejected/*") || request()->is("$urlType/approval/hold") || request()->is("$urlType/approval/hold/*") || request()->is("$urlType/approval/admitad_hold") || request()->is("$urlType/approval/admitad_hold/*")) ? "active" : null); ?>">
                            <span data-feather="layout" class="nav-icon"></span>
                            <span class="menu-text"><?php echo e(trans('advertiser.approval.title')); ?></span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_pending_approval_requests_access')): ?>
                                <li>
                                    <a href="<?php echo e(route("admin.approval.index", ["status" => \App\Models\AdvertiserApply::STATUS_PENDING])); ?>" data-layout="light" class="<?php echo e(request()->is("$urlType/approval/pending") || request()->is("$urlType/approval/pending/*") ? "active" : null); ?>">
                                        <?php echo e(trans('advertiser.approval.pending.title')); ?>

                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_joined_approval_requests_access')): ?>
                                <li>
                                    <a href="<?php echo e(route("admin.approval.index", ["status" => \App\Models\AdvertiserApply::STATUS_ACTIVE])); ?>" data-layout="light" class="<?php echo e(request()->is("$urlType/approval/joined") || request()->is("$urlType/approval/joined/*") ? "active" : null); ?>">
                                        <?php echo e(trans('advertiser.approval.joined.title')); ?>

                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_hold_approval_requests_access')): ?>
                                <li>
                                    <a href="<?php echo e(route("admin.approval.index", ["status" => \App\Models\AdvertiserApply::STATUS_HOLD])); ?>" data-layout="light" class="<?php echo e(request()->is("$urlType/approval/hold") || request()->is("$urlType/approval/hold/*") ? "active" : null); ?>">
                                        <?php echo e(trans('advertiser.approval.hold.title')); ?>

                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_admitad_hold_approval_requests_access')): ?>
                                <li>
                                    <a href="<?php echo e(route("admin.approval.index", ["status" => \App\Models\AdvertiserApply::STATUS_ADMITAD_HOLD])); ?>" data-layout="light" class="<?php echo e(request()->is("$urlType/approval/admitad_hold") || request()->is("$urlType/approval/admitad_hold/*") ? "active" : null); ?>">
                                        Admitad <?php echo e(trans('advertiser.approval.hold.title')); ?>

                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_rejected_approval_requests_access')): ?>
                                <li>
                                    <a href="<?php echo e(route("admin.approval.index", ["status" => \App\Models\AdvertiserApply::STATUS_REJECTED])); ?>" data-layout="light" class="<?php echo e(request()->is("$urlType/approval/rejected") || request()->is("$urlType/approval/rejected/*") ? "active" : null); ?>">
                                        <?php echo e(trans('advertiser.approval.rejected.title')); ?>

                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_advertisers_access')): ?>
                    <li class="has-child <?php echo e((request()->is("$urlType/advertiser-management/advertisers") || request()->is("$urlType/advertiser-management/advertisers/*") || request()->is("$urlType/advertiser-management/api-advertisers") || request()->is("$urlType/advertiser-management/api-advertisers/*") || request()->is("$urlType/advertiser-management/apply-advertisers") || request()->is("$urlType/advertiser-management/apply-advertisers/*")) ? "open" : null); ?>">
                        <a href="#" class="<?php echo e((request()->is("$urlType/advertiser-management/advertisers") || request()->is("$urlType/advertiser-management/advertisers/*") || request()->is("$urlType/advertiser-management/api-advertisers") || request()->is("$urlType/advertiser-management/api-advertisers/*") || request()->is("$urlType/advertiser-management/apply-advertisers") || request()->is("$urlType/advertiser-management/apply-advertisers/*")) ? "active" : null); ?>">
                            <span data-feather="layout" class="nav-icon"></span>
                            <span class="menu-text"><?php echo e(trans('cruds.advertiserManagement.title')); ?></span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_advertisers_access')): ?>
                                <li class="l_sidebar">
                                    <a href="<?php echo e(route("admin.advertiser-management.advertisers.index")); ?>" data-layout="light" class="<?php echo e(request()->is("$urlType/advertiser-management/advertisers") || request()->is("$urlType/advertiser-management/advertisers/*") ? "active" : null); ?>"><?php echo e(trans('cruds.advertiser.title')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_api_advertisers_access')): ?>
                                <li class="l_sidebar">
                                    <a href="<?php echo e(route("admin.advertiser-management.api-advertisers.index")); ?>" data-layout="light" class="<?php echo e((request()->is("$urlType/advertiser-management/api-advertisers") || request()->is("$urlType/advertiser-management/api-advertisers/*")) && !(request()->is("$urlType/advertiser-management/api-advertisers/show-on-publisher") || request()->is("$urlType/advertiser-management/api-advertisers/show-on-publisher/*") || request()->is("$urlType/advertiser-management/api-advertisers/duplicate-records") || request()->is("$urlType/advertiser-management/api-advertisers/duplicate-records/*")) ? "active" : null); ?>"><?php echo e(trans('advertiser.api-advertiser.title')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_api_advertisers_show_access')): ?>
                                <li class="l_sidebar">
                                    <a href="<?php echo e(route("admin.advertiser-management.api-advertisers.show_on_publisher.index")); ?>" data-layout="light" class="<?php echo e(request()->is("$urlType/advertiser-management/api-advertisers/show-on-publisher") || request()->is("$urlType/advertiser-management/api-advertisers/show-on-publisher/*") ? "active" : null); ?>"><?php echo e(trans('advertiser.api-advertiser.show_on_publisher.title')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_manual_join_publishers_advertisers_access')): ?>
                                <li class="l_sidebar">
                                    <a href="<?php echo e(route("admin.advertiser-management.manual_join_publisher")); ?>" data-layout="light" class="<?php echo e(request()->is("$urlType/advertiser-management/manual-join-publisher") || request()->is("$urlType/advertiser-management/manual-join-publisher/*") ? "active" : null); ?>"><?php echo e(trans('advertiser.manual_join_publisher.title')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_api_advertisers_duplicate_records_access')): ?>
                                <li class="l_sidebar">
                                    <a href="<?php echo e(route("admin.advertiser-management.api-advertisers.duplicate_record")); ?>" data-layout="light" class="<?php echo e(request()->is("$urlType/advertiser-management/api-advertisers/duplicate-records") || request()->is("$urlType/advertiser-management/api-advertisers/duplicate-records/*") ? "active" : null); ?>"><?php echo e(trans('advertiser.api-advertiser.duplicate_record.title')); ?></a>
                                </li>
                            <?php endif; ?>
                            <li class="l_sidebar">
                                    <a href="<?php echo e(route("admin.add-advertiser-manual")); ?>" data-layout="light" class="<?php echo e(request()->is("$urlType/add-manual-advertisers") || request()->is("$urlType/add-manual-advertisers/*") ? "active" : null); ?>">Add Advertiser Manually</a>
                                </li>
                        </ul>
                    </li>
                <?php endif; ?>





















                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_creatives_access')): ?>
                    <li class="has-child <?php echo e((request()->is("$urlType/creative-management/coupons") || request()->is("$urlType/creative-management/coupons/*")) ? "open" : null); ?>">
                        <a href="#" class="<?php echo e((request()->is("$urlType/creative-management/coupons") || request()->is("$urlType/creative-management/coupons/*")) ? "active" : null); ?>">
                            <span data-feather="layout" class="nav-icon"></span>
                            <span class="menu-text"><?php echo e(trans('creative.creativeManagement.title')); ?></span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_coupons_creatives_access')): ?>
                                <li class="l_sidebar">
                                    <a href="<?php echo e(route("admin.creative-management.coupons.index")); ?>" data-layout="light" class="<?php echo e(request()->is("$urlType/creative-management/coupons") || request()->is("$urlType/creative-management/coupons/*") ? "active" : null); ?>"><?php echo e(trans('creative.creativeManagement.coupon.title')); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_transactions_access')): ?>
                    <li class="has-child <?php echo e((request()->is("$urlType/transactions") || request()->is("$urlType/transactions/*")) ? "open" : null); ?>">
                        <a href="#" class="<?php echo e((request()->is("$urlType/transactions") || request()->is("$urlType/transactions/*")) ? "active" : null); ?>">
                            <span data-feather="layout" class="nav-icon"></span>
                            <span class="menu-text"><?php echo e(trans('cruds.transaction.title_singular')); ?> Management</span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_transactions_access')): ?>
                                <li class="l_sidebar">
                                    <a href="<?php echo e(route("admin.transactions.index")); ?>" data-layout="light" class="<?php echo e(request()->is("$urlType/transactions") ? "active" : null); ?>"><?php echo e(trans('cruds.transaction.title')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_missing_transactions_access')): ?>
                                <li class="l_sidebar">
                                    <a href="<?php echo e(route("admin.transactions.missing")); ?>" data-layout="light" class="<?php echo e(request()->is("$urlType/transactions/missing")? "active" : null); ?>"><?php echo e(trans('cruds.transaction_missing.title')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_missing_payment_transactions_access')): ?>
                                <li class="l_sidebar">
                                    <a href="<?php echo e(route("admin.transactions.missing.payment")); ?>" data-layout="light" class="<?php echo e(request()->is("$urlType/transactions/missing/payment")? "active" : null); ?>"><?php echo e(trans('cruds.transaction_missing_payment.title')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_transactions_rakuten_payment_access')): ?>
                                <li class="l_sidebar">
                                    <a href="<?php echo e(route("admin.transactions.rakuten.payment")); ?>" data-layout="light" class="<?php echo e(request()->is("$urlType/transactions/rakuten/payment")? "active" : null); ?>">Transaction Rakuten Payment</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_payments_access')): ?>
                    <li class="has-child <?php echo e(request()->is("$urlType/payment-management/*") ? "open" : null); ?>">
                        <a href="#" class="<?php echo e(request()->is("$urlType/payment-management/*") ? "active" : null); ?>">
                            <span data-feather="layout" class="nav-icon"></span>
                            <span class="menu-text"><?php echo e(trans('cruds.paymentManagement.title')); ?></span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_pending_to_pay_payments_access')): ?>
                                <li class="l_sidebar">
                                    <a href="<?php echo e(route("admin.payment-management.index", ["section" => \App\Models\PaymentHistory::PENDING_TO_PAY])); ?>" data-layout="light" class="<?php echo e(request()->is("$urlType/payment-management/pending-to-pay") || request()->is("$urlType/payment-management/pending-to-pay/*") ? "active" : null); ?>">
                                        <?php echo e(trans('advertiser.approval.pending.title')); ?> To Pay
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_paid_to_publisher_payments_access')): ?>
                                <li class="l_sidebar">
                                    <a href="<?php echo e(route("admin.payment-management.index", ["section" => \App\Models\PaymentHistory::PAID_TO_PUBLISHER])); ?>" data-layout="light" class="<?php echo e(request()->is("$urlType/payment-management/paid-to-publisher") || request()->is("$urlType/payment-management/paid-to-publisher/*") ? "active" : null); ?>">
                                        Paid To Publisher
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_release_payments_access')): ?>
                                <li class="l_sidebar">
                                    <a href="<?php echo e(route("admin.payment-management.index", ["section" => \App\Models\PaymentHistory::RELEASE_PAYMENT])); ?>" data-layout="light" class="<?php echo e(request()->is("$urlType/payment-management/release-payment") || request()->is("$urlType/payment-management/release-payment/*") ? "active" : null); ?>">
                                        Release Payment
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_history_payments_access')): ?>
                                <li class="l_sidebar">
                                    <a href="<?php echo e(route("admin.payment-management.index", ["section" => \App\Models\PaymentHistory::PAYMENT_HISTORY])); ?>" data-layout="light" class="<?php echo e(request()->is("$urlType/payment-management/payment-history") || request()->is("$urlType/payment-management/payment-history/*") ? "active" : null); ?>">
                                        Payment History
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_no_publisher_payments_access')): ?>
                                <li class="l_sidebar">
                                    <a href="<?php echo e(route("admin.payment-management.index", ["section" => \App\Models\PaymentHistory::NO_PUBLISHER_PAYMENT])); ?>" data-layout="light" class="<?php echo e(request()->is("$urlType/payment-management/no-publisher-payment") || request()->is("$urlType/payment-management/no-publisher-payment/*") ? "active" : null); ?>">
                                        No Publisher Payment
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_users_access')): ?>
                    <li class="has-child <?php echo e(request()->is("$urlType/user-management/users") || request()->is("$urlType/user-management/users/*") || request()->is("$urlType/user-management/advertisers") || request()->is("$urlType/user-management/advertisers/*") || request()->is("$urlType/user-management/publishers") || request()->is("$urlType/user-management/publishers/*") || request()->is("$urlType/user-management/permissions") || request()->is("$urlType/user-management/permissions/*") || request()->is("$urlType/user-management/roles") || request()->is("$urlType/user-management/roles/*") ? "open" : null); ?>">
                        <a href="#" class="<?php echo e(request()->is("$urlType/user-management/users") || request()->is("$urlType/user-management/users/*") || request()->is("$urlType/user-management/publishers") || request()->is("$urlType/user-management/publishers/*") || request()->is("$urlType/user-management/permissions") || request()->is("$urlType/user-management/permissions/") || request()->is("$urlType/user-management/roles") || request()->is("$urlType/user-management/roles/*") ? "active" : null); ?>">
                            <span data-feather="layout" class="nav-icon"></span>
                            <span class="menu-text"><?php echo e(trans('cruds.userManagement.title')); ?></span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_permissions_users_access')): ?>
                                <li class="l_sidebar">
                                    <a href="<?php echo e(route("admin.user-management.permissions.index")); ?>" data-layout="light" class="<?php echo e(request()->is("$urlType/user-management/permissions") || request()->is("$urlType/user-management/permissions/*") ? "active" : null); ?>"><?php echo e(trans('cruds.permission.title')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_roles_users_access')): ?>
                                <li class="l_sidebar">
                                    <a href="<?php echo e(route("admin.user-management.roles.index")); ?>" data-layout="light" class="<?php echo e(request()->is("$urlType/user-management/roles") || request()->is("$urlType/user-management/roles/*") ? "active" : null); ?>"><?php echo e(trans('cruds.role.title')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_users_access')): ?>
                                <li class="l_sidebar">
                                    <a href="<?php echo e(route("admin.user-management.users.index")); ?>" data-layout="light" class="<?php echo e(request()->is("$urlType/user-management/users") || request()->is("$urlType/user-management/users/*") ? "active" : null); ?>"><?php echo e(trans('cruds.user.title')); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_statistics_access')): ?>
                    <li class="has-child <?php echo e((request()->is("$urlType/statistics/links") || request()->is("$urlType/statistics/links/*") || request()->is("$urlType/statistics/deeplinks") || request()->is("$urlType/statistics/deeplinks/*")) ? "open" : null); ?>">
                        <a href="#" class="<?php echo e((request()->is("$urlType/statistics/links") || request()->is("$urlType/statistics/links/*") || request()->is("$urlType/statistics/deeplinks") || request()->is("$urlType/statistics/deeplinks/*")) ? "active" : null); ?>">
                            <span data-feather="layout" class="nav-icon"></span>
                            <span class="menu-text"><?php echo e(trans('link.statistics.title')); ?></span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_tracking_links_statistics_access')): ?>
                                <li class="l_sidebar">
                                    <a href="<?php echo e(route("admin.statistics.links.index")); ?>" data-layout="light" class="<?php echo e(request()->is("$urlType/statistics/links") || request()->is("$urlType/statistics/links/*") ? "active" : null); ?>"><?php echo e(trans('link.statistics.links.title')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_deep_links_statistics_access')): ?>
                                <li class="l_sidebar">
                                    <a href="<?php echo e(route("admin.statistics.deeplinks.index")); ?>" data-layout="light" class="<?php echo e(request()->is("$urlType/statistics/deeplinks") || request()->is("$urlType/statistics/deeplinks/*") ? "active" : null); ?>"><?php echo e(trans('link.statistics.links.deep_title')); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_settings_access')): ?>
                    <li class="has-child <?php echo e(request()->is("$urlType/settings/advertiser-configs") || request()->is("$urlType/settings/advertiser-configs/*") || request()->is("$urlType/settings/notification") || request()->is("$urlType/settings/notification/*") ? "open" : null); ?>">
                        <a href="#" class="<?php echo e(request()->is("$urlType/settings/advertiser-configs") || request()->is("$urlType/settings/advertiser-configs/*") || request()->is("$urlType/settings/notification") || request()->is("$urlType/settings/notification/*") ? "active" : null); ?>">
                            <span data-feather="layout" class="nav-icon"></span>
                            <span class="menu-text"><?php echo e(trans('cruds.setting.title')); ?></span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_advertiser_configurations_settings_access')): ?>
                                <li class="l_sidebar">
                                    <a href="<?php echo e(route("admin.settings.advertiser-configs.index")); ?>" data-layout="light" class="<?php echo e(request()->is("$urlType/settings/advertiser-configs") || request()->is("$urlType/settings/advertiser-configs/*") ? "active" : null); ?>"><?php echo e(trans('cruds.advertiser_configuration.title')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_notification_settings_access')): ?>
                                <li class="l_sidebar">
                                    <a href="<?php echo e(route("admin.settings.notification.index")); ?>" data-layout="light" class="<?php echo e(request()->is("$urlType/settings/notification") || request()->is("$urlType/settings/notification/*") ? "active" : null); ?>"><?php echo e(trans('cruds.notification.title')); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_site_log_viewer_access')): ?>
                    <li>
                        <a href="<?php echo e(route("log-viewer.index")); ?>" target="_blank" data-layout="light" class="<?php echo e(request()->is("$urlType/site-log-viewer") || request()->is("$urlType/site-log-viewer/*") ? "active" : null); ?>">
                            <span data-feather="layout" class="nav-icon"></span>
                            
                            Site Log Viewer
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</aside>
<?php /**PATH C:\Users\lenovo\Downloads\application\resources\views/partial/admin/aside.blade.php ENDPATH**/ ?>