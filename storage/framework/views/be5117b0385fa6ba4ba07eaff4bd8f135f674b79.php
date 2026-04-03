<?php if (! $__env->hasRenderedOnce('4d4625bd-8566-44de-a187-41f6ea94cb9e')): $__env->markAsRenderedOnce('4d4625bd-8566-44de-a187-41f6ea94cb9e');
$__env->startPush('styles'); ?>

<link rel="stylesheet" href="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/css/select2.min.css")); ?>" />
<style>
    :root {
        --primary-color: #5b47fb;
        --primary-light: rgba(91, 71, 251, 0.1);
        --border-color: #eef1f7;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        display: none;
    }

    .select2-container {
        z-index: 9999 !important;
    }

    .select2-dropdown {
        z-index: 999999 !important;
    }

    /* Brand Tabs Styling */
    .nav-tabs-wrapper {
        position: relative;
    }

    .nav-tabs {
        gap: 2px;
    }

    .nav-tabs .nav-item .nav-link {
        background: transparent;
        border: none;
        color: #6c757d;
        font-weight: 500;
        font-size: 0.875rem;
        border-radius: 6px 6px 0 0 !important;
        position: relative;
        transition: all 0.2s ease;
        margin-bottom: -1px;
        border: 1px solid transparent;
        border-bottom: none;
    }

    .nav-tabs .nav-item .nav-link:hover {
        color: var(--primary-color);
        background-color: var(--primary-light);
        border-color: var(--border-color) var(--border-color) transparent;
    }

    .nav-tabs .nav-item .nav-link.active {
        color: var(--primary-color);
        background-color: white;
        border-color: var(--border-color) var(--border-color) transparent;
        border-top: 2px solid var(--primary-color);
        font-weight: 600;
        position: relative;
        z-index: 1;
    }

    /* Active state with top-left-right borders only */
    .nav-tabs .nav-item .nav-link.active::after {
        content: '';
        position: absolute;
        bottom: -1px;
        left: 0;
        right: 0;
        height: 1px;
        background: white;
        z-index: 2;
    }

    /* View Tabs Styling */
    .view-tabs {
        border: 1px solid var(--border-color);
        border-radius: 6px;
        overflow: hidden;
        background: white;
    }

    .view-tabs .btn {
        background: transparent;
        border: none;
        color: #6c757d;
        font-weight: 500;
        font-size: 0.875rem;
        padding: 0.5rem 1rem;
        border-radius: 0;
        transition: all 0.2s ease;
        position: relative;
    }

    .view-tabs .btn:first-child {
        border-right: 1px solid var(--border-color);
    }

    .view-tabs .btn:hover {
        color: var(--primary-color);
        background-color: var(--primary-light);
    }

    .view-tabs .btn-check:checked + .btn {
        color: var(--primary-color);
        background-color: white;
        font-weight: 600;
        position: relative;
    }

    /* Active state with top-left-right borders for view tabs */
    .view-tabs .btn-check:checked + .btn::before {
        content: '';
        position: absolute;
        top: -1px;
        left: -1px;
        right: -1px;
        height: 2px;
        background: var(--primary-color);
        border-radius: 6px 6px 0 0;
    }

    .view-tabs .btn-check:checked + .btn {
        border-top: 2px solid var(--primary-color);
        border-left: 1px solid var(--border-color);
        border-right: 1px solid var(--border-color);
        margin-top: -1px;
    }

    /* Sleek minimal design */
    .nav-tabs .nav-link,
    .view-tabs .btn {
        box-shadow: none !important;
        outline: none !important;
    }

    /* Icons styling */
    .nav-tabs .nav-link i,
    .view-tabs .btn i {
        font-size: 0.875rem;
        width: 16px;
        text-align: center;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .d-flex.justify-content-between {
            flex-direction: column !important;
            align-items: flex-start !important;
        }

        .view-toggle-container {
            margin-top: 1rem;
            width: 100%;
        }

        .nav-tabs {
            flex-wrap: wrap;
        }

        .nav-tabs .nav-item {
            margin-bottom: 0.25rem;
        }
    }

    /* Border radius fix */
    .nav-tabs .nav-link {
        border-top-left-radius: 6px !important;
        border-top-right-radius: 6px !important;
        border-bottom-left-radius: 0 !important;
        border-bottom-right-radius: 0 !important;
    }

    .form-select[multiple]:focus,
    .form-select[multiple]:active {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.25rem rgba(91, 71, 251, 0.25);
    }

    .form-check-input:checked {
        background-color: var(--primary-color) !important;
        border-color: var(--primary-color) !important;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.25rem rgba(91, 71, 251, 0.25);
    }

    .btn-primary {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }

    .btn-primary:hover {
        background-color: #4a3bd9;
        border-color: #4a3bd9;
    }

    .btn-outline-secondary:hover {
        color: var(--primary-color);
        border-color: var(--primary-color);
    }

    .sticky-lg-top {
        z-index: 1020;
    }

    .border-bottom,
    .border-top {
        border-color: #eef1f7 !important;
    }

    .text-muted {
        color: #6c757d !important;
    }

    .fw-semibold {
        font-weight: 600;
    }

    option:checked {
        background-color: rgba(91, 71, 251, 0.1);
        color: var(--primary-color);
        font-weight: 500;
    }

    .form-check-label {
        cursor: pointer;
        transition: color 0.2s;
    }

    .form-check-label:hover {
        color: var(--primary-color);
    }

    .loaded-spin {
        margin: 20% 50%;
        position: absolute;
    }
