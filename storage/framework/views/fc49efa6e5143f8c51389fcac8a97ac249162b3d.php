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
                            <div>
                                <?php echo e($link->name); ?> <br>
                                <span class="fs-12 color-gray">(<?php echo e($link->sid); ?>)</span>
                            </div>
                        </td>

                        <td>
                            <div>
                                <a href="<?php echo e($link->tracking_url_short); ?>" class="tracking-short" target="_blank">
                                    <?php echo e($link->tracking_url_short ?? "-"); ?>

                                </a>
                            </div>
                        </td>

                        <td>
                            <div>
                                <a href="<?php echo e($link->tracking_url_long); ?>" target="_blank">
                                    <?php echo e(\Illuminate\Support\Str::limit($link->tracking_url_long ?? "-", 30, '...')); ?>

                                </a>
                            </div>
                        </td>

                        <td><?php echo e($link->sub_id ?? "-"); ?></td>

                        <td>
                            <div class="d-flex gap-3">

                                <a href="<?php echo e($link->url); ?>" target="_blank" class="website-link tooltip-wrapper" style="font-size: 16px;">
                                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                    <span class="tooltip-text">Visit</span>
                                </a>

                                <a href="javascript:void(0)" class="website-link tooltip-wrapper copy-btn" style="font-size: 18px;">
                                    <i class="fa-solid fa-copy"></i>
                                    <span class="tooltip-text">Copy Link</span>
                                </a>

                            </div>
                        </td>
                    </tr>
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


<?php if(count($links) && $links instanceof \Illuminate\Pagination\LengthAwarePaginator): ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-sm-end justify-content-star mt-1 mb-30 border-top">

                <?php echo e($links->withQueryString()->links()); ?>


            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH D:\lynktrix\resources\views/template/publisher/creatives/text-links/list_view.blade.php ENDPATH**/ ?>