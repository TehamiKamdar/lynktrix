<style>
    li {
        list-style: none;
    }

    .pagination {
        gap: 6px;
        margin-bottom: 0;
    }

    /* Base page link */
    .pagination .page-link {
        color: #C22437;
        background-color: #fff;
        border: 1px solid #eee;
        border-radius: 8px;
        min-width: 34px;
        height: 34px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        transition: all 0.2s ease;
        box-shadow: none;
    }

    /* Hover */
    .pagination .page-link:hover {
        background-color: #C22437;
        color: #fff;
        border-color: #C22437;
    }

    /* Active page */
    .pagination .page-item.active .page-link {
        background-color: #C22437;
        color: #fff;
        border-color: #C22437;
    }

    /* Disabled */
    .pagination .page-item.disabled .page-link {
        color: #cfcfcf;
        background-color: #f9f9f9;
        border-color: #eee;
        pointer-events: none;
    }

    /* Focus remove bootstrap blue glow */
    .pagination .page-link:focus {
        box-shadow: none;
    }

    /* Limit dropdown */
    .page-selection {
        border-radius: 8px;
        border: 1px solid #eee;
        height: 34px;
        font-size: 13px;
        color: #333;
    }

    .page-selection:focus {
        border-color: #C22437;
        box-shadow: none;
    }
</style>

<nav class="mt-4">
    <ul class="pagination d-flex align-items-center" id="publisherPagination">

        <?php if($paginator->hasPages()): ?>

            
            <li class="page-item <?php echo e($paginator->onFirstPage() ? 'disabled' : ''); ?>">
                <?php if($paginator->onFirstPage()): ?>
                    <span class="page-link">
                        <i class="fas fa-chevron-left"></i>
                    </span>
                <?php else: ?>
                    <a class="page-link" href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                <?php endif; ?>
            </li>

            
            <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                
                <?php if(is_string($element)): ?>
                    <li class="page-item disabled">
                        <span class="page-link"><?php echo e($element); ?></span>
                    </li>
                <?php endif; ?>

                
                <?php if(is_array($element)): ?>
                    <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php if($page == $paginator->currentPage()): ?>
                            <li class="page-item active" aria-current="page">
                                <span class="page-link"><?php echo e($page); ?></span>
                            </li>
                        <?php else: ?>
                            <li class="page-item">
                                <a class="page-link" href="<?php echo e($url); ?>"><?php echo e($page); ?></a>
                            </li>
                        <?php endif; ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            
            <li class="page-item <?php echo e(!$paginator->hasMorePages() ? 'disabled' : ''); ?>">
                <?php if($paginator->hasMorePages()): ?>
                    <a class="page-link" href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                <?php else: ?>
                    <span class="page-link">
                        <i class="fas fa-chevron-right"></i>
                    </span>
                <?php endif; ?>
            </li>

        <?php endif; ?>

        
        <?php if(
                request()->route()->getName() == "publisher.reports.transactions.list"
                || request()->route()->getName() == "publisher.find-advertisers"
                || request()->route()->getName() == "publisher.own-advertisers"
                || request()->route()->getName() == "publisher.reports.performance-by-transactions.list"
                || request()->route()->getName() == "publisher.reports.performance-by-clicks.list"
                || request()->route()->getName() == "publisher.creatives.coupons.list"
                || request()->route()->getName() == "publisher.creatives.text-links.list"
            ): ?>
            <li class="ms-2">
                <div class="paging-option">

                    <?php if(request()->route()->getName() == "publisher.find-advertisers" || request()->route()->getName() == "publisher.own-advertisers"): ?>
                        <?php
                            $limit = \App\Helper\Static\Vars::DEFAULT_PUBLISHER_ADVERTISER_PAGINATION;
                            if (session()->has('publisher_advertiser_limit')) {
                                $limit = session()->get('publisher_advertiser_limit');
                            }
                        ?>

                    <?php elseif(request()->route()->getName() == "publisher.reports.transactions.list"): ?>
                        <?php
                            $limit = \App\Helper\Static\Vars::DEFAULT_PUBLISHER_TRANSACTION_PAGINATION;
                            if (session()->has('publisher_transaction_limit')) {
                                $limit = session()->get('publisher_transaction_limit');
                            }
                        ?>

                    <?php elseif(request()->route()->getName() == "publisher.reports.performance-by-transactions.list"): ?>
                        <?php
                            $limit = \App\Helper\Static\Vars::DEFAULT_PUBLISHER_EARNING_PERFORMANCE_PAGINATION;
                            if (session()->has('publisher_earning_performance_limit')) {
                                $limit = session()->get('publisher_earning_performance_limit');
                            }
                        ?>

                    <?php elseif(request()->route()->getName() == "publisher.reports.performance-by-clicks.list"): ?>
                        <?php
                            $limit = \App\Helper\Static\Vars::DEFAULT_PUBLISHER_EARNING_PERFORMANCE_PAGINATION;
                            if (session()->has('publisher_click_performance_limit')) {
                                $limit = session()->get('publisher_click_performance_limit');
                            }
                        ?>

                    <?php elseif(request()->route()->getName() == "publisher.creatives.coupons.list"): ?>
                        <?php
                            $limit = \App\Helper\Static\Vars::DEFAULT_PUBLISHER_COUPON_PAGINATION;
                            if (session()->has('publisher_coupon_limit')) {
                                $limit = session()->get('publisher_coupon_limit');
                            }
                        ?>

                    <?php elseif(request()->route()->getName() == "publisher.creatives.text-links.list"): ?>
                        <?php
                            $limit = \App\Helper\Static\Vars::DEFAULT_PUBLISHER_COUPON_PAGINATION;
                            if (session()->has('publisher_text_link_limit')) {
                                $limit = session()->get('publisher_text_link_limit');
                            }
                        ?>
                    <?php endif; ?>

                    <select name="limit" id="limit" class="form-select form-select-sm page-selection" style="width:auto;">
                        <option value="10" <?php if($limit == 10): echo 'selected'; endif; ?>>10/page</option>
                        <option value="20" <?php if($limit == 20): echo 'selected'; endif; ?>>20/page</option>
                        <option value="40" <?php if($limit == 40): echo 'selected'; endif; ?>>40/page</option>
                        <option value="60" <?php if($limit == 60): echo 'selected'; endif; ?>>60/page</option>
                    </select>

                </div>
            </li>
        <?php endif; ?>

    </ul>
</nav><?php /**PATH D:\lynktrix\resources\views/vendor/pagination/default.blade.php ENDPATH**/ ?>