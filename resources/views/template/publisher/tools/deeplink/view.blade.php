@extends("layouts.publisher.publisher_panel")

@pushonce('styles')

@endpushonce

@pushonce('scripts')

@endpushonce

@section("content")

    <div class="az-content az-content-dashboard">

        <div class="container-fluid">
            <div class="az-content-body">
                @php
                    $title = "Deep Link Generator";
                    $description = "Create a Link with our super fast deep link generator tool and promote any brand easily.";
                @endphp
                @include("template.publisher.widgets.deeplink")
            </div>
        </div>

    </div>

@endsection
