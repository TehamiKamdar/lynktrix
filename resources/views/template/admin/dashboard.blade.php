@extends("layouts.admin.panel_app")

@pushonce('styles')


    <link rel="stylesheet" href="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/css/daterangepicker.css") }}">

<style>
    .daterangepicker {
    top: 50px !important;
    border: 0 none;
    border-radius: 0 0 8px 8px;
    box-shadow: 0 10px 30px rgba(143, 142, 159, 0.2);
}
.active_card_body{
    background:#5f63f2;
    color:white;
}
.progress-downword strong{
    color:#fa1515;
    
}
.progress-downword{
    margin:0px;
    margin-top: 15px;
    
}

.progress-upword strong{
    color:#48fd00;
    
}
.progress-upword{
    margin:0px;
    margin-top: 15px;
    
}
#topClickLoaderWrapper {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 10;
}

#topPublisherLoaderWrapper {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 10;
}

#topAdverisersLoaderWrapper {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 10;
}

.loader {
    width: 48px;
    height: 48px;
    border: 5px solid #4912e3bd;
    border-bottom-color: transparent;
    border-radius: 50%;
    display: inline-block;
    box-sizing: border-box;
    animation: rotation 1s linear infinite;
}

@keyframes rotation {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}

.ps-30 .ps__rail-y {
    width: 12px !important;
}
.ps-30 .ps__thumb-y {
    width: 11px !important;
    background:#5f63f2 !important;
    border-radius: 15px;
}

.ps-30 .ps__rail-x {
    height: 12px !important;
}
.ps-30 .ps__thumb-x {
    height: 11px !important;
    background:#5f63f2 !important;
    border-radius: 15px;
}
</style>

  <!-- Icon fonts -->
    <link rel="stylesheet" href="{{ \App\Helper\Static\Methods::staticAsset("dashboard_assets/fonts/fontawesome.css") }}">
    <link rel="stylesheet" href="{{ \App\Helper\Static\Methods::staticAsset("dashboard_assets/fonts/ionicons.css") }}">
    <link rel="stylesheet" href="{{ \App\Helper\Static\Methods::staticAsset("dashboard_assets/fonts/linearicons.css") }}">
    <link rel="stylesheet" href="{{ \App\Helper\Static\Methods::staticAsset("dashboard_assets/fonts/open-iconic.css") }}">
    <link rel="stylesheet" href="{{ \App\Helper\Static\Methods::staticAsset("dashboard_assets/fonts/pe-icon-7-stroke.css") }}">
    <link rel="stylesheet" href="{{ \App\Helper\Static\Methods::staticAsset("dashboard_assets/fonts/feather.css") }}">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Core stylesheets -->
    <link rel="stylesheet" href="{{ \App\Helper\Static\Methods::staticAsset("dashboard_assets/css/bootstrap-materials.css") }}">
    <link rel="stylesheet" href="{{ \App\Helper\Static\Methods::staticAsset("dashboard_assets/css/shreerang-materials.css") }}">
    <link rel="stylesheet" href="{{ \App\Helper\Static\Methods::staticAsset("dashboard_assets/css/uikit.css") }}">

    <!-- Libs -->
    <link rel="stylesheet" href="{{ \App\Helper\Static\Methods::staticAsset("dashboard_assets/libs/perfect-scrollbar/perfect-scrollbar.css") }}">
    <link rel="stylesheet" href="{{ \App\Helper\Static\Methods::staticAsset("dashboard_assets/libs/flot/flot.css") }}">
    <style>
        @media (min-width: 768px) {
    .main-content .container-fluid {
         padding-right: 0px !important; 
         padding-left: 0px !important; 
    }
}


    </style>
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

        $routeData = [
            'start_date' => request()->start_date ?? now()->format("Y-m-01 00:00:00"),
            'end_date' => request()->end_date ?? now()->format("Y-m-t 23:59:59")
        ];
        
        @endphp
 <script src="{{ \App\Helper\Static\Methods::staticAsset("dashboard_assets/js/pace.js") }}"></script>
 <script src="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/charts.js") }}"></script>
    <script src="{{ \App\Helper\Static\Methods::staticAsset("dashboard_assets/libs/popper/popper.js") }}"></script>
  
    <script src="{{ \App\Helper\Static\Methods::staticAsset("dashboard_assets/js/sidenav.js") }}"></script>
    <script src="{{ \App\Helper\Static\Methods::staticAsset("dashboard_assets/js/layout-helpers.js") }}"></script>
    <script src="{{ \App\Helper\Static\Methods::staticAsset("dashboard_assets/js/material-ripple.js") }}"></script>

    <!-- Libs -->
    <script src="{{ \App\Helper\Static\Methods::staticAsset("dashboard_assets/libs/perfect-scrollbar/perfect-scrollbar.js") }}"></script>
    <script src="{{ \App\Helper\Static\Methods::staticAsset("dashboard_assets/libs/eve/eve.js") }}"></script>
    <script src="{{ \App\Helper\Static\Methods::staticAsset("dashboard_assets/libs/flot/flot.js") }}"></script>
    <script src="{{ \App\Helper\Static\Methods::staticAsset("dashboard_assets/libs/flot/curvedLines.js") }}"></script>
    <script src="{{ \App\Helper\Static\Methods::staticAsset("dashboard_assets/libs/chart-am4/core.js") }}"></script>
    <script src="{{ \App\Helper\Static\Methods::staticAsset("dashboard_assets/libs/chart-am4/charts.js") }}"></script>
    <script src="{{ \App\Helper\Static\Methods::staticAsset("dashboard_assets/libs/chart-am4/animated.js") }}"></script>
    
 


   <script src="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/moment/moment.min.js") }}"></script>
    <script src="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/daterangepicker.js") }}"></script>
    <script src="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/moment.js") }}"></script>


  


    <script src="{{ \App\Helper\Static\Methods::staticAsset("dashboard_assets/js/analytics.js") }}"></script>
    <script src="{{ \App\Helper\Static\Methods::staticAsset("dashboard_assets/js/pages/dashboards_index.js") }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-chart-geo"></script>
    <script type="text/javascript">
       
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
                        days: 365
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
                        'Current Month': [moment().startOf('month'), moment().endOf('month')],
                        'Previous Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                        'Current Year': [moment().startOf('year'), moment().endOf('year')],
                        'Previous Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')],
                        'Over All': [moment('2022-01-01'), moment().endOf('year')]
                    },
                });

               
                $('input[name="date-ranger"]').val(start.format('MMM D, YYYY') + ' - ' + end.format('MMM D, YYYY'));
                
            
                $('input[name="date-ranger"]').on('apply.daterangepicker', function (ev, picker) {

                   

                    $(this).val(picker.startDate.format('MMM D, YYYY') + ' - ' + picker.endDate.format('MMM D, YYYY'));

                

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
                   
                                    location.reload();
                });

                $('input[name="date-ranger"]').on('cancel.daterangepicker', function (ev, picker) {
                    $(this).val('');
                });
                })
                
                
      </script>
    
@endpushonce
  <script>
    let graph =@json($earningSummaryGraph);
</script>

