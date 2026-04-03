<div class=" checkout wizard10 global-shadow mb-30 bg-white radius-xl w-100">
    <div class="row justify-content-center">
        <div class="col-xl-12">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="checkout-progress-indicator border-0 p-0 radius-md mt-lg-30 p-xl-20 py-30 pl-30 pr-lg-0 pr-30">
                        <div class="checkout-progress3">
                            <div class="step current bg-lighter" id="1">
                                <span>STEP 1</span>
                                <span>Setup Your Account Basic Info</span>
                            </div>
                            <div class="step" id="2">
                                <span>STEP 2</span>
                                <span>Contact Information</span>
                            </div>
                            <div class="step" id="3">
                                <span>STEP 3</span>
                                <span>Company Information</span>
                            </div>
                            <div class="step" id="4">
                                <span>STEP 4</span>
                                <span>Website Information</span>
                            </div>
                        </div>
                    </div><!-- checkout -->
                </div>
                <div class="col-lg-6">
                    <div class="checkout-shipping-form pt-lg-50">
                        <div class="card p-0 radius-md border-0">
                            <div class="card-header border-bottom-0 align-content-start pb-sm-0 pb-3 px-0 mb-0 pt-0">
                                <h4 class="fw-500">Basic Info</h4>
                            </div>
                            <div class="card-body p-0">
                                <div class="edit-profile__body">
                                    <form action="{{ route("users.store") }}" method="POST"
                                          enctype="multipart/form-data" id="userForm">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="first_name">{{ trans('cruds.user.fields.first_name') }}</label>
                                                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name', isset($user) ? $user->first_name : '') }}" required />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="last_name">{{ trans('cruds.user.fields.last_name') }}</label>
                                                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', isset($user) ? $user->last_name : '') }}" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">{{ trans('cruds.user.fields.email') }}</label>
                                            <input type="text" class="form-control" id="email" name="email" value="{{ old('email', isset($user) ? $user->email : '') }}" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="username">{{ trans('cruds.user.fields.user_name') }}</label>
                                            <input type="text" class="form-control" id="username" name="username" value="{{ old('username', isset($user) ? $user->username : '') }}" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="password">{{ trans('cruds.user.fields.password') }}</label>
                                            <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="confirm_password">{{ trans('cruds.user.fields.confirm_password') }}</label>
                                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" value="{{ old('confirm_password') }}" required />
                                        </div>
                                        <div class="border-top mt-30">
                                            <div class="button-group d-flex pt-40 mb-20 justify-content-between flex-wrap">
                                                <a href="checkout-wizard10.html" class="btn btn-light btn-default btn-squared fw-400 text-capitalize m-1"><i class="las la-arrow-left mr-10"></i>Previous</a>
                                                <button class="btn text-white btn-primary btn-default btn-squared text-capitalize m-1">
                                                    Save
                                                    & Next <i class="ml-10 mr-0 las la-arrow-right"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div><!-- ends: card -->
                    </div>
                </div><!-- ends: col -->
            </div>
        </div><!-- ends: col -->
    </div>
</div><!-- End: .global-shadow-->
