<!-- Start Table Responsive -->
<div class="table-responsive">
    <table class="table table-hover align-middle modern-table">
        <thead>
            <tr>
                <th>
                    <span>Advertiser</span>
                </th>

                <th>
                    <span>Tracking Short Link</span>
                </th>

                <th>
                    <span>Tracking Link</span>
                </th>

                <th>
                    <span>Sud ID</span>
                </th>

                <th>
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            <?php if(count($links)): ?>
                <?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <div class="orderDatatable-title">
                                    <?php echo e($link->name); ?> <br>
                                    <span class="fs-12 color-gray">(<?php echo e($link->sid); ?>)</span>
                                </div>
                            </td>
                            <td>
                                <div class="orderDatatable-title">
                                    <a href="<?php echo e($link->tracking_url_short); ?>" id="trackingURL<?php echo e($key); ?>" target="_blank"><?php echo e($link->tracking_url_short ?? "-"); ?></a>
                                </div>
                            </td>
                            <td>
                                <div class="orderDatatable-title">
                                    <a href="<?php echo e($link->tracking_url_long); ?>" id="trackingURL<?php echo e($key); ?>" target="_blank"><?php echo e(\Illuminate\Support\Str::limit($link->tracking_url_long ?? "-", 30, $end = '...')); ?></a>
                                </div>
                            </td>
                            <td>
                                <div class="orderDatatable-title">
                                    <?php echo e($link->sub_id ?? "-"); ?>

                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-start align-items-center gap-3">
                                    <a href="<?php echo e($link->url); ?>" target="_blank" class="website-link tooltip-wrapper" style="font-size: 16px;">
                                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                        <span class="tooltip-text">Visit</span>
                                    </a>
                                    <a href="javascript:void(0)" onclick="copyLink('<?php echo e($key); ?>')" class="website-link tooltip-wrapper" style="font-size: 18px;">
                                        <i class="fa-regular fa-copy"></i>
                                        <span class="tooltip-text">Copy Link</span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <!-- End: tr -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">
                        <h6 class="text-center my-3">Text Link Data Not Exist</h6>
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<!-- Table Responsive End -->

<style>
    .modern-table {
        font-size: 14px;
        overflow: auto;
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


<?php if(count($links) && $links instanceof \Illuminate\Pagination\LengthAwarePaginator): ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-sm-end justify-content-star mt-1 mb-30 border-top">

                <?php echo e($links->withQueryString()->links()); ?>


            </div>
        </div>
    </div>
<?php endif; ?><?php /**PATH D:\lynktrix\resources\views/template/publisher/creatives/text-links/list_view.blade.php ENDPATH**/ ?>