<?php
    $checkAdmin = auth()->user()->getRoleName() != \App\Models\Role::ADMIN_ROLE
?>
<style>
    .modern-table {
        font-size: 14px;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    }

    .modern-table thead th {
        font-weight: 800;
        text-transform: uppercase;
        font-size: 13px;
        background-color: #c22437;
        color: #fff;
        letter-spacing: 0.8px;
        padding: 16px 10px;
    }

    .modern-table tbody td {
        padding: 4px 10px;
        vertical-align: middle;
    }

    .modern-table tbody tr:hover {
        background-color: #fff5f5 !important;
    }

    .website-link {
        color: #333;
        transition: all 0.2s;
        text-decoration: none !important;
    }

    .website-link:hover {
        color: #c22437;
        text-decoration: underline !important;
    }

    .commission-pill {
        background-color: #fff0f0;
        color: #c22437;
        padding: 6px 8px;
        border-radius: 50px;
        font-weight: 600;
        white-space: nowrap;
    }
</style>
<!-- Minimal Modern Advertisers Table -->
<div class="container py-5">
    <div class="table-responsive">
        <table class="table table-hover align-middle modern-table">
            <thead style="background-color: #c22437; color: white;">
                <tr>
                    <th>Advertiser</th>
                    <th class="text-center">Commission</th>
                    <th class="text-center">APC Days</th>
                    <th class="text-center">Region</th>
                    <?php if($checkAdmin): ?>
                        <th class="text-center">Status</th>
                    <?php endif; ?>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $advertisers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $advertiser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <!-- Advertiser Name -->
                        <td>
                            <span class="fw-semibold" style="font-size: 14px;"><?php echo e($advertiser->name); ?></span>
                        </td>

                        <!-- Commission -->
                        <td class="text-center">
                            <span class="commission-pill" style="font-size: 12px;">
                                <i class="fas fa-crown"></i>
                                <?php echo e($advertiser->commission); ?><?php echo e($advertiser->commission_type == "percentage" ? '%' : ''); ?>

                            </span>
                        </td>

                        <!-- APC Days -->
                        <td class="text-center fw-medium" style="font-size: 14px;">
                            <?php echo e($advertiser->average_payment_time ?? 30); ?> Days
                        </td>

                        <!-- Region -->
                        <td class="text-center" style="font-size: 14px;">
                            <?php
                                $regions = [];
                                if (is_string($advertiser->primary_regions)) {
                                    $regions = json_decode($advertiser->primary_regions, true) ?? [];
                                } elseif (is_array($advertiser->primary_regions)) {
                                    $regions = $advertiser->primary_regions;
                                }
                                $regionText = count($regions) > 1 ? "Multi" : (count($regions) == 1 ? $regions[0] : "All");
                            ?>
                            <?php echo e($regionText); ?>

                        </td>

                        <!-- Status (Only for Admin) -->
                        <?php if($checkAdmin): ?>
                            <td class="text-center">
                                <?php
                                    $status = $advertiser->advertiser_applies->status ??
                                        $advertiser->advertiser_applies_status ?? null;
                                ?>
                                <?php if($status == \App\Models\AdvertiserApply::STATUS_ACTIVE): ?>
                                    <span class="badge bg-success">Joined</span>
                                <?php elseif($status == \App\Models\AdvertiserApply::STATUS_PENDING): ?>
                                    <span class="badge bg-warning">Pending</span>
                                <?php elseif($status == \App\Models\AdvertiserApply::STATUS_REJECTED): ?>
                                    <span class="badge bg-danger">Rejected</span>
                                <?php elseif($status == \App\Models\AdvertiserApply::STATUS_HOLD || $status == \App\Models\AdvertiserApply::STATUS_ADMITAD_HOLD): ?>
                                    <span class="badge bg-info">Hold</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary">Not Joined</span>
                                <?php endif; ?>
                            </td>
                        <?php endif; ?>

                        <!-- Website Link -->
                        <td>
                            <div class="d-flex justify-content-center align-items-center gap-2">
                                <a href="<?php echo e($advertiser->url); ?>" target="_blank" class="website-link tooltip-wrapper"
                                    style="font-size: 16px;">
                                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                    <span class="tooltip-text">Visit</span>
                                </a>

                                <a href="<?php echo e(route('publisher.view-advertiser', ['sid' => $advertiser->sid])); ?>"
                                    class="website-link tooltip-wrapper" style="font-size: 22px;">
                                    <i class="ri-information-line"></i>
                                    <span class="tooltip-text">Information</span>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>



<?php echo $__env->make("template.publisher.widgets.loader", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php if(count($advertisers) && $advertisers instanceof \Illuminate\Pagination\LengthAwarePaginator): ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-sm-end justify-content-start mt-1 mb-30">

                <?php echo e($advertisers->withQueryString()->links()); ?>


            </div>
        </div>
    </div>
<?php endif; ?><?php /**PATH D:\lynktrix\resources\views/template/publisher/advertisers/advertiser-list.blade.php ENDPATH**/ ?>