@extends("layouts.publisher.publisher_panel")

@pushonce('styles')
<script>
    function changeLimit() {
        $.ajax({
            url: '{{ route("publisher.set-limit") }}',
            type: 'GET',
            data: { "limit": $("#limit").val(), "type": "depp_link" },
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

        let exportXLSXURL = "{{ route("publisher.creatives.deep-links.export", ['type' => 'xlsx']) }}";
        let exportCSVURL = "{{ route("publisher.creatives.deep-links.export", ['type' => 'csv']) }}";

        exportXLSXURL = `${exportXLSXURL}${url.search}`;
        exportCSVURL = `${exportCSVURL}${url.search}`;

        $("#exportCSV").attr("href", exportCSVURL);
        $("#exportXLSX").attr("href", exportXLSXURL);

        $.ajax({
            url: '{{ route("publisher.creatives.deep-links.list") }}',
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
    function filterDeepLinks(field, id) {
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
                filterDeepLinks("search_by_name", "SearchByName");
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
            filterDeepLinks("search_by_name", "SearchByName");
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

    <div class="container-fluid">
        <div class="row justify-content-between">
            <div class="col-12">
                <div class="card shadow-sm" style="border-radius: 0;">
                    <div class="card-body py-1">
                        <div class="d-flex justify-content-between align-items-center gap-3 py-3">
                            <div class="col-12 col-lg-4">
                                <div class="input-group input-group-sm">
                                    <input type="text" class="form-control" id="SearchByName"
                                        placeholder="Search advertisers..." value="{{ request()->search_by_name }}">
                                    @if(request()->search_by_name)
                                        <button class="btn btn-outline-danger" onclick="clearFilter('clearSearchByName')"
                                            type="button">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 d-flex justify-content-end">
                                <div class="dropdown">
                                    <button class="btn btn-outline-success btn-sm dropdown-toggle d-flex align-items-center"
                                        type="button" data-bs-toggle="dropdown">
                                        <i class="fas fa-download me-2"></i> Export
                                    </button>

                                    @php
                                        $queryParams = request()->all();
                                    @endphp

                                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">

                                        <li>
                                            <a class="dropdown-item d-flex align-items-center"
                                                href="{{ route('publisher.creatives.deep-links.export', array_merge(['type' => 'xlsx'], $queryParams)) }}">
                                                <i class="fa-solid fa-file-excel text-success me-2"></i>
                                                Export to Excel
                                            </a>
                                        </li>

                                        <li>
                                            <a class="dropdown-item d-flex align-items-center"
                                                href="{{ route('publisher.creatives.deep-links.export', array_merge(['type' => 'csv'], $queryParams)) }}">
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
                @include("partial.admin.alert")
                <div class="tab-content" id="ap-tabContent">
                    @include("template.publisher.widgets.loader-3")
                    <div class="tab-pane fade show active" id="ap-overview" role="tabpanel"
                        aria-labelledby="ap-overview-tab">
                        @include("template.publisher.creatives.text-links.list_view", compact('links'))
                    </div>
                </div>
            </div><!-- End: .columns-2 -->
        </div>
    </div>

@endsection