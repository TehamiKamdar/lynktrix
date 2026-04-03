@if($advertisers)
    <!-- Title -->
    <div class="widget_title mb-20">
        <h6>{{ $heading }}</h6>
    </div>
    <!-- Title -->
    <!-- Body -->
    <div class="card border-0">
        <div class="product-brands">
            <ul>
                @php
                    $sources = str_contains(request()->source, ',') ? explode(",", request()->source) : [request()->source];
                @endphp
                @foreach($advertisers as $advertiser)
                    <li>
                        <div class="checkbox-theme-default custom-checkbox">
                            <input class="checkbox" type="checkbox" id="advertiserType{{ $advertiser['sid'] }}" onchange="advertiserType('{{ $advertiser['advertiser'] }}')" @if(in_array($advertiser['advertiser'], $sources) || empty(request()->source)) checked @endif>
                            <label for="advertiserType{{ $advertiser['sid'] }}">
                                <span class="checkbox-text">
                                    {{ $advertiser['advertiser'] }}
                                    <span class="item-numbers">{{ $advertiser['total_advertisers'] ?? "" }}</span>
                                </span>
                            </label>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- Body -->
@endif