@php
    $trackingLinkComplete = \App\Models\GenerateLink::whereIn("path", ["GenerateTrackingLinkJob", "GenerateTrackingLinkWithSubIDJob"])->whereMonth("created_at", now()->format("m"))->where("status", 0)->count();
    $trackingLinkPending = \App\Models\GenerateLink::whereIn("path", ["GenerateTrackingLinkJob", "GenerateTrackingLinkWithSubIDJob"])->whereMonth("created_at", now()->format("m"))->where("status", 1)->count();
    $trackingLinkRetry = \App\Models\GenerateLink::whereIn("path", ["GenerateTrackingLinkJob", "GenerateTrackingLinkWithSubIDJob"])->whereMonth("created_at", now()->format("m"))->where("status", 1)->where('is_processing',3)->count();
 $DeepLinkComplete = \App\Models\GenerateLink::where("path", "DeeplinkGenerateJob")->whereMonth("created_at", now()->format("m"))->where("status", 0)->count();
    $DeepLinkPending = \App\Models\GenerateLink::where("path", "DeeplinkGenerateJob")->whereMonth("created_at", now()->format("m"))->where("status", 1)->count();
    $DeepLinkRetry = \App\Models\GenerateLink::where("path", "DeeplinkGenerateJob")->whereMonth("created_at", now()->format("m"))->whereNotNull("error_message")->count();
@endphp

@section("content")

