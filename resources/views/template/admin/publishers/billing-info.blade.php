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
                    {{ trans('cruds.billing_info.fields.billing_name') }}
                </th>
                <td>
                    {{ $publisher->billing->name ?? "-" }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.billing_info.fields.phone_number') }}
                </th>
                <td>
                    {{ $publisher->billing->phone ?? "-" }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.billing_info.fields.address') }}
                </th>
                <td>
                    {{ $publisher->billing->address ?? "" }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.billing_info.fields.zip_code') }}
                </th>
                <td>
                    {{ $publisher->billing->zip_code ?? "" }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.billing_info.fields.location') }}
                </th>
                <td>
                    {{ $publisher->billing->fetchCity->name ?? "" }}
                    {{ $publisher->billing->fetchState->name ??  "" }}
                    {{ $publisher->billing->fetchCountry->name ?? ""  }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.billing_info.fields.registration_no') }}
                </th>
                <td>
                    {{ $publisher->billing->company_registration_no ?? "" }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.billing_info.fields.tex') }}
                </th>
                <td>
                    {{ $publisher->billing->tax_vat_no ?? 0 }}
                </td>
            </tr>
        </tbody>
    </table>
</div>
