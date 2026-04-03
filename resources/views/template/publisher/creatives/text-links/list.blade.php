@extends("layouts.publisher.publisher_panel")

@pushonce('styles')
    <script>
        function changeLimit()
        {
            $.ajax({
                url: '{{ route("publisher.set-limit") }}',
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
        function sendAjaxRequest(url, urlParams, dataObj)
        {
            history.pushState({}, null, url.href);

            url = new URL(document.URL);
            urlParams = url.searchParams;

            dataObj.search_by_name = urlParams.get(`search_by_name`);

            let exportXLSXURL = "{{ route("publisher.creatives.text-links.export", ['type' => 'xlsx']) }}";
            let exportCSVURL = "{{ route("publisher.creatives.text-links.export", ['type' => 'csv']) }}";

            exportXLSXURL = `${exportXLSXURL}${url.search}`;
            exportCSVURL = `${exportCSVURL}${url.search}`;

            $("#exportCSV").attr("href", exportCSVURL);
            $("#exportXLSX").attr("href", exportXLSXURL);

            $.ajax({
                url: '{{ route("publisher.creatives.text-links.list") }}',
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
@endpushonce

@pushonce('scripts')

@endpushonce

@section("content")

    {{-- <div class="az-content az-content-dashboard">

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop-breadcrumb">

                        <div class="breadcrumb-main">
                            <h4 class="az-dashboard-title">Text Links</h4>
                            <div class="breadcrumb-action justify-content-center flex-wrap">
                                <div class="project-search project-search--height global-shadow mr-md-10 mt-md-1">
                                    <div class="d-flex align-items-center user-member__form">
                                        <span data-feather="search"></span>
                                        <input class="form-control mr-sm-2 border-0 box-shadow-none" id="SearchByName" type="text" placeholder="Search by Name" aria-label="Search" value="{{ request()->search_by_name }}">
                                    </div>
                                </div>
                                <div class="project-category d-flex align-items-center mt-xl-10 mt-15">
                                    <a href="javascript:void(0)" id="clearSearchByName"
                                       onclick="clearFilter('clearSearchByName')"
                                       class="margin-left-minus-60px margin-top-minus-11px {{ request()->search_by_name ? null : "display-hidden" }}">
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
                                        @php
                                            $queryParams = request()->all();
                                        @endphp
                                        <a href="{{ route("publisher.creatives.text-links.export", array_merge(['type' => 'xlsx'], $queryParams)) }}" class="dropdown-item" id="exportXLSX">
                                            <i class="la la-file-excel"></i> Excel (XLSX)</a>
                                        <a href="{{ route("publisher.creatives.text-links.export", array_merge(['type' => 'csv'], $queryParams)) }}" class="dropdown-item" id="exportCSV">
                                            <i class="la la-file-csv"></i> CSV</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="project-top-wrapper d-flex justify-content-end flex-wrap mb-25 mt-n10">

                            <div class="content-center mt-10">
                                <p class="az-dashboard-text">Total Results: <strong id="totalResults">{{ $total }}</strong></p>
                            </div><!-- End: .content-center -->

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @include("partial.admin.alert")
                    <div class="orderDatatable global-shadow border py-30 px-sm-30 px-20 bg-white radius-xl w-100 mb-30" id="ap-overview">
                        @include("template.publisher.creatives.text-links.list_view", compact('links'))
                    </div><!-- End: .userDatatable -->
                </div><!-- End: .col -->
            </div>
        </div>

    </div> --}}

    <div class="az-content az-content-dashboard">
        <div class="container-fluid">
            <div class="az-content-body">
                <div class="az-dashboard-one-title">
                    <div>
                        <h2 class="az-dashboard-title">Text Links</h2>
                        <p class="az-dashboard-text">
                            Total <span id="totalAdvertiser">{{ $total }}</span> links found
                        </p>
                    </div>
                </div>
                <div class="az-dashboard-nav">
                    <nav class="nav">
                        <a class="nav-link active" data-toggle="tab" href="#">Text Links</a>
                    </nav>

                    <nav class="nav">
                        @php
                            $queryParams = request()->all();
                        @endphp
                        <a class="nav-link text-success" href="{{ route("publisher.creatives.text-links.export", array_merge(['type' => 'xlsx'], $queryParams)) }}" id="exportXLSX"><i class="fa-solid fa-file-excel"></i> Export to Excel</a>
                        <a class="nav-link text-success" href="{{ route("publisher.creatives.text-links.export", array_merge(['type' => 'csv'], $queryParams)) }}" id="exportCSV"><i class="fa-solid fa-file-csv"></i> Export to CSV</a>
                        <a class="nav-link" href="#"><i class="fas fa-ellipsis-h"></i></a>
                    </nav>
                    {{-- <div class="dropdown action-btn">
                        <button class="btn btn-sm btn-default btn-white dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="la la-download"></i> Export
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <span class="dropdown-item">Export With</span>
                            <div class="dropdown-divider"></div>
                            @php
                                $queryParams = request()->all();
                            @endphp
                            <a href="{{ route("publisher.creatives.text-links.export", array_merge(['type' => 'xlsx'], $queryParams)) }}" class="dropdown-item" id="exportXLSX">
                                <i class="la la-file-excel"></i> Excel (XLSX)</a>
                            <a href="{{ route("publisher.creatives.text-links.export", array_merge(['type' => 'csv'], $queryParams)) }}" class="dropdown-item" id="exportCSV">
                                <i class="la la-file-csv"></i> CSV</a>
                        </div>
                    </div> --}}
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
                                            class="text-danger {{ request()->search_by_name ? '' : 'd-none' }}">
                                            <i class="fas fa-times me-1"></i> Clear
                                        </a>
                                    </div>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="fas fa-search text-muted"></i>
                                        </span>
                                        <input type="text" class="form-control border-start-0" id="SearchByName"
                                            placeholder="Search by name..." value="{{ request()->search_by_name }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-4 col-sm-12">
                        <!-- End: Top Bar -->
                        @include("partial.admin.alert")
                        <div class="tab-content mt-25" id="ap-tabContent">
                            @include("template.publisher.widgets.loader-3")
                            <div class="tab-pane fade show active" id="ap-overview" role="tabpanel"
                                aria-labelledby="ap-overview-tab">
                                @include("template.publisher.creatives.text-links.list_view", compact('links'))
                            </div>
                        </div>
                    </div><!-- End: .columns-2 -->
                </div>
            </div>
        </div>
    </div>

@endsection
