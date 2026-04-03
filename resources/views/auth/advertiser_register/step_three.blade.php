@extends("auth.advertiser_register.base")

@section("step_form_content")

    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-12 col-sm-12">
            <div class="card checkout-shipping-form px-30 pt-2 pb-30 border-color" style="margin-top: 40px;">
                <div class="card-header border-bottom-0 pb-sm-0 pb-1 px-0">
                    <h4 class="fw-500">Email Verification</h4>
                </div>
                <div class="card-body p-0">
                    <div class="edit-profile__body">
                        <h2 class="pt-2">You're Only One Step Away!</h2>

                        <p>An email has been sent to your inbox, please check and verify to complete your registration.</p>

                        <p>If you did not receive any email, please check your spam/junk folder or click on the resend button below.</p>
                        <div class="button-group d-flex pt-3 justify-content-between flex-wrap">

                            <form id="stepThree" action="javascript:void(0)">
{{--                            <form method="POST" action="{{ route('verification.send') }}">--}}
{{--                                @csrf--}}
                                <button type="submit" class="btn text-white btn-primary btn-default btn-squared text-capitalize m-1">Resend Verification Email</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div><!-- ends: .card -->


        </div><!-- ends: .col -->

    </div>

@endsection
