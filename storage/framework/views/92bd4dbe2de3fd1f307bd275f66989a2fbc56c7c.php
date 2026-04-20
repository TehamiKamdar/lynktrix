<?php $__env->startPush('title'); ?> Advertiser Profile | <?php echo e($advertiser->name); ?> <?php $__env->stopPush(); ?>

<?php if (! $__env->hasRenderedOnce('4ec0537d-45d7-49fc-ac1c-c94e3741c8c2')): $__env->markAsRenderedOnce('4ec0537d-45d7-49fc-ac1c-c94e3741c8c2');
$__env->startPush('styles'); ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/6.6.6/css/flag-icons.min.css" />
<style>
    /* Hero Section - Light */
    .hero-section {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        padding: 2.5rem;
        margin-bottom: 2rem;
        border: 1px solid rgba(194, 36, 55, 0.15);
        box-shadow: 0 20px 35px -12px rgba(0, 0, 0, 0.08);
        position: relative;
        overflow: hidden;
    }

    .hero-glow {
        position: absolute;
        top: -50%;
        right: -20%;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(194, 36, 55, 0.08), transparent);
        border-radius: 50%;
        pointer-events: none;
    }

    /* Avatar */
    .avatar-ring {
        width: 130px;
        height: 130px;
        background: linear-gradient(135deg, #C22437, #ff6b7c);
        border-radius: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 3px;
    }

    .avatar-inner {
        width: 100%;
        height: 100%;
        background: #ffffff;
        border-radius: 29px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .avatar-inner img {
        width: 100%;
        height: auto;
        object-fit: cover;
    }

    .avatar-inner .no-img {
        font-size: 3rem;
        color: #C22437;
    }

    .company-name {
        font-size: 2rem;
        font-weight: 800;
        background: linear-gradient(135deg, #1a1a2e, #C22437);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        letter-spacing: -0.02em;
    }

    /* Metric Cards - Light */
    .metric-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1rem;
        margin-top: 1.5rem;
    }

    .metric-card {
        background: rgba(0, 0, 0, 0.02);
        backdrop-filter: blur(10px);
        border-radius: 24px;
        padding: 1rem 1.2rem;
        border: 1px solid rgba(0, 0, 0, 0.05);
        transition: all 0.3s;
    }

    .metric-card:hover {
        border-color: rgba(194, 36, 55, 0.555);
    }

    .metric-value {
        font-size: 1.6rem;
        font-weight: 800;
        color: #C22437;
    }

    .metric-label {
        font-size: 0.7rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #6c6c7a;
    }

    /* Action Button */
    .btn-apply {
        border: none;
        padding: 0.9rem 2.2rem;
        border-radius: 60px;
        font-weight: 700;
        transition: all 0.3s;
    }

    .btn-primary{
        background: linear-gradient(135deg, #C22437, #8e1523) !important;
        box-shadow: 0 8px 25px rgba(194, 36, 55, 0.2) !important;
        color: white !important;
    }

    .btn-primary:hover {
        transform: translateY(-3px) !important;
        box-shadow: 0 15px 35px rgba(194, 36, 55, 0.3) !important;
        color: white !important;
    }

    /* Navigation Tabs - Light */
    .nav-horizontal {
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
        margin-bottom: 2rem;
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(20px);
        border-radius: 60px;
        padding: 0.5rem;
        border: 1px solid rgba(0, 0, 0, 0.05);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.03);
    }

    .nav-tab {
        padding: 0.8rem 1.8rem;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.9rem;
        cursor: pointer;
        transition: all 0.3s;
        color: #6c6c7a;
        background: transparent;
        border: none;
    }

    .nav-tab i {
        margin-right: 0.5rem;
        font-size: 1.1rem;
    }

    .nav-tab:hover {
        color: #C22437;
        background: rgba(194, 36, 55, 0.08);
    }

    .nav-tab.active {
        background: #C22437;
        color: white;
        box-shadow: 0 4px 15px rgba(194, 36, 55, 0.25);
    }

    /* Content Cards - Light */
    .content-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        padding: 2rem;
        border: 1px solid rgba(194, 36, 55, 0.15);
        box-shadow: 0 10px 25px -10px rgba(0, 0, 0, 0.05);
        transition: all 0.3s;
    }

    .card-title {
        font-size: 1.3rem;
        font-weight: 700;

        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.8rem;
        padding-bottom: 0.8rem;
        border-bottom: 1px solid rgba(0, 0, 0, 0.08);
        color: #1a1a2e;
    }

    .card-title i {
        color: #C22437;
        font-size: 1.4rem;
    }

    /* Info Rows - Light */
    .info-row {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 0.8rem;
        background: rgba(0, 0, 0, 0.02);
        border-radius: 20px;
        margin-bottom: 0.8rem;
        border: 1px solid rgba(0, 0, 0, 0.03);
    }

    .info-icon {
        width: 40px;
        height: 40px;
        background: rgba(194, 36, 55, 0.1);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #C22437;
        font-size: 1.2rem;
    }

    .info-row small {
        color: #6c6c7a;
    }

    .info-row strong {
        color: #1a1a2e;
    }

    /* Category Badges - Light */
    .category-badge {
        background: rgba(194, 36, 55, 0.1);
        border: 1px solid rgba(194, 36, 55, 0.2);
        padding: 0.4rem 1.2rem;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 500;
        color: #C22437;
    }

    /* Table - Light */
    .premium-table {
        width: 100%;
    }

    .premium-table th {
        padding: 1rem;
        background: rgba(194, 36, 55, 0.1);
        border-radius: 16px 16px 0 0;
        font-weight: 600;
        color: #1a1a2e;
    }

    .premium-table td {
        padding: 1rem;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        color: #4a4a5a;
    }

    /* Offer Card - Light */
    .offer-card {
        background: rgba(0, 0, 0, 0.02);
        border-radius: 20px;
        padding: 1.2rem;
        transition: all 0.3s;
        border: 1px solid rgba(0, 0, 0, 0.05);
    }

    .offer-card:hover {
        background: rgba(194, 36, 55, 0.05);
        border-color: rgba(194, 36, 55, 0.2);
        transform: translateY(-3px);
    }

    .offer-card h6 {
        color: #1a1a2e;
    }

    .offer-card small {
        color: #6c6c7a;
    }

    .bg-white-5 {
        background: rgba(0, 0, 0, 0.02);
    }

    .bg-success.bg-opacity-10 {
        background: rgba(16, 185, 129, 0.08) !important;
    }

    .bg-danger.bg-opacity-10 {
        background: rgba(239, 68, 68, 0.08) !important;
    }

    .text-accent {
        color: #C22437 !important;
    }

    @media (max-width: 992px) {
        .metric-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .profile-container {
            padding: 1rem;
        }

        .hero-section {
            padding: 1.5rem;
        }

        .company-name {
            font-size: 1.5rem;
        }

        .nav-tab {
            padding: 0.5rem 1rem;
            font-size: 0.8rem;
        }
    }

    @media (max-width: 576px) {
        .metric-grid {
            grid-template-columns: 1fr;
        }

        .nav-horizontal {
            border-radius: 20px;
        }

        .nav-tab {
            width: 100%;
            text-align: center;
        }
    }
</style>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('49fd97da-8e44-4315-bc94-c9f631b1f790')): $__env->markAsRenderedOnce('49fd97da-8e44-4315-bc94-c9f631b1f790');
$__env->startPush('scripts'); ?>
<script src="<?php echo e(asset("vendor_assets/js/drawer.js")); ?>"></script>
<script>
    document.querySelectorAll('.nav-tab').forEach(tab => {
        tab.addEventListener('click', function () {
            document.querySelectorAll('.nav-tab').forEach(t => t.classList.remove('active'));
            this.classList.add('active');
            const tabId = this.getAttribute('data-tab');
            document.querySelectorAll('.content-card').forEach(card => card.style.display = 'none');
            document.getElementById(`${tabId}-tab`).style.display = 'block';
        });
    });

    document.querySelectorAll('.copy-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            const link = this.getAttribute('data-link');
            navigator.clipboard.writeText(link);
            const original = this.innerHTML;
            this.innerHTML = '✓ Copied!';
            setTimeout(() => this.innerHTML = original, 2000);
        });
    });
    // function clickToCopy(id, msg) {
    //     copyToClipboard(document.getElementById(id))
    //     normalMsg({ "message": msg, "success": true });
    // }
    function prepareVoucherFormContent(id) {
        $.ajax({
            url: `/publisher/creatives/coupons/${id}`,
            type: 'GET',
            success: function (response) {
                $("#voucherModalContent").html(response)
            },
            error: function (response) {

            }
        });
    }
    function changeLimit() {
        $.ajax({
            url: '<?php echo e(route("publisher.set-limit")); ?>',
            type: 'GET',
            data: { "limit": $("#limit").val(), "type": "coupon" },
            success: function (response) {
                if (response) {
                    window.location.reload();
                }
            },
            error: function (response) {

            }
        });
    }
    function fetch_data(page = 1) {
        $.ajax({
            url: '<?php echo e(route("publisher.creatives.coupons.list")); ?>',
            type: 'GET',
            data: { "search_by_name": "<?php echo e($advertiser->advertiser_id); ?>", page },
            beforeSend: function () {
            },
            success: function (response) {
                $("#ap-overview").html(response.html);
                $("#limit").change(function () {
                    changeLimit();
                });
                $("#loading").removeClass('d-flex', true);
                $("#loading").addClass('d-none');
            },
            error: function (response) {

            }
        });
    }
    document.addEventListener("DOMContentLoaded", function () {
        $(document).on('click', '.atbd-pagination__item a', function (event) {
            event.preventDefault();
            let page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        });
        $("#coupons-tab").one("click", function () {
            fetch_data();

        });
        $("#applyAdvertiser").submit(function () {
            $("#applyAdvertiserBttn").prop('disabled', true);
        });
        const sidebarTabs = document.querySelectorAll('#sidebarTabs .list-group-item');
        const tabContent = document.getElementById('profileTabContent');

        tabContent.addEventListener('shown.bs.tab', function (event) {
            const targetId = event.target.getAttribute('data-bs-target');

            // Remove active class from all tabs
            sidebarTabs.forEach(tab => {
                tab.classList.remove('active');
            });

            // Add active class to corresponding sidebar tab
            const activeTab = document.querySelector(`#sidebarTabs a[data-bs-target="${targetId}"]`);
            if (activeTab) {
                activeTab.classList.add('active');
            }
        });

        // Initialize first tab as active
        const firstTab = document.querySelector('#sidebarTabs .list-group-item:first-child');
        if (firstTab) {
            firstTab.classList.add('active');
        }
    });
