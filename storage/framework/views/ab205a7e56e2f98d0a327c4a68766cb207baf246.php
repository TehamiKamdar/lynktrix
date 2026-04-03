  <?php

    if(isset($earningOverview['pending'])){
      $pendingCurrency = $earningOverview['pending']['commission_amount_currency'] ?? "";
        $pending = $earningOverview['pending']['total_commission_amount'] ?? 0;

    }else{
    $pendingCurrency = $earningOverview['Pending']['commission_amount_currency'] ?? "";
        $pending = $earningOverview['Pending']['total_commission_amount'] ?? 0;
    }
      
        
        $approvedCurrency = $earningOverview['approved']['commission_amount_currency'] ?? "";
        $paid = $earningOverview['paid_status'] ?? 0;
        $approved = $earningOverview['approved']['total_commission_amount'] ?? 0;
        $approved = $approved - $paid;
        $percentage = ($pending + $paid) - $approved;
        if($percentage > 0 && $approved > 0) {
            $percentage = abs(round($percentage / $approved * 100));
        } else {
            $percentage = 0;
        }
        $pending = number_format($pending, 2);
        $approved = number_format($approved, 2);
    ?>

<?php if (! $__env->hasRenderedOnce('604f05dd-1618-42d3-804a-f899af902fec')): $__env->markAsRenderedOnce('604f05dd-1618-42d3-804a-f899af902fec');
$__env->startPush('styles'); ?>
<style>
  .legend div {
    top: -28px !important;
  }
  .legend table {
    top: -28px !important;
  }
</style>
<?php $__env->stopPush(); endif; ?>


    <?php if (! $__env->hasRenderedOnce('bd4ab518-c2af-4407-aed8-5b3ba20fb4e6')): $__env->markAsRenderedOnce('bd4ab518-c2af-4407-aed8-5b3ba20fb4e6');
