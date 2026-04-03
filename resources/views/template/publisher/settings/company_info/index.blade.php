@include("partial.admin.alert")
<form action="{{ route("publisher.profile.company.update") }}" method="POST" id="companyForm" enctype="multipart/form-data">
    @csrf
    @method("PATCH")

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="company_name" class="font-weight-bold text-black font-size14">Company Name<span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('company_name') border-danger @enderror" id="company_name" name="company_name" placeholder="" value="{{ $company->company_name ?? null }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="legal_entity_type" class="font-weight-bold text-black font-size14">Legal Entity Type<span class="text-danger">*</span></label>
                <select class="js-example-basic-single js-states form-control @error('legal_entity_type') border-danger @enderror" id="legal_entity_type" name="legal_entity_type">
                    <option value="" disabled selected>Please Select</option>
                    @foreach(\App\Models\Publisher::getLegalEntity() as $entity)
                        <option {{ isset($company->legal_entity_type) && $company->legal_entity_type == $entity['value'] ? "selected" : null }} value="{{ $entity['value'] }}">
                            {{ $entity['name'] }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="countryOption">
                    <label for="location_country" class="font-weight-bold text-black font-size14">Country / Region<span class="text-danger">*</span></label>
                    <select class="js-example-basic-single js-states form-control @error('location_country') border-danger @enderror" id="location_country" name="country">
                        <option value="" disabled selected>Please Select</option>
                        @foreach($countries as $country)
                            <option {{ isset($company->country) && $company->country == $country['id'] ? "selected" : null }}  value="{{ $country['id'] }}">{{ ucwords($country['name']) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="location_state" class="font-weight-bold text-black font-size14">State<span class="text-danger">*</span></label>
                <select class="js-example-basic-single js-states form-control @error('location_state') border-danger @enderror" id="location_state" name="state">
                    <option value="" disabled selected>First Select Country / Region</option>
                    @foreach($states as $state)
                        <option {{ isset($company->state) && $company->state == $state['id'] ? "selected" : null }}  value="{{ $state['id'] }}">{{ ucwords($state['name']) }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="location_city" class="font-weight-bold text-black font-size14">City</label>
                <select class="js-example-basic-single js-states form-control @error('location_city') border-danger @enderror" id="location_city" name="city">
                    <option value="" disabled selected>First Select State</option>
                    @foreach($cities as $city)
                        <option {{ isset($company->city) && $company->city == $city['id'] ? "selected" : null }}  value="{{ $city['id'] }}">{{ ucwords($city['name']) }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="zip_code" class="font-weight-bold text-black font-size14">Zip Code<span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('zip_code') border-danger @enderror" id="zip_code" name="zip_code" placeholder="" value="{{ $company->zip_code ?? null }}">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="address" class="font-weight-bold text-black font-size14">Address Line 1<span class="text-danger">*</span></label>
                <textarea class="form-control @error('address') border-danger @enderror" id="address" name="address" rows="3" placeholder="Please write a brief introduction to help us and the brand get to know you quickly.">{{ $company->address }}</textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="address_2" class="font-weight-bold text-black font-size14">Address Line 2</label>
                <textarea class="form-control @error('address_2') border-danger @enderror" id="address_2" name="address_2" rows="3" placeholder="Please write a brief introduction to help us and the brand get to know you quickly.">{{ $company->address_2 }}</textarea>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <button type="submit" class="btn btn-sm text-white btn-primary btn-default btn-squared text-capitalize m-1">Update</button>
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
