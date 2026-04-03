@extends("layouts.publisher.publisher_panel")

@pushonce('styles')

@endpushonce

@pushonce('scripts')
@endpushonce

@section("content")

    @if(auth()->user()->status == "active")
        @include("template.publisher.dashboard.app")
    @else
        @include("template.publisher.dashboard.not_active")
    @endif

@endsection