$__env->startPush('scripts'); ?>
    <script>
      $(function(){
        'use strict'
  var dailyCurrentMonth = <?php echo json_encode($performanceOverview['commission']['dailyCurrentMonth'], 15, 512) ?>;
    var dailyPreviousMonth = <?php echo json_encode($performanceOverview['commission']['dailyPreviousMonth'], 15, 512) ?>;
    var max = <?php echo json_encode($performanceOverview['commission']['max_value'], 15, 512) ?>;
    var min = <?php echo json_encode($performanceOverview['commission']['min_value'], 15, 512) ?>;
    var currentMonthData = [];
var previousMonthData = [];

for (var i = 0; i < dailyCurrentMonth.length; i++) {
    currentMonthData.push([i + 1, dailyCurrentMonth[i]]);
}

for (var i = 0; i < dailyPreviousMonth.length; i++) {
    previousMonthData.push([i + 1, dailyPreviousMonth[i]]);
}

    var flotCurrent = dailyCurrentMonth.map((v, i) => [i, v]);
var flotPrevious = dailyPreviousMonth.map((v, i) => [i, v]);

    		var plot = $.plot('#flotChart', [{
         label: "Current Month",
        data: currentMonthData,
        color: '#007bff',
        lines: { fill: true }
        },{
          label: "Previous Month",
        data: previousMonthData,
        color: '#560bd0',
        lines: { fill: true }
        }], {
    			series: {
    				shadowSize: 0,
            lines: {
              show: true,
              lineWidth: 2,
              fill: true
            },
            points: { show: true }
    			},
          grid: {
            borderWidth: 0,
            labelMargin: 35,
            minBorderMargin: 20,
            hoverable: true,
            clickable: true
          },
    			yaxis: {
            show: true,
    				min: min,
    				max: max,
            tickColor: '#dedcdcff'
    			},
    			xaxis: {
            show: true,
            min: 0.5, // Start slightly before the first day (Day 1) for a left margin
        max: 31.5, // End slightly after the last day (Day 31) for a right margin
        tickSize: 1,
        ticks: [1, 5, 10, 15, 20, 25, 30],
            color: '#f5f5f5ff'
          }
        });

        $.plot('#flotChart1', [{
          data: dashData2,
          color: '#00cccc'
        }], {
    			series: {
    				shadowSize: 0,
            lines: {
              show: true,
              lineWidth: 2,
              fill: true,
              fillColor: { colors: [ { opacity: 0.2 }, { opacity: 0.2 } ] }
            }
    			},
          grid: {
            borderWidth: 0,
            labelMargin: 0
          },
    			yaxis: {
            show: false,
            min: 0,
            max: 35
          },
    			xaxis: {
            show: false,
            max: 50
          }
    		});


             $.plot('#flotChart3', [{
          data: dashData2,
          color: '#cc2500ff'
        }], {
    			series: {
    				shadowSize: 0,
            lines: {
              show: true,
              lineWidth: 2,
              fill: true,
              fillColor: { colors: [ { opacity: 0.2 }, { opacity: 0.2 } ] }
            }
    			},
          grid: {
            borderWidth: 0,
            labelMargin: 0
          },
    			yaxis: {
            show: false,
            min: 0,
            max: 35
          },
    			xaxis: {
            show: false,
            max: 50
          }
    		});


             $.plot('#flotChart4', [{
          data: dashData2,
          color: '#cc2500ff'
        }], {
    			series: {
    				shadowSize: 0,
            lines: {
              show: true,
              lineWidth: 2,
              fill: true,
              fillColor: { colors: [ { opacity: 0.2 }, { opacity: 0.2 } ] }
            }
    			},
          grid: {
            borderWidth: 0,
            labelMargin: 0
          },
    			yaxis: {
            show: false,
            min: 0,
            max: 35
          },
    			xaxis: {
            show: false,
            max: 50
          }
    		});

        $.plot('#flotChart2', [{
          data: dashData2,
          color: '#007bff'
        }], {
    			series: {
    				shadowSize: 0,
            bars: {
              show: true,
              lineWidth: 0,
              fill: 1,
              barWidth: .5
            }
    			},
          grid: {
            borderWidth: 0,
            labelMargin: 0
          },
    			yaxis: {
            show: false,
            min: 0,
            max: 35
          },
    			xaxis: {
            show: false,
            max: 20
          }
    		});

$.plot('#flotChart5', [{
          data: dashData2,
          color: '#a600ffff'
        }], {
    			series: {
    				shadowSize: 0,
            bars: {
              show: true,
              lineWidth: 0,
              fill: 1,
              barWidth: .5
            }
    			},
          grid: {
            borderWidth: 0,
            labelMargin: 0
          },
    			yaxis: {
            show: false,
            min: 0,
            max: 35
          },
    			xaxis: {
            show: false,
            max: 20
          }
    		});

        //-------------------------------------------------------------//


        // Line chart
        $('.peity-line').peity('line');

        // Bar charts
        $('.peity-bar').peity('bar');

        // Bar charts
        $('.peity-donut').peity('donut');

        var ctx5 = document.getElementById('chartBar5').getContext('2d');
        new Chart(ctx5, {
          type: 'bar',
          data: {
            labels: [0,1,2,3,4,5,6,7],
            datasets: [{
              data: [2, 4, 10, 20, 45, 40, 35, 18],
              backgroundColor: '#560bd0'
            }, {
              data: [3, 6, 15, 35, 50, 45, 35, 25],
              backgroundColor: '#cad0e8'
            }]
          },
          options: {
            maintainAspectRatio: false,
            tooltips: {
              enabled: false
            },
            legend: {
              display: false,
                labels: {
                  display: false
                }
            },
            scales: {
              yAxes: [{
                display: false,
                ticks: {
                  beginAtZero:true,
                  fontSize: 11,
                  max: 80
                }
              }],
              xAxes: [{
                barPercentage: 0.6,
                gridLines: {
                  color: 'rgba(0,0,0,0.08)'
                },
                ticks: {
                  beginAtZero:true,
                  fontSize: 11,
                  display: false
                }
              }]
            }
          }
        });

        // Donut Chart
        var datapie = {
          labels: ['Search', 'Email', 'Referral', 'Social', 'Other'],
          datasets: [{
            data: [25,20,30,15,10],
            backgroundColor: ['#6f42c1', '#007bff','#17a2b8','#00cccc','#adb2bd']
          }]
        };

        var optionpie = {
          maintainAspectRatio: false,
          responsive: true,
          legend: {
            display: false,
          },
          animation: {
            animateScale: true,
            animateRotate: true
          }
        };

        // For a doughnut chart
        var ctxpie= document.getElementById('chartDonut');
        var myPieChart6 = new Chart(ctxpie, {
          type: 'doughnut',
          data: datapie,
          options: optionpie
        });

      });

      $("#flotChart").bind("plothover", function (event, pos, item) {
    if (item) {

        var day = item.datapoint[0];  
        var value = item.datapoint[1].toFixed(2);

        $("#tooltip")
            .html("Day: " + day + "<br>Value: $" + value)
            .css({
                top: item.pageY + 10,
                left: item.pageX + 10
            })
            .fadeIn(200);
    } else {
        $("#tooltip").hide();
    }
});

    </script>
