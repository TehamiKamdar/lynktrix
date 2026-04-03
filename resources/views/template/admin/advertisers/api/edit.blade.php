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
            @if(\App\Helper\Advertiser\Base::getFormFieldReadOnly($api_advertiser->source, "program_policies"))
                $('#short_description, #description').summernote({
                    height: 300
                });
            @elseif(\App\Helper\Advertiser\Base::getFormFieldReadOnly($api_advertiser->source, "short_description"))
                $('#program_policies, #description').summernote({
                    height: 300
                });
            @elseif(\App\Helper\Advertiser\Base::getFormFieldReadOnly($api_advertiser->source, "description"))
                $('#program_policies, #short_description').summernote({
                    height: 300
                });
            @else
                $('#program_policies, #description, #short_description').summernote({
                    height: 300
                });
            @endif

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
                            <h4 class="text-capitalize breadcrumb-title">{{ trans('global.edit') }} {{ trans('advertiser.api-advertiser.title_singular') }}</h4>
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

                                <form action="{{ route("admin.advertiser-management.api-advertisers.update", ["api_advertiser" => $api_advertiser->id]) }}" method="POST"
                                      enctype="multipart/form-data" id="advertiserForm" class="p-5">
                                    @csrf
                                    @method('PATCH')
                                    @include("template.admin.advertisers.form", ['data' => $api_advertiser, 'countries' => $countries])
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
