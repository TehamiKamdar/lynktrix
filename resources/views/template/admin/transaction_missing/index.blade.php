@extends("layouts.admin.panel_table")

@pushonce('styles')
@endpushonce

@pushonce('scripts')
    <script type="text/javascript">
        function openModal(id)
        {
            $("#transaction_id").val(id);
        }
        $(function () {

            $('#datatableTransaction').dataTable({
                order:          [[2, 'desc']],
                scrollY:        true,
                scrollX:        true,
                scrollCollapse: true,
                paging:         true,
                autoWidth:      true,
                deferRender:    true,
                sScrollXInner:  "150%",
                ajax: {
                    url: "{{ route('admin.transactions.index') }}",
                    data: function (d) {
                        d.source = $('#source').val();
                        d.country = $('#country').val();
                        d.search_filter = $('#search_filter').val();
                        d.route_name = "{{ request()->route()->getName() }}";
                    }
                },
                columns: [
                    {data: 'transaction_id', name: 'transaction_id'},
                    {data: 'assign', name: 'assign', orderable: false, searchable: false},
                    {data: 'advertiser_name', name: 'advertiser_name', orderable: false, searchable: false},
                    {data: 'transaction_date', name: 'transaction_date'},
                    {data: 'publisher_url', name: 'publisher_url'},
                    {data: 'customer_country', name: 'customer_country'},
                    {data: 'advertiser_country', name: 'advertiser_country'},
                    {data: 'commission_status', name: 'commission_status'},
                    {data: 'commission_amount', name: 'commission_amount'},
                    {data: 'commission_amount_currency', name: 'commission_amount_currency'},
                    {data: 'sale_amount', name: 'sale_amount'},
                    {data: 'sale_amount_currency', name: 'sale_amount_currency'},
                    {data: 'source', name: 'source'},
                    {data: 'action', name: 'action', orderable: false, searchable: false, width: "0%"},
                ],
                columnDefs: [{
                    orderable: false,
                    className: '',
                    targets: 0
                }, {
                }],
                buttons: [{}]
            });

            $('#source').change(() => {
                $('#datatableTransaction').DataTable().draw();
            });

            $('#country').change(() => {
                $('#datatableTransaction').DataTable().draw();
            });

            $('#search_filter').change(() => {
                $('#datatableTransaction').DataTable().draw();
            });

            $("#publisher").change(() => {
                $.ajax({
                    url: '{{ route("get-websites-by-user") }}',
                    type: 'POST',
                    headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                    data: {"publisher": $("#publisher").val()},
                    success: function (response) {
                        $("#website")
                            .empty()
                            .append('<option disabled selected="selected">Please Select</option>')

                        if(Object.keys(response).length)
                        {
                            for(key in response)
                            {
                                $('#website').append(`
                                <option value="${key}">${response[key]}</option>
                            `);
                            }
                        } else {
                            $("#website")
                                .append('<option disabled selected="selected">No Data Found</option>');
                        }
                    },
                    error: function (response) {

                    }
                });
            });

        });
    </script>

@endpushonce

@section("content")

    <div class="contents">

        <div class="container-fluid">
            <div class="social-dash-wrap">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="breadcrumb-main">
                            <h4 class="text-capitalize breadcrumb-title">{{ trans('cruds.transaction_missing.title') }} {{ trans('global.list') }}</h4>
                            <div class="breadcrumb-action justify-content-center flex-wrap">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="source" class="font-weight-bold text-black">Source: </label>
                                        <select class="js-example-basic-single js-states form-control" id="source" name="source">
                                            <option value="" disabled selected>Select</option>
                                            @foreach(\App\Helper\Static\Vars::OPTION_LIST as $list)
                                                <option value="{{ $list }}">{{ ucwords($list) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="source" class="font-weight-bold text-black">Country: </label>
                                        <select class="js-example-basic-single js-states form-control" id="country" name="country">
                                            <option value="" disabled selected>Select</option>
                                            @foreach($countries as $country)
                                                <option value="{{ $country['iso2'] }}">{{ $country['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="source" class="font-weight-bold text-black">Search Filter: </label>
                                        <select class="js-example-basic-single js-states form-control" id="search_filter" name="search_filter">
                                            <option value="" disabled selected>Select</option>
                                            @foreach($columns as $column)
                                                <option value="{{ $column }}">{{ $column }}</option>
                                            @endforeach
                                        </select>
                                    </div>
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

                                <table class="table table table-condensed table-bordered table-striped table-hover datatable"
                                       id="datatableTransaction">
                                    <thead>
                                    <tr class="userDatatable-header footable-header">
                                        <th>
                                            {{ trans('cruds.transaction.fields.transaction_id') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.transaction.fields.assign') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.transaction.fields.advertiser_name') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.transaction.fields.transaction_date') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.transaction.fields.publisher_url') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.transaction.fields.customer_country') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.transaction.fields.advertiser_country') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.transaction.fields.commission_status') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.transaction.fields.commission_amount') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.transaction.fields.commission_amount_currency') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.transaction.fields.sale_amount') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.transaction.fields.sale_amount_currency') }}
                                        </th>
                                        <th>
                                            {{ trans('advertiser.api-advertiser.fields.source') }}
                                        </th>
                                        <th>
                                            {{ trans('global.action') }}
                                        </th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="website-modal modal fade show" id="missing-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <form action="{{ route("admin.transactions.missing.store") }}" method="post"
                  enctype="multipart/form-data" id="setMissingTransactionForm" class="p-5">
                @csrf

                <input type="hidden" id="transaction_id" name="transaction_id">
                <div class="modal-content modal-bg-white">
                    <div class="modal-header">
                        <h6 class="modal-title text-black" id="modelTitle"></h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span data-feather="x"></span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="publisher" class="font-weight-bold text-black">Publisher</label>
                                    <select class="js-example-basic-single js-states form-control" id="publisher" name="publisher">
                                        <option value="" selected>Please Select</option>
                                        @foreach($publishers as $publisher)
                                            <option value="{{ $publisher->id }}">{{ $publisher->first_name }} {{ $publisher->last_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="website" class="font-weight-bold text-black">Website</label>
                                    <select class="js-example-basic-single js-states form-control" id="website" name="website">
                                        <option value="" selected>First Select Website</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal" id="closeModal">Cancel</button>
                    </div>
                </div>
            </form>
            <div class="loader-overlay display-hidden" id="showLoader">
                <div class="atbd-spin-dots spin-lg">
                    <span class="spin-dot badge-dot dot-primary"></span>
                    <span class="spin-dot badge-dot dot-primary"></span>
                    <span class="spin-dot badge-dot dot-primary"></span>
                    <span class="spin-dot badge-dot dot-primary"></span>
                </div>
            </div>
        </div>
    </div>

@endsection
