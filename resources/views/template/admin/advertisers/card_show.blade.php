
<div class="row">
    <div class="col-lg-12 d-block">
        <div class="changelog mb-30">
            <div class="card">
                <div class="card-body p-30">
                    <div class="changelog__according">
                        <div class="changelog__accordingWrapper">
                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header w-100" id="headingsix">
                                        <div role="button" class="w-100 changelog__accordingCollapsed collapsed" data-toggle="collapse" data-target="#collapsesix" aria-expanded="true" aria-controls="collapsesix">
                                            <div class="changelog__accordingTitle d-flex justify-content-between w-100">
                                                <div class="v-num">Basic Info</div>
                                                <div class="changelog__accordingArrow">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="collapsesix" class="collapse" aria-labelledby="headingsix" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-social">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">Field</th>
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
                                                            {{ trans('cruds.publisher.fields.email_verified_at') }}
                                                        </th>
                                                        <td>
                                                            {{ $publisher->email_verified_at ?? "N/A" }}
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
                                                            {!! "<span class='badge {$class}'>".ucwords($status)."</span>" !!}
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @foreach($publisher->websites as $key => $website)
                                        <?php
                                        $url = $website->url ? "<a href='{$website->url}'>{$website->url}</a>" : "N/A";
                                        ?>
                                    <div class="card">
                                        <div class="card-header w-100" id="websiteContent{{ $website->id }}">
                                            <div role="button" class="w-100 changelog__accordingCollapsed collapsed" data-toggle="collapse" data-target="#collapse{{ $website->id }}" aria-expanded="true" aria-controls="collapse{{ $website->id }}">
                                                <div class="changelog__accordingTitle d-flex justify-content-between w-100">
                                                    <div class="v-num">Website Information ({!! strtolower($url) !!})</div>
                                                    <div class="changelog__accordingArrow">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="collapse{{ $website->id }}" class="collapse" aria-labelledby="websiteContent{{ $website->id }}" data-parent="#accordion">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-social">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col">Field</th>
                                                            <th scope="col">Value</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <th>
                                                                {{ trans('cruds.publisher.website.fields.id') }}
                                                            </th>
                                                            <td>
                                                                {{ $website->id }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                {{ trans('cruds.publisher.website.fields.category') }}
                                                            </th>
                                                            <td>
                                                                {{ $website->category ?? "N/A" }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                {{ trans('cruds.publisher.website.fields.partner_type') }}
                                                            </th>
                                                            <td>
                                                                {{ $website->partner_type ?? "N/A" }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                {{ trans('cruds.publisher.website.fields.property_type_website') }}
                                                            </th>
                                                            <td>
                                                                {{ $website->property_type_website ?? "N/A" }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                {{ trans('cruds.publisher.website.fields.property_type_app') }}
                                                            </th>
                                                            <td>
                                                                {{ $website->property_type_app ?? "N/A" }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                {{ trans('cruds.publisher.website.fields.media_kit') }}
                                                            </th>
                                                            <td>
                                                                {{ $website->media_kit ?? "N/A" }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                {{ trans('cruds.publisher.website.fields.url') }}
                                                            </th>
                                                            <td>
                                                                {!! $url !!}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                {{ trans('cruds.publisher.website.fields.website_logo') }}
                                                            </th>
                                                            <td>
                                                                {!! $website->website_logo ? "<img class='w-25' src='{$website->website_logo}$' class='img-thumbnail img-responsive' />" : "N/A" !!}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                {{ trans('cruds.publisher.website.fields.app_logo') }}
                                                            </th>
                                                            <td>
                                                                {!! $website->app_logo ? "<img class='w-25' src='{$website->app_logo}$' class='img-thumbnail img-responsive' />" : "N/A" !!}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                {{ trans('cruds.publisher.website.fields.status') }}
                                                            </th>
                                                            <td>
                                                                    <?php
                                                                    $status = $website->status;
                                                                    $class = $status == "active" ? "badge-success" : (($status == "pending") ? "badge-warning" : "badge-danger");
                                                                    $status = "<span class='badge {$class}'>".ucwords($status)."</span>";
                                                                    ?>
                                                                {!! $status ?? "N/A" !!}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                {{ trans('cruds.publisher.website.fields.intro') }}
                                                            </th>
                                                            <td>
                                                                {!! $website->intro ?? "N/A" !!}
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
