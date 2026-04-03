<div class="card border-0 mb-20">
    <div class="card-body pt-0" id="performanceCardContent">
        <div class="tab-content perfomence-tab-wrap" id="performanceTabWrapper">
            <div class="tab-pane fade active show" id="w_perfomence-year" role="tabpanel" aria-labelledby="w_perfomence-year">
                <?php
                    // Calculate revenue data
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

                <div class="performance-stats-container">
                    <div class="nav nav-tabs performance-tabs border-0 mb-4 mt-2" id="performanceTab" role="tablist">
                        
                        <div class="nav-item">
                            <button class="nav-link performance-tab-item <?php if(!request()->start_date || !request()->end_date): ?> active <?php endif; ?>" id="commission-tab" data-bs-toggle="tab" data-bs-target="#commission" type="button" role="tab" aria-controls="commission" aria-selected="true">
                                <div class="d-flex align-items-center">
                                    <div class="performance-icon bg-primary bg-opacity-10 text-primary rounded-2 p-1 me-2">
                                        <i class="fa-solid fa-money-bill-1-wave text-white"></i>
                                    </div>
                                    <div class="text-start">
                                        <div class="performance-label text-muted x-small">Total Commissions</div>
                                        <div class="performance-value fw-bold fs-6">
                                            <?php echo e($performanceOverview['commission']['count'] ?? 0); ?>

                                            <?php if(!request()->start_date && !request()->end_date && isset($performanceOverview['commission']['percentage'])): ?>
                                                <span class="performance-change x-small ms-1 <?php if($performanceOverview['commission']['growth'] == "up"): ?> text-success <?php else: ?> text-danger <?php endif; ?>">
                                                    <i class="fa-solid text-white <?php if($performanceOverview['commission']['growth'] == "up"): ?> fa-arrow-up <?php else: ?> fa-arrow-down <?php endif; ?>"></i>
                                                    <?php echo e($performanceOverview['commission']['percentage'] ?? 0); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </button>
                        </div>

                        
                        <div class="nav-item">
                            <button class="nav-link performance-tab-item" id="commission-revenue-tab" data-bs-toggle="tab" data-bs-target="#commission" type="button" role="tab" aria-controls="commission-revenue" aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="performance-icon bg-success bg-opacity-10 text-success rounded-2 p-1 me-2">
                                        <i class="fa-solid text-white fa-chart-line"></i>
                                    </div>
                                    <div class="text-start">
                                        <div class="performance-label text-muted x-small">Total Revenue</div>
                                        <div class="performance-value fw-bold fs-6">
                                            <?php echo e($calculated); ?>

                                            <?php if(!request()->start_date && !request()->end_date && isset($performanceOverview['commission']['percentage'])): ?>
                                                <span class="performance-change x-small ms-1 <?php if($performanceOverview['commission']['growth'] == "up"): ?> text-success <?php else: ?> text-danger <?php endif; ?>">
                                                    <i class="fa-solid text-white <?php if($performanceOverview['commission']['growth'] == "up"): ?> fa-arrow-up <?php else: ?> fa-arrow-down <?php endif; ?>"></i>
                                                    <?php echo e($performanceOverview['commission']['percentage'] ?? 0); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </button>
                        </div>

                        
                        <div class="nav-item">
                            <button class="nav-link performance-tab-item" id="approved-commission-tab" data-bs-toggle="tab" data-bs-target="#approvedcommission" type="button" role="tab" aria-controls="approved-commission" aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="performance-icon bg-info bg-opacity-10 text-info rounded-2 p-1 me-2">
                                        <i class="fa-solid text-white fa-check-circle"></i>
                                    </div>
                                    <div class="text-start">
                                        <div class="performance-label text-muted x-small">Approved Commissions</div>
                                        <div class="performance-value fw-bold fs-6">
                                            <?php echo e($performanceOverview['approved']['count'] ?? 0); ?>

                                            <?php if(!request()->start_date && !request()->end_date && isset($performanceOverview['approved']['percentage'])): ?>
                                                <span class="performance-change x-small ms-1 <?php if($performanceOverview['approved']['growth'] == "up"): ?> text-success <?php else: ?> text-danger <?php endif; ?>">
                                                    <i class="fa-solid text-white <?php if($performanceOverview['approved']['growth'] == "up"): ?> fa-arrow-up <?php else: ?> fa-arrow-down <?php endif; ?>"></i>
                                                    <?php echo e($performanceOverview['approved']['percentage'] ?? 0); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </button>
                        </div>

                        
                        <div class="nav-item">
                            <button class="nav-link performance-tab-item" id="pending-commission-tab" data-bs-toggle="tab" data-bs-target="#pendingcommission" type="button" role="tab" aria-controls="pending-commission" aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="performance-icon bg-warning bg-opacity-10 text-warning rounded-2 p-1 me-2">
                                        <i class="fa-solid text-white fa-clock"></i>
                                    </div>
                                    <div class="text-start">
                                        <div class="performance-label text-muted x-small">Pending Commissions</div>
                                        <div class="performance-value fw-bold fs-6">
                                            <?php echo e($performanceOverview['pending']['count'] ?? 0); ?>

                                            <?php if(!request()->start_date && !request()->end_date && isset($performanceOverview['pending']['percentage'])): ?>
                                                <span class="performance-change x-small ms-1 <?php if($performanceOverview['pending']['growth'] == "up"): ?> text-success <?php else: ?> text-danger <?php endif; ?>">
                                                    <i class="fa-solid text-white <?php if($performanceOverview['pending']['growth'] == "up"): ?> fa-arrow-up <?php else: ?> fa-arrow-down <?php endif; ?>"></i>
                                                    <?php echo e($performanceOverview['pending']['percentage'] ?? 0); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </button>
                        </div>

                        
                        <div class="nav-item">
                            <button class="nav-link performance-tab-item" id="declined-commission-tab" data-bs-toggle="tab" data-bs-target="#declinedcommission" type="button" role="tab" aria-controls="declined-commission" aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="performance-icon bg-danger bg-opacity-10 text-danger rounded-2 p-1 me-2">
                                        <i class="fa-solid text-white fa-times-circle"></i>
                                    </div>
                                    <div class="text-start">
                                        <div class="performance-label text-muted x-small">Declined Commissions</div>
                                        <div class="performance-value fw-bold fs-6">
                                            <?php echo e($performanceOverview['declined']['count'] ?? 0); ?>

                                            <?php if(!request()->start_date && !request()->end_date && isset($performanceOverview['declined']['percentage'])): ?>
                                                <span class="performance-change x-small ms-1 <?php if($performanceOverview['declined']['growth'] == "up"): ?> text-success <?php else: ?> text-danger <?php endif; ?>">
                                                    <i class="fa-solid text-white <?php if($performanceOverview['declined']['growth'] == "up"): ?> fa-arrow-up <?php else: ?> fa-arrow-down <?php endif; ?>"></i>
                                                    <?php echo e($performanceOverview['declined']['percentage'] ?? 0); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </button>
                        </div>

                        
                        <div class="nav-item">
                            <button class="nav-link performance-tab-item" id="transaction-tab" data-bs-toggle="tab" data-bs-target="#transaction" type="button" role="tab" aria-controls="transaction" aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="performance-icon bg-purple bg-opacity-10 text-purple rounded-2 p-1 me-2">
                                        <i class="fa-solid text-white fa-exchange-alt"></i>
                                    </div>
                                    <div class="text-start">
                                        <div class="performance-label text-muted x-small">Total Transactions</div>
                                        <div class="performance-value fw-bold fs-6">
                                            <?php echo e($performanceOverview['transaction']['count'] ?? 0); ?>

                                            <?php if(!request()->start_date && !request()->end_date && isset($performanceOverview['transaction']['percentage'])): ?>
                                                <span class="performance-change x-small ms-1 <?php if($performanceOverview['transaction']['growth'] == "up"): ?> text-success <?php else: ?> text-danger <?php endif; ?>">
                                                    <i class="fa-solid text-white <?php if($performanceOverview['transaction']['growth'] == "up"): ?> fa-arrow-up <?php else: ?> fa-arrow-down <?php endif; ?>"></i>
                                                    <?php echo e($performanceOverview['transaction']['percentage'] ?? 0); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </button>
                        </div>

                        
                        <div class="nav-item">
                            <button class="nav-link performance-tab-item" id="sale-tab" data-bs-toggle="tab" data-bs-target="#sale" type="button" role="tab" aria-controls="sale" aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="performance-icon bg-orange bg-opacity-10 text-orange rounded-2 p-1 me-2">
                                        <i class="fa-solid text-white fa-shopping-cart"></i>
                                    </div>
                                    <div class="text-start">
                                        <div class="performance-label text-muted x-small">Total Sales</div>
                                        <div class="performance-value fw-bold fs-6">
                                            <?php echo e($performanceOverview['sale']['count'] ?? 0); ?>

                                            <?php if(!request()->start_date && !request()->end_date && isset($performanceOverview['sale']['percentage'])): ?>
                                                <span class="performance-change x-small ms-1 <?php if($performanceOverview['sale']['growth'] == "up"): ?> text-success <?php else: ?> text-danger <?php endif; ?>">
                                                    <i class="fa-solid text-white <?php if($performanceOverview['sale']['growth'] == "up"): ?> fa-arrow-up <?php else: ?> fa-arrow-down <?php endif; ?>"></i>
                                                    <?php echo e($performanceOverview['sale']['percentage'] ?? 0); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>

                <style>
                    .performance-stats-container {
                        overflow-x: auto;
                        -webkit-overflow-scrolling: touch;
                        padding: 0 5px;
                        margin: 0 -5px;
                    }

                    .performance-tabs {
                        display: flex;
                        flex-wrap: wrap;
                        gap: 8px;
                        justify-content: space-around;
                        padding-bottom: 1px;
                        min-width: min-content;
                    }

                    .performance-tab-item {
                        border: 1px solid #dee2e6 !important;
                        border-radius: 8px !important;
                        padding: 0.5rem 0.75rem !important;
                        min-width: 160px;
                        background: white;
                        transition: all 0.3s ease;
                        text-align: left;
                        white-space: nowrap;
                        height: 100%;
                    }

                    .performance-tab-item:hover {
                        border-color: rgb(91, 71, 251) !important;
                        transform: translateY(-2px);
                        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
                    }

                    .performance-tab-item.active {
                        border-color: #5b47fb !important;
                        background-color: rgba(13, 110, 253, 0.05) !important;
                        box-shadow: 0 3px 8px rgba(13, 110, 253, 0.15);
                    }

                    .performance-icon {
                        width: 36px;
                        height: 36px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        flex-shrink: 0;
                    }

                    .performance-label {
                        font-size: 0.7rem;
                        font-weight: 500;
                        margin-bottom: 0.15rem;
                        line-height: 1.2;
                    }

                    .performance-value {
                        color: #212529;
                        line-height: 1.2;
                        font-size: 0.95rem;
                    }

                    .performance-change {
                        font-weight: 500;
                        font-size: 0.65rem;
                    }

                    .x-small {
                        font-size: 0.7rem !important;
                    }

                    .text-purple {
                        color: #6f42c1 !important;
                    }

                    .bg-purple {
                        background-color: #6f42c1 !important;
                    }

                    .text-orange {
                        color: #fd7e14 !important;
                    }

                    .bg-orange {
                        background-color: #fd7e14 !important;
                    }

                    /* Scrollbar styling */
                    .performance-stats-container::-webkit-scrollbar {
                        height: 4px;
                    }

                    .performance-stats-container::-webkit-scrollbar-track {
                        background: #f1f1f1;
                        border-radius: 10px;
                    }

                    .performance-stats-container::-webkit-scrollbar-thumb {
                        background: #c1c1c1;
                        border-radius: 10px;
                    }

                    .performance-stats-container::-webkit-scrollbar-thumb:hover {
                        background: #a8a8a8;
                    }

                    /* Responsive adjustments */
                    @media (max-width: 1200px) {
                        .performance-tab-item {
                            min-width: 150px;
                            padding: 0.45rem 0.65rem !important;
                        }

                        .performance-icon {
                            width: 32px;
                            height: 32px;
                        }

                        .performance-value {
                            font-size: 0.9rem !important;
                        }
                    }

                    @media (max-width: 768px) {
                        .performance-tab-item {
                            min-width: 140px;
                            padding: 0.4rem 0.6rem !important;
                        }

                        .performance-icon {
                            width: 30px;
                            height: 30px;
                        }

                        .performance-value {
                            font-size: 0.85rem !important;
                        }

                        .performance-label {
                            font-size: 0.65rem;
                        }
                    }

                    @media (max-width: 576px) {
                        .performance-tab-item {
                            min-width: 130px;
                            padding: 0.35rem 0.5rem !important;
                        }

                        .performance-icon {
                            width: 28px;
                            height: 28px;
                        }

                        .performance-value {
                            font-size: 0.8rem !important;
                        }

                        .performance-label {
                            font-size: 0.6rem;
                        }
                    }
                    .legend-static {
                        list-style: none;
                        padding: 0;
                        margin: 0;
                        display: flex;
                        gap: 20px;
                        align-items: center;
                    }

                    .legend-static .custom-label {
                        display: flex;
                        align-items: center;
                        gap: 8px;
                        font-size: 0.875rem;
                        color: #6c757d;
                        font-weight: 500;
                    }

                    .legend-static .custom-label span {
                        width: 16px;
                        height: 16px;
                        border-radius: 3px;
                        display: inline-block;
                        flex-shrink: 0;
                    }

                    /* Optional hover effect */
                    .legend-static .custom-label:hover {
                        color: #495057;
                    }

                    /* Responsive */
                    @media (max-width: 576px) {
                        .legend-static {
                            gap: 12px;
                        }

                        .legend-static .custom-label {
                            font-size: 0.8125rem;
                            gap: 6px;
                        }

                        .legend-static .custom-label span {
                            width: 12px;
                            height: 12px;
                        }
                    }
                </style>
                <!-- ends: .performance-stats -->

                <div class="wp-chart perfomence-chart">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="commission" role="tabpanel" aria-labelledby="commission-tab">
                            <div class="parentContainer">
                                <div id="commissionChartContent" >
                                    <canvas id="commissionChart"></canvas>
                                </div>
                            </div>
                            <ul class="legend-static" id="commissionPeriodContent">
                                <li class="custom-label">
                                    <span style="background-color: rgb(91, 71, 251);"></span>Current Period
                                </li>
                            </ul>
                        </div>

                        <div class="tab-pane fade" id="pendingcommission" role="tabpanel" aria-labelledby="pending-commission-tab">
                            <div class="parentContainer">
                                <div id="pendingcommissionChartContent" >
                                    <canvas id="pendingcommissionChart"></canvas>
                                </div>
                            </div>
                            <ul class="legend-static" id="pendingcommissionPeriodContent">
                                <li class="custom-label">
                                    <span style="background-color: rgb(91, 71, 251);"></span>Current Period
                                </li>
                                <li class="custom-label">
                                    <span style="background-color: #C6D0DC"></span>Previous Period
                                </li>
                            </ul>
                        </div>


                        <div class="tab-pane fade" id="declinedcommission" role="tabpanel" aria-labelledby="declined-commission-tab">
                            <div class="parentContainer">
                                <div id="declinedcommissionChartContent" >
                                    <canvas id="declinedcommissionChart"></canvas>
                                </div>
                            </div>
                            <ul class="legend-static" id="declinedcommissionPeriodContent">
                                <li class="custom-label">
                                    <span style="background-color: rgb(91, 71, 251);"></span>Current Period
                                </li>
                                <li class="custom-label">
                                    <span style="background-color: #C6D0DC"></span>Previous Period
                                </li>
                            </ul>
                        </div>

                        <div class="tab-pane fade" id="approvedcommission" role="tabpanel" aria-labelledby="approved-commission-tab">
                            <div class="parentContainer">
                                <div id="approvedcommissionChartContent" >
                                    <canvas id="approvedcommissionChart"></canvas>
                                </div>
                            </div>
                            <ul class="legend-static" id="approvedcommissionPeriodContent">
                                <li class="custom-label">
                                    <span style="background-color: rgb(91, 71, 251);"></span>Current Period
                                </li>
                                <li class="custom-label">
                                    <span style="background-color: #C6D0DC"></span>Previous Period
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="transaction" role="tabpanel" aria-labelledby="transaction-tab">
                            <div class="parentContainer" id="transactionChartContent">
                                <div >
                                    <canvas id="transactionChart"></canvas>
                                </div>
                            </div>
                            <ul class="legend-static" id="transactionPeriodContent">
                                <li class="custom-label">
                                    <span style="background-color: rgb(91, 71, 251);"></span>Current Period
                                </li>
                                <li class="custom-label">
                                    <span style="background-color: #C6D0DC"></span>Previous Period
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="sale" role="tabpanel" aria-labelledby="sale-tab">
                            <div class="parentContainer" id="saleChartContent">
                                <div >
                                    <canvas id="saleChart"></canvas>
                                </div>
                            </div>
                            <ul class="legend-static" id="salePeriodContent">
                                <li class="custom-label">
                                    <span style="background-color: rgb(91, 71, 251);"></span>Current Period
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
                "#5b47fb",
                "45",
                data,
                labels,
                <?php echo e($performanceOverview['commission']['min_value'] ?? 0); ?>,
                <?php echo e($performanceOverview['commission']['max_value'] ?? 0); ?>

            );
            $("#commissionPeriodContent").html(`
                <li class="custom-label">
                    <span style="background-color: rgb(91, 71, 251);"></span>Current Period
                </li>
            `)
        <?php else: ?>
            let currentMonth = <?php echo json_encode($performanceOverview['commission']['dailyCurrentMonth'] ?? [], 15, 512) ?>;
            let previousMonth = <?php echo json_encode($performanceOverview['commission']['dailyPreviousMonth'] ?? [], 15, 512) ?>;
            chartjsLineChartFour(
                "commissionChart",
                "#5b47fb",
                "45",
                currentMonth,
                previousMonth,
                labels,
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
                "#5b47fb",
                "45",
                data,
                labels,
                <?php echo e($performanceOverview['approved']['min_value'] ?? 0); ?>,
                <?php echo e($performanceOverview['approved']['max_value'] ?? 0); ?>

            );
            $("#approvedcommissionPeriodContent").html(`
                <li class="custom-label">
                    <span style="background-color: rgb(91, 71, 251);"></span>Current Period
                </li>
            `)
        <?php else: ?>
            let currentMonth = <?php echo json_encode($performanceOverview['approved']['dailyCurrentMonth'] ?? [], 15, 512) ?>;
            let previousMonth = <?php echo json_encode($performanceOverview['approved']['dailyPreviousMonth'] ?? [], 15, 512) ?>;
            chartjsLineChartFour(
                "approvedcommissionChart",
                "#5b47fb",
                "45",
                currentMonth,
                previousMonth,
                labels,
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
                "#5b47fb",
                "45",
                data,
                labels,
                <?php echo e($performanceOverview['pending']['min_value'] ?? 0); ?>,
                <?php echo e($performanceOverview['pending']['max_value'] ?? 0); ?>

            );
            $("#pendingcommissionPeriodContent").html(`
                <li class="custom-label">
                    <span style="background-color: rgb(91, 71, 251);"></span>Current Period
                </li>
            `)
        <?php else: ?>
            let currentMonth = <?php echo json_encode($performanceOverview['pending']['dailyCurrentMonth'] ?? [], 15, 512) ?>;
            let previousMonth = <?php echo json_encode($performanceOverview['pending']['dailyPreviousMonth'] ?? [], 15, 512) ?>;
            chartjsLineChartFour(
                "pendingcommissionChart",
                "#5b47fb",
                "45",
                currentMonth,
                previousMonth,
                labels,
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
                "#5b47fb",
                "45",
                data,
                labels,
                <?php echo e($performanceOverview['declined']['min_value'] ?? 0); ?>,
                <?php echo e($performanceOverview['declined']['max_value'] ?? 0); ?>

            );
            $("#declinedcommissionPeriodContent").html(`
                <li class="custom-label">
                    <span style="background-color: rgb(91, 71, 251);"></span>Current Period
                </li>
            `)
        <?php else: ?>
            let currentMonth = <?php echo json_encode($performanceOverview['declined']['dailyCurrentMonth'] ?? [], 15, 512) ?>;
            let previousMonth = <?php echo json_encode($performanceOverview['declined']['dailyPreviousMonth'] ?? [], 15, 512) ?>;
            chartjsLineChartFour(
                "declinedcommissionChart",
                "#5b47fb",
                "45",
                currentMonth,
                previousMonth,
                labels,
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
                "#5b47fb",
                "45",
                data,
                labels,
                <?php echo e($performanceOverview['transaction']['min_value'] ?? 0); ?>,
                <?php echo e($performanceOverview['transaction']['max_value'] ?? 0); ?>

            );
            $("#transactionPeriodContent").html(`
                <li class="custom-label">
                    <span style="background-color: rgb(91, 71, 251);"></span>Current Period
                </li>
            `)
        <?php else: ?>
            let currentMonth = <?php echo json_encode($performanceOverview['transaction']['dailyCurrentMonth'] ?? [], 15, 512) ?>;
            let previousMonth = <?php echo json_encode($performanceOverview['transaction']['dailyPreviousMonth'] ?? [], 15, 512) ?>;
            chartjsLineChartFour(
                "transactionChart",
                "#5b47fb",
                "45",
                currentMonth,
                previousMonth,
                labels,
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
                "#5b47fb",
                "45",
                data,
                labels,
                <?php echo e($performanceOverview['sale']['min_value'] ?? 0); ?>,
                <?php echo e($performanceOverview['sale']['max_value'] ?? 0); ?>

            );
            $("#salePeriodContent").html(`
                <li class="custom-label">
                    <span style="background-color: rgb(91, 71, 251);"></span>Current Period
                </li>
            `)
        <?php else: ?>
            let currentMonth = <?php echo json_encode($performanceOverview['sale']['dailyCurrentMonth'] ?? [], 15, 512) ?>;
            let previousMonth = <?php echo json_encode($performanceOverview['sale']['dailyPreviousMonth'] ?? [], 15, 512) ?>;
            chartjsLineChartFour(
                "saleChart",
                "#5b47fb",
                "45",
                currentMonth,
                previousMonth,
                labels,
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
    });

</script>


<?php $__env->stopPush(); ?>
<?php /**PATH C:\Users\lenovo\Downloads\application\resources\views/template/publisher/widgets/section_performance_overview.blade.php ENDPATH**/ ?>