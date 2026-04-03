<!-- Start Table Responsive -->
<div class="table-responsive">
    <table class="table mb-0 table-hover table-borderless border-0">
        <thead>
        <tr class="userDatatable-header">

            <th>
                <span class="userDatatable-title">Advertiser</span>
            </th>
            <th>
                <span class="userDatatable-title">Advertiser URL</span>
            </th>

            <th>
                <span class="userDatatable-title">Tracking Short Link</span>
            </th>

            <th>
                <span class="userDatatable-title">Tracking Link</span>
            </th>

            <th>
                <span class="userDatatable-title">Sud ID</span>
            </th>

            <th>

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
                                <a href="<?php echo e($link->url); ?>" target="_blank"><?php echo e(\Illuminate\Support\Str::limit($link->url, 30, $end='...')); ?></a>
                            </div>
                        </td>
                        <td>
                            <div class="orderDatatable-title">
                                <a href="<?php echo e($link->tracking_url_short); ?>" id="trackingURL<?php echo e($key); ?>" target="_blank"><?php echo e($link->tracking_url_short ?? "-"); ?></a>
                            </div>
                        </td>
                        <td>
                            <div class="orderDatatable-title">
                                <a href="<?php echo e($link->tracking_url_long); ?>" id="trackingURL<?php echo e($key); ?>" target="_blank"><?php echo e(\Illuminate\Support\Str::limit($link->tracking_url_long ?? "-", 30, $end='...')); ?></a>
                            </div>
                        </td>
                        <td>
                            <div class="orderDatatable-title">
                                <?php echo e($link->sub_id ?? "-"); ?>

                            </div>
                        </td>
                        <td>
                            <a href="javascript:void(0)" onclick="copyLink('<?php echo e($key); ?>')" class="btn btn-xs btn-outline-dashed" >
                                Copy Link
                            </a>
                        </td>
                    </tr>
                    <!-- End: tr -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">
                        <h6 class="text-center mt-5">Text Link Data Not Exist</h6>
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
<?php /**PATH C:\xampp\htdocs\tech\resources\views/template/publisher/creatives/text-links/list_view.blade.php ENDPATH**/ ?>