</style>

<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('c021e2c2-0b5c-4aab-98e1-3f82a07a267a')): $__env->markAsRenderedOnce('c021e2c2-0b5c-4aab-98e1-3f82a07a267a');
$__env->startPush('scripts'); ?>
<script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/js/select2.full.min.js")); ?>"></script>
<script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/js/drawer.js")); ?>"></script>
<?php $section = request()->section ?? null; ?>
<?php $page = request()->page ?? null; ?>
<script>
    function openDrawer(e) {
        const drawerBasic = document.querySelector(".drawer-basic-wrap");
        const overlay = document.querySelector(".overlay-dark");
        const areaDrawer = document.querySelector(".area-drawer");
        const areaOverlay = document.querySelector(".area-overlay");
        e.preventDefault();
        if (this.dataset.drawer == "basic") {
            drawerBasic.classList.remove("account");
            drawerBasic.classList.remove("profile");
            drawerBasic.classList.add("basic");
            drawerBasic.classList.add("show");
            overlay.classList.add("show");
        } else if (this.dataset.drawer == "area") {
            areaDrawer.classList.add("show");
            areaOverlay.classList.add("show");
        } else if (this.dataset.drawer == "account") {
            drawerBasic.classList.remove("basic");
            drawerBasic.classList.remove("profile");
            drawerBasic.classList.add("account");
            drawerBasic.classList.add("show");
            overlay.classList.add("show");
        } else if (this.dataset.drawer == "profile") {
            drawerBasic.classList.remove("basic");
            drawerBasic.classList.remove("account");
            drawerBasic.classList.add("profile");
            drawerBasic.classList.add("show");
            overlay.classList.add("show");
        }
    }
    function sendAjaxRequest(url, urlParams, dataObj) {
        history.pushState({}, null, url.href);

        url = new URL(document.URL);
        urlParams = url.searchParams;

        dataObj.search_by_country = urlParams.get(`search_by_country`);
        dataObj.search_by_promotional_method = urlParams.get(`search_by_promotional_method`);
        dataObj.search_by_name = urlParams.get(`search_by_name`);
        dataObj.section = urlParams.get(`section`);
        dataObj.type = urlParams.get(`type`);
        // dataObj.source = urlParams.get(`source`);

        let exportXLSXURL = "<?php echo e(route("publisher.export-advertisers", ['type' => 'xlsx'])); ?>";
        let exportCSVURL = "<?php echo e(route("publisher.export-advertisers", ['type' => 'csv'])); ?>";

        exportXLSXURL = `${exportXLSXURL}${url.search}`;
        exportCSVURL = `${exportCSVURL}${url.search}`;

        $("#exportCSV").attr("href", exportCSVURL);
        $("#exportXLSX").attr("href", exportXLSXURL);

        $.ajax({
            url: '<?php echo e(route(request()->route()->getName())); ?>',
            type: 'GET',
            data: dataObj,
            success: function (response) {
                console.log(response.total);
                $("#totalAdvertiser").html(response.total);
                $("#ap-overview").html(response.html);
                changeLimit();
                const drawerTriggers = document.querySelectorAll(".drawer-trigger");
                if (drawerTriggers) {
                    drawerTriggers.forEach((drawerTrigger) =>
                        drawerTrigger.addEventListener("click", openDrawer)
                    );
                }
            },
            error: function (response) {

                $("#ap-tabContent").removeClass("spin-active");
                $("#gridLoader3").addClass("display-hidden");
            }
        }).done(function () {
            $("#ap-tabContent").removeClass("spin-active");
            $("#gridLoader3").addClass("display-hidden");
        });
    }
    function filterAdvertiser(field, id) {
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
    function clearFilter(key) {
        let url = new URL(document.URL);
        let urlParams = url.searchParams;
        if (key === "clearSearchByName") {
            $("#SearchByName").val("");
            if (urlParams.has(`search_by_name`)) {
                urlParams.delete(`search_by_name`);
                filterAdvertiser("search_by_name", "SearchByName");
            }
        }
        else if (key === "clearSearchByCountry") {
            $("#SearchByCountry").val("").trigger("change");
            if (urlParams.has(`search_by_country`)) {
                urlParams.delete(`search_by_country`);
                filterAdvertiser("search_by_country", "SearchByCountry");
            }
        }
        else if (key === "clearSearchByCategory") {
            $("#SearchByCategory").val("").trigger("change");
            if (urlParams.has(`search_by_category`)) {
                urlParams.delete(`search_by_category`);
                filterAdvertiser("search_by_category", "SearchByCategory");
            }
        }
        else if (key === "clearSearchByPromotionalMethod") {
            $("#SearchByPromotionalMethod").val("").trigger("change");
            if (urlParams.has(`search_by_promotional_method`)) {
                urlParams.delete(`search_by_promotional_method`);
                filterAdvertiser("search_by_promotional_method", "SearchByPromotionalMethod");
            }
        }
        history.pushState({}, null, url.href);
        $(`#${key}`).hide();
    }
    function showClear(key) {
        $(`#clear${key}`).removeClass('d-none', true);
    }
    function pushInfo(id, name) {
        $("#advertiser_id").val(id);
        $("#advertiser_name").val(name);
    }
    function view(view) {
        $.ajax({
            url: '<?php echo e(route("publisher.set-advertiser-view")); ?>',
            type: 'GET',
            data: { view },
            success: function (response) {
                if (response) {
                    window.location.reload();
                }
            },
            error: function (response) {

            }
        });
    }
    function openApplyModal(id, name) {
        $("#advertiserID").html(`Brand ID: ${id}`)
        $("#advertiserName").html(name)
        $("#a_id").val(id)
        $("#a_name").val(name)
    }
    function advertiserType(type) {
        let url = new URL(document.URL);
        let urlParams = url.searchParams;

        // let sourcesStr = urlParams.get("source");
        // let sourceArr = sourcesStr ? sourcesStr.split(',') : [];
        // let source = sourceArr.indexOf(type)
        // if(source > -1)
        //     sourceArr.splice(source, 1);
        // else
        //     sourceArr.push(type)

        $("#ap-overview").html("");

        if (url.search) {
            // if(urlParams.has(`source`)) {
            //     urlParams.delete(`source`);
            // }
            if (urlParams.has('page')) {
                urlParams.delete('page');
                urlParams.append('page', "1");
            }
        }

        // source = sourceArr.toString();

        // let dataObj = {source};
        //
        // if(source)
        //     urlParams.append("source", source);

        sendAjaxRequest(url, urlParams, dataObj);

    }
    function changeLimit() {
        $("#limit").change(() => {
            $("#ap-overview").addClass("spin-active");
            $.ajax({
                url: '<?php echo e(route("publisher.set-limit")); ?>',
                type: 'GET',
                data: { "limit": $("#limit").val(), "type": "advertiser" },
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
    function fetchAdvertisers(section, dataObj, clearPage) {
        let url = new URL(document.URL);
        let urlParams = url.searchParams;
        //
        if (url.search) {
            if (urlParams.has(`section`)) {
                urlParams.delete(`section`);
            }
            if (clearPage && urlParams.has('page')) {
                urlParams.delete(`page`);
                urlParams.append('page', "1");
            }
        }
        if (section)
            urlParams.append("section", section);

        sendAjaxRequest(url, urlParams, dataObj);
    }
    document.addEventListener("DOMContentLoaded", function () {

        changeLimit();
        $("#SearchByCountry, #SearchByPromotionalMethod, #SearchByCategory").select2({
            placeholder: "Please Select",
            dropdownCssClass: "tag",
            allowClear: false,

        });
        $("#SearchByName").keyup(() => {
            console.log("Keyword");
            filterAdvertiser("search_by_name", "SearchByName");
            if (!$("#SearchByName").val()) {
                $(`#clearSearchByName`).hide();
            }
        });
        $("#SearchByCountry").change(() => {
            console.log('Country')
            filterAdvertiser("search_by_country", "SearchByCountry")
        });
        $("#SearchByCategory").change(() => {
            console.log('Category');
            filterAdvertiser("search_by_category", "SearchByCategory")
        });
        $("input[name='advertiserType']").change(() => {
            let type = $("input[name='advertiserType']:checked").val();
            let dataObj = { type };

            let url = new URL(document.URL);
            let urlParams = url.searchParams;

            if (url.search) {
                if (urlParams.has('type')) {
                    urlParams.delete('type');
                }
                if (urlParams.has('page')) {
                    urlParams.delete('page');
                    urlParams.append('page', "1");
                }
            }

            urlParams.append("type", type);
            sendAjaxRequest(url, urlParams, dataObj);
        });

        $("#SearchByPromotionalMethod").change(() => {
            filterAdvertiser("search_by_promotional_method", "SearchByPromotionalMethod")
        });
        $("#allBrands, #notJoinedBrands, #joinedBrands, #newBrands, #pendingBrands, #rejectedBrands, #holdBrands").click(function (e) {
            $("#ap-tabContent").addClass("spin-active");
            $("#gridLoader3").removeClass("display-hidden");
            let data = $(e.target);
            let section = data.attr('data-section');
            $("#allBrands, #newBrands, #notJoinedBrands, #joinedBrands, #newBrands, #pendingBrands, #holdBrands, #rejectedBrands").removeClass("active");
            if (section === "all") {
                $("#allBrands").addClass("active");
                section = null;
            }
            else if (section === "new") {
                $("#newBrands").addClass("active");
            }
            else if (section === "joined") {
                $("#joinedBrands").addClass("active");
            }
            else if (section === "not-joined") {
                $("#notJoinedBrands").addClass("active");
            }
            else if (section === "pending") {
                $("#pendingBrands").addClass("active");
            }
            else if (section === "hold") {
                $("#holdBrands").addClass("active");
            }
            else if (section === "rejected") {
                $("#rejectedBrands").addClass("active");
            }

            let dataObj = { section };
            fetchAdvertisers(section, dataObj, true);
        });

        $("#ap-tabContent").addClass("spin-active");
        $("#gridLoader3").removeClass("display-hidden");
        let section = "<?php echo e($section); ?>";
        let page = "<?php echo e($page); ?>";
        let dataObj = { section, page };
        fetchAdvertisers(section, dataObj);

        $("#applyAdvertiser").submit(function () {
            $("#applyAdvertiserBttn").prop('disabled', true);
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
                        <h2 class="az-dashboard-title">Brands</h2>
                        <p class="az-dashboard-text">
                            Total <span id="totalAdvertiser">0</span> brands found
                        </p>
                    </div>
                </div>
                <div class="az-dashboard-nav">
                    <nav class="nav">
                        <a class="nav-link active" data-toggle="tab" href="#">Our Brands</a>
                    </nav>

                    <nav class="nav">
                        <?php
                            $queryParams = request()->all();
                        ?>
                        <a class="nav-link text-success" href="<?php echo e(route("publisher.export-advertisers", array_merge(['type' => 'xlsx'], $queryParams))); ?>" id="exportXLSX"><i class="fa-solid fa-file-excel"></i> Export to Excel</a>
                        <a class="nav-link text-success" href="<?php echo e(route("publisher.export-advertisers", array_merge(['type' => 'csv'], $queryParams))); ?>" id="exportCSV"><i class="fa-solid fa-file-csv"></i> Export to CSV</a>
                        <a class="nav-link" href="#"><i class="fas fa-ellipsis-h"></i></a>
                    </nav>
                    
                </div>
                <div class="row justify-content-between">
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="card shadow-sm border-0 rounded-3 sticky-lg-top" style="top: 10px;">
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

                                <!-- Country Filter -->
                                <div class="mb-4 pb-3 border-bottom">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h6 class="mb-0 fw-semibold d-flex align-items-center">
                                            <i class="fas fa-globe-americas me-2 text-muted"></i> Country
                                        </h6>
                                        <a href="javascript:void(0)" id="clearSearchByCountry"
                                            onclick="clearFilter('clearSearchByCountry')"
                                            class="text-danger <?php echo e(request()->search_by_country ? '' : 'd-none'); ?>">
                                            <i class="fas fa-times me-1"></i> Clear
                                        </a>
                                    </div>
                                    <div class="form-group">
                                        <select id="SearchByCountry" class="form-select" multiple>
                                            <?php
    $countriesArr = [];
    if (str_contains(request()->search_by_country, ',')) {
        $countriesArr = explode(',', request()->search_by_country);
    } else {
        $countriesArr = [request()->search_by_country];
    }
                                            ?>
                                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php if(in_array($country['iso2'], $countriesArr)): ?> selected <?php endif; ?>
                                                    value="<?php echo e($country['iso2']); ?>">
                                                    <i class="fas fa-flag me-1"></i> <?php echo e($country['name']); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <small class="text-muted mt-1 d-block">Hold Ctrl/Cmd to select multiple</small>
                                    </div>
                                </div>

                                <!-- Advertiser Type Filter -->
                                <div class="mb-4 pb-3 border-bottom">
                                    <h6 class="mb-3 fw-semibold d-flex align-items-center">
                                        <i class="fas fa-users me-2 text-muted"></i> Advertiser Type
                                    </h6>
                                    <div class="form-check form-check-inline d-block mb-2">
                                        <input class="form-check-input" type="radio" name="advertiserType"
                                            id="advertiserAll" value="all" <?php echo e(request()->type == "third_party_advertiser" || empty(request()->type) ? "checked" : ""); ?>>
                                        <label class="form-check-label" for="advertiserAll">
                                            <i class="fas fa-layer-group me-1 text-primary"></i> All Advertisers
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline d-block mb-2">
                                        <input class="form-check-input" type="radio" name="advertiserType"
                                            id="advertiserThirdParty" value="third_party_advertiser" <?php echo e(request()->type == "third_party_advertiser" ? "checked" : ""); ?>>
                                        <label class="form-check-label" for="advertiserThirdParty">
                                            <i class="fas fa-user-friends me-1 text-warning"></i> Third-Party Advertisers
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline d-block">
                                        <input class="form-check-input" type="radio" name="advertiserType"
                                            id="advertiserManaged" value="managed_by_linksCircle" <?php echo e(request()->type == "managed_by_linksCircle" ? "checked" : ""); ?>>
                                        <label class="form-check-label" for="advertiserManaged">
                                            <i class="fas fa-cog me-1 text-success"></i> Managed by LinksCircle
                                        </label>
                                    </div>
                                </div>

                                <!-- Categories Filter -->
                                <div class="mb-4 pb-3 border-bottom">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h6 class="mb-0 fw-semibold d-flex align-items-center">
                                            <i class="fas fa-tags me-2 text-muted"></i> Categories
                                        </h6>
                                        <a href="javascript:void(0)" id="clearSearchByCategory"
                                            onclick="clearFilter('clearSearchByCategory')"
                                            class="text-danger <?php echo e(request()->search_by_category ? '' : 'd-none'); ?>">
                                            <i class="fas fa-times me-1"></i> Clear
                                        </a>
                                    </div>
                                    <div class="form-group">
                                        <select id="SearchByCategory" class="form-select form-select-sm" multiple size="4">
                                            <?php
    $categoryArr = [];
    if (str_contains(request()->search_by_category, ',')) {
        $categoryArr = explode(',', request()->search_by_category);
    } else {
        $categoryArr = [request()->search_by_category];
    }
                                            ?>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php if(in_array($category['id'], $categoryArr)): ?> selected <?php endif; ?>
                                                    value="<?php echo e($category['id']); ?>">
                                                    <i class="fas fa-folder me-1"></i> <?php echo e($category['name']); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <small class="text-muted mt-1 d-block">Hold Ctrl/Cmd to select multiple</small>
                                    </div>
                                </div>

                                <!-- Promotional Methods Filter -->
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h6 class="mb-0 fw-semibold d-flex align-items-center">
                                            <i class="fas fa-bullhorn me-2 text-muted"></i> Promotional Methods
                                        </h6>
                                        <a href="javascript:void(0)" id="clearSearchByPromotionalMethod"
                                            onclick="clearFilter('clearSearchByPromotionalMethod')"
                                            class="text-danger <?php echo e(request()->search_by_promotional_method ? '' : 'd-none'); ?>">
                                            <i class="fas fa-times me-1"></i> Clear
                                        </a>
                                    </div>
                                    <div class="form-group">
                                        <select id="SearchByPromotionalMethod" class="form-select form-select-sm" multiple
                                            size="4">
                                            <?php
    $promotionalArr = [];
    if (str_contains(request()->search_by_promotional_method, ',')) {
        $promotionalArr = explode(',', request()->search_by_promotional_method);
    } else {
        $promotionalArr = [request()->search_by_promotional_method];
    }
                                            ?>
                                            <?php $__currentLoopData = $methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php if(in_array($method['id'], $promotionalArr)): ?> selected <?php endif; ?>
                                                    value="<?php echo e($method['id']); ?>">
                                                    <i class="fas fa-rocket me-1"></i> <?php echo e($method['name']); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <small class="text-muted mt-1 d-block">Hold Ctrl/Cmd to select multiple</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-4 col-sm-12">
                        <!-- Start: Top Bar -->

                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 py-3">
                            <!-- Brand Status Tabs -->
                            <div class="brand-tabs-container">
                                <div class="d-flex align-items-center">
                                    <?php if(request()->route()->getName() != "publisher.own-advertisers"): ?>
                                        <div class="border-end pe-3 me-3">
                                            <h6 class="mb-0 text-muted fw-semibold small">Brand Status:</h6>
                                        </div>
                                    <?php endif; ?>

                                    <div class="nav-tabs-wrapper">
                                        <ul class="nav nav-tabs border-0" id="brandTabs" role="tablist">
                                            <?php if(request()->route()->getName() != "publisher.own-advertisers"): ?>
                                                <li class="nav-item me-1" role="presentation">
                                                    <button class="nav-link <?php echo e(!request()->section || request()->section == "all" ? "active" : ""); ?> px-3 py-2" data-section="all" id="allBrands">

                                                            All Brands

                                                    </button>
                                                </li>
                                                <li class="nav-item me-1" role="presentation">
                                                    <button class="nav-link <?php echo e(request()->section == "new" ? "active" : ""); ?> px-3 py-2" data-section="new" id="newBrands">
                                                            New
                                                    </button>
                                                </li>
                                                <li class="nav-item me-1" role="presentation">
                                                    <button class="nav-link <?php echo e(request()->section == "not-joined" ? "active" : ""); ?> px-3 py-2" data-section="not-joined" id="notJoinedBrands">
                                                            Not Joined
                                                    </button>
                                                </li>
                                            <?php endif; ?>

                                            <?php if(request()->route()->getName() != "publisher.own-advertisers"): ?>
                                                <li class="nav-item me-1" role="presentation">
                                                    <button class="nav-link <?php echo e(request()->section == "pending" ? "active" : ""); ?> px-3 py-2" data-section="pending" id="pendingBrands">
                                                            Pending
                                                    </button>
                                                </li>
                                            <?php endif; ?>

                                            <?php if(request()->route()->getName() == "publisher.own-advertisers"): ?>
                                                <li class="nav-item me-1" role="presentation">
                                                    <button class="nav-link <?php echo e(request()->section == "joined" || (request()->route()->getName() == "publisher.own-advertisers" && empty(request()->section)) ? "active" : ""); ?> px-3 py-2" data-section="joined" id="joinedBrands">
                                                            Joined
                                                    </button>
                                                </li>
                                                <li class="nav-item me-1" role="presentation">
                                                    <button class="nav-link <?php echo e(request()->section == "hold" ? "active" : ""); ?> px-3 py-2" data-section="hold" id="holdBrands">
                                                            Hold
                                                    </button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link <?php echo e(request()->section == "rejected" ? "active" : ""); ?> px-3 py-2" data-section="rejected" id="rejectedBrands">
                                                            Rejected
                                                    </button>
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- View Toggle -->
                            <div class="view-toggle-container">
                                <div class="d-flex align-items-center">
                                    <span class="me-2 fw-medium text-muted small">View:</span>
                                    <div class="btn-group view-tabs" role="group" style="border-bottom: none;">
                                        <input type="radio" class="btn-check" name="viewOption" id="viewList"
                                            value="<?php echo e(\App\Helper\Static\Vars::PUBLISHER_ADVERTISER_LIST_VIEW); ?>"
                                            <?php echo e($view == \App\Helper\Static\Vars::PUBLISHER_ADVERTISER_LIST_VIEW ? 'checked' : ''); ?>>
                                        <label class="btn btn-sm py-2 mb-0 d-flex align-items-center" for="viewList"
                                            onclick="view('<?php echo e(\App\Helper\Static\Vars::PUBLISHER_ADVERTISER_LIST_VIEW); ?>')">
                                            <i class="fas fa-list me-2"></i>
                                            <span>List</span>
                                        </label>
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
                                
                            </div>
                        </div>
                    </div><!-- End: .columns-2 -->
                </div>
            </div>
        </div>


        <!-- .atbd-drawer -->
        <div class="drawer-basic-wrap right account">
            <div class="atbd-drawer drawer-account d-none">
                <div class="atbd-drawer__header d-flex aling-items-center justify-content-between">
                    <h6 class="drawer-title">Send Message To The Advertiser</h6>
                    <a href="#" class="btdrawer-close"><i class="la la-times"></i></a>
                </div><!-- ends: .atbd-drawer__header -->
                <div class="atbd-drawer__body">
                    <div class="drawer-content">
                        <div class="drawer-account-form form-basic">
                            <form action="<?php echo e(route("publisher.send-msg-to-advertiser")); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="advertiser_id" id="advertiser_id">

                                <div class="form-row">
                                    <div class="form-group col-lg-6">
                                        <label for="username">From</label>
                                        <input type="text" name="publisher_name" id="publisher_name"
                                            class="form-control form-control-sm" placeholder="Publisher Name"
                                            value="<?php echo e(auth()->user()->first_name); ?> <?php echo e(auth()->user()->last_name); ?>"
                                            readonly>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="to">To</label>
                                        <input type="text" name="advertiser_name" id="advertiser_name"
                                            class="form-control form-control-sm" placeholder="Advertiser Name" readonly>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="subject">Subject</label>
                                        <input type="text" name="subject" id="subject" class="form-control form-control-sm"
                                            placeholder="Please Enter Subject For This Message">
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="question_or_comment">Your Question or Comments</label>
                                        <textarea name="question_or_comment" id="question_or_comment"
                                            class="form-control form-control-sm"
                                            placeholder="Please Enter Your Question or Comments"></textarea>
                                    </div>
                                    <button class="btn btn-primary btn-default btn-squared ">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- ends: .atbd-drawer__body -->
            </div>
        </div>
        <div class="overlay-dark"></div>
        <div class="overlay-dark-l2"></div>
        <!-- ends: .atbd-drawer -->
        <div class="modal-basic modal fade" id="modal-basic" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <form action="<?php echo e(route("publisher.apply-advertiser")); ?>" method="POST" id="applyAdvertiser">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" id="a_id" name="a_id">
                    <input type="hidden" id="a_name" name="a_name">
                    <div class="modal-content modal-bg-white ">
                        <div class="modal-header">
                            <h6 class="modal-title">Apply To Program</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span data-feather="x"></span></button>
                        </div>
                        <div class="modal-body">
                            <h6 class="ap-nameAddress__title text-black" id="advertiserName"></h6>
                            <h6 class="ap-nameAddress__subTitle text-left justify-content-start fs-14 pt-1 m-0"
                                id="advertiserID"></h6>
                            <p class="font-weight-bold mt-3 text-black">Optional: Tell us about your promotional methods and
                                general marketing plan for this merchant to help speed up approval. (Websites you'll use,
                                PPC terms, etc.)</p>
                            <textarea class="form-control" rows="4" cols="4" name="message"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="applyAdvertiserBttn" class="btn btn-primary btn-sm">Apply</button>
                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.publisher.publisher_panel", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Downloads\application\resources\views/template/publisher/advertisers/find.blade.php ENDPATH**/ ?>