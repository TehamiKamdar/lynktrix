@extends("auth.advertiser_register.base")

@section("step_form_content")

    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-12 col-sm-12">
            <div class="card checkout-shipping-form px-30 pt-2 pb-30 border-color" style="margin-top: 40px;">
                <div class="card-header border-bottom-0 pb-sm-0 pb-1 px-0">
                    <h4 class="fw-500">2. Advertiser Business Info</h4>
                </div>
                <div class="card-body p-0">
                    <div class="edit-profile__body">
                        <form id="stepTwo" action="javascript:void(0)">
                            <div class="form-group">
                                <label for="brand_name" class="font-weight-bold text-black">Brand Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="brand_name" name="brand_name" placeholder="Enter Brand Name" value="{{ $stepOne['brand_name'] ?? null }}" />
                            </div>

                            <div class="form-group">
                                <label for="company_name" class="font-weight-bold text-black">Full Company Legal Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter Company Legal Name" value="{{ $stepOne['company_name'] ?? null }}" />
                            </div>

                            <div class="form-group">
                                <label for="website_url" class="font-weight-bold text-black">Website<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="website_url" name="website_url" placeholder="Enter Website (w/ https://)" value="{{ $stepOne['website_url'] ?? null }}" />
                            </div>

                            <div class="form-group">
                                <label for="phone_number" class="font-weight-bold text-black">Phone Number<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Enter Contact Phone Number" value="{{ $stepOne['phone_number'] ?? null }}" />
                            </div>


                            <div class="form-group">
                                <label for="country" class="font-weight-bold text-black">Country<span class="text-danger">*</span></label>
                                <select class="js-example-basic-single js-states form-control" id="country" name="country">
                                    <option value="" disabled selected>Please Select</option>
                                    @foreach($countries as $country)
                                        <option {{ isset($stepOne['country']) && $stepOne['country'] == $country['id'] ? "selected" : null }}  value="{{ $country['id'] }}">{{ ucwords($country['name']) }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="state" class="font-weight-bold text-black">State<span class="text-danger">*</span></label>
                                        <select class="js-example-basic-single js-states form-control" id="state" name="state">
                                            <option value="" disabled selected>First Select Country</option>
                                            @foreach($states as $state)
                                                <option {{ isset($stepOne['state']) && $stepOne['state'] == $state['id'] ? "selected" : null }}  value="{{ $state['id'] }}">{{ ucwords($state['name']) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="city" class="font-weight-bold text-black">City</label>
                                        <select class="js-example-basic-single js-states form-control" id="city" name="city">
                                            <option value="" disabled selected>First Select State</option>
                                            @foreach($cities as $city)
                                                <option {{ isset($stepTwo['city']) && $stepTwo['city'] == $city['id'] ? "selected" : null }}  value="{{ $city['id'] }}">{{ ucwords($city['name']) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="address" class="font-weight-bold text-black">Address<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" value="{{ $stepOne['address'] ?? null }}" />
                            </div>

                            <div class="edit-profile__body m-0">
                                <div class="custom-control checkbox-theme-default custom-checkbox pl-0">
                                    <input type="checkbox" class="checkbox" id="agree" name="agree" />
                                    <label for="agree">I Agree with the
                                        <a href="https://www.linkscircle.com/terms">Terms and Conditions</a>.</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="terms" name="terms" hidden />
                            </div>

                            <div class="button-group d-flex pt-3 justify-content-between flex-wrap">
                                <a href="javascript:void(0)" onclick="stepFormShow(1)" class="btn btn-light btn-default btn-squared fw-400 text-capitalize m-1"><i class="las la-arrow-left mr-10"></i>Previous</a>
                                <button type="submit" id="saveTwoStep" class="btn text-white btn-primary btn-default btn-squared text-capitalize m-1">Save &amp; Next<i class="ml-10 mr-0 las la-arrow-right"></i></button>
                            </div>
                        </form>
                    </div>
                </div>

            </div><!-- ends: .card -->

        </div><!-- ends: .col -->

    </div>

@endsection
