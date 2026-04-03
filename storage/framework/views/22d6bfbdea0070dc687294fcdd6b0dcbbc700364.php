<?php if (! $__env->hasRenderedOnce('a578e53d-a326-42f1-b2a5-f563ddba7706')): $__env->markAsRenderedOnce('a578e53d-a326-42f1-b2a5-f563ddba7706');
$__env->startPush('styles'); ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/6.6.6/css/flag-icons.min.css" />
<style>

    :root {
        --primary: #5b47fb;
        --primary-dark: #4a3ac9;
        --light-bg: #f8f9fe;
        --dark-text: #2a2a3c;
        --light-text: #6c757d;
        --border-color: #e0e0ed;
    }

    .bg-primary {
        background-color: var(--primary) !important;
    }

    .profile-card {
        background: white;
        border: 1px solid var(--border-color);
        margin-bottom: 30px;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.03);
    }

    .profile-header {
        padding: 30px;
        background: linear-gradient(to right, #ffffff 0%, var(--light-bg) 100%);
        border-bottom: 1px solid var(--border-color);
    }

    .li-none {
        margin-left: 8px;
        margin-bottom: 4px;
        list-style: none;
    }

    .profile-name {
        font-weight: 700;
        font-size: 1.8rem;
        color: var(--dark-text);
        margin-bottom: 5px;
        letter-spacing: -1px;
    }

    .profile-title {
        color: var(--light-text);
        font-size: 1rem;
        margin-bottom: 20px;
    }

    .image-wrapper {
        max-width: 100%;
        overflow: hidden;
    }

    .profile-image {
        width: auto;
        height: 80px;
        border: 2px solid white;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
    }

    /* Custom styles for sidebar tabs */
    .list-group-item {
        border: none;
        padding: 1rem 1.25rem;
        color: #2a2a3c;
        font-weight: 500;
        transition: all 0.2s ease;
        border-left: 3px solid transparent;
    }

    .list-group-item:hover {
        background-color: #f8f9fe;
        color: #5b47fb;
        cursor: pointer !important;
    }

    .list-group-item.active {
        background-color: #f8f9fe !important;
        color: #5b47fb !important;
        border-left: 3px solid #5b47fb !important;
        font-weight: 600 !important;
    }

    .list-group-item i {
        width: 20px;
        text-align: center;
    }

    .card {
        border-radius: 0;
        border: 1px solid #e0e0ed;
    }

    .nav-tabs {
        border-bottom: 1px solid var(--border-color);
        padding: 0 30px;
    }

    .nav-tabs .nav-link {
        color: var(--light-text);
        font-weight: 600;
        padding: 15px 20px;
        border: none;
        border-bottom: 3px solid transparent;
    }

    .nav-tabs .nav-link.active {
        color: var(--primary) !important;
        background: transparent;
        border-bottom: 3px solid var(--primary) !important;
    }

    .tab-content {
        padding: 30px;
    }

    .info-box {
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 1px solid var(--border-color);
    }

    .info-label {
        font-weight: 600;
        color: var(--light-text);
        font-size: 0.9rem;
        margin-bottom: 5px;
    }

    .info-value {
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--dark-text);
    }

    .info-value.highlight {
        color: var(--primary);
    }

    .btn-primary {
        background-color: var(--primary);
        border: 1px solid var(--primary);
        padding: 10px 25px;
        font-weight: 600;
    }

    .btn-primary:hover {
        background-color: var(--primary-dark);
        border-color: var(--primary-dark);
    }

    .btn-outline-primary {
        color: var(--primary);
        border: 1px solid var(--primary);
        padding: 10px 25px;
        font-weight: 600;
    }

    .btn-outline-primary:hover {
        background-color: var(--primary);
        color: white;
    }

    .contact-info {
        background-color: var(--light-bg);
        padding: 15px;
        margin-top: 20px;
        border: 1px solid var(--border-color);
    }

    .contact-item {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .contact-item:last-child {
        margin-bottom: 0;
    }

    .contact-icon {
        width: 30px;
        color: var(--primary);
    }

    .commission-item {
        display: flex;
        justify-content: space-between;
        padding: 12px 0;
        border-bottom: 1px solid var(--border-color);
    }

    .commission-item:last-child {
        border-bottom: none;
    }

    .commission-category {
        font-weight: 600;
    }

    .commission-rate {
        font-weight: 700;
        color: var(--primary);
    }

    .terms-item {
        margin-bottom: 4px;
    }

    .terms-item:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }

    .terms-title {
        font-weight: 600;
        margin-bottom: 5px;
    }

    .footer {
        text-align: center;
        padding: 20px;
        color: var(--light-text);
        font-size: 0.9rem;
        border-top: 1px solid var(--border-color);
        margin-top: 30px;
    }

    #loading h6 {
        animation: pulse 1.2s ease-in-out infinite;
    }

    @keyframes pulse {
        0% {
            opacity: 0.4;
        }

        50% {
            opacity: 1;
        }

        100% {
            opacity: 0.4;
        }
    }

    .loading-text {
        font-weight: 500;
    }

    .dots::after {
        content: "";
        animation: dots 1.5s steps(3, end) infinite;
    }

    @keyframes dots {
        0% {
            content: "";
        }

        33% {
            content: ".";
        }

        66% {
            content: "..";
        }

        100% {
            content: "...";
        }
    }

    [class*=btn-outline-]:focus {
        color: var(--primary) !important;
    }
