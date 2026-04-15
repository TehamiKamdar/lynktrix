<style>
    li {
        list-style: none;
    }

    .pagination {
        gap: 6px;
        margin-bottom: 0;
    }

    /* Base page link */
    .pagination .page-link {
        color: #C22437;
        background-color: #fff;
        border: 1px solid #eee;
        border-radius: 8px;
        min-width: 34px;
        height: 34px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        transition: all 0.2s ease;
        box-shadow: none;
    }

    /* Hover */
    .pagination .page-link:hover {
        background-color: #C22437;
        color: #fff;
        border-color: #C22437;
    }

    /* Active page */
    .pagination .page-item.active .page-link {
        background-color: #C22437;
        color: #fff;
        border-color: #C22437;
    }

    /* Disabled */
    .pagination .page-item.disabled .page-link {
        color: #cfcfcf;
        background-color: #f9f9f9;
        border-color: #eee;
        pointer-events: none;
    }

    /* Focus remove bootstrap blue glow */
    .pagination .page-link:focus {
        box-shadow: none;
    }

    /* Limit dropdown */
    .page-selection {
        border-radius: 8px;
        border: 1px solid #eee;
        height: 34px;
        font-size: 13px;
        color: #333;
    }

    .page-selection:focus {
        border-color: #C22437;
        box-shadow: none;
    }
</style>

<nav class="mt-4">
    <ul class="pagination d-flex align-items-center" id="publisherPagination">

        @if ($paginator->hasPages())

            {{-- Previous Page Link --}}
            <li class="page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
                @if ($paginator->onFirstPage())
                    <span class="page-link">
                        <i class="fas fa-chevron-left"></i>
                    </span>
                @else
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                @endif
            </li>

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)

                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled">
                        <span class="page-link">{{ $element }}</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)

                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page">
                                <span class="page-link">{{ $page }}</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif

                    @endforeach
                @endif

            @endforeach

            {{-- Next Page Link --}}
            <li class="page-item {{ !$paginator->hasMorePages() ? 'disabled' : '' }}">
                @if ($paginator->hasMorePages())
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                @else
                    <span class="page-link">
                        <i class="fas fa-chevron-right"></i>
                    </span>
                @endif
            </li>

        @endif

        {{-- LIMIT BOX (UNCHANGED LOGIC) --}}
        @if(
                request()->route()->getName() == "publisher.reports.transactions.list"
                || request()->route()->getName() == "publisher.find-advertisers"
                || request()->route()->getName() == "publisher.own-advertisers"
                || request()->route()->getName() == "publisher.reports.performance-by-transactions.list"
                || request()->route()->getName() == "publisher.reports.performance-by-clicks.list"
                || request()->route()->getName() == "publisher.creatives.coupons.list"
                || request()->route()->getName() == "publisher.creatives.text-links.list"
            )
            <li class="ms-2">
                <div class="paging-option">

                    @if(request()->route()->getName() == "publisher.find-advertisers" || request()->route()->getName() == "publisher.own-advertisers")
                        @php
                            $limit = \App\Helper\Static\Vars::DEFAULT_PUBLISHER_ADVERTISER_PAGINATION;
                            if (session()->has('publisher_advertiser_limit')) {
                                $limit = session()->get('publisher_advertiser_limit');
                            }
                        @endphp

                    @elseif(request()->route()->getName() == "publisher.reports.transactions.list")
                        @php
                            $limit = \App\Helper\Static\Vars::DEFAULT_PUBLISHER_TRANSACTION_PAGINATION;
                            if (session()->has('publisher_transaction_limit')) {
                                $limit = session()->get('publisher_transaction_limit');
                            }
                        @endphp

                    @elseif(request()->route()->getName() == "publisher.reports.performance-by-transactions.list")
                        @php
                            $limit = \App\Helper\Static\Vars::DEFAULT_PUBLISHER_EARNING_PERFORMANCE_PAGINATION;
                            if (session()->has('publisher_earning_performance_limit')) {
                                $limit = session()->get('publisher_earning_performance_limit');
                            }
                        @endphp

                    @elseif(request()->route()->getName() == "publisher.reports.performance-by-clicks.list")
                        @php
                            $limit = \App\Helper\Static\Vars::DEFAULT_PUBLISHER_EARNING_PERFORMANCE_PAGINATION;
                            if (session()->has('publisher_click_performance_limit')) {
                                $limit = session()->get('publisher_click_performance_limit');
                            }
                        @endphp

                    @elseif(request()->route()->getName() == "publisher.creatives.coupons.list")
                        @php
                            $limit = \App\Helper\Static\Vars::DEFAULT_PUBLISHER_COUPON_PAGINATION;
                            if (session()->has('publisher_coupon_limit')) {
                                $limit = session()->get('publisher_coupon_limit');
                            }
                        @endphp

                    @elseif(request()->route()->getName() == "publisher.creatives.text-links.list")
                        @php
                            $limit = \App\Helper\Static\Vars::DEFAULT_PUBLISHER_COUPON_PAGINATION;
                            if (session()->has('publisher_text_link_limit')) {
                                $limit = session()->get('publisher_text_link_limit');
                            }
                        @endphp
                    @endif

                    <select name="limit" id="limit" class="form-select form-select-sm page-selection" style="width:auto;">
                        <option value="10" @selected($limit == 10)>10/page</option>
                        <option value="20" @selected($limit == 20)>20/page</option>
                        <option value="40" @selected($limit == 40)>40/page</option>
                        <option value="60" @selected($limit == 60)>60/page</option>
                    </select>

                </div>
            </li>
        @endif

    </ul>
</nav>