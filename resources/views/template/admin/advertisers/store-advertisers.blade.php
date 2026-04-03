@extends("layouts.admin.panel_app")

@pushonce('editor')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
@endpushonce

@pushonce('scripts')
    <!-- include summernote css/js -->
    <script src="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/jquery.validate.min.js") }}"></script>
    <script src="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/select2.full.min.js") }}"></script>
    <script src="{{ \App\Helper\Static\Methods::staticAsset("libs/tagsinput/tagsinput.js") }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
          
                $('#program_policies, #description, #short_description').summernote({
                    height: 300
                });
            

            // $("#advertiserForm").validate({
            //     rules: {
            //         "name": {
            //             required: true,
            //         },
            //         "primary_region": {
            //             required: true,
            //         },
            //         "currency_code": {
            //             required: true,
            //         },
            //         "url": {
            //             required: true,
            //             url: true
            //         },
            //         "click_through_url": {
            //             required: true,
            //             url: true
            //         },
            //         "tracking_url_short": {
            //             required: true,
            //             url: true
            //         },
            //         "average_payment_time": {
            //             required: true,
            //         },
            //         "validation_days": {
            //             required: true,
            //         },
            //         "epc": {
            //             required: true,
            //         },
            //         "deeplink_enabled": {
            //             required: true,
            //         },
            //         "supported_regions[]": {
            //             required: true,
            //         },
            //         "categories[]": {
            //             required: true,
            //         },
            //         "promotional_methods[]": {
            //             required: true,
            //         },
            //         "program_restrictions[]": {
            //             required: true,
            //         },
            //         "tags[]": {
            //             required: true,
            //         },
            //         "offer_type": {
            //             required: true,
            //         },
            //         "program_policies": {
            //             required: true,
            //         },
            //         "description": {
            //             required: true,
            //         },
            //     },
            //     highlight: function (element) { // hightlight error inputs
            //         $(element)
            //             .closest('.form-group').addClass('has-error');
            //     },
            //     unhighlight: function (element) { // un-hightlight error inputs
            //         $(element)
            //             .closest('.form-group').removeClass('has-error');
            //     },
            //     errorPlacement: function (error, element) {
            //         error.insertAfter(element.closest('.input-modal-group'));
            //     }
            // });
        });
    </script>
    <script type="text/javascript">
        function removeCommission(key) {
            let id = $(`#commission-id-${key}`).val();
            $("#commissionContent").append(`<input type="hidden" name="removeCommission[]" value="${id}" />`);
            $(`#commission-${key}`).remove();
        }
        function addMoreCommission(key) {
            $(`#commissionContent`).append(`
                <tr id="commission-${key}">
                    <input type="hidden" name="commissions[${key}][commission_id]" value="">
                    <td class="input-group-sm">
                        <input type="date" name="commissions[${key}][date]" class="form-control"  min="1990-01-01" max="{{ now()->format("Y-m-d") }}" value="">
                    </td>
                    <td class="input-group-sm">
                        <input type="text" name="commissions[${key}][condition]" class="form-control" value="">
                    </td>
                    <td class="input-group-sm">
                        <input type="text" name="commissions[${key}][rate]" class="form-control" value="">
                    </td>
                    <td class="input-group-sm">
                        <input type="text" name="commissions[${key}][type]" class="form-control" value="">
                    </td>
                    <td class="input-group-sm">
                        <input type="text" name="commissions[${key}][info]" class="form-control" value="">
                    </td>
                    <td class="text-center">
                        <a href="javascript:void(0)" onclick="removeCommission(${key})" class="text-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                        </a>
                    </td>
                </tr>
            `);

            $(`#commissionBtn`).removeAttr("onclick");
            $(`#commissionBtn`).attr("onclick", `addMoreCommission(${key+1})`);
        }
        function removeValidation(key) {
            let id = $(`#validation-domains-id-${key}`).val();
            $("#validationDomainContent").append(`<input type="hidden" name="removeValidation[]" value="${id}" />`);
            $(`#validation-domains-${key}`).remove();
        }
        function addMoreValidation(key) {
            $(`#validationDomainContent`).append(`
                <tr id="validation-domains-${key}">
                    <td class="input-group-sm">
                        <input type="text" name="validations[${key}][domain]" class="form-control" value="">
                    </td>
                    <td class="text-center">
                        <a href="javascript:void(0)" onclick="removeValidation(${key})" class="text-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                        </a>
                    </td>
                </tr>
            `);

            $(`#validationBtn`).removeAttr("onclick");
            $(`#validationBtn`).attr("onclick", `addMoreValidation(${key+1})`);
        }
        document.addEventListener("DOMContentLoaded", function () {

            $("#categories").select2({
                placeholder: "Please Select",
                dropdownCssClass: "tag",
                allowClear: true,
                maximumSelectionLength: 4
            });

            $("#promotional_methods").select2({
                placeholder: "Please Select",
                dropdownCssClass: "tag",
                allowClear: true,
                maximumSelectionLength: 4
            });

            $("#program_restrictions").select2({
                placeholder: "Please Select",
                dropdownCssClass: "tag",
                allowClear: true,
                maximumSelectionLength: 4
            });

            $("#supported_regions").select2({
                placeholder: "Please Select",
                dropdownCssClass: "tag",
                allowClear: true,
                maximumSelectionLength: 4
            });

        });
    </script>
