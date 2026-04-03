<div class="changelog__according">
    <div class="changelog__accordingWrapper">
        <div id="accordionCompanies">
            @foreach($publisher->companies as $key => $company)
                <div class="card">
                    <div class="card-header w-100" id="companyContent{{ $company->id }}">
                        <div role="button" class="w-100 changelog__accordingCollapsed {{ $key > 0 ? "collapsed" : null }}" data-toggle="collapse" data-target="#collapse{{ $company->id }}" aria-expanded="{{ $key == 0 }}" aria-controls="collapse{{ $company->id }}">
                            <div class="changelog__accordingTitle d-flex justify-content-between w-100">
                                <div class="v-num">Company Information ({{ $company->company_name }})</div>
                                <div class="changelog__accordingArrow">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="collapse{{ $company->id }}" class="collapse {{ $key == 0 ? "show" : null }}" aria-labelledby="companyContent{{ $company->id }}" data-parent="#accordionCompanies">
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
                                            {{ trans('cruds.publisher.company.fields.id') }}
                                        </th>
                                        <td>
                                            {{ $company->id }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.publisher.company.fields.company_name') }}
                                        </th>
                                        <td>
                                            {{ $company->company_name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.publisher.company.fields.legal_entity_type') }}
                                        </th>
                                        <td>
                                            {{ $company->legal_entity_type }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.publisher.company.fields.country') }}
                                        </th>
                                        <td>
                                            {{ \App\Helper\Static\Methods::getCountryByID($company->country)->name ?? "-" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.publisher.company.fields.city') }}
                                        </th>
                                        <td>
                                            {{ \App\Helper\Static\Methods::getCityByID($company->city)->name ?? "-" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.publisher.company.fields.state') }}
                                        </th>
                                        <td>
                                            {{ \App\Helper\Static\Methods::getStateByID($company->state)->name ?? "-" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.publisher.company.fields.zip_code') }}
                                        </th>
                                        <td>
                                            {{ $company->zip_code }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.publisher.company.fields.address') }}
                                        </th>
                                        <td>
                                            {{ $company->address }}
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
