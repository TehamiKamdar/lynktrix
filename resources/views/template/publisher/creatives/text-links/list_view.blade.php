<!-- Start Table Responsive -->
<div class="table-responsive">
    <table class="table table-hover align-middle modern-table">
        <thead>
            <tr>
                <th>
                    <span>Advertiser</span>
                </th>

                <th>
                    <span>Tracking Short Link</span>
                </th>

                <th>
                    <span>Tracking Link</span>
                </th>

                <th>
                    <span>Sud ID</span>
                </th>

                <th>
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @if(count($links))
                @foreach($links as $key => $link)
                        <tr>
                            <td>
                                <div class="orderDatatable-title">
                                    {{ $link->name }} <br>
                                    <span class="fs-12 color-gray">({{ $link->sid }})</span>
                                </div>
                            </td>
                            <td>
                                <div class="orderDatatable-title">
                                    <a href="{{ $link->tracking_url_short }}" id="trackingURL{{ $key }}" target="_blank">{{ $link->tracking_url_short ?? "-" }}</a>
                                </div>
                            </td>
                            <td>
                                <div class="orderDatatable-title">
                                    <a href="{{ $link->tracking_url_long }}" id="trackingURL{{ $key }}" target="_blank">{{ \Illuminate\Support\Str::limit($link->tracking_url_long ?? "-", 30, $end = '...') }}</a>
                                </div>
                            </td>
                            <td>
                                <div class="orderDatatable-title">
                                    {{ $link->sub_id ?? "-" }}
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-start align-items-center gap-3">
                                    <a href="{{ $link->url }}" target="_blank" class="website-link tooltip-wrapper" style="font-size: 16px;">
                                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                        <span class="tooltip-text">Visit</span>
                                    </a>
                                    <a href="javascript:void(0)" onclick="copyLink('{{ $key }}')" class="website-link tooltip-wrapper" style="font-size: 18px;">
                                        <i class="fa-regular fa-copy"></i>
                                        <span class="tooltip-text">Copy Link</span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <!-- End: tr -->
                @endforeach
            @else
                <tr>
                    <td colspan="5">
                        <h6 class="text-center my-3">Text Link Data Not Exist</h6>
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
<!-- Table Responsive End -->

<style>
    .modern-table {
        font-size: 14px;
        overflow: auto;
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
{{-- <div class="accordion" id="linksAccordion">
    @if(count($links))
    @foreach($links as $key => $link)
    <!-- Advertiser 1 -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading1">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#{{ $link->sid}}" aria-expanded="true" aria-controls="collapse1">
                <div class="d-flex justify-content-between align-items-center w-100 me-3">
                    <span class="advertiser-name">
                        <i class="fas fa-building me-2"></i> {{ $link->name }}
                    </span>
                </div>
            </button>
        </h2>
        <div id="{{ $link->sid }}" class="accordion-collapse collapse" aria-labelledby="heading1"
            data-bs-parent="#linksAccordion">
            <div class="accordion-body">
                <div class="advertiser-details">
                    <div class="advertiser-logo">
                        @php
                        $fetch = \App\Models\Advertiser::find($link->id);
                        @endphp
                        @if (!empty($fetch->fetch_logo_url))

                        <img loading="lazy" class="ap-img__main h-auto mr-10" src="{{ $fetch->fetch_logo_url }}"
                            alt="{{ $link->name }}" style="width: 60px">
                        @elseif (!empty($link->logo))
                        <img loading="lazy" class="ap-img__main h-auto mr-10"
                            src="{{ \App\Helper\Static\Methods::staticAsset(" $link->logo") }}"
                        alt="{{ $link->name }}" style="width: 60px">
                        @else
                        <img loading="lazy" class="ap-img__main h-auto mr-10"
                            src="{{ \App\Helper\Static\Methods::isImageShowable($link->logo) }}" alt="{{ $link->name }}"
                            style="width: 60px">
                        @endif
                    </div>
                    <div>
                        <div class="detail-item">
                            <span class="detail-label">Website:</span>
                            <a href="{{ $link->url }}" class="website-link">{{ $link->url }}</a>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Short Link:</span>

                            <a href="{{ $link->tracking_url }}" target="_blank" id="shortLink">
                                {{ $link->tracking_url ?? "-" }}
                            </a>

                            @if($link->tracking_url)
                            <button type="button" class="btn btn-copy"
                                onclick="copyText(this, '{{ $link->tracking_url }}')">
                                Copy
                            </button>
                            @endif
                        </div>

                        <div class="detail-item">
                            <span class="detail-label">Tracking Link:</span>

                            <a href="{{ $link->tracking_url_long }}" target="_blank" id="longLink">
                                {{ $link->tracking_url_long ?? "-" }}
                            </a>

                            @if($link->tracking_url_long)
                            <button type="button" class="btn btn-copy"
                                onclick="copyText(this, '{{ $link->tracking_url_long }}')">
                                Copy
                            </button>
                            @endif
                        </div>

                        <div class="detail-item">
                            <span class="detail-label">Sub ID:</span>
                            <span>{{ $link->sub_id ?? "-" }}</span>
                        </div>
                        <div class="mt-3">
                            <a href="{{ route(" publisher.view-advertiser", ['sid'=> $link->sid]) }}"
                                class="contact-btn">
                                <i class="fas fa-arrow-right me-1"></i> Show More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @else
    <div class="card">
        <div class="card-body">
            <h6 class="text-center">Advertiser Data Not Exist</h6>
        </div>
    </div>
    @endif
</div> --}}

@if(count($links) && $links instanceof \Illuminate\Pagination\LengthAwarePaginator)
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-sm-end justify-content-star mt-1 mb-30 border-top">

                {{ $links->withQueryString()->links() }}

            </div>
        </div>
    </div>
@endif