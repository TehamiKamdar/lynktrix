<script>
    document.addEventListener("DOMContentLoaded", function () {
        $('#location_country').change(function() {

            $("#companyForm").addClass("disableDiv");
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
                    $("#companyForm").removeClass("disableDiv");
                    $("#showLoader").hide();
                },
                error: function (response) {
                    showErrors(response);
                    $("#companyForm").removeClass("disableDiv");
                    $("#showLoader").hide();
                }
            });
        });
        $('#location_state').change(function() {

            $("#companyForm").addClass("disableDiv");
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
                    $("#companyForm").removeClass("disableDiv");
                    $("#showLoader").hide();
                },
                error: function (response) {
                    showErrors(response);
                    $("#companyForm").removeClass("disableDiv");
                    $("#showLoader").hide();
                }
            });
        });
        $("#companyForm").validate({
            rules: {
                "company_name": {
                    required: true,
                },
                "legal_entity_type": {
                    required: true,
                },
                "location_country": {
                    required: true,
                },
                "location_state": {
                    required: true,
                },
                "zip_code": {
                    required: true,
                },
                "address": {
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
