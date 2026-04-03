    <!-- Custom styles -->
    <style>
        .card-overview-progress .card-header {
            min-height: 130px;
        }
    </style>
    <!-- Custom Styles  -->

    <div class="contents">

        <div class="container-fluid @if(Session::has('notify-warning')) @else mt-2 @endif">

            @include("template.publisher.widgets.profile_completion_percentage")

            <div class="row">

                <div class="col-lg-12 mt-4 mb-3">
                    @include("partial.publisher.alert")
                </div>

                <div class="col-xxl-4 col-lg-5 m-bottom-30">
                    @include("template.publisher.widgets.earning_overview", compact('earningOverview'))
                </div>
                <div class="col-xxl-8 col-lg-7 m-bottom-30">
                    @include("template.publisher.widgets.performance_overview", compact('performanceOverview'))
                </div>
                <div class="col-xxl-4  col-lg-4 col-sm-12 m-bottom-30">
                    @include("template.publisher.widgets.account_summary", compact('accountSummary'))
                </div>
                <div class="col-xxl-4  col-lg-4 col-sm-12 m-bottom-30">
                    @include("template.publisher.widgets.top_advertisers_by_sales", compact('topSales'))
                </div>
                <div class="col-xxl-4  col-lg-4 col-sm-12 m-bottom-30">
                    @include("template.publisher.widgets.top_advertisers_by_clicks", compact('topClicks'))
                </div>
                <div class="col-xxl-4 col-lg-4 col-sm-12 m-bottom-30">
                    @include("template.publisher.widgets.deeplink")
                </div>
                <div class="col-xxl-8 col-lg-8 col-sm-12 m-bottom-30">
                    @include("template.publisher.advertisers.advertiser-list", compact('advertisers'))
                </div>
            </div>
        </div>

    </div>

