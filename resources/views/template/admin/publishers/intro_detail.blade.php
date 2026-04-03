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
                    {{ trans('cruds.publisher.fields.intro') }}
                </th>
                <td>
                    {{ $publisher->publisher->intro ?? "-" }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.publisher.fields.address') }}
                </th>
                <td>
                    {{ $publisher->publisher->location_address_1 ?? "-" }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.publisher.fields.zip_code') }}
                </th>
                <td>
                    {{ $publisher->publisher->zip_code ?? "-" }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.publisher.fields.country') }}
                </th>
                <td>
                    {{ \App\Helper\Static\Methods::getCountryByID($publisher->publisher->location_country)->name ?? "-" }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.publisher.fields.state') }}
                </th>
                <td>
                    {{ \App\Helper\Static\Methods::getCityByID($publisher->publisher->location_state)->name ?? "-" }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.publisher.fields.city') }}
                </th>
                <td>
                    {{ \App\Helper\Static\Methods::getStateByID($publisher->publisher->location_city)->name ?? "-" }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.publisher.fields.language') }}
                </th>
                <td>
                    {!! isset($publisher->publisher->language) ? "<ol><li>".implode("</li><li>", json_decode($publisher->publisher->language, true))."</li></ol>" : "-" !!}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.publisher.fields.customer_reach') }}
                </th>
                <td>
                    {!! isset($publisher->publisher->customer_reach) ? "<ol><li>".implode("</li><li>", json_decode($publisher->publisher->customer_reach, true))."</li></ol>" : "-" !!}
                </td>
            </tr>

        </tbody>
    </table>
</div>
