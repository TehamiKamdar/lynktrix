@php
    $emailJobComplete = \App\Models\EmailJob::whereMonth("created_at", now()->format("m"))->where("status", 0)->count();
    $emailJobPending = \App\Models\EmailJob::whereMonth("created_at", now()->format("m"))->where("status", 1)->count();
    $emailJobFailed = \App\Models\EmailJob::whereMonth("created_at", now()->format("m"))->where("status", 2)->count();
@endphp

<div class="revenue-device-chart">

    <div class="card broder-0">
        <div class="card-header">
            <h6>Emails Current Month Report</h6>
        </div>
        <!-- ends: .card-header -->
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane fade active show" id="rb_device-today" role="tabpanel" aria-labelledby="rb_device-today-tab">
                    <div class="revenue-pieChart-wrap">
                        <div>
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand"><div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink"><div class=""></div>
                                </div>
                            </div>
                            <canvas id="chartDoughnut5Extra" height="173" style="display: block; width: 426px; height: 173px;" width="426" class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>
                    <div class="revenue-chart-box-list">
                        <div class="revenue-chart-box d-flex flex-wrap align-items-center">
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
                                    {{ $emailJobComplete }}
                                </div>
                                <div class="revenue-chart-box__label">
                                    Completed
                                </div>
                            </div>
                        </div>
                        <div class="revenue-chart-box d-flex flex-wrap align-items-center">
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
                                    {{ $emailJobPending }}
                                </div>
                                <div class="revenue-chart-box__label">
                                    Pending
                                </div>
                            </div>
                        </div>
                        <div class="revenue-chart-box d-flex flex-wrap align-items-center">
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
                                    {{ $emailJobFailed }}
                                </div>
                                <div class="revenue-chart-box__label">
                                    Failed
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

@push("extended_scripts")
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            chartjsDoughnutExtra("chartDoughnut5Extra", "122", (data = [{{ $emailJobComplete }}, {{ $emailJobPending }}, {{ $emailJobFailed }}]), ["Complete", "Pending", "Failed"]);
        });
    </script>
@endpush
