<div class="changelog__according">
    <div class="changelog__accordingWrapper">
        <div id="accordionWebsites">
            @foreach($publisher->websites as $key => $website)
                    <?php
                    $url = $website->url ? "<a href='{$website->url}'>{$website->url}</a>" : "N/A";
                    ?>
                <div class="card">
                    <div class="card-header w-100" id="websiteContent{{ $website->id }}">
                        <div role="button" class="w-100 changelog__accordingCollapsed {{ $key > 0 ? "collapsed" : null }}" data-toggle="collapse" data-target="#collapse{{ $website->id }}" aria-expanded="{{ $key == 0 }}" aria-controls="collapse{{ $website->id }}">
                            <div class="changelog__accordingTitle d-flex justify-content-between w-100">
                                <div class="v-num">Website Information ({!! strtolower($url) !!})</div>
                                <div class="changelog__accordingArrow">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="collapse{{ $website->id }}" class="collapse {{ $key == 0 ? "show" : null }}" aria-labelledby="websiteContent{{ $website->id }}" data-parent="#accordionWebsites">
                        <div class="card-body">
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
                                            {{ trans('cruds.publisher.website.fields.id') }}
                                        </th>
                                        <td>
                                            {{ $website->id }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.publisher.website.fields.id') }}
                                        </th>
                                        <td>
                                            {{ $website->admitad_wid }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.publisher.website.fields.category') }}
                                        </th>
                                        <td>
                                            {{ implode(', ', \App\Helper\PublisherData::getMixNames($website->categories)) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.publisher.website.fields.partner_type') }}
                                        </th>
                                        <td>
                                            {{ implode(', ', \App\Helper\PublisherData::getMixNames($website->partner_types)) }}
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
                                            {{ trans('cruds.publisher.website.fields.status') }}
                                        </th>
                                        <td>
                                                <?php
                                                $status = $website->status;
                                                $class = $status == "active" ? "badge-success" : (($status == "pending") ? "badge-warning" : (($status == "hold") ? "badge-info" :  "badge-danger"));
                                                $status = "<span class='badge {$class}'>".ucwords($status)."</span>";
                                                ?>
                                            <div class="float-left">
                                                {!! $status ?? "N/A" !!}
                                            </div>
                                            <div class="float-right">
                                                @if($publisher->email_verified_at)
                                                    @if($website->status != "active")
                                                        <a href="{{ route("admin.publisher-management.publishers.statusUpdate", ["website" => $website->id, "status" => "active"]) }}" class="mr-2 btn btn-xs btn-success text-white float-left">Active</a>
                                                    @endif
                                                    @if($website->status != "hold")
                                                        <a href="{{ route("admin.publisher-management.publishers.statusUpdate", ["website" => $website->id, "status" => "hold"]) }}" class="mr-2 btn btn-xs btn-info text-white float-left">Hold</a>
                                                    @endif
                                                    @if($website->status != "rejected")
                                                        <a href="{{ route("admin.publisher-management.publishers.statusUpdate", ["website" => $website->id, "status" => "rejected"]) }}" class="btn btn-xs btn-danger text-white float-left">Rejected</a>
                                                    @endif
                                                @else
                                                    <small class="float-right">
                                                        Email Not Verified
                                                    </small>
                                                @endif
                                            </div>
                                            <div class="clearfix"></div>
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
                                            {{ trans('cruds.publisher.website.fields.website_logo') }}
                                        </th>
                                        <td>
                                            {!! $website->website_logo ? "<img class='w-25' src='{$website->website_logo}$' class='img-thumbnail img-responsive' />" : "N/A" !!}
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
