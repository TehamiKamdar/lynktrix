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
                    {{ trans('cruds.payment_settings.fields.payment_frequency') }}
                </th>
                <td>
                    {{ $publisher->payment_setting->payment_frequency ?? "-" }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.payment_settings.fields.payment_threshold') }}
                </th>
                <td>
                    ${{ $publisher->payment_setting->payment_threshold ?? "-" }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.payment_settings.fields.payment_method') }}
                </th>
                <td>
                    {{ $publisher->payment_setting->payment_method ?? "-" }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.payment_settings.fields.bank_location') }}
                </th>
                <td>
                    {{ $publisher->payment_setting->fetchBankLocation->name ?? "-" }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.payment_settings.fields.account_holder_name') }}
                </th>
                <td>
                    {{ $publisher->payment_setting->account_holder_name ?? "-" }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.payment_settings.fields.bank_account_number') }}
                </th>
                <td>
                    {{ $publisher->payment_setting->bank_account_number ?? "-" }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.payment_settings.fields.bank_code') }}
                </th>
                <td>
                    {{ $publisher->payment_setting->bank_code ?? "-" }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.payment_settings.fields.account_type') }}
                </th>
                <td>
                    {{ $publisher->payment_setting->account_type ?? "-" }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.payment_settings.fields.paypal_country') }}
                </th>
                <td>
                    {{ $publisher->payment_setting->fetchCountry->name ?? "-" }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.payment_settings.fields.paypal_holder_name') }}
                </th>
                <td>
                    {{ $publisher->payment_setting->paypal_holder_name ?? "-" }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.payment_settings.fields.paypal_email') }}
                </th>
                <td>
                    {{ $publisher->payment_setting->paypal_email ?? "-" }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.payment_settings.fields.payoneer_holder_name') }}
                </th>
                <td>
                    {{ $publisher->payment_setting->payoneer_holder_name ?? "-" }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.payment_settings.fields.payoneer_email') }}
                </th>
                <td>
                    {{ $publisher->payment_setting->payoneer_email ?? "-" }}
                </td>
            </tr>
        </tbody>
    </table>
</div>
