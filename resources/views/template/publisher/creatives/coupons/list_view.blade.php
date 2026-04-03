<!-- Start Table Responsive -->
<div class="table-responsive">
    <table class="table table-hover table-primary border-0">
        <thead>
        <tr>
            <th style="width: 20%;">
                <span class="userDatatable-title">Advertiser</span>
            </th>
            <th style="width: 40%;">
                <span class="userDatatable-title">Offer Name</span>
            </th>
            <th style="width: 15%;">
                <span class="userDatatable-title">Code</span>
            </th>
            <th style="width: 15%;">
                <span class="userDatatable-title">Start-End Dates</span>
            </th>
            <th style="width: 10%;">
            </th>
        </tr>
        </thead>
        <tbody>
        @if(count($coupons))
            @foreach($coupons as $coupon)
                <tr>

                    <td>
                        <div class="orderDatatable-title">
                            {{ ucwords($coupon->advertiser_name) }} <br>
                            <span class="fs-12 color-gray">({{ $coupon->sid ?? 0 }})</span>
                        </div>
                    </td>
                    <td>
                        <div class="orderDatatable-title">
                            {!! $coupon->title !!}
                        </div>
                    </td>
                    <td>
                        <div class="orderDatatable-title">
                            {{ $coupon->code ? $coupon->code : "No code required" }}
                        </div>
                    </td>
                    <td>
                        <div class="orderDatatable-title">
                            @if($coupon->start_date && $coupon->end_date)
                                {{ \Carbon\Carbon::parse($coupon->start_date)->format("d/m/Y") }} - {{ \Carbon\Carbon::parse($coupon->end_date)->format("d/m/Y") }}
                            @else
                                -
                            @endif
                        </div>
                    </td>
                    <td>
                        <a href="javascript:void(0)" class="btn btn-xs btn-primary btn-add" data-toggle="modal" data-target="#showVoucherForm" onclick="prepareVoucherFormContent('{{ $coupon->id }}')">
                            VIEW
                        </a>
                    </td>
                </tr>
                <!-- End: tr -->
            @endforeach
        @else
            <tr>
                <td colspan="5">
                    <h6 class="text-center my-2">Coupons Data Not Exist</h6>
                </td>
            </tr>
        @endif
        </tbody>
    </table>
</div>
<!-- Table Responsive End -->
<!-- Modal -->
<div class="modal fade showVoucherForm" id="showVoucherForm" role="dialog" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content radius-xl" id="voucherModalContent"></div>
    </div>
</div>
<!-- Modal -->
@if(count($coupons) && $coupons instanceof \Illuminate\Pagination\LengthAwarePaginator)
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-sm-end justify-content-star mt-1 mb-30 border-top">

                {{ $coupons->withQueryString()->links() }}

            </div>
        </div>
    </div>
@endif

