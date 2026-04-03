<div class="card border-0">
    <div class="card-header">
        <h6>Top Advertisers by <strong>Clicks</strong></h6>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table--default">
                <tbody>
                @if(count($topClicks))
                        @foreach($topClicks as $topClick)
                            @if(isset($topClick['advertiser']['sid']))
                                <tr>
                                    <td>
                                        <div class="title">
                                            <a href="{{ route("publisher.view-advertiser", ['sid' => $topClick['advertiser']['sid']]) }}">
                                                {{ $topClick['advertiser']['name'] }}
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <strong>
                                            {{ $topClick['tracking'] }}
                                        </strong>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4">
                                <small class="text-center">No Top Advertisers by Clicks Data Exist</small>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

    </div>
</div>
