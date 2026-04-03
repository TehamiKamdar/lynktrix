<?php if (! $__env->hasRenderedOnce('b6688c34-d044-4597-9d0e-dce191cc59c9')): $__env->markAsRenderedOnce('b6688c34-d044-4597-9d0e-dce191cc59c9');
$__env->startPush('styles'); ?>
    <script>
        function changeLimit()
        {
            $.ajax({
                url: '<?php echo e(route("publisher.set-limit")); ?>',
                type: 'GET',
                data: {"limit": $("#limit").val(), "type": "text_link"},
                success: function (response) {
                    if(response) {
                        window.location.reload();
                    }
                },
                error: function (response) {

                }
            });
        }
        function copyLink(id)
        {
            copyToClipboard(document.getElementById(`trackingURL${id}`))
            normalMsg({"message": `Tracking Successfully Copied.`, "success": true});
        }
        function sendAjaxRequest(url, urlParams, dataObj)
        {
            history.pushState({}, null, url.href);

            url = new URL(document.URL);
            urlParams = url.searchParams;

            dataObj.search_by_name = urlParams.get(`search_by_name`);

            let exportXLSXURL = "<?php echo e(route("publisher.creatives.text-links.export", ['type' => 'xlsx'])); ?>";
            let exportCSVURL = "<?php echo e(route("publisher.creatives.text-links.export", ['type' => 'csv'])); ?>";

            exportXLSXURL = `${exportXLSXURL}${url.search}`;
            exportCSVURL = `${exportCSVURL}${url.search}`;

            $("#exportCSV").attr("href", exportCSVURL);
            $("#exportXLSX").attr("href", exportXLSXURL);

            $.ajax({
                url: '<?php echo e(route("publisher.creatives.text-links.list")); ?>',
                type: 'GET',
                data: dataObj,
                beforeSend: function () {
                },
                success: function (response) {
                    $("#totalResults").html(response.total);
                    $("#ap-overview").html(response.html);
                },
                error: function (response) {

                }
            });
        }
        function filterTextLinks(field, id)
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
                    filterTextLinks("search_by_name", "SearchByName");
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
                filterTextLinks("search_by_name", "SearchByName");
                if (!$("#SearchByName").val()) {
                    $(`#clearSearchByName`).hide();
                }
            });
        });
    </script>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('a8b43490-6fb5-41b5-9f8c-5471003cf33c')): $__env->markAsRenderedOnce('a8b43490-6fb5-41b5-9f8c-5471003cf33c');
$__env->startPush('scripts'); ?>

<?php $__env->stopPush(); endif; ?>

<?php $__env->startSection("content"); ?>

    <div class="contents">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop-breadcrumb">

                        <div class="breadcrumb-main">
                            <h4 class="text-capitalize breadcrumb-title">Text Links</h4>
                            <div class="breadcrumb-action justify-content-center flex-wrap">
                                <div class="project-search project-search--height global-shadow mr-md-10 mt-md-1">
                                    <div class="d-flex align-items-center user-member__form">
                                        <span data-feather="search"></span>
                                        <input class="form-control mr-sm-2 border-0 box-shadow-none" id="SearchByName" type="text" placeholder="Search by Name" aria-label="Search" value="<?php echo e(request()->search_by_name); ?>">
                                    </div>
                                </div>
                                <div class="project-category d-flex align-items-center mt-xl-10 mt-15">
                                    <a href="javascript:void(0)" id="clearSearchByName"
                                       onclick="clearFilter('clearSearchByName')"
                                       class="margin-left-minus-60px margin-top-minus-11px <?php echo e(request()->search_by_name ? null : "display-hidden"); ?>">
                                        <small>Clear</small>
                                    </a>
                                </div>
                                <div class="dropdown action-btn">
                                    <button class="btn btn-sm btn-default btn-white dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="la la-download"></i> Export
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <span class="dropdown-item">Export With</span>
                                        <div class="dropdown-divider"></div>
                                        <?php
                                            $queryParams = request()->all();
                                        ?>
                                        <a href="<?php echo e(route("publisher.creatives.text-links.export", array_merge(['type' => 'xlsx'], $queryParams))); ?>" class="dropdown-item" id="exportXLSX">
                                            <i class="la la-file-excel"></i> Excel (XLSX)</a>
                                        <a href="<?php echo e(route("publisher.creatives.text-links.export", array_merge(['type' => 'csv'], $queryParams))); ?>" class="dropdown-item" id="exportCSV">
                                            <i class="la la-file-csv"></i> CSV</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="project-top-wrapper d-flex justify-content-end flex-wrap mb-25 mt-n10">

                            <div class="content-center mt-10">
                                <p class="fs-14 color-gray text-capitalize mb-10 mb-md-0 mr-10">Total
                                    Results: <strong id="totalResults"><?php echo e($total); ?></strong></p>
                            </div><!-- End: .content-center -->

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <?php echo $__env->make("partial.admin.alert", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="orderDatatable global-shadow border py-30 px-sm-30 px-20 bg-white radius-xl w-100 mb-30" id="ap-overview">
                        <?php echo $__env->make("template.publisher.creatives.text-links.list_view", compact('links'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div><!-- End: .userDatatable -->
                </div><!-- End: .col -->
            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.publisher.panel_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tech\resources\views/template/publisher/creatives/text-links/list.blade.php ENDPATH**/ ?>