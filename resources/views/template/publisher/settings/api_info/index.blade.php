<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="api_token" class="font-weight-bold text-black font-size14">API Token <small>(This will be used for API documentation.)</small></label>
            <input type="text" class="form-control @error('api_token') border-danger @enderror" id="api_token" name="api_token" placeholder="" value="{{ auth()->user()->api_token }}">
        </div>
    </div>
    <div class="col-md-6">
        <a href="javascript:void(0)" onclick="clickToCopy()" id="copyToken" class="mt-4 btn btn-sm btn-outline-info float-left mr-3">Copy</a>
        <a href="javascript:void(0)" onclick="regenerateTokenRequest()" class="mt-4 btn btn-sm btn-outline-danger float-left  mr-3">Regenerate Token</a>
        <a href="{{ env("DOC_APP_URL") . "/api/documentation" }}" class="mt-4 btn btn-sm btn-outline-warning float-left" target="_blank">View Documentation</a>
    </div>
    <div class="clearfix"></div>
</div>
