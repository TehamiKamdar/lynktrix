<nav class="atbd-page mt-3">
    <ul class="atbd-pagination d-flex" id="publisherPagination">
        <?php if($paginator->hasPages()): ?>
            
            <?php if($paginator->onFirstPage()): ?>
                <li class="atbd-pagination__item disabled" aria-disabled="true" aria-label="<?php echo app('translator')->get('pagination.previous'); ?>">
                    <span class="atbd-pagination__link pagination-control" aria-hidden="true">&lsaquo;</span>
                </li>
            <?php else: ?>
                <li class="atbd-pagination__item">
                    <a class="atbd-pagination__link pagination-control" href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev" aria-label="<?php echo app('translator')->get('pagination.previous'); ?>">&lsaquo;</a>
                </li>
            <?php endif; ?>

            
            <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                <?php if(is_string($element)): ?>
                    <li class="atbd-pagination__item disabled" aria-disabled="true"><span class="atbd-pagination__link"><?php echo e($element); ?></span></li>
                <?php endif; ?>

                
                <?php if(is_array($element)): ?>
                    <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($page == $paginator->currentPage()): ?>
                            <li class="atbd-pagination__item" aria-current="page"><span class="atbd-pagination__link active"><?php echo e($page); ?></span></li>
                        <?php else: ?>
                            <li class="atbd-pagination__item"><a class="atbd-pagination__link" href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            
            <?php if($paginator->hasMorePages()): ?>
                <li class="atbd-pagination__item">
                    <a class="atbd-pagination__link" href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next" aria-label="<?php echo app('translator')->get('pagination.next'); ?>">&rsaquo;</a>
                </li>
            <?php else: ?>
                <li class="atbd-pagination__item disabled" aria-disabled="true" aria-label="<?php echo app('translator')->get('pagination.next'); ?>">
                    <span class="atbd-pagination__link" aria-hidden="true">&rsaquo;</span>
                </li>
            <?php endif; ?>
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

            <li class="ml-2 atbd-pagination__item">
                <div class="paging-option">
                    <?php if(request()->route()->getName() == "publisher.find-advertisers" || request()->route()->getName() == "publisher.own-advertisers"): ?>
                        <?php
                            $limit = \App\Helper\Static\Vars::DEFAULT_PUBLISHER_ADVERTISER_PAGINATION;
                            if(session()->has('publisher_advertiser_limit')) {
                                $limit = session()->get('publisher_advertiser_limit');
                            }
                        ?>
                    <?php elseif(request()->route()->getName() == "publisher.reports.transactions.list"): ?>
                        <?php
                            $limit = \App\Helper\Static\Vars::DEFAULT_PUBLISHER_TRANSACTION_PAGINATION;
                            if(session()->has('publisher_transaction_limit')) {
                                $limit = session()->get('publisher_transaction_limit');
                            }
                        ?>
                    <?php elseif(request()->route()->getName() == "publisher.reports.performance-by-transactions.list"): ?>
                        <?php
                            $limit = \App\Helper\Static\Vars::DEFAULT_PUBLISHER_EARNING_PERFORMANCE_PAGINATION;
                            if(session()->has('publisher_earning_performance_limit')) {
                                $limit = session()->get('publisher_earning_performance_limit');
                            }
                        ?>
                    <?php elseif(request()->route()->getName() == "publisher.reports.performance-by-clicks.list"): ?>
                        <?php
                            $limit = \App\Helper\Static\Vars::DEFAULT_PUBLISHER_EARNING_PERFORMANCE_PAGINATION;
                            if(session()->has('publisher_click_performance_limit')) {
                                $limit = session()->get('publisher_click_performance_limit');
                            }
                        ?>
                    <?php elseif(request()->route()->getName() == "publisher.creatives.coupons.list"): ?>
                        <?php
                            $limit = \App\Helper\Static\Vars::DEFAULT_PUBLISHER_COUPON_PAGINATION;
                            if(session()->has('publisher_coupon_limit')) {
                                $limit = session()->get('publisher_coupon_limit');
                            }
                        ?>
                    <?php elseif(request()->route()->getName() == "publisher.creatives.text-links.list"): ?>
                        <?php
                            $limit = \App\Helper\Static\Vars::DEFAULT_PUBLISHER_COUPON_PAGINATION;
                            if(session()->has('publisher_text_link_limit')) {
                                $limit = session()->get('publisher_text_link_limit');
                            }
                        ?>
                    <?php endif; ?>
                    <select name="limit" id="limit" class="page-selection">
                        <option value="10" <?php if($limit == "10"): ?> selected <?php endif; ?>>10/page</option>
                        <option value="20" <?php if($limit == "20"): ?> selected <?php endif; ?>>20/page</option>
                        <option value="40" <?php if($limit == "40"): ?> selected <?php endif; ?>>40/page</option>
                        <option value="60" <?php if($limit == "60"): ?> selected <?php endif; ?>>60/page</option>
                    </select>
                </div>
            </li>
        <?php endif; ?>
    </ul>
</nav>
<?php /**PATH C:\xampp\htdocs\tech\resources\views/vendor/pagination/default.blade.php ENDPATH**/ ?>