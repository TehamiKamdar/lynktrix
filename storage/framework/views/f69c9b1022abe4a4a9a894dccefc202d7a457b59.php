<?php if (! $__env->hasRenderedOnce('669e9b7c-78f7-458c-aed5-2e92db0573ba')): $__env->markAsRenderedOnce('669e9b7c-78f7-458c-aed5-2e92db0573ba');
$__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/css/daterangepicker.css")); ?>">
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('8f2b9bf7-7f2d-4855-be93-d4261dc62402')): $__env->markAsRenderedOnce('8f2b9bf7-7f2d-4855-be93-d4261dc62402');
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

    <div class="az-content az-content-dashboard">

        <div class="container-fluid">
            <div class="az-content-body">

                <div class="az-dashboard-one-title">
                    <div>
                        <h2 class="az-dashboard-title">All Conversions</h2>
                        <p class="az-dashboard-text">Total Results: <strong><?php echo e($total); ?></strong> </p>
                    </div>
                    <?php echo $__env->make("partial.publisher.transaction_alert", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="az-dashboard-nav">
                    <nav class="nav">
                        <a class="nav-link active" data-toggle="tab" href="#">Transactions</a>
                    </nav>

                    <nav class="nav">
                        <a class="nav-link text-success" href="<?php echo e($xslx); ?>" id="exportXLSX"><i class="fa-solid fa-file-excel"></i> Export to Excel</a>
                        <a class="nav-link text-success" href="<?php echo e($csv); ?>" id="exportCSV"><i class="fa-solid fa-file-csv"></i> Export to CSV</a>
                        <a class="nav-link" href="#"><i class="fas fa-ellipsis-h"></i></a>
                    </nav>
                    
                </div>
                <div class="row justify-content-between">
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="card shadow-sm border-0 rounded-3 sticky-lg-top">
                            <!-- Header -->
                            <div class="card-header bg-primary text-white py-3 px-4">
                                <h5 class="mb-0 d-flex align-items-center fw-semibold">
                                    <i class="fas fa-sliders-h me-2"></i> Filters
                                </h5>
                            </div>

                            <!-- Body -->
                            <div class="card-body p-4">

                                <!-- Search Filter -->
                                <div class="mb-4 pb-3 border-bottom">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h6 class="mb-0 fw-semibold d-flex align-items-center">
                                            <i class="fas fa-search me-2 text-muted"></i> Search
                                        </h6>
                                        <a href="javascript:void(0)" id="clearSearchByName"
                                            onclick="clearFilter('clearSearchByName')"
                                            class="text-danger <?php echo e(request()->search_by_name ? '' : 'd-none'); ?>">
                                            <i class="fas fa-times me-1"></i> Clear
                                        </a>
                                    </div>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="fas fa-search text-muted"></i>
                                        </span>
                                        <input type="text" class="form-control border-start-0" id="SearchByName"
                                            placeholder="Search by name..." value="<?php echo e(request()->search_by_name); ?>">
                                    </div>
                                </div>

                                <div class="mb-4 pb-3 border-bottom">
                                    <?php if(!request()->payment_id): ?>
                                        <div class="action-btn">
                                            <div class="form-group mb-0">
                                                <div class="input-container icon-left position-relative">
                                                    <span class="input-icon icon-left">
                                                        <span data-feather="calendar"></span>
                                                    </span>
                                                    <input type="text" class="form-control form-control-default date-ranger" name="date-ranger" placeholder="Jan 01, <?php echo e(now()->format("Y")); ?> - <?php echo e(now()->format("M d, Y")); ?>"/>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <?php if(!request()->payment_id): ?>

                                    <div class="mb-4">
                                        <label class="form-label fw-semibold mb-2">Status</label>

                                        <ul class="nav nav-pills flex-wrap gap-2" id="transactionStatus">
                                            <li class="nav-item">
                                                <a class="nav-link <?php echo e(!request()->section || request()->section == 'all' ? 'active' : ''); ?>" data-section="all" href="javascript:void(0)" id="allTransactions">
                                                    All
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link <?php echo e(request()->section == 'pending' ? 'active' : ''); ?>" data-section="pending" href="javascript:void(0)" id="pendingTransactions">
                                                    Pending
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link <?php echo e(request()->section == 'hold' ? 'active' : ''); ?>" data-section="hold" href="javascript:void(0)" id="holdTransactions">
                                                    Hold
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link <?php echo e(request()->section == 'approved' ? 'active' : ''); ?>" data-section="approved" href="javascript:void(0)" id="approvedTransactions">
                                                    Approved
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link <?php echo e(request()->section == 'declined' ? 'active' : ''); ?>" data-section="declined" href="javascript:void(0)" id="declinedTransactions">
                                                    Declined
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link <?php echo e(request()->section == 'paid' ? 'active' : ''); ?>" data-section="paid" href="javascript:void(0)" id="paidTransactions">
                                                    Paid
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="mb-3">
                                        <label for="region" class="form-label fw-semibold">Region</label>

                                        <select class="form-select" id="region">
                                            <option value="all" <?php echo e(request()->region == 'all' || empty(request()->region) ? 'selected' : ''); ?>>
                                                All Regions
                                            </option>

                                            <?php $__currentLoopData = $countries ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($country->advertiser_country): ?>
                                                    <option value="<?php echo e($country->advertiser_country); ?>"
                                                        <?php echo e(request()->region == $country->advertiser_country ? 'selected' : ''); ?>>
                                                        <?php echo e($country->advertiser_country); ?>

                                                    </option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <option value="unknown" <?php echo e(request()->region == 'unknown' ? 'selected' : ''); ?>>
                                                Unknown
                                            </option>
                                        </select>
                                    </div>

                                <?php endif; ?>

                                <p class="fs-14 color-gray text-capitalize mb-10 mb-md-0 mr-10 font-weight-bold text-black"><strong id="totalResults"></strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-4 col-sm-12">

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

<?php echo $__env->make("layouts.publisher.publisher_panel", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Downloads\application\resources\views/template/publisher/reports/transaction/list.blade.php ENDPATH**/ ?>