@extends("layouts.publisher.publisher_panel")

@pushonce('styles')
    <link rel="stylesheet" href="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/css/daterangepicker.css") }}">
    <style>
        .contents {
            margin-top: 60px;
        }
        .card .card-header {
            min-height: 50px !important;
        }
        .card-body {
            padding: 1rem !important;
        }
        .inside-card {
            background: #f4f5f7;
            padding: 37px;
        }
        .tooltip-inner {
            max-width: 200px;
            padding: 3px 8px;
            color: #fff;
            text-align: center;
            background-color: #000;
            border-radius: .25rem;
            box-shadow: 0px 0px 4px black;
            opacity: 1 !important;
        }

    </style>
@endpushonce

@pushonce('scripts')
    <script src="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/moment/moment.min.js") }}"></script>
    <script src="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/daterangepicker.js") }}"></script>
    <script src="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/loader.js") }}"></script>
    <script src="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/moment.js") }}"></script>
    <script src="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/popover.js") }}"></script>

    <script>

        $('[data-toggle="tooltip"]').tooltip({
            container: 'body'
        });

        /* feather icon */
        feather.replace();

        let start = moment().subtract(6, "days");
        let end = moment();
        $('input[name="date-ranger"]').daterangepicker({
            maxSpan: {
                days: 30
            },
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
            $(this).val(picker.startDate.format('MMM D, YYYY') + ' - ' + picker.endDate.format('MMM D, YYYY'));
        });

        $('input[name="date-ranger"]').on('cancel.daterangepicker', function (ev, picker) {
            $(this).val('');
        });

    </script>
@endpushonce

@section("content")

    @if(auth()->user()->status == "active")

    @else
        <div class="contents">
            <div class="row">
                <div class="col-lg-12">
                    @if(auth()->user()->status == \App\Models\User::PENDING)
                        <div class="alert-icon-big alert alert-danger " role="alert">
                            <div class="alert-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                            </div>
                            <div class="alert-content">
                                <h3 class="alert-heading">Announcement</h3>
                                <p>Thank You for pre-registering with LinksCircle. We will start affiliation approvals in {{ now()->format("F Y") }}. <br>
                                    Our team will contact you after the launch.</p>
                            </div>
                        </div>
                    @elseif(auth()->user()->status == \App\Models\User::HOLD)

                    @endif
                </div>
            </div>
        </div>
    @endif

@endsection
