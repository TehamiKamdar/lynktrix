@extends("layouts.admin.panel_app")

@section("content")
    <div class="contents">

        <div class="container-fluid">
            <div class="social-dash-wrap">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="breadcrumb-main">
                            <h4 class="text-capitalize breadcrumb-title">{{ trans('global.add') }} {{ trans('cruds.user.title_singular') }}</h4>
                            <div class="breadcrumb-action justify-content-center flex-wrap">
                                <div class="action-btn">
                                    <a href="{{ route("admin.user-management.users.index") }}" class="btn btn-sm btn-gray btn-add">
                                        <i class="la la-undo"></i> {{ trans('global.back_to_list') }}</a>
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

                                <form action="{{ route("admin.user-management.users.store") }}" method="POST"
                                      enctype="multipart/form-data" id="userForm">
                                    @csrf
                                    @include("template.admin.users.form")
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@pushonce('styles')
@endpushonce

@pushonce('scripts')
    <script src="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/jquery.validate.min.js") }}"></script>
    <script>

        $(document).ready(function () {
            $("#userForm").validate({
                rules: {
                    password: {
                        minlength: 5,
                    },
                    confirm_password: {
                        minlength: 5,
                        equalTo: "#password"
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
@endpushonce