<div class="contents">
        
        <div class="container-fluid mt-5">

    <!-- [ Layout container ] Start -->
            <div class="layout-container">
              

                <!-- [ Layout content ] Start -->
                <div class="layout-content">

                    <!-- [ content ] Start -->
                    <div class="container-fluid flex-grow-1 container-p-y">
                         @if(auth()->user()->type != 'staff')
                        <div class="d-flex" style="justify-content: space-between;">
                        <div>
                        <h4 class="font-weight-bold py-3 mb-0">Dashboard</h4>
                        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Library</a></li>
                                <li class="breadcrumb-item active">Data</li>
                            </ol>
                        </div>
                        </div>
                        
        <div class="form-group mb-0">
                                            <div class="input-container icon-left position-relative" style="background: white;padding: 0px 5px;width: 198px;display: flex;justify-content: right;">
                                                <span class="input-icon">
                                                    <span data-feather="calendar"></span>
                                                </span>
                                                <input type="text" class="form-control form-control-default date-ranger"
                                                       name="date-ranger"
                                                       placeholder="Jan 01, {{ now()->format("Y") }} - {{ now()->format("M d, Y") }}"/>
                                            </div>
                                        </div>
     </div>
      @endif
      @if(auth()->user()->type != 'staff')
                        <div class="row">
                            <!-- 1st row Start -->
                            <div class="col-lg-7">
                                <div class="card mb-4">
                                    <div class="card-header with-elements">
                                        <h6 class="card-header-title mb-0">Statistics</h6>
                                        <div class="card-header-elements ml-auto">
                                            <label class="text m-0">
                                                <span class="text-light text-tiny font-weight-semibold align-middle">SHOW STATS</span>
                                                <span class="switcher switcher-sm d-inline-block align-middle mr-0 ml-2"><input type="checkbox" class="switcher-input" id="switcher-input"><span class="switcher-indicator"><span class="switcher-yes"></span><span
                                                            class="switcher-no"></span></span></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                       <canvas id="salesChart" height="200"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="row" id="show-stats-digit">
                                    <div class="col-md-6">
                                        <div class="card mb-4 bg-pattern-2-dark">
                                            <div class="card-body" id="total_sales" onclick="show_graph('total_sales',graph)">
                                                <div class="d-flex align-items-center">
                                                    <div class="lnr lnr-chart-bars display-4"></div>
                                                    <div class="ml-3">
                                                        <div class="small">Total Sales</div>
                                                        <div class="text-large">$ {{number_format($earningSummary['total_sales'],2)}}</div>
                                                    </div>
                                                    
                                                   
                                                </div>
                                               
                                                <div>
                                                     @if($earningSummaryComparison['total_sales']['change_percent'] < 0)
                                                    <p class="progress-downword">
                                <strong>
                                    <span class="la la-arrow-down"></span>
                                    {{$earningSummaryComparison['total_sales']['change_percent']}}%
                                </strong>
                                From Previous Period
                            </p>
                                                    @else
                                                    <p class="progress-upword">
                                <strong>
                                    <span class="la la-arrow-up"></span>
                                    {{$earningSummaryComparison['total_sales']['change_percent']}}%
                                </strong>
                                From Previous Period
                            </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card mb-4 bg-pattern-2-dark">
                                            <div class="card-body" id="total_commission" onclick="show_graph('total_commission',graph)">
                                                <div class="d-flex align-items-center">
                                                    <div class="lnr lnr-gift display-4"></div>
                                                    <div class="ml-3">
                                                        <div class="small">Total Commission</div>
                                                        <div class="text-large">$ {{number_format($earningSummary['total_commission'],2)}}</div>
                                                    </div>
                                                    
                                                </div>
                                                 
                                                <div>
                                                    @if($earningSummaryComparison['total_commission']['change_percent'] < 0)
                                                    <p class="progress-downword">
                                <strong>
                                    <span class="la la-arrow-down"></span>
                                    {{$earningSummaryComparison['total_commission']['change_percent']}}%
                                </strong>
                                From Previous Period
                            </p>
                                                    @else
                                                    <p class="progress-upword">
                                <strong>
                                    <span class="la la-arrow-up"></span>
                                    {{$earningSummaryComparison['total_commission']['change_percent']}}%
                                </strong>
                                From Previous Period
                            </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-md-6">
                                        <div class="card mb-4 bg-pattern-2-dark">
                                            <div class="card-body" id="total_transactions" onclick="show_graph('total_transactions',graph)">
                                                <div class="d-flex align-items-center">
                                                    <div class="lnr lnr-layers display-4"></div>
                                                    <div class="ml-3">
                                                        <div class="small">Total Transactions</div>
                                                        <div class="text-large">{{$earningSummary['total_transactions']}}</div>
                                                    </div>
                                                    
                                                </div>
                                                 
                                                <div>
                                                    @if($earningSummaryComparison['total_transactions']['change_percent'] < 0)
                                                    <p class="progress-downword">
                                <strong>
                                    <span class="la la-arrow-down"></span>
                                    {{$earningSummaryComparison['total_transactions']['change_percent']}}%
                                </strong>
                                From Previous Period
                            </p>
                                                    @else
                                                    <p class="progress-upword">
                                <strong>
                                    <span class="la la-arrow-up"></span>
                                    {{$earningSummaryComparison['total_transactions']['change_percent']}}%
                                </strong>
                                From Previous Period
                            </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-md-6">
                                        <div class="card mb-4 bg-pattern-2-dark">
                                            <div class="card-body" id="total_revenue" onclick="show_graph('total_revenue',graph)">
                                                <div class="d-flex align-items-center">
                                                    <div class="lnr lnr-cart display-4"></div>
                                                    <div class="ml-3">
                                                        <div class="small">Total Revenue</div>
                                                        <div class="text-large">$ {{number_format($earningSummary['total_profit'],2)}}</div>
                                                    </div>
                                                    
                                                </div>
                                                 
                                                <div>
                                                    @if($earningSummaryComparison['total_profit']['change_percent'] < 0)
                                                    <p class="progress-downword">
                                <strong>
                                    <span class="la la-arrow-down"></span>
                                    {{$earningSummaryComparison['total_profit']['change_percent']}}%
                                </strong>
                                From Previous Period
                            </p>
                                                    @else
                                                    <p class="progress-upword">
                                <strong>
                                    <span class="la la-arrow-up"></span>
                                    {{$earningSummaryComparison['total_profit']['change_percent']}}%
                                </strong>
                                From Previous Period
                            </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="card d-flex w-100 mb-4">
                                            <div class="row no-gutters row-bordered row-border-light h-100">
                                                <div class="d-flex col-sm-6 col-md-4 col-lg-6 align-items-center" onclick="show_graph('pending_commission',graph)">
                                                    <div class="card-body media align-items-center text-dark">
                                                        <i class="lnr lnr-clock display-4 d-block text-primary"></i>
                                                        <span class="media-body d-block ml-3"><span class="text-big mr-1 text-primary">$ {{number_format($earningSummary['pending_commission'],2)}}</span>
                                                            <br>
                                                            <small class="text-muted">Total Pending Commission</small>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="d-flex col-sm-6 col-md-4 col-lg-6 align-items-center" onclick="show_graph('approved_commission',graph)">
                                                    <div class="card-body media align-items-center text-dark">
                                                         <i class="lnr lnr-diamond display-4 d-block text-primary"></i>
                                                       
                                                        <span class="media-body d-block ml-3"><span class="text-big"><span class="mr-1 text-primary">$ {{number_format($earningSummary['approved_commission'],2)}}</span></span>
                                                            <br>
                                                            <small class="text-muted">Total Approved Commission</small>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="d-flex col-sm-6 col-md-4 col-lg-6 align-items-center" onclick="show_graph('declined_commission',graph)">
                                                    <div class="card-body media align-items-center text-dark">
                                                        <i class="lnr lnr-hourglass display-4 d-block text-primary"></i>
                                                        <span class="media-body d-block ml-3"><span class="text-big"><span class="mr-1 text-primary">$ {{number_format($earningSummary['declined_commission'],2)}}</span></span>
                                                            <br>
                                                            <small class="text-muted">Total Declined Commission</small>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="d-flex col-sm-6 col-md-4 col-lg-6 align-items-center">
                                                    <div class="card-body media align-items-center text-dark">
                                                        <i class="lnr lnr-license display-4 d-block text-primary"></i>
                                                        <span class="media-body d-block ml-3"><span class="text-big"><span class="mr-1 text-primary">$ {{$earningSummary['totalPaidAmount']}}</span></span>
                                                            <br>
                                                            <small class="text-muted">Total Amount Paid</small>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 1st row Start -->
                        </div>

                         @endif
                        <div class="row">
                            <!-- 2nd row Start -->
                            <div class="col-md-12">
                                <div class="card d-flex w-100 mb-4">
                                    <div class="row no-gutters row-bordered row-border-light h-100">
                                        <div class="d-flex col-md-6 col-lg-3 align-items-center">
                                            <div class="card-body">
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-auto">
                                                        <i class="lnr lnr-earth text-primary display-4"></i>
                                                    </div>
                                                    <div class="col">
                                                        <h6 class="mb-0 text-muted">Total <span class="text-primary">Advertisers</span></h6>
                                                        <h4 class="mt-3 mb-0">{{$advertisersStats['totalAdvertisers']}}</h4>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="d-flex col-md-6 col-lg-3 align-items-center">
                                            <div class="card-body">
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-auto">
                                                        <i class="lnr lnr-checkmark-circle text-primary display-4"></i>
                                                    </div>
                                                    <div class="col">
                                                        <h6 class="mb-0 text-muted">Total<span class="text-primary"> Active Advertisers</span> </h6>
                                                        <h4 class="mt-3 mb-0">{{$advertisersStats['totalActiveAdvertisers']}}</h4>
                                                    </div>
                                                </div>
                                            
                                            </div>
                                        </div>
                                        <div class="d-flex col-md-6 col-lg-3 align-items-center">
                                            <div class="card-body">
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-auto">
                                                        <i class="lnr lnr-location text-primary display-4"></i>
                                                    </div>
                                                    <div class="col">
                                                        <h6 class="mb-0 text-muted">Total<span class="text-primary"> New Advertisers</span></h6>
                                                        <h4 class="mt-3 mb-0">{{$advertisersStats['totalNewAdvertisers']}}</h4>
                                                    </div>
                                                </div>
                                              
                                            </div>
                                        </div>
                                        <div class="d-flex col-md-6 col-lg-3 align-items-center">
                                            <div class="card-body">
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-auto">
                                                        <i class="lnr lnr-hourglass text-primary display-4"></i>
                                                    </div>
                                                    <div class="col">
                                                        <h6 class="mb-0 text-muted">Total<span class="text-primary"> Pending Approvals</span></h6>
                                                        <h4 class="mt-3 mb-0">{{$advertisersStats['totalPending']}}</h4>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Staustic card 3 Start -->
                            </div>
                            <!-- 2nd row Start -->
                        </div>
         @if(auth()->user()->type != 'staff')              
 <div class="row">
                            <!-- 3rd row Start -->
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header with-elements pb-0">
                                        <h6 class="card-header-title mb-0">Top Publishers Commission & Sales</h6>
                                        <div class="card-header-elements ml-auto p-0">
                                            <ul class="nav nav-tabs">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" href="#sale-stats1">Commission</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#latest-sales1">Sales</a>
                                                </li>
                                                <li class="nav-item">
                                                   <select class='form-control' name="islimit" id="islimit">
                                                       <option value="5" selected>5</option>
                                                        <option value="10">10</option>
                                                         <option value="20">20</option>
                                                          <option value="30">30</option>
                                                   </select>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="nav-tabs-top">
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="sale-stats1">
                                                <div style="height: 330px" id="tasks-inner" class="ps-30">
                                                    <table class="table table-hover card-table">
                                                        <thead>
                                                            <tr>
                                                               
                                                                 <th>Domain Name</th>
                                                                <th>Total Commission</th>
                                                                <th>Transactions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="TopPublisherCommissions">
                                                            
                                                        </tbody>
                                                    </table>
                                                     <div id="topPublisherLoaderWrapper">
        <span class="loader" id="topPublisherLoader"></span>
    </div>
                                                </div>
                                               
                                            </div>
                                            <div class="tab-pane fade" id="latest-sales1">
                                                <div style="height: 330px" id="tab-table-3" class="ps-30">
                                                    <table class="table table-hover card-table">
                                                        <thead>
                                                            <tr>
                                                                
                                                                <th>Domain Name</th>
                                                                <th>Total Sales</th>
                                                                <th>Transactions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="TopPublisherSales">
                                                         
                                                           
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header with-elements pb-0">
                                        <h6 class="card-header-title mb-0">Top Advertisers Commission & Sales</h6>
                                        <div class="card-header-elements ml-auto p-0">
                                            <ul class="nav nav-tabs">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" href="#sale-stats">Commission</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#latest-sales">Sales</a>
                                                </li>
                                                <li class="nav-item">
                                                   <select class='form-control' name="islimit" id="islimit3">
                                                       <option value="5" selected>5</option>
                                                        <option value="10">10</option>
                                                         <option value="20">20</option>
                                                          <option value="30">30</option>
                                                   </select>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="nav-tabs-top">
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="sale-stats">
                                                <div style="height: 330px" id="tab-table-1" class="ps-30">
                                                    <table class="table table-hover card-table">
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                 <th>Advertiser Name</th>
                                                                <th>Total Commission</th>
                                                                <th>Transactions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="topAdvertisersCommission">
                                                            
                                                        </tbody>
                                                    </table>
                                                    <div id="topAdverisersLoaderWrapper">
        <span class="loader" id="topAdverisersLoader"></span>
    </div>
                                                </div>
                                               
                                            </div>
                                            <div class="tab-pane fade" id="latest-sales">
                                                <div style="height: 330px" id="tab-table-2" class="ps-30">
                                                    <table class="table table-hover card-table">
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th>Advertiser Name</th>
                                                                <th>Total Sales</th>
                                                                <th>Transactions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="topAdvertisersSale">
                                                           
                                                           
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 3rd row Start -->
                        </div>

 @endif
 @if(auth()->user()->type != 'staff')
                         <div class="row">
                            <div class="col-md-4">
                                <div class="card mb-4">
                                    <div class="card-header with-elements pb-0">
                                        <h6 class="card-header-title mb-0">Top Countries Clicks</h6>
                                        <div class="card-header-elements ml-auto p-0">
                                            <ul class="nav nav-tabs">
                                              
                                                <li class="nav-item">
                                                   <select class='form-control' name="islimit" id="islimit2">
                                                       <option value="5" selected>5</option>
                                                        <option value="10">10</option>
                                                         <option value="20">20</option>
                                                          <option value="30">30</option>
                                                   </select>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="nav-tabs-top">
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active">
                                 <div style="height: 450px" id="tasks-inner2" class="ps-30">
                                                    <table class="table table-hover card-table">
                                                        <thead>
                                                            <tr>
                                                               
                                                                 <th>Country</th>
                                                                <th>Total Clicks</th>
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody id="topClicksTable">
                                                          
                                                        </tbody>
                                                    </table>
                                                   <div id="topClickLoaderWrapper">
        <span class="loader" id="topClickLoader"></span>
    </div>
                                                </div>
                                                 </div>
                                               </div>
                                            </div>
                                          </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card mb-4" style="padding: 10px;">
                                <canvas id="countryClicksMap" width="500" height="300"></canvas>
                            </div>
                            </div>
                        </div>
 @endif
                         <div class="row">
                            <div class="col-md-6">
                                 <div class="card mb-4">
                                     <div class="revenue-device-chart">

    <div class="card broder-0">
        <div class="card-header with-elements pb-0">
                                        <h6 class="card-header-title mb-0">Tracking link Report</h6>
        </div>
        <!-- ends: .card-header -->
        <div class="card-body" style="padding: 0px">
            <div class="tab-content">
                <div class="tab-pane fade active show" id="rb_device-today" role="tabpanel" aria-labelledby="rb_device-today-tab">
                    <div class="revenue-pieChart-wrap">
                        <div style="justify-content: center;display: flex;height: 250px;">
                            
                            <canvas id="chartDoughnut3Extra" width="100" height="100"></canvas>
                        </div>
                    </div>
                    <div class="revenue-chart-box-list" style="margin-left: 40px;margin-right: 40px;margin-bottom: 20px;">
                        <div class="revenue-chart-box justify-items-center" style="justify-items: center;">
                            <div class="revenue-chart-box__Icon order-bg-opacity-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="23.96" viewBox="0 0 25 23.96" class="svg replaced-svg">
                                    <g id="paper-plane" transform="translate(-8.001 -7.833)">
                                        <path id="Path_963" data-name="Path 963" d="M13.833,19.575v4.832a.781.781,0,0,0,.538.742.772.772,0,0,0,.244.039.785.785,0,0,0,.63-.319l2.825-3.847Z" transform="translate(3.281 6.606)" fill="#20c997" opacity="0.5"></path>
                                        <path id="Path_964" data-name="Path 964" d="M32.673,7.978a.781.781,0,0,0-.814-.056L8.42,20.162a.782.782,0,0,0,.109,1.433l6.516,2.227L28.921,11.957,18.183,24.893,29.1,28.625A.78.78,0,0,0,30.128,28L32.992,8.728A.779.779,0,0,0,32.673,7.978Z" transform="translate(0 0)" fill="#20c997"></path>
                                    </g>
                                </svg>
                            </div>
                            <div class="my-10">
                                <div class="revenue-chart-box__data">
                                    {{ $trackingLinkComplete }}
                                </div>
                                <div class="revenue-chart-box__label">
                                    Completed
                                </div>
                            </div>
                        </div>
                        <div class="revenue-chart-box justify-items-center" style="justify-items: center;">
                            <div class="revenue-chart-box__Icon order-bg-opacity-warning">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" class="svg replaced-svg">
                                    <g id="email_1_" data-name="email (1)" transform="translate(-8 -8)">
                                        <path id="Path_1012" data-name="Path 1012" d="M30.656,13.333H26.731a2.859,2.859,0,0,1-.745,1.689L22.6,18.667a2.866,2.866,0,0,1-4.2,0l-3.386-3.647a2.855,2.855,0,0,1-.745-1.689H10.344A2.347,2.347,0,0,0,8,15.677v11.98A2.347,2.347,0,0,0,10.344,30H30.656A2.347,2.347,0,0,0,33,27.656V15.677A2.347,2.347,0,0,0,30.656,13.333Zm.261,5.116-8.969,4.687a3.141,3.141,0,0,1-2.9,0l-8.969-4.688V16.094l9.927,5.188a1.082,1.082,0,0,0,.98,0l9.927-5.188v2.355Z" transform="translate(0 3)" fill="#fa8b0c"></path>
                                        <path id="Path_1013" data-name="Path 1013" d="M21.6,15.761a.78.78,0,0,0-.716-.469H18.542V9.042a1.042,1.042,0,1,0-2.084,0v6.25H14.114a.781.781,0,0,0-.572,1.313l3.386,3.645a.781.781,0,0,0,1.145,0L21.459,16.6A.786.786,0,0,0,21.6,15.761Z" transform="translate(3 0)" fill="#fa8b0c" opacity="0.5"></path>
                                    </g>
                                </svg>
                            </div>
                            <div class="my-10">
                                <div class="revenue-chart-box__data">
                                    {{ $trackingLinkPending }}
                                </div>
                                <div class="revenue-chart-box__label">
                                    Pending
                                </div>
                            </div>
                        </div>
                        <div class="revenue-chart-box justify-items-center" style="justify-items: center;">
                            <div class="revenue-chart-box__Icon order-bg-opacity-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" class="svg replaced-svg">
                                    <g id="email_1_" data-name="email (1)" transform="translate(-8 -8)">
                                        <path id="Path_1012" data-name="Path 1012" d="M30.656,13.333H26.731a2.859,2.859,0,0,1-.745,1.689L22.6,18.667a2.866,2.866,0,0,1-4.2,0l-3.386-3.647a2.855,2.855,0,0,1-.745-1.689H10.344A2.347,2.347,0,0,0,8,15.677v11.98A2.347,2.347,0,0,0,10.344,30H30.656A2.347,2.347,0,0,0,33,27.656V15.677A2.347,2.347,0,0,0,30.656,13.333Zm.261,5.116-8.969,4.687a3.141,3.141,0,0,1-2.9,0l-8.969-4.688V16.094l9.927,5.188a1.082,1.082,0,0,0,.98,0l9.927-5.188v2.355Z" transform="translate(0 3)" fill="#fa8b0c"></path>
                                        <path id="Path_1013" data-name="Path 1013" d="M21.6,15.761a.78.78,0,0,0-.716-.469H18.542V9.042a1.042,1.042,0,1,0-2.084,0v6.25H14.114a.781.781,0,0,0-.572,1.313l3.386,3.645a.781.781,0,0,0,1.145,0L21.459,16.6A.786.786,0,0,0,21.6,15.761Z" transform="translate(3 0)" fill="#fa8b0c" opacity="0.5"></path>
                                    </g>
                                </svg>
                            </div>
                            <div class="my-10">
                                <div class="revenue-chart-box__data">
                                    {{ $trackingLinkRetry }}
                                </div>
                                <div class="revenue-chart-box__label">
                                    Retry
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ends: .card-body -->
    </div>

