<?php if (! $__env->hasRenderedOnce('a4549851-a152-47e8-a544-2876cf2af774')): $__env->markAsRenderedOnce('a4549851-a152-47e8-a544-2876cf2af774');
$__env->startPush('styles'); ?>
<link rel="stylesheet" href="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/css/daterangepicker.css")); ?>">
<style>
    .loaded-spin {
        margin: 40%;
        position: absolute;
    }
    .form-label{
        font-size: 10px;
        color: #212529bf;
    }

    .daterangepicker {
        color: #a71d2d !important;
        border: 2px solid #010
    }

    .daterangepicker .ranges li.active {
        background-color: #a71d2d !important;
        color: #fff;
    }

    .daterangepicker .ranges li:hover {
        background-color: #fcd1d1 !important;
        color: #c22437;
    }

    select.form-control,
    input.date-ranger{
        border: 2px solid #a71d2d;
    }
    @media (min-width: 564px) {
        .daterangepicker {
            width: 200px;
        }
        .daterangepicker .ranges{
            width: 200px;

        }
        .daterangepicker .ranges ul {
            width: 200px;
        }
    }
</style>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('0091c0f8-6fdf-480b-af45-c0beb2ed1292')): $__env->markAsRenderedOnce('0091c0f8-6fdf-480b-af45-c0beb2ed1292');
$__env->startPush('scripts'); ?>
<script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/js/moment/moment.min.js")); ?>"></script>
<script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/js/daterangepicker.js")); ?>"></script>
<script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/js/moment.js")); ?>"></script>

<?php
    $date = \Carbon\Carbon::now()->format("Y-m-01 00:00:00");
    $diff = now()->diffInDays(\Carbon\Carbon::parse($date));

    $startDate = request()->start_date ?? null;
    $endDate = request()->end_date ?? null;

    if ($startDate)
        $startDate = \Carbon\Carbon::parse($startDate)->format("M d, Y");

    if ($endDate)
        $endDate = \Carbon\Carbon::parse($endDate)->format("M d, Y");

?>

