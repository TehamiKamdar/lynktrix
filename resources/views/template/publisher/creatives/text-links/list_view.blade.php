<!-- Start Table Responsive -->
{{-- <div class="table-responsive">
    <table class="table mb-0 table-hover table-borderless border-0">
        <thead>
            <tr class="userDatatable-header">

                <th>
                    <span class="userDatatable-title">Advertiser</span>
                </th>
                <th>
                    <span class="userDatatable-title">Advertiser URL</span>
                </th>

                <th>
                    <span class="userDatatable-title">Tracking Short Link</span>
                </th>

                <th>
                    <span class="userDatatable-title">Tracking Link</span>
                </th>

                <th>
                    <span class="userDatatable-title">Sud ID</span>
                </th>

                <th>

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
                        <a href="{{ $link->url }}" target="_blank">{{ \Illuminate\Support\Str::limit($link->url, 30,
                            $end='...') }}</a>
                    </div>
                </td>
                <td>
                    <div class="orderDatatable-title">
                        <a href="{{ $link->tracking_url_short }}" id="trackingURL{{ $key }}" target="_blank">{{
                            $link->tracking_url_short ?? "-" }}</a>
                    </div>
                </td>
                <td>
                    <div class="orderDatatable-title">
                        <a href="{{ $link->tracking_url_long }}" id="trackingURL{{ $key }}" target="_blank">{{
                            \Illuminate\Support\Str::limit($link->tracking_url_long ?? "-", 30, $end='...') }}</a>
                    </div>
                </td>
                <td>
                    <div class="orderDatatable-title">
                        {{ $link->sub_id ?? "-" }}
                    </div>
                </td>
                <td>
                    <a href="javascript:void(0)" onclick="copyLink('{{ $key }}')" class="btn btn-xs btn-outline-dashed">
                        Copy Link
                    </a>
                </td>
            </tr>
            <!-- End: tr -->
            @endforeach
            @else
            <tr>
                <td colspan="5">
                    <h6 class="text-center mt-5">Text Link Data Not Exist</h6>
                </td>
            </tr>
            @endif
        </tbody>
    </table>
</div> --}}
<!-- Table Responsive End -->

<style>
    .accordion-item {
        border: none;
        margin-bottom: 10px;
        overflow: hidden;
        box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.08);
        border-radius: 0px !important;
    }

    .accordion-button {
        background-color: #ffffff;
        padding: 12px 20px;
        font-weight: 500;
        border: none;
        box-shadow: none !important;
    }

    .accordion-button:not(.collapsed) {
        background-color: #fff;
        color: #000;
    }

    .accordion-button::after {
        background-image: none;
        font-family: "Font Awesome 6 Free";
        content: "\f078";
        /* Chevron down icon */
        font-weight: 900;
        transform: rotate(0deg);
        transition: transform 0.3s;
    }

    .accordion-button:not(.collapsed)::after {
        content: "\f077";
        /* Chevron up icon */
        transform: rotate(0deg);
        background: none !important;
    }

    .advertiser-name {
        font-size: 1.1rem;
        color: #333;
    }

    .advertiser-attributes {
        display: flex;
        gap: 30px;
        margin-right: 30px;
    }

    .attribute-badge {
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.85rem;
    }

    .premium-badge {
        background-color: #e6e6e6;
        color: #000000;
        border: 1px solid #505050;
    }

    .danger-badge {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    .hold-badge {
        background-color: #e8f4fd;
        color: #0c63e4;
        border: 1px solid #b6d4fe;
    }

    .pending-badge {
        background-color: #fff3cd;
        color: #856404;
        border: 1px solid #ffeaa7;
    }

    .active-badge {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .accordion-body {
        background-color: #f8f9fa;
        padding: 25px;
        border-top: 1px solid #eee;
    }

    .advertiser-details {
        display: grid;
        grid-template-columns: 120px 1fr;
        gap: 20px;
    }

    .advertiser-logo {
        width: 100px;
        height: 100px;
        background-color: white;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #eee;
        font-size: 1rem;
        color: #666;
    }

    .detail-item {
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: 0.5rem !important;
    }

    .detail-item a{
        min-width: 500px
    }

    .detail-label {
        font-weight: 600;
        min-width: 120px;
        color: #555;
    }

    .website-link {
        color: #0d6efd;
        text-decoration: none;
    }

    .website-link:hover {
        text-decoration: underline;
    }

    .contact-btn {
        background-color: #0d6efd;
        color: white;
        border: none;
        padding: 8px 20px;
        border-radius: 5px;
        text-decoration: none;
        display: inline-block;
        font-size: 0.9rem;
    }

    .contact-btn:hover {
        background-color: #0b5ed7;
        color: white;
    }

    @media (max-width: 768px) {
        .advertiser-attributes {
            gap: 15px;
            margin-right: 20px;
            flex-wrap: wrap;
        }

        .advertiser-details {
            grid-template-columns: 1fr;
        }

        .accordion-button {
            padding: 15px;
        }
    }
</style>
<div class="accordion" id="linksAccordion">
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
                                        src="{{ \App\Helper\Static\Methods::staticAsset("$link->logo") }}"
                                        alt="{{ $link->name }}" style="width: 60px">
                                @else
                                    <img loading="lazy" class="ap-img__main h-auto mr-10"
                                        src="{{ \App\Helper\Static\Methods::isImageShowable($link->logo) }}"
                                        alt="{{ $link->name }}" style="width: 60px">
                                @endif
                            </div>
                            <div>
                                {{-- <div class="detail-item">
                                    <span class="detail-label">Category:</span>
                                    <span>Technology & Software</span>
                                </div> --}}
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
                                        <button type="button" class="btn btn-copy" onclick="copyText(this, '{{ $link->tracking_url }}')">
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
                                        <button type="button" class="btn btn-copy" onclick="copyText(this, '{{ $link->tracking_url_long }}')">
                                            Copy
                                        </button>
                                    @endif
                                </div>

                                <div class="detail-item">
                                    <span class="detail-label">Sub ID:</span>
                                    <span>{{ $link->sub_id ?? "-" }}</span>
                                </div>
                                <div class="mt-3">
                                    <a href="{{ route("publisher.view-advertiser", ['sid' => $link->sid]) }}"
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
</div>

@if(count($links) && $links instanceof \Illuminate\Pagination\LengthAwarePaginator)
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-sm-end justify-content-star mt-1 mb-30 border-top">

                {{ $links->withQueryString()->links() }}

            </div>
        </div>
    </div>
@endif