</div>
                                 </div>
                            </div>
                            
                            <div class="col-md-6">
                                 <div class="card mb-4">
                                    <div class="revenue-device-chart">

    <div class="card broder-0">
         <div class="card-header with-elements pb-0">
                                        <h6 class="card-header-title mb-0">Deep link Report</h6>
        </div>
        <!-- ends: .card-header -->
        <div class="card-body" style="padding: 0px">
            <div class="tab-content">
                <div class="tab-pane fade active show" id="rb_device-today" role="tabpanel" aria-labelledby="rb_device-today-tab">
                    <div class="revenue-pieChart-wrap">
                        <div style="justify-content: center;display: flex;height: 250px;">
                          
                            <canvas id="chartDoughnut4Extra"  width="100" height="100"></canvas>
                        </div>
                    </div>
                    <div class="revenue-chart-box-list" style="margin-left: 40px;margin-right: 40px;margin-bottom: 20px;">
                        <div class="revenue-chart-box justify-items-center" style="justify-items: center;">
                            <div class="revenue-chart-box__Icon order-bg-opacity-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="23.96" viewBox="0 0 25 23.96" class="svg replaced-svg">
                                    <g id="paper-plane" transform="translate(-8.001 -7.833)">
                                        <path id="Path_963" data-name="Path 963" d="M13.833,19.575v4.832a.781.781,0,0,0,.538.742.772.772,0,0,0,.244.039.785.785,0,0,0,.63-.319l2.825-3.847Z" transform="translate(3.281 6.606)" fill="#20c997" opacity="0.5"></path>
                                        <path id="Path_964" data-name="Path 964" d="M32.673,7.978a.781.781,0,0,0-.814-.056L8.42,20.162a.782.782,0,0,0,.109,1.433l6.516,2.227L28.921,11.957,18.183,24.893,29.1,28.625A.78.78,0,0,0,30.128,28L32.992,8.728A.779.779,0,0,0,32.673,7.978Z" transform="translate(0 0)" fill="#20c997"></path>
                                    </g>
                                </svg>
                            </div>
                            <div class="my-10">
                                <div class="revenue-chart-box__data">
                                    {{ $DeepLinkComplete }}
                                </div>
                                <div class="revenue-chart-box__label">
                                    Completed
                                </div>
                            </div>
                        </div>
                        <div class="revenue-chart-box justify-items-center" style="justify-items: center;">
                            <div class="revenue-chart-box__Icon order-bg-opacity-warning">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" class="svg replaced-svg">
                                    <g id="email_1_" data-name="email (1)" transform="translate(-8 -8)">
                                        <path id="Path_1012" data-name="Path 1012" d="M30.656,13.333H26.731a2.859,2.859,0,0,1-.745,1.689L22.6,18.667a2.866,2.866,0,0,1-4.2,0l-3.386-3.647a2.855,2.855,0,0,1-.745-1.689H10.344A2.347,2.347,0,0,0,8,15.677v11.98A2.347,2.347,0,0,0,10.344,30H30.656A2.347,2.347,0,0,0,33,27.656V15.677A2.347,2.347,0,0,0,30.656,13.333Zm.261,5.116-8.969,4.687a3.141,3.141,0,0,1-2.9,0l-8.969-4.688V16.094l9.927,5.188a1.082,1.082,0,0,0,.98,0l9.927-5.188v2.355Z" transform="translate(0 3)" fill="#fa8b0c"></path>
                                        <path id="Path_1013" data-name="Path 1013" d="M21.6,15.761a.78.78,0,0,0-.716-.469H18.542V9.042a1.042,1.042,0,1,0-2.084,0v6.25H14.114a.781.781,0,0,0-.572,1.313l3.386,3.645a.781.781,0,0,0,1.145,0L21.459,16.6A.786.786,0,0,0,21.6,15.761Z" transform="translate(3 0)" fill="#fa8b0c" opacity="0.5"></path>
                                    </g>
                                </svg>
                            </div>
                            <div class="my-10">
                                <div class="revenue-chart-box__data">
                                    {{ $DeepLinkPending }}
                                </div>
                                <div class="revenue-chart-box__label">
                                    Pending
                                </div>
                            </div>
                        </div>
                        <div class="revenue-chart-box justify-items-center" style="justify-items: center;">
                            <div class="revenue-chart-box__Icon order-bg-opacity-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" class="svg replaced-svg">
                                    <g id="email_1_" data-name="email (1)" transform="translate(-8 -8)">
                                        <path id="Path_1012" data-name="Path 1012" d="M30.656,13.333H26.731a2.859,2.859,0,0,1-.745,1.689L22.6,18.667a2.866,2.866,0,0,1-4.2,0l-3.386-3.647a2.855,2.855,0,0,1-.745-1.689H10.344A2.347,2.347,0,0,0,8,15.677v11.98A2.347,2.347,0,0,0,10.344,30H30.656A2.347,2.347,0,0,0,33,27.656V15.677A2.347,2.347,0,0,0,30.656,13.333Zm.261,5.116-8.969,4.687a3.141,3.141,0,0,1-2.9,0l-8.969-4.688V16.094l9.927,5.188a1.082,1.082,0,0,0,.98,0l9.927-5.188v2.355Z" transform="translate(0 3)" fill="#fa8b0c"></path>
                                        <path id="Path_1013" data-name="Path 1013" d="M21.6,15.761a.78.78,0,0,0-.716-.469H18.542V9.042a1.042,1.042,0,1,0-2.084,0v6.25H14.114a.781.781,0,0,0-.572,1.313l3.386,3.645a.781.781,0,0,0,1.145,0L21.459,16.6A.786.786,0,0,0,21.6,15.761Z" transform="translate(3 0)" fill="#fa8b0c" opacity="0.5"></path>
                                    </g>
                                </svg>
                            </div>
                            <div class="my-10">
                                <div class="revenue-chart-box__data">
                                    {{ $DeepLinkRetry }}
                                </div>
                                <div class="revenue-chart-box__label">
                                    Retry
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ends: .card-body -->
    </div>