<script>
    function showLoader() {
        $("#listingContentWrapper").addClass("zero-point-one-opacity");
        $("#performanceTabWrapper").addClass("zero-point-one-opacity");
        $("#ap-overview").append(`
                <div class="spin-container text-center" id="performanceLoader">
                    <div class="atbd-spin-dots spin-sm top-minus-25px">
                        <span class="spin-dot badge-dot dot-primary"></span>
                        <span class="spin-dot badge-dot dot-primary"></span>
                        <span class="spin-dot badge-dot dot-primary"></span>
                        <span class="spin-dot badge-dot dot-primary"></span>
                    </div>
                </div>
            `);
        $("#performanceCardContent").append(`
                <div class="spin-container text-center" id="performanceLoader2">
                    <div class="atbd-spin-dots spin-sm top-minus-25px">
                        <span class="spin-dot badge-dot dot-primary"></span>
                        <span class="spin-dot badge-dot dot-primary"></span>
                        <span class="spin-dot badge-dot dot-primary"></span>
                        <span class="spin-dot badge-dot dot-primary"></span>
                    </div>
                </div>
            `);
    }

    function hideLoader() {
        $("#listingContentWrapper").removeClass("zero-point-one-opacity");
        $("#performanceTabWrapper").removeClass("zero-point-one-opacity");
        $("#performanceLoader").remove();
        $("#performanceLoader2").remove();
    }

    function sendAjaxRequest(dataObj) {
        $.ajax({
            url: '<?php echo e(route("publisher.reports.performance-by-transactions.list")); ?>',
            type: 'GET',
            data: dataObj,
            before: function () {
                showLoader();
            },
            success: function (response) {
                $("#totalResults").html(`Total Results: <strong>${response.total}</strong>`);
                // $("#totalResults2").html(`Total Results: <strong>${response.total2}</strong>`);
                $("#performanceOverview").html(response.html);
                $("#ap-overview").html(response.html_2);

                if (dataObj.start_date && dataObj.end_date) {
                    createCommissionGraph(response?.performanceOverview);
                    createapprovedCommissionGraph(response?.performanceOverview);
                    creatependingCommissionGraph(response?.performanceOverview);
                    createdeclinedCommissionGraph(response?.performanceOverview);
                    createTransactionGraph(response?.performanceOverview);
                    createSaleGraph(response?.performanceOverview);
                    changeLimit();
                }
            }
        }).done(function () {
            hideLoader();
        });
    }

    function createCommissionGraph(response) {
        let commission = response?.commission;
        let labels = response?.extra?.labels;
        $("#commission-tab").html(`
                <div class="d-flex align-items-center">
                    <div class="performance-icon bg-primary bg-opacity-10 text-primary rounded-2 p-1 me-2">
                        <i class="fa-solid fa-money-bill-1-wave text-white"></i>
                    </div>
                    <div class="text-start">
                        <div class="performance-label text-muted x-small">Total Commissions</div>
                        <div class="performance-value fw-bold fs-6">
                            ${commission.count}
                        </div>
                    </div>
                </div>
            `);
        $("#commissionChart").remove();
        $("#commissionChartContent").html(`<canvas id="commissionChart"></canvas>`);
        chartjsLineChartFive(
            "commissionChart",
            "#FA8B0C",
            "45",
            (data = commission?.commission),
            labels = labels,
            commission?.max_value,
            commission?.min_value
        );
        $("#commissionPeriodContent").html(`
                    <li class="custom-label">
                        <span style="background-color: rgb(95, 99, 242);"></span>Current Period
                    </li>
                `)
    }


    function createapprovedCommissionGraph(response) {
        let commission = response?.approved;
        let labels = response?.extra?.labels;
        $("#approved-commission-tab").html(`
                <div class="d-flex align-items-center">
                    <div class="performance-icon bg-info bg-opacity-10 text-info rounded-2 p-1 me-2">
                        <i class="fa-solid text-white fa-check-circle"></i>
                    </div>
                    <div class="text-start">
                        <div class="performance-label text-muted x-small">Approved Commissions</div>
                        <div class="performance-value fw-bold fs-6">
                            ${commission.count}
                        </div>
                    </div>
                </div>
            `);
        $("#approvedcommissionChart").remove();
        $("#approvedcommissionChartContent").html(`<canvas id="approvedcommissionChart"></canvas>`);
        chartjsLineChartFive(
            "approvedcommissionChart",
            "#FA8B0C",
            "45",
            (data = commission?.commission),
            labels = labels,
            commission?.max_value,
            commission?.min_value
        );
        $("#approvedcommissionPeriodContent").html(`
                    <li class="custom-label">
                        <span style="background-color: rgb(95, 99, 242);"></span>Current Period
                    </li>
                `)
    }


    function createdeclinedCommissionGraph(response) {
        let commission = response?.declined;
        let labels = response?.extra?.labels;
        $("#declined-commission-tab").html(`
                <div class="d-flex align-items-center">
                    <div class="performance-icon bg-danger bg-opacity-10 text-danger rounded-2 p-1 me-2">
                        <i class="fa-solid text-white fa-times-circle"></i>
                    </div>
                    <div class="text-start">
                        <div class="performance-label text-muted x-small">Declined Commissions</div>
                        <div class="performance-value fw-bold fs-6">
                            ${commission.count}
                        </div>
                    </div>
                </div>
            `);
        $("#declinedcommissionChart").remove();
        $("#declinedcommissionChartContent").html(`<canvas id="declinedcommissionChart"></canvas>`);
        chartjsLineChartFive(
            "declinedcommissionChart",
            "#FA8B0C",
            "45",
            (data = commission?.commission),
            labels = labels,
            commission?.max_value,
            commission?.min_value
        );
        $("#declinedcommissionPeriodContent").html(`
                    <li class="custom-label">
                        <span style="background-color: rgb(95, 99, 242);"></span>Current Period
                    </li>
                `)
    }


    function creatependingCommissionGraph(response) {
        let commission = response?.pending;
        let labels = response?.extra?.labels;
        $("#pending-commission-tab").html(`
                <div class="d-flex align-items-center">
                    <div class="performance-icon bg-warning bg-opacity-10 text-warning rounded-2 p-1 me-2">
                        <i class="fa-solid text-white fa-clock"></i>
                    </div>
                    <div class="text-start">
                        <div class="performance-label text-muted x-small">Pending Commissions</div>
                        <div class="performance-value fw-bold fs-6">
                            ${commission.count}
                        </div>
                    </div>
                </div>
            `);
        $("#pendingcommissionChart").remove();
        $("#pendingcommissionChartContent").html(`<canvas id="pendingcommissionChart"></canvas>`);
        chartjsLineChartFive(
            "pendingcommissionChart",
            "#FA8B0C",
            "45",
            (data = commission?.commission),
            labels = labels,
            commission?.max_value,
            commission?.min_value
        );
        $("#pendingcommissionPeriodContent").html(`
                    <li class="custom-label">
                        <span style="background-color: rgb(95, 99, 242);"></span>Current Period
                    </li>
                `)
    }



    function createTransactionGraph(response) {
        let transaction = response?.transaction;
        let labels = response?.extra?.labels;
        $("#transaction-tab").html(`
                <div class="d-flex align-items-center">
                    <div class="performance-icon bg-purple bg-opacity-10 text-purple rounded-2 p-1 me-2">
                        <i class="fa-solid text-white fa-exchange-alt"></i>
                    </div>
                    <div class="text-start">
                        <div class="performance-label text-muted x-small">Total Transactions</div>
                        <div class="performance-value fw-bold fs-6">
                            ${transaction.count}
                        </div>
                    </div>
                </div>
            `);
        $("#transactionChart").remove();
        $("#transactionChartContent").html(`<canvas id="transactionChart"></canvas>`);
        chartjsLineChartFive(
            "transactionChart",
            "#FA8B0C",
            "45",
            (data = transaction?.transaction),
            labels = labels,
            transaction?.max_value,
            transaction?.min_value
        );
        $("#transactionPeriodContent").html(`
                    <li class="custom-label">
                        <span style="background-color: rgb(95, 99, 242);"></span>Current Period
                    </li>
                `);
    }

    function createSaleGraph(response) {
        let sale = response?.sale;
        let labels = response?.extra?.labels;
        $("#sale-tab").html(`
                <div class="d-flex align-items-center">
                    <div class="performance-icon bg-orange bg-opacity-10 text-orange rounded-2 p-1 me-2">
                        <i class="fa-solid text-white fa-shopping-cart"></i>
                    </div>
                    <div class="text-start">
                        <div class="performance-label text-muted x-small">Total Sales</div>
                        <div class="performance-value fw-bold fs-6">
                            ${sale.count}
                        </div>
                    </div>
                </div>
            `);
        $("#saleChart").remove();
        $("#saleChartContent").html(`<canvas id="saleChart"></canvas>`);
        chartjsLineChartFive(
            "saleChart",
            "#FA8B0C",
            "45",
            (data = sale?.sale),
            labels = labels,
            sale?.max_value,
            sale?.min_value
        );
        $("#salePeriodContent").html(`
                    <li class="custom-label">
                        <span style="background-color: rgb(95, 99, 242);"></span>Current Period
                    </li>
                `);
    }

    function createClickGraph(response) {
        let click = response?.click;
        let labels = response?.extra?.labels;
        $("#click-tab").html(`
                <div class="performance-stats__down">
                    <span>Total Clicks</span>
                    <strong>
                        ${click.count}
                    </strong>
                </div>
            `);
        $("#clickChart").remove();
        $("#clickChartContent").html(`<canvas id="clickChart"></canvas>`);
        chartjsLineChartFive(
            "clickChart",
            "#FA8B0C",
            "45",
            (data = click?.click),
            labels,
            click?.max_value,
            click?.min_value
        );
        $("#clickPeriodContent").html(`
                    <li class="custom-label">
                        <span style="background-color: rgb(95, 99, 242);"></span>Current Period
                    </li>
                `);
    }

    function filterTransactions(field, id) {
        showClear(id);
        if (field == "earning_search") {
            $("#ap-tabContent").addClass("spin-active");
            $("#gridLoader").removeClass("display-hidden");
        }
        else if (field == "conversion_search") {
            $("#ap-tabContent-2").addClass("spin-active");
            $("#gridLoader2").removeClass("display-hidden");
        }
        let data = $(`#${id}`).val();
        let dataObj = { [`${field}`]: data.toString() };
        searchFunc(field, data, dataObj);
    }

    function clearFilter(key) {
        let url = new URL(document.URL);
        let urlParams = url.searchParams;
        if (key === "clearSearchByName") {
            $("#SearchByName").val("");
            if (urlParams.has(`earning_search`)) {
                urlParams.delete(`earning_search`);
                filterTransactions("earning_search", "SearchByName");
            }
            if (urlParams.has(`start_date`)) {
                urlParams.delete(`start_date`);
            }
            if (urlParams.has(`end_date`)) {
                urlParams.delete(`end_date`);
            }
            if (urlParams.has(`earning_sort`)) {
                urlParams.delete(`earning_sort`);
            }
            if (urlParams.has(`conversion_sort`)) {
                urlParams.delete(`conversion_sort`);
            }
        }
        if (key === "clearSearchByName2") {
            $("#SearchByName2").val("");
            if (urlParams.has(`conversion_search`)) {
                urlParams.delete(`conversion_search`);
                filterTransactions("conversion_search", "SearchByName2");
            }
            if (urlParams.has(`start_date`)) {
                urlParams.delete(`start_date`);
            }
            if (urlParams.has(`end_date`)) {
                urlParams.delete(`end_date`);
            }
            if (urlParams.has(`earning_sort`)) {
                urlParams.delete(`earning_sort`);
            }
            if (urlParams.has(`conversion_sort`)) {
                urlParams.delete(`conversion_sort`);
            }
        }
        history.pushState({}, null, url.href);
        $(`#${key}`).hide();
    }

    function showClear(key) {
        if ($(`#clear${key}`).length)
            $(`#clear${key}`).show();
    }

    function searchFunc(field, data, dataObj) {
        let url = new URL(document.URL);
        let urlParams = url.searchParams;

        if (url.search) {
            if (urlParams.has(`${field}`)) {
                urlParams.delete(`${field}`);
            }
            if (field === "earning_search" && urlParams.has('earning_page')) {
                urlParams.delete('earning_page');
                urlParams.append('earning_page', "1");
            }
        }
        urlParams.append(field, data);
        history.pushState({}, null, url.href);

        url = new URL(document.URL);
        urlParams = url.searchParams;

        dataObj.start_date = urlParams.get(`start_date`);
        dataObj.end_date = urlParams.get(`end_date`);
        dataObj.earning_sort = urlParams.get(`earning_sort`);
        dataObj.region = urlParams.get(`region`);
        dataObj.conversion_sort = urlParams.get(`conversion_sort`);
        dataObj.earning_search = urlParams.get(`earning_search`);
        dataObj.conversion_search = urlParams.get(`conversion_search`);
        sendAjaxRequest(dataObj);
    }

    function changeLimit() {
        $("#limit").change(() => {
            $("#ap-tabContent").addClass("spin-active");
            $("#gridLoader").removeClass("display-hidden");
            $.ajax({
                url: '<?php echo e(route("publisher.set-limit")); ?>',
                type: 'GET',
                data: { "limit": $("#limit").val(), "type": "earning_performance" },
                success: function (response) {
                    if (response) {
                        window.location.reload();
                    }
                },
                error: function (response) {

                }
            });
        });
    }

    document.addEventListener("DOMContentLoaded", function () {

        let startDate = "<?php echo e($startDate); ?>";
        let endDate = "<?php echo e($endDate); ?>";

        let start;
        let end;

        if (startDate && endDate) {
            start = moment(startDate);
            end = moment(endDate);
        } else {
            start = moment().startOf("month");
            end = moment().endOf("month");
        }

        $('input[name="date-ranger"]').daterangepicker({
            maxSpan: {
                days: 365
            },
            startDate: start,
            endDate: end,
            singleDatePicker: false,
            autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear'
            },
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                'Current Year': [moment().startOf('year'), moment().endOf('year')],
                'Previous Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')]
            },
        });

        $('input[name="date-ranger"]').val(start.format('MMM D, YYYY') + ' - ' + end.format('MMM D, YYYY'));
        $('input[name="date-ranger"]').on('apply.daterangepicker', function (ev, picker) {

            showLoader();

            let exportXLSXURL = "<?php echo e(route("publisher.reports.transactions.export", ['type' => 'xlsx'])); ?>";
            let exportCSVURL = "<?php echo e(route("publisher.reports.transactions.export", ['type' => 'csv'])); ?>";

            $(this).val(picker.startDate.format('MMM D, YYYY') + ' - ' + picker.endDate.format('MMM D, YYYY'));

            exportXLSXURL = `${exportXLSXURL}?start_date=${picker.startDate.format('YYYY-MM-DD')}&end_date=${picker.endDate.format('YYYY-MM-DD')}`;
            exportCSVURL = `${exportCSVURL}?start_date=${picker.startDate.format('YYYY-MM-DD')}&end_date=${picker.endDate.format('YYYY-MM-DD')}`;

            $("#exportCSV").attr("href", exportCSVURL);
            $("#exportXLSX").attr("href", exportXLSXURL);

            let url = new URL(document.URL);
            let urlParams = url.searchParams;

            if (url.search) {
                if (urlParams.has('earning_page')) {
                    urlParams.delete('earning_page');
                    urlParams.append('earning_page', "1");
                }
            }

            if (urlParams.has(`start_date`)) {
                urlParams.delete(`start_date`);
            }

            if (urlParams.has(`end_date`)) {
                urlParams.delete(`end_date`);
            }

            urlParams.append("start_date", picker.startDate.format('YYYY-MM-DD'));
            urlParams.append("end_date", picker.endDate.format('YYYY-MM-DD'));
            history.pushState({}, null, url.href);

            let dataObj = {};
            dataObj.start_date = urlParams.get(`start_date`);
            dataObj.end_date = urlParams.get(`end_date`);
            dataObj.earning_sort = urlParams.get(`earning_sort`);
            dataObj.conversion_sort = urlParams.get(`conversion_sort`);
            dataObj.earning_search = urlParams.get(`earning_search`);
            dataObj.conversion_search = urlParams.get(`conversion_search`);
            sendAjaxRequest(dataObj);

        });

        $('input[name="date-ranger"]').on('cancel.daterangepicker', function (ev, picker) {
            $(this).val('');
        });

        $(document).on('click', '#publisherPagination a', function (event) {
            event.preventDefault();
            $("#ap-tabContent").addClass("spin-active");
            $("#gridLoader").removeClass("display-hidden");
            let page = $(this).attr('href').split('earning_page=')[1];
            let dataObj = { "earning_page": page };
            searchFunc("earning_page", page, dataObj);
        });

        changeLimit();

        $("#sortBy").change(function () {
            $("#ap-tabContent").addClass("spin-active");
            $("#gridLoader").removeClass("display-hidden");
            let data = $(this).val();
            let dataObj = { "earning_sort": data };
            searchFunc("earning_sort", data, dataObj);
        });

        $("#region").change(function () {
            $("#ap-tabContent-2").addClass("spin-active");
            $("#gridLoader2").removeClass("display-hidden");
            let data = $(this).val();
            let dataObj = { "region": data };
            searchFunc("region", data, dataObj);
        });

        $("#SearchByName").keyup(() => {
            filterTransactions("earning_search", "SearchByName");
            if (!$("#SearchByName").val()) {
                $(`#clearSearchByName`).hide();
            }
        });

        $("#SearchByName2").keyup(() => {
            filterTransactions("conversion_search", "SearchByName2");
            if (!$("#SearchByName2").val()) {
                $(`#clearSearchByName2`).hide();
            }
        });

    });
