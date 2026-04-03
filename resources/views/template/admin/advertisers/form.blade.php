<div class="row">
    <div class="col-lg-6">
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <label for="name" class="font-weight-bold text-black">{{ trans('advertiser.api-advertiser.fields.name') }}</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $data->name ?? '') }}">
            @if($errors->has('name'))
                <em class="invalid-feedback">
                    {{ $errors->first('name') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('advertiser.api-advertiser.fields.name_helper') }}
            </p>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group {{ $errors->has('url') ? 'has-error' : '' }}">
            <label for="url" class="font-weight-bold text-black">{{ trans('advertiser.api-advertiser.fields.url') }}</label>
            <input type="url" id="url" name="url" class="form-control" value="{{ old('url', $data->url ?? '') }}">
            @if($errors->has('url'))
                <em class="invalid-feedback">
                    {{ $errors->first('url') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('advertiser.api-advertiser.fields.url_helper') }}
            </p>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="form-group {{ $errors->has('advertiser_id') ? 'has-error' : '' }}">
            <label for="advertiser_id" class="font-weight-bold text-black">{{ trans('advertiser.api-advertiser.fields.advertiser_id') }}</label>
            <input type="text" id="advertiser_id" name="advertiser_id" class="form-control" value="{{ old('url', $data->advertiser_id ?? '') }}">
            @if($errors->has('advertiser_idv'))
                <em class="invalid-feedback">
                    {{ $errors->first('advertiser_id') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('advertiser.api-advertiser.fields.url_helper') }}
            </p>
        </div>
    </div>
    
    <div class="col-lg-6">
        <div class="form-group {{ $errors->has('source') ? 'has-error' : '' }}">
            <label for="source" class="font-weight-bold text-black">{{ trans('advertiser.api-advertiser.fields.source') }}</label>
            <input type="source" id="source" name="source" class="form-control" value="{{ old('url', $data->source ?? '') }}">
            @if($errors->has('source'))
                <em class="invalid-feedback">
                    {{ $errors->first('source') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('advertiser.api-advertiser.fields.url_helper') }}
            </p>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
            <label for="status" class="font-weight-bold text-black">{{ trans('advertiser.api-advertiser.fields.status') }}</label>
            <select class="js-example-basic-single js-states form-control" id="status" name="status">
                <option value="" disabled selected>Please Select</option>
                <option {{ isset($data->is_active) && $data->is_active == 1 ? "selected" : null }}  value="1">Active</option>
                <option {{ isset($data->is_active) && $data->is_active == 0 ? "selected" : null }}  value="0">InActive</option>
            </select>
            @if($errors->has('status'))
                <em class="invalid-feedback">
                    {{ $errors->first('status') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('advertiser.api-advertiser.fields.deeplink_enabled_helper') }}
            </p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="form-group {{ $errors->has('primary_region') ? 'has-error' : '' }}">
            <label for="primary_region" class="font-weight-bold text-black">{{ trans('advertiser.api-advertiser.fields.primary_region') }}</label>
            <select class="js-example-basic-single js-states form-control" id="primary_region" name="primary_region">
                <option value="" disabled selected>Please Select</option>
                @foreach($countries as $country)
                    <option {{ in_array($country['iso2'], $data->primary_regions ?? []) ? "selected" : null }}  value="{{ $country['iso2'] }}">{{ $country['name'] }}</option>
                @endforeach
            </select>
            @if($errors->has('primary_region'))
                <em class="invalid-feedback">
                    {{ $errors->first('primary_region') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('advertiser.api-advertiser.fields.primary_region_helper') }}
            </p>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group {{ $errors->has('currency_code') ? 'has-error' : '' }}">
            <label for="currency_code" class="font-weight-bold text-black">{{ trans('advertiser.api-advertiser.fields.currency_code') }}</label>
            <select class="js-example-basic-single js-states form-control" id="currency_code" name="currency_code">
                <option value="" disabled selected>Please Select</option>
                @foreach($countries as $country)
                    @if($country['currency'])
                        <option {{ $country['currency'] == $data->currency_code ?? '' ? "selected" : null }}  value="{{ $country['currency'] }}">{{ $country['currency'] }}</option>
                    @endif
                @endforeach
            </select>
            @if($errors->has('currency_code'))
                <em class="invalid-feedback">
                    {{ $errors->first('currency_code') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('advertiser.api-advertiser.fields.currency_code_helper') }}
            </p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="form-group {{ $errors->has('average_payment_time') ? 'has-error' : '' }}">
            <label for="average_payment_time" class="font-weight-bold text-black">{{ trans('advertiser.api-advertiser.fields.average_payment_time') }}</label>
            <input type="text" id="average_payment_time" name="average_payment_time" class="form-control" value="{{ old('average_payment_time', $data->average_payment_time ?? '') }}">
            @if($errors->has('average_payment_time'))
                <em class="invalid-feedback">
                    {{ $errors->first('average_payment_time') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('advertiser.api-advertiser.fields.average_payment_time_helper') }}
            </p>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group {{ $errors->has('validation_days') ? 'has-error' : '' }}">
            <label for="validation_days" class="font-weight-bold text-black">{{ trans('advertiser.api-advertiser.fields.validation_days') }}</label>
            <input type="text" id="validation_days" name="validation_days" class="form-control" value="{{ old('validation_days', $data->validation_days ?? '') }}">
            @if($errors->has('validation_days'))
                <em class="invalid-feedback">
                    {{ $errors->first('validation_days') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('advertiser.api-advertiser.fields.validation_days_helper') }}
            </p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="form-group {{ $errors->has('epc') ? 'has-error' : '' }}">
            <label for="epc" class="font-weight-bold text-black">{{ trans('advertiser.api-advertiser.fields.epc') }}</label>
            <input type="text" id="epc" name="epc" class="form-control" value="{{ old('epc', $data->epc ?? '') }}" >
            @if($errors->has('epc'))
                <em class="invalid-feedback">
                    {{ $errors->first('epc') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('advertiser.api-advertiser.fields.epc_helper') }}
            </p>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group {{ $errors->has('deeplink_enabled') ? 'has-error' : '' }}">
            <label for="deeplink_enabled" class="font-weight-bold text-black">{{ trans('advertiser.api-advertiser.fields.deeplink_enabled') }}</label>
            <select class="js-example-basic-single js-states form-control" id="deeplink_enabled" name="deeplink_enabled" >
                <option value="" disabled selected>Please Select</option>
                <option {{ isset($data->deeplink_enabled) && $data->deeplink_enabled == 1 ? "selected" : null }}  value="1">True</option>
                <option {{ isset($data->deeplink_enabled) && $data->deeplink_enabled == 0 ? "selected" : null }}  value="0">False</option>
            </select>
            @if($errors->has('deeplink_enabled'))
                <em class="invalid-feedback">
                    {{ $errors->first('deeplink_enabled') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('advertiser.api-advertiser.fields.deeplink_enabled_helper') }}
            </p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="form-group {{ $errors->has('supported_regions') ? 'has-error' : '' }}">
            <label for="supported_regions" class="font-weight-bold text-black">{{ trans('advertiser.api-advertiser.fields.supported_regions') }}</label>
            <div class="atbd-select ">
                <select name="supported_regions[]" id="supported_regions" class="form-control " multiple="multiple">
                    @foreach($countries as $country)
                        <option value="{{ $country['iso2'] }}" {{ isset($data->supported_regions) && in_array($country['iso2'], $data->supported_regions) ? "selected" : null }}>{{ $country['name'] }}</option>
                    @endforeach
                </select>
            </div>
            @if($errors->has('supported_regions'))
                <em class="invalid-feedback">
                    {{ $errors->first('supported_regions') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('advertiser.api-advertiser.fields.supported_regions_helper') }}
            </p>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group {{ $errors->has('categories') ? 'has-error' : '' }}">
            <label for="categories" class="font-weight-bold text-black">{{ trans('advertiser.api-advertiser.fields.categories') }} (Max. 4)</label>
            <div class="atbd-select ">
                <select name="categories[]" id="categories" class="form-control " multiple="multiple" {{ \App\Helper\Advertiser\Base::getFormFieldReadOnly($data->source, "categories") ? "disabled" : "" }}>
                    @foreach($categories as $category)
                        <option {{ isset($data->categories) && in_array($category['id'], $data->categories) ? "selected" : null }} value="{{ $category['id'] }}">
                            {{ $category['name'] }}</option>
                    @endforeach
                </select>
            </div>
            @if($errors->has('categories'))
                <em class="invalid-feedback">
                    {{ $errors->first('categories') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('advertiser.api-advertiser.fields.categories_helper') }}
            </p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="form-group {{ $errors->has('promotional_methods') ? 'has-error' : '' }}">
            <label for="promotional_methods" class="font-weight-bold text-black">{{ trans('advertiser.api-advertiser.fields.promotional_methods') }}</label>
            <div class="atbd-select ">
                <select name="promotional_methods[]" id="promotional_methods" class="form-control " multiple="multiple">
                    @foreach($methods as $method)
                        <option {{ isset($data->promotional_methods) && in_array($method['id'], $data->promotional_methods) ? "selected" : null }} value="{{ $method['id'] }}">
                            {{ $method['name'] }}</option>
                    @endforeach
                </select>
            </div>
            @if($errors->has('promotional_methods'))
                <em class="invalid-feedback">
                    {{ $errors->first('promotional_methods') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('advertiser.api-advertiser.fields.promotional_methods_helper') }}
            </p>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group {{ $errors->has('program_restrictions') ? 'has-error' : '' }}">
            <label for="program_restrictions" class="font-weight-bold text-black">{{ trans('advertiser.api-advertiser.fields.program_restrictions') }}</label>
            <div class="atbd-select ">
                <select name="program_restrictions[]" id="program_restrictions" class="form-control " multiple="multiple">
                    @foreach($methods as $method)
                        <option value="{{ $method['id'] }}" {{ isset($data->program_restrictions) && in_array($method['id'], $data->program_restrictions) ? "selected" : null }}>
                            {{ $method['name'] }}</option>
                    @endforeach
                </select>
            </div>
            @if($errors->has('program_restrictions'))
                <em class="invalid-feedback">
                    {{ $errors->first('program_restrictions') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('advertiser.api-advertiser.fields.program_restrictions_helper') }}
            </p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="form-group {{ $errors->has('tags') ? 'has-error' : '' }}">
            <label for="tags" class="font-weight-bold text-black">{{ trans('advertiser.api-advertiser.fields.tags') }}</label>
            <div class="atbd-select ">
                <input type="text" name="tags" data-role="tagsinput" value="@if($data->tags){{ $data->tags }}@endif">
            </div>
            @if($errors->has('tags'))
                <em class="invalid-feedback">
                    {{ $errors->first('tags') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('advertiser.api-advertiser.fields.tags_helper') }}
            </p>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group {{ $errors->has('offer_type') ? 'has-error' : '' }}">
            <label for="offer_type" class="font-weight-bold text-black">{{ trans('advertiser.api-advertiser.fields.offer_type') }}</label>
            <input type="text" id="offer_type" name="offer_type" class="form-control" value="{{ old('offer_type', $data->offer_type ?? '') }}">
            @if($errors->has('offer_type'))
                <em class="invalid-feedback">
                    {{ $errors->first('offer_type') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('advertiser.api-advertiser.fields.offer_type_helper') }}
            </p>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="form-group {{ $errors->has('commission') ? 'has-error' : '' }}">
            <label for="offer_type" class="font-weight-bold text-black">{{ trans('advertiser.api-advertiser.fields.commission') }}</label>
            <input type="text" id="commission" name="commission" class="form-control" value="{{ old('commission', $data->commission ?? '') }}">
            @if($errors->has('commission'))
                <em class="invalid-feedback">
                    {{ $errors->first('commission') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('advertiser.api-advertiser.fields.commission_helper') }}
            </p>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="form-group {{ $errors->has('commission_type') ? 'has-error' : '' }}">
            <label for="offer_type" class="font-weight-bold text-black">{{ trans('advertiser.api-advertiser.fields.commission_type') }}</label>
            <input type="text" id="commission_type" name="commission_type" class="form-control" value="{{ old('commission_type', $data->commission_type ?? '') }}">
            @if($errors->has('commission_type'))
                <em class="invalid-feedback">
                    {{ $errors->first('commission_type') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('advertiser.api-advertiser.fields.commission_type_helper') }}
            </p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <td colspan="6">
                        <label class="p-0 m-0 font-weight-bold text-black">Commission Table</label>
                        <a href="javascript:void(0)" onclick="addMoreCommission({{ $api_advertiser->commissions->count() }})" id="commissionBtn" class="btn btn-xs btn-success float-right">
                            Add More
                        </a>
                    </td>
                </tr>
                <tr>
                    <th>Date</th>
                    <th>Condition</th>
                    <th>Rate</th>
                    <th>Type</th>
                    <th>Info</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="commissionContent">
                @if(count($api_advertiser->commissions ?? []))
                    @foreach($api_advertiser->commissions as $key => $commission)
                        <input type="hidden" id="commission-id-{{ $key }}" name="commissions[{{ $key }}][commission_id]" value="{{ $commission->id ?? '' }}">
                        <tr id="commission-{{$key}}">
                            <td class="input-group-sm">
                                <input type="date" name="commissions[{{ $key }}][date]" class="form-control" value="{{ $commission->date ?? '' }}" min="1990-01-01" max="{{ now()->format("Y-m-d") }}">
                            </td>
                            <td class="input-group-sm">
                                <input type="text" name="commissions[{{ $key }}][condition]" class="form-control" value="{{ $commission->condition ?? '' }}">
                            </td>
                            <td class="input-group-sm">
                                <input type="text" name="commissions[{{ $key }}][rate]" class="form-control" value="{{ $commission->rate ?? '' }}">
                            </td>
                            <td class="input-group-sm">
                                <input type="text" name="commissions[{{ $key }}][type]" class="form-control" value="{{ $commission->type ?? '' }}">
                            </td>
                            <td class="input-group-sm">
                                <input type="text" name="commissions[{{ $key }}][info]" class="form-control" value="{{ $commission->info ?? '' }}">
                            </td>
                            <td class="text-center">
                                @if(isset($commission->created_by) && ($commission->created_by == \App\Helper\Static\Vars::DEFAULT_GENERATED || $commission->created_by == \App\Helper\Static\Vars::CRON_JOB_CREATED))
                                    -
                                @else
                                    <a href="javascript:void(0)" onclick="removeCommission({{$key}})" class="text-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6" class="text-center">
                            <small>No Commission Exist</small>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

