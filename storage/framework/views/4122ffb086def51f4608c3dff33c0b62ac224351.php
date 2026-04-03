<div class="card broder-0 mb-20">
    <div class="card-body pt-0" id="performanceCardContent">
        <div class="tab-content perfomence-tab-wrap" id="performanceTabWrapper">
            <div class="tab-pane fade active show" id="w_perfomence-year" role="tabpanel" aria-labelledby="w_perfomence-year">
                <div class="performance-stats nav-tabs nav">
                    <a href="#commission" class="active" data-toggle="tab" id="commission-tab" role="tab" area-controls="commission" aria-selected="false">
                        <?php if(request()->start_date && request()->end_date): ?>
                            <div class="performance-stats__down">
                                <span>Total Commissions</span>
                                <strong>
                                    <?php echo e($performanceOverview['commission']['count'] ?? 0); ?>

                                </strong>
                            </div>
                        <?php else: ?>
                            <?php if(isset($performanceOverview['commission']['growth']) && $performanceOverview['commission']['growth'] == "up"): ?>
                                <div class="performance-stats__up">
                                    <span>Total Commissions</span>
                                    <strong>
                                        <?php echo e($performanceOverview['commission']['count'] ?? 0); ?>

                                        <sub>
                                            <i class="la la-arrow-up"></i>
                                            <?php echo e($performanceOverview['commission']['percentage'] ?? 0); ?>

                                        </sub>
                                    </strong>
                                </div>
                            <?php else: ?>
                                <div class="performance-stats__down">
                                    <span>Total Commissions</span>
                                    <strong>
                                        <?php echo e($performanceOverview['commission']['count'] ?? 0); ?>

                                        <sub>
                                            <i class="la la-arrow-down"></i>
                                            <?php echo e($performanceOverview['commission']['percentage'] ?? 0); ?>

                                        </sub>
                                    </strong>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </a>
<?php
    $commissionPercent = (float) \App\Helper\Static\Vars::COMMISSION_PERCENTAGE / 100;
    $rawValue = $performanceOverview['commission']['count'] ?? 0;

    // Extract numeric part
    preg_match('/([\d\.]+)/', $rawValue, $matches);
    $number = (float) ($matches[1] ?? 0);

    // Check for suffix (k, m, etc.)
    $suffix = '';
    if (stripos($rawValue, 'k') !== false) {
        $number *= 1000;
        $suffix = 'k';
    } elseif (stripos($rawValue, 'm') !== false) {
        $number *= 1000000;
        $suffix = 'm';
    }

    $calculated = $commissionPercent * $number;

    // Format result with suffix again
    if ($suffix === 'k') {
        $calculated = round($calculated / 1000, 1) . 'k';
    } elseif ($suffix === 'm') {
        $calculated = round($calculated / 1000000, 1) . 'm';
    }
?>
                     <a href="#commission" class="active" data-toggle="tab" id="commission-revenue-tab" role="tab" area-controls="commission" aria-selected="false">
                        <?php if(request()->start_date && request()->end_date): ?>
                            <div class="performance-stats__down">
                                <span>Total Revenue</span>
                                <strong>
                                   <?php echo e($calculated); ?>

                                </strong>
                            </div>
                        <?php else: ?>
                            <?php if(isset($performanceOverview['commission']['growth']) && $performanceOverview['commission']['growth'] == "up"): ?>
                                <div class="performance-stats__up">
                                    <span>Total Revenue</span>
                                    <strong>
                                      <?php echo e($calculated); ?>

                                        <sub>
                                            <i class="la la-arrow-up"></i>
                                            <?php echo e($performanceOverview['commission']['percentage'] ?? 0); ?>

                                        </sub>
                                    </strong>
                                </div>
                            <?php else: ?>
                                <div class="performance-stats__down">
                                    <span>Total Revenue</span>
                                    <strong>
