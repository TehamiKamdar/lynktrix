<table class="table table-bordered">
    <thead>
        <tr>
            <th class="font-size14">Name</th>
            <th class="font-size14">Type</th>
            <th class="font-size14">Category</th>
            <th class="text-center font-size12">Last Updated</th>
            <th class="text-center font-size12">Status</th>
            <th class="text-center font-size12">Action</th>
        </tr>
    </thead>
    <tbody id="websiteContent">
        @foreach($websites as $website)
            <tr id="website-row-{{ $website->id }}">
                <td>
                    <a href="{{ url($website->url) }}" target="_blank">{{ $website->name }}</a>
                </td>
                <td>
                    {{ implode(', ', \App\Helper\PublisherData::getMixNames($website->partner_types)) }}
                </td>
                <td>
                    {{ implode(', ', \App\Helper\PublisherData::getMixNames($website->categories)) }}
                </td>
                <td class="text-center">
                    {{ \Carbon\Carbon::parse($website->updated_at)->format("m/d/Y") }}
                </td>
                <td class="text-center" id="status-{{ $website->id }}">
                    <?php
                        $class = $website->status == \App\Models\User::ACTIVE ? "badge-success" : (($website->status == \App\Models\User::PENDING) ? "badge-warning text-white" : "badge-danger");
                    ?>
                    <div class='badge {{ $class }}'>{{ ucwords($website->status) }}</div>
                </td>
                <td class="text-center">
                    @if($website->status == \App\Models\Website::PENDING)
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#verify-modal" onclick="openVerifyModal('{{ $website->id }}', '{{ $website->url }}')">Verify</a> |
                    @endif
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#website-modal" onclick="openWebsiteModal(1, '{{ $website->id }}')">Edit</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="website-modal modal fade show" id="website-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <form action="javascript:void(0)" id="websiteForm">
            <input type="hidden" id="website_id" name="website_id">
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
                                <label for="website_name" class="font-weight-bold text-black font-size14">Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="website_name" name="website_name" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="website_url" class="font-weight-bold text-black font-size14">URL<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="website_url" name="website_url" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="partner_types" class="font-weight-bold text-black font-size14">Partner Type (Max. 3)<span class="text-danger">*</span></label>
                                <div class="atbd-select ">
                                    <select name="partner_types[]" id="partner_types" class="form-control" multiple="multiple">
                                        @foreach($methods as $method)
                                            <option value="{{ $method['id'] }}">{{ $method['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="categories" class="font-weight-bold text-black font-size14">Category (Max. 4)<span class="text-danger">*</span></label>
                                <div class="atbd-select ">
                                    <select name="categories[]" id="categories" class="form-control " multiple="multiple">
                                        @foreach($categories as $category)
                                            <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="monthly_traffic" class="font-weight-bold text-black font-size14">Monthly Traffic<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="monthly_traffic" name="monthly_traffic" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="monthly_page_views" class="font-weight-bold text-black font-size14">Monthly Page Views<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="monthly_page_views" name="monthly_page_views" placeholder="">
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

<div class="verify-modal modal fade show" id="verify-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content modal-bg-white">
            <div class="modal-header">
                <h6 class="modal-title text-black">Verify Ownership</h6>
                <button type="button" class="close" data-dismiss="modal" id="closeVerifyModal" aria-label="Close">
                    <span data-feather="x"></span>
                </button>
            </div>
            <div class="modal-body" id="verifyForm">

                <div class="row">
                    <div class="col-lg-12">
                        <label class="font-weight-bold text-black font-size14">HTML Tag</label>
                        <textarea class="form-control" rows="3" id="htmlTag"></textarea>
                        <a href="javascript:void(0)" id="copyHTMLTag" class="btn btn-default btn-squared btn-outline-light btn-sm mt-2 float-right">Copy</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="version-list mb-4">
                            <div class="version-list__single">
                                <ul class="version-info">
                                    <li>Step 1: Add the meta tag to the &lt;head&gt; section</li>
                                    <li>Step 2: Click Verify</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-center">
                <a href="javascript:void(0)" id="websiteVerify" class="btn btn-primary btn-sm">Verify</a>
            </div>
        </div>
    </div>
</div>
