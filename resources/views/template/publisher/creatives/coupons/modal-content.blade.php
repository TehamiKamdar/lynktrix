@if($coupon)
    @php
         $trackingURL = route("track.coupon", ['advertiser' => $coupon->internal_advertiser_id, 'website' => $coupon->advertiser_applies->website_id, 'coupon' => $coupon->id]);
    @endphp
    <div class="modal-header">
        <h6 class="modal-title font-weight-bold text-black" id="staticBackdropLabel">{{ $coupon->advertiser_name }} - {{ $coupon->title }}</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span data-feather="x"></span>
        </button>
    </div>
    <div class="modal-body">
    <div class="add-new-contact">
        <form action="javascript:void(0)">
            <div class="form-group mb-20">
                <label class="font-weight-bold text-black">{{ trans('creative.creativeManagement.coupon.fields.coupon_code') }}:</label>
                <input type="text" id="modalCouponCode" class="form-control form-control-lg" value="{{ $coupon->code ? $coupon->code : 'No code required' }}" onclick="clickToCopy('modalCouponCode', 'Coupon Code Successfully Copied.')">
                <small>{{ trans('creative.creativeManagement.coupon.fields.coupon_code_helper') }}</small>
            </div>
            <div class="form-group mb-20">
                <label class="font-weight-bold text-black">{{ trans('creative.creativeManagement.coupon.fields.tracking_link') }}:</label>
                <input type="text" id="modalTrackingURL" class="form-control form-control-lg" value="{{ $trackingURL }}" readonly onclick="clickToCopy('modalTrackingURL', 'Tracking URL Successfully Copied.')">
                <small>{{ trans('creative.creativeManagement.coupon.fields.tracking_link_helper') }}</small>
            </div>
            <div class="form-group mb-20">
                <label class="font-weight-bold text-black">{{ trans('creative.creativeManagement.coupon.fields.html_code') }}:</label>
                <textarea rows="4" class="form-control" id="modalHtmlCode"><a href="{{ $trackingURL }}" target="_blank" rel="nofollow sponsored">{{ $coupon->advertiser_name }} - {{ $coupon->title }}</a></textarea>
                <a href="javascript:void(0)" class="btn btn-primary btn-xs mt-2"  onclick="clickToCopy('modalHtmlCode', 'HTML Code Successfully Copied.')">COPY HTML</a>
            </div>
            <div class="form-group mb-20">
                <label class="font-weight-bold text-black">{{ trans('creative.creativeManagement.coupon.fields.terms') }}:</label>
                <br />
                {{ $coupon->terms ? $coupon->terms : "-" }}
            </div>
        </form>
    </div>
</div>
@else
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span data-feather="x"></span>
        </button>
    </div>
    <div class="modal-body">
        <div class="add-new-contact">
            <h6 class="fw-500" id="staticBackdropLabel">Coupon Data Not Exist</h6>
        </div>
    </div>
@endif
