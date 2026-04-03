@extends("layouts.publisher.publisher_panel")

@pushonce('styles')

@endpushonce

@pushonce('scripts')
    <script>
        function clickToCopy()
        {
            copyToClipboard(document.getElementById("api_token"))
            normalMsg({"message": "API Token Successfully Copied.", "success": true});
        }
        function regenerateTokenRequest()
        {
            $.ajax({
                url: '{{ route("publisher.tools.api-info.regenerate-token") }}',
                type: 'POST',
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                success: function (response) {
                    $("#api_token").val(response.token);
                },
                error: function (response) {
                    showErrors(response);
                }
            });
        }
    </script>
@endpushonce

@section("content")

    <div class="contents">

        <div class="container">

            <div class="card m-bottom-50 m-top-50">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-xxl-6 col-lg-6 col-sm-12">
                            <div class="files-area d-flex justify-content-between align-items-center">
                                <div class="files-area__left d-flex align-items-center">
                                    <div class="files-area__title">
                                        <h3 class="mb-10 fw-500 color-dark text-capitalize">API Token <small>(This will be used for API documentation.)</small></h3>
                                        <input type="text" class="form-control @error('api_token') border-danger @enderror" id="api_token" name="api_token" placeholder="" value="{{ auth()->user()->api_token }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-6 col-lg-6 col-sm-12 m-top-40">
                            <a href="javascript:void(0)" onclick="clickToCopy()" id="copyToken" class="btn btn-sm btn-outline-info float-left mr-3">Copy</a>
                            <a href="javascript:void(0)" onclick="regenerateTokenRequest()" class="btn btn-sm btn-outline-danger float-left  mr-3">Regenerate Token</a>
                            <a href="{{ env("DOC_APP_URL") . "/api/documentation" }}" class="btn btn-sm btn-outline-warning float-left" target="_blank">View Documentation</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection
