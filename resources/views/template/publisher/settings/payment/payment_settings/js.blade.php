<script>
    let duration = 300;
    function changePaymentMethod()
    {
        $("#paymentContent").show();
    }
    function addNRemoveClass(id)
    {
        if($(`#collapse-body-a-${id}`).hasClass("show"))
        {
            $(`#collapse-body-a-${id}`).removeClass("atbd-collapse-item__body collapse show");
            $(`#collapse-body-a-${id}`).addClass("collapse atbd-collapse-item__body");
        }
    }
    function clearBankFields()
    {
        $('#bank_location').prop("selectedIndex", 0)
        $("#bankCodeContent").show();
        $("#bankAccountTypeContent").show();
        $('#account_type').prop("selectedIndex", 0)
        $("#account_holder_name").val("");
        $("#bank_account_number").val("");
        $("#bank_code").val("");
    }
    function clearPayoneerFields()
    {
        $("#payoneer_holder_name").val("");
        $("#payoneer_email").val("");
    }
    function clearPaypalFields()
    {
        $("#paypal_country").prop("selectedIndex", 0)
        $("#paypal_holder_name").val("");
        $("#paypal_email").val("");
    }
    function allMethods()
    {
        $('#bank').on('click', function(){
            addNRemoveClass(2);
            addNRemoveClass(3);
            clearPayoneerFields();
            clearPaypalFields();
            setTimeout(function(){
                $('#bank').parent().find('a').trigger('click');
                $("#bank_location").click(function () {
                    let location = $(this).find(":selected").text();
                    if(location == "Pakistan")
                    {
                        $("#bankCodeContent").hide();
                        $("#account_number_text").text("IBAN Number");
                        $("#bankAccountTypeContent").hide();
                    }
                    else
                    {
                        $("#bankCodeContent").show();
                        $("#account_number_text").text("Bank Account Number");
                        $("#bankAccountTypeContent").show();
                    }
                });
            }, duration);
        })
        $('#paypal').on('click', function(){
            addNRemoveClass(1);
            addNRemoveClass(3);
            clearPayoneerFields();
            clearBankFields();
            setTimeout(function(){
                $('#paypal').parent().find('a').trigger('click');
            }, duration);
        })
        $('#payoneer').on('click', function(){
            addNRemoveClass(1);
            addNRemoveClass(2);
            clearPaypalFields();
            clearBankFields();
            setTimeout(function(){
                $('#payoneer').parent().find('a').trigger('click');
            }, duration);
        })
        $("#paymentSettingForm").validate({
            rules: {
                "payment_frequency": {
                    required: true,
                },
                "payment_threshold": {
                    required: true,
                },
            }
        });
    }
    allMethods();
</script>
