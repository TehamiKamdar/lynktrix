@extends("layouts.publisher.publisher_panel")

@pushonce('styles')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/6.6.6/css/flag-icons.min.css" />
<style>

    :root {
        --primary: #5b47fb;
        --primary-dark: #4a3ac9;
        --light-bg: #f8f9fe;
        --dark-text: #2a2a3c;
        --light-text: #6c757d;
        --border-color: #e0e0ed;
    }

    .bg-primary {
        background-color: var(--primary) !important;
    }

    .profile-card {
        background: white;
        border: 1px solid var(--border-color);
        margin-bottom: 30px;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.03);
    }

    .profile-header {
        padding: 30px;
        background: linear-gradient(to right, #ffffff 0%, var(--light-bg) 100%);
        border-bottom: 1px solid var(--border-color);
    }

    .li-none {
        margin-left: 8px;
        margin-bottom: 4px;
        list-style: none;
    }

    .profile-name {
        font-weight: 700;
        font-size: 1.8rem;
        color: var(--dark-text);
        margin-bottom: 5px;
        letter-spacing: -1px;
    }

    .profile-title {
        color: var(--light-text);
        font-size: 1rem;
        margin-bottom: 20px;
    }

    .image-wrapper {
        max-width: 100%;
        overflow: hidden;
    }

    .profile-image {
        width: auto;
        height: 80px;
        border: 2px solid white;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
    }

    /* Custom styles for sidebar tabs */
    .list-group-item {
        border: none;
        padding: 1rem 1.25rem;
        color: #2a2a3c;
        font-weight: 500;
        transition: all 0.2s ease;
        border-left: 3px solid transparent;
    }

    .list-group-item:hover {
        background-color: #f8f9fe;
        color: #5b47fb;
        cursor: pointer !important;
    }

    .list-group-item.active {
        background-color: #f8f9fe !important;
        color: #5b47fb !important;
        border-left: 3px solid #5b47fb !important;
        font-weight: 600 !important;
    }

    .list-group-item i {
        width: 20px;
        text-align: center;
    }

    .card {
        border-radius: 0;
        border: 1px solid #e0e0ed;
    }

    .nav-tabs {
        border-bottom: 1px solid var(--border-color);
        padding: 0 30px;
    }

    .nav-tabs .nav-link {
        color: var(--light-text);
        font-weight: 600;
        padding: 15px 20px;
        border: none;
        border-bottom: 3px solid transparent;
    }

    .nav-tabs .nav-link.active {
        color: var(--primary) !important;
        background: transparent;
        border-bottom: 3px solid var(--primary) !important;
    }

    .tab-content {
        padding: 30px;
    }

    .info-box {
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 1px solid var(--border-color);
    }

    .info-label {
        font-weight: 600;
        color: var(--light-text);
        font-size: 0.9rem;
        margin-bottom: 5px;
    }

    .info-value {
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--dark-text);
    }

    .info-value.highlight {
        color: var(--primary);
    }

    .btn-primary {
        background-color: var(--primary);
        border: 1px solid var(--primary);
        padding: 10px 25px;
        font-weight: 600;
    }

    .btn-primary:hover {
        background-color: var(--primary-dark);
        border-color: var(--primary-dark);
    }

    .btn-outline-primary {
        color: var(--primary);
        border: 1px solid var(--primary);
        padding: 10px 25px;
        font-weight: 600;
    }

    .btn-outline-primary:hover {
        background-color: var(--primary);
        color: white;
    }

    .contact-info {
        background-color: var(--light-bg);
        padding: 15px;
        margin-top: 20px;
        border: 1px solid var(--border-color);
    }

    .contact-item {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .contact-item:last-child {
        margin-bottom: 0;
    }

    .contact-icon {
        width: 30px;
        color: var(--primary);
    }

    .commission-item {
        display: flex;
        justify-content: space-between;
        padding: 12px 0;
        border-bottom: 1px solid var(--border-color);
    }

    .commission-item:last-child {
        border-bottom: none;
    }

    .commission-category {
        font-weight: 600;
    }

    .commission-rate {
        font-weight: 700;
        color: var(--primary);
    }

    .terms-item {
        margin-bottom: 4px;
    }

    .terms-item:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }

    .terms-title {
        font-weight: 600;
        margin-bottom: 5px;
    }

    .footer {
        text-align: center;
        padding: 20px;
        color: var(--light-text);
        font-size: 0.9rem;
        border-top: 1px solid var(--border-color);
        margin-top: 30px;
    }

    #loading h6 {
        animation: pulse 1.2s ease-in-out infinite;
    }

    @keyframes pulse {
        0% {
            opacity: 0.4;
        }

        50% {
            opacity: 1;
        }

        100% {
            opacity: 0.4;
        }
    }

    .loading-text {
        font-weight: 500;
    }

    .dots::after {
        content: "";
        animation: dots 1.5s steps(3, end) infinite;
    }

    @keyframes dots {
        0% {
            content: "";
        }

        33% {
            content: ".";
        }

        66% {
            content: "..";
        }

        100% {
            content: "...";
        }
    }

    [class*=btn-outline-]:focus {
        color: var(--primary) !important;
    }
</style>
@endpushonce

