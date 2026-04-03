<?php
    $checkAdmin = auth()->user()->getRoleName() != \App\Models\Role::ADMIN_ROLE
?>
<style>
        .accordion-item {
            border: none;
            margin-bottom: 10px;
            overflow: hidden;
            box-shadow: 2px 2px 2px rgba(0,0,0,0.08);
            border-radius: 0px !important;
        }
        .accordion-button {
            background-color: #ffffff;
            padding: 12px 20px;
            font-weight: 500;
            border: none;
            box-shadow: none !important;
        }
        .accordion-button:not(.collapsed) {
            background-color: #fff;
            color: #000;
        }
        .accordion-button::after {
            background-image: none;
            font-family: "Font Awesome 6 Free";
            content: "\f078"; /* Chevron down icon */
            font-weight: 900;
            transform: rotate(0deg);
            transition: transform 0.3s;
        }
        .accordion-button:not(.collapsed)::after {
            content: "\f077"; /* Chevron up icon */
            transform: rotate(0deg);
            background: none !important;
        }
        .advertiser-name {
            font-size: 1.1rem;
            color: #333;
        }
        .advertiser-attributes {
            display: flex;
            gap: 30px;
            margin-right: 30px;
        }
        .attribute-badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            min-width: 115px;
            text-align: center;
        }
        .premium-badge{
            background-color: #e6e6e6;
            color: #000000;
            border: 1px solid #505050;
        }
        .danger-badge{
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .hold-badge{
            background-color: #e8f4fd;
            color: #0c63e4;
            border: 1px solid #b6d4fe;
        }
        .pending-badge {
            background-color: #fff3cd;
            color: #856404;
            border: 1px solid #ffeaa7;
        }
        .active-badge {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .accordion-body {
            background-color: #f8f9fa;
            padding: 25px;
            border-top: 1px solid #eee;
        }
        .advertiser-details {
            display: grid;
            grid-template-columns: 120px 1fr;
            gap: 20px;
        }
        .advertiser-logo {
            width: 100px;
            height: 100px;
            background-color: white;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #eee;
            font-size: 1rem;
            color: #666;
        }
        .detail-item {
            margin-bottom: 12px;
            display: flex;
            align-items: center;
        }
        .detail-label {
            font-weight: 600;
            min-width: 120px;
            color: #555;
        }
        .website-link {
            color: #0d6efd;
            text-decoration: none;
        }
        .website-link:hover {
            text-decoration: underline;
        }
        .contact-btn {
            background-color: #0d6efd;
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            font-size: 0.9rem;
        }
        .contact-btn:hover {
            background-color: #0b5ed7;
            color: white;
        }
        @media (max-width: 768px) {
            .advertiser-attributes {
                gap: 15px;
                margin-right: 20px;
                flex-wrap: wrap;
            }
            .advertiser-details {
                grid-template-columns: 1fr;
            }
            .accordion-button {
                padding: 15px;
            }
        }
</style>
<div class="accordion" id="advertisersAccordion">
    <?php if(count($advertisers)): ?>
        <?php $__currentLoopData = $advertisers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $advertiser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <!-- Advertiser 1 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading1">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo e($advertiser->sid); ?>" aria-expanded="true" aria-controls="collapse1">
                    <div class="d-flex justify-content-between align-items-center w-100 me-3">
                        <span class="advertiser-name">
                            <i class="fas fa-building me-2"></i> <?php echo e($advertiser->name); ?>

                        </span>
                        <div class="advertiser-attributes">
                            <span class="attribute-badge premium-badge">
                                <i class="fas fa-crown me-1"></i> Commission: <?php echo e($advertiser->commission); ?><?php echo e($advertiser->commission_type == "percentage" ? (str_contains($advertiser->commission, '%') ? '' : '%') : $advertiser->commission_type); ?>


                            </span>
                            
                            <?php if($checkAdmin): ?>
                                <?php
                                    $status = null;
                                    if(isset($advertiser->advertiser_applies->status))
                                    {
                                        $status = $advertiser->advertiser_applies->status;
                                    }
                                    elseif (isset($advertiser->advertiser_applies_status))
                                    {
                                        $status = $advertiser->advertiser_applies_status;
                                    }
                                    // echo($status);
                                    // dd($status);
                                ?>

                                <?php if($status && $status == \App\Models\AdvertiserApply::STATUS_PENDING): ?>

                                    <span class="attribute-badge pending-badge">
                                        <i class="fas fa-check-circle me-1"></i> Pending
                                    </span>

                                <?php elseif($status && $status == \App\Models\AdvertiserApply::STATUS_ACTIVE): ?>

                                    <span class="attribute-badge active-badge">
                                        <i class="fas fa-check-circle me-1"></i> Joined
                                    </span>

                                <?php elseif($status && $status == \App\Models\AdvertiserApply::STATUS_REJECTED): ?>

                                    <span class="attribute-badge danger-badge">
                                        <i class="fas fa-check-circle me-1"></i> Rejected
                                    </span>

                                <?php elseif($status && $status == \App\Models\AdvertiserApply::STATUS_HOLD || $status && $status == \App\Models\AdvertiserApply::STATUS_ADMITAD_HOLD): ?>

                                    <span class="attribute-badge hold-badge">
                                        <i class="fas fa-check-circle me-1"></i> Hold
                                    </span>
                                <?php else: ?>
                                        <span class="attribute-badge danger-badge">
                                            <i class="fas fa-check-circle me-1"></i> Not Joined
                                        </span>
                                <?php endif; ?>

                            <?php endif; ?>

                        </div>
                    </div>
                </button>
            </h2>
            <div id="<?php echo e($advertiser->sid); ?>" class="accordion-collapse collapse" aria-labelledby="heading1" data-bs-parent="#advertisersAccordion">
                <div class="accordion-body">
                    <div class="advertiser-details">
                        <div class="advertiser-logo">
                                <?php
                                    $fetch = \App\Models\Advertiser::find($advertiser->id);
                                ?>

                                <?php if(!empty($fetch->fetch_logo_url)): ?>
                                <img loading="lazy" class="ap-img__main h-auto mr-10" src="<?php echo e($fetch->fetch_logo_url); ?>" alt="<?php echo e($advertiser->name); ?>" style="width: 60px">
                                <?php elseif(!empty($advertiser->logo)): ?>
                                <img loading="lazy" class="ap-img__main h-auto mr-10" src="<?php echo e(\App\Helper\Static\Methods::staticAsset("$advertiser->logo")); ?>" alt="<?php echo e($advertiser->name); ?>" style="width: 60px">
                                <?php else: ?>
                                <img loading="lazy" class="ap-img__main h-auto mr-10" src="<?php echo e(\App\Helper\Static\Methods::isImageShowable($advertiser->logo)); ?>" alt="<?php echo e($advertiser->name); ?>" style="width: 60px">
                                <?php endif; ?>
                        </div>
                        <div>
                            
                            <div class="detail-item">
                                <span class="detail-label">Website:</span>
                                <a href="<?php echo e($advertiser->url); ?>" class="website-link"><?php echo e($advertiser->url); ?></a>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">APC Days:</span>
                                <span>
                                    <?php if($advertiser->average_payment_time): ?>
                                        <?php echo e($advertiser->average_payment_time); ?> days
                                    <?php else: ?>
                                        30 days
                                    <?php endif; ?>
                                </span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Country:</span>
                                <span>
                                    <?php
                                        $regions = [];
                                        if(is_string($advertiser->primary_regions))
                                        {
                                            $regions = json_decode($advertiser->primary_regions);
                                        }
                                        elseif (is_array($advertiser->primary_regions))
                                        {
                                            $regions = $advertiser->primary_regions;
                                        }
                                        if(count($regions) > 1) {
                                            $regions = "Multi";
                                        } elseif (count($regions) == 1 && $regions[0] == "00") {
                                            $regions = "All";
                                        } elseif (count($regions) == 1) {
                                            $regions = $regions[0]. " Region";
                                        } else {
                                            $regions = "N/A";
                                        }
                                    ?>
                                    <?php echo e($regions); ?>

                                </span>
                            </div>
                            
                            <div class="mt-3">
                                <a href="<?php echo e(route("publisher.view-advertiser", ['sid' => $advertiser->sid])); ?>" class="contact-btn">
                                    <i class="fas fa-arrow-right me-1"></i> Show More
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
        <div class="card">
            <div class="card-body">
                <h6 class="text-center">Advertiser Data Not Exist</h6>
            </div>
        </div>
        <?php endif; ?>
</div>



<?php echo $__env->make("template.publisher.widgets.loader", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php if(count($advertisers) && $advertisers instanceof \Illuminate\Pagination\LengthAwarePaginator ): ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-sm-end justify-content-start mt-1 mb-30">

                <?php echo e($advertisers->withQueryString()->links()); ?>


            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\Users\lenovo\Downloads\application\resources\views/template/publisher/advertisers/advertiser-list.blade.php ENDPATH**/ ?>