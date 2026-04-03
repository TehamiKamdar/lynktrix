@extends("layouts.panel_guest")

@section("content")
    
    <div class="checkout wizard8 global-shadow border px-sm-50 px-20 mx-auto my-30 bg-gray radius-xl w-100" id="signUpForm">
        <div class="notification-wrapper top-right"></div>

        @if(($isStepOne && !$isStepTwo && !$isStepThree && !$isStepFour) || (!$isStepOne && !$isStepTwo && !$isStepThree && !$isStepFour))
            @include("auth.publisher_register.step_one", $stepOne)

        @elseif(!$isStepOne && $isStepTwo && !$isStepThree && !$isStepFour)
            @include("auth.publisher_register.step_two", $stepTwo)

        @elseif(!$isStepOne && !$isStepTwo && $isStepThree && !$isStepFour)
            @include("auth.publisher_register.step_three")

        @elseif(!$isStepOne && !$isStepTwo && !$isStepThree && $isStepFour)
            @include("auth.publisher_register.step_four")

        @endif

    </div><!-- End: .global-shadow-->

    <div class="loader-overlay display-hidden" id="showLoader">
        <div class="atbd-spin-dots spin-lg">
            <span class="spin-dot badge-dot dot-primary"></span>
            <span class="spin-dot badge-dot dot-primary"></span>
            <span class="spin-dot badge-dot dot-primary"></span>
            <span class="spin-dot badge-dot dot-primary"></span>
        </div>
    </div>

@endsection