@pushonce('scripts')
<script src="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/drawer.js") }}"></script>
<script>
    function clickToCopy(id, msg) {
        copyToClipboard(document.getElementById(id))
        normalMsg({ "message": msg, "success": true });
    }
    function prepareVoucherFormContent(id) {
        $.ajax({
            url: `/publisher/creatives/coupons/${id}`,
            type: 'GET',
            success: function (response) {
                $("#voucherModalContent").html(response)
            },
            error: function (response) {

            }
        });
    }
    function changeLimit() {
        $.ajax({
            url: '{{ route("publisher.set-limit") }}',
            type: 'GET',
            data: { "limit": $("#limit").val(), "type": "coupon" },
            success: function (response) {
                if (response) {
                    window.location.reload();
                }
            },
            error: function (response) {

            }
        });
    }
    function fetch_data(page = 1) {
        $.ajax({
            url: '{{ route("publisher.creatives.coupons.list") }}',
            type: 'GET',
            data: { "search_by_name": "{{ $advertiser->advertiser_id }}", page },
            beforeSend: function () {
            },
            success: function (response) {
                $("#ap-overview").html(response.html);
                $("#limit").change(function () {
                    changeLimit();
                });
                $("#loading").removeClass('d-flex', true);
                $("#loading").addClass('d-none');
            },
            error: function (response) {

            }
        });
    }
    document.addEventListener("DOMContentLoaded", function () {
        $(document).on('click', '.atbd-pagination__item a', function (event) {
            event.preventDefault();
            let page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        });
        $("#coupons-tab").one("click", function () {
            fetch_data();

        });
        $("#applyAdvertiser").submit(function () {
            $("#applyAdvertiserBttn").prop('disabled', true);
        });
        const sidebarTabs = document.querySelectorAll('#sidebarTabs .list-group-item');
    const tabContent = document.getElementById('profileTabContent');

    tabContent.addEventListener('shown.bs.tab', function(event) {
        const targetId = event.target.getAttribute('data-bs-target');

        // Remove active class from all tabs
        sidebarTabs.forEach(tab => {
            tab.classList.remove('active');
        });

        // Add active class to corresponding sidebar tab
        const activeTab = document.querySelector(`#sidebarTabs a[data-bs-target="${targetId}"]`);
        if (activeTab) {
            activeTab.classList.add('active');
        }
    });

    // Initialize first tab as active
    const firstTab = document.querySelector('#sidebarTabs .list-group-item:first-child');
    if (firstTab) {
        firstTab.classList.add('active');
    }
    });
</script>
@endpushonce