</div>
                    
                     </div>
                        </div>
                        
                    </div>


                    
                    @if(auth()->user()->type != 'staff')
                    <div class="row">
                            <!-- 3rd row Start -->
                            
                            <div class="col-md-12">
                                <div class="card mb-4">
                                    <div class="card-header with-elements pb-0">
                                        <h6 class="card-header-title mb-0">Transactions Overview</h6>
                                        <div class="card-header-elements ml-auto p-0">
                                            <ul class="nav nav-tabs">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" href="#transaction-sale-stats">Top Sales</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#transaction-latest-sales">Latest</a>
                                                </li>
                                                <li class="nav-item">
                                                   <select class='form-control' name="islimit" id="islimit1">
                                                       <option value="5" selected>5</option>
                                                        <option value="10">10</option>
                                                         <option value="20">20</option>
                                                          <option value="30">30</option>
                                                   </select>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="nav-tabs-top">
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="transaction-sale-stats">
                                                <div style="height: 330px" id="tab-table-4" class="ps-30">
                                                    <table class="table table-hover card-table">
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                 <th>Advertiser Name</th>
                                                                 <th>Transaction Date</th>
                                                                 <th>Commission Status</th>
                                                                 <th>Source</th>
                                                                 <th>Currency</th>
                                                                 <th>Sales Amount</th>
                                                                
                                                                <th>Commission Amount</th>
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody id="topTransactionstable">
                                                          
                                                        </tbody>
                                                    </table>
                                                     <span class="loader" id="topTransactionsLoader"></span>
                                                </div>
                                               
                                            </div>
                                            <div class="tab-pane fade" id="transaction-latest-sales">
                                                <div style="height: 330px" id="tab-table-5" class="ps-30">
                                                    <table class="table table-hover card-table">
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                 <th>Advertiser Name</th>
                                                                 <th>Transaction Date</th>
                                                                 <th>Commission Status</th>
                                                                 <th>Source</th>
                                                                 <th>Currency</th>
                                                                 <th>Sales Amount</th>
                                                                <th>Commission Amount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="latestTransactionstable">
                                                           
                                                           
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 3rd row Start -->
                        </div>
                    @endif

 @if(auth()->user()->type != 'staff')
                         <div class="row">
                            <!-- 3rd row Start -->
                            
                            <div class="col-md-12">
                                <div class="card mb-4">
                                    <div class="card-header with-elements pb-0">
                                        <h6 class="card-header-title mb-0">Latest Advertisers</h6>
                                        <div class="card-header-elements ml-auto p-0">
                                            <ul class="nav nav-tabs">
                                                
                                                <li class="nav-item">
                                                   <select class='form-control' name="islimit" id="islimit5">
                                                       <option value="5" selected>10</option>
                                                        <option value="10">20</option>
                                                         <option value="20">30</option>
                                                          <option value="30">50</option>
                                                   </select>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="nav-tabs-top">
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active">
                                                <div style="height: 440px" id="tab-table-6" class="ps-30">
                                                  
                                                    @include("template.publisher.advertisers.advertiser-list", compact('advertisers'))
                                                    </div>
                                               
                                            </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 3rd row Start -->
                        </div>

 @endif

                    <!-- [ content ] End -->

                        
                <!-- [ Layout content ] Start -->
            </div>
            <!-- [ Layout container ] End -->
                <!-- [ Layout footer ] End -->
                </div>
                <!-- [ Layout content ] Start -->
            </div>
            <!-- [ Layout container ] End -->
            
           @pushonce('scripts')
