@extends("layouts.admin.panel_app")

@pushonce('styles')
    <style>
        .disabled {
            pointer-events: none;
            cursor: pointer;
            opacity: 0.7;
        }
        a.dropdown-item.active {
            color: #FFFFFF;
        }
    </style>
@endpushonce

@pushonce('scripts')
    <script>
        function assignedFunc(event, id, url, rowID)
        {
            $(`#assign${rowID} .unassign`).removeClass('active');

            let status = "{{ \App\Helper\Static\Vars::ADVERTISER_AVAILABLE }}";
            if($(event).hasClass('active')) {
                $(event).removeClass("active");
                status = "{{ \App\Helper\Static\Vars::ADVERTISER_NOT_AVAILABLE }}";
            }
            else {
                $(event).addClass("active");
            }
            updateAdvertiser(id, url, status, rowID);
        }

        function unassignedFunc(event, url, rowID)
        {
            $(`#assign${rowID} .dropdown-item`).removeClass('active');
            $(event).addClass("active");
            updateAdvertiser(null, url, null, rowID);
        }

        function updateAdvertiser(id, url, status, rowID)
        {
            $.ajax({
                url: '{{ route("admin.advertiser-management.api-advertisers.duplicate_record.store") }}',
                type: 'POST',
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                data: {id, url, status},
                success: function (response) {
                    $(`#assignedTo${rowID}`).text(response.data.source);
                },
                error: function (response) {

                }
            });
        }

        document.addEventListener("DOMContentLoaded", function () {
            $("#assignedFilter").change((event) => {

                // Get the current URL
                let currentURL = new URL(window.location.href);

                // Add a new query parameter
                currentURL.searchParams.set('filter', event.target.value);

                // Replace the current URL with the updated URL
                window.history.replaceState({}, '', currentURL.href);

                window.location.reload();

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
                            <h4 class="text-capitalize breadcrumb-title mt-3">{{ trans('advertiser.api-advertiser.duplicate_record.title_singular') }}</h4>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="breadcrumb-main">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-4">

                                    </div>
                                    <div class="col-lg-4">
                                    </div>
                                    <div class="col-lg-4">
                                        <select class="js-example-basic-single js-states form-control" id="assignedFilter">
                                            <option value="" disabled selected>Assigned</option>
                                            <option @if(request()->filter == "Yes") selected @endif>Yes</option>
                                            <option @if(request()->filter == "No") selected @endif>No</option>
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


                                <table class="table table table-condensed table-bordered table-striped table-hover datatable">
                                    <thead>
                                        <tr class="userDatatable-header footable-header">
                                            <th style="width: 25%;">
                                                Advertiser URL
                                            </th>
                                            <th style="width: 40%;">
                                                Networks
                                            </th>
                                            <th style="width: 15%;">
                                                Assigned To
                                            </th>
                                            <th style="width: 20%;">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($advertisers as $key => $advertiser)
                                            @php
                                                $assignNames = [];
                                            @endphp
                                            <tr>
                                                <td>{{ $advertiser['url'] ?? '-' }}</td>
                                                <td>
                                                    @foreach($advertiser['network_names'] as $network)
                                                        @if($network['status'])
                                                            @php
                                                                $assignNames[] = $network['name'];
                                                            @endphp
                                                        @endif
                                                        <a href="{{ route("admin.advertiser-management.api-advertisers.show", ['api_advertiser' => $network['id']]) }}">{{ $network['name'] }}</a> - @if($network['commission']) {{ $network['commission'] }}{{ $network['type'] }} @else N/A @endif<br>
                                                    @endforeach
                                                </td>
                                                <td id="assignedTo{{ $key }}">
                                                    @if(count($assignNames))
                                                        {{ implode(', ', $assignNames) }}
                                                    @else
                                                        Not Assigned
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn btn-primary btn-default btn-squared dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Assign
                                                            <i class="la la-angle-down"></i>
                                                        </button>
                                                        <div class="dropdown-menu" id="assign{{ $key }}" aria-labelledby="dropdownMenuButton">
                                                            @foreach($advertiser['network_names'] as $network)
                                                                <a onclick="assignedFunc(this, `{{ $network['id'] }}`, `{{ $advertiser['url'] }}`, `{{ $key }}`)" class="dropdown-item {{ in_array($network['name'], $assignNames) ? "active" : null }}" href="javascript:void(0);">{{ $network['name'] }}</a>
                                                            @endforeach
                                                            <a onclick="unassignedFunc(this, `{{ $advertiser['url'] }}`, `{{ $key }}`)" class="dropdown-item unassign {{ count($assignNames) ? null : "active" }}" href="javascript:void(0);">Do not Show</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