</style>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('d8773344-2004-44e4-b532-9c5b4c2cef37')): $__env->markAsRenderedOnce('d8773344-2004-44e4-b532-9c5b4c2cef37');
$__env->startPush('scripts'); ?>
<script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/js/drawer.js")); ?>"></script>
<script>
    function clickToCopy(id, msg) {
        copyToClipboard(document.getElementById(id))
        normalMsg({ "message": msg, "success": true });
    }
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

    tabContent.addEventListener('shown.bs.tab', function(event) {
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
    <div class="az-content az-content-dashboard">
        <div class="container-fluid">
            <div class="az-content-body">
                <div class="profile-card">
                    <!-- Profile Header -->
                    <div class="profile-header">
                        <div class="row align-items-center">
                            <div class="col-md-9 col-sm-12">
                                <h1 class="profile-name"><?php echo e($advertiser->name); ?></h1>
                                <p class="profile-title">ID: <?php echo e($advertiser->sid); ?></p>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="info-box">
                                            <div class="info-label">Commission Rate</div>
                                            <div class="info-value highlight"><?php echo e($advertiser->commission); ?>

                                                <?php echo e($advertiser->commission_type == "percentage" ? "%" : $advertiser->commission_type); ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="info-box">
                                            <div class="info-label">Payout Days</div>
                                            <div class="info-value"><?php echo e($advertiser->average_payment_time ?? "30"); ?> <span
                                                    class="fs-12">days</span></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="info-box">
                                            <div class="info-label">Region</div>
                                            <div class="info-value">
                                                <?php
                                                    $regions = $advertiser->primary_regions ?? [];
                                                    if (count($regions) > 1) {
                                                        $regions = "Multi";
                                                    } elseif (count($regions) == 1 && $regions[0] == "00") {
                                                        $regions = "All";
                                                    } elseif (count($regions) == 1) {
                                                        $regions = $regions[0] . " Region ";
                                                    } else {
                                                        $regions = "Region Data is not available";
                                                    }
                                                ?>
                                                <?php echo e($regions); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12 text-center">
                                <div class="image-wrapper">
                                    <?php if(!empty($advertiser->fetch_logo_url)): ?>
                                        <img loading="lazy" class="profile-image" src="<?php echo e($advertiser->fetch_logo_url); ?>"
                                            alt="<?php echo e($advertiser->name); ?>">
                                    <?php elseif(!empty($advertiser->logo)): ?>
                                        <img src="<?php echo e(\App\Helper\Static\Methods::staticAsset("$advertiser->logo")); ?>"
                                            alt="<?php echo e($advertiser->name); ?>" class="profile-image">
                                    <?php else: ?>
                                        <img loading="lazy" class="profile-image"
                                            src="<?php echo e(\App\Helper\Static\Methods::isImageShowable($advertiser->logo)); ?>"
                                            alt="<?php echo e($advertiser->name); ?>">
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="row mt-3">
                            <div class="col-lg-2 col-md-6 col-sm-12 mb-2 mt-sm-3">
                                
                                <?php if(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_PENDING): ?>

                                    <button type="button" class="btn btn-warning w-100" disabled>
                                        <i class="fas fa-clock color-white me-2"></i> Pending
                                    </button>

                                <?php elseif(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_ACTIVE): ?>

                                    <button type="button" class="btn btn-success w-100" disabled>
                                        <i class="fas fa-check color-white me-2"></i> Joined
                                    </button>

                                <?php elseif(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_REJECTED): ?>

                                    <button type="button" class="btn btn-danger w-100" disabled>
                                        <i class="fas fa-times color-white me-2"></i> Rejected
                                    </button>

                                <?php elseif(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_HOLD): ?>

                                    <button type="button" class="btn btn-secondary w-100" disabled>
                                        <i class="fas fa-stop-circle color-white me-2"></i> Hold
                                    </button>

                                <?php else: ?>

                                    <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal"
                                        data-bs-target="#modal-basic">
                                        <i class="fas fa-paper-plane me-2"></i> Apply
                                    </button>

                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                        <div class="row">
                            <!-- Sidebar Tabs Menu -->
                            <div class="col-lg-2 col-md-4 mb-4">
                                <div class="card shadow-sm border-0 h-100">
                                    <div class="card-header bg-white border-bottom p-3">
                                    </div>
                                    <div class="list-group list-group-flush" id="sidebarTabs" role="tablist">
                                        <a class="list-group-item list-group-item-action active d-flex align-items-center" id="intro-tab" data-bs-toggle="tab" data-bs-target="#intro" role="tab" aria-controls="intro">
                                            <i class="fas fa-info-circle me-3 text-primary"></i> Profile
                                        </a>
                                        <a class="list-group-item list-group-item-action d-flex align-items-center" id="terms-tab" data-bs-toggle="tab" data-bs-target="#terms" role="tab" aria-controls="terms">
                                            <i class="fas fa-file-contract me-3 text-primary"></i> Terms
                                        </a>

                                        <a class="list-group-item list-group-item-action d-flex align-items-center" id="rules-tab" data-bs-toggle="tab" data-bs-target="#rules" role="tab" aria-controls="rules">
                                            <i class="fas fa-ban me-3 text-primary"></i> Rules
                                        </a>
                                        <a class="list-group-item list-group-item-action d-flex align-items-center" id="commission-tab" data-bs-toggle="tab" data-bs-target="#commission" role="tab" aria-controls="commission">
                                            <i class="fas fa-percent me-3 text-primary"></i> Rates
                                        </a>

                                        <?php if(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_ACTIVE): ?>
                                            <a class="list-group-item list-group-item-action d-flex align-items-center" id="links-tab" data-bs-toggle="tab" data-bs-target="#links" role="tab" aria-controls="links">
                                                <i class="fas fa-link me-3 text-primary"></i> Links
                                            </a>
                                        <?php endif; ?>

                                        <?php if(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_ACTIVE): ?>
                                            <a class="list-group-item list-group-item-action d-flex align-items-center" id="coupons-tab" data-bs-toggle="tab" data-bs-target="#coupons" role="tab" aria-controls="coupons">
                                                <i class="fas fa-tag me-3 text-primary"></i> Offers
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Tab Content Area -->
                            <div class="col-lg-10 col-md-8 px-0">
                                <div class="tab-content p-0" id="profileTabContent">
                                    <!-- Intro Tab -->
                                    <div class="tab-pane fade show active" id="intro" role="tabpanel">
                                        <div class="card shadow-sm border-0 mb-4">
                                            <div class="card-body p-4">
                                                <h4 class="mb-3">About <?php echo e($advertiser->name); ?></h4>
                                                <?php if($advertiser->short_description): ?>
                                                    <p class="text-secondary mb-4">
                                                        <?php echo $advertiser->short_description; ?>

                                                    </p>
                                                <?php else: ?>
                                                    <p class="text-secondary mb-4">
                                                        <?php echo $advertiser->description; ?>

                                                    </p>
                                                <?php endif; ?>

                                                <div class="border-top pt-4 mt-4">
                                                    <h5 class="mb-3">Categories</h5>
                                                    <div class="d-flex flex-wrap gap-2">
                                                        <?php if($advertiser->categories): ?>
                                                            <?php $__currentLoopData = \App\Helper\PublisherData::getMixNames($advertiser->categories); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <span class="li-none badge bg-primary p-2 rounded-pill" style="font-size:90%;">
                                                                    <?php echo e($category); ?>

                                                                </span>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php else: ?>
                                                            <span class="li-none badge bg-danger p-2 rounded-pill" style="font-size:90%;">
                                                                No Categories to show
                                                            </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                                <div class="border-top pt-4 mt-4">
                                                    <h5 class="mb-3">
                                                        <i class="fas fa-address-card me-2 text-primary"></i>
                                                        Contact Information
                                                    </h5>
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <div class="d-flex align-items-center">
                                                                <div class="bg-light p-2 me-3">
                                                                    <i class="fas fa-envelope text-primary"></i>
                                                                </div>
                                                                <div>
                                                                    <small class="text-muted d-block">Email</small>
                                                                    <strong><?php echo e($advertiser->user->email ?? "-"); ?></strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <div class="d-flex align-items-center">
                                                                <div class="bg-light p-2 me-3">
                                                                    <i class="fas fa-globe text-primary"></i>
                                                                </div>
                                                                <div>
                                                                    <small class="text-muted d-block">Website</small>
                                                                    <strong><?php echo $url; ?></strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="d-flex align-items-center">
                                                                <div class="bg-light p-2 me-3">
                                                                    <i class="fas fa-clock text-primary"></i>
                                                                </div>
                                                                <div>
                                                                    <small class="text-muted d-block">Response Time</small>
                                                                    <strong>Within 24-48 hours</strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Commission Rates Tab -->
                                    <div class="tab-pane fade w-100" id="commission" role="tabpanel">
                                        <div class="card shadow-sm border-0">
                                            <div class="card-body p-4">
                                                <h4 class="mb-3">Commission Structure</h4>
                                                <p class="text-secondary mb-4">Our commission rates vary based on product
                                                    category and performance tiers.</p>

                                                <div class="table-responsive">
                                                    <table class="table table-hover table-primary">
                                                        <thead>
                                                            <tr>
                                                                <th>Date</th>
                                                                <th>Condition</th>
                                                                <th class="text-center">Commission Rate</th>
                                                                <th>Additional info</th>
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
                                                                        <td class="text-center fw-bold">
                                                                            <?php echo e($commission->rate ?? "-"); ?><?php echo e($commission->type == "amount" ? $advertiser->currency_code : "%"); ?>

                                                                        </td>
                                                                        <td><?php echo e($commission->info ?? "-"); ?></td>
                                                                    </tr>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php else: ?>
                                                                <tr>
                                                                    <td class="text-center py-4" colspan="4">
                                                                        <div class="text-muted">
                                                                            <i class="fas fa-info-circle me-2"></i>
                                                                            No Commission Rates Exist
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php endif; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Terms Tab -->
                                    <div class="tab-pane fade" id="terms" role="tabpanel">
                                        <div class="card shadow-sm border-0">
                                            <div class="card-body p-4">
                                                <h4 class="mb-3">Program Terms</h4>
                                                <div class="bg-light p-4">
                                                    <?php echo $advertiser->program_policies ?? "-"; ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Rules Tab -->
                                    <div class="tab-pane fade" id="rules" role="tabpanel">
                                        <div class="card shadow-sm border-0">
                                            <div class="card-body p-4">
                                                <div class="mb-5">
                                                    <h4 class="mb-3">Preferred Promotional Methods</h4>
                                                    <p class="text-secondary mb-3">Promotional Traffic from these sources is
                                                        allowed:</p>
                                                    <div class="bg-light p-4">
                                                        <?php $__empty_1 = true; $__currentLoopData = \App\Helper\PublisherData::getMixNames($advertiser->promotional_methods ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                            <div class="d-flex align-items-center mb-2">
                                                                <i class="fas fa-check-circle text-success me-3"></i>
                                                                <span><?php echo e($method); ?></span>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                            <div class="text-muted">
                                                                <i class="fas fa-info-circle me-2"></i>
                                                                No Method Found.
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                                <div>
                                                    <h4 class="mb-3">Restricted Promotional Methods</h4>
                                                    <p class="text-secondary mb-3">Promotional Traffic from these sources are
                                                        strictly not allowed:</p>
                                                    <div class="bg-light p-4">
                                                        <?php $__empty_1 = true; $__currentLoopData = \App\Helper\PublisherData::getMixNames($advertiser->program_restrictions ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                            <div class="d-flex align-items-center mb-2">
                                                                <i class="fas fa-times-circle text-danger me-3"></i>
                                                                <span><?php echo e($method); ?></span>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                            <div class="text-muted">
                                                                <i class="fas fa-info-circle me-2"></i>
                                                                No Method Found.
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php if(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_ACTIVE): ?>
                                        <div class="tab-pane fade" id="links" role="tabpanel">
                                            <div class="card shadow-sm border-0">
                                                <div class="card-body p-4">
                                                    <h4 class="mb-4">Tracking Links</h4>

                                                    <!-- Tracking Link Card -->
                                                    <div class="mb-5">
                                                        <h5 class="mb-3">Tracking Link</h5>
                                                        <?php if(isset($advertiser->advertiser_applies->is_tracking_generate) && isset($advertiser->advertiser_applies->tracking_url) && $advertiser->advertiser_applies->is_tracking_generate == 1): ?>
                                                            <div
                                                                class="d-flex flex-column flex-md-row align-items-md-center gap-3 mb-3">
                                                                <div class="bg-light p-3 flex-grow-1">
                                                                    <a href="<?php echo e($advertiser->advertiser_applies->tracking_url_long ?? $advertiser->advertiser_applies->tracking_url); ?>"
                                                                        target="_blank" id="trackingURL"
                                                                        class="text-decoration-none text-primary text-break">
                                                                        <?php echo e($advertiser->advertiser_applies->tracking_url_long ?? $advertiser->advertiser_applies->tracking_url); ?>

                                                                    </a>
                                                                </div>
                                                                <button
                                                                    onclick="clickToCopy('trackingURL', 'Tracking URL Successfully Copied.')"
                                                                    class="btn btn-primary">
                                                                    Copy Link
                                                                </button>
                                                            </div>
                                                        <?php elseif(isset($advertiser->advertiser_applies->is_tracking_generate) && $advertiser->advertiser_applies->is_tracking_generate == 2): ?>
                                                            <div
                                                                class="d-flex flex-column flex-md-row align-items-md-center gap-3 mb-3">
                                                                <div class="bg-light p-3 flex-grow-1">
                                                                    <span class="text-muted">
                                                                        <i class="fas fa-spinner fa-spin me-2"></i>
                                                                        Generating tracking links...
                                                                    </span>
                                                                </div>
                                                                <button class="btn btn-secondary" disabled>
                                                                    Copy Link
                                                                </button>
                                                            </div>
                                                        <?php else: ?>
                                                            <div class="bg-light p-4 text-center">
                                                                <span class="text-muted">No tracking link available</span>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>

                                                    <!-- Short Tracking Link Card -->
                                                    <div>
                                                        <h5 class="mb-3">Short Tracking Link</h5>
                                                        <?php if(isset($advertiser->advertiser_applies->is_tracking_generate) && isset($advertiser->advertiser_applies->tracking_url_short) && $advertiser->advertiser_applies->is_tracking_generate == 1): ?>
                                                            <div class="d-flex flex-column flex-md-row align-items-md-center gap-3">
                                                                <div class="bg-light p-3 flex-grow-1">
                                                                    <a href="<?php echo e($advertiser->advertiser_applies->tracking_url_short); ?>"
                                                                        id="trackingShortURL" target="_blank"
                                                                        class="text-decoration-none text-primary text-break">
                                                                        <?php echo e($advertiser->advertiser_applies->tracking_url_short); ?>

                                                                    </a>
                                                                </div>
                                                                <button
                                                                    onclick="clickToCopy('trackingShortURL', 'Tracking Short URL Successfully Copied.')"
                                                                    class="btn btn-primary">
                                                                    Copy Short Link
                                                                </button>
                                                            </div>
                                                        <?php elseif(isset($advertiser->advertiser_applies->is_tracking_generate) && $advertiser->advertiser_applies->is_tracking_generate == 2): ?>
                                                            <div class="d-flex flex-column flex-md-row align-items-md-center gap-3">
                                                                <div class="bg-light p-3 flex-grow-1">
                                                                    <span class="text-muted">
                                                                        <i class="fas fa-spinner fa-spin me-2"></i>
                                                                        Generating short tracking links...
                                                                    </span>
                                                                </div>
                                                                <button class="btn btn-secondary" disabled>
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
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_ACTIVE): ?>
                                        <div class="tab-pane fade" id="coupons" role="tabpanel">
                                            <div class="card shadow-sm border-0">
                                                <div class="card-body p-4">
                                                    <div id="loading" class="d-flex justify-content-center align-items-center py-5">

                                                            <h6>Loading Offers...</h6>
                                                    </div>
                                                    <div id="ap-overview">
                                                        <!-- Offers content will be loaded here -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-12">

                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
<div class="modal-basic modal fade" id="modal-basic" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="<?php echo e(route('publisher.apply-advertiser')); ?>" method="POST" id="applyAdvertiser">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="a_id" value="<?php echo e($advertiser->sid); ?>">
            <input type="hidden" name="a_name" value="<?php echo e($advertiser->name); ?>">

            <div class="modal-content modal-bg-white">
                <div class="modal-header">
                    <h5 class="modal-title">Apply to Program</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <!-- Advertiser Info -->
                    <div class="mb-3">
                        <h5 class="mb-1"><?php echo e($advertiser->name); ?></h5>
                        <span class="text-muted fs-14">Brand ID: <?php echo e($advertiser->sid); ?></span>
                    </div>

                    <!-- Extra Details -->
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <div class="info-box py-2 px-3 border rounded">
                                <div class="info-label text-muted fs-13">Commission Rate</div>
                                <div class="info-value fw-600 text-success">
                                    <?php echo e($advertiser->commission); ?>

                                    <?php echo e(str_contains($advertiser->commission, '%') ? '' : ($advertiser->commission_type == 'percentage' ? '%' : $advertiser->commission_type)); ?>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="info-box py-2 px-3 border rounded">
                                <div class="info-label text-muted fs-13">Payout Time</div>
                                <div class="info-value fw-600">
                                    <?php echo e($advertiser->average_payment_time ?? 30); ?> days
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="info-box py-2 px-3 border rounded">
                                <div class="info-label text-muted fs-13">Regions</div>
                                <div class="info-value">

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

                    <!-- Message -->
                    <div class="mb-3">
                        <label class="fw-600 mb-1">
                            Promotional Plan <span class="text-muted fs-12">(Optional)</span>
                        </label>
                        <textarea class="form-control" rows="4" name="message"
                            placeholder="Websites, traffic sources, PPC terms, social media, etc."></textarea>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm">
                        Apply Now
                    </button>
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">
                        Cancel
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

<?php echo $__env->make("layouts.publisher.publisher_panel", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Downloads\application\resources\views/template/publisher/advertisers/detail.blade.php ENDPATH**/ ?>