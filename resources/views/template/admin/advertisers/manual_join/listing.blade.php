@if(count($advertisers))
    @foreach($advertisers->chunk(4) as $advertiserChunk)
        <tr>
            @foreach($advertiserChunk as $advertiser)
                <td style="width: 25%;">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input {{ $advertiser['advertiser_applies_without_auth'] ? "" : 'checkbox'}}" name="status[]"
                                   {{ $advertiser['advertiser_applies_without_auth'] ? "checked disabled" : ''}} {{ $advertiser['status'] == 2 ? "disabled" : "" }} value="{{ $advertiser['id'] }}" title="{{ $advertiser['name'] }}">
                            {{ \Illuminate\Support\Str::limit($advertiser['name'], 30, '...') }}
                        </label>
                    </div>
                </td>
            @endforeach
        </tr>
    @endforeach

    @if(count($advertisers) && $advertisers instanceof \Illuminate\Pagination\LengthAwarePaginator )
        <tr>
            <td colspan="4" class="text-right">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="d-flex justify-content-sm-end justify-content-start mt-1 mb-20">

                            {{ $advertisers->withQueryString()->links() }}

                        </div>
                    </div>
                </div>
            </td>
        </tr>
    @endif
@else
    <tr>
        <td colspan="4" class="text-center">
            <small>No Advertiser Exist</small>
        </td>
    </tr>
@endif
