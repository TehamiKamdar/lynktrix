@php
    $checkAdmin = auth()->user()->getRoleName() != \App\Models\Role::ADMIN_ROLE
@endphp
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
<!-- Minimal Modern Advertisers Table -->
<div class="table-responsive">
    <table class="table table-hover align-middle modern-table">
        <thead style="background-color: #c22437; color: white;">
            <tr>
                <th>Advertiser</th>
                <th class="text-center">Commission</th>
                <th class="text-center">APC Days</th>
                <th class="text-center">Region</th>
                @if($checkAdmin)
                    <th class="text-center">Status</th>
                @endif
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($advertisers as $advertiser)
                <tr>
                    <!-- Advertiser Name -->
                    <td>
                        <span class="fw-semibold" style="font-size: 14px;">{{ $advertiser->name }}</span>
                    </td>

                    <!-- Commission -->
                    <td class="text-center">
                        <span class="commission-pill" style="font-size: 12px;">
                            <i class="fas fa-crown"></i>
                            {{ $advertiser->commission }}{{ $advertiser->commission_type == "percentage" ? '%' : '' }}
                        </span>
                    </td>

                    <!-- APC Days -->
                    <td class="text-center fw-medium" style="font-size: 14px;">
                        {{ $advertiser->average_payment_time ?? 30 }} Days
                    </td>

                    <!-- Region -->
                    <td class="text-center" style="font-size: 14px;">
                        @php
                            $regions = [];
                            if (is_string($advertiser->primary_regions)) {
                                $regions = json_decode($advertiser->primary_regions, true) ?? [];
                            } elseif (is_array($advertiser->primary_regions)) {
                                $regions = $advertiser->primary_regions;
                            }
                            $regionText = count($regions) > 1 ? "Multi" : (count($regions) == 1 ? $regions[0] : "All");
                        @endphp
                        {{ $regionText }}
                    </td>

                    <!-- Status (Only for Admin) -->
                    @if($checkAdmin)
                        <td class="text-center">
                            @php
                                $status = $advertiser->advertiser_applies->status ??
                                    $advertiser->advertiser_applies_status ?? null;
                            @endphp
                            @if($status == \App\Models\AdvertiserApply::STATUS_ACTIVE)
                                <span class="badge bg-success">Joined</span>
                            @elseif($status == \App\Models\AdvertiserApply::STATUS_PENDING)
                                <span class="badge bg-warning">Pending</span>
                            @elseif($status == \App\Models\AdvertiserApply::STATUS_REJECTED)
                                <span class="badge bg-danger">Rejected</span>
                            @elseif($status == \App\Models\AdvertiserApply::STATUS_HOLD || $status == \App\Models\AdvertiserApply::STATUS_ADMITAD_HOLD)
                                <span class="badge bg-info">Hold</span>
                            @else
                                <span class="badge bg-secondary">Not Joined</span>
                            @endif
                        </td>
                    @endif

                    <!-- Website Link -->
                    <td>
                        <div class="d-flex justify-content-center align-items-center gap-2">
                            <a href="{{ $advertiser->url }}" target="_blank" class="website-link tooltip-wrapper"
                                style="font-size: 16px;">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                <span class="tooltip-text">Visit</span>
                            </a>

                            <a href="{{ route('publisher.view-advertiser', ['sid' => $advertiser->sid]) }}"
                                class="website-link tooltip-wrapper" style="font-size: 22px;">
                                <i class="ri-information-line"></i>
                                <span class="tooltip-text">Information</span>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- <div class="projectDatatable project-table  global-shadow border p-10 bg-white radius-xl w-100 mx-0">
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr class="userDatatable-header">
                    <th>
                        <span class="projectDatatable-title">Advertiser</span>
                    </th>
                    <th>
                        <span class="projectDatatable-title">Commission</span>
                    </th>
                    <th>
                        <span class="projectDatatable-title">Region</span>
                    </th>
                    <th>
                        <span class="projectDatatable-title">APC</span>
                    </th>
                    @if($checkAdmin)
                    <th>
                    </th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @if(count($advertisers))
                @foreach($advertisers as $advertiser)
                <tr>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route(" publisher.view-advertiser", ['sid'=> $advertiser->sid]) }}"
                                class="text-dark fw-500 w-30-per">
                                @php
                                $fetch = \App\Models\Advertiser::find($advertiser->id);
                                @endphp
                                @if (!empty($fetch->fetch_logo_url))

                                <img loading="lazy" class="ap-img__main h-auto mr-10" src="{{ $fetch->fetch_logo_url }}"
                                    alt="{{ $advertiser->name }}" style="width: 60px">
                                @elseif (!empty($advertiser->logo))
                                <img loading="lazy" class="ap-img__main h-auto mr-10"
                                    src="{{ \App\Helper\Static\Methods::staticAsset(" $advertiser->logo") }}"
                                alt="{{ $advertiser->name }}" style="width: 60px">
                                @else
                                <img loading="lazy" class="ap-img__main h-auto mr-10"
                                    src="{{ \App\Helper\Static\Methods::isImageShowable($advertiser->logo) }}"
                                    alt="{{ $advertiser->name }}" style="width: 60px">
                                @endif

                            </a>
                            <div class="userDatatable-inline-title">
                                <a href="{{ route(" publisher.view-advertiser", ['sid'=> $advertiser->sid]) }}"
                                    class="text-dark fw-500">
                                    <h6>{{ $advertiser->name }}</h6>
                                </a>
                                <p class="pt-1 d-block mb-0">
                                    <a href="{{ $advertiser->url }}" target="_blank"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-link mr-2">
                                            <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71">
                                            </path>
                                            <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71">
                                            </path>
                                        </svg>view website</a>
                                </p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="userDatatable-content">
                            {{ $advertiser->commission }}{{ $advertiser->commission_type == "percentage" ? "%" :
                            $advertiser->commission_type }}
                        </div>
                    </td>
                    <td>
                        <div class="userDatatable-content">
                            @php
                            $regions = [];
                            if(is_string($advertiser->primary_regions))
                            {
                            $regions = json_decode($advertiser->primary_regions);
                            }
                            elseif (is_array($advertiser->primary_regions))
                            {
                            $regions = $advertiser->primary_regions;
                            }
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
                    </td>
                    <td>
                        <div class="userDatatable-content text-center">
                            @if($advertiser->average_payment_time)
                            {{ $advertiser->average_payment_time }} days
                            @else
                            -
                            @endif
                        </div>
                    </td>
                    <td>
                        <div
                            class="ap-button account-profile-cards__button button-group d-flex justify-content-center flex-wrap pt-0">
                            @if($advertisers instanceof \Illuminate\Pagination\LengthAwarePaginator )
                            <button type="button"
                                class="border text-capitalize px-2 color-gray transparent shadow2 radius-md"
                                onclick="window.location.href='{{ route(" publisher.view-advertiser", ['sid'=>
                                $advertiser->sid]) }}'">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-eye mr-0">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </button>
                            <button type="button"
                                class="border text-capitalize px-2 color-gray transparent shadow2 radius-md drawer-trigger"
                                data-drawer="account"
                                onclick="pushInfo('{{ $advertiser->sid }}', '{{ $advertiser->name }}')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-mail mr-0">
                                    <path
                                        d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                    </path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                            </button>
                            @endif
                            @if($checkAdmin)
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

                            <button type="button"
                                class="btn btn-warning  btn-default btn-squared text-capitalize px-25 shadow2 radius-md"
                                disabled>
                                <i class="las la-clock color-white"></i> Pending
                            </button>

                            @elseif($status && $status == \App\Models\AdvertiserApply::STATUS_ACTIVE)

                            <button type="button"
                                class="btn btn-success btn-default btn-squared text-capitalize px-25 shadow2 radius-md"
                                disabled>
                                <i class="las la-check color-white"></i> Joined
                            </button>

                            @elseif($status && $status == \App\Models\AdvertiserApply::STATUS_REJECTED)

                            <button type="button"
                                class="btn btn-danger btn-default btn-squared text-capitalize px-25 shadow2 radius-md"
                                disabled>
                                <i class="las la-times color-white"></i> Rejected
                            </button>

                            @elseif($status && $status == \App\Models\AdvertiserApply::STATUS_HOLD || $status && $status
                            == \App\Models\AdvertiserApply::STATUS_ADMITAD_HOLD)

                            <button type="button"
                                class="btn btn-secondary btn-default btn-squared text-capitalize px-25 shadow2 radius-md"
                                disabled>
                                <i class="las la-stop-circle color-white"></i> Hold
                            </button>

                            @else

                            <button type="button"
                                class="btn btn-default btn-squared btn-outline-success text-capitalize px-25 shadow2 follow radius-md"
                                data-toggle="modal" data-target="#modal-basic" @if($advertisers instanceof
                                \Illuminate\Pagination\LengthAwarePaginator )
                                onclick="openApplyModal('{{ $advertiser->sid }}', `{{ $advertiser->name }}`)" @else
                                onclick="window.location.href='{{ route(" publisher.view-advertiser", ['sid'=>
                                $advertiser->sid]) }}'"
                                @endif
                                >
                                <span class="las la-user-plus follow-icon"></span> Apply
                            </button>

                            @endif
                            @endif
                        </div>
                    </td>


                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="4">
                        <h6 class="text-center">Advertiser Data Not Exist</h6>
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div><!-- End: .userDatatable--> --}}

@include("template.publisher.widgets.loader")

@if(count($advertisers) && $advertisers instanceof \Illuminate\Pagination\LengthAwarePaginator)
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-sm-end justify-content-start mt-1 mb-30">

                {{ $advertisers->withQueryString()->links() }}

            </div>
        </div>
    </div>
@endif