@endpushonce

@pushonce('styles')

    <link rel="stylesheet" href="{{ \App\Helper\Static\Methods::staticAsset("libs/tagsinput/tagsinput.css") }}" />
    <link rel="stylesheet" href="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/css/select2.min.css") }}" />

    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            margin-bottom: 5px;
        }
        .table-social tbody tr td:not(:first-child) {
            text-align: left !important;
        }
        .card-header {
            padding: 0.75rem 1rem !important;
        }
        .card .card-header {
            text-transform: none !important;
            min-height: 40px !important;
        }
        .changelog__according .card .card-header {
            min-height: 40px !important;
            height: 40px !important;
        }
        .changelog__accordingCollapsed {
            height: 40px !important;
        }
        .v-num {
            font-size: 14px !important;
        }
        .btn-xs {
            line-height: 1.7 !important;
            font-size: 10px !important;
        }
        .table, .changelog__according .card:not(:last-child) {
            margin-bottom: 0 !important;
        }
        .social-dash-wrap .card.card-overview {
            margin-bottom: 5%;
        }
        .social-dash-wrap .card-body {
            padding: 0 !important;
        }
        .changelog__according {
            margin-top: 0 !important;
        }
    </style>
@endpushonce

@section("content")

    <div class="contents">

        <div class="container-fluid">
            <div class="social-dash-wrap">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="breadcrumb-main">
                            <h4 class="text-capitalize breadcrumb-title">Add Advertisers</h4>
                            <div class="breadcrumb-action justify-content-center flex-wrap">
                                <div class="action-btn">
                                    <a href="{{ route("admin.advertiser-management.api-advertisers.index") }}" class="breadcrumb-remove border-0 color-danger content-center bg-white fs-12 fw-500 ml-10 radius-md">
                                        <i class="la la-undo mr-2"></i> {{ trans('global.back_to_list') }}</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">

                                @include("partial.admin.alert")

                                <form action="{{ route("admin.store-advertiser-manual") }}" method="POST"
                                      enctype="multipart/form-data" id="advertiserForm" class="p-5">
                                    @csrf
                                    @method('POST')
                                    <div class="row">
    <div class="col-lg-6">
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <label for="name" class="font-weight-bold text-black">{{ trans('advertiser.api-advertiser.fields.name') }}</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
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
            <input type="url" id="url" name="url" class="form-control" value="{{ old('url') }}">
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
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="form-group {{ $errors->has('source') ? 'has-error' : '' }}">
            <label for="url" class="font-weight-bold text-black">Source</label>
            <input type="source" id="source" name="source" class="form-control" value="{{ old('source') }}">
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
        <div class="form-group {{ $errors->has('advertiser_id') ? 'has-error' : '' }}">
            <label for="url" class="font-weight-bold text-black">Network Advertiser Id</label>
            <input type="advertiser_id" id="advertiser_id" name="advertiser_id" class="form-control" value="{{ old('advertiser_id') }}">
            @if($errors->has('advertiser_id'))
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
        <div class="form-group {{ $errors->has('primary_region') ? 'has-error' : '' }}">
            <label for="primary_region" class="font-weight-bold text-black">{{ trans('advertiser.api-advertiser.fields.primary_region') }}</label>
            <select class="js-example-basic-single js-states form-control" id="primary_region" name="primary_region">
                <option value="" disabled selected>Please Select</option>
                @foreach($countries as $country)
                    <option value="{{ $country['iso2'] }}">{{ $country['name'] }}</option>
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
                        <option value="{{ $country['currency'] }}">{{ $country['currency'] }}</option>
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
            <input type="text" id="average_payment_time" name="average_payment_time" class="form-control" value="{{ old('average_payment_time') }}">
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
            <input type="text" id="validation_days" name="validation_days" class="form-control" value="{{ old('validation_days') }}">
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
            <input type="text" id="epc" name="epc" class="form-control" value="{{ old('epc') }}">
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
            <select class="js-example-basic-single js-states form-control" id="deeplink_enabled" name="deeplink_enabled">
                <option value="" disabled selected>Please Select</option>
                <option value="1">True</option>
                <option value="0">False</option>
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
    <div class="col-lg-6">
        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
            <label for="deeplink_enabled" class="font-weight-bold text-black">Status</label>
            <select class="js-example-basic-single js-states form-control" id="is_available" name="is_available">
                <option value="">Please Select</option>
                <option value="1" selected>Active</option>
                <option value="0">InActive</option>
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
        <div class="form-group {{ $errors->has('supported_regions') ? 'has-error' : '' }}">
            <label for="supported_regions" class="font-weight-bold text-black">{{ trans('advertiser.api-advertiser.fields.supported_regions') }}</label>
            <div class="atbd-select ">
                <select name="supported_regions[]" id="supported_regions" class="form-control " multiple="multiple">
                    @foreach($countries as $country)
                        <option value="{{ $country['iso2'] }}">{{ $country['name'] }}</option>
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
                <select name="categories[]" id="categories" class="form-control " multiple="multiple">
                    @foreach($categories as $category)
                        <option value="{{ $category['id'] }}">
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
            <label for="promotional_methods" class="font-weight-bold text-black">Promotional Methods</label>
            <div class="atbd-select ">
                <select name="promotional_methods[]" id="promotional_methods" class="form-control " multiple="multiple">
                    @foreach($methods as $method)
                        <option value="{{ $method['id'] }}">
                            {{ $method['name'] }}</option>
                    @endforeach
                </select>
            </div>
            @if($errors->has('promotional_methods'))
                <em class="invalid-feedback">
                    {{ $errors->first('promotional_methods') }}
                </em>
            @endif
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group {{ $errors->has('program_restrictions') ? 'has-error' : '' }}">
            <label for="program_restrictions" class="font-weight-bold text-black">Program Restrictions</label>
            <div class="atbd-select ">
                <select name="program_restrictions[]" id="program_restrictions" class="form-control " multiple="multiple">
                    @foreach($methods as $method)
                        <option value="{{ $method['id'] }}">
                            {{ $method['name'] }}</option>
                    @endforeach
                </select>
            </div>
            @if($errors->has('program_restrictions'))
                <em class="invalid-feedback">
                    {{ $errors->first('program_restrictions') }}
                </em>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="form-group {{ $errors->has('tags') ? 'has-error' : '' }}">
            <label for="tags" class="font-weight-bold text-black">{{ trans('advertiser.api-advertiser.fields.tags') }}</label>
            <div class="atbd-select ">
                <input type="text" name="tags" data-role="tagsinput" value="">
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
            <input type="text" id="offer_type" name="offer_type" class="form-control" value="{{ old('offer_type') }}">
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
            <label for="commission" class="font-weight-bold text-black">{{ trans('advertiser.api-advertiser.fields.commission') }}</label>
            <input type="text" id="commission" name="commission" class="form-control" value="{{ old('commission') }}">
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
            <input type="text" id="commission_type" name="commission_type" class="form-control" value="{{ old('commission_type') }}">
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




