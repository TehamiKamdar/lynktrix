@extends("auth.publisher_register.base")

@section("step_form_content")

    <div class="card checkout-shipping-form border-0 bg-gray">
        <div class="card-body" data-select2-id="7">
            <div class="edit-profile__body" data-select2-id="6">
                <form id="stepTwo" action="javascript:void(0)">
                    <input type="hidden" id="dialCode" name="dialCode" value="{{ $stepTwo['dialCode'] ?? "+1" }}">
                            <div class="form-group">
                                <label for="company_name" class="font-weight-bold">Company Legal Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter company name (Legal)" value="{{ $stepTwo['company_name'] ?? null }}">
                            </div>
                            <div class="form-group">
                                <div class="countryOption">
                                    <label for="entity_type" class="font-weight-bold">Entity Type<span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single js-states form-control" id="entity_type" name="entity_type">
                                        <option value="" disabled selected>Please Select</option>
                                        @foreach(\App\Models\Publisher::getLegalEntity() as $entity)
                                            <option {{ isset($stepTwo['entity_type']) && $stepTwo['entity_type'] == $entity['value'] ? "selected" : null }} value="{{ $entity['value'] }}">
                                                {{ $entity['name'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="contact_name" class="font-weight-bold">Contact name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="contact_name" name="contact_name" placeholder="" value="{{ $stepTwo['contact_name'] ?? null }}">
                            </div>
                            <div class="form-group">
                                <label for="phone_number" class="font-weight-bold">phone number<span class="text-danger">*</span></label>
                                <input type="tel" class="form-control" id="phone_number" name="phone_number" placeholder="" value="{{ $stepTwo['phone_number'] ?? null }}">
                            </div>
                            <div class="form-group">
                                <div class="countryOption">
                                    <label for="country" class="font-weight-bold">Country / Region<span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single js-states form-control" id="country" name="country">
                                        <option value="" disabled selected>Please Select</option>
                                        @foreach($countries as $country)
                                            <option {{ isset($stepTwo['country']) && $stepTwo['country'] == $country['id'] ? "selected" : null }}  value="{{ $country['id'] }}">{{ ucwords($country['name']) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="state" class="font-weight-bold">State<span class="text-danger">*</span></label>
                                <select class="js-example-basic-single js-states form-control" id="state" name="state">
                                    <option value="" disabled selected>First Select Country / Region</option>
                                    @foreach($states as $state)
                                        <option {{ isset($stepTwo['state']) && $stepTwo['state'] == $state['id'] ? "selected" : null }}  value="{{ $state['id'] }}">{{ ucwords($state['name']) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="city" class="font-weight-bold">City</label>
                                <select class="js-example-basic-single js-states form-control" id="city" name="city">
                                    <option value="" disabled selected>First Select State</option>
                                    @foreach($cities as $city)
                                        <option {{ isset($stepTwo['city']) && $stepTwo['city'] == $city['id'] ? "selected" : null }}  value="{{ $city['id'] }}">{{ ucwords($city['name']) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="postal_code" class="font-weight-bold">Postal code<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="postal_code" name="postal_code" placeholder="" value="{{ $stepTwo['postal_code'] ?? null }}">
                            </div>
                    <div class="form-group">
                        <label for="address" class="font-weight-bold">Address<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Apartment, suite, unit etc." value="{{ $stepTwo['address'] ?? null }}">
                    </div>
                    <div class="button-group d-flex pt-3 mb-20 justify-content-between flex-wrap">
                        <a href="javascript:void(0)" onclick="stepFormShow(1)" class="btn btn-light btn-default btn-squared fw-400 text-capitalize m-1"><i class="las la-arrow-left mr-10"></i>Previous</a>
                        <button type="submit" id="saveTwoStep" class="btn text-white btn-primary btn-default btn-squared text-capitalize m-1">Save &amp; Next<i class="ml-10 mr-0 las la-arrow-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- ends: .card -->

@endsection
