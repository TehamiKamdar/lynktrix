<div class="row">
    <div class="col-lg-12">
        <div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
            <label for="key" class="font-weight-bold text-black">{{ trans('cruds.notification.fields.message') }}</label>
            <textarea id="message" name="message" class="form-control" rows="20" cols="30">{{ $setting->value ?? null }}</textarea>
            @if($errors->has('message'))
                <em class="invalid-feedback">
                    {{ $errors->first('message') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('cruds.notification.fields.message_helper') }}
            </p>
        </div>
    </div>
</div>

<div>
    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
</div>
