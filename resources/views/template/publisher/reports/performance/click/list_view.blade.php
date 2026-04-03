<div class="tab-content" id="ap-tabContent">
    <div class="tab-pane fade show active" id="all-transactions" role="tabpanel" aria-labelledby="all-transactions-tab">

        @include("template.publisher.widgets.loader")

        <!-- Start Table Responsive -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <td>
                        <span class="userDatatable-title font-weight-bold text-black">Advertiser</span>
                    </td>
                    <td>
                        <span class="userDatatable-title font-weight-bold text-black">Tracking Link Clicks</span>
                    </td>
                    <td>
                        <span class="userDatatable-title font-weight-bold text-black">Deeplink Clicks</span>
                    </td>
                    <td>
                        <span class="userDatatable-title font-weight-bold text-black">Coupon Clicks</span>
                    </td>
                    <td>
                        <span class="userDatatable-title font-weight-bold text-black">Total Clicks</span>
                    </td>
                </tr>
                @if($performanceOverviewList2 && count($performanceOverviewList2))
                    @foreach($performanceOverviewList2 as $data)
                        @php
                            $sid = $data->advertiser_sid;
                            $advertiser = $data->advertiser_name;
                            $totalTrackingClicks = $data->tracking_total_clicks;
                            $totalDeepClicks = $data->deeplink_total_clicks;
                            $totalCouponClicks = $data->coupon_total_clicks;
                            $totalClicks = $data->total_clicks;
                        @endphp
                        <tr>
                            <td>
                                <a target="_blank" href="{{ route("publisher.view-advertiser", ['sid' => $sid]) }}">{{ $advertiser ?? "-" }} <br><span class="fs-12 color-gray">({{ $sid }})</span></a>
                            </td>
                            <td>{{ $totalTrackingClicks }}</td>
                            <td>{{ $totalDeepClicks }}</td>
                            <td>{{ $totalCouponClicks }}</td>
                            <td>{{ $totalClicks }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7">
                            <h6 class="my-5 text-center">Performance Overview Data Not Exist</h6>
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
        <!-- Table Responsive End -->
    </div>
</div>

@if($performanceOverviewList2 && count($performanceOverviewList2) && $performanceOverviewList2 instanceof \Illuminate\Pagination\LengthAwarePaginator )

    <div class="d-flex justify-content-sm-end justify-content-start mt-15 pt-25 border-top">

        {{ $performanceOverviewList2->withQueryString()->links() }}

    </div>

@endif
