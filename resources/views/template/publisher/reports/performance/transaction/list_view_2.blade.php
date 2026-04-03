<div class="tab-content" id="ap-tabContent-2">
    <div class="tab-pane fade show active" id="all-transactions" role="tabpanel" aria-labelledby="all-transactions-tab">
        @include("template.publisher.widgets.loader-2")
        <!-- Start Table Responsive -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col" colspan="3">
                        <h5 class="font-weight-bold">Conversions</h5>
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <span class="userDatatable-title font-weight-bold text-black">Advertiser</span>
                    </td>
                    <td>
                        <span class="userDatatable-title font-weight-bold text-black">Transactions</span>
                    </td>
                    <td>
                        <span class="userDatatable-title font-weight-bold text-black">Clicks</span>
                    </td>
                    <td>
                        <span class="userDatatable-title font-weight-bold text-black">Conversion Ratio</span>
                    </td>
                </tr>
                @if($performanceOverviewList && count($performanceOverviewList))
                    @foreach($performanceOverviewList as $list)
                        @php
                            $totalClicks = $list->total_clicks ?? 0;
                            $totalTransactions = $list->total_transactions ?? 0;
                        @endphp
                        <tr>
                            <td>
                                <a href="{{ route("publisher.reports.transactions.list", ['search_by_name' => $list->name ?? "-", 'start_date' => request()->start_date ?? now()->format("Y-m-01"), 'end_date' => now()->format("Y-m-t")]) }}">{{ $list->name ?? "-" }} <br><span class="fs-12 color-gray">({{ $list->sid }})</span></a>
                            </td>
                            <td><a href="{{ route("publisher.reports.transactions.list", ['search_by_name' => $list->external_advertiser_id ?? "-", 'start_date' => request()->start_date ?? now()->format("Y-m-01"), 'end_date' => now()->format("Y-m-t")]) }}">{{ number_format($totalTransactions) }}</a></td>
                            <td>{{ number_format($totalClicks)}}</td>
                            @if($totalTransactions > 0 && $totalClicks > 0)
                                <td>{{ number_format(round($totalTransactions / $totalClicks * 100), 1) }}%</td>
                            @else
                                <td>{{ number_format(0, 1) }}%</td>
                            @endif
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

@if(count($performanceOverviewList2) && $performanceOverviewList2 instanceof \Illuminate\Pagination\LengthAwarePaginator )

    <div class="d-flex justify-content-sm-end justify-content-start mt-15 pt-25 border-top">

        {{ $performanceOverviewList2->withQueryString()->links('vendor.pagination.default-2') }}

    </div>

@endif