<?php $__env->stopPush(); endif; ?>
<div id="tooltip" style="
    position:absolute;
    display:none;
    padding:6px 10px;
    background:#222;
    color:#fff;
    border-radius:4px;
    font-size:12px;
    pointer-events:none;
    z-index:9999;">
</div>

<div class="az-content az-content-dashboard">
      <div class="container">
        <div class="az-content-body">
          <div class="az-dashboard-one-title">
            <div>
              <h2 class="az-dashboard-title">Hi, welcome back!</h2>
              <p class="az-dashboard-text">Your web analytics dashboard template.</p>
            </div>
            <div class="az-content-header-right">
             <div class="media">
    <div class="media-body">
        <label for="start_date">Start Date</label>
        <input type="date" class="form-control" id="start_date" name="start_date" value="2025-11-01">
    </div>
</div>

<div class="media">
    <div class="media-body">
        <label for="end_date">End Date</label>
        <input type="date" class="form-control" id="end_date" name="end_date" value="2025-12-01">
    </div>
</div>

            
            </div>
          </div><!-- az-dashboard-one-title -->

          <div class="az-dashboard-nav"> 
            <nav class="nav">
              <a class="nav-link active" data-toggle="tab" href="#">Performance Analysis</a>
           
            </nav>

            <nav class="nav">
              <a class="nav-link" href="#"><i class="far fa-save"></i> Save Report</a>
              <a class="nav-link" href="#"><i class="far fa-file-pdf"></i> Export to PDF</a>
              <a class="nav-link" href="#"><i class="fas fa-ellipsis-h"></i></a>
            </nav>
          </div>

          <div class="row row-sm mg-b-20">
            <div class="col-lg-7 ht-lg-100p">
              <div class="card card-dashboard-one">
                <div class="card-header">
                  <div>
                   <h6 class="card-title">Sales Performance Metrics</h6>
                <p class="card-text">Key sales statistics recorded within the selected date range.</p>
                  </div>
                
                </div><!-- card-header -->
                <div class="card-body">
                  <div class="card-body-top">
                    <div>
                      <label class="mg-b-0">Total Sales</label>
                      <h2>$ <?php echo e($performanceOverview['sale']['count'] ?? 0); ?></h2>
                    </div>
                    <div>
                      <label class="mg-b-0">Total Revenue</label>
                      <h2>$ <?php echo e($performanceOverview['commission']['count'] ?? 0); ?></h2>
                    </div>
                    <div>
                      <label class="mg-b-0">Total Conversions</label>
                      <h2><?php echo e($performanceOverview['transaction']['count'] ?? 0); ?></h2>
                    </div>
                    
                  </div><!-- card-body-top -->
                  <div class="flot-chart-wrapper">
                    <div id="flotChart" class="flot-chart" style="padding: 0px;position: relative;margin-top: 20px;height: 350px;"></div>
                  </div><!-- flot-chart-wrapper -->
                </div><!-- card-body -->
              </div><!-- card -->
            </div><!-- col -->
            <div class="col-lg-5 mg-t-20 mg-lg-t-0">
              <div class="row row-sm">
                <div class="col-sm-6">
                  <div class="card card-dashboard-two">
                    <div class="card-header">
                      <h6><?php echo e($pendingCurrency === 'USD' ? "$" : $pendingCurrency); ?> <?php echo e($pending); ?><i class="icon ion-md-trending-up tx-success"></i> <small>18.02%</small></h6>
                      <p>Awaiting Revenue</p>
                    </div><!-- card-header -->
                    <div class="card-body">
                      <div class="chart-wrapper">
                        <div id="flotChart1" class="flot-chart"></div>
                      </div><!-- chart-wrapper -->
                    </div><!-- card-body -->
                  </div><!-- card -->
                </div><!-- col -->
                <div class="col-sm-6 mg-t-20 mg-sm-t-0">
                  <div class="card card-dashboard-two">
                    <div class="card-header">
                      <h6><?php echo e($approvedCurrency === 'USD' ? "$" : $approvedCurrency); ?> <?php echo e($approved); ?><i class="icon ion-md-trending-down tx-danger"></i> <small>0.86%</small></h6>
                      <p>Approved Revenue</p>
                    </div><!-- card-header -->
                    <div class="card-body">
                      <div class="chart-wrapper">
                        <div id="flotChart4" class="flot-chart"></div>
                      </div><!-- chart-wrapper -->
                    </div><!-- card-body -->
                  </div><!-- card -->
                </div><!-- col -->
                <div class="col-sm-6 mg-t-20 mg-sm-t-0">
                  <div class="card card-dashboard-two">
                    <div class="card-header">
                      <h6><?php echo e($earningOverview['declined']['commission_amount_currency'] === 'USD' ? "$" : ''); ?> <?php echo e(isset($earningOverview['declined']['total_commission_amount']) ? number_format($earningOverview['declined']['total_commission_amount'], 2) : 0); ?><i class="icon ion-md-trending-down tx-danger"></i> <small>0.86%</small></h6>
                      <p>Rejected Revenue</p>
                    </div><!-- card-header -->
                    <div class="card-body">
                      <div class="chart-wrapper">
                       <div id="flotChart3" class="flot-chart"></div>
                      </div><!-- chart-wrapper -->
                    </div><!-- card-body -->
                  </div><!-- card -->
                </div><!-- col -->

                <div class="col-sm-6 mg-t-20 mg-sm-t-0">
                  <div class="card card-dashboard-two">
                    <div class="card-header">
                      <h6>$ <?php echo e(number_format($earningOverview['paid_status'] ?? 0, 2)); ?><i class="icon ion-md-trending-down tx-danger"></i> <small>0.86%</small></h6>
                      <p>Payouts</p>
                      
                    </div><!-- card-header -->
                    <div class="card-body">
                      <div class="chart-wrapper">
                        <div id="flotChart2" class="flot-chart"></div>
                      </div><!-- chart-wrapper -->
                    </div><!-- card-body -->
                  </div><!-- card -->
                </div><!-- col -->

                 <div class="col-sm-12 mg-t-20 mg-sm-t-0">
                  <div class="card card-dashboard-two">
                    <div class="card-header" style="display: flex;justify-content: space-between;">
                      <div>
                      <h6>$ <?php echo e(number_format($earningOverview['paid_status'] ?? 0, 2)); ?><i class="icon ion-md-trending-down tx-danger"></i> <small>0.86%</small></h6>
                      <p>Total Clicks</p>
                      </div>
                      <div style="margin-right: 50px;">
                        <svg width="50px" height="50px" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="48" height="48" fill="white" fill-opacity="0.01"/>
