<div class="card broder-0 mb-20">
    <div class="card-body pt-0" id="performanceCardContent">
        <div class="tab-content perfomence-tab-wrap" id="performanceTabWrapper">
            <div class="tab-pane fade active show" id="w_perfomence-year" role="tabpanel" aria-labelledby="w_perfomence-year">
                <div class="performance-stats nav-tabs nav">
                    <a href="#click" class="active" data-toggle="tab" id="click-tab" role="tab" area-controls="click" aria-selected="false">
                            @if(isset($performanceOverview['growth']['position']) && $performanceOverview['growth']['position'] == "up")
                                <div class="performance-stats__up">
                                    <span>Total Clicks</span>
                                    <strong>
                                        {{ $performanceOverview['currentPeriod']['count'] ?? 0 }}
                                        <sub>
                                            <i class="la la-arrow-up"></i>
                                            {{ number_format($performanceOverview['growth']['percentage'] ?? 0, 2) }}%
                                        </sub>
                                    </strong>
                                </div>
                            @else
                                <div class="performance-stats__down">
                                    <span>Total Clicks</span>
                                    <strong>
                                        {{ $performanceOverview['currentPeriod']['count'] ?? 0 }}
                                        <sub>
                                            <i class="la la-arrow-down"></i>
                                            {{ number_format($performanceOverview['growth']['percentage'] ?? 0, 2) }}
                                        </sub>
                                    </strong>
                                </div>
                            @endif
{{--                        @endif--}}
                    </a>
                </div>
                <!-- ends: .performance-stats -->

                <div class="wp-chart perfomence-chart">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="click" role="tabpanel" aria-labelledby="click-tab">
                            <div class="parentContainer" id="clickChartContent">
                                <div>
                                    <canvas id="clickChart"></canvas>
                                </div>
                            </div>
                            <ul class="legend-static" id="clickPeriodContent">
                                <li class="custom-label">
                                    <span style="background-color: rgb(95, 99, 242);"></span>Current Period
                                </li>
                                <li class="custom-label">
                                    <span style="background-color: #C6D0DC"></span>Previous Period
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ends: .card-body -->
</div>

@push("extended_scripts")
    <script src="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/Chart.min.js") }}"></script>
    <script src="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/charts.js") }}"></script>

    <script>

        function clickChartLine()
        {
            let labels = @json($performanceOverview['currentPeriod']['labels'] ?? []);
            let currentPeriod = @json($performanceOverview['currentPeriod']['click'] ?? []);
            let previousPeriod = @json($performanceOverview['previousPeriod']['click'] ?? []);
            chartjsLineChartFour(
                "clickChart",
                "#FA8B0C",
                "45",
                (data = currentPeriod),
                (data = previousPeriod),
                labels = labels,
                {{ $performanceOverview['currentPeriod']['min_value'] ?? 0 }},
                {{ $performanceOverview['currentPeriod']['max_value'] ?? 0 }}
            );
        }

        document.addEventListener("DOMContentLoaded", function () {
            clickChartLine();
        });
    </script>

@endpush
