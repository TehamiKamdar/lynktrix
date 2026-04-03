<div class="row">
    <div class="col-lg-12">
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <label for="name" class="font-weight-bold text-black">{{ trans('cruds.advertiser_configuration.fields.name') }}</label>
            <select name="name" id="name" class="form-control" required>
                <option value="" selected disabled>Please Select</option>
                @foreach($networks as $network)
                    <option value="{{ $network }}" {{ (old('name') == $network || isset($advertiserConfig->name) && $advertiserConfig->name == $network) ? 'selected' : '' }}>{{ $network }}</option>
                @endforeach
            </select>
            @if($errors->has('name'))
                <em class="invalid-feedback">
                    {{ $errors->first('name') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('cruds.advertiser_configuration.fields.name_helper') }}
            </p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="form-group {{ $errors->has('key') ? 'has-error' : '' }}">
            <label for="key" class="font-weight-bold text-black">{{ trans('cruds.advertiser_configuration.fields.key') }}</label>
            <input type="text" id="key" name="key" class="form-control" value="{{ old('key', isset($advertiserConfig) ? $advertiserConfig->key : '') }}" required>
            @if($errors->has('key'))
                <em class="invalid-feedback">
                    {{ $errors->first('key') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('cruds.advertiser_configuration.fields.key_helper') }}
            </p>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group {{ $errors->has('value') ? 'has-error' : '' }}">
            <label for="value" class="font-weight-bold text-black">{{ trans('cruds.advertiser_configuration.fields.value') }}</label>
            <input type="text" id="value" name="value" class="form-control" value="{{ old('value', isset($advertiserConfig) ? $advertiserConfig->value : '') }}" required>
            @if($errors->has('value'))
                <em class="invalid-feedback">
                    {{ $errors->first('value') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('cruds.advertiser_configuration.fields.value_helper') }}
            </p>
        </div>
    </div>
</div>

<div>
    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
</div>
