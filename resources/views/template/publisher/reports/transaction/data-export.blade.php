@extends("layouts.publisher.publisher_panel")

@pushonce('styles')
    <link rel="stylesheet" href="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/css/daterangepicker.css") }}">
@endpushonce

@pushonce('scripts')
    <script src="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/moment/moment.min.js") }}"></script>
    <script src="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/daterangepicker.js") }}"></script>
    <script src="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/moment.js") }}"></script>

    <script>

        let start = moment().startOf("month");
        let end = moment().endOf("month");

        $('input[name="date"]').daterangepicker({
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
        {{--    $('input[name="date"]').val(setDate);--}}
        {{--}--}}
        {{--else {--}}
        {{--}--}}
        $('input[name="date"]').val(start.format('MMM D, YYYY') + ' - ' + end.format('MMM D, YYYY'));
        $('input[name="date"]').on('apply.daterangepicker', function (ev, picker) {
            $(this).val(picker.startDate.format('MMM D, YYYY') + ' - ' + picker.endDate.format('MMM D, YYYY'));
        });

        $('input[name="date"]').on('cancel.daterangepicker', function (ev, picker) {
            $(this).val('');
        });
    </script>
@endpushonce

@section("content")

    <div class="contents">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="col-xxl-6 col-lg-6 offset-3 col-sm-12 m-bottom-50 m-top-50">
                        <form action="{{ route("publisher.reports.transactions.data.export") }}" method="POST">
                            @csrf
                            <div class="card" id="deeplinkWrapper">
                                <div class="card-body" id="mainDeeplinkBody">
                                    <div class="files-area d-flex justify-content-between align-items-center">
                                        <div class="files-area__left d-flex align-items-center">
                                            <div class="files-area__title">
                                                <p class="mb-0 fs-14 fw-500 color-dark text-capitalize">Transaction Data Export</p>
                                                <span class="color-light fs-12 d-flex ">Select the start date and end date to export transaction data.</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <div class="action-btn mt-4">
                                                <div class="form-group mb-0">
                                                    <div class="input-container icon-left position-relative">
                                                        <span class="input-icon icon-left">
                                                            <span data-feather="calendar"></span>
                                                        </span>
                                                        <input type="text" class="form-control form-control-default date-ranger"
                                                               name="date"
                                                               placeholder="{{ \App\Helper\Static\Methods::subMonths(0)->format("M d, Y") }} - {{ now()->format("M d, Y") }}"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-inline-action d-flex justify-content-between align-items-center">
                                                <button type="submit" class="btn btn-sm text-white btn-primary btn-default btn-squared text-capitalize mt-4">Export</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- Profile files End -->
                    </div>

                </div><!-- End: .col -->
            </div>
        </div>

    </div>

@endsection