<div class="row mt-4">
    <div class="col-lg-12">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <td colspan="2">
                        <label class="p-0 m-0 font-weight-bold text-black">Validation Domains Table</label>
                        <a href="javascript:void(0)" onclick="addMoreValidation({{ count($api_advertiser->valid_domains ?? []) }})" id="validationBtn" class="btn btn-xs btn-success float-right">
                            Add More
                        </a>
                    </td>
                </tr>
                <tr>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="validationDomainContent">
                @if(count($api_advertiser->validation_domains ?? []))
                    @foreach($api_advertiser->validation_domains as $key => $domain)
                        <tr id="validation-domains-{{$key}}">
                            <td class="input-group-sm">
                                <input type="hidden" id="validation-domains-id-{{$key}}" value="{{ $domain['id'] }}">
                                <input type="text" name="validations[{{ $key }}][domain]" @if(isset($domain['created_by']) && $domain['created_by'] == \App\Helper\Static\Vars::CRON_JOB_CREATED) disabled @endif class="form-control" value="{{ $domain['name'] ?? '' }}">
                            </td>
                            <td class="text-center">
                                @if(isset($domain['created_by']) && $domain['created_by'] == \App\Helper\Static\Vars::CRON_JOB_CREATED)
                                    -
                                @else
                                    <a href="javascript:void(0)" onclick="removeValidation({{$key}})" class="text-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="2" class="text-center">
                            <small>No Validation Domains Exist</small>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