<script>


    let salesChartInstance = null;

    function show_graph(type, response) {
        const earningGraphData = response;
        const title = type.replace(/_/g, ' ').replace(/\b\w/g, char => char.toUpperCase());
        const currentData = earningGraphData.current;
        const previousData = earningGraphData.previous;

        const currentLabels = currentData.map(item => item.date);
        const currentSales = currentData.map(item => parseFloat(item[type]));
        const previousSales = previousData.length ? previousData.map(item => parseFloat(item[type])) : [];
        
        let card_body = document.getElementsByClassName('card-body');

        for (let i = 0; i < card_body.length; i++) {
            if (card_body[i].classList.contains('active_card_body')) {
                card_body[i].classList.remove('active_card_body');
            }
        }

        let id = document.getElementById(type);
            if(id){
                id.classList.add('active_card_body');
            }


        const ctx = document.getElementById('salesChart')?.getContext('2d');

        if (!ctx) {
            console.error("Canvas element with ID 'salesChart' not found.");
            return;
        }

        // Destroy previous chart if exists
        if (salesChartInstance) {
            salesChartInstance.destroy();
        }

        salesChartInstance = new Chart(ctx, {
            type: 'line',
            data: {
                labels: currentLabels,
                datasets: [
                    {
                        label: 'This Month',
                        data: currentSales,
                        borderColor: '#4F46E5',
                        backgroundColor: 'rgba(79, 70, 229, 0.2)',
                        fill: true,
                        tension: 0.4,
                    },
                    ...(previousData.length ? [{
                        label: 'Last Month',
                        data: previousSales,
                        borderColor: '#F97316',
                        backgroundColor: 'rgba(249, 115, 22, 0.2)',
                        fill: true,
                        tension: 0.4,
                    }] : [])
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                        display: false
                    },
                    title: {
                        display: true,
                        text: title
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Date'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Amount'
                        }
                    }
                }
            }
        });
        
          let status = '';
        
        if(type == 'approved_commission'){
            status = 'approved';
        }else if(type == 'pending_commission'){
            status = 'pending';
        }else if(type == 'declined_commission'){
            status = 'declined';
        }
        
        getTopTransactions(status);
                getTopPublishers(status);
                getTopAdvertisers(status);
       
    }

    $(document).ready(function () {
        let response = @json($earningSummaryGraph);
         let status = '';
        show_graph('total_sales', response);
        getTopClicks();
        getTopTransactions(status);
        getTopPublishers(status);
        getTopAdvertisers(status);
 $('#salesChart').css('display', 'none');
                          $('#show-stats-digit').css('display', 'none');
    
    chartjsPieExtra("chartDoughnut3Extra", "20", (data = [{{ $trackingLinkComplete }}, {{ $trackingLinkPending }}, {{ $trackingLinkRetry }}]), ["Complete", "Pending", "Failed"]);
 chartjsDoughnutExtra("chartDoughnut4Extra", "20", (data = [{{ $DeepLinkComplete }}, {{ $DeepLinkPending }}, {{ $DeepLinkRetry }}]), ["Complete", "Pending", "Failed"]);
    });


    function getTopClicks() {
    const urlParams = new URLSearchParams(window.location.search);
    let startDate = urlParams.get('start_date');
    let endDate = urlParams.get('end_date');
    let islimit = urlParams.get('islimit');

    if (!startDate || !endDate) {
        const now = new Date();
        const firstDay = new Date(now.getFullYear(), now.getMonth(), 1);
        const lastDay = new Date(now.getFullYear(), now.getMonth() + 1, 0);

        const format = date => date.toISOString().split('T')[0]; // YYYY-MM-DD

        startDate = format(firstDay);
        endDate = format(lastDay);
    }

    $.ajax({
        url: '{{ route('admin.topClicks') }}',
        method: 'GET',
        data: {
            start_date: startDate,
            end_date: endDate,
            islimit : islimit
        },
        success: function (response) {
          
           let data = response.topClick;
           let html = '';
           for(i = 0 ; i < data.length; i++){
                html += `<tr>
                                                                 
                                                                <td class="align-middle">
                                                                    <a href="javascript:" class="text-dark">${data[i].country}</a>
                                                                </td>
                                                                <td class="align-middle">${data[i].total_clicks}</td>
                                                                 
                                                            </tr>`
           }

           document.getElementById('topClicksTable').innerHTML = html;
           countryGraph(data);
           document.getElementById('topClickLoader').style.display = 'none';
           document.getElementById('topClickLoaderWrapper').style.display = 'none';
        },
        error: function (xhr) {
            console.error('Error:', xhr.responseText);
        }
    });
}
function getTopAdvertisers(status){
      const urlParams = new URLSearchParams(window.location.search);
    let startDate = urlParams.get('start_date');
    let endDate = urlParams.get('end_date');
    let islimit = urlParams.get('islimit');

    if (!startDate || !endDate) {
        const now = new Date();
        const firstDay = new Date(now.getFullYear(), now.getMonth(), 1);
        const lastDay = new Date(now.getFullYear(), now.getMonth() + 1, 0);
firstDay.setDate(firstDay.getDate() + 1);
lastDay.setDate(lastDay.getDate() + 1);
        const format = date => date.toISOString().split('T')[0]; // YYYY-MM-DD

        startDate = format(firstDay);
        endDate = format(lastDay);
    }

    $.ajax({
        url: '{{ route('admin.topAdvertisers') }}',
        method: 'GET',
        data: {
            start_date: startDate,
            end_date: endDate,
            islimit : islimit,
            status: status
        },
        success: function (response) {
           
            let topSales = response.topSales;
            let sales = '';
            for (let i = 0; i < topSales.length; i++) {
    let a = topSales[i];
   let logoUrl = '';
    if (a.fetch_logo_url) {
        logoUrl = a.fetch_logo_url;
    } else if (a.logo) {
        logoUrl = "https://app.linkscircle.com" + (a.logo.startsWith("/") ? a.logo : "/" + a.logo); // replace with correct path if needed
    } else {
        logoUrl = '/placeholder-image.jpg'; // fallback image
    }
    if (a.fetch_logo_url) {
        logo = `<img loading="lazy" class="ap-img__main h-auto mr-10" src="${logoUrl}" alt="${a.advertiser_name}" style="width: 50px">`;
    } else if (a.logo) {
        logo = `<img loading="lazy" class="ap-img__main h-auto mr-10" src="${logoUrl}" alt="${a.advertiser_name}" style="width: 60px">`;
    } else {
        logo = `<img loading="lazy" class="ap-img__main h-auto mr-10" src="${logoUrl}" alt="${a.advertiser_name}" style="width: 50px">`;
    }

    sales += `
        <tr>
            <td>${logo}</td>
            <td class="align-middle">
                <a href="javascript:" class="text-dark">${a.advertiser_name}</a>
            </td>
            <td class="align-middle">${Number(a.total_sales_amount).toFixed(2)}</td>
            <td class="align-middle">${a.total_transactions}</td>
        </tr>
    `;
}

            document.getElementById('topAdvertisersSale').innerHTML = sales


             let topCommissions = response.topCommissions;
           let Commissions = '';
for (let i = 0; i < topCommissions.length; i++) {
    let a = topCommissions[i];
   let logoUrl = '';
    if (a.fetch_logo_url) {
        logoUrl = a.fetch_logo_url;
    } else if (a.logo) {
        logoUrl ="https://app.linkscircle.com" + (a.logo.startsWith("/") ? a.logo : "/" + a.logo); // replace with correct path if needed
    } else {
        logoUrl = '/placeholder-image.jpg'; // fallback image
    }
    if (a.fetch_logo_url) {
        logo = `<img loading="lazy" class="ap-img__main h-auto mr-10" src="${logoUrl}" alt="${a.advertiser_name}" style="width: 50px">`;
    } else if (a.logo) {
        logo = `<img loading="lazy" class="ap-img__main h-auto mr-10" src="${logoUrl}" alt="${a.advertiser_name}" style="width: 60px">`;
    } else {
        logo = `<img loading="lazy" class="ap-img__main h-auto mr-10" src="${logoUrl}" alt="${a.advertiser_name}" style="width: 50px">`;
    }

    Commissions += `
        <tr>
            <td>${logo}</td>
            <td class="align-middle">
                <a href="javascript:" class="text-dark">${a.advertiser_name}</a>
            </td>
            <td class="align-middle">${Number(a.total_commission_amount).toFixed(2)}</td>
            <td class="align-middle">${a.total_transactions}</td>
        </tr>
    `;
}

            document.getElementById('topAdvertisersCommission').innerHTML = Commissions
document.getElementById('topAdverisersLoaderWrapper').style.display = 'none';
            document.getElementById('topAdverisersLoader').style.display = 'none';
             },
        error: function (xhr) {
            console.error('Error:', xhr.responseText);
        }
    });
}