</script>
<?php $__env->stopPush(); endif; ?>

<?php $__env->startSection("content"); ?>

    <div class="az-content az-content-dashboard">
        <div class="container-fluid">
            <div class="az-content-body">
                <div class="az-dashboard-one-title">
                    <?php echo $__env->make("partial.publisher.transaction_alert", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="row">
                    <div class="col-lg-12" id="performanceOverview">
                        <?php echo $__env->make("template.publisher.widgets.section_performance_overview", compact('performanceOverview'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
                <div class="filter-bar-wrapper my-4">
                    <div class="card shadow-sm border-0 rounded-3">
                        <!-- Filter Header - Collapsible on mobile -->
                        <div class="card-header bg-white py-3 px-4 border-0 d-flex justify-content-between align-items-center">
                            <h5 class="mb-0 fw-semibold d-flex align-items-center">
                                <i class="fas fa-sliders-h me-2 text-primary"></i> Filters
                            </h5>
                            <button class="btn btn-outline-secondary btn-sm" onclick="resetAllFilters()">
                                <i class="fas fa-undo-alt me-1"></i> Reset
                            </button>
                        </div>

                        <!-- Filter Content - Collapsible -->
                        <div class="collapse show" id="filterCollapse">
                            <div class="card-body px-4 py-0">
                                <!-- Row 1: Search & Quick Actions -->
                                <div class="row g-3 mb-4">


                                    <div class="col-md-2">
                                        <label class="form-label mb-1">
                                            <i class="fas fa-tags me-1"></i> Date
                                        </label>
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-default date-ranger"
                                                name="date-ranger"
                                                placeholder="<?php echo e(now()->format("M 01, Y")); ?> - <?php echo e(now()->format("M t, Y")); ?>" />

                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <label class="form-label mb-1">
                                            <i class="fas fa-bullhorn me-1"></i> Region
                                        </label>
                                        <select class="form-control" id="region">
                                            <option <?php echo e(request()->region == "all" || empty(request()->region) ? "selected" : ""); ?> value="all">All Regions</option>
                                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($country->advertiser_country): ?>
                                                    <option <?php echo e(request()->region == $country->advertiser_country ? "selected" : ""); ?>

                                                        value="<?php echo e($country->advertiser_country); ?>">
                                                        <?php echo e($country->advertiser_country); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php echo e(request()->region == "unknown" ? "selected" : ""); ?> value="unknown">
                                                Unknown</option>
                                        </select>
                                    </div>

                                    <div class="col-md-2">
                                        <label class="form-label mb-1">
                                            <i class="fas fa-users me-1"></i> Advertiser Type
                                        </label>

                                        <select class="form-control" id="sortBy">
                                            <option <?php echo e(request()->earning_sort == "advertiser" || empty(request()->earning_sort) ? "selected" : ""); ?> value="advertiser">
                                                Advertiser</option>
                                            <option <?php echo e(request()->earning_sort == "sale" ? "selected" : ""); ?> value="sale">
                                                Sale</option>
                                            <option <?php echo e(request()->earning_sort == "commission" ? "selected" : ""); ?>

                                                value="commission">Commission</option>
                                            <option <?php echo e(request()->earning_sort == "transactions" ? "selected" : ""); ?>

                                                value="transactions">Transactions</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Active Filter Tags -->
                                <?php
                                    $hasActiveFilters = request()->search_by_name || request()->search_by_country ||
                                                        request()->search_by_category || request()->search_by_promotional_method ||
                                                        (request()->type && request()->type != 'third_party_advertiser');
                                ?>
                                <?php if($hasActiveFilters): ?>
                                    <div class="mt-3 pt-2 border-top">
                                        <div class="d-flex flex-wrap gap-2 align-items-center">
                                            <span class="small text-muted me-2">Active filters:</span>
                                            <?php if(request()->search_by_name): ?>
                                                <span class="badge bg-light text-dark border">
                                                    Search: <?php echo e(request()->search_by_name); ?>

                                                    <i class="fas fa-times ms-1 text-danger" style="cursor: pointer;" onclick="clearFilter('clearSearchByName')"></i>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3" id="listingContentWrapper">
                    
                    <div class="col-lg-12 col-12">
                        <div class="card shadow-sm" style="border-radius: 0;">
                            <div class="card-body py-1">
                                <div class="d-flex justify-content-between align-items-center gap-3 py-3">
                                    <div class="col-12 col-lg-4">
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control" id="SearchByName"
                                                placeholder="Search advertisers..." value="<?php echo e(request()->search_by_name); ?>">
                                            <?php if(request()->search_by_name): ?>
                                                <button class="btn btn-outline-danger"
                                                    onclick="clearFilter('clearSearchByName')" type="button">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 d-flex justify-content-end">
                                        <div class="dropdown">
                                            <button
                                                class="btn btn-outline-success btn-sm dropdown-toggle d-flex align-items-center"
                                                type="button" data-bs-toggle="dropdown">
                                                <i class="fas fa-download me-2"></i> Export
                                            </button>

                                            <?php
                                                $queryParams = request()->all();
                                            ?>

                                            <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">

                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center"
                                                        href="<?php echo e(route('publisher.reports.performance-by-transactions.export', array_merge(['type' => 'xlsx'], $queryParams))); ?>">
                                                        <i class="fa-solid fa-file-excel text-success me-2"></i>
                                                        Export to Excel
                                                    </a>
                                                </li>

                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center"
                                                        href="<?php echo e(route('publisher.reports.performance-by-transactions.export', array_merge(['type' => 'csv'], $queryParams))); ?>">
                                                        <i class="fa-solid fa-file-csv text-success me-2"></i>
                                                        Export to CSV
                                                    </a>
                                                </li>

                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo $__env->make("partial.admin.alert", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <div id="ap-overview">
                            <?php echo $__env->make("template.publisher.reports.performance.transaction.list_view", compact('performanceOverviewList'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.publisher.publisher_panel", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\lynktrix\resources\views/template/publisher/reports/performance/transaction/list.blade.php ENDPATH**/ ?>