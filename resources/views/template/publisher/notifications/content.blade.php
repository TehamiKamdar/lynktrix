@php
    $dateArr = [];
@endphp

@if(count($notifications))
    @foreach($notifications as $notification)

        @php
            $date = \Carbon\Carbon::parse($notification->created_at)->format("F Y");
            $id = $notification->id;
        @endphp

        @if(!in_array($date, $dateArr))
            <h4 class="fw-500">{{ $date }}</h4>

            @php
                $dateArr[] = $date;
            @endphp

        @endif

        <!-- panel 1 -->
        <div class="panel panel-default shadow-lg">
            <div class="panel-heading" role="tab" id="heading{{ $id }}">
                <h4 class="panel-title">
                    <span class="category mb-0 fs-14 color-light fw-400">{{ $notification->type }}</span>
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $id }}" aria-expanded="false" aria-controls="collapse{{ $id }}">
                        {!! $notification->header !!}
                    </a>
                </h4>
            </div>
            <div id="collapse{{ $id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{ $id }}">
                <div class="panel-body">
                    {!! $notification->content !!}
                </div>
            </div>
        </div>

    @endforeach
@else

    <!-- Advertiser card -->
    <div class="col-xxl-12 col-lg-12 col-md-12 mb-10 px-10">
        <div class="card">
            <div class="card-body text-center">
                <h6>{{ ucwords(str_replace('-', ' ', request()->route()->parameter("category"))) }} Data Not Exist</h6>
            </div>
        </div>
    </div>

@endif

@if(count($notifications) && $notifications instanceof \Illuminate\Pagination\LengthAwarePaginator )
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-sm-end justify-content-star mt-1 mb-30">

                {{ $notifications->withQueryString()->links() }}

            </div>
        </div>
    </div>
@endif
