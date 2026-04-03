<?php if (! $__env->hasRenderedOnce('b6f4a765-0c0f-47f2-91b8-4041734aa5b8')): $__env->markAsRenderedOnce('b6f4a765-0c0f-47f2-91b8-4041734aa5b8');
$__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/css/daterangepicker.css")); ?>">
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('d98cace6-7e99-4f5b-8ac1-7083adc4ff1f')): $__env->markAsRenderedOnce('d98cace6-7e99-4f5b-8ac1-7083adc4ff1f');
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
            dataObj.section = urlParams.get(`section`);
            sendAjaxRequest(dataObj);
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
                    days: 30
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
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
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

            $("#publisherPagination a").click(() => {
                $("#ap-tabContent").addClass("spin-active");
                $("#gridLoader").removeClass("display-hidden");
            });

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

            $("#SearchByName").keyup(() => {
                filterTransactions("search_by_name", "SearchByName");
                if (!$("#SearchByName").val()) {
                    $(`#clearSearchByName`).hide();
                }
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
                            <h4 class="text-capitalize breadcrumb-title">Payments</h4>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="userDatatable orderDatatable global-shadow border py-30 px-sm-30 px-20 bg-white radius-xl w-100 mb-30">

                        <?php echo $__env->make("partial.admin.alert", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        
                        <div id="ap-overview">
                            <?php echo $__env->make("template.publisher.payments.list_view", compact('payments'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>

                    </div><!-- End: .userDatatable -->
                </div><!-- End: .col -->
            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.publisher.panel_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tech\resources\views/template/publisher/payments/list.blade.php ENDPATH**/ ?>