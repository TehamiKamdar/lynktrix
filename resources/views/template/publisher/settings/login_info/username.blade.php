@include("partial.admin.alert")
<form action="{{ route("publisher.changes.username-update") }}" method="POST" id="userNameUpdateForm" enctype="multipart/form-data">
    @csrf
    @method("PATCH")
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="user_name" class="font-weight-bold text-black font-size14">User Name<span class="text-danger">*</span></label>
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
