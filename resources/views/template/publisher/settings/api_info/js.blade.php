<script>
    function clickToCopy()
    {
        copyToClipboard(document.getElementById("api_token"))
        normalMsg({"message": "API Token Successfully Copied.", "success": true});
    }
    function regenerateTokenRequest()
    {
        $.ajax({
            url: '{{ route("publisher.account.api-info.regenerate-token") }}',
            type: 'POST',
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            success: function (response) {
                $("#api_token").val(response.token);
            },
            error: function (response) {
                showErrors(response);
            }
        });
    }
</script>
