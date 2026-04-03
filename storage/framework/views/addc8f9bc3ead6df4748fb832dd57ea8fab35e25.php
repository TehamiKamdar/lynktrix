<?php if (! $__env->hasRenderedOnce('496570f6-ee48-473b-b16d-468dd75dcf7f')): $__env->markAsRenderedOnce('496570f6-ee48-473b-b16d-468dd75dcf7f');
$__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/css/daterangepicker.css")); ?>">
    <style>
        .loaded-spin {
            margin: 40%;
            position: absolute;
        }
    </style>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('3c65b77a-88a9-43e9-992d-988a7c2b02e1')): $__env->markAsRenderedOnce('3c65b77a-88a9-43e9-992d-988a7c2b02e1');
$__env->startPush('scripts'); ?>
    <script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/js/moment/moment.min.js")); ?>"></script>
    <script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/js/daterangepicker.js")); ?>"></script>
    <script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/js/moment.js")); ?>"></script>

    <?php
        $date = \Carbon\Carbon::now()->format("Y-m-01 00:00:00");
        $diff = now()->diffInDays(\Carbon\Carbon::parse($date));

        $startDate = request()->start_date ?? null;
        $endDate = request()->end_date ?? null;

        if($startDate)
            $startDate = \Carbon\Carbon::parse($startDate)->format("M d, Y");

        if($endDate)
            $endDate = \Carbon\Carbon::parse($endDate)->format("M d, Y");

    ?>

    <script>
        function showLoader()
        {
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

        function hideLoader()
        {
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

                    if(dataObj.start_date && dataObj.end_date) {
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

        function createCommissionGraph(response)
        {
            let commission = response?.commission;
            let labels = response?.extra?.labels;
            $("#commission-tab").html(`
                <div class="performance-stats__down">
                    <span>Total Commissions</span>
                    <strong>
                        ${commission.count}
                    </strong>
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
                        <span style="background-color: rgb(95, 99, 242);"></span>Custom Period
                    </li>
                `)
        }


        function createapprovedCommissionGraph(response)
        {
            let commission = response?.approved;
            let labels = response?.extra?.labels;
            $("#approved-commission-tab").html(`
                <div class="performance-stats__down">
                    <span>Total Approved Commissions</span>
                    <strong>
                        ${commission.count}
                    </strong>
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
                        <span style="background-color: rgb(95, 99, 242);"></span>Custom Period
                    </li>
                `)
        }


        function createdeclinedCommissionGraph(response)
        {
            let commission = response?.declined;
            let labels = response?.extra?.labels;
            $("#declined-commission-tab").html(`
                <div class="performance-stats__down">
                    <span>Total Declined Commissions</span>
                    <strong>
                        ${commission.count}
                    </strong>
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
                        <span style="background-color: rgb(95, 99, 242);"></span>Custom Period
                    </li>
                `)
        }


        function creatependingCommissionGraph(response)
        {
            let commission = response?.pending;
            let labels = response?.extra?.labels;
            $("#pending-commission-tab").html(`
                <div class="performance-stats__down">
                    <span>Total Pending Commissions</span>
                    <strong>
                        ${commission.count}
                    </strong>
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
                        <span style="background-color: rgb(95, 99, 242);"></span>Custom Period
                    </li>
                `)
        }


        function createTransactionGraph(response)
        {
            let transaction = response?.transaction;
            let labels = response?.extra?.labels;
            $("#transaction-tab").html(`
                <div class="performance-stats__down">
                    <span>Total Transactions</span>
                    <strong>
                        ${transaction.count}
                    </strong>
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
                        <span style="background-color: rgb(95, 99, 242);"></span>Custom Period
                    </li>
                `);
        }

        function createSaleGraph(response)
        {
            let sale = response?.sale;
            let labels = response?.extra?.labels;
            $("#sale-tab").html(`
                <div class="performance-stats__down">
                    <span>Total Sales</span>
                    <strong>
                        ${sale.count}
                    </strong>
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
                        <span style="background-color: rgb(95, 99, 242);"></span>Custom Period
                    </li>
                `);
        }

        function createClickGraph(response)
        {
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
                        <span style="background-color: rgb(95, 99, 242);"></span>Custom Period
                    </li>
                `);
        }

        function filterTransactions(field, id) {
            showClear(id);
            if(field == "earning_search")
            {
                $("#ap-tabContent").addClass("spin-active");
                $("#gridLoader").removeClass("display-hidden");
            }
            else if(field == "conversion_search")
            {
                $("#ap-tabContent-2").addClass("spin-active");
                $("#gridLoader2").removeClass("display-hidden");
            }
            let data = $(`#${id}`).val();
            let dataObj = {[`${field}`]: data.toString()};
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

        function searchFunc(field, data, dataObj)
        {
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

        function changeLimit()
        {
            $("#limit").change(() => {
                $("#ap-tabContent").addClass("spin-active");
                $("#gridLoader").removeClass("display-hidden");
                $.ajax({
                    url: '<?php echo e(route("publisher.set-limit")); ?>',
                    type: 'GET',
                    data: {"limit": $("#limit").val(), "type": "earning_performance"},
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

            $(document).on('click', '#publisherPagination a', function(event){
                event.preventDefault();
                $("#ap-tabContent").addClass("spin-active");
                $("#gridLoader").removeClass("display-hidden");
                let page = $(this).attr('href').split('earning_page=')[1];
                let dataObj = {"earning_page": page};
                searchFunc("earning_page", page, dataObj);
            });

            changeLimit();

            $("#sortBy").change(function () {
                $("#ap-tabContent").addClass("spin-active");
                $("#gridLoader").removeClass("display-hidden");
                let data = $(this).val();
                let dataObj = {"earning_sort": data};
                searchFunc("earning_sort", data, dataObj);
            });

            $("#region").change(function () {
                $("#ap-tabContent-2").addClass("spin-active");
                $("#gridLoader2").removeClass("display-hidden");
                let data = $(this).val();
                let dataObj = {"region": data};
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

    <div class="contents">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop-breadcrumb">
                        <div class="breadcrumb-main">
                            <h4 class="text-capitalize breadcrumb-title">Advertiser Performance</h4>

                            <?php echo $__env->make("partial.publisher.transaction_alert", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            <div class="breadcrumb-action justify-content-center flex-wrap">
                                <div class="action-btn">
                                    <div class="form-group mb-0">
                                        <div class="input-container icon-left position-relative">
                                                <span class="input-icon icon-left">
                                                    <span data-feather="calendar"></span>
                                                </span>
                                            <input type="text" class="form-control form-control-default date-ranger"
                                                   name="date-ranger"
                                                   placeholder="<?php echo e(now()->format("M 01, Y")); ?> - <?php echo e(now()->format("M t, Y")); ?>"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown action-btn">
                                    <button class="btn btn-sm btn-default btn-white dropdown-toggle" type="button"
                                            id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                        <i class="la la-download"></i> Export
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <span class="dropdown-item">Export With</span>
                                        <div class="dropdown-divider"></div>
                                        <a href="<?php echo e(route("publisher.reports.performance-by-transactions.export", ['type' => 'xlsx', 'start_date' => request()->start_date ?? now()->format("Y-m-01 00:00:00"), 'end_date' => request()->end_date ?? now()->format("Y-m-t 23:59:59")])); ?>"
                                           id="exportXLSX" class="dropdown-item">
                                            <i class="la la-file-excel"></i> Excel (XLSX)</a>
                                        <a href="<?php echo e(route("publisher.reports.performance-by-transactions.export", ['type' => 'csv', 'start_date' => request()->start_date ?? now()->format("Y-m-01 00:00:00"), 'end_date' => request()->end_date ?? now()->format("Y-m-t 23:59:59")])); ?>"
                                           id="exportCSV" class="dropdown-item">
                                            <i class="la la-file-csv"></i> CSV</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12" id="performanceOverview">
                  
                    <?php echo $__env->make("template.publisher.widgets.section_performance_overview", compact('performanceOverview'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row" id="listingContentWrapper">
                <div class="col-lg-12">
                    <div class="orderDatatable global-shadow border py-30 px-sm-30 px-20 bg-white radius-xl w-100 mb-30">
                        <div class="project-top-wrapper d-flex justify-content-between flex-wrap mb-25 mt-n10">
                            <div class="d-flex align-items-center flex-wrap justify-content-center">
                                <div class="project-search order-search  global-shadow mt-10">
                                    <form action="/" class="order-search__form">
                                        <span data-feather="search"></span>
                                        <input id="SearchByName" class="form-control mr-sm-2 border-0 box-shadow-none" type="text" placeholder="Filter by name, id..." aria-label="Search" value="<?php echo e(request()->earning_search); ?>">
                                    </form>
                                </div><!-- End: .project-search -->
                                <div class="project-category d-flex align-items-center mt-xl-10 mt-15">
                                    <a href="javascript:void(0)" id="clearSearchByName"
                                       onclick="clearFilter('clearSearchByName')"
                                       class="margin-left-minus-50px <?php echo e(request()->earning_search ? null : "display-hidden"); ?>">
                                        <small>Clear</small>
                                    </a>
                                </div>
                                <div class="project-category d-flex align-items-center ml-md-30 mt-xl-10 mt-15">
                                    <p class="fs-14 color-gray text-capitalize mb-10 mb-md-0 mr-10 font-weight-bold text-black">Sort By :</p>
                                    <div class="project-category__select global-shadow ">
                                        <select class="js-example-basic-single js-states form-control" id="sortBy">
                                            <option <?php echo e(request()->earning_sort == "advertiser" || empty(request()->earning_sort) ? "selected" : ""); ?> value="advertiser">Advertiser</option>
                                            <option <?php echo e(request()->earning_sort == "sale" ? "selected" : ""); ?> value="sale">Sale</option>
                                            <option <?php echo e(request()->earning_sort == "commission" ? "selected" : ""); ?> value="commission">Commission</option>
                                            <option <?php echo e(request()->earning_sort == "transactions" ? "selected" : ""); ?> value="transactions">Transactions</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="project-category d-flex align-items-center ml-md-30 mt-xl-10 mt-15">
                                    <p class="fs-14 color-gray text-capitalize mb-10 mb-md-0 mr-10 font-weight-bold text-black">Region :</p>
                                    <div class="project-category__select global-shadow ">
                                        <select class="js-example-basic-single js-states form-control" id="region">
                                            <option <?php echo e(request()->region == "all" || empty(request()->region) ? "selected" : ""); ?> value="all">All Regions</option>
                                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($country->advertiser_country): ?>
                                                    <option <?php echo e(request()->region == $country->advertiser_country ? "selected" : ""); ?> value="<?php echo e($country->advertiser_country); ?>"><?php echo e($country->advertiser_country); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php echo e(request()->region == "unknown" ? "selected" : ""); ?> value="unknown">Unknown</option>
                                        </select>
                                    </div>
                                </div><!-- End: .project-category -->
                            </div><!-- End: .d-flex -->
                            <div class="content-center mt-10">
                                <p class="fs-14 color-gray text-capitalize mb-10 mb-md-0 mr-10 font-weight-bold text-black" id="totalResults">Total Results: <strong><?php echo e($total); ?></strong></p>
                            </div><!-- End: .content-center -->
                        </div><!-- End: .project-top-wrapper -->

                        <?php echo $__env->make("partial.admin.alert", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <div id="ap-overview">
                            <?php echo $__env->make("template.publisher.reports.performance.transaction.list_view", compact('performanceOverviewList'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>

                    </div><!-- End: .userDatatable -->
                </div><!-- End: .col -->








































            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.publisher.panel_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tech\resources\views/template/publisher/reports/performance/transaction/list.blade.php ENDPATH**/ ?>