@push("top_scripts")

    <script>
        let toastCount = 0;

        function createToast(type, content){
            let toast = ``;
            const notificationShocase = $('.notification-wrapper');

            toast =`
                    <div class="atbd-notification-box notification-${type} notification-${toastCount}">
                        <div class="atbd-notification-box__content media">
                            <div class="atbd-notification-box__icon">
                                <span data-feather="x-circle"></span>
                            </div>
                            <div class="atbd-notification-box__text media-body">
                                <h6>Error List</h6>
                                ${content}
                            </div>
                        </div>
                        <a href="#" class="atbd-notification-box__close" data-toast="close">
                            <span data-feather="x"></span>
                        </a>
                    </div>
                    `;

            notificationShocase.append(toast);
            toastCount++;
        }

        function showErrors(response)
        {
            let duration = (optionValue, defaultValue) =>
                typeof optionValue === "undefined" ? defaultValue : optionValue;

            let errorContent = "";

            Object.values(response.responseJSON.errors).forEach(errors => {
                errors.forEach(error => {
                    errorContent += `<p>${error}</p>`
                });
            });

            createToast("danger", errorContent);
            feather.replace();
            let thisToast = toastCount - 1;

            $('*[data-toast]').on('click',function(){
                $(this).parent('.atbd-notification-box').remove();
            })

            setTimeout(function(){
                $(document).find(".notification-"+thisToast).remove();
            },duration(6000));
        }

        function stepFormShow(page)
        {
            let account = "{{ $account }}";
            $.ajax({
                url: '{{ route("publisher-step-form") }}',
                type: 'GET',
                data: {page, account},
                success: function (data) {
                    $("#signUpForm").html(data)

                    if(page === 1)
                        loadStepOneForm();

                    else if(page === 2)
                        loadStepTwoForm();

                    else if(page === 3)
                        loadStepThreeForm();

                    else if(page === 4)
                        loadStepFourForm();

                }
            });
        }

        function loadStepOneForm()
        {
            $('#agree').change(function() {
                let isChecked = $(this).is(':checked');
                if(isChecked)
                    $("#terms").val(1);
                else
                    $("#terms").val("");
            });

            $("#stepOne").validate({
                ignore: ':hidden:not(#terms)',
                rules: {
                    first_name: {
                        required: true,
                    },
                    last_name: {
                        required: true,
                    },
                    user_name: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true,
                    },
                    password: {
                        required: true,
                        minlength: 8,
                    },
                    password_confirmation: {
                        required: true,
                        minlength: 8,
                        equalTo: "#password"
                    },
                    terms: {
                        required: true,
                    }
                },
                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error');
                },
                unhighlight: function (element) { // un-hightlight error inputs
                    $(element)
                        .closest('.form-group').removeClass('has-error');
                },
                errorPlacement: function (error, element) {
                    error.insertAfter(element.closest('.input-modal-group'));
                    if($(element).attr("name") === "terms")
                    {
                        error.insertAfter(element);
                    }
                },
                submitHandler: function(){

                    $("#signUpForm").addClass("disableDiv");
                    $("#showLoader").show();

                    let data = $("#stepOne").serialize();
                    $.ajax({
                        url: '{{ route("publisher-step-one") }}',
                        type: 'POST',
                        headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                        data: data,
                        success: function (response) {
                            if(response)
                            {
                                stepFormShow(2)
                            }
                            $("#signUpForm").removeClass("disableDiv");
                            $("#showLoader").hide();
                        },
                        error: function (response) {
                            showErrors(response)
                            $("#signUpForm").removeClass("disableDiv");
                            $("#showLoader").hide();
                        }
                    });

                }
            });

        }

        function loadStepTwoForm()
        {
            if($('#phone_number').length) {
                let input = document.querySelector("#phone_number");

                let iti = window.intlTelInput(input, {
                    hiddenInput: "phone_number",
                    separateDialCode: true,
                    utilsScript: "{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/phone/utils.js") }}",
                });

                input.addEventListener("countrychange", function() {

                    let data = iti.getSelectedCountryData();
                    console.log(data)

                });

                @if(isset($stepTwo['dialCode']) && isset($stepTwo['phone_number']))
                    iti.setNumber("+{{ $stepTwo['dialCode'] }} {{ $stepTwo['phone_number'] }}");
                @endif

            }

            $('#country').change(function() {

                let country = $(this).val();

                // iti.setCountry($("#country option:selected").text());

                $.ajax({
                    url: '{{ route("get-states") }}',
                    type: 'POST',
                    headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                    data: {"country_id": country},
                    success: function (response) {
                        $("#state").html("<option value='' selected disabled>Please Select</option>");
                        response.map(state => {
                            $("#state").append(`<option value="${state.id}">${state.name}</option>`);
                        })
                        $("#signUpForm").removeClass("disableDiv");
                        $("#showLoader").hide();
                    },
                    error: function (response) {
                        showErrors(response);
                        $("#signUpForm").removeClass("disableDiv");
                        $("#showLoader").hide();
                    }
                });
            });
            $('#state').change(function() {
                $.ajax({
                    url: '{{ route("get-cities") }}',
                    type: 'POST',
                    headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                    data: {"state_id": $(this).val(), "country_id": $('#country').val()},
                    success: function (response) {
                        $("#city").html("<option value='' selected disabled>Please Select</option>");
                        response.map(city => {
                            $("#city").append(`<option value="${city.id}">${city.name}</option>`);
                        })
                        $("#signUpForm").removeClass("disableDiv");
                        $("#showLoader").hide();
                    },
                    error: function (response) {
                        showErrors(response);
                        $("#signUpForm").removeClass("disableDiv");
                        $("#showLoader").hide();
                    }
                });
            });

            $("#stepTwo").validate({
                rules: {
                    company_name: {
                        required: true,
                    },
                    entity_type: {
                        required: true,
                    },
                    contact_name: {
                        required: true,
                    },
                    phone_number: {
                        required: true,
                    },
                    address: {
                        required: true,
                    },
                    state: {
                        required: true,
                    },
                    country: {
                        required: true,
                    },
                    postal_code: {
                        required: true,
                    }
                },
                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error');
                },
                unhighlight: function (element) { // un-hightlight error inputs
                    $(element)
                        .closest('.form-group').removeClass('has-error');
                },
                errorPlacement: function (error, element) {
                    error.insertAfter(element.closest('.input-modal-group'));
                },
                submitHandler: function(){
                    $("#signUpForm").addClass("disableDiv");
                    $("#showLoader").show();
                    let data = $("#stepTwo").serialize();
                    $.ajax({
                        url: '{{ route("publisher-step-two") }}',
                        type: 'POST',
                        headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                        data: data,
                        success: function (response) {
                            if(response)
                            {
                                stepFormShow(3)
                            }
                            $("#signUpForm").removeClass("disableDiv");
                            $("#showLoader").hide();
                        },
                        error: function (response) {
                            showErrors(response);
                            $("#signUpForm").removeClass("disableDiv");
                            $("#showLoader").hide();
                        }
                    });
                }
            });
        }

        function loadStepThreeForm()
        {
            $("#categories").select2({
                placeholder: "Please Select",
                dropdownCssClass: "tag",
                allowClear: true,
                maximumSelectionLength: 4
            });
            $("#partner_types").select2({
                placeholder: "Please Select",
                dropdownCssClass: "tag",
                allowClear: true,
                maximumSelectionLength: 3
            });

            // const phoneInputField = document.querySelector("#phone_number");
            // const phoneInput = window.intlTelInput(phoneInputField, {
            //     utilsScript:
            //         "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
            // });

            $("#stepThree").validate({
                rules: {
                    "website_url": {
                        required: true,
                        url: true
                    },
                    "brief_introduction": {
                        required: true,
                    },
                    "categories[]": {
                        required: true,
                    },
                    "partner_types[]": {
                        required: true,
                    },
                    "website_country": {
                        required: true,
                    },
                    "monthly_traffic": {
                        required: true,
                    },
                    "monthly_page_views": {
                        required: true,
                    }
                },
                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error');
                },
                unhighlight: function (element) { // un-hightlight error inputs
                    $(element)
                        .closest('.form-group').removeClass('has-error');
                },
                errorPlacement: function (error, element) {
                    error.insertAfter(element.closest('.input-modal-group'));
                },
                submitHandler: function(){
                    $("#signUpForm").addClass("disableDiv");
                    $("#showLoader").show();
                    let data = $("#stepThree").serialize();
                    $.ajax({
                        url: '{{ route("publisher-step-three") }}',
                        type: 'POST',
                        headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                        data: data,
                        success: function (response) {
                            if(response)
                            {
                                stepFormShow(4);
                                $.ajax({
                                    url: '{{ route('verification.send') }}',
                                    type: 'POST',
                                    headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                                    success: function (data) {
                                        $("#signUpForm").removeClass("disableDiv");
                                        $("#showLoader").hide();
                                    }
                                });
                            }
                            $("#signUpForm").removeClass("disableDiv");
                            $("#showLoader").hide();
                        },
                        error: function (response) {
                            showErrors(response);
                            $("#signUpForm").removeClass("disableDiv");
                            $("#showLoader").hide();
                        }
                    });
                }
            });
        }

        function loadStepFourForm()
        {
            $("#stepFour").submit(function() {

                $("#signUpForm").addClass("disableDiv");
                $("#showLoader").show();

                $.ajax({
                    url: '{{ route('verification.send') }}',
                    type: 'POST',
                    headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                    success: function (data) {
                        $("#signUpForm").removeClass("disableDiv");
                        $("#showLoader").hide();
                    }
                });

            });
        }

        document.addEventListener("DOMContentLoaded", function () {

            loadStepOneForm();
            loadStepTwoForm();
            loadStepThreeForm();
            loadStepFourForm();

        });
    </script>

@endpush

@pushonce('styles')
    <link rel="stylesheet" href="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/css/phone/intlTelInput.css") }}">
    <link rel="stylesheet" href="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/css/phone/demo.css") }}">
    <link rel="stylesheet" href="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/css/select2.min.css") }}"/>
    <style>
        .select2-container{
            height: 40px;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            margin-bottom: 5px;
        }
        .iti.iti--allow-dropdown {
            width: 100%;
        }
        #phone_number {
            padding: 20px;
        }
        .iti__selected-flag {
            height: 40px;
            background:none!important;
        }
        @media only screen and (max-width: 575px){
            .checkout-progress {
                flex-flow: inherit!important;
                align-items: flex-start !important;
                justify-content: space-between!important;
            }
            .checkout-progress-indicator .div img {display:none!important;}
            .wizard8 .checkout-progress-indicator .card-header p {margin-bottom: 10px!important;;}
            .wizard8.w-80 {width: 90%!important;}
        }
    </style>
@endpushonce

@pushonce('scripts')
    <script src="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/phone/intlTelInput.js") }}"></script>
    <script src="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/select2.full.min.js") }}"></script>
@endpushonce


