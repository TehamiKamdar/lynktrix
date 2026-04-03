<div class="card border-0">
    <div class="card-header">
        <h6>Top Advertisers by <strong>Sales</strong></h6>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table--default">
                <tbody>
                    @if(count($topSales))
                        @foreach($topSales as $topSale)
                            <tr>
                                <td>
                                    <div class="title">
                                        <a href="{{ route("publisher.view-advertiser", ['sid' => $topSale->external_advertiser_id]) }}">
                                            {{ $topSale->advertiser_name }}
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <strong>
                                        {{ $topSale->sale_amount_currency }} {{ number_format($topSale->total_sales_amount, 2) }}
                                    </strong>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4">
                                <small class="text-center">No Top Advertisers by Sales Data Exist</small>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

    </div>
</div>
