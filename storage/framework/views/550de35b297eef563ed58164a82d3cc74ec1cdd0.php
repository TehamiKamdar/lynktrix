<?php if (! $__env->hasRenderedOnce('7b484b0e-76cc-400b-9a2e-340e0ca7dcea')): $__env->markAsRenderedOnce('7b484b0e-76cc-400b-9a2e-340e0ca7dcea');
$__env->startPush('styles'); ?>
<script>
    function changeLimit() {
        $.ajax({
            url: '<?php echo e(route("publisher.set-limit")); ?>',
            type: 'GET',
            data: { "limit": $("#limit").val(), "type": "text_link" },
            success: function (response) {
                if (response) {
                    window.location.reload();
                }
            },
            error: function (response) {

            }
        });
    }
    function copyText(button, text) {
        if (!text) return;

        navigator.clipboard.writeText(text).then(() => {
            const originalText = button.innerText;

            button.innerText = 'Copied!';
            button.disabled = true;
            button.classList.add("text-success");

            setTimeout(() => {
                button.innerText = originalText;
                button.disabled = false;
                button.classList.remove("text-success");
            }, 1500);
        });
    }
    function sendAjaxRequest(url, urlParams, dataObj) {
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
    function filterTextLinks(field, id) {
        showClear(id);
        let data = $(`#${id}`).val();
        let dataObj = { [`${field}`]: data.toString() };

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
        sendAjaxRequest(url, urlParams, dataObj);
    }
    function showClear(key) {
        $(`#clear${key}`).show();
    }
    function clearFilter(key) {
        let url = new URL(document.URL);
        let urlParams = url.searchParams;
        if (key === "clearSearchByName") {
            $("#SearchByName").val("");
            if (urlParams.has(`search_by_name`)) {
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

<?php if (! $__env->hasRenderedOnce('0c3fb9ed-87e7-4a03-b2ea-c46f40300779')): $__env->markAsRenderedOnce('0c3fb9ed-87e7-4a03-b2ea-c46f40300779');
$__env->startPush('scripts'); ?>

<?php $__env->stopPush(); endif; ?>

<?php $__env->startSection("content"); ?>

    

    <div class="az-content az-content-dashboard">
        <div class="container-fluid">
            <div class="az-content-body">
                <div class="row justify-content-between">
                    <div class="col-12">
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
                                                        href="<?php echo e(route('publisher.creatives.text-links.export', array_merge(['type' => 'xlsx'], $queryParams))); ?>">
                                                        <i class="fa-solid fa-file-excel text-success me-2"></i>
                                                        Export to Excel
                                                    </a>
                                                </li>

                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center"
                                                        href="<?php echo e(route('publisher.creatives.text-links.export', array_merge(['type' => 'csv'], $queryParams))); ?>">
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
                        <!-- End: Top Bar -->
                        <?php echo $__env->make("partial.admin.alert", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <div class="tab-content mt-25" id="ap-tabContent">
                            <?php echo $__env->make("template.publisher.widgets.loader-3", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="tab-pane fade show active" id="ap-overview" role="tabpanel"
                                aria-labelledby="ap-overview-tab">
                                <?php echo $__env->make("template.publisher.creatives.text-links.list_view", compact('links'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                    </div><!-- End: .columns-2 -->
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.publisher.publisher_panel", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\lynktrix\resources\views/template/publisher/creatives/text-links/list.blade.php ENDPATH**/ ?>