<path d="M24 4V12" stroke="#000000" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M22 22L42 26L36 30L42 36L36 42L30 36L26 42L22 22Z" fill="#2F88FF" stroke="#000000" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M38.1421 9.85795L32.4853 15.5148" stroke="#000000" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M9.85787 38.1421L15.5147 32.4852" stroke="#000000" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M4 24H12" stroke="#000000" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M9.85783 9.85787L15.5147 15.5147" stroke="#000000" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                      </div>
                    </div><!-- card-header -->
                    <div class="card-body">
                      <div class="chart-wrapper">
                        <div id="flotChart5" class="flot-chart"></div>
                      </div><!-- chart-wrapper -->
                    </div><!-- card-body -->
                  </div><!-- card -->
                </div><!-- col -->


              </div><!-- row -->
            </div><!--col -->
          </div><!-- row -->

          <div class="row row-sm mg-b-20">
            <div class="col-lg-4">
              <div class="card card-dashboard-pageviews">
                <div class="card-header">
                  <h6 class="card-title">5 Highest-Performing Brands Driving the <strong class="text-primary">Most Sales </strong></h6>
                </div><!-- card-header -->
               
                <div class="card-body">
              <?php if(count($topSales)): ?>
             
                        <?php $__currentLoopData = $topSales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topSale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $advertiser = \App\Models\Advertiser::where('sid',$topSale->external_advertiser_id)->first();
                        $img = $advertiser->fetch_logo_url;
                        ?>
                        <div class="az-list-item">
                    <div style="display:flex;gap:20px;align-items: center;">
                      <img src="<?php echo e($img); ?>" style="width:70px;height:30px;">
                      <h6> <a href="<?php echo e(route("publisher.view-advertiser", ['sid' => $topSale->external_advertiser_id])); ?>">
                                            <?php echo e($topSale->advertiser_name); ?>

                                        </a></h6>
                     
                    </div>
                    <div>
                      <h6>$ <?php echo e(number_format($topSale->total_sales_amount, 2)); ?></h6>
                      
                    </div>
                  </div><!-- list-group-item -->
                            
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    <?php endif; ?>
                 
                </div><!-- card-body -->
              </div><!-- card -->

            </div><!-- col -->
            <div class="col-lg-8 mg-t-20 mg-lg-t-0">
              <div class="card card-dashboard-four">
                <div class="card-header">
                  <h6 class="card-title">Sessions by Channel</h6>
                </div><!-- card-header -->
                <div class="card-body row">
                  <div class="col-md-6 d-flex align-items-center">
                    <div class="chart"><canvas id="chartDonut"></canvas></div>
                  </div><!-- col -->
                  <div class="col-md-6 col-lg-5 mg-lg-l-auto mg-t-20 mg-md-t-0">
                    <div class="az-traffic-detail-item">
                      <div>
                        <span>Organic Search</span>
                        <span>1,320 <span>(25%)</span></span>
                      </div>
                      <div class="progress">
                        <div class="progress-bar bg-purple wd-25p" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div><!-- progress -->
                    </div>
                    <div class="az-traffic-detail-item">
                      <div>
                        <span>Email</span>
                        <span>987 <span>(20%)</span></span>
                      </div>
                      <div class="progress">
                        <div class="progress-bar bg-primary wd-20p" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                      </div><!-- progress -->
                    </div>
                    <div class="az-traffic-detail-item">
                      <div>
                        <span>Referral</span>
                        <span>2,010 <span>(30%)</span></span>
                      </div>
                      <div class="progress">
                        <div class="progress-bar bg-info wd-30p" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                      </div><!-- progress -->
                    </div>
                    <div class="az-traffic-detail-item">
                      <div>
                        <span>Social</span>
                        <span>654 <span>(15%)</span></span>
                      </div>
                      <div class="progress">
                        <div class="progress-bar bg-teal wd-15p" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                      </div><!-- progress -->
                    </div>
                    <div class="az-traffic-detail-item">
                      <div>
                        <span>Other</span>
                        <span>400 <span>(10%)</span></span>
                      </div>
                      <div class="progress">
                        <div class="progress-bar bg-gray-500 wd-10p" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                      </div><!-- progress -->
                    </div>
                  </div><!-- col -->
                </div><!-- card-body -->
              </div><!-- card-dashboard-four -->
            </div><!-- col -->
          </div><!-- row -->

          <div class="row row-sm mg-b-20 mg-lg-b-0">
            <div class="col-lg-5 col-xl-4">
              <div class="row row-sm">
                <div class="col-md-6 col-lg-12 mg-b-20 mg-md-b-0 mg-lg-b-20">
                  <div class="card card-dashboard-five">
                    <div class="card-header">
                      <h6 class="card-title">Acquisition</h6>
                      <span class="card-text">Tells you where your visitors originated from, such as search engines, social networks or website referrals.</span>
                    </div><!-- card-header -->
                    <div class="card-body row row-sm">
                      <div class="col-6 d-sm-flex align-items-center">
                        <div class="card-chart bg-primary">
                          <span class="peity-bar" data-peity='{"fill": ["#fff"], "width": 20, "height": 20 }'>6,4,7,5,7</span>
                        </div>
                        <div>
                          <label>Bounce Rate</label>
                          <h4>33.50%</h4>
                        </div>
                      </div><!-- col -->
                      <div class="col-6 d-sm-flex align-items-center">
                        <div class="card-chart bg-purple">
                          <span class="peity-bar" data-peity='{"fill": ["#fff"], "width": 21, "height": 20 }'>7,4,5,7,2</span>
                        </div>
                        <div>
                          <label>Sessions</label>
                          <h4>9,065</h4>
                        </div>
                      </div><!-- col -->
                    </div><!-- card-body -->
                  </div><!-- card-dashboard-five -->
                </div><!-- col -->
                <div class="col-md-6 col-lg-12">
                  <div class="card card-dashboard-five">
                    <div class="card-header">
                      <h6 class="card-title">Sessions</h6>
                      <span class="card-text"> A session is the period time a user is actively engaged with your website, app, etc.</span>
                    </div><!-- card-header -->
                    <div class="card-body row row-sm">
                      <div class="col-6 d-sm-flex align-items-center">
                        <div class="mg-b-10 mg-sm-b-0 mg-sm-r-10">
                          <span class="peity-donut" data-peity='{ "fill": ["#007bff", "#cad0e8"],  "innerRadius": 14, "radius": 20 }'>4/7</span>
                        </div>
                        <div>
                          <label>% New Sessions</label>
                          <h4>26.80%</h4>
                        </div>
                      </div><!-- col -->
                      <div class="col-6 d-sm-flex align-items-center">
                        <div class="mg-b-10 mg-sm-b-0 mg-sm-r-10">
                          <span class="peity-donut" data-peity='{ "fill": ["#00cccc", "#cad0e8"],  "innerRadius": 14, "radius": 20 }'>2/7</span>
                        </div>
                        <div>
                          <label>Pages/Session</label>
                          <h4>1,005</h4>
                        </div>
                      </div><!-- col -->
                    </div><!-- card-body -->
                  </div><!-- card-dashboard-five -->
                </div><!-- col -->
              </div><!-- row -->
            </div><!-- col-lg-3 -->
            <div class="col-lg-7 col-xl-8 mg-t-20 mg-lg-t-0">
              <div class="card card-table-one">
                <h6 class="card-title">What pages do your users visit</h6>
                <p class="az-content-text mg-b-20">Part of this date range occurs before the new users metric had been calculated, so the old users metric is displayed.</p>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th class="wd-5p">&nbsp;</th>
                        <th class="wd-45p">Country</th>
                        <th>Entrances</th>
                        <th>Bounce Rate</th>
                        <th>Exits</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><i class="flag-icon flag-icon-us flag-icon-squared"></i></td>
                        <td><strong>United States</strong></td>
                        <td><strong>134</strong> (1.51%)</td>
                        <td>33.58%</td>
                        <td>15.47%</td>
                      </tr>
                      <tr>
                        <td><i class="flag-icon flag-icon-gb flag-icon-squared"></i></td>
                        <td><strong>United Kingdom</strong></td>
                        <td><strong>290</strong> (3.30%)</td>
                        <td>9.22%</td>
                        <td>7.99%</td>
                      </tr>
                      <tr>
                        <td><i class="flag-icon flag-icon-in flag-icon-squared"></i></td>
                        <td><strong>India</strong></td>
                        <td><strong>250</strong> (3.00%)</td>
                        <td>20.75%</td>
                        <td>2.40%</td>
                      </tr>
                      <tr>
                        <td><i class="flag-icon flag-icon-ca flag-icon-squared"></i></td>
                        <td><strong>Canada</strong></td>
                        <td><strong>216</strong> (2.79%)</td>
                        <td>32.07%</td>
                        <td>15.09%</td>
                      </tr>
                      <tr>
                        <td><i class="flag-icon flag-icon-fr flag-icon-squared"></i></td>
                        <td><strong>France</strong></td>
                        <td><strong>216</strong> (2.79%)</td>
                        <td>32.07%</td>
                        <td>15.09%</td>
                      </tr>
                      <tr>
                        <td><i class="flag-icon flag-icon-ph flag-icon-squared"></i></td>
                        <td><strong>Philippines</strong></td>
                        <td><strong>197</strong> (2.12%)</td>
                        <td>32.07%</td>
                        <td>15.09%</td>
                      </tr>
                    </tbody>
                  </table>
                </div><!-- table-responsive -->
              </div><!-- card -->
            </div><!-- col-lg -->

          </div><!-- row -->
        </div><!-- az-content-body -->
      </div>
    </div><!-- az-content --><?php /**PATH C:\xampp\htdocs\tech\resources\views/template/publisher/dashboard/app.blade.php ENDPATH**/ ?>