<?php echo e($calculated); ?>

                                        <sub>
                                            <i class="la la-arrow-down"></i>
                                            <?php echo e($performanceOverview['commission']['percentage'] ?? 0); ?>

                                        </sub>
                                    </strong>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </a>

                    <a href="#approvedcommission" data-toggle="tab" id="approved-commission-tab" role="tab" area-controls="approvedcommission" aria-selected="false">
                        <?php if(request()->start_date && request()->end_date): ?>
                            <div class="performance-stats__down">
                                <span>Total Approved Commissions</span>
                                <strong>
                                    <?php echo e($performanceOverview['approved']['count'] ?? 0); ?>

                                </strong>
                            </div>
                        <?php else: ?>
                            <?php if(isset($performanceOverview['approved']['growth']) && $performanceOverview['approved']['growth'] == "up"): ?>
                                <div class="performance-stats__up">
                                    <span>Total Approved Commissions</span>
                                    <strong>
                                        <?php echo e($performanceOverview['approved']['count'] ?? 0); ?>

                                        <sub>
                                            <i class="la la-arrow-up"></i>
                                            <?php echo e($performanceOverview['approved']['percentage'] ?? 0); ?>

                                        </sub>
                                    </strong>
                                </div>
                            <?php else: ?>
                                <div class="performance-stats__down">
                                    <span>Total Approved Commissions</span>
                                    <strong>
                                        <?php echo e($performanceOverview['approved']['count'] ?? 0); ?>

                                        <sub>
                                            <i class="la la-arrow-down"></i>
                                            <?php echo e($performanceOverview['approved']['percentage'] ?? 0); ?>

                                        </sub>
                                    </strong>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </a>

                    <a href="#pendingcommission" data-toggle="tab" id="pending-commission-tab" role="tab" area-controls="pendingcommission" aria-selected="false">
                        <?php if(request()->start_date && request()->end_date): ?>
                            <div class="performance-stats__down">
                                <span>Total Pending Commissions</span>
                                <strong>
                                    <?php echo e($performanceOverview['pending']['count'] ?? 0); ?>

                                </strong>
                            </div>
                        <?php else: ?>
                            <?php if(isset($performanceOverview['pending']['growth']) && $performanceOverview['pending']['growth'] == "up"): ?>
                                <div class="performance-stats__up">
                                    <span>Total Pending Commissions</span>
                                    <strong>
                                        <?php echo e($performanceOverview['pending']['count'] ?? 0); ?>

                                        <sub>
                                            <i class="la la-arrow-up"></i>
                                            <?php echo e($performanceOverview['pending']['percentage'] ?? 0); ?>

                                        </sub>
                                    </strong>
                                </div>
                            <?php else: ?>
                                <div class="performance-stats__down">
                                    <span>Total Pending Commissions</span>
                                    <strong>
                                        <?php echo e($performanceOverview['pending']['count'] ?? 0); ?>

                                        <sub>
                                            <i class="la la-arrow-down"></i>
                                            <?php echo e($performanceOverview['pending']['percentage'] ?? 0); ?>

                                        </sub>
                                    </strong>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </a>

                     <a href="#declinedcommission" data-toggle="tab" id="declined-commission-tab" role="tab" area-controls="declinedcommission" aria-selected="false">
                        <?php if(request()->start_date && request()->end_date): ?>
                            <div class="performance-stats__down">
                                <span>Total Declined Commissions</span>
                                <strong>
                                    <?php echo e($performanceOverview['declined']['count'] ?? 0); ?>

                                </strong>
                            </div>
                        <?php else: ?>
                            <?php if(isset($performanceOverview['declined']['growth']) && $performanceOverview['declined']['growth'] == "up"): ?>
                                <div class="performance-stats__up">
                                    <span>Total Declined Commissions</span>
                                    <strong>
                                        <?php echo e($performanceOverview['declined']['count'] ?? 0); ?>

                                        <sub>
                                            <i class="la la-arrow-up"></i>
                                            <?php echo e($performanceOverview['declined']['percentage'] ?? 0); ?>

                                        </sub>
                                    </strong>
                                </div>
                            <?php else: ?>
                                <div class="performance-stats__down">
                                    <span>Total Declined Commissions</span>
                                    <strong>
                                        <?php echo e($performanceOverview['declined']['count'] ?? 0); ?>

                                        <sub>
                                            <i class="la la-arrow-down"></i>
                                            <?php echo e($performanceOverview['declined']['percentage'] ?? 0); ?>

                                        </sub>
                                    </strong>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </a>

                    <a href="#transaction" data-toggle="tab" id="transaction-tab" role="tab" area-controls="transaction" aria-selected="false">
                        <?php if(request()->start_date && request()->end_date): ?>
                            <div class="performance-stats__down">
                                <span>Total Transactions</span>
                                <strong>
                                    <?php echo e($performanceOverview['transaction']['count'] ?? 0); ?>

                                </strong>
                            </div>
                        <?php else: ?>
                            <?php if(isset($performanceOverview['transaction']['growth']) && $performanceOverview['transaction']['growth'] == "up"): ?>
                                <div class="performance-stats__up">
                                    <span>Total Transactions</span>
                                    <strong>
                                        <?php echo e($performanceOverview['transaction']['count'] ?? 0); ?>

                                        <sub>
                                            <i class="la la-arrow-up"></i>
                                            <?php echo e($performanceOverview['transaction']['percentage'] ?? 0); ?>

                                        </sub>
                                    </strong>
                                </div>
                            <?php else: ?>
                                <div class="performance-stats__down">
                                    <span>Total Transactions</span>
                                    <strong>
                                        <?php echo e($performanceOverview['transaction']['count'] ?? 0); ?>

                                        <sub>
                                            <i class="la la-arrow-down"></i>
                                            <?php echo e($performanceOverview['transaction']['percentage'] ?? 0); ?>

                                        </sub>
                                    </strong>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </a>

                    <a href="#sale" data-toggle="tab" id="sale-tab" role="tab" area-controls="sale" aria-selected="true">
                        <?php if(request()->start_date && request()->end_date): ?>
                            <div class="performance-stats__down">
                                <span>Total Sales</span>
                                <strong>
                                    <?php echo e($performanceOverview['sale']['count'] ?? 0); ?>

                                </strong>
                            </div>
                        <?php else: ?>
                            <?php if(isset($performanceOverview['sale']['growth']) && $performanceOverview['sale']['growth'] == "up"): ?>
                                <div class="performance-stats__up">
                                    <span>Total Sales</span>
                                    <strong>
                                        <?php echo e($performanceOverview['sale']['count'] ?? 0); ?>

                                        <sub>
                                            <i class="la la-arrow-up"></i>
                                            <?php echo e($performanceOverview['sale']['percentage'] ?? 0); ?>

                                        </sub>
                                    </strong>
                                </div>
                            <?php else: ?>
                                <div class="performance-stats__down">
                                    <span>Total Sales</span>
                                    <strong>
                                        <?php echo e($performanceOverview['sale']['count'] ?? 0); ?>

                                        <sub>
                                            <i class="la la-arrow-down"></i>
                                            <?php echo e($performanceOverview['sale']['percentage'] ?? 0); ?>

                                        </sub>
                                    </strong>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </a>



































                </div>
                <!-- ends: .performance-stats -->

                <div class="wp-chart perfomence-chart">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="commission" role="tabpanel" aria-labelledby="commission-tab">
                            <div class="parentContainer">
                                <div id="commissionChartContent">
                                    <canvas id="commissionChart"></canvas>
                                </div>
                            </div>
                            <ul class="legend-static" id="commissionPeriodContent">
                                <li class="custom-label">
                                    <span style="background-color: rgb(95, 99, 242);"></span>Current Period
                                </li>
                                <li class="custom-label">
                                    <span style="background-color: #C6D0DC"></span>Previous Period
                                </li>
                            </ul>
                        </div>

                        <div class="tab-pane fade" id="pendingcommission" role="tabpanel" aria-labelledby="pending-commission-tab">
                            <div class="parentContainer">
                                <div id="pendingcommissionChartContent">
                                    <canvas id="pendingcommissionChart"></canvas>
                                </div>
                            </div>
                            <ul class="legend-static" id="pendingcommissionPeriodContent">
                                <li class="custom-label">
                                    <span style="background-color: rgb(95, 99, 242);"></span>Current Period
                                </li>
                                <li class="custom-label">
                                    <span style="background-color: #C6D0DC"></span>Previous Period
                                </li>
                            </ul>
                        </div>


                        <div class="tab-pane fade" id="declinedcommission" role="tabpanel" aria-labelledby="declined-commission-tab">
                            <div class="parentContainer">
                                <div id="declinedcommissionChartContent">
                                    <canvas id="declinedcommissionChart"></canvas>
                                </div>
                            </div>
                            <ul class="legend-static" id="declinedcommissionPeriodContent">
                                <li class="custom-label">
                                    <span style="background-color: rgb(95, 99, 242);"></span>Current Period
                                </li>
                                <li class="custom-label">
                                    <span style="background-color: #C6D0DC"></span>Previous Period
                                </li>
                            </ul>
                        </div>

                        <div class="tab-pane fade" id="approvedcommission" role="tabpanel" aria-labelledby="approved-commission-tab">
                            <div class="parentContainer">
                                <div id="approvedcommissionChartContent">
                                    <canvas id="approvedcommissionChart"></canvas>
                                </div>
                            </div>
                            <ul class="legend-static" id="approvedcommissionPeriodContent">
                                <li class="custom-label">
                                    <span style="background-color: rgb(95, 99, 242);"></span>Current Period
                                </li>
                                <li class="custom-label">
                                    <span style="background-color: #C6D0DC"></span>Previous Period
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="transaction" role="tabpanel" aria-labelledby="transaction-tab">
                            <div class="parentContainer" id="transactionChartContent">
                                <div>
                                    <canvas id="transactionChart"></canvas>
                                </div>
                            </div>
                            <ul class="legend-static" id="transactionPeriodContent">
                                <li class="custom-label">
                                    <span style="background-color: rgb(95, 99, 242);"></span>Current Period
                                </li>
                                <li class="custom-label">
                                    <span style="background-color: #C6D0DC"></span>Previous Period
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="sale" role="tabpanel" aria-labelledby="sale-tab">
                            <div class="parentContainer" id="saleChartContent">
                                <div>
                                    <canvas id="saleChart"></canvas>
                                </div>
                            </div>
                            <ul class="legend-static" id="salePeriodContent">
                                <li class="custom-label">
                                    <span style="background-color: rgb(95, 99, 242);"></span>Current Period
                                </li>
                                <li class="custom-label">
                                    <span style="background-color: #C6D0DC"></span>Previous Period
                                </li>
                            </ul>
                        </div>















                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ends: .card-body -->
