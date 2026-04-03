<div class="tab-content" id="ap-tabContent">
    <div class="tab-pane fade show active" id="all-transactions" role="tabpanel" aria-labelledby="all-transactions-tab">

        @include("template.publisher.widgets.loader")

        <!-- Start Table Responsive -->
        <div class="table-responsive">
            <table class="table table-hover table-primary">
                <thead>
                    <tr>
                        <th scope="col" colspan="6" class="text-center">
                            <h5 class="fw-bold">Earnings</h5>
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
                        <span class="userDatatable-title font-weight-bold text-black">Sale Amount</span>
                    </td>
                    <td>
                        <span class="userDatatable-title font-weight-bold text-black">Commission</span>
                    </td>
                    <td>
                        <span class="userDatatable-title font-weight-bold text-black">Commission Payout</span>
                    </td>
                    <td>
                        <span class="userDatatable-title font-weight-bold text-black">Avg. Payout</span>
                    </td>
                </tr>
                @if($performanceOverviewList && count($performanceOverviewList))
                    @foreach($performanceOverviewList as $list)
                        @php
                            $totalClicks = $list->total_clicks ?? 0;
                            $totalTransactions = $list->total_transactions ?? 0;
                            $totalSaleAmount = $list->total_sale_amount ?? 0;
                            $totalCommissionAmount = $list->total_commission_amount ?? 0;
                            $totalCommissionPayoutAmount = ((float)\App\Helper\Static\Vars::COMMISSION_PERCENTAGE/100) * (float)$list->total_commission_amount;
                        @endphp
                        <tr>
                            <td>
                                <a target="_blank" href="{{ route("publisher.reports.transactions.list", ['search_by_name' => $list->external_advertiser_id ?? "-", 'start_date' => request()->start_date ?? now()->format("Y-m-01"), 'end_date' => now()->format("Y-m-t")]) }}">{{ $list->advertiser_name ?? "-" }} <br><span class="fs-12 color-gray">({{ $list->external_advertiser_id }})</span></a>
                            </td>
                            <td><a target="_blank" href="{{ route("publisher.reports.transactions.list", ['search_by_name' => $list->external_advertiser_id ?? "-", 'start_date' => request()->start_date ?? now()->format("Y-m-01"), 'end_date' => now()->format("Y-m-t")]) }}">{{ number_format($totalTransactions) }}</a></td>
                            <td>{{ $list->sale_amount_currency ?? "USD" }} {{ number_format($totalSaleAmount, 2) }}</td>
                            <td>{{ $list->commission_amount_currency ?? "USD" }} {{ number_format($totalCommissionAmount, 2) }}</td>
                            <td>{{ $list->commission_amount_currency ?? "USD" }} {{ number_format($totalCommissionPayoutAmount, 2) }}</td>
                            @if($totalCommissionAmount > 0 && $totalSaleAmount > 0)
                                <td>{{ number_format(round($totalCommissionAmount / $totalSaleAmount * 100), 1) }}%</td>
                            @else
                                <td>{{ number_format(0, 1) }}%</td>
                            @endif
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">
                            <h6 class="my-2 text-center">Performance Overview Data Not Exist</h6>
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
        <!-- Table Responsive End -->
    </div>
</div>

@if(count($performanceOverviewList) && $performanceOverviewList instanceof \Illuminate\Pagination\LengthAwarePaginator )

    <div class="d-flex justify-content-sm-end justify-content-start mt-15 pt-25 border-top">

        {{ $performanceOverviewList->withQueryString()->links() }}

    </div>

@endif
