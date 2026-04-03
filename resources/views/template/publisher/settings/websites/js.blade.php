<script>
    function openVerifyModal(id, url)
    {
        $("#htmlTag").val(`<meta name="linkscircleverifycode" content="${id}" />`);

        $("#copyHTMLTag").click(() => {

            let copyText = $("#htmlTag").val();
            document.addEventListener('copy', function(e) {
                e.clipboardData.setData('text/plain', copyText);
                e.preventDefault();
            }, true);
            document.execCommand('copy');
            normalMsg({"message": "HTML Tag successfully copied.", "success": true});

        });

        $("#websiteVerify").click(function () {
            $("#verifyForm").addClass("disableDiv");
            $("#showLoader").show();
            $.ajax({
                url: '{{ route("publisher.profile.websites.verification") }}',
                type: 'POST',
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                data: {url},
                success: (response) => {
                    normalMsg(response);
                    if(response.success) {
                        $(`#status-${id}`).html("<div class='badge badge-success'>Active</div>");
                    }
                    $("#verifyForm").removeClass("disableDiv");
                    $("#showLoader").hide();
                    $("#closeVerifyModal").trigger("click");
                },
                error: function (response) {
                    showErrors(response)
                    $("#verifyForm").removeClass("disableDiv");
                    $("#showLoader").hide();
                }
            });
        });
    }
    function openWebsiteModal(type = null, id = null)
    {
        document.getElementById("websiteForm").reset();
        $('#website_id').val('');
        $('#partner_types').val(''); // Select the option with a value of '1'
        $('#partner_types').trigger('change'); // Notify any JS components that the value changed
        $('#categories').val(''); // Select the option with a value of '1'
        $('#categories').trigger('change'); // Notify any JS components that the value changed

        let title = "Add Website";
        if(type)
            title = "Edit Website";
        $("#modelTitle").html(title)

        let partnerType = $("#partner_types").select2({
            placeholder: "Please Select",
            dropdownCssClass: "tag",
            allowClear: true,
            maximumSelectionLength: 3
        });

        let categories = $("#categories").select2({
            placeholder: "Please Select",
            dropdownCssClass: "tag",
            allowClear: true,
            maximumSelectionLength: 4
        });

        websiteForm();

        if(id) {
            $("#websiteForm").addClass("disableDiv");
            $("#showLoader").show();

            $.ajax({
                url: `/publisher/profile/websites/${id}`,
                type: 'GET',
                success: function (response) {
                    response = response.data;
                    $("#website_id").val(id);
                    $("#website_name").val(response.name)
                    $("#website_url").val(response.url)
                    $("#monthly_traffic").val(response.monthly_traffic)
                    $("#monthly_page_views").val(response.monthly_page_views)
                    partnerType.val(response.partner_types.values).trigger("change");
                    categories.val(response.categories.values).trigger("change");
                    $("#websiteForm").removeClass("disableDiv");
                    $("#showLoader").hide();
                },
                error: function (response) {
                    showErrors(response);
                    $("#websiteForm").removeClass("disableDiv");
                    $("#showLoader").hide();
                }
            });
        }
    }
    function websiteForm()
    {

        $("#websiteForm").validate({
            rules: {
                "website_name": {
                    required: true
                },
                "website_url": {
                    required: true,
                    url: true
                },
                "partner_types[]": {
                    required: true
                },
                "categories[]": {
                    required: true
                },
                "monthly_traffic": {
                    required: true,
                },
                "monthly_page_views": {
                    required: true
                },
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
            submitHandler: () => {

                $("#websiteForm").addClass("disableDiv");
                $("#showLoader").show();

                let data = $("#websiteForm").serialize(),
                    url = "",
                    method = "";

                if($("#website_id").val()) {
                    url = '{{ route("publisher.profile.websites.update") }}';
                    method = 'PATCH';
                } else {
                    url = '{{ route("publisher.profile.websites.store") }}';
                    method = 'POST';
                }

                $.ajax({
                    url: url,
                    type: method,
                    headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                    data: data,
                    success: (response) => {
                        normalMsg(response);
                        let data = response.data;
                        $(`#website-row-${data.id}`).html(`
                            <td>
                                <a href="${data.url}" target="_blank">${data.name}</a>
                            </td>
                            <td>
                                ${data.partner_types.text}
                            </td>
                            <td>
                                ${data.categories.text}
                            </td>
                            <td class="text-center">
                                ${data.updated_at}
                            </td>
                            <td class="text-center" id="status-${data.id}">
                                <div class='badge ${data.class}'>${data.status}</div>
                            </td>
                            <td>
                                <a href='javascript:void(0)' data-toggle='modal' data-target='#verify-modal' onclick='openVerifyModal("${data.id}", "${data.url}")'>Verify</a> |
                                <a href='javascript:void(0)' data-toggle='modal' data-target='#website-modal' onclick='openWebsiteModal(1, "${data.id}")'>Edit</a>
                            </td>
                        `);
                        $("#websiteForm").removeClass("disableDiv");
                        $("#showLoader").hide();
                        $("#closeModal").trigger("click");
                    },
                    error: function (response) {
                        showErrors(response)
                        $("#websiteForm").removeClass("disableDiv");
                        $("#showLoader").hide();
                    }
                });

            }
        });
    }
</script>


