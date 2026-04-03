<div class="card broder-0">
    <div class="card-header">
        <h6>Performance Overview</h6>
        <div class="card-extra">
            <ul class="perfomence-tab-links card-tab-links mr-3 nav-tabs nav">
                <li>
                    <a class="active" href="#w_perfomence-year" data-toggle="tab" id="w_perfomence-year-tab" role="tab" area-controls="w_perfomence" aria-selected="true">Monthly</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- ends: .card-header -->
    <div class="card-body pt-0">
        <div class="tab-content perfomence-tab-wrap">
            <div class="tab-pane fade active show" id="w_perfomence-year" role="tabpanel" aria-labelledby="w_perfomence-year">
                <div class="performance-stats nav-tabs nav">
                    <a href="#commission" class="active" data-toggle="tab" id="commission-tab" role="tab" area-controls="commission" aria-selected="false">
                        @if(isset($performanceOverview['commission']['growth']) && $performanceOverview['commission']['growth'] == "up")
                            <div class="performance-stats__up">
                                <span>Total Commissions</span>
                                <strong>
                                    {{ $performanceOverview['commission']['count'] ?? 0 }}
                                    <sub>
                                        <i class="la la-arrow-up"></i>
                                        {{ $performanceOverview['commission']['percentage'] ?? 0 }}
                                    </sub>
                                </strong>
                            </div>
                        @else
                            <div class="performance-stats__down">
                                <span>Total Commissions</span>
                                <strong>
                                    {{ $performanceOverview['commission']['count'] ?? 0 }}
                                    <sub>
                                        <i class="la la-arrow-down"></i>
                                        {{ $performanceOverview['commission']['percentage'] ?? 0 }}
                                    </sub>
                                </strong>
                            </div>
                        @endif
                    </a>

                    <a href="#transaction" data-toggle="tab" id="transaction-tab" role="tab" area-controls="transaction" aria-selected="false">
                        @if(isset($performanceOverview['transaction']['growth']) && $performanceOverview['transaction']['growth'] == "up")
                            <div class="performance-stats__up">
                                <span>Total Transactions</span>
                                <strong>
                                    {{ $performanceOverview['transaction']['count'] ?? 0 }}
                                    <sub>
                                        <i class="la la-arrow-up"></i>
                                        {{ $performanceOverview['transaction']['percentage'] ?? 0 }}
                                    </sub>
                                </strong>
                            </div>
                        @else
                            <div class="performance-stats__down">
                                <span>Total Transactions</span>
                                <strong>
                                    {{ $performanceOverview['transaction']['count'] ?? 0 }}
                                    <sub>
                                        <i class="la la-arrow-down"></i>
                                        {{ $performanceOverview['transaction']['percentage'] ?? 0 }}
                                    </sub>
                                </strong>
                            </div>
                        @endif
                    </a>

                    <a href="#sale" data-toggle="tab" id="sale-tab" role="tab" area-controls="sale" aria-selected="true">
                        @if(isset($performanceOverview['sale']['growth']) && $performanceOverview['sale']['growth'] == "up")
                            <div class="performance-stats__up">
                                <span>Total Sales</span>
                                <strong>
                                    {{ $performanceOverview['sale']['count'] ?? 0 }}
                                    <sub>
                                        <i class="la la-arrow-up"></i>
                                        {{ $performanceOverview['sale']['percentage'] ?? 0 }}
                                    </sub>
                                </strong>
                            </div>
                        @else
                            <div class="performance-stats__down">
                                <span>Total Sales</span>
                                <strong>
                                    {{ $performanceOverview['sale']['count'] ?? 0 }}
                                    <sub>
                                        <i class="la la-arrow-down"></i>
                                        {{ $performanceOverview['sale']['percentage'] ?? 0 }}
                                    </sub>
                                </strong>
                            </div>
                        @endif
                    </a>

