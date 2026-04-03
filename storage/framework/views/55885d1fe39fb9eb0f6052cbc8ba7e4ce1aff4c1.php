    <!-- Custom styles -->
    <style>
        .card-overview-progress .card-header {
            min-height: 130px;
        }
    </style>
    <!-- Custom Styles  -->

    <div class="contents">

        <div class="container-fluid <?php if(Session::has('notify-warning')): ?> <?php else: ?> mt-2 <?php endif; ?>">

            <?php echo $__env->make("template.publisher.widgets.profile_completion_percentage", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="row">

                <div class="col-lg-12 mt-4 mb-3">
                    <?php echo $__env->make("partial.publisher.alert", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

                <div class="col-xxl-4 col-lg-5 m-bottom-30">
                    <?php echo $__env->make("template.publisher.widgets.earning_overview", compact('earningOverview'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="col-xxl-8 col-lg-7 m-bottom-30">
                    <?php echo $__env->make("template.publisher.widgets.performance_overview", compact('performanceOverview'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="col-xxl-4  col-lg-4 col-sm-12 m-bottom-30">
                    <?php echo $__env->make("template.publisher.widgets.account_summary", compact('accountSummary'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="col-xxl-4  col-lg-4 col-sm-12 m-bottom-30">
                    <?php echo $__env->make("template.publisher.widgets.top_advertisers_by_sales", compact('topSales'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="col-xxl-4  col-lg-4 col-sm-12 m-bottom-30">
                    <?php echo $__env->make("template.publisher.widgets.top_advertisers_by_clicks", compact('topClicks'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="col-xxl-4 col-lg-4 col-sm-12 m-bottom-30">
                    <?php echo $__env->make("template.publisher.widgets.deeplink", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="col-xxl-8 col-lg-8 col-sm-12 m-bottom-30">
                    <?php echo $__env->make("template.publisher.advertisers.advertiser-list", compact('advertisers'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>

    </div>

<?php /**PATH C:\xampp\htdocs\tech\resources\views/template/publisher/dashboard/active.blade.php ENDPATH**/ ?>