@include("partial.admin.alert")
<form action="{{ route("publisher.changes.username-update") }}" method="POST" id="settingForm" enctype="multipart/form-data">
    @csrf
    @method("PATCH")
    {{--    <div class="row">--}}
    {{--        <div class="col-md-12">--}}
    {{--            <div class="form-group">--}}
    {{--                <label for="user_name" class="font-weight-bold text-black">User Name</label>--}}
    {{--                <input type="text" class="form-control" id="user_name" name="user_name" placeholder="User Name" value="{{ $user->user_name ?? null }}">--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <div class="row mb-4">
        <div class="col-md-6">
            <h6 class="mb-2">Payment Method</h6>
            <small>Select your preferred payment method. Linkscricle doesn't charge fees for payment, any fees are at tha discretion of the institution</small>
        </div>
        <div class="col-md-6">
            <h6 class="mb-2">Payment Schedule</h6>
            <small>You can schedule when you would like to reeeive your commission payments and at what thresolf your Approved commisions must reach before you at.</small>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="form-group">
                <label for="user_name" class="font-weight-bold text-black">Send commission payments to</label>
                <select class="form-control" id="year" name="year">
                    <option value="" selected disabled>Please Select</option>
                    <option value="">Paypal</option>
                    <option value="">Payoneer</option>
                    <option value="">Bank Wire</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="user_name" class="font-weight-bold text-black">Payment Frequency</label>
                <input type="text" class="form-control" id="user_name" name="user_name" placeholder="User Name" value="{{ $user->user_name ?? null }}">
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="form-group">
                <label for="user_name" class="font-weight-bold text-black">User Name</label>
                <input type="text" class="form-control" id="user_name" name="user_name" placeholder="User Name" value="{{ $user->user_name ?? null }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="user_name" class="font-weight-bold text-black">Payment Threshold</label>
                <input type="text" class="form-control" id="user_name" name="user_name" placeholder="User Name" value="{{ $user->user_name ?? null }}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn text-white btn-primary btn-sm btn-default btn-squared text-capitalize">Update</button>
        </div>
    </div>
</form>
<div class="loader-overlay display-hidden" id="showLoader">
    <div class="atbd-spin-dots spin-lg">
        <span class="spin-dot badge-dot dot-primary"></span>
        <span class="spin-dot badge-dot dot-primary"></span>
        <span class="spin-dot badge-dot dot-primary"></span>
        <span class="spin-dot badge-dot dot-primary"></span>
    </div>
</div>