@section("content")
    <div class="az-content az-content-dashboard">
        <div class="container-fluid">
            <div class="az-content-body">
                <div class="profile-card">
                    <!-- Profile Header -->
                    <div class="profile-header">
                        <div class="row align-items-center">
                            <div class="col-md-9 col-sm-12">
                                <h1 class="profile-name">{{ $advertiser->name }}</h1>
                                <p class="profile-title">ID: {{ $advertiser->sid }}</p>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="info-box">
                                            <div class="info-label">Commission Rate</div>
                                            <div class="info-value highlight">{{ $advertiser->commission }}
                                                {{ $advertiser->commission_type == "percentage" ? "%" : $advertiser->commission_type }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="info-box">
                                            <div class="info-label">Payout Days</div>
                                            <div class="info-value">{{ $advertiser->average_payment_time ?? "30" }} <span
                                                    class="fs-12">days</span></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="info-box">
                                            <div class="info-label">Region</div>
                                            <div class="info-value">
                                                @php
                                                    $regions = $advertiser->primary_regions ?? [];
                                                    if (count($regions) > 1) {
                                                        $regions = "Multi";
                                                    } elseif (count($regions) == 1 && $regions[0] == "00") {
                                                        $regions = "All";
                                                    } elseif (count($regions) == 1) {
                                                        $regions = $regions[0] . " Region ";
                                                    } else {
                                                        $regions = "Region Data is not available";
                                                    }
                                                @endphp
                                                {{ $regions }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12 text-center">
                                <div class="image-wrapper">
                                    @if (!empty($advertiser->fetch_logo_url))
                                        <img loading="lazy" class="profile-image" src="{{ $advertiser->fetch_logo_url }}"
                                            alt="{{ $advertiser->name }}">
                                    @elseif (!empty($advertiser->logo))
                                        <img src="{{ \App\Helper\Static\Methods::staticAsset("$advertiser->logo") }}"
                                            alt="{{ $advertiser->name }}" class="profile-image">
                                    @else
                                        <img loading="lazy" class="profile-image"
                                            src="{{ \App\Helper\Static\Methods::isImageShowable($advertiser->logo) }}"
                                            alt="{{ $advertiser->name }}">
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="row mt-3">
                            <div class="col-lg-2 col-md-6 col-sm-12 mb-2 mt-sm-3">
                                {{-- <button class="btn btn-primary w-100" id="applyBtn">
                                    <i class="fas fa-paper-plane me-2"></i> Apply to Promote
                                </button> --}}
                                @if(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_PENDING)

                                    <button type="button" class="btn btn-warning w-100" disabled>
                                        <i class="fas fa-clock color-white me-2"></i> Pending
                                    </button>

                                @elseif(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_ACTIVE)

                                    <button type="button" class="btn btn-success w-100" disabled>
                                        <i class="fas fa-check color-white me-2"></i> Joined
                                    </button>

                                @elseif(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_REJECTED)

                                    <button type="button" class="btn btn-danger w-100" disabled>
                                        <i class="fas fa-times color-white me-2"></i> Rejected
                                    </button>

                                @elseif(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_HOLD)

                                    <button type="button" class="btn btn-secondary w-100" disabled>
                                        <i class="fas fa-stop-circle color-white me-2"></i> Hold
                                    </button>

                                @else

                                    <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal"
                                        data-bs-target="#modal-basic">
                                        <i class="fas fa-paper-plane me-2"></i> Apply
                                    </button>

                                @endif
                            </div>
                        </div>
                    </div>

                        <div class="row">
                            <!-- Sidebar Tabs Menu -->
                            <div class="col-lg-2 col-md-4 mb-4">
                                <div class="card shadow-sm border-0 h-100">
                                    <div class="card-header bg-white border-bottom p-3">
                                    </div>
                                    <div class="list-group list-group-flush" id="sidebarTabs" role="tablist">
                                        <a class="list-group-item list-group-item-action active d-flex align-items-center" id="intro-tab" data-bs-toggle="tab" data-bs-target="#intro" role="tab" aria-controls="intro">
                                            <i class="fas fa-info-circle me-3 text-primary"></i> Profile
                                        </a>
                                        <a class="list-group-item list-group-item-action d-flex align-items-center" id="terms-tab" data-bs-toggle="tab" data-bs-target="#terms" role="tab" aria-controls="terms">
                                            <i class="fas fa-file-contract me-3 text-primary"></i> Terms
                                        </a>

                                        <a class="list-group-item list-group-item-action d-flex align-items-center" id="rules-tab" data-bs-toggle="tab" data-bs-target="#rules" role="tab" aria-controls="rules">
                                            <i class="fas fa-ban me-3 text-primary"></i> Rules
                                        </a>
                                        <a class="list-group-item list-group-item-action d-flex align-items-center" id="commission-tab" data-bs-toggle="tab" data-bs-target="#commission" role="tab" aria-controls="commission">
                                            <i class="fas fa-percent me-3 text-primary"></i> Rates
                                        </a>

                                        @if(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_ACTIVE)
                                            <a class="list-group-item list-group-item-action d-flex align-items-center" id="links-tab" data-bs-toggle="tab" data-bs-target="#links" role="tab" aria-controls="links">
                                                <i class="fas fa-link me-3 text-primary"></i> Links
                                            </a>
                                        @endif

                                        @if(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_ACTIVE)
                                            <a class="list-group-item list-group-item-action d-flex align-items-center" id="coupons-tab" data-bs-toggle="tab" data-bs-target="#coupons" role="tab" aria-controls="coupons">
                                                <i class="fas fa-tag me-3 text-primary"></i> Offers
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Tab Content Area -->
                            <div class="col-lg-10 col-md-8 px-0">
                                <div class="tab-content p-0" id="profileTabContent">
                                    <!-- Intro Tab -->
                                    <div class="tab-pane fade show active" id="intro" role="tabpanel">
                                        <div class="card shadow-sm border-0 mb-4">
                                            <div class="card-body p-4">
                                                <h4 class="mb-3">About {{ $advertiser->name }}</h4>
                                                @if($advertiser->short_description)
                                                    <p class="text-secondary mb-4">
                                                        {!! $advertiser->short_description !!}
                                                    </p>
                                                @else
                                                    <p class="text-secondary mb-4">
                                                        {!! $advertiser->description !!}
                                                    </p>
                                                @endif

                                                <div class="border-top pt-4 mt-4">
                                                    <h5 class="mb-3">Categories</h5>
                                                    <div class="d-flex flex-wrap gap-2">
                                                        @if($advertiser->categories)
                                                            @foreach(\App\Helper\PublisherData::getMixNames($advertiser->categories) as $category)
                                                                <span class="li-none badge bg-primary p-2 rounded-pill" style="font-size:90%;">
                                                                    {{ $category }}
                                                                </span>
                                                            @endforeach
                                                        @else
                                                            <span class="li-none badge bg-danger p-2 rounded-pill" style="font-size:90%;">
                                                                No Categories to show
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="border-top pt-4 mt-4">
                                                    <h5 class="mb-3">
                                                        <i class="fas fa-address-card me-2 text-primary"></i>
                                                        Contact Information
                                                    </h5>
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <div class="d-flex align-items-center">
                                                                <div class="bg-light p-2 me-3">
                                                                    <i class="fas fa-envelope text-primary"></i>
                                                                </div>
                                                                <div>
                                                                    <small class="text-muted d-block">Email</small>
                                                                    <strong>{{ $advertiser->user->email ?? "-" }}</strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <div class="d-flex align-items-center">
                                                                <div class="bg-light p-2 me-3">
                                                                    <i class="fas fa-globe text-primary"></i>
                                                                </div>
                                                                <div>
                                                                    <small class="text-muted d-block">Website</small>
                                                                    <strong>{!! $url !!}</strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="d-flex align-items-center">
                                                                <div class="bg-light p-2 me-3">
                                                                    <i class="fas fa-clock text-primary"></i>
                                                                </div>
                                                                <div>
                                                                    <small class="text-muted d-block">Response Time</small>
                                                                    <strong>Within 24-48 hours</strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Commission Rates Tab -->
                                    <div class="tab-pane fade w-100" id="commission" role="tabpanel">
                                        <div class="card shadow-sm border-0">
                                            <div class="card-body p-4">
                                                <h4 class="mb-3">Commission Structure</h4>
                                                <p class="text-secondary mb-4">Our commission rates vary based on product
                                                    category and performance tiers.</p>

                                                <div class="table-responsive">
                                                    <table class="table table-hover table-primary">
                                                        <thead>
                                                            <tr>
                                                                <th>Date</th>
                                                                <th>Condition</th>
                                                                <th class="text-center">Commission Rate</th>
                                                                <th>Additional info</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if(count($advertiser->commissions))
                                                                @foreach($advertiser->commissions as $commission)
                                                                    <tr>
                                                                        @if(empty($commission->date))
                                                                            <td>{{ now()->format("Y-m-d") }}</td>
                                                                        @else
                                                                            <td>{{ $commission->date }}</td>
                                                                        @endif
                                                                        <td>{{ $commission->condition ?? "-" }}</td>
                                                                        <td class="text-center fw-bold">
                                                                            {{ $commission->rate ?? "-" }}{{ $commission->type == "amount" ? $advertiser->currency_code : "%" }}
                                                                        </td>
                                                                        <td>{{ $commission->info ?? "-" }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            @else
                                                                <tr>
                                                                    <td class="text-center py-4" colspan="4">
                                                                        <div class="text-muted">
                                                                            <i class="fas fa-info-circle me-2"></i>
                                                                            No Commission Rates Exist
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Terms Tab -->
                                    <div class="tab-pane fade" id="terms" role="tabpanel">
                                        <div class="card shadow-sm border-0">
                                            <div class="card-body p-4">
                                                <h4 class="mb-3">Program Terms</h4>
                                                <div class="bg-light p-4">
                                                    {!! $advertiser->program_policies ?? "-" !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Rules Tab -->
                                    <div class="tab-pane fade" id="rules" role="tabpanel">
                                        <div class="card shadow-sm border-0">
                                            <div class="card-body p-4">
                                                <div class="mb-5">
                                                    <h4 class="mb-3">Preferred Promotional Methods</h4>
                                                    <p class="text-secondary mb-3">Promotional Traffic from these sources is
                                                        allowed:</p>
                                                    <div class="bg-light p-4">
                                                        @forelse(\App\Helper\PublisherData::getMixNames($advertiser->promotional_methods ?? []) as $method)
                                                            <div class="d-flex align-items-center mb-2">
                                                                <i class="fas fa-check-circle text-success me-3"></i>
                                                                <span>{{ $method }}</span>
                                                            </div>
                                                        @empty
                                                            <div class="text-muted">
                                                                <i class="fas fa-info-circle me-2"></i>
                                                                No Method Found.
                                                            </div>
                                                        @endforelse
                                                    </div>
                                                </div>

                                                <div>
                                                    <h4 class="mb-3">Restricted Promotional Methods</h4>
                                                    <p class="text-secondary mb-3">Promotional Traffic from these sources are
                                                        strictly not allowed:</p>
                                                    <div class="bg-light p-4">
                                                        @forelse(\App\Helper\PublisherData::getMixNames($advertiser->program_restrictions ?? []) as $method)
                                                            <div class="d-flex align-items-center mb-2">
                                                                <i class="fas fa-times-circle text-danger me-3"></i>
                                                                <span>{{ $method }}</span>
                                                            </div>
                                                        @empty
                                                            <div class="text-muted">
                                                                <i class="fas fa-info-circle me-2"></i>
                                                                No Method Found.
                                                            </div>
                                                        @endforelse
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @if(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_ACTIVE)
                                        <div class="tab-pane fade" id="links" role="tabpanel">
                                            <div class="card shadow-sm border-0">
                                                <div class="card-body p-4">
                                                    <h4 class="mb-4">Tracking Links</h4>

                                                    <!-- Tracking Link Card -->
                                                    <div class="mb-5">
                                                        <h5 class="mb-3">Tracking Link</h5>
                                                        @if(isset($advertiser->advertiser_applies->is_tracking_generate) && isset($advertiser->advertiser_applies->tracking_url) && $advertiser->advertiser_applies->is_tracking_generate == 1)
                                                            <div
                                                                class="d-flex flex-column flex-md-row align-items-md-center gap-3 mb-3">
                                                                <div class="bg-light p-3 flex-grow-1">
                                                                    <a href="{{ $advertiser->advertiser_applies->tracking_url_long ?? $advertiser->advertiser_applies->tracking_url }}"
                                                                        target="_blank" id="trackingURL"
                                                                        class="text-decoration-none text-primary text-break">
                                                                        {{ $advertiser->advertiser_applies->tracking_url_long ?? $advertiser->advertiser_applies->tracking_url }}
                                                                    </a>
                                                                </div>
                                                                <button
                                                                    onclick="clickToCopy('trackingURL', 'Tracking URL Successfully Copied.')"
                                                                    class="btn btn-primary">
                                                                    Copy Link
                                                                </button>
                                                            </div>
                                                        @elseif(isset($advertiser->advertiser_applies->is_tracking_generate) && $advertiser->advertiser_applies->is_tracking_generate == 2)
                                                            <div
                                                                class="d-flex flex-column flex-md-row align-items-md-center gap-3 mb-3">
                                                                <div class="bg-light p-3 flex-grow-1">
                                                                    <span class="text-muted">
                                                                        <i class="fas fa-spinner fa-spin me-2"></i>
                                                                        Generating tracking links...
                                                                    </span>
                                                                </div>
                                                                <button class="btn btn-secondary" disabled>
                                                                    Copy Link
                                                                </button>
                                                            </div>
                                                        @else
                                                            <div class="bg-light p-4 text-center">
                                                                <span class="text-muted">No tracking link available</span>
                                                            </div>
                                                        @endif
                                                    </div>

                                                    <!-- Short Tracking Link Card -->
                                                    <div>
                                                        <h5 class="mb-3">Short Tracking Link</h5>
                                                        @if(isset($advertiser->advertiser_applies->is_tracking_generate) && isset($advertiser->advertiser_applies->tracking_url_short) && $advertiser->advertiser_applies->is_tracking_generate == 1)
                                                            <div class="d-flex flex-column flex-md-row align-items-md-center gap-3">
                                                                <div class="bg-light p-3 flex-grow-1">
                                                                    <a href="{{ $advertiser->advertiser_applies->tracking_url_short }}"
                                                                        id="trackingShortURL" target="_blank"
                                                                        class="text-decoration-none text-primary text-break">
                                                                        {{ $advertiser->advertiser_applies->tracking_url_short }}
                                                                    </a>
                                                                </div>
                                                                <button
                                                                    onclick="clickToCopy('trackingShortURL', 'Tracking Short URL Successfully Copied.')"
                                                                    class="btn btn-primary">
                                                                    Copy Short Link
                                                                </button>
                                                            </div>
                                                        @elseif(isset($advertiser->advertiser_applies->is_tracking_generate) && $advertiser->advertiser_applies->is_tracking_generate == 2)
                                                            <div class="d-flex flex-column flex-md-row align-items-md-center gap-3">
                                                                <div class="bg-light p-3 flex-grow-1">
                                                                    <span class="text-muted">
                                                                        <i class="fas fa-spinner fa-spin me-2"></i>
                                                                        Generating short tracking links...
                                                                    </span>
                                                                </div>
                                                                <button class="btn btn-secondary" disabled>
                                                                    Copy Short Link
                                                                </button>
                                                            </div>
                                                        @else
                                                            <div class="bg-light p-4 text-center">
                                                                <span class="text-muted">No short tracking link available</span>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_ACTIVE)
                                        <div class="tab-pane fade" id="coupons" role="tabpanel">
                                            <div class="card shadow-sm border-0">
                                                <div class="card-body p-4">
                                                    <div id="loading" class="d-flex justify-content-center align-items-center py-5">

                                                            <h6>Loading Offers...</h6>
                                                    </div>
                                                    <div id="ap-overview">
                                                        <!-- Offers content will be loaded here -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-12">

                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
<div class="modal-basic modal fade" id="modal-basic" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('publisher.apply-advertiser') }}" method="POST" id="applyAdvertiser">
            @csrf
            <input type="hidden" name="a_id" value="{{ $advertiser->sid }}">
            <input type="hidden" name="a_name" value="{{ $advertiser->name }}">

            <div class="modal-content modal-bg-white">
                <div class="modal-header">
                    <h5 class="modal-title">Apply to Program</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <!-- Advertiser Info -->
                    <div class="mb-3">
                        <h5 class="mb-1">{{ $advertiser->name }}</h5>
                        <span class="text-muted fs-14">Brand ID: {{ $advertiser->sid }}</span>
                    </div>

                    <!-- Extra Details -->
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <div class="info-box py-2 px-3 border rounded">
                                <div class="info-label text-muted fs-13">Commission Rate</div>
                                <div class="info-value fw-600 text-success">
                                    {{ $advertiser->commission }}
                                    {{ str_contains($advertiser->commission, '%') ? '' : ($advertiser->commission_type == 'percentage' ? '%' : $advertiser->commission_type) }}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="info-box py-2 px-3 border rounded">
                                <div class="info-label text-muted fs-13">Payout Time</div>
                                <div class="info-value fw-600">
                                    {{ $advertiser->average_payment_time ?? 30 }} days
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="info-box py-2 px-3 border rounded">
                                <div class="info-label text-muted fs-13">Regions</div>
                                <div class="info-value">

                                    @php
                                        $regions = $advertiser->primary_regions ?? [];
                                    @endphp

                                    @if(count($regions) > 1)
                                        <span class="badge bg-primary">Multi-Region</span>
                                    @elseif(count($regions) == 1 && $regions[0] == "00")
                                        <span class="badge bg-success">Global</span>
                                    @elseif(count($regions) == 1)
                                        <span class="fi fi-{{ strtolower($regions[0]) }} me-1"></span>
                                        {{ $regions[0] }}
                                    @else
                                        <span class="text-muted">Not Available</span>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Message -->
                    <div class="mb-3">
                        <label class="fw-600 mb-1">
                            Promotional Plan <span class="text-muted fs-12">(Optional)</span>
                        </label>
                        <textarea class="form-control" rows="4" name="message"
                            placeholder="Websites, traffic sources, PPC terms, social media, etc."></textarea>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm">
                        Apply Now
                    </button>
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">
                        Cancel
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>


    <!-- .atbd-drawer -->
    {{-- <div class="drawer-basic-wrap right account">
        <div class="atbd-drawer drawer-account d-none">
            <div class="atbd-drawer__header d-flex aling-items-center justify-content-between">
                <h6 class="drawer-title">Send Message To The Advertiser</h6>
                <a href="#" class="btdrawer-close"><i class="la la-times"></i></a>
            </div><!-- ends: .atbd-drawer__header -->
            <div class="atbd-drawer__body">
                <div class="drawer-content">
                    <div class="drawer-account-form form-basic">
                        <form action="{{ route("publisher.send-msg-to-advertiser") }}" method="POST">
                            @csrf
                            <input type="hidden" name="advertiser_id" id="advertiser_id" value="{{ $advertiser->id }}">

                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label for="publisher_name">From</label>
                                    <input type="text" name="publisher_name" id="publisher_name"
                                        class="form-control form-control-sm" placeholder="Publisher Name"
                                        value="{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}" readonly>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="advertiser_name">To</label>
                                    <input type="text" name="advertiser_name" id="advertiser_name"
                                        class="form-control form-control-sm" placeholder="Advertiser Name" readonly
                                        value="{{ $advertiser->name }}">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label for="subject">Subject</label>
                                    <input type="text" name="subject" id="subject" class="form-control form-control-sm"
                                        placeholder="Please Enter Subject For This Message">
                                </div>
                                <div class="form-group col-12">
                                    <label for="question_or_comment">Your Question or Comments</label>
                                    <textarea name="question_or_comment" id="question_or_comment"
                                        class="form-control form-control-sm"
                                        placeholder="Please Enter Your Question or Comments"></textarea>
                                </div>
                                <button class="btn btn-primary btn-default btn-squared ">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- ends: .atbd-drawer__body -->
        </div>
    </div> --}}
    <div class="overlay-dark"></div>
    <div class="overlay-dark-l2"></div>
    <!-- ends: .atbd-drawer -->




    {{-- <div class="contents">

        <div class="container-fluid">
            <div class="profile-content mb-50">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="breadcrumb-main">
                            <h4 class="text-capitalize breadcrumb-title"></h4>

                        </div>

                    </div>
                    <div class="cos-lg-3 col-md-4  ">
                        <aside class="profile-sider">
                            <!-- Profile Acoount -->
                            <div class="card mb-25">
                                <div class="card-body text-center pt-sm-30 pb-sm-0  px-25 pb-0">

                                    <div class="account-profile">
                                        <div class="ap-img w-100 d-flex justify-content-center">
                                            <!-- Profile picture image-->
                                            @if (!empty($advertiser->fetch_logo_url) && $advertiser->is_fetchable_logo)
                                            <img loading="lazy" class="ap-img__main w-auto h-40 mb-3 d-flex"
                                                src="{{ $advertiser->fetch_logo_url }}" alt="{{ $advertiser->name }}">
                                            @elseif (!empty($advertiser->logo))
                                            <img src="{{ \App\Helper\Static\Methods::staticAsset(" $advertiser->logo") }}"
                                            alt="{{ $advertiser->name }}" class="mw-50px mw-lg-75px">
                                            @else
                                            <img loading="lazy" class="ap-img__main w-auto h-40 mb-3 d-flex"
                                                src="{{ \App\Helper\Static\Methods::isImageShowable($advertiser->logo) }}"
                                                alt="{{ $advertiser->name }}">
                                            @endif

                                        </div>
                                        <div class="ap-nameAddress pb-3 pt-1">
                                            <h5 class="ap-nameAddress__title">{{ $advertiser->name }}</h5>
                                            <p class="ap-nameAddress__subTitle fs-14 m-0">ID: {{ $advertiser->sid }}</p>
                                            <p class="ap-nameAddress__subTitle fs-14 m-0">
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
                                                <span data-feather="map-pin"></span>{{ $regions }}
                                            </p>
                                        </div>
                                        <div class="ap-button button-group d-flex justify-content-center flex-wrap">
                                            <button type="button"
                                                class="border text-capitalize px-25 color-gray transparent shadow2 radius-md drawer-trigger"
                                                data-drawer="account">
                                                <span data-feather="mail"></span>message</button>

                                            @if(isset($advertiser->advertiser_applies->status) &&
                                            $advertiser->advertiser_applies->status ==
                                            \App\Models\AdvertiserApply::STATUS_PENDING)

                                            <button type="button"
                                                class="btn btn-warning  btn-default btn-squared text-capitalize px-25 shadow2 radius-md"
                                                disabled>
                                                <i class="las la-clock color-white"></i> Pending
                                            </button>

                                            @elseif(isset($advertiser->advertiser_applies->status) &&
                                            $advertiser->advertiser_applies->status ==
                                            \App\Models\AdvertiserApply::STATUS_ACTIVE)

                                            <button type="button"
                                                class="btn btn-success btn-default btn-squared text-capitalize px-25 shadow2 radius-md"
                                                disabled>
                                                <i class="las la-check color-white"></i> Joined
                                            </button>

                                            @elseif(isset($advertiser->advertiser_applies->status) &&
                                            $advertiser->advertiser_applies->status ==
                                            \App\Models\AdvertiserApply::STATUS_REJECTED)

                                            <button type="button"
                                                class="btn btn-danger btn-default btn-squared text-capitalize px-25 shadow2 radius-md"
                                                disabled>
                                                <i class="las la-times color-white"></i> Rejected
                                            </button>

                                            @elseif(isset($advertiser->advertiser_applies->status) &&
                                            $advertiser->advertiser_applies->status ==
                                            \App\Models\AdvertiserApply::STATUS_HOLD)

                                            <button type="button"
                                                class="btn btn-secondary btn-default btn-squared text-capitalize px-25 shadow2 radius-md"
                                                disabled>
                                                <i class="las la-stop-circle color-white"></i> Hold
                                            </button>

                                            @else

                                            <button type="button"
                                                class="btn btn-default btn-squared btn-outline-success text-capitalize px-25 shadow2 follow radius-md"
                                                data-toggle="modal" data-target="#modal-basic">
                                                <span class="las la-user-plus follow-icon"></span> Apply
                                            </button>

                                            @endif
                                        </div>
                                    </div>

                                    <div class="card-footer mt-20 pt-20 pb-20 px-0">
                                        <div class="profile-overview d-flex justify-content-between flex-wrap">
                                            <div class="po-details">
                                                <h6 class="po-details__title pb-1">{{ $advertiser->commission }}{{
                                                    $advertiser->commission_type == "percentage" ? "%" :
                                                    $advertiser->commission_type }}</h6>
                                                <span class="po-details__sTitle">Commission</span>
                                            </div>
                                            <div class="po-details">
                                                <h6 class="po-details__title pb-1">{{ $regions }}</h6>
                                                <span class="po-details__sTitle">Regions</span>
                                            </div>
                                            <div class="po-details">
                                                <h6 class="po-details__title pb-1">{{ $advertiser->average_payment_time ??
                                                    "-" }} <span class="fs-12">days</span></h6>
                                                <span class="po-details__sTitle">APC</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Profile Acoount End -->

                            @if(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status ==
                            \App\Models\AdvertiserApply::STATUS_ACTIVE)
                            @include("template.publisher.widgets.deeplink", compact('advertiser'))
                            @endif

                            <!-- Profile User Bio -->
                            <div class="card mb-25">
                                <div class="user-bio border-bottom">
                                    <div class="card-header border-bottom-0 pt-sm-30 pb-sm-0  px-md-25 px-3">
                                        <div class="profile-header-title">
                                            About
                                        </div>
                                    </div>
                                    <div class="card-body pt-md-1 pt-0">
                                        <div class="user-bio__content">
                                            @if($advertiser->short_description)
                                            <p class="m-0">
                                                {!! \Illuminate\Support\Str::limit($advertiser->short_description, 2000) !!}
                                            </p>
                                            <p class="mt-3">
                                                <small>
                                                    @if(strlen($advertiser->short_description) >= 80)
                                                    Read More to Detail Introduction
                                                    @endif
                                                </small>
                                            </p>
                                            @else
                                            <p class="m-0">
                                                {!! \Illuminate\Support\Str::limit($advertiser->description, 80) !!}
                                            </p>
                                            <p class="mt-3">
                                                <small>
                                                    @if(strlen($advertiser->description) >= 80)
                                                    Read More to Detail Introduction
                                                    @endif
                                                </small>
                                            </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="user-info border-bottom">
                                    <div class="card-header border-bottom-0 pt-sm-25 pb-sm-0  px-md-25 px-3">
                                        <div class="profile-header-title">
                                            Contact info
                                        </div>
                                    </div>
                                    <div class="card-body pt-md-1 pt-0">
                                        <div class="user-content-info">
                                            <p class="user-content-info__item">
                                                <span data-feather="mail"></span>{{ $advertiser->user->email ?? "-" }}
                                            </p>
                                            <p class="user-content-info__item mb-0">
                                                <span data-feather="globe"></span>
                                                {!! $url !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="user-skils border-bottom">
                                    <div class="card-header border-bottom-0 pt-sm-25 pb-sm-0  px-md-25 px-3">
                                        <div class="profile-header-title">
                                            Primary Regions
                                        </div>
                                    </div>
                                    <div class="card-body pt-md-1 pt-0">
                                        <ul class="user-skils-parent">
                                            @if($advertiser->primary_regions)
                                            @foreach($advertiser->primary_regions as $region)
                                            <li class="user-skils-parent__item">
                                                <a href="#">{{ $region['region'] ?? $region }}</a>
                                            </li>
                                            @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <div class="user-skils border-bottom">
                                    <div class="card-header border-bottom-0 pt-sm-25 pb-sm-0  px-md-25 px-3">
                                        <div class="profile-header-title">
                                            Supported Regions
                                        </div>
                                    </div>
                                    <div class="card-body pt-md-1 pt-0">
                                        <ul class="user-skils-parent">
                                            @if($advertiser->supported_regions)
                                            @foreach($advertiser->supported_regions as $region)
                                            <li class="user-skils-parent__item">
                                                <a href="#">{{ $region['region'] ?? $region }}</a>
                                            </li>
                                            @endforeach
                                            @else
                                            <li class="user-skils-parent__item">
                                                -
                                            </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <div class="user-skils border-bottom">
                                    <div class="card-header border-bottom-0 pt-sm-25 pb-sm-0  px-md-25 px-3">
                                        <div class="profile-header-title">
                                            Categories
                                        </div>
                                    </div>
                                    <div class="card-body pt-md-1 pt-0">
                                        <ul class="user-skils-parent">
                                            @if($advertiser->categories)
                                            @foreach(\App\Helper\PublisherData::getMixNames($advertiser->categories) as
                                            $category)
                                            <li class="user-skils-parent__item">
                                                <a href="#">{{ $category ?? "-" }}</a>
                                            </li>
                                            @endforeach
                                            @else
                                            <li class="user-skils-parent__item">
                                                -
                                            </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Profile User Bio End -->
                        </aside>
                    </div>

                    <div class="col">
                        <!-- Tab Menu -->
                        <div class="ap-tab ap-tab-header">
                            <div class="ap-tab-header__img">
                                <img src="{{ \App\Helper\Static\Methods::staticAsset(" img/placeholder-cover.png") }}"
                                    alt="ap-header" class="img-fluid w-100">
                            </div>
                            <div class="ap-tab-wrapper">
                                <ul class="nav px-25 ap-tab-main" id="ap-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="overview-tab" data-toggle="pill" href="#overview"
                                            role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="commission-rates-tab" data-toggle="pill"
                                            href="#commission-rates" role="tab" aria-controls="commission-rates"
                                            aria-selected="false">Commission Rates</a>
                                    </li>
                                    @if(isset($advertiser->advertiser_applies->status) &&
                                    $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_ACTIVE)
                                    <li class="nav-item">
                                        <a class="nav-link" id="links-tab" data-toggle="pill" href="#links" role="tab"
                                            aria-controls="links" aria-selected="false">Tracking links</a>
                                    </li>
                                    @endif
                                    <li class="nav-item">
                                        <a class="nav-link" id="terms-tab" data-toggle="pill" href="#terms" role="tab"
                                            aria-controls="terms" aria-selected="false">Terms</a>
                                    </li>
                                    @if(isset($advertiser->advertiser_applies->status) &&
                                    $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_ACTIVE)
                                    <li class="nav-item">
                                        <a class="nav-link" id="coupons-tab" data-toggle="pill" href="#coupons" role="tab"
                                            aria-controls="coupons" aria-selected="false">Creative</a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <!-- Tab Menu End -->
                        <div class="tab-content mt-25" id="ap-tabContent">
                            <div class="tab-pane fade show active" id="overview" role="tabpanel"
                                aria-labelledby="overview-tab">
                                <div class="ap-content-wrapper">
                                    @include("partial.admin.alert")
                                    <div class="row">
                                        <div class="col-lg-4 mb-25">
                                            <!-- Card 1 -->
                                            <div class="ap-po-details radius-xl bg-white d-flex justify-content-between">
                                                <div>
                                                    <div class="overview-content">
                                                        <h2>Detailed Introduction</h2>
                                                        <div>
                                                            @if($advertiser->description)
                                                            {!! $advertiser->description ?? "-" !!}
                                                            @else
                                                            {!! $advertiser->short_description !!}
                                                            @endif
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            <!-- Card 1 End -->
                                        </div>
                                        <div class="col-lg-4 mb-25">
                                            <!-- Card 2 End  -->
                                            <div class="ap-po-details radius-xl bg-white d-flex justify-content-between">
                                                <div>
                                                    <div class="overview-content">
                                                        <h2>Preferred Promotional Methods</h2>
                                                        <p>Promotional Traffic from these sources is allowed:</p>
                                                        <ul class="user-skils-parent">
                                                            @if($advertiser->promotional_methods)
                                                            @foreach(\App\Helper\PublisherData::getMixNames($advertiser->promotional_methods)
                                                            as $method)
                                                            <li class="badge badge-round badge-success badge-lg my-2 mr-2">
                                                                {{ $method }}
                                                            </li>
                                                            @endforeach
                                                            @else
                                                            -
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Card 2 End  -->
                                        </div>
                                        <div class="col-lg-4 mb-25">
                                            <!-- Card 3 -->
                                            <div class="ap-po-details radius-xl bg-white d-flex justify-content-between">
                                                <div>
                                                    <div class="overview-content">
                                                        <h2>Restricted Methods</h2>
                                                        <p>Promotional Traffic from these sources are strictly not allowed:
                                                        </p>
                                                        <ul class="user-skils-parent">
                                                            @if($advertiser->program_restrictions)
                                                            @foreach(\App\Helper\PublisherData::getMixNames($advertiser->program_restrictions)
                                                            as $method)
                                                            <li class="badge badge-round badge-danger badge-lg my-2 mr-2">
                                                                {{ $method }}
                                                            </li>
                                                            @endforeach
                                                            @else
                                                            -
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Card 3 End -->
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="commission-rates" role="tabpanel"
                                aria-labelledby="commission-rates-tab">
                                <div class="ap-post-content">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <!-- Product Table -->
                                            <div class="card mt-25 mb-40">
                                                <div class="card-header text-capitalize px-md-25 px-3">
                                                    <h2>Commission Terms</h2>
                                                </div>
                                                <div class="card-body p-0">
                                                    <div class="ap-product">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Date</th>
                                                                        <th>Condition</th>
                                                                        <th class="text-center">Commission Rate</th>
                                                                        <th>Additional info</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @if(count($advertiser->commissions))
                                                                    @foreach($advertiser->commissions as $commission)
                                                                    <tr>
                                                                        @if(empty($commission->date))
                                                                        <td>{{ now()->format("Y-m-d") }}</td>
                                                                        @else
                                                                        <td>{{ $commission->date }}</td>
                                                                        @endif
                                                                        <td>{{ $commission->condition ?? "-" }}</td>
                                                                        <td class="text-center">{{ $commission->rate ?? "-"
                                                                            }}{{ $commission->type == "amount" ?
                                                                            $advertiser->currency_code : "%" }}</td>
                                                                        <td>{{ $commission->info ?? "-" }}</td>
                                                                    </tr>
                                                                    @endforeach
                                                                    @else
                                                                    <tr class="border-0">
                                                                        <td class="text-center" colspan="4">
                                                                            <small>No Commission Rates Exist</small>
                                                                        </td>
                                                                    </tr>
                                                                    @endif
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Table End -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status ==
                            \App\Models\AdvertiserApply::STATUS_ACTIVE)
                            <div class="tab-pane fade" id="links" role="tabpanel" aria-labelledby="links-tab">
                                <div class="ap-post-content">
                                    <div class="row">
                                        <div class="col-xxl-12">
                                            <div class="card global-shadow mb-25">
                                                <div class="friends-widget">
                                                    <div class="card-header px-md-25 px-3">
                                                        <h2>Tracking Link</h2>
                                                    </div>
                                                    <div class="card-body ">

                                                        @if(isset($advertiser->advertiser_applies->is_tracking_generate) &&
                                                        isset($advertiser->advertiser_applies->tracking_url) &&
                                                        $advertiser->advertiser_applies->is_tracking_generate == 1)
                                                        <a href="{{ $advertiser->advertiser_applies->tracking_url_long ?? $advertiser->advertiser_applies->tracking_url }}"
                                                            target="_blank" id="trackingURL">{{
                                                            $advertiser->advertiser_applies->tracking_url_long ??
                                                            $advertiser->advertiser_applies->tracking_url }}</a>
                                                        <br /><br />
                                                        <a href="javascript:void(0)"
                                                            onclick="clickToCopy('trackingURL', 'Tracking URL Successfully Copied.')"
                                                            class="btn btn-xs btn-outline-dashed">Copy Tracking Link</a>
                                                        @elseif(isset($advertiser->advertiser_applies->is_tracking_generate)
                                                        && $advertiser->advertiser_applies->is_tracking_generate == 2)
                                                        <a href="javascript:void(0)"><i>Generating tracking
                                                                links.....</i></a>
                                                        <br /><br />
                                                        <a href="javascript:void(0)"
                                                            class="btn btn-xs btn-outline-dashed">Copy Tracking Link</a>
                                                        @else
                                                        -
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card global-shadow mb-25">
                                                <div class="friends-widget">
                                                    <div class="card-header px-md-25 px-3">
                                                        <h2>Short Tracking Link</h2>
                                                    </div>
                                                    <div class="card-body ">
                                                        @if(isset($advertiser->advertiser_applies->is_tracking_generate) &&
                                                        isset($advertiser->advertiser_applies->tracking_url_short) &&
                                                        $advertiser->advertiser_applies->is_tracking_generate == 1)
                                                        <a href="{{ $advertiser->advertiser_applies->tracking_url_short }}"
                                                            id="trackingShortURL" target="_blank">{{
                                                            $advertiser->advertiser_applies->tracking_url_short }}</a>
                                                        <br /><br />
                                                        <a href="javascript:void(0)"
                                                            onclick="clickToCopy('trackingShortURL', 'Tracking Short URL Successfully Copied.')"
                                                            class="btn btn-xs btn-outline-dashed">Copy Short Tracking
                                                            Link</a>
                                                        @elseif(isset($advertiser->advertiser_applies->is_tracking_generate)
                                                        && $advertiser->advertiser_applies->is_tracking_generate == 2)
                                                        <a href="javascript:void(0)"><i>Generating short tracking
                                                                links.....</i></a>
                                                        <br /><br />
                                                        <a href="javascript:void(0)"
                                                            class="btn btn-xs btn-outline-dashed">Copy Short Tracking
                                                            Link</a>
                                                        @else
                                                        -
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="tab-pane fade" id="terms" role="tabpanel" aria-labelledby="terms-tab">
                                <div class="ap-post-content">
                                    <div class="row">
                                        <div class="col-xxl-8">
                                            <!-- Friend post -->
                                            <div class="card global-shadow mb-25">
                                                <div class="friends-widget">
                                                    <div class="card-header px-md-25 px-3">
                                                        <h2>Program Terms</h2>
                                                    </div>
                                                    <div class="card-body ">
                                                        {!! $advertiser->program_policies ?? "-" !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Friend Post End -->
                                        </div>

                                    </div>
                                </div>
                            </div>
                            @if(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status ==
                            \App\Models\AdvertiserApply::STATUS_ACTIVE)
                            <div class="tab-pane fade" id="coupons" role="tabpanel" aria-labelledby="coupons-tab">
                                <div class="ap-post-content">
                                    <div class="orderDatatable global-shadow border py-30 px-sm-30 px-20 bg-white radius-xl w-100 mb-30"
                                        id="ap-overview"></div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- .atbd-drawer -->
        <div class="drawer-basic-wrap right account">
            <div class="atbd-drawer drawer-account d-none">
                <div class="atbd-drawer__header d-flex aling-items-center justify-content-between">
                    <h6 class="drawer-title">Send Message To The Advertiser</h6>
                    <a href="#" class="btdrawer-close"><i class="la la-times"></i></a>
                </div><!-- ends: .atbd-drawer__header -->
                <div class="atbd-drawer__body">
                    <div class="drawer-content">
                        <div class="drawer-account-form form-basic">
                            <form action="{{ route(" publisher.send-msg-to-advertiser") }}" method="POST">
                                @csrf
                                <input type="hidden" name="advertiser_id" id="advertiser_id" value="{{ $advertiser->id }}">

                                <div class="form-row">
                                    <div class="form-group col-lg-6">
                                        <label for="publisher_name">From</label>
                                        <input type="text" name="publisher_name" id="publisher_name"
                                            class="form-control form-control-sm" placeholder="Publisher Name"
                                            value="{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}"
                                            readonly>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="advertiser_name">To</label>
                                        <input type="text" name="advertiser_name" id="advertiser_name"
                                            class="form-control form-control-sm" placeholder="Advertiser Name" readonly
                                            value="{{ $advertiser->name }}">
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="subject">Subject</label>
                                        <input type="text" name="subject" id="subject" class="form-control form-control-sm"
                                            placeholder="Please Enter Subject For This Message">
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="question_or_comment">Your Question or Comments</label>
                                        <textarea name="question_or_comment" id="question_or_comment"
                                            class="form-control form-control-sm"
                                            placeholder="Please Enter Your Question or Comments"></textarea>
                                    </div>
                                    <button class="btn btn-primary btn-default btn-squared ">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- ends: .atbd-drawer__body -->
            </div>
        </div>
        <div class="overlay-dark"></div>
        <div class="overlay-dark-l2"></div>
        <!-- ends: .atbd-drawer -->

    </div> --}}

@endsection