function getTopPublishers(status){
     const urlParams = new URLSearchParams(window.location.search);
    let startDate = urlParams.get('start_date');
    let endDate = urlParams.get('end_date');
    let islimit = urlParams.get('islimit');

      // If no dates OR if invalid dates from query string
    if (!startDate || !endDate) {
        const now = new Date();
        const firstDay = new Date(now.getFullYear(), now.getMonth(), 1);
        const lastDay = new Date(now.getFullYear(), now.getMonth() + 1, 0);
firstDay.setDate(firstDay.getDate() + 1);
lastDay.setDate(lastDay.getDate() + 1);
        const format = date => date.toISOString().split('T')[0]; // YYYY-MM-DD
        
        startDate = format(firstDay);
        endDate = format(lastDay);
    }

    

    $.ajax({
        url: '{{ route('admin.topPublsihers') }}',
        method: 'GET',
        data: {
            start_date: startDate,
            end_date: endDate,
            islimit : islimit,
            status: status
        },
        success: function (response) {
            let topSales = response.topSales;
            let sales = '';
            for(i = 0; i < topSales.length; i++){
                let a = topSales[i];
                sales += `<tr>
                                                                 
                                                                <td class="align-middle">
                                                                    <a href="javascript:" class="text-dark">${a.name}</a>
                                                                </td>
                                                                <td class="align-middle">${parseFloat(a.total_sales_amount).toFixed(2)}</td>
                                                                 <td class="align-middle">${a.total_transactions}</td>
                                                            </tr>`
            }

            document.getElementById('TopPublisherSales').innerHTML = sales


             let topCommissions = response.topCommissions;
            let Commissions = '';
            for(i = 0; i < topCommissions.length; i++){
                let ab = topCommissions[i];
                Commissions += `<tr>
                                                                 
                                                                <td class="align-middle">
                                                                    <a href="javascript:" class="text-dark">${ab.name}</a>
                                                                </td>
                                                                <td class="align-middle">${parseFloat(ab.total_commission_amount).toFixed(2)}</td>
                                                                 <td class="align-middle">${ab.total_transactions}</td>
                                                            </tr>`
            }

            document.getElementById('TopPublisherCommissions').innerHTML = Commissions

            document.getElementById('topPublisherLoader').style.display = 'none';
            document.getElementById('topPublisherLoaderWrapper').style.display = 'none';
             },
        error: function (xhr) {
            console.error('Error:', xhr.responseText);
        }
    });
}


