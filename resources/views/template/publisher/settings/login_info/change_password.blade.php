@include("partial.admin.alert")
<form action="{{ route("publisher.changes.password-update") }}" method="POST" id="changePasswordForm" enctype="multipart/form-data">
    @csrf
    @method("PATCH")
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="current_password" class="font-weight-bold text-black font-size14">Current Password<span class="text-danger">*</span></label>
                <input type="password" class="form-control" id="current_password" name="current_password" placeholder="">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="password" class="font-weight-bold text-black font-size14">New password<span class="text-danger">*</span></label>
                <input type="password" class="form-control" id="password" name="password" placeholder="">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="password_confirmation" class="font-weight-bold text-black font-size14">Confirm New Password<span class="text-danger">*</span></label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn text-white btn-primary btn-sm btn-default btn-squared text-capitalize">Update</button>
        </div>
    </div>
</form>
