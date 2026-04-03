<!-- Start: Shop Item -->
<div class="row product-page-list" id="advertiserContent">
    @if(count($advertisers))
        @foreach($advertisers as $advertiser)
            <!-- Advertiser card -->
            <div class="col-xxl-3 col-lg-4 col-md-6 mb-10 px-10">
                <div class="card">
                    <div class="card-body text-center pt-10 px-10 pb-0">

                        <div class="account-profile-cards ">

                            <span class="like-icon">
{{--                             <button type="button" class="content-center"><i class="lar la-heart icon"></i></button>--}}
                             </span>
                            <div class="ap-img d-flex justify-content-center">
                                <!-- Profile picture image-->
                                <a href="{{ route("publisher.view-advertiser", ['sid' => $advertiser->sid]) }}">

                                 @if (!empty($advertiser->fetch_logo_url))
                                   <img loading="lazy" class="ap-img__main w-auto h-40 mb-3" src="{{ $advertiser->fetch_logo_url }}" alt="{{ $advertiser->name }}" style="max-width: 200px !important;">

                                   @elseif (!empty($advertiser->logo))
                                   <img loading="lazy" class="ap-img__main w-auto h-40 mb-3" src="{{ \App\Helper\Static\Methods::staticAsset("$advertiser->logo") }}"
        alt="{{ $advertiser->name }}" style="max-width: 200px !important;">
                                   @else

                                   <img loading="lazy" class="ap-img__main w-auto h-40 mb-3" src="{{ \App\Helper\Static\Methods::isImageShowable($advertiser->logo) }}" alt="{{ $advertiser->name }}" style="max-width: 200px !important;">
                                @endif
                               </a>
                            </div>
                            <div class="ap-nameAddress">
                                <a href="{{ route("publisher.view-advertiser", ['sid' => $advertiser->sid]) }}">
                                    <h6 class="ap-nameAddress__title">{{ $advertiser->name }}</h6>
                                </a>
                                <p class="ap-nameAddress__subTitle  fs-14 pt-1 m-0 ">
                                    <a href="{{ $advertiser->url }}" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>
                                        View Website
                                    </a>
                                </p>
                            </div>
                            <div class="ap-button account-profile-cards__button button-group d-flex justify-content-center flex-wrap pt-20">
                                <button type="button" class="border text-capitalize px-2 color-gray transparent shadow2 radius-md" onclick="window.location.href='{{ route("publisher.view-advertiser", ['sid' => $advertiser->sid]) }}'">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye mr-0"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                </button>
                                <button type="button" class="border text-capitalize px-2 color-gray transparent shadow2 radius-md drawer-trigger" data-drawer="account" onclick="pushInfo('{{ $advertiser->id }}', '{{ $advertiser->name }}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail mr-0"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                </button>
                                @php
                                    $status = null;
                                    if(isset($advertiser->advertiser_applies->status))
                                    {
                                        $status = $advertiser->advertiser_applies->status;
                                    }
                                    elseif (isset($advertiser->advertiser_applies_status))
                                    {
                                        $status = $advertiser->advertiser_applies_status;
                                    }
                                @endphp

                                @if($status && $status == \App\Models\AdvertiserApply::STATUS_PENDING)

                                    <button type="button" class="btn btn-warning  btn-default btn-squared text-capitalize px-25 shadow2 radius-md" disabled>
                                        <i class="las la-clock color-white"></i> Pending
                                    </button>

                                @elseif($status && $status == \App\Models\AdvertiserApply::STATUS_ACTIVE)

                                    <button type="button" class="btn btn-success btn-default btn-squared text-capitalize px-25 shadow2 radius-md" disabled>
                                        <i class="las la-check color-white"></i> Joined
                                    </button>

                                @elseif($status && $status == \App\Models\AdvertiserApply::STATUS_REJECTED)

                                    <button type="button" class="btn btn-danger btn-default btn-squared text-capitalize px-25 shadow2 radius-md" disabled>
                                        <i class="las la-times color-white"></i> Rejected
                                    </button>

                                @elseif($status && $status == \App\Models\AdvertiserApply::STATUS_HOLD || $status && $status == \App\Models\AdvertiserApply::STATUS_ADMITAD_HOLD)

                                    <button type="button" class="btn btn-secondary btn-default btn-squared text-capitalize px-25 shadow2 radius-md" disabled>
                                        <i class="las la-stop-circle color-white"></i> Hold
                                    </button>

                                @else

                                    <button type="button" class="btn btn-default btn-squared btn-outline-success text-capitalize px-25 shadow2 follow radius-md" data-toggle="modal" data-target="#modal-basic" onclick="openApplyModal('{{ $advertiser->sid }}', `{{ $advertiser->name }}`)">
                                        <span class="las la-user-plus follow-icon"></span> Apply
                                    </button>

                                @endif
                            </div>
                        </div>

                        <div class="card-footer mt-20 pt-20 pb-10 px-0">

                            <div class="profile-overview d-flex justify-content-between flex-wrap">
                                <div class="po-details">
                                    <h6 class="po-details__title">@if($advertiser->commission){{ $advertiser->commission }}{{ $advertiser->commission_type == "percentage" ? "%" : $advertiser->commission_type }}@else - @endif</h6>
                                    <span class="po-details__sTitle">Commission</span>
                                </div>
                                <div class="po-details">
                                    @php
                                        $regions = $advertiser->primary_regions ?? [];
                                        if(count($regions) > 1) {
                                            $regions = "Multi";
                                        } elseif (count($regions) == 1 && $regions[0] == "00") {
                                            $regions = "All";
                                        } elseif (count($regions) == 1) {
                                            $regions = $regions[0];
                                        } else {
                                            $regions = "-";
                                        }
                                    @endphp
                                    <h6 class="po-details__title">{{ $regions }}</h6>
                                    <span class="po-details__sTitle">Region</span>
                                </div>
                                <div class="po-details">
                                    <h6 class="po-details__title">{{ $advertiser->average_payment_time ?? "-" }} <span class="fs-12">days</span></h6>
                                    <span class="po-details__sTitle">APC</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Advertiser card -->
        @endforeach
    @else
        <!-- Advertiser card -->
        <div class="col-xxl-12 col-lg-12 col-md-12 mb-10 px-10">
            <div class="card">
                <div class="card-body text-center">
                    <h6>Advertiser Data Not Exist</h6>
                </div>
            </div>
        </div>

    @endif
</div>

@include("template.publisher.widgets.loader")
<!-- End: Shop Item -->

@if(count($advertisers) && $advertisers instanceof \Illuminate\Pagination\LengthAwarePaginator )
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-sm-end justify-content-star mt-1 mb-30">

                {{ $advertisers->withQueryString()->links() }}

            </div>
        </div>
    </div>
@endif