<div class="row mt-4">
    <div class="col-lg-12">
        <div class="form-group {{ $errors->has('click_through_url') ? 'has-error' : '' }}">
            <label for="click_through_url" class="font-weight-bold text-black">{{ trans('advertiser.api-advertiser.fields.click_through_url') }}</label>
            <input type="url" id="click_through_url" name="click_through_url" class="form-control" value="{{ old('click_through_url', $data->click_through_url ?? '') }}" {{ \App\Helper\Advertiser\Base::getFormFieldReadOnly($data->source, "click_through_url") ? "disabled" : "" }}>
            @if($errors->has('click_through_url'))
                <em class="invalid-feedback">
                    {{ $errors->first('click_through_url') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('advertiser.api-advertiser.fields.click_through_url_helper') }}
            </p>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-lg-12">
        <div class="form-group {{ $errors->has('custom_domain') ? 'has-error' : '' }}">
            <label for="custom_domain" class="font-weight-bold text-black">{{ trans('advertiser.api-advertiser.fields.custom_domain') }}</label>
            <input type="text" id="custom_domain" name="custom_domain" class="form-control" value="{{ old('custom_domain', $data->custom_domain ?? '') }}">
            @if($errors->has('custom_domain'))
                <em class="invalid-feedback">
                    {{ $errors->first('custom_domain') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('advertiser.api-advertiser.fields.custom_domain_helper') }}
            </p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="form-group {{ $errors->has('logo') ? 'has-error' : '' }}">
            <label for="logo" class="font-weight-bold text-black">{{ trans('advertiser.api-advertiser.fields.logo') }}</label>
            <input class="form-control" type="file" name="logo" id="logo">
            @if($errors->has('logo'))
                <em class="invalid-feedback">
                    {{ $errors->first('logo') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('advertiser.api-advertiser.fields.logo_helper') }}
            </p>
            <label for="logo_preview" class="font-weight-bold text-black">{{ trans('advertiser.api-advertiser.fields.logo_preview') }}</label><br />
            <img class="img-thumbnail" src="{{ isset($data->logo) && str_contains($data->logo, "http") ? $data->logo : \App\Helper\Static\Methods::staticAsset($data->logo) }}" alt="">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="form-group {{ $errors->has('program_policies') ? 'has-error' : '' }}">
            <label for="program_policies" class="font-weight-bold text-black">{{ trans('advertiser.api-advertiser.fields.program_policies') }}</label>
            <textarea name="program_policies" id="program_policies" cols="30" rows="10" class="form-control">{{ $data->program_policies ?? null }}</textarea>
            @if($errors->has('program_policies'))
                <em class="invalid-feedback">
                    {{ $errors->first('program_policies') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('advertiser.api-advertiser.fields.program_policies_helper') }}
            </p>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-lg-12">
        <div class="form-group {{ $errors->has('short_description') ? 'has-error' : '' }}">
            <label for="short_description" class="font-weight-bold text-black">{{ trans('advertiser.api-advertiser.fields.short_description') }}</label>
            <textarea name="short_description" id="short_description" cols="30" rows="10" class="form-control">{{ $data->short_description ?? null }}</textarea>
            @if($errors->has('short_description'))
                <em class="invalid-feedback">
                    {{ $errors->first('short_description') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('advertiser.api-advertiser.fields.short_description_helper') }}
            </p>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-lg-12">
        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
            <label for="description" class="font-weight-bold text-black">{{ trans('advertiser.api-advertiser.fields.description') }}</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $data->description ?? null }}</textarea>
            @if($errors->has('description'))
                <em class="invalid-feedback">
                    {{ $errors->first('description') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('advertiser.api-advertiser.fields.description_helper') }}
            </p>
        </div>
    </div>
</div>

<div>
    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
</div>