</div>

<?php $__env->startPush("extended_scripts"); ?>
    <script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/js/Chart.min.js")); ?>"></script>
    <script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/js/charts.js")); ?>"></script>

    <script>

        function commissionChartLine()
        {
            let labels = <?php echo json_encode($performanceOverview['extra']['labels'] ?? [], 15, 512) ?>;

            <?php if(request()->start_date && request()->end_date): ?>
                let data = <?php echo json_encode($performanceOverview['commission']['commission'] ?? [], 15, 512) ?>;
                chartjsLineChartFive(
                    "commissionChart",
                    "#FA8B0C",
                    "45",
                    (data = data),
                    labels = labels,
                    <?php echo e($performanceOverview['commission']['min_value'] ?? 0); ?>,
                    <?php echo e($performanceOverview['commission']['max_value'] ?? 0); ?>

                );
                $("#commissionPeriodContent").html(`
                    <li class="custom-label">
                        <span style="background-color: rgb(95, 99, 242);"></span>Custom Period
                    </li>
                `)
            <?php else: ?>
                let currentMonth = <?php echo json_encode($performanceOverview['commission']['dailyCurrentMonth'] ?? [], 15, 512) ?>;
                let previousMonth = <?php echo json_encode($performanceOverview['commission']['dailyPreviousMonth'] ?? [], 15, 512) ?>;
                chartjsLineChartFour(
                    "commissionChart",
                    "#FA8B0C",
                    "45",
                    (data = currentMonth),
                    (data = previousMonth),
                    labels = labels,
                    <?php echo e($performanceOverview['commission']['min_value'] ?? 0); ?>,
                    <?php echo e($performanceOverview['commission']['max_value'] ?? 0); ?>

                );
            <?php endif; ?>
        }


          function approvedcommissionChartLine()
        {
            let labels = <?php echo json_encode($performanceOverview['extra']['labels'] ?? [], 15, 512) ?>;

            <?php if(request()->start_date && request()->end_date): ?>
                let data = <?php echo json_encode($performanceOverview['approved']['commission'] ?? [], 15, 512) ?>;
                chartjsLineChartFive(
                    "approvedcommissionChart",
                    "#FA8B0C",
                    "45",
                    (data = data),
                    labels = labels,
                    <?php echo e($performanceOverview['approved']['min_value'] ?? 0); ?>,
                    <?php echo e($performanceOverview['approved']['max_value'] ?? 0); ?>

                );
                $("#approvedcommissionPeriodContent").html(`
                    <li class="custom-label">
                        <span style="background-color: rgb(95, 99, 242);"></span>Custom Period
                    </li>
                `)
            <?php else: ?>
                let currentMonth = <?php echo json_encode($performanceOverview['approved']['dailyCurrentMonth'] ?? [], 15, 512) ?>;
                let previousMonth = <?php echo json_encode($performanceOverview['approved']['dailyPreviousMonth'] ?? [], 15, 512) ?>;
                chartjsLineChartFour(
                    "approvedcommissionChart",
                    "#FA8B0C",
                    "45",
                    (data = currentMonth),
                    (data = previousMonth),
                    labels = labels,
                    <?php echo e($performanceOverview['approved']['min_value'] ?? 0); ?>,
                    <?php echo e($performanceOverview['approved']['max_value'] ?? 0); ?>

                );
            <?php endif; ?>
        }



          function pendingcommissionChartLine()
        {
            let labels = <?php echo json_encode($performanceOverview['extra']['labels'] ?? [], 15, 512) ?>;

            <?php if(request()->start_date && request()->end_date): ?>
                let data = <?php echo json_encode($performanceOverview['pending']['commission'] ?? [], 15, 512) ?>;
                chartjsLineChartFive(
                    "pendingcommissionChart",
                    "#FA8B0C",
                    "45",
                    (data = data),
                    labels = labels,
                    <?php echo e($performanceOverview['pending']['min_value'] ?? 0); ?>,
                    <?php echo e($performanceOverview['pending']['max_value'] ?? 0); ?>

                );
                $("#pendingcommissionPeriodContent").html(`
                    <li class="custom-label">
                        <span style="background-color: rgb(95, 99, 242);"></span>Custom Period
                    </li>
                `)
            <?php else: ?>
                let currentMonth = <?php echo json_encode($performanceOverview['pending']['dailyCurrentMonth'] ?? [], 15, 512) ?>;
                let previousMonth = <?php echo json_encode($performanceOverview['pending']['dailyPreviousMonth'] ?? [], 15, 512) ?>;
                chartjsLineChartFour(
                    "pendingcommissionChart",
                    "#FA8B0C",
                    "45",
                    (data = currentMonth),
                    (data = previousMonth),
                    labels = labels,
                    <?php echo e($performanceOverview['pending']['min_value'] ?? 0); ?>,
                    <?php echo e($performanceOverview['pending']['max_value'] ?? 0); ?>

                );
            <?php endif; ?>
        }




          function declinedcommissionChartLine()
        {
            let labels = <?php echo json_encode($performanceOverview['extra']['labels'] ?? [], 15, 512) ?>;

            <?php if(request()->start_date && request()->end_date): ?>
                let data = <?php echo json_encode($performanceOverview['declined']['commission'] ?? [], 15, 512) ?>;
                chartjsLineChartFive(
                    "declinedcommissionChart",
                    "#FA8B0C",
                    "45",
                    (data = data),
                    labels = labels,
                    <?php echo e($performanceOverview['declined']['min_value'] ?? 0); ?>,
                    <?php echo e($performanceOverview['declined']['max_value'] ?? 0); ?>

                );
                $("#declinedcommissionPeriodContent").html(`
                    <li class="custom-label">
                        <span style="background-color: rgb(95, 99, 242);"></span>Custom Period
                    </li>
                `)
            <?php else: ?>
                let currentMonth = <?php echo json_encode($performanceOverview['declined']['dailyCurrentMonth'] ?? [], 15, 512) ?>;
                let previousMonth = <?php echo json_encode($performanceOverview['declined']['dailyPreviousMonth'] ?? [], 15, 512) ?>;
                chartjsLineChartFour(
                    "declinedcommissionChart",
                    "#FA8B0C",
                    "45",
                    (data = currentMonth),
                    (data = previousMonth),
                    labels = labels,
                    <?php echo e($performanceOverview['declined']['min_value'] ?? 0); ?>,
                    <?php echo e($performanceOverview['declined']['max_value'] ?? 0); ?>

                );
            <?php endif; ?>
        }

        function transactionChartLine()
        {
            let labels = <?php echo json_encode($performanceOverview['extra']['labels'] ?? [], 15, 512) ?>;

            <?php if(request()->start_date && request()->end_date): ?>
                let data = <?php echo json_encode($performanceOverview['transaction']['transaction'] ?? [], 15, 512) ?>;
                chartjsLineChartFive(
                    "transactionChart",
                    "#FA8B0C",
                    "45",
                    (data = data),
                    labels = labels,
                    <?php echo e($performanceOverview['transaction']['min_value'] ?? 0); ?>,
                    <?php echo e($performanceOverview['transaction']['max_value'] ?? 0); ?>

                );
            $("#transactionPeriodContent").html(`
                <li class="custom-label">
                        <span style="background-color: rgb(95, 99, 242);"></span>Custom Period
                    </li>
            `)
            <?php else: ?>
                let currentMonth = <?php echo json_encode($performanceOverview['transaction']['dailyCurrentMonth'] ?? [], 15, 512) ?>;
                let previousMonth = <?php echo json_encode($performanceOverview['transaction']['dailyPreviousMonth'] ?? [], 15, 512) ?>;
                chartjsLineChartFour(
                    "transactionChart",
                    "#FA8B0C",
                    "45",
                    (data = currentMonth),
                    (data = previousMonth),
                    labels = labels,
                    <?php echo e($performanceOverview['transaction']['min_value'] ?? 0); ?>,
                    <?php echo e($performanceOverview['transaction']['max_value'] ?? 0); ?>

                );
            <?php endif; ?>
        }

        function saleChartLine()
        {
            let labels = <?php echo json_encode($performanceOverview['extra']['labels'] ?? [], 15, 512) ?>;

            <?php if(request()->start_date && request()->end_date): ?>
                let data = <?php echo json_encode($performanceOverview['sale']['sale'] ?? [], 15, 512) ?>;
                chartjsLineChartFive(
                    "saleChart",
                    "#FA8B0C",
                    "45",
                    (data = data),
                    labels = labels,
                    <?php echo e($performanceOverview['sale']['min_value'] ?? 0); ?>,
                    <?php echo e($performanceOverview['sale']['max_value'] ?? 0); ?>

                );
            $("#salePeriodContent").html(`
                <li class="custom-label">
                        <span style="background-color: rgb(95, 99, 242);"></span>Custom Period
                    </li>
            `)
            <?php else: ?>
                let currentMonth = <?php echo json_encode($performanceOverview['sale']['dailyCurrentMonth'] ?? [], 15, 512) ?>;
                let previousMonth = <?php echo json_encode($performanceOverview['sale']['dailyPreviousMonth'] ?? [], 15, 512) ?>;
                chartjsLineChartFour(
                    "saleChart",
                    "#FA8B0C",
                    "45",
                    (data = currentMonth),
                    (data = previousMonth),
                    labels = labels,
                    <?php echo e($performanceOverview['sale']['min_value'] ?? 0); ?>,
                    <?php echo e($performanceOverview['sale']['max_value'] ?? 0); ?>

                );
            <?php endif; ?>
        }

        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        

        document.addEventListener("DOMContentLoaded", function () {
            commissionChartLine();
            approvedcommissionChartLine();
            pendingcommissionChartLine();
            declinedcommissionChartLine();
            transactionChartLine();
            saleChartLine();
            // clickChartLine();
        });
    </script>

<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\tech\resources\views/template/publisher/widgets/section_performance_overview.blade.php ENDPATH**/ ?>