function getTopTransactions(status) {
    const urlParams = new URLSearchParams(window.location.search);
    let startDate = urlParams.get('start_date');
    let endDate = urlParams.get('end_date');
    let islimit = urlParams.get('islimit');

    if (!startDate || !endDate) {
        const now = new Date();
        const firstDay = new Date(now.getFullYear(), now.getMonth(), 1);
        const lastDay = new Date(now.getFullYear(), now.getMonth() + 1, 0);
firstDay.setDate(firstDay.getDate() + 1);
lastDay.setDate(lastDay.getDate() + 1);
        const format = date => date.toISOString().split('T')[0]; // YYYY-MM-DD

        startDate = format(firstDay);
        endDate = format(lastDay);
    }

    $.ajax({
        url: '{{ route('admin.topTransactions') }}',
        method: 'GET',
        data: {
            start_date: startDate,
            end_date: endDate,
            islimit : islimit,
            status: status
        },
        success: function (response) {
           
           let topTransactions = response.topTransactions;
           let top = '';
for (let i = 0; i < topTransactions.length; i++) {
    const a = topTransactions[i];

    let logoUrl = '';
    if (a.fetch_logo_url) {
        logoUrl = a.fetch_logo_url;
    } else if (a.logo) {
        logoUrl = "https://app.linkscircle.com" + (a.logo.startsWith("/") ? a.logo : "/" + a.logo); // replace with correct path if needed
    } else {
        logoUrl = '/path-to-placeholder-image.jpg'; // fallback image
    }

    top += `<tr>
        <td>
            <img loading="lazy" class="ap-img__main h-auto mr-10" src="${logoUrl}" alt="${a.advertiser_name}" style="width: 50px">
        </td>
        <td class="align-middle">
            <a href="javascript:" class="text-dark">${a.advertiser_name}</a>
        </td>
        <td class="align-middle">${a.transaction_date}</td>
        <td class="align-middle">${a.commission_status}</td>
        <td class="align-middle">${a.source}</td>
        <td class="align-middle">${a.sale_amount_currency}</td>
        <td class="align-middle">${parseFloat(a.sale_amount).toFixed(2)}</td>
        <td class="align-middle">${parseFloat(a.commission_amount).toFixed(2)}</td>
    </tr>`;
}

           document.getElementById('topTransactionstable').innerHTML = top;

let latestTransactions = response.latestTransactions;
           let latest = '';
for (let i = 0; i < latestTransactions.length; i++) {
    const a = latestTransactions[i];

    let logoUrl = '';
    if (a.fetch_logo_url) {
        logoUrl = a.fetch_logo_url;
    } else if (a.logo) {
        logoUrl = "https://app.linkscircle.com" + (a.logo.startsWith("/") ? a.logo : "/" + a.logo); // replace with correct path if needed
    } else {
        logoUrl = '/path-to-placeholder-image.jpg'; // fallback image
    }

    latest += `<tr>
        <td>
            <img loading="lazy" class="ap-img__main h-auto mr-10" src="${logoUrl}" alt="${a.advertiser_name}" style="width: 50px">
        </td>
        <td class="align-middle">
            <a href="javascript:" class="text-dark">${a.advertiser_name}</a>
        </td>
        <td class="align-middle">${a.transaction_date}</td>
        <td class="align-middle">${a.commission_status}</td>
        <td class="align-middle">${a.source}</td>
        <td class="align-middle">${a.sale_amount_currency}</td>
        <td class="align-middle">${parseFloat(a.sale_amount).toFixed(2)}</td>
        <td class="align-middle">${parseFloat(a.commission_amount).toFixed(2)}</td>
    </tr>`;
}

           document.getElementById('latestTransactionstable').innerHTML = latest;

           document.getElementById('topTransactionsLoader').style.display = 'none';
           document.getElementById('topTransactionsLoaderWrapper').style.display = 'none';
        },
        error: function (xhr) {
            console.error('Error:', xhr.responseText);
        }
    });
}

function countryGraph(data){
 const countryClicks = {};
    data.forEach(item => {
        countryClicks[item.country] = item.total_clicks;
    });


fetch('https://unpkg.com/world-atlas/countries-50m.json')
    .then(res => res.json())
    .then(world => {
        const countries = ChartGeo.topojson.feature(world, world.objects.countries).features;
const normalizeCountry = name => {
    switch (name) {
        case "United States of America": return "United States";
        case "Russian Federation": return "Russia";
        case "Korea, Republic of": return "South Korea";
        case "Viet Nam": return "Vietnam";
        case "Iran (Islamic Republic of)": return "Iran";
        case "Syrian Arab Republic": return "Syria";
        case "Libyan Arab Jamahiriya": return "Libya";
        case "Lao People's Democratic Republic": return "Laos";
        case "United Republic of Tanzania": return "Tanzania";
        case "Bolivia (Plurinational State of)": return "Bolivia";
        case "Democratic Republic of the Congo": return "Congo (Kinshasa)";
        case "Republic of the Congo": return "Congo (Brazzaville)";
        default: return name;
    }
};
        // You are using country names as keys (e.g., "United States")
        const data = countries.map(feature => {
    const name = normalizeCountry(feature.properties.name);
    const value = countryClicks[name] ?? 0;

    return {
        feature,
        value
    };
});
        const ctx = document.getElementById('countryClicksMap').getContext('2d');

        new Chart(ctx, {
            type: 'choropleth',
            data: {
                labels: countries.map(d => d.properties.name),
                datasets: [{
                    label: 'Click Count by Country',
                    data: data,
                    outline: countries,
                    backgroundColor: (ctx) => {
                        const v = ctx?.dataset?.data?.[ctx.dataIndex]?.value ?? 0;
                        return v > 900000 ? '#003f5c' :
                               v > 700000  ? '#58508d' :
                               v > 600000  ? '#0c74ea' : 
                               v > 400000  ?'#d51831':
                               v > 300000  ?'#ca9a4e':
                               v > 200000  ?'#0cefc5':
                               v > 100000  ?'#e208b1':
                               v > 50000  ?'#eeef0c':
                               v > 10000  ?'#3208e2':
                               v === 0  ? '#4e65ca' :
                      '#ffa600'; // fallback for values between 1–100
                    }
                }]
            },
            options: {
                showOutline: true,
                showGraticule: true,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    projection: {
                        axis: 'x',
                        projection: 'equalEarth'
                    },
                    color: {
                        axis: 'x',
                        quantize: 5,
                        legend: {
                            position: 'top-right'
                        }
                    }
                }
            }
        });
    });
}
    
        $('#islimit, #islimit1, #islimit2, #islimit3, #islimit5').on('change', function () {
                    let value = $(this).val();
                  
                    let url = new URL(document.URL);
                    let urlParams = url.searchParams;

                    if (url.search) {
                        if (urlParams.has('page')) {
                            urlParams.delete('page');
                            urlParams.append('page', "1");
                        }
                    }
                    
                    if (urlParams.has(`islimit`)) {
                        urlParams.delete(`islimit`);
                    }
                    
                    urlParams.append("islimit", value);
                    history.pushState({}, null, url.href);

                    let dataObj = {};
                    dataObj.islimit = urlParams.get(`islimit`);
                    location.reload();
                })



                $('#switcher-input').on('change',function(){
                    let checked = $(this).is(':checked')
                    if(checked){
                        console.log('checked');
                       $('#salesChart').css('display', 'block');
                       $('#show-stats-digit').css('display', 'flex');
                    }else{
                        console.log('unchecked');
                          $('#salesChart').css('display', 'none');
                          $('#show-stats-digit').css('display', 'none');
                    }
                })
                
</script>
@endpushonce
@endsection
