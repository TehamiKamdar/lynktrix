@extends("layouts.publisher.publisher_panel")

@pushonce('styles')

@endpushonce

@pushonce('scripts')

@endpushonce

@section("content")

    <div class="contents">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop-breadcrumb">

                        <div class="breadcrumb-main">
                            <h4 class="text-capitalize breadcrumb-title">Payments</h4>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="orderDatatable global-shadow border py-30 px-sm-30 px-20 bg-white radius-xl w-100 mb-30">
                        <!-- Start Table Responsive -->
                        <div class="table-responsive">
                            <table class="table mb-0 table-hover table-borderless border-0">
                                <thead>
                                <tr class="userDatatable-header">

                                    <th>
                                        <span class="userDatatable-title">Invoice#</span>
                                    </th>
                                    <th>
                                        <span class="userDatatable-title">Date</span>
                                    </th>

                                    <th>
                                        <span class="userDatatable-title">Payment ID</span>
                                    </th>

                                    <th>
                                        <span class="userDatatable-title">Method</span>
                                    </th>
                                    <th>
                                        <span class="userDatatable-title">Paid Amount</span>
                                    </th>
                                    <th>
                                        <span class="userDatatable-title">Paid Date</span>
                                    </th>
                                    <th>
                                        <span class="userDatatable-title">Status</span>
                                    </th>

                                    <th>

                                    </th>
                                </tr>
                                </thead>
                                <tbody>

{{--                                <tr>--}}

{{--                                    <td>--}}
{{--                                        <div class="orderDatatable-title">--}}
{{--                                            LC-INV-854854--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <div class="orderDatatable-title">--}}
{{--                                            05-04-2023--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <div class="orderDatatable-title">--}}
{{--                                            854854--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <div class="orderDatatable-title">--}}
{{--                                            PayPal--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <div class="orderDatatable-title">--}}
{{--                                            $345--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <div class="orderDatatable-title">--}}
{{--                                            ---}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <div class="orderDatatable-status d-inline-block">--}}
{{--                                            <span class="order-bg-opacity-warning  text-warning rounded-pill active">Pending</span>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <div class="btn-group atbd-button-group btn-group-normal" role="group"><a href="#" type="button" class="btn  btn-xs btn-outline-dark">Transactions</a>--}}
{{--                                            <a href="#" type="button" class="btn btn-xs btn-outline-dark">Invoice</a>--}}

{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <!-- End: tr -->--}}

{{--                                <tr>--}}

{{--                                    <td>--}}
{{--                                        <div class="orderDatatable-title">--}}
{{--                                            LC-INV-854125--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <div class="orderDatatable-title">--}}
{{--                                            15-03-2023--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <div class="orderDatatable-title">--}}
{{--                                            854125--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <div class="orderDatatable-title">--}}
{{--                                            PayPal--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <div class="orderDatatable-title">--}}
{{--                                            $650--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <div class="orderDatatable-title">--}}
{{--                                            25-03-2023--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <div class="orderDatatable-status d-inline-block">--}}
{{--                                            <span class="order-bg-opacity-primary  text-primary rounded-pill active">Paid</span>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <div class="btn-group atbd-button-group btn-group-normal" role="group"><a href="#" type="button" class="btn  btn-xs btn-outline-dark">Transactions</a>--}}
{{--                                            <a href="#" type="button" class="btn btn-xs btn-outline-dark">Invoice</a>--}}

{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <!-- End: tr -->--}}

                                    <tr>
                                        <td class="text-center" colspan="8">
                                            <h6 class="my-5">Payments Data Not Exist</h6>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <!-- Table Responsive End -->
                    </div><!-- End: .userDatatable -->
                </div><!-- End: .col -->
            </div>
        </div>
    </div>

@endsection
