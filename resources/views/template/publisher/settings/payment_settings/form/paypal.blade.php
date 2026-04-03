<form action="{{ route("publisher.payments.payment-settings.update", ["type" => "paypal"]) }}" method="POST" id="settingForm" enctype="multipart/form-data">
    @csrf
    @method("PATCH")
    <div class="row mb-4">
        <div class="col-md-6">
            <h6 class="mb-2 font-weight-bold text-black font-size14">Payment Method</h6>
            <small>Select your preferred payment method. Linkscricle doesn't charge fees for payment, any fees are at tha discretion of the institution</small>
        </div>
        <div class="col-md-6">
            <h6 class="mb-2 font-weight-bold text-black font-size14">Payment Schedule</h6>
            <small>You can schedule when you would like to reeeive your commission payments and at what thresolf your Approved commisions must reach before you at.</small>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-md-6">
            <div class="form-group">
                <label for="name" class="font-weight-bold text-black font-size14">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ $user->name ?? null }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="user_name" class="font-weight-bold text-black font-size14">Country</label>
                <input type="text" class="form-control" id="user_name" name="user_name" placeholder="User Name" value="{{ $user->user_name ?? null }}">
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-md-6">
            <div class="form-group">
                <label for="user_name" class="font-weight-bold text-black font-size14">Paypal Address</label>
                <input type="text" class="form-control" id="user_name" name="user_name" placeholder="User Name" value="{{ $user->user_name ?? null }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="user_name" class="font-weight-bold text-black font-size14">Payment Frequency</label>
                <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Payment Frequency" value="{{ $payment->user_name ?? null }}">
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-md-6">
            <div class="form-group">
                <label for="user_name" class="font-weight-bold text-black font-size14">Paypal Username</label>
                <input type="text" class="form-control" id="user_name" name="user_name" placeholder="User Name" value="{{ $payment->user_name ?? null }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="user_name" class="font-weight-bold text-black font-size14">Payment Threshold</label>
                <input type="text" class="form-control" id="user_name" name="user_name" placeholder="User Name" value="{{ $user->user_name ?? null }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="user_name" class="font-weight-bold text-black font-size14">Tax ID</label>
                <input type="text" class="form-control" id="user_name" name="user_name" placeholder="User Name" value="{{ $user->user_name ?? null }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="user_name" class="font-weight-bold text-black font-size14">Tax Form</label>
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
