@extends("layouts.publisher.panel_app_invoice")

@pushonce('styles')

@endpushonce

@pushonce('scripts')
    <script>
        function printInvoice()
        {
            window.print();
        }
    </script>
@endpushonce

@section("content")
    <div class="contents py-50 px-50">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="payment-invoice global-shadow border bg-white radius-xl w-100 mb-30">
                        <div class="payment-invoice__body">
                            <div class="payment-invoice-address d-flex justify-content-sm-between">
                                <div class="payment-invoice-logo">
                                    @if(env("APP_ENV") == "production")
                                        <a href="{{ url("/") }}"><img  src="https://app.linkscircle.com/img/logo.png" alt=""></a>
                                    @endif
                                </div>
                                <div class="payment-invoice-address__area">
                                    <address>LINKS CIRCLE PTY LTD.<br>
                                        36 Whistler Place, Pallara,<br>
                                        Queensland 4110, Australia.</address>
                                </div>
                            </div><!-- End: .payment-invoice-address -->
                            <div class="payment-invoice-qr d-flex justify-content-between mb-40 px-xl-50 px-30 py-sm-30 py-20 ">
                                <div class="d-flex justify-content-center mb-lg-0 mb-25">
                                    <div class="payment-invoice-qr__number">
                                        <div class="display-3">
                                            Invoice
                                        </div>
                                        <p>Invoice# : <span>{{ $paymentHistory->invoice_id }}</span></p>
                                        <p>Date : <span>{{ \Carbon\Carbon::parse($paymentHistory->created_at)->format("F d, Y") }}</span></p>
                                        <p>Paid Date : <span>{{ \Carbon\Carbon::parse($paymentHistory->paid_date)->format("F d, Y") }}</span></p>
                                        <p>Method : <span>{{ ucwords($paymentHistory->payment_method->payment_method ?? "-") }}</span></p>
                                        <p>Transaction # : <span>{{ ucwords($paymentHistory->transaction_id ?? "-") }}</span></p>
                                    </div>
                                </div><!-- End: .d-flex -->
                                <div class="d-flex justify-content-center mb-lg-0 mb-25">
                                    <div class="payment-invoice-qr__code bg-white radius-xl p-20">
                                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ urlencode(route("publisher.payments.invoice", ['payment_history' => $paymentHistory->id])) }}" alt="qr">
                                    </div>
                                </div><!-- End: .d-flex -->
                                <div class="d-flex justify-content-center">
                                    <div class="payment-invoice-qr__address pt-15">
                                        @php
                                            $processingFees = 0;
                                            $phone = explode(' ', $company->phone_number);
                                        @endphp
                                        <p>Invoice To:</p>
                                        <span>{{ $paymentHistory->user->first_name }} {{ $paymentHistory->user->last_name }} (ID: {{ $paymentHistory->user->sid }})</span><br>
                                        <span>Legal Name: {{ $company->company_name }}</span><br>
                                        <span>Address: {{ $company->address }}@if($company->address_2),<br>{{ $company->address_2 }}@endif</span><br>
                                        <span>Phone: {{ isset($phone[1]) ? $phone[1] : $phone[0] }}</span>
                                    </div>
                                </div><!-- End: .d-flex -->
                            </div><!-- End: .payment-invoice-qr -->
                            <div class="payment-invoice-table">
                             <div>
    @if($paymentHistory->converted_amount && $paymentHistory->payment_method->payment_method != 'payoneer')
        {{-- Converted amount exists and payment method is NOT Payoneer --}}
        @include("template.publisher.payments.invoice.converted")
    @else
        {{-- Either no converted amount OR payment method is Payoneer --}}
        @include("template.publisher.payments.invoice.non-converted")
    @endif
</div>
                                <div class="payment-invoice__btn mt-lg-50 pt-lg-30 mt-30 pt-20 no-print">
                                    {{--                                    <button type="button" class="btn border rounded-pill bg-normal text-gray px-25 print-btn">--}}
                                    {{--                                        <span data-feather="printer"></span>print</button>--}}
                                    {{--                                    <button type="button" class="btn-primary btn rounded-pill px-25 text-white download">--}}
                                    {{--                                        <span data-feather="download"></span>download</button>--}}
                                    <button onclick="printInvoice()" type="button" class="btn-primary btn rounded-pill px-25 text-white download">
                                        <span data-feather="download"></span>print</button>
                                </div>
                            </div><!-- End: .payment-invoice-table -->
                        </div><!-- End: .payment-invoice__body -->
                    </div><!-- End: .payment-invoice -->
                </div><!-- End: .col -->
            </div>
        </div>
    </div>
@endsection
