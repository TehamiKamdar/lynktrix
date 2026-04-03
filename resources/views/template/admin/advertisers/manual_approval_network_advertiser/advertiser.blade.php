@extends("layouts.admin.panel_table")

@pushonce('styles')
@endpushonce

@pushonce('scripts')
    <script type="text/javascript">

        function sendStatusData(ids, status)
        {
            $.ajax({
                url: "{{ route('admin.manual_approval_advertiser_is_delete_from_network.store') }}",
                type: 'POST',
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                data: { ids, status }
            }).done(function () {
                location.reload()
            });
        }

        function getWebsiteList()
        {
            $.ajax({
                url: '{{ route("get-websites-by-user") }}',
                type: 'POST',
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                data: {"publisher": $("#publisher").val()},
                success: function (response) {
                    $("#website")
                        .empty();

                    $("#website").append('<option disabled selected="selected">Please Select</option>')

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

                    // if(jQuery.isEmptyObject(response)) {
                    //
                    //     // $.each(response, function(key, value){
                    //     //     console.log(value)
                    //     //     // $('#website').append(`
                    //     //     //     <option value="${key}">${value}</option>
                    //     //     // `);
                    //     // });
                    //
                    // } else {
                    //     $("#website")
                    //         .append('<option disabled selected="selected">No Data Found</option>');
                    // }
                },
                error: function (response) {

                }
            });
        }

        $(function () {

            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

            function statusChange(status, approveButtonTrans, color)
            {
                let approveButton = {
                    text: approveButtonTrans,
                    className: `btn-${color} btn-xs ml-3`,
                    action: function (e, dt, node, config) {
                        let ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
                            return $(entry).attr("id");
                        });
                        if (ids.length === 0) {
                            alert('{{ trans('global.datatables.zero_selected') }}')
                            return
                        }
                        if (confirm('{{ trans('global.areYouSure') }}')) {
                            sendStatusData(ids, status)
                        }
                    }
                }
                dtButtons.push(approveButton)
            }

            @if($type->value == "hold")
                statusChange("{{ \App\Models\AdvertiserApply::STATUS_HOLD }}", "Hold", "success")
                statusChange("{{ \App\Models\AdvertiserApply::STATUS_HOLD_CANCEL }}", "Cancel", "danger")
            @elseif($type->value == "active")
                statusChange("{{ \App\Models\AdvertiserApply::STATUS_ACTIVE }}", "Active", "success")
                statusChange("{{ \App\Models\AdvertiserApply::STATUS_ACTIVE_CANCEL }}", "Cancel", "danger")
            @endif
            {{--            statusChange("{{ \App\Models\AdvertiserApply::STATUS_ACTIVE }}", "Approve", "success")--}}

            $('#datatableApprovalNetworkAdvertiser').dataTable({
                order:          [[1, 'desc']],
                scrollY:        true,
                scrollX:        true,
                scrollCollapse: true,
                paging:         true,
                autoWidth:      true,
                deferRender:    true,
                sScrollXInner:  "99.5%",
                ajax: {
                    url: "{{ route('admin.manual_approval_advertiser_is_delete_from_network', ['type' => $type->value]) }}",
                    data: function (d) {
                        d.source = $('#source').val();
                        d.country = $('#country').val();
                    }
                },
                columns: [
                    {data: 'id', name: 'id', width: "1%"},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'source', name: 'source'},
                    {data: 'advertiser_id', name: 'advertiser_id'},
                    {data: 'sid', name: 'sid'},
                    {data: 'name', name: 'name'},
                    {data: 'primary_regions', name: 'primary_regions'},
                    {data: 'type', name: 'type'},
                    {data: 'action', name: 'action', orderable: false, searchable: false, width: "0%"},
                ],
                buttons: dtButtons
            });

            $('#country').change(() => {
                $('#datatableApprovalNetworkAdvertiser').DataTable().draw();
            });

            $('#source').change(() => {
                $('#datatableApprovalNetworkAdvertiser').DataTable().draw();
            });
        });
    </script>
@endpushonce

@section("content")

    <div class="contents">

        <div class="container-fluid">
            <div class="social-dash-wrap">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="breadcrumb-main">
                            <h4 class="text-capitalize breadcrumb-title">{{ trans('advertiser.manual_approval_advertiser_is_delete_from_network.title') }} {{ ucwords($type->value) }}</h4>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="breadcrumb-main">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-4">
                                    </div>
                                    <div class="col-lg-4">
                                        <select class="js-example-basic-single js-states form-control" id="country" name="country">
                                            <option value="" disabled selected>Select Country</option>
                                            @foreach($countries as $country)
                                                <option value="{{ $country['iso2'] }}">{{ $country['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <select class="js-example-basic-single js-states form-control" id="source" name="source">
                                            <option value="" disabled selected>Select Source</option>
                                            @foreach($networks as $network)
                                                <option value="{{ $network }}">{{ ucwords($network) }}</option>
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

                                <table class="table table-bordered table-striped table-hover datatable"
                                       id="datatableApprovalNetworkAdvertiser">
                                    <thead>
                                    <tr class="userDatatable-header footable-header">
                                        <th></th>
                                        <th>
                                            {{ trans('advertiser.api-advertiser.fields.created_at') }}
                                        </th>
                                        <th>
                                            {{ trans('advertiser.api-advertiser.fields.source') }}
                                        </th>
                                        <th>
                                            {{ trans('advertiser.api-advertiser.fields.advertiser_id') }}
                                        </th>
                                        <th>
                                            {{ trans('advertiser.api-advertiser.fields.advertiser_sid') }}
                                        </th>
                                        <th>
                                            {{ trans('advertiser.api-advertiser.fields.name') }}
                                        </th>
                                        <th>
                                            {{ trans('advertiser.api-advertiser.fields.primary_region') }}
                                        </th>
                                        <th>
                                            {{ trans('advertiser.api-advertiser.fields.type') }}
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

@endsection
