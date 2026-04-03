<!-- Start Table Responsive -->

<!-- Table Responsive End -->

<style>
    .accordion-item {
        border: none;
        margin-bottom: 10px;
        overflow: hidden;
        box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.08);
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
        content: "\f078";
        /* Chevron down icon */
        font-weight: 900;
        transform: rotate(0deg);
        transition: transform 0.3s;
    }

    .accordion-button:not(.collapsed)::after {
        content: "\f077";
        /* Chevron up icon */
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
    }

    .premium-badge {
        background-color: #e6e6e6;
        color: #000000;
        border: 1px solid #505050;
    }

    .danger-badge {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    .hold-badge {
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
        gap: 0.5rem !important;
    }

    .detail-item a{
        min-width: 500px
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
<div class="accordion" id="linksAccordion">
    <?php if(count($links)): ?>
        <?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <!-- Advertiser 1 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading1">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#<?php echo e($link->sid); ?>" aria-expanded="true" aria-controls="collapse1">
                        <div class="d-flex justify-content-between align-items-center w-100 me-3">
                            <span class="advertiser-name">
                                <i class="fas fa-building me-2"></i> <?php echo e($link->name); ?>

                            </span>
                        </div>
                    </button>
                </h2>
                <div id="<?php echo e($link->sid); ?>" class="accordion-collapse collapse" aria-labelledby="heading1"
                    data-bs-parent="#linksAccordion">
                    <div class="accordion-body">
                        <div class="advertiser-details">
                            <div class="advertiser-logo">
                                <?php
                                    $fetch = \App\Models\Advertiser::find($link->id);
                                ?>
                                <?php if(!empty($fetch->fetch_logo_url)): ?>

                                    <img loading="lazy" class="ap-img__main h-auto mr-10" src="<?php echo e($fetch->fetch_logo_url); ?>"
                                        alt="<?php echo e($link->name); ?>" style="width: 60px">
                                <?php elseif(!empty($link->logo)): ?>
                                    <img loading="lazy" class="ap-img__main h-auto mr-10"
                                        src="<?php echo e(\App\Helper\Static\Methods::staticAsset("$link->logo")); ?>"
                                        alt="<?php echo e($link->name); ?>" style="width: 60px">
                                <?php else: ?>
                                    <img loading="lazy" class="ap-img__main h-auto mr-10"
                                        src="<?php echo e(\App\Helper\Static\Methods::isImageShowable($link->logo)); ?>"
                                        alt="<?php echo e($link->name); ?>" style="width: 60px">
                                <?php endif; ?>
                            </div>
                            <div>
                                
                                <div class="detail-item">
                                    <span class="detail-label">Website:</span>
                                    <a href="<?php echo e($link->url); ?>" class="website-link"><?php echo e($link->url); ?></a>
                                </div>
                                <div class="detail-item">
                                    <span class="detail-label">Short Link:</span>

                                    <a href="<?php echo e($link->tracking_url); ?>" target="_blank" id="shortLink">
                                        <?php echo e($link->tracking_url ?? "-"); ?>

                                    </a>

                                    <?php if($link->tracking_url): ?>
                                        <button type="button" class="btn btn-copy" onclick="copyText(this, '<?php echo e($link->tracking_url); ?>')">
                                            Copy
                                        </button>
                                    <?php endif; ?>
                                </div>

                                <div class="detail-item">
                                    <span class="detail-label">Tracking Link:</span>

                                    <a href="<?php echo e($link->tracking_url_long); ?>" target="_blank" id="longLink">
                                        <?php echo e($link->tracking_url_long ?? "-"); ?>

                                    </a>

                                    <?php if($link->tracking_url_long): ?>
                                        <button type="button" class="btn btn-copy" onclick="copyText(this, '<?php echo e($link->tracking_url_long); ?>')">
                                            Copy
                                        </button>
                                    <?php endif; ?>
                                </div>

                                <div class="detail-item">
                                    <span class="detail-label">Sub ID:</span>
                                    <span><?php echo e($link->sub_id ?? "-"); ?></span>
                                </div>
                                <div class="mt-3">
                                    <a href="<?php echo e(route("publisher.view-advertiser", ['sid' => $link->sid])); ?>"
                                        class="contact-btn">
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

<?php if(count($links) && $links instanceof \Illuminate\Pagination\LengthAwarePaginator): ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-sm-end justify-content-star mt-1 mb-30 border-top">

                <?php echo e($links->withQueryString()->links()); ?>


            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\Users\lenovo\Downloads\application\resources\views/template/publisher/creatives/text-links/list_view.blade.php ENDPATH**/ ?>