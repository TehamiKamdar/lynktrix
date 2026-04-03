<?php if (! $__env->hasRenderedOnce('340daffa-5993-42d0-a218-bd175df72564')): $__env->markAsRenderedOnce('340daffa-5993-42d0-a218-bd175df72564');
$__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/css/daterangepicker.css")); ?>">
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('4b852829-2db4-4e69-b261-19bb6a80eabe')): $__env->markAsRenderedOnce('4b852829-2db4-4e69-b261-19bb6a80eabe');
$__env->startPush('scripts'); ?>

    <?php
        $date = \Carbon\Carbon::now()->format("Y-m-01 00:00:00");
        $diff = now()->diffInDays(\Carbon\Carbon::parse($date));

        $startDate = request()->start_date ?? null;
        $endDate = request()->end_date ?? null;

        if($startDate)
            $startDate = \Carbon\Carbon::parse($startDate)->format("M d, Y");

        if($endDate)
            $endDate = \Carbon\Carbon::parse($endDate)->format("M d, Y");

        $routeData = [
            'start_date' => request()->start_date ?? now()->format("Y-m-01 00:00:00"),
            'end_date' => request()->end_date ?? now()->format("Y-m-t 23:59:59")
        ];

        if(request()->payment_id)
        {
            $routeData['payment_id'] = request()->payment_id;
        }

        $xslx = route("publisher.reports.transactions.export", array_merge($routeData, ['type' => 'xlsx']));
        $csv = route("publisher.reports.transactions.export", array_merge($routeData, ['type' => 'csv']));
    ?>

    <script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/js/moment/moment.min.js")); ?>"></script>
    <script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/js/daterangepicker.js")); ?>"></script>
    <script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/js/moment.js")); ?>"></script>
    <script>
        function sendAjaxRequest(dataObj) {
            $.ajax({
                url: '<?php echo e(route("publisher.reports.transactions.list")); ?>',
                type: 'GET',
                data: dataObj,
                success: function (response) {
                    $("#totalResults").html(response.total);
                    $("#ap-overview").html(response.html);
                    changeLimit()
                }
            });
        }

        function clearFilter(key) {
            let url = new URL(document.URL);
            let urlParams = url.searchParams;
            if (key == "clearSearchByName") {
                $("#SearchByName").val("");
                if (urlParams.has(`search_by_name`)) {
                    urlParams.delete(`search_by_name`);
                    filterTransactions("search_by_name", "SearchByName");
                }
            }
            history.pushState({}, null, url.href);
            $(`#${key}`).hide();
        }

        function showClear(key) {
            if ($(`#clear${key}`).length)
                $(`#clear${key}`).show();
        }

        function filterTransactions(field, id) {
            showClear(id);
            let data = $(`#${id}`).val();
            let dataObj = {[`${field}`]: data.toString()};

            $("#ap-overview").html("");

            let url = new URL(document.URL);
            let urlParams = url.searchParams;

            if (url.search) {
                if (urlParams.has(`${field}`)) {
                    urlParams.delete(`${field}`);
                }
                if (urlParams.has('page')) {
                    urlParams.delete('page');
                    urlParams.append('page', "1");
                }
            }
            urlParams.append(field, data);
            history.pushState({}, null, url.href);

            url = new URL(document.URL);
            urlParams = url.searchParams;

            dataObj.start_date = urlParams.get(`start_date`);
            dataObj.end_date = urlParams.get(`end_date`);
            dataObj.search_by_name = urlParams.get(`search_by_name`);
            dataObj.region = urlParams.get(`region`);
            dataObj.section = urlParams.get(`section`);
            if (urlParams.has('payment_id')) {
                dataObj.payment_id = urlParams.get(`payment_id`);
            }
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
                    data: {"limit": $("#limit").val(), "type": "transaction"},
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

            <?php if(!request()->payment_id): ?>

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
                        'Current Month': [moment().startOf('month'), moment().endOf('month')],
                        'Previous Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                        'Current Year': [moment().startOf('year'), moment().endOf('year')],
                        'Previous Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')]
                    },
                });

                
                
                
                
                
                
                $('input[name="date-ranger"]').val(start.format('MMM D, YYYY') + ' - ' + end.format('MMM D, YYYY'));
                $('input[name="date-ranger"]').on('apply.daterangepicker', function (ev, picker) {

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
                        if (urlParams.has('page')) {
                            urlParams.delete('page');
                            urlParams.append('page', "1");
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
                    dataObj.search_by_name = urlParams.get(`search_by_name`);
                    dataObj.section = urlParams.get(`section`);
                    sendAjaxRequest(dataObj);

                });

                $('input[name="date-ranger"]').on('cancel.daterangepicker', function (ev, picker) {
                    $(this).val('');
                });

            <?php endif; ?>

            changeLimit();

            $("#SearchByName").keyup(() => {
                filterTransactions("search_by_name", "SearchByName");
                if (!$("#SearchByName").val()) {
                    $(`#clearSearchByName`).hide();
                }
            });

            $("#region").change(() => {
                filterTransactions("region", "region");
            });

            $("#publisherPagination a").click(() => {
                $("#ap-tabContent").addClass("spin-active");
                $("#gridLoader").removeClass("display-hidden");
            });

            $("#allTransactions, #pendingTransactions, #holdTransactions, #approvedTransactions, #declinedTransactions, #paidTransactions").click((e) => {

                let data = $(e.target);
                let section = data.attr('data-section');
                $("#allTransactions, #pendingTransactions, #holdTransactions, #approvedTransactions, #declinedTransactions, #paidTransactions").removeClass("active");
                if (section === "all") {
                    $("#allTransactions").addClass("active");
                    section = null;
                } else if (section === "pending") {
                    $("#pendingTransactions").addClass("active");
                } else if (section === "hold") {
                    $("#holdTransactions").addClass("active");
                } else if (section === "approved") {
                    $("#approvedTransactions").addClass("active");
                } else if (section === "declined") {
                    $("#declinedTransactions").addClass("active");
                } else if (section === "paid") {
                    $("#paidTransactions").addClass("active");
                }

                let dataObj = {section};

                $("#ap-overview").html("");

                let url = new URL(document.URL);
                let urlParams = url.searchParams;

                if (url.search) {
                    if (urlParams.has(`section`)) {
                        urlParams.delete(`section`);
                    }
                    if (urlParams.has('page')) {
                        urlParams.delete('page');
                        urlParams.append('page', "1");
                    }
                }
                if (section)
                    urlParams.append("section", section);
                history.pushState({}, null, url.href);

                url = new URL(document.URL);
                urlParams = url.searchParams;

                dataObj.start_date = urlParams.get(`start_date`);
                dataObj.end_date = urlParams.get(`end_date`);
                dataObj.search_by_name = urlParams.get(`search_by_name`);
                sendAjaxRequest(dataObj);
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
                            <h4 class="text-capitalize breadcrumb-title">Transactions</h4>

                            <?php echo $__env->make("partial.publisher.transaction_alert", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            <div class="breadcrumb-action justify-content-center flex-wrap">
                                <?php if(!request()->payment_id): ?>
                                    <div class="action-btn">
                                        <div class="form-group mb-0">
                                            <div class="input-container icon-left position-relative">
                                                <span class="input-icon icon-left">
                                                    <span data-feather="calendar"></span>
                                                </span>
                                                <input type="text" class="form-control form-control-default date-ranger"
                                                       name="date-ranger"
                                                       placeholder="Jan 01, <?php echo e(now()->format("Y")); ?> - <?php echo e(now()->format("M d, Y")); ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="dropdown action-btn">
                                    <button class="btn btn-sm btn-default btn-white dropdown-toggle" type="button"
                                            id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                        <i class="la la-download"></i> Export
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <span class="dropdown-item">Export With</span>
                                        <div class="dropdown-divider"></div>
                                        <a href="<?php echo e($xslx); ?>"
                                           id="exportXLSX" class="dropdown-item">
                                            <i class="la la-file-excel"></i> Excel (XLSX)</a>
                                        <a href="<?php echo e($csv); ?>"
                                           id="exportCSV" class="dropdown-item">
                                            <i class="la la-file-csv"></i> CSV</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="userDatatable orderDatatable global-shadow border py-30 px-sm-30 px-20 bg-white radius-xl w-100 mb-30">
                        <div class="project-top-wrapper d-flex justify-content-between flex-wrap mb-25 mt-n10">

                            <div class="d-flex align-items-center flex-wrap justify-content-center">
                                <div class="project-search order-search  global-shadow mt-10">
                                    <div class="order-search__form">
                                        <span data-feather="search"></span>
                                        <input class="form-control mr-sm-2 border-0 box-shadow-none" type="text"
                                               placeholder="Filter by name, id etc..." aria-label="Search"
                                               id="SearchByName" value="<?php echo e(request()->search_by_name); ?>">
                                    </div>
                                </div><!-- End: .project-search -->
                                <div class="project-category d-flex align-items-center mt-xl-10 mt-15">
                                    <a href="javascript:void(0)" id="clearSearchByName"
                                       onclick="clearFilter('clearSearchByName')"
                                       class="margin-left-minus-50px <?php echo e(request()->search_by_name ? null : "display-hidden"); ?>">
                                        <small>Clear</small>
                                    </a>
                                </div>
                                <?php if(!request()->payment_id): ?>
                                    <div class="project-category d-flex align-items-center ml-md-30 mt-xl-10 mt-15">
                                        <p class="fs-14 color-gray text-capitalize mb-10 mb-md-0 mr-10 font-weight-bold text-black">Status :</p>
                                        <div class="project-tap order-project-tap global-shadow">
                                            <ul class="nav px-1" id="ap-tab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link <?php echo e(!request()->section || request()->section == "all" ? "active" : null); ?>"
                                                       data-section="all" id="allTransactions"
                                                       href="javascript:void(0)">All</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link <?php echo e(request()->section == "pending" ? "active" : null); ?>"
                                                       data-section="pending" id="pendingTransactions"
                                                       href="javascript:void(0)">Pending</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link <?php echo e(request()->section == "hold" ? "active" : null); ?>"
                                                       data-section="hold" id="holdTransactions" href="javascript:void(0)">Hold</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link <?php echo e(request()->section == "approved" ? "active" : null); ?>"
                                                       data-section="approved" id="approvedTransactions"
                                                       href="javascript:void(0)">Approved</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link <?php echo e(request()->section == "declined" ? "active" : null); ?>"
                                                       data-section="declined" id="declinedTransactions"
                                                       href="javascript:void(0)">Declined</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link <?php echo e(request()->section == "paid" ? "active" : null); ?>"
                                                       data-section="paid" id="paidTransactions" href="javascript:void(0)">Paid</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div><!-- End: .project-category -->
                                    <div class="project-category d-flex align-items-center ml-md-30 mt-xl-10 mt-15">
                                        <p class="fs-14 color-gray text-capitalize mb-10 mb-md-0 mr-10 font-weight-bold text-black">Region :</p>
                                        <div class="project-category__select global-shadow ">
                                            <select class="js-example-basic-single js-states form-control" id="region">
                                                <option <?php echo e(request()->region == "all" || empty(request()->region) ? "selected" : ""); ?> value="all">All Regions</option>
                                                <?php if($countries && count($countries)): ?>
                                                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($country->advertiser_country): ?>
                                                            <option <?php echo e(request()->region == $country->advertiser_country ? "selected" : ""); ?> value="<?php echo e($country->advertiser_country); ?>"><?php echo e($country->advertiser_country); ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                                <option <?php echo e(request()->region == "unknown" ? "selected" : ""); ?> value="unknown">Unknown</option>
                                            </select>
                                        </div>
                                    </div><!-- End: .project-category -->
                                <?php endif; ?>
                            </div><!-- End: .d-flex -->
                            <div class="content-center mt-10">
                                <p class="fs-14 color-gray text-capitalize mb-10 mb-md-0 mr-10 font-weight-bold text-black">Total
                                    Results: <strong id="totalResults"><?php echo e($total); ?></strong></p>
                            </div><!-- End: .content-center -->
                        </div><!-- End: .project-top-wrapper -->

                        <?php echo $__env->make("partial.admin.alert", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <div id="ap-overview">
                            <?php echo $__env->make("template.publisher.reports.transaction.list_view", compact('transactions'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>

                    </div><!-- End: .userDatatable -->
                </div><!-- End: .col -->
            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.publisher.panel_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tech\resources\views/template/publisher/reports/transaction/list.blade.php ENDPATH**/ ?>