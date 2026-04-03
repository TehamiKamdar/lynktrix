<?php if (! $__env->hasRenderedOnce('964c9784-dd23-42e2-8915-c2fce32aeafd')): $__env->markAsRenderedOnce('964c9784-dd23-42e2-8915-c2fce32aeafd');
$__env->startPush('styles'); ?>
    <style>
        .user-member__form .form-control {
            padding: 10px 33px 10px 13px !important;
        }
    </style>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('2ce53074-7439-4b02-92e4-84bca4c48218')): $__env->markAsRenderedOnce('2ce53074-7439-4b02-92e4-84bca4c48218');
$__env->startPush('scripts'); ?>
    <script>
        function changeLimit()
        {
            $.ajax({
                url: '<?php echo e(route("publisher.set-limit")); ?>',
                type: 'GET',
                data: {"limit": $("#limit").val(), "type": "coupon"},
                success: function (response) {
                    if(response) {
                        window.location.reload();
                    }
                },
                error: function (response) {

                }
            });
        }
        function clickToCopy(id, msg)
        {
            copyToClipboard(document.getElementById(id))
            normalMsg({"message": msg, "success": true});
        }
        function prepareVoucherFormContent(id)
        {
            $.ajax({
                url: `/publisher/creatives/coupons/${id}`,
                type: 'GET',
                success: function (response) {
                    $("#voucherModalContent").html(response)
                },
                error: function (response) {

                }
            });
        }
        function sendAjaxRequest(url, urlParams, dataObj)
        {
            history.pushState({}, null, url.href);

            url = new URL(document.URL);
            urlParams = url.searchParams;

            dataObj.search_by_name = urlParams.get(`search_by_name`);

            let exportXLSXURL = "<?php echo e(route("publisher.creatives.coupons.export", ['type' => 'xlsx'])); ?>";
            let exportCSVURL = "<?php echo e(route("publisher.creatives.coupons.export", ['type' => 'csv'])); ?>";

            exportXLSXURL = `${exportXLSXURL}${url.search}`;
            exportCSVURL = `${exportCSVURL}${url.search}`;

            $("#exportCSV").attr("href", exportCSVURL);
            $("#exportXLSX").attr("href", exportXLSXURL);

            $.ajax({
                url: '<?php echo e(route("publisher.creatives.coupons.list")); ?>',
                type: 'GET',
                data: dataObj,
                beforeSend: function () {
                },
                success: function (response) {
                    $("#totalResults").html(response.total);
                    $("#ap-overview").html(response.html);
                    // changeLimit();
                },
                error: function (response) {

                }
            });
        }
        function filterCoupons(field, id)
        {
            showClear(id);
            let data = $(`#${id}`).val();
            let dataObj = {[`${field}`]: data.toString()};

            $("#ap-overview").html("");

            let url = new URL(document.URL);
            let urlParams = url.searchParams;

            if(url.search) {
                if(urlParams.has(`${field}`)) {
                    urlParams.delete(`${field}`);
                }
                if(urlParams.has('page')) {
                    urlParams.delete('page');
                    urlParams.append('page', "1");
                }
            }
            urlParams.append(field, data);
            sendAjaxRequest(url, urlParams, dataObj);
        }
        function showClear(key)
        {
            $(`#clear${key}`).show();
        }
        function clearFilter(key)
        {
            let url = new URL(document.URL);
            let urlParams = url.searchParams;
            if(key === "clearSearchByName")
            {
                $("#SearchByName").val("");
                if(urlParams.has(`search_by_name`)) {
                    urlParams.delete(`search_by_name`);
                    filterCoupons("search_by_name", "SearchByName");
                }
            }
            history.pushState({}, null, url.href);
            $(`#${key}`).hide();
        }
        document.addEventListener("DOMContentLoaded", function () {
            $("#limit").change(() => {
                changeLimit();
            });
            $("#SearchByName").keyup(() => {
                filterCoupons("search_by_name", "SearchByName");
                if (!$("#SearchByName").val()) {
                    $(`#clearSearchByName`).hide();
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
                    <div>
                        <h2 class="az-dashboard-title">Special Offers</h2>
                        <p class="az-dashboard-text">
                            Total <span id="totalAdvertiser"><?php echo e($total); ?></span> offers found
                        </p>
                    </div>
                </div>
                <div class="az-dashboard-nav">
                    <nav class="nav">
                        <a class="nav-link active" data-toggle="tab" href="#">Coupons</a>
                    </nav>

                    <nav class="nav">
                        <?php
                            $queryParams = request()->all();
                        ?>
                        <a class="nav-link text-success" href="<?php echo e(route("publisher.creatives.coupons.export", array_merge(['type' => 'xlsx'], $queryParams))); ?>" id="exportXLSX"><i class="fa-solid fa-file-excel"></i> Export to Excel</a>
                        <a class="nav-link text-success" href="<?php echo e(route("publisher.creatives.coupons.export", array_merge(['type' => 'csv'], $queryParams))); ?>" id="exportCSV"><i class="fa-solid fa-file-csv"></i> Export to CSV</a>
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
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-4 col-sm-12">
                        <!-- End: Top Bar -->
                        <?php echo $__env->make("partial.admin.alert", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <div class="tab-content mt-25" id="ap-tabContent">
                            <?php echo $__env->make("template.publisher.widgets.loader-3", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="tab-pane fade show active" id="ap-overview" role="tabpanel"
                                aria-labelledby="ap-overview-tab">
                                <?php echo $__env->make("template.publisher.creatives.coupons.list_view", compact('coupons'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                    </div><!-- End: .columns-2 -->
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.publisher.publisher_panel", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Downloads\application\resources\views/template/publisher/creatives/coupons/list.blade.php ENDPATH**/ ?>