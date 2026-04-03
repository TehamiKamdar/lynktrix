@include("partial.admin.alert")
<form action="{{ route("publisher.profile.basic-information.update") }}" method="POST" id="settingForm" enctype="multipart/form-data">
    @csrf
    @method("PATCH")
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="first_name" class="font-weight-bold text-black font-size14">First Name<span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('first_name') border-danger @enderror" id="first_name" name="first_name" placeholder="First Name" value="{{ $user->first_name ?? null }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="last_name" class="font-weight-bold text-black font-size14">Last Name<span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('last_name') border-danger @enderror" id="last_name" name="last_name" placeholder="Last Name" value="{{ $user->last_name ?? null }}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="intro" class="font-weight-bold text-black font-size14">Bio<span class="text-danger">*</span></label>
                <small class="fs-10"><i>(Tell advertisers about yourself and what you’re looking for.)</i></small>
                <textarea class="form-control @error('intro') border-danger @enderror" id="intro" name="intro" rows="3" cols="100" placeholder="">{{ $publisher->intro }}</textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="language" class="font-weight-bold text-black font-size14">Language<span class="text-danger">*</span></label>
                <select name="language[]" id="language" class="form-control @error('language') border-danger @enderror" multiple>
                    @foreach($languages as $language)
                        <option value="{{ $language }}" @if(in_array($language, isset($publisher->language) && $publisher->language ? @json_decode($publisher->language, true) : [])) selected @endif>{{ $language }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="customer_reach" class="font-weight-bold text-black font-size14">Target Region<span class="text-danger">*</span></label>
                <select name="customer_reach[]" id="customer_reach" class="form-control @error('customer_reach') border-danger @enderror" multiple>
                    @foreach($countries as $country)
                        <option value="{{ $country['name'] }}" @if(in_array($country['name'], isset($publisher->customer_reach) && $publisher->customer_reach ? @json_decode($publisher->customer_reach, true) : [])) selected @endif>{{ $country['name'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="user_name" class="font-weight-bold text-black font-size14">User Name<span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('user_name') border-danger @enderror" id="user_name" name="user_name" placeholder="User Name" value="{{ $user->user_name ?? null }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="gender" class="font-weight-bold text-black font-size14">Gender<span class="text-danger">*</span></label>
                <select class="form-control @error('gender') border-danger @enderror" id="gender" name="gender">
                    <option value="" selected disabled>Please Select</option>
                    <option {{ $publisher->gender == "male" ? "selected" : null }} value="male">Male</option>
                    <option {{ $publisher->gender == "female" ? "selected" : null }} value="female">Female</option>
                    <option {{ $publisher->gender == "nonbinary" ? "selected" : null }} value="nonbinary">Nonbinary</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group form-group-calender">
                <label for="datepickerdob" class="fs-14 text-dark">Date of Birth<span class="text-danger">*</span></label>
                <div class="position-relative">
                    <input type="text" class="form-control @error('dob') border-danger @enderror" id="datepickerdob" name="dob" placeholder="{{ now()->format("F d, Y") }}" value="{{ $publisher->dob }}">
                    <a href="#"><span data-feather="calendar"></span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <div class="form-group">
                <label for="location_address_1" class="font-weight-bold text-black font-size14">Address<span class="text-danger">*</span></label>
                <input id="location_address_1" name="location_address_1" class="form-control @error('location_address_1') border-danger @enderror" type="text" value="{{ $publisher->location_address_1 }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="zip_code" class="font-weight-bold text-black font-size14">Zip Code<span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('zip_code') border-danger @enderror" id="zip_code" name="zip_code" placeholder="" value="{{ $publisher->zip_code }}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="location_country" class="font-weight-bold text-black font-size14">Country<span class="text-danger">*</span></label>
                <select class="form-control @error('location_country') border-danger @enderror" id="location_country" name="location_country">
                    <option value="" selected disabled>Please Select</option>
                    @foreach($countries as $country)
                        <option value="{{ $country['id'] }}" {{ $publisher->location_country == $country['id'] ? "selected" : null }}>{{ ucwords($country['name']) }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="location_state" class="font-weight-bold text-black font-size14">State<span class="text-danger">*</span></label>
                <select class="form-control @error('location_state') border-danger @enderror" id="location_state" name="location_state">
                    <option value="" selected disabled>Please Select Country</option>
                    @foreach($states as $state)
                        <option value="{{ $state['id'] }}" {{ $publisher->location_state == $state['id'] ? "selected" : null }}>{{ ucwords($state['name']) }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="location_city" class="font-weight-bold text-black font-size14">City</label>
                <select class="form-control @error('location_city') border-danger @enderror" id="location_city" name="location_city">
                    <option value="" selected disabled>Please Select State</option>
                    @foreach($cities as $city)
                        <option value="{{ $city['id'] }}" {{ $publisher->location_city == $city['id'] ? "selected" : null }}>{{ ucwords($city['name']) }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <label for="postal_code" class="font-weight-bold text-black font-size14">Media Kit</label>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="font-size14">Name</th>
                        <th class="font-size14">Size</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @if(count($mediakits) > 0)
                    @foreach($mediakits as $kit)
                        <tr>
                            <td>
                                <a href="{{ \App\Helper\Static\Methods::staticAsset($kit->image) }}" target="_blank">{{ $kit->name }}</a>
                            </td>
                            <td>
                                {{ $kit->size }} Kb
                            </td>
                            <td class="text-center">
                                <a href="{{ route("publisher.profile.basic-information.media-kits.delete", ["mediakit" => $kit->id]) }}">
                                    <span data-feather="trash-2"></span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3" class="text-center">
                            <div class="atbd-empty text-center">
                                <div class="atbd-empty__image">
                                    <img src="{{ \App\Helper\Static\Methods::staticAsset("img/folders/1.svg") }}" alt="Admin Empty">
                                </div>
                                <div class="atbd-empty__text">
                                    <p class="">No Data</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <input type="file" class="form-control" id="media_kit" name="mediakit_image" />
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
