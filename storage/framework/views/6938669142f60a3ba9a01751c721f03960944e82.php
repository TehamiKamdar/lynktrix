<?php if (! $__env->hasRenderedOnce('b8ee5bf8-f46c-45c1-b6b2-ebb6d24840aa')): $__env->markAsRenderedOnce('b8ee5bf8-f46c-45c1-b6b2-ebb6d24840aa');
$__env->startPush('styles'); ?>

    <link rel="stylesheet" href="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/css/select2.min.css")); ?>"/>
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove{
            display:none;
        }
        .loaded-spin {
            margin: 20% 50%;
            position: absolute;
        }
    </style>

<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('78a8c262-2f0e-4683-b06e-92cbf25487a8')): $__env->markAsRenderedOnce('78a8c262-2f0e-4683-b06e-92cbf25487a8');
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
        function sendAjaxRequest(url, urlParams, dataObj)
        {
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

                }
            }).done(function () {
                $("#ap-tabContent").removeClass("spin-active");
                $("#gridLoader3").addClass("display-hidden");
            });
        }
        function filterAdvertiser(field, id)
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
        function clearFilter(key)
        {
            let url = new URL(document.URL);
            let urlParams = url.searchParams;
            if(key === "clearSearchByName")
            {
                $("#SearchByName").val("");
                if(urlParams.has(`search_by_name`)) {
                    urlParams.delete(`search_by_name`);
                    filterAdvertiser("search_by_name", "SearchByName");
                }
            }
            else if(key === "clearSearchByCountry")
            {
                $("#SearchByCountry").val("").trigger("change");
                if(urlParams.has(`search_by_country`)) {
                    urlParams.delete(`search_by_country`);
                    filterAdvertiser("search_by_country", "SearchByCountry");
                }
            }
            else if(key === "clearSearchByCategory")
            {
                $("#SearchByCategory").val("").trigger("change");
                if(urlParams.has(`search_by_category`)) {
                    urlParams.delete(`search_by_category`);
                    filterAdvertiser("search_by_category", "SearchByCategory");
                }
            }
            else if(key === "clearSearchByPromotionalMethod")
            {
                $("#SearchByPromotionalMethod").val("").trigger("change");
                if(urlParams.has(`search_by_promotional_method`)) {
                    urlParams.delete(`search_by_promotional_method`);
                    filterAdvertiser("search_by_promotional_method", "SearchByPromotionalMethod");
                }
            }
            history.pushState({}, null, url.href);
            $(`#${key}`).hide();
        }
        function showClear(key)
        {
            $(`#clear${key}`).show();
        }
        function pushInfo(id, name)
        {
            $("#advertiser_id").val(id);
            $("#advertiser_name").val(name);
        }
        function view(view)
        {
            $.ajax({
                url: '<?php echo e(route("publisher.set-advertiser-view")); ?>',
                type: 'GET',
                data: {view},
                success: function (response) {
                    if(response) {
                        window.location.reload();
                    }
                },
                error: function (response) {

                }
            });
        }
        function openApplyModal(id, name)
        {
            $("#advertiserID").html(`Brand ID: ${id}`)
            $("#advertiserName").html(name)
            $("#a_id").val(id)
            $("#a_name").val(name)
        }
        function advertiserType(type)
        {
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

            if(url.search) {
                // if(urlParams.has(`source`)) {
                //     urlParams.delete(`source`);
                // }
                if(urlParams.has('page')) {
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
        function changeLimit()
        {
            $("#limit").change(() => {
                $("#ap-overview").addClass("spin-active");
                $.ajax({
                    url: '<?php echo e(route("publisher.set-limit")); ?>',
                    type: 'GET',
                    data: {"limit": $("#limit").val(), "type": "advertiser"},
                    success: function (response) {
                        if(response) {
                            window.location.reload();
                        }
                    },
                    error: function (response) {

                    }
                });

            });
        }
        function fetchAdvertisers(section, dataObj, clearPage)
        {
            let url = new URL(document.URL);
            let urlParams = url.searchParams;
            //
            if(url.search) {
                if(urlParams.has(`section`)) {
                    urlParams.delete(`section`);
                }
                if(clearPage && urlParams.has('page')) {
                    urlParams.delete(`page`);
                    urlParams.append('page', "1");
                }
            }
            if(section)
                urlParams.append("section", section);

            sendAjaxRequest(url, urlParams, dataObj);
        }
        document.addEventListener("DOMContentLoaded", function () {

            changeLimit();
            $("#SearchByCountry, #SearchByPromotionalMethod, #SearchByCategory").select2({
                placeholder: "Please Select",
                dropdownCssClass: "tag",
                allowClear: false
            });
            $("#SearchByName").keyup(() => {
                filterAdvertiser("search_by_name", "SearchByName");
                if(!$("#SearchByName").val()) {
                    $(`#clearSearchByName`).hide();
                }
            });
            $("#SearchByCountry").change(() => {
                filterAdvertiser("search_by_country", "SearchByCountry")
            });
            $("#SearchByCategory").change(() => {
                filterAdvertiser("search_by_category", "SearchByCategory")
            });
            $("#advertiserType").change(() => {
                let type = $("#advertiserType").val();
                let dataObj = {type};

                let url = new URL(document.URL);
                let urlParams = url.searchParams;

                if(url.search) {
                    if(urlParams.has(`type`)) {
                        urlParams.delete(`type`);
                    }
                    // if(urlParams.has(`source`)) {
                    //     urlParams.delete(`source`);
                    // }
                    if(urlParams.has('page')) {
                        urlParams.delete('page');
                        urlParams.append('page', "1");
                    }
                }
                // if(response.source)
                // {
                //     urlParams.append("source", response.source);
                // }
                urlParams.append("type", type);
                sendAjaxRequest(url, urlParams, dataObj);

                
                
                
                
                
                
                
                

                

                

                
                

                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                

                
                
            });
            $("#SearchByPromotionalMethod").change(() => {
                filterAdvertiser("search_by_promotional_method", "SearchByPromotionalMethod")
            });
            $("#allBrands, #notJoinedBrands, #joinedBrands, #newBrands, #pendingBrands, #rejectedBrands, #holdBrands").click(function(e) {
                $("#ap-tabContent").addClass("spin-active");
                $("#gridLoader3").removeClass("display-hidden");
                let data = $(e.target);
                let section = data.attr('data-section');
                $("#allBrands, #newBrands, #notJoinedBrands, #joinedBrands, #newBrands, #pendingBrands, #holdBrands, #rejectedBrands").removeClass("active");
                if(section === "all") {
                    $("#allBrands").addClass("active");
                    section = null;
                }
                else if(section === "new") {
                    $("#newBrands").addClass("active");
                }
                else if(section === "joined") {
                    $("#joinedBrands").addClass("active");
                }
                else if(section === "not-joined") {
                    $("#notJoinedBrands").addClass("active");
                }
                else if(section === "pending") {
                    $("#pendingBrands").addClass("active");
                }
                else if(section === "hold") {
                    $("#holdBrands").addClass("active");
                }
                else if(section === "rejected") {
                    $("#rejectedBrands").addClass("active");
                }

                let dataObj = {section};
                fetchAdvertisers(section, dataObj, true);
            });

            $("#ap-tabContent").addClass("spin-active");
            $("#gridLoader3").removeClass("display-hidden");
            let section = "<?php echo e($section); ?>";
            let page = "<?php echo e($page); ?>";
            let dataObj = {section, page};
            fetchAdvertisers(section, dataObj);

            $("#applyAdvertiser").submit(function () {
                $("#applyAdvertiserBttn").prop('disabled', true);
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
                            <h1 class="text-capitalize breadcrumb-title">Advertisers</h1>
                            <div class="breadcrumb-action justify-content-center flex-wrap">
                                <div class="action-btn">
                                    <div class="form-group mb-0">
                                        <span class="project-result-showing fs-14 color-gray ml-xl-25 mr-xl-0 text-center mt-lg-0 mt-20">
                                            Total <span id="totalAdvertiser">0</span> advertisers found
                                        </span>
                                    </div>
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
                                        <a href="<?php echo e(route("publisher.export-advertisers", array_merge(['type' => 'xlsx'], $queryParams))); ?>" class="dropdown-item" id="exportXLSX">
                                            <i class="la la-file-excel"></i> Excel (XLSX)</a>
                                        <a href="<?php echo e(route("publisher.export-advertisers", array_merge(['type' => 'csv'], $queryParams))); ?>" class="dropdown-item" id="exportCSV">
                                            <i class="la la-file-csv"></i> CSV</a>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="products_page product_page--grid mb-30">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="columns-1 col-lg-4 col-md-5 col-sm-8 order-md-0 order-1">
                        <div class="widget">
                            <div class="widget-header-title px-20 py-15 border-bottom">
                                <h6 class="d-flex align-content-center fw-500">
                                    <span data-feather="sliders"></span> Filters
                                </h6>
                            </div>
                            <div class="category_sidebar">
                                <!-- Start: Aside -->
                                <aside class="product-sidebar-widget mb-30">
                                    <!-- Title -->
                                    <div class="widget_title mb-20">
                                        <h6 class="float-left">Search</h6>
                                        <a href="javascript:void(0)" id="clearSearchByName" onclick="clearFilter('clearSearchByName')" class="float-right <?php echo e(request()->search_by_name ? null : "display-hidden"); ?>"><small>Clear</small></a>
                                        <div class="clearfix"></div>
                                    </div>
                                    <!-- Title -->
                                    <!-- Body -->
                                    <div class="card border-0">
                                        <div class="project-search shop-search  global-shadow ">
                                            <form action="/" class="order-search__form">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                                <input class="form-control mr-sm-2 border-0 box-shadow-none" type="text" id="SearchByName" placeholder="Search by Name" aria-label="Search" value="<?php echo e(request()->search_by_name); ?>">
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Body -->
                                </aside>
                                <!-- End: Aside -->
                                <!-- Start: Aside -->
                                <aside class="product-sidebar-widget mb-30">
                                    <!-- Title -->
                                    <div class="widget_title mb-20">
                                        <h6 class="float-left">Country</h6>
                                        <a href="javascript:void(0)" id="clearSearchByCountry" onclick="clearFilter('clearSearchByCountry')" class="float-right <?php echo e(request()->search_by_country ? null : "display-hidden"); ?>"><small>Clear</small></a>
                                        <div class="clearfix"></div>
                                    </div>
                                    <!-- Title -->
                                    <!-- Body -->
                                    <div class="card border-0">
                                        <div class="project-category__select">
                                            <select id="SearchByCountry" class="form-control" multiple>
                                                <?php
                                                $countriesArr = [];
                                                if(str_contains(request()->search_by_country, ','))
                                                {
                                                    $countriesArr = explode(',', request()->search_by_country);
                                                }
                                                else
                                                {
                                                    $countriesArr = [request()->search_by_country];
                                                }
                                                ?>
                                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php if(in_array($country['iso2'], $countriesArr)): ?> selected <?php endif; ?> value="<?php echo e($country['iso2']); ?>"><?php echo e($country['name']); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                </aside>
                                <!-- End: Aside -->
                                <!-- Start: Aside -->
                                <aside class="product-sidebar-widget mb-30">
                                    <!-- Title -->
                                    <div class="widget_title mb-20">
                                        <h6>Advertiser Type</h6>
                                    </div>
                                    <!-- Title -->
                                    <!-- Body -->
                                    <div class="card border-0">
                                        <div class="project-category__select">
                                            <select class="js-example-basic-single js-states form-control" id="advertiserType">
                                                <option value="all"  <?php echo e(request()->type == "third_party_advertiser" || empty(request()->type) ? "selected" : ""); ?>>All Advertisers</option>
                                                <option value="third_party_advertiser" <?php echo e(request()->type == "third_party_advertiser" ? "selected" : ""); ?>>Third-Party Advertisers</option>
                                                <option value="managed_by_linksCircle" <?php echo e(request()->type == "managed_by_linksCircle" ? "selected" : ""); ?>>Managed by LinksCircle</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Body -->
                                </aside>
                                <!-- End: Aside -->
                                <!-- Start: Aside -->





                                <!-- End: Aside -->
                                <!-- Start: Aside -->
                                <aside class="product-sidebar-widget mb-30">
                                    <!-- Title -->
                                    <div class="widget_title mb-20">
                                        <h6 class="float-left">Categories</h6>
                                        <a href="javascript:void(0)" id="clearSearchByCategory" onclick="clearFilter('clearSearchByCategory')" class="float-right <?php echo e(request()->search_by_category ? null : "display-hidden"); ?>"><small>Clear</small></a>
                                        <div class="clearfix"></div>
                                    </div>
                                    <!-- Title -->
                                    <!-- Body -->
                                    <div class="card border-0">
                                        <div class="project-category__select">
                                            <select id="SearchByCategory" class="form-control" multiple>
                                                <?php
                                                $categoryArr = [];
                                                if(str_contains(request()->search_by_category, ','))
                                                {
                                                    $categoryArr = explode(',', request()->search_by_category);
                                                }
                                                else
                                                {
                                                    $categoryArr = [request()->search_by_category];
                                                }
                                                ?>
                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php if(in_array($category['id'], $categoryArr)): ?> selected <?php endif; ?> value="<?php echo e($category['id']); ?>"><?php echo e($category['name']); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Body -->
                                </aside>
                                <!-- End: Aside -->
                                <!-- Start: Aside -->
                                <aside class="product-sidebar-widget mb-30">
                                    <!-- Title -->
                                    <div class="widget_title mb-20">
                                        <h6 class="float-left">Promotional Methods</h6>
                                        <a href="javascript:void(0)" id="clearSearchByPromotionalMethod" onclick="clearFilter('clearSearchByPromotionalMethod')" class="float-right <?php echo e(request()->search_by_promotional_method ? null : "display-hidden"); ?>"><small>Clear</small></a>
                                        <div class="clearfix"></div>
                                    </div>
                                    <!-- Title -->
                                    <!-- Body -->
                                    <div class="card border-0">
                                        <div class="project-category__select">
                                            <select id="SearchByPromotionalMethod" class="form-control" multiple>
                                                <?php
                                                $promotionalArr = [];
                                                if(str_contains(request()->search_by_promotional_method, ','))
                                                {
                                                    $promotionalArr = explode(',', request()->search_by_promotional_method);
                                                }
                                                else
                                                {
                                                    $promotionalArr = [request()->search_by_promotional_method];
                                                }
                                                ?>
                                                <?php $__currentLoopData = $methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php if(in_array($method['id'], $promotionalArr)): ?> selected <?php endif; ?> value="<?php echo e($method['id']); ?>"><?php echo e($method['name']); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Body -->
                                </aside>
                                <!-- End: Aside -->
                            </div>
                        </div><!-- End: .widget -->
                    </div><!-- End: .columns-1 -->
                    <div class="columns-2 col-lg-8 col-md-7 col-sm-8 order-md-1 order-0">
                        <!-- Start: Top Bar -->
                        <div class="shop_products_top_filter">
                            <div class="project-top-wrapper d-flex flex-wrap align-items-center">

                                <div class="project-top-right d-flex flex-wrap align-items-center">
                                    <div class="project-category flex-wrap d-flex align-items-center">
                                        <div class="project-tap b-light">
                                            <ul class="nav" id="ap-tab" role="tablist">
                                                <?php if(request()->route()->getName() != "publisher.own-advertisers"): ?>
                                                    <li class="nav-item">
                                                        <a class="nav-link <?php echo e(!request()->section || request()->section == "all" ? "active" : null); ?>" data-section="all" href="javascript:void(0)" id="allBrands">All Brands</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link <?php echo e(request()->section == "new" ? "active" : null); ?>" data-section="new" href="javascript:void(0)" id="newBrands">New</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link <?php echo e(request()->section == "not-joined" ? "active" : null); ?>" data-section="not-joined" href="javascript:void(0)" id="notJoinedBrands">Not Joined</a>
                                                    </li>
                                                <?php endif; ?>
                                                <?php if(request()->route()->getName() != "publisher.own-advertisers"): ?>
                                                    <li class="nav-item">
                                                        <a class="nav-link <?php echo e(request()->section == "pending" ? "active" : null); ?>" data-section="pending" href="javascript:void(0)" id="pendingBrands">Pending</a>
                                                    </li>
                                                <?php endif; ?>
                                                <?php if(request()->route()->getName() == "publisher.own-advertisers"): ?>
                                                    <li class="nav-item">
                                                        <a class="nav-link <?php echo e(request()->section == "joined" || (request()->route()->getName() == "publisher.own-advertisers" && empty(request()->section)) ? "active" : null); ?>" data-section="joined" href="javascript:void(0)" id="joinedBrands">Joined</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link <?php echo e(request()->section == "hold" ? "active" : null); ?>" data-section="hold" href="javascript:void(0)" id="holdBrands">Hold</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link <?php echo e(request()->section == "rejected" ? "active" : null); ?>" data-section="rejected" href="javascript:void(0)" id="rejectedBrands">Rejected</a>
                                                    </li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="project-icon-selected content-center mt-lg-0 mt-25">
                                        <div class="listing-social-link pb-lg-0 pb-xs-2">
                                            <div class="icon-list-social d-flex">
                                                <a class="icon-list-social__link rounded-circle icon-list-social__style justify-content-center <?php echo e($view == \App\Helper\Static\Vars::PUBLISHER_ADVERTISER_BOX_VIEW ? "active" : null); ?> ml-xl-20 mr-20" href="javascript:void(0)" onclick="view('<?php echo e(\App\Helper\Static\Vars::PUBLISHER_ADVERTISER_BOX_VIEW); ?>')">
                                                    <span data-feather="grid"></span></a>
                                                <a class="icon-list-social__link rounded-circle icon-list-social__style justify-content-center <?php echo e($view == \App\Helper\Static\Vars::PUBLISHER_ADVERTISER_LIST_VIEW ? "active" : null); ?> " href="javascript:void(0)" onclick="view('<?php echo e(\App\Helper\Static\Vars::PUBLISHER_ADVERTISER_LIST_VIEW); ?>')">
                                                    <span data-feather="list"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End: Top Bar -->
                        <?php echo $__env->make("partial.admin.alert", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <div class="tab-content mt-25" id="ap-tabContent">
                            <?php echo $__env->make("template.publisher.widgets.loader-3", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="tab-pane fade show active" id="ap-overview" role="tabpanel" aria-labelledby="ap-overview-tab">





                            </div>
                        </div>
                    </div><!-- End: .columns-2 -->
                </div>
            </div>
        </div><!-- End: .products -->

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
                                <input type="hidden" name="advertiser_id" id="advertiser_id" >

                                <div class="form-row">
                                    <div class="form-group col-lg-6">
                                        <label for="username">From</label>
                                        <input type="text" name="publisher_name" id="publisher_name" class="form-control form-control-sm" placeholder="Publisher Name" value="<?php echo e(auth()->user()->first_name); ?> <?php echo e(auth()->user()->last_name); ?>" readonly>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="to">To</label>
                                        <input type="text" name="advertiser_name" id="advertiser_name" class="form-control form-control-sm" placeholder="Advertiser Name" readonly>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="subject">Subject</label>
                                        <input type="text" name="subject" id="subject" class="form-control form-control-sm" placeholder="Please Enter Subject For This Message" >
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="question_or_comment">Your Question or Comments</label>
                                        <textarea name="question_or_comment" id="question_or_comment" class="form-control form-control-sm" placeholder="Please Enter Your Question or Comments"></textarea>
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
                            <h6 class="ap-nameAddress__subTitle text-left justify-content-start fs-14 pt-1 m-0" id="advertiserID"></h6>
                            <p class="font-weight-bold mt-3 text-black">Optional: Tell us about your promotional methods and general marketing plan for this merchant to help speed up approval. (Websites you'll use, PPC terms, etc.)</p>
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

<?php echo $__env->make("layouts.publisher.panel_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tech\resources\views/template/publisher/advertisers/find.blade.php ENDPATH**/ ?>