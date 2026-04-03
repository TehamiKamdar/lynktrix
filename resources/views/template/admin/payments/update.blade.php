@extends("layouts.admin.panel_app")

@pushonce('styles')
@endpushonce

@pushonce('scripts')
@endpushonce

@section("content")

    <div class="contents">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="col-xxl-8 col-lg-8 offset-2 col-sm-12 m-bottom-50 m-top-50">
                        <form action="{{ route("admin.payment-management.updatePaymentHistoryByInvoice", ['id' => $id]) }}" method="POST">
                            @csrf
                            @include("partial.admin.alert")
                            <div class="card" id="deeplinkWrapper">
                                <div class="card-body" id="mainDeeplinkBody">
                                    <div class="files-area d-flex justify-content-between align-items-center">
                                        <div class="files-area__left d-flex align-items-center">
                                            <div class="files-area__title">
                                                <p class="mb-0 fs-14 fw-500 color-dark text-capitalize">Payment Release Update By Invoice Id</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <div class="form-group mt-4 {{ $errors->has('commission_amount') ? 'has-error' : '' }}">
                                                <label for="commission_amount" class="font-weight-bold text-black">Commission Amount</label>
                                                <input type="text" id="commission_amount" name="commission_amount" class="form-control" value="{{ old('commission_amount', $data->commission_amount ?? '') }}">
                                                @if($errors->has('commission_amount'))
                                                    <em class="invalid-feedback">
                                                        {{ $errors->first('commission_amount') }}
                                                    </em>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mt-4 {{ $errors->has('lc_commission_amount') ? 'has-error' : '' }}">
                                                <label for="lc_commission_amount" class="font-weight-bold text-black">LC Commission Amount</label>
                                                <input type="text" id="lc_commission_amount" name="lc_commission_amount" class="form-control" value="{{ old('lc_commission_amount', $data->lc_commission_amount ?? '') }}">
                                                @if($errors->has('lc_commission_amount'))
                                                    <em class="invalid-feedback">
                                                        {{ $errors->first('lc_commission_amount') }}
                                                    </em>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-inline-action d-flex justify-content-between align-items-center">
                                                <button type="submit" class="btn btn-sm text-white btn-primary btn-default btn-squared text-capitalize mt-4">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- Profile files End -->
                    </div>

                </div><!-- End: .col -->
            </div>
        </div>

    </div>

@endsection
