<div class="table-responsive">
    <table class="table table-bordered table-social">
        <thead>
            <tr>
                <th scope="col" style="width: 15%">Field</th>
                <th scope="col">Value</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>
                    {{ trans('cruds.publisher.fields.id') }}
                </th>
                <td>
                    {{ $publisher->id }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.publisher.fields.sid') }}
                </th>
                <td>
                    {{ $publisher->sid }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.publisher.fields.first_name') }}
                </th>
                <td>
                    {{ $publisher->first_name }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.publisher.fields.last_name') }}
                </th>
                <td>
                    {{ $publisher->last_name }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.publisher.fields.user_name') }}
                </th>
                <td>
                    {{ $publisher->user_name }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.publisher.fields.email') }}
                </th>
                <td>
                    {{ $publisher->email }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.publisher.fields.gender') }}
                </th>
                <td>
                    {{ $publisher->publisher->gender ?? "-" }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.publisher.fields.dob') }}
                </th>
                <td>
                    {{ $publisher->publisher->dob ?? "-" }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.publisher.fields.email_verified_at') }}
                </th>
                <td>
                    {{ $publisher->email_verified_at ?? "-" }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.publisher.fields.remember_token') }}
                </th>
                <td>
                    {{ $publisher->remember_token ? "YES" : "NO" }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.publisher.fields.status') }}
                </th>
                <td>
                    <?php
                    $status = $publisher->status;
                    $class = $status == "active" ? "badge-success" : (($status == "pending") ? "badge-warning" : "badge-danger");
                    ?>
                    <div class="float-left">
                        {!! "<span class='badge {$class}'>".ucwords($status)."</span>" !!}
                    </div>
                    @if($publisher->email_verified_at)
                        <div class="float-right">
                            @if($publisher->status != "active")
                                <a href="{{ route("admin.user-management.users.statusUpdate", ["user" => $publisher->id, "status" => "active"]) }}" class="mr-2 btn btn-xs btn-success text-white float-left">Active</a>
                            @endif
                            @if($publisher->status != "hold")
                                <a href="{{ route("admin.user-management.users.statusUpdate", ["user" => $publisher->id, "status" => "hold"]) }}" class="mr-2 btn btn-xs btn-info text-white float-left">Hold</a>
                            @endif
                            @if($publisher->status != "rejected")
                                <a href="{{ route("admin.user-management.users.statusUpdate", ["user" => $publisher->id, "status" => "rejected"]) }}" class="btn btn-xs btn-danger text-white float-left">Rejected</a>
                            @endif
                        </div>
                    @else
                        <small class="float-right">
                            Email Not Verified
                            @if($publisher->status != "rejected")
                                <a href="{{ route("admin.user-management.users.statusUpdate", ["user" => $publisher->id, "status" => "rejected"]) }}" class="mr-3 btn btn-xs btn-danger text-white float-left">Rejected</a>
                            @endif
                        </small>
                    @endif
                    <div class="clearfix"></div>
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.publisher.fields.api_key') }}
                </th>
                <td>
                    {{ $publisher->api_token ?? "-" }}
                </td>
            </tr>
        </tbody>
    </table>
</div>

