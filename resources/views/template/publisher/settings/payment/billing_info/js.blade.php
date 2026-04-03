<script>
    document.addEventListener("DOMContentLoaded", function () {
        $('#country').change(function() {

            $("#companyForm").addClass("disableDiv");
            $("#showLoader").show();
            $("#state").html("<option value='' selected disabled>Please Select</option>");
            $("#city").html("<option value='' selected disabled>Please Select</option>");

            $.ajax({
                url: '{{ route("get-states") }}',
                type: 'POST',
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                data: {"country_id": $(this).val()},
                success: function (response) {
                    response.map(state => {
                        $("#state").append(`<option value="${state.id}">${state.name}</option>`);
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
        $('#state').change(function() {

            $("#companyForm").addClass("disableDiv");
            $("#showLoader").show();

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
        $("#billingForm").validate({
            rules: {
                "name": {
                    required: true,
                },
                "phone": {
                    required: true,
                },
                "country": {
                    required: true,
                },
                "state": {
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
