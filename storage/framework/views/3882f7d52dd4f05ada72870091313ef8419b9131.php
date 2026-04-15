<?php $__env->startPush('title', 'Transactions'); ?>

<?php if (! $__env->hasRenderedOnce('dcab24ed-33aa-4b52-909c-510e3856e255')): $__env->markAsRenderedOnce('dcab24ed-33aa-4b52-909c-510e3856e255');
$__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/css/daterangepicker.css")); ?>">
    <style>
    .loaded-spin {
        margin: 40%;
        position: absolute;
    }
    .form-label{
        font-size: 10px !important;
        color: #212529bf !important;
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

<?php if (! $__env->hasRenderedOnce('673d7e34-d925-46b9-ae53-76a062401789')): $__env->markAsRenderedOnce('673d7e34-d925-46b9-ae53-76a062401789');
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
                <div class="row justify-content-between">
                    <div class="filter-bar-wrapper mb-4">
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
                                            <label class="form-label fw-semibold small text-muted mb-1">
                                                <i class="fas fa-calendar me-1"></i> Date
                                            </label>
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
                                        <div class="col-md-2">
                                            <label class="form-label fw-semibold small text-muted mb-1">
                                                <i class="fas fa-earth-americas me-1"></i> Region
                                            </label>
                                            <select class="form-control" id="region">
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
                                        <div class="col-8">
                                            <?php if(!request()->payment_id): ?>

                                                <div class="mb-4">
                                                    <label class="form-label fw-semibold mb-2"> <i class="far fa-circle-check"></i> Status</label>

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
                                            <?php endif; ?>
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
                                                <?php if(request()->type && request()->type != 'third_party_advertiser'): ?>
                                                    <span class="badge bg-light text-dark border">
                                                        Type: <?php echo e(request()->type == 'managed_by_linksCircle' ? 'Managed by LinksCircle' : 'Third-Party'); ?>

                                                        <i class="fas fa-times ms-1 text-danger" style="cursor: pointer;" onclick="clearFilter('type')"></i>
                                                    </span>
                                                <?php endif; ?>
                                                <?php $__currentLoopData = explode(',', request()->search_by_category ?? ''); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catId): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($catId): ?>
                                                        <span class="badge bg-light text-dark border">
                                                            Category: <?php echo e(collect($categories)->where('id', $catId)->first()['name'] ?? $catId); ?>

                                                            <i class="fas fa-times ms-1 text-danger" style="cursor: pointer;" onclick="removeCategoryFilter('<?php echo e($catId); ?>')"></i>
                                                        </span>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">

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

<?php echo $__env->make("layouts.publisher.publisher_panel", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\lynktrix\resources\views/template/publisher/reports/transaction/list.blade.php ENDPATH**/ ?>