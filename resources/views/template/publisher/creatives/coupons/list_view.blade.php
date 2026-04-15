<!-- Start Table Responsive -->
<style>
    .modern-table {
        font-size: 14px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    }

    .modern-table thead th {
        font-weight: 800;
        text-transform: uppercase;
        font-size: 13px;
        background-color: #c22437;
        color: #fff;
        letter-spacing: 0.8px;
        padding: 16px 10px;
    }

    .modern-table tbody td {
        padding: 4px 10px;
        vertical-align: middle;
    }

    .modern-table tbody tr:hover {
        background-color: #fff5f5 !important;
    }

    .website-link {
        color: #333;
        transition: all 0.2s;
        text-decoration: none !important;
    }

    .website-link:hover {
        color: #c22437;
        text-decoration: underline !important;
    }

    .commission-pill {
        background-color: #fff0f0;
        color: #c22437;
        padding: 6px 8px;
        border-radius: 50px;
        font-weight: 600;
        white-space: nowrap;
    }
</style>
<div class="table-responsive">
    <table class="table table-hover align-middle modern-table">
        <thead style="background-color: #c22437; color: white;">
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