</script>
<?php $__env->stopPush(); endif; ?>

<?php $__env->startSection("content"); ?>
    <!-- Hero Section -->
    <div class="hero-section">
        <div class="hero-glow"></div>
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="d-flex align-items-center gap-4 flex-wrap">
                    <?php if(!empty($advertiser->fetch_logo_url)): ?>

                        <div class="avatar-ring">
                            <div class="avatar-inner">
                                <img loading="lazy" class="profile-image" src="<?php echo e($advertiser->fetch_logo_url); ?>"
                                    alt="<?php echo e($advertiser->name); ?>">
                    <?php elseif(!empty($advertiser->logo)): ?>
                                <img src="<?php echo e(asset(" $advertiser->logo")); ?>" alt="<?php echo e($advertiser->name); ?>"
                                    class="profile-image">
                            <?php else: ?>
                                <div class="no-img"><i class="ri-building-2-fill"></i></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div>
                        <h1 class="company-name"><?php echo e($advertiser->name); ?></h1>
                        <p class="text-secondary mb-2"><i class="ri-id-card-line me-1"></i> ID: <?php echo e($advertiser->sid); ?></p>
                        <div class="metric-grid">
                            <div class="metric-card">
                                <div class="metric-value"><?php echo e($advertiser->commission); ?></div>
                                <div class="metric-label">
                                    <?php echo e($advertiser->commission_type == "percentage" || $advertiser->commission_type == "%" ? "Percent" : $advertiser->commission_type); ?>

                                </div>
                            </div>
                            <div class="metric-card">
                                <div class="metric-value"><?php echo e($advertiser->average_payment_time ?? "30d"); ?></div>
                                <div class="metric-label">Payout</div>
                            </div>
                            <div class="metric-card">
                                <div class="metric-value"> <?php
                                    $regions = $advertiser->primary_regions ?? [];
                                    if (count($regions) > 1) {
                                        $regions = "Multi";
                                    } elseif (count($regions) == 1 && $regions[0] == "00") {
                                        $regions = "🌍 Global";
                                    } elseif (count($regions) == 1) {
                                        $regions = $regions[0];
                                    } else {
                                        $regions = "N/A";
                                    }
                                ?>
                                    <?php echo e($regions); ?>

                                </div>
                                <div class="metric-label">Region</div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 text-lg-end mt-4 mt-lg-0">
                <?php if(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_PENDING): ?>

                    <button type="button" class="btn btn-warning btn-apply" disabled>
                        <i class="ri-time-line me-2"></i> Pending
                    </button>

                <?php elseif(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_ACTIVE): ?>

                    <button type="button" class="btn btn-success btn-apply" disabled>
                        <i class="ri-check-line me-2"></i> Joined
                    </button>

                <?php elseif(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_REJECTED): ?>

                    <button type="button" class="btn btn-danger btn-apply" disabled>
                        <i class="ri-close-line me-2"></i> Rejected
                    </button>

                <?php elseif(isset($advertiser->advertiser_applies->status) &&
                    $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_HOLD): ?>

                    <button type="button" class="btn btn-secondary btn-apply" disabled>
                        <i class="ri-pause-circle-line me-2"></i> Hold
                    </button>

                <?php else: ?>

                    <button class="btn btn-primary btn-apply"
                            data-bs-toggle="modal"
                            data-bs-target="#modal-basic">
                        <i class="ri-send-plane-fill me-2"></i>
                        Apply to Promote
                    </button>

                <?php endif; ?>
                <?php if($advertiser->is_active == 1 && $advertiser->status == 1): ?>
                    <p class="small text-secondary mt-2">
                        <i class="ri-shield-check-line me-1 text-accent"></i>
                        Verified Partner • Since <?php echo e(\Carbon\Carbon::parse($advertiser->created_at)->format('Y')); ?>

                    </p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Horizontal Navigation -->
    <div class="nav-horizontal">
        <button class="nav-tab active" data-tab="profile"><i class="ri-user-settings-line"></i> Profile</button>
        <button class="nav-tab" data-tab="terms"><i class="ri-file-list-line"></i> Terms</button>
        <button class="nav-tab" data-tab="rules"><i class="ri-shield-cross-line"></i> Rules</button>
        <button class="nav-tab" data-tab="rates"><i class="ri-percent-line"></i> Rates</button>
        <?php if(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_ACTIVE): ?>
            <button class="nav-tab" data-tab="tracking"><i class="ri-link-m"></i> Tracking</button>
        <?php endif; ?>

        <?php if(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_ACTIVE): ?>
            <button class="nav-tab" data-tab="offers"><i class="ri-ticket-line"></i> Offers</button>
        <?php endif; ?>
    </div>

    <!-- Tab Content -->
    <div class="content-card" id="profile-tab">
        <div class="card-title"><i class="ri-information-line"></i> About Company</div>
        <p class="text-secondary mb-4">
            <?php echo e($advertiser->description ?? 'Leading affiliate marketing partner Lynktrix offers a solid, performance-based business model that requires companies to pay only for leads or sales. With our extensive network of top publishers and influencers, we help brands reach a wide range of consumers and expand into international markets. Through affiliate relationships that foster audience trust and credibility, we make sure your brand has greater market visibility and credibility.'); ?>

        </p>

        <div class="row g-3">
            <div class="col-md-6">
                <div class="info-row">
                    <div class="info-icon"><i class="ri-global-line"></i></div>
                    <div>
                        <small>Website</small>
                        <br>
                        <strong><?php echo e($advertiser->url); ?></strong>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-row">
                    <div class="info-icon"><i class="ri-calendar-check-line"></i></div>
                    <div>
                        <small>Member Since</small>
                        <br>
                        <strong><?php echo e(\Carbon\Carbon::parse($advertiser->created_at)->format('F Y')); ?></strong>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4">

            <div class="card-title mb-3"><i class="ri-price-tag-3-line"></i> Categories</div>
            <div class="d-flex flex-wrap gap-2">
                <?php if($advertiser->categories): ?>
                    <?php $__currentLoopData = \App\Helper\PublisherData::getMixNames($advertiser->categories); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="category-badge">
                            <?php echo e($category); ?>

                        </span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <span class="category-badge">
                        No Categories to show
                    </span>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="content-card" id="terms-tab" style="display: none;">
        <div class="card-title"><i class="ri-file-copy-line"></i> Program Terms</div>
        <div class="bg-white-5 p-4 rounded-4">
            <div class="mb-3">
                <i
                    class="<?php echo e($advertiser->program_policies ? 'ri-checkbox-circle-line text-accent' : 'ri-information-2-line text-muted'); ?> me-2"></i>
                <?php echo $advertiser->program_policies ?? "No Terms Found"; ?>

            </div>
        </div>
    </div>

    <div class="content-card" id="rules-tab" style="display: none;">
        <div class="card-title"><i class="ri-thumb-up-line"></i> Allowed Methods</div>
        <div class="bg-success bg-opacity-10 p-4 rounded-4 mb-4">
            <?php $__empty_1 = true; $__currentLoopData = \App\Helper\PublisherData::getMixNames($advertiser->promotional_methods ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="d-flex align-items-center mb-2">
                    <i class="ri-checkbox-circle-fill text-success me-3"></i>
                    <?php echo e($method); ?>

                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="text-muted">
                    <i class="ri-information-2-line me-2"></i>
                    No Method Found.
                </div>
            <?php endif; ?>
        </div>
        <div class="card-title mt-4"><i class="ri-thumb-down-line"></i> Restricted Methods</div>
        <div class="bg-danger bg-opacity-10 p-4 rounded-4">
            <?php $__empty_1 = true; $__currentLoopData = \App\Helper\PublisherData::getMixNames($advertiser->program_restrictions ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="d-flex align-items-center mb-2">
                    <i class="ri-close-circle-fill text-danger me-3"></i>
                    <?php echo e($method); ?>

                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="text-muted">
                    <i class="ri-information-2-line me-2"></i>
                    No Method Found.
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="content-card" id="rates-tab" style="display: none;">
        <div class="card-title"><i class="ri-percent-line"></i> Commission Structure</div>
        <div class="table-responsive">
            <table class="table table-hover align-middle modern-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Condition</th>
                        <th>Rate</th>
                        <th>Info</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($advertiser->commissions)): ?>
                        <?php $__currentLoopData = $advertiser->commissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <?php if(empty($commission->date)): ?>
                                        <td><?php echo e(now()->format("Y-m-d")); ?></td>
                                    <?php else: ?>
                                        <td><?php echo e($commission->date); ?></td>
                                    <?php endif; ?>
                                    <td><?php echo e($commission->condition ?? "-"); ?></td>
                                    <td class="text-accent fw-bold">
                                        <?php echo e($commission->rate ?? "-"); ?><?php echo e($commission->type ==
                            "amount" ? $advertiser->currency_code : "%"); ?>

                                    </td>
                                    <td><?php echo e($commission->info ?? "-"); ?></td>
                                </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td class="text-center py-4" colspan="4">
                                <div class="text-muted">
                                    <i class="ri-information-2-line text-accent me-2"></i>
                                    No Commission Rates Exist
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="content-card" id="tracking-tab" style="display: none;">
        <div class="card-title"><i class="ri-link-m"></i> Tracking Links</div>
        <div class="mb-4"><label class="fw-semibold mb-2">Standard Tracking Link</label>
            <?php if(isset($advertiser->advertiser_applies->is_tracking_generate) && isset($advertiser->advertiser_applies->tracking_url) && $advertiser->advertiser_applies->is_tracking_generate == 1): ?>
                <div class="d-flex gap-2 flex-wrap">
                    <code
                        class="bg-white-5 p-3 rounded-3 flex-grow-1"><?php echo e($advertiser->advertiser_applies->tracking_url_long ?? $advertiser->advertiser_applies->tracking_url); ?></code>
                    <button class="btn btn-sm btn-accent copy-btn"
                        data-link="<?php echo e($advertiser->advertiser_applies->tracking_url_long ?? $advertiser->advertiser_applies->tracking_url); ?>">Copy</button>
                </div>
            <?php elseif(isset($advertiser->advertiser_applies->is_tracking_generate) && $advertiser->advertiser_applies->is_tracking_generate == 2): ?>
                <div class="d-flex gap-2 flex-wrap">
                    <div class="bg-light p-3 flex-grow-1">
                        <code class="bg-white-5 p-3 rounded-3 flex-grow-1">
                                    <i class="fas fa-spinner fa-spin me-2"></i>
                                    Generating tracking links...
                                </code>
                    </div>
                    <button class="btn btn-sm btn-accent copy-btn" disabled>
                        Copy Link
                    </button>
                </div>

            <?php else: ?>
                <div class="bg-light p-4 text-center">
                    <span class="text-muted">No tracking link available</span>
                </div>
            <?php endif; ?>
        </div>
        <div><label class="fw-semibold mb-2">Short Tracking Link</label>
            <?php if(isset($advertiser->advertiser_applies->is_tracking_generate) && isset($advertiser->advertiser_applies->tracking_url_short) && $advertiser->advertiser_applies->is_tracking_generate == 1): ?>
                <div class="d-flex gap-2 flex-wrap">
                    <code
                        class="bg-white-5 p-3 rounded-3 flex-grow-1"><?php echo e($advertiser->advertiser_applies->tracking_url_short); ?></code>
                    <button class="btn btn-sm btn-accent copy-btn"
                        data-link="<?php echo e($advertiser->advertiser_applies->tracking_url_short); ?>">Copy</button>
                </div>
            <?php elseif(isset($advertiser->advertiser_applies->is_tracking_generate) && $advertiser->advertiser_applies->is_tracking_generate == 2): ?>
                <div class="d-flex gap-2 flex-wrap">
                    <code class="bg-white-5 p-3 rounded-3 flex-grow-1">
                                <i class="fas fa-spinner fa-spin me-2"></i>
                                Generating short tracking links...
                            </code>
                    <button class="btn btn-sm btn-accent copy-btn" disabled>
                        Copy Short Link
                    </button>
                </div>
            <?php else: ?>
                <div class="bg-light p-4 text-center">
                    <span class="text-muted">No short tracking link available</span>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="content-card" id="offers-tab" style="display: none;">
        <div class="card-title"><i class="ri-ticket-line"></i> Active Offers</div>
        <?php if(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_ACTIVE): ?>
            <div class="card-body p-4">
                <div id="loading" class="d-flex justify-content-center align-items-center py-5">

                    <h6>Loading Offers...</h6>
                </div>
                <div id="ap-overview">
                    <!-- Offers content will be loaded here -->
                </div>
            </div>
        <?php endif; ?>
    </div>
    <div class="modal-basic modal fade" id="modal-basic" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="<?php echo e(route('publisher.apply-advertiser')); ?>" method="POST" id="applyAdvertiser">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="a_id" value="<?php echo e($advertiser->sid); ?>">
                <input type="hidden" name="a_name" value="<?php echo e($advertiser->name); ?>">

                <div class="modal-content modal-bg-white">
                    <div class="modal-header ">
                        <div>
                            <h5 class="modal-title fw-bold mb-1">Apply to Program</h5>
                            <p class="text-muted small mb-0">Fill out the form below to request partnership</p>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <!-- Advertiser Info Card -->
                        <div class="bg-light rounded-3 p-3 mb-4">
                            <div class="d-flex align-items-center gap-3 flex-wrap">
                                <div>
                                    <h5 class="mb-0"><?php echo e($advertiser->name); ?></h5>
                                    <span class="text-muted small">Brand ID: <?php echo e($advertiser->sid); ?></span>
                                </div>
                                <div class="ms-auto">
                                    <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill">
                                        <i class="ri-shield-check-line me-1"></i> Verified Partner
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Stats Row -->
                        <div class="row g-3 mb-4">
                            <div class="col-md-4">
                                <div class="d-flex align-items-center gap-3 p-3 border rounded-3 bg-white">
                                    <div class="bg-primary bg-opacity-10 rounded-circle p-2"
                                        style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                        <i class="ri-percent-line text-primary fs-5"></i>
                                    </div>
                                    <div>
                                        <div class="text-muted small">Commission Rate</div>
                                        <div class="fw-bold text-success fs-5">
                                            <?php echo e($advertiser->commission); ?>

                                            <?php echo e(str_contains($advertiser->commission, '%') ? '' : ($advertiser->commission_type == ('percentage' || '%') ? '%' : $advertiser->commission_type)); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="d-flex align-items-center gap-3 p-3 border rounded-3 bg-white">
                                    <div class="bg-info bg-opacity-10 rounded-circle p-2"
                                        style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                        <i class="ri-calendar-line text-info fs-5"></i>
                                    </div>
                                    <div>
                                        <div class="text-muted small">Payout Time</div>
                                        <div class="fw-bold fs-5"><?php echo e($advertiser->average_payment_time ?? 30); ?> <span
                                                class="fs-6">days</span></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="d-flex align-items-center gap-3 p-3 border rounded-3 bg-white">
                                    <div class="bg-warning bg-opacity-10 rounded-circle p-2"
                                        style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                        <i class="ri-global-line text-warning fs-5"></i>
                                    </div>
                                    <div>
                                        <div class="text-muted small">Regions</div>
                                        <div class="fw-bold">
                                            <?php
                                                $regions = $advertiser->primary_regions ?? [];
                                            ?>

                                            <?php if(count($regions) > 1): ?>
                                                <span class="badge bg-primary">Multi-Region</span>
                                            <?php elseif(count($regions) == 1 && $regions[0] == "00"): ?>
                                                <span class="badge bg-success">Global</span>
                                            <?php elseif(count($regions) == 1): ?>
                                                <span class="fi fi-<?php echo e(strtolower($regions[0])); ?> me-1"></span>
                                                <?php echo e($regions[0]); ?>

                                            <?php else: ?>
                                                <span class="text-muted">Not Available</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Message Field -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold mb-2">
                                Promotional Plan <span class="text-muted fw-normal">(Optional)</span>
                            </label>
                            <textarea class="form-control" rows="4" name="message"
                                placeholder="Tell us about your websites, traffic sources, PPC terms, social media channels, etc."></textarea>
                            <div class="text-muted small mt-1">
                                <i class="ri-information-line me-1"></i> This helps us understand your promotional methods
                                better
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-accent">
                            <i class="ri-send-plane-fill me-1"></i> Apply Now
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <!-- .atbd-drawer -->
    
    <div class="overlay-dark"></div>
    <div class="overlay-dark-l2"></div>
    <!-- ends: .atbd-drawer -->




    

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.publisher.publisher_panel", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\lynktrix\resources\views/template/publisher/advertisers/detail.blade.php ENDPATH**/ ?>