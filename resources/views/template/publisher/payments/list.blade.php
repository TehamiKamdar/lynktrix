@extends("layouts.publisher.publisher_panel")

@pushonce('styles')
    <link rel="stylesheet" href="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/css/daterangepicker.css") }}">
@endpushonce

@pushonce('scripts')

    @php
        $date = \Carbon\Carbon::now()->format("Y-m-01 00:00:00");
        $diff = now()->diffInDays(\Carbon\Carbon::parse($date));

        $startDate = request()->start_date ?? null;
        $endDate = request()->end_date ?? null;

        if($startDate)
            $startDate = \Carbon\Carbon::parse($startDate)->format("M d, Y");

        if($endDate)
            $endDate = \Carbon\Carbon::parse($endDate)->format("M d, Y");

    @endphp

    <script src="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/moment/moment.min.js") }}"></script>
    <script src="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/daterangepicker.js") }}"></script>
    <script src="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/moment.js") }}"></script>
    <script>
        function sendAjaxRequest(dataObj) {
            $.ajax({
                url: '{{ route("publisher.reports.transactions.list") }}',
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

            let startDate = "{{ $startDate }}";
            let endDate = "{{ $endDate }}";

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

            {{--let setDate = "{{ $setDate }}";--}}
            {{--if(setDate) {--}}
            {{--    $('input[name="date-ranger"]').val(setDate);--}}
            {{--}--}}
            {{--else {--}}
            {{--}--}}
            $('input[name="date-ranger"]').val(start.format('MMM D, YYYY') + ' - ' + end.format('MMM D, YYYY'));
            $('input[name="date-ranger"]').on('apply.daterangepicker', function (ev, picker) {

                let exportXLSXURL = "{{ route("publisher.reports.transactions.export", ['type' => 'xlsx']) }}";
                let exportCSVURL = "{{ route("publisher.reports.transactions.export", ['type' => 'csv']) }}";

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
                    url: '{{ route("publisher.set-limit") }}',
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
@endpushonce

@section("content")

    <div class="az-content az-content-dashboard">
        <div class="container-fluid">
            <div class="az-content-body">
                <div class="az-dashboard-one-title">
                    <div>
                        <h2 class="az-dashboard-title">Payouts</h2>
                    </div>
                </div>
                <div class="az-dashboard-nav">
                    <nav class="nav" style="width: 600px;">
                        <a class="nav-link active" data-toggle="tab" href="#">Payments (Record)</a>
                        <a class="nav-link" href="#"><i class="fas fa-ellipsis-h"></i></a>
                    </nav>
                </div>
                <div class="col-12 px-0">
                    @include("partial.admin.alert")

                    <div id="ap-overview">
                        @include("template.publisher.payments.list_view", compact('payments'))
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