{{--                    <a href="#click" data-toggle="tab" id="click-tab" role="tab" area-controls="click" aria-selected="false">--}}
{{--                        @if(isset($performanceOverview['click']['growth']) && $performanceOverview['click']['growth'] == "up")--}}
{{--                            <div class="performance-stats__up">--}}
{{--                                <span>Total Clicks</span>--}}
{{--                                <strong>--}}
{{--                                    {{ $performanceOverview['click']['count'] ?? 0 }}--}}
{{--                                    <sub>--}}
{{--                                        <i class="la la-arrow-up"></i>--}}
{{--                                        {{ $performanceOverview['click']['percentage'] ?? 0 }}--}}
{{--                                    </sub>--}}
{{--                                </strong>--}}
{{--                            </div>--}}
{{--                        @else--}}
{{--                            <div class="performance-stats__down">--}}
{{--                                <span>Total Clicks</span>--}}
{{--                                <strong>--}}
{{--                                    {{ $performanceOverview['click']['count'] ?? 0 }}--}}
{{--                                    <sub>--}}
{{--                                        <i class="la la-arrow-down"></i>--}}
{{--                                        {{ $performanceOverview['click']['percentage'] ?? 0 }}--}}
{{--                                    </sub>--}}
{{--                                </strong>--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                    </a>--}}
                </div>
                <!-- ends: .performance-stats -->

                <div class="wp-chart perfomence-chart">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="commission" role="tabpanel" aria-labelledby="commission-tab">
                            <div class="parentContainer">
                                <div>
                                    <canvas id="commissionChart"></canvas>
                                </div>
                            </div>
                            <ul class="legend-static">
                                <li class="custom-label">
                                    <span style="background-color: rgb(95, 99, 242);"></span>Current Period
                                </li>
                                <li class="custom-label">
                                    <span style="background-color: #C6D0DC"></span>Previous Period
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="transaction" role="tabpanel" aria-labelledby="transaction-tab">
                            <div class="parentContainer">
                                <div>
                                    <canvas id="transactionChart"></canvas>
                                </div>
                            </div>
                            <ul class="legend-static">
                                <li class="custom-label">
                                    <span style="background-color: rgb(95, 99, 242);"></span>Current Period
                                </li>
                                <li class="custom-label">
                                    <span style="background-color: #C6D0DC"></span>Previous Period
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="sale" role="tabpanel" aria-labelledby="sale-tab">
                            <div class="parentContainer">
                                <div>
                                    <canvas id="saleChart"></canvas>
                                </div>
                            </div>
                            <ul class="legend-static">
                                <li class="custom-label">
                                    <span style="background-color: rgb(95, 99, 242);"></span>Current Period
                                </li>
                                <li class="custom-label">
                                    <span style="background-color: #C6D0DC"></span>Previous Period
                                </li>
                            </ul>
                        </div>
{{--                        <div class="tab-pane fade" id="click" role="tabpanel" aria-labelledby="click-tab">--}}
{{--                            <div class="parentContainer">--}}
{{--                                <div>--}}
{{--                                    <canvas id="clickChart"></canvas>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <ul class="legend-static">--}}
{{--                                <li class="custom-label">--}}
{{--                                    <span style="background-color: rgb(95, 99, 242);"></span>Current Period--}}
{{--                                </li>--}}
{{--                                <li class="custom-label">--}}
{{--                                    <span style="background-color: #C6D0DC"></span>Previous Period--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-25"><p class="mb-0 fs-12 color-light"><strong>Note:</strong> This chart is based on your overall activity. To check in detail, please go to <a href="">performance</a> section.</p></div>
    </div>
    <!-- ends: .card-body -->
</div>

@push("extended_scripts")
    <script src="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/Chart.min.js") }}"></script>
    <script src="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/charts.js") }}"></script>

    <script>

        function commissionChartLine()
        {
            let labels = @json($performanceOverview['extra']['labels'] ?? []);
            let currentMonth = @json($performanceOverview['commission']['dailyCurrentMonth'] ?? []);
            let previousMonth = @json($performanceOverview['commission']['dailyPreviousMonth'] ?? []);
            console.log(labels)
            console.log(currentMonth)
            console.log(previousMonth)
            chartjsLineChartFour(
                "commissionChart",
                "#FA8B0C",
                "100",
                currentMonth,
                previousMonth,
                labels,
                `{{ floatval($performanceOverview['commission']['min_value'] ?? 1) }}`,
                `{{ floatval($performanceOverview['commission']['max_value'] ?? 1) }}`
            );
        }

        function transactionChartLine()
        {
            let labels = @json($performanceOverview['extra']['labels'] ?? []);
            let currentMonth = @json($performanceOverview['transaction']['dailyCurrentMonth'] ?? []);
            let previousMonth = @json($performanceOverview['transaction']['dailyPreviousMonth'] ?? []);
            chartjsLineChartFour(
                "transactionChart",
                "#FA8B0C",
                "100",
                currentMonth,
                previousMonth,
                labels,
                `{{ floatval($performanceOverview['transaction']['min_value'] ?? 1) }}`,
                `{{ floatval($performanceOverview['transaction']['max_value'] ?? 1) }}`
            );
        }

        function saleChartLine()
        {
            let labels = @json($performanceOverview['extra']['labels'] ?? []);
            let currentMonth = @json($performanceOverview['sale']['dailyCurrentMonth'] ?? []);
            let previousMonth = @json($performanceOverview['sale']['dailyPreviousMonth'] ?? []);
            chartjsLineChartFour(
                "saleChart",
                "#FA8B0C",
                "100",
                currentMonth,
                previousMonth,
                labels,
                `{{ floatval($performanceOverview['sale']['min_value'] ?? 1) }}`,
                `{{ floatval($performanceOverview['sale']['max_value'] ?? 1) }}`
            );
        }

        function clickChartLine()
        {
            let labels = @json($performanceOverview['extra']['labels'] ?? []);
            let currentMonth = @json($performanceOverview['click']['dailyCurrentMonth'] ?? []);
            let previousMonth = @json($performanceOverview['click']['dailyPreviousMonth'] ?? []);
            chartjsLineChartFour(
                "clickChart",
                "#FA8B0C",
                "100",
                currentMonth,
                previousMonth,
                labels,
                `{{ floatval($performanceOverview['click']['min_value'] ?? 1) }}`,
                `{{ floatval($performanceOverview['click']['max_value'] ?? 1) }}`
            );
        }

        document.addEventListener("DOMContentLoaded", function () {
            commissionChartLine();
            transactionChartLine();
            saleChartLine();
            // clickChartLine();
        });
    </script>

@endpush