<div class="row mt-4">
    <div class="col-lg-12">
        <div class="form-group {{ $errors->has('click_through_url') ? 'has-error' : '' }}">
            <label for="click_through_url" class="font-weight-bold text-black">{{ trans('advertiser.api-advertiser.fields.click_through_url') }}</label>
            <input type="url" id="click_through_url" name="click_through_url" class="form-control" value="{{ old('click_through_url') }}">
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
            <label for="custom_domain" class="font-weight-bold text-black">Custom Domain</label>
            <input type="text" id="custom_domain" name="custom_domain" class="form-control" value="{{ old('custom_domain') }}">
            @if($errors->has('custom_domain'))
                <em class="invalid-feedback">
                    {{ $errors->first('custom_domain') }}
                </em>
            @endif
            
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
            <img class="img-thumbnail" alt="" >
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="form-group {{ $errors->has('program_policies') ? 'has-error' : '' }}">
            <label for="program_policies" class="font-weight-bold text-black">{{ trans('advertiser.api-advertiser.fields.program_policies') }}</label>
            <textarea name="program_policies" id="program_policies" cols="30" rows="10" class="form-control"></textarea>
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
            <textarea name="short_description" id="short_description" cols="30" rows="10" class="form-control"></textarea>
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
            <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
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

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
