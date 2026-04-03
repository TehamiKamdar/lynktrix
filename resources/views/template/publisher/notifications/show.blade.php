@extends("layouts.publisher.publisher_panel")

@pushonce('styles')

    <style>
        .application-faqs .panel {
            margin-bottom: 25px !important;
        }
        .application-faqs .panel {
            background: #fff;
            margin: 10px 0;
        }
        .application-faqs .panel-title .title-foot {
            display: contents;
        }
        .application-faqs .panel-title .category {
            position: absolute;
            right: 30px;
            font-size: 13px;
            line-height: 20px;
            top: 10px;
        }
    </style>

@endpushonce

@pushonce('scripts')

@endpushonce

@section("content")

    <div class="contents">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="breadcrumb-main">
                        <h4 class="text-capitalize breadcrumb-title">Notification View</h4>
                        <div class="breadcrumb-action justify-content-center flex-wrap">

                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-sm-12">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <!-- Edit Profile -->
                            <div class="application-faqs">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    @php
                                        $date = \Carbon\Carbon::parse($notification->created_at)->format("F Y");
                                        $id = $notification->id;
                                    @endphp

                                        <!-- panel 1 -->
                                    <div class="panel panel-default shadow-lg">
                                        <div class="panel-heading" role="tab" id="heading{{ $id }}">
                                            <h4 class="panel-title">
                                                <span class="category mb-0 fs-14 color-light fw-400">{{ $notification->type }}</span>
                                                <a class="" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $id }}" aria-expanded="true" aria-controls="collapse{{ $id }}">
                                                    {!! $notification->header !!}
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse{{ $id }}" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="heading{{ $id }}">
                                            <div class="panel-body">
                                                {!! $notification->content !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Edit Profile End -->
                        </div>
                    </div>
                </div><!-- ends: col -->
            </div>
        </div>
    </div>

@endsection
