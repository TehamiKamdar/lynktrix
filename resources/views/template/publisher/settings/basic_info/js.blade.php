<script>
    document.addEventListener("DOMContentLoaded", function () {
        $("#language, #customer_reach, #partner_type").select2({
            placeholder: "Please Select",
            dropdownCssClass: "tag",
            allowClear: true
        });
        $("#year, #month").change(function () {
            let year = $(this).val();
            let month = $("#month").val();
            if(year && month) {
                $.ajax({
                    url: '{{ route("publisher.get-month-last-day") }}',
                    type: 'GET',
                    data: {year, month},
                    success: function (response) {
                        $("#day").html(`<option value="" selected disabled>Please Select</option>`);
                        for (let day = 1; day <= response; day++)
                        {
                            $("#day").append(`<option value='${day}'>${day}</option>`);
                        }
                    }
                });
            }
        });
        $('#location_country').change(function() {

            $("#settingForm").addClass("disableDiv");
            $("#showLoader").show();
            $("#location_state").html("<option value='' selected disabled>Please Select</option>");
            $("#location_city").html("<option value='' selected disabled>Please Select</option>");

            $.ajax({
                url: '{{ route("get-states") }}',
                type: 'POST',
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                data: {"country_id": $(this).val()},
                success: function (response) {
                    response.map(state => {
                        $("#location_state").append(`<option value="${state.id}">${state.name}</option>`);
                    })
                    $("#settingForm").removeClass("disableDiv");
                    $("#showLoader").hide();
                },
                error: function (response) {
                    showErrors(response);
                    $("#settingForm").removeClass("disableDiv");
                    $("#showLoader").hide();
                }
            });
        });
        $('#location_state').change(function() {

            $("#settingForm").addClass("disableDiv");
            $("#showLoader").show();

            $.ajax({
                url: '{{ route("get-cities") }}',
                type: 'POST',
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                data: {"state_id": $(this).val(), "country_id": $('#location_country').val()},
                success: function (response) {
                    $("#location_city").html("<option value='' selected disabled>Please Select</option>");
                    response.map(city => {
                        $("#location_city").append(`<option value="${city.id}">${city.name}</option>`);
                    })
                    $("#settingForm").removeClass("disableDiv");
                    $("#showLoader").hide();
                },
                error: function (response) {
                    showErrors(response);
                    $("#settingForm").removeClass("disableDiv");
                    $("#showLoader").hide();
                }
            });
        });
        $("#settingForm").validate({
            rules: {
                "intro": {
                    required: true,
                },
                "language[]": {
                    required: true,
                },
                "customer_reach[]": {
                    required: true,
                },
                "first_name": {
                    required: true,
                },
                "last_name": {
                    required: true,
                },
                "user_name": {
                    required: true,
                },
                "gender": {
                    required: true,
                },
                "dob": {
                    required: true,
                },
                "location_country": {
                    required: true,
                },
                "location_address_1": {
                    required: true,
                },
                "zip_code": {
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
            }
        });
    });
</script>
