<div class="row">
    <div class="col-lg-12">
        <div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">
            <label for="roles" class="font-weight-bold text-black">{{ trans('cruds.user.fields.roles') }}</label>
            <select name="roles" id="roles" class="form-control" required>
                <option value="" selected disabled>Please Select</option>
                @foreach($roles as $id => $roles)
                    <option value="{{ $id }}" {{ (old('roles') == $id || isset($user) && $user->roles->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>
                @endforeach
            </select>
            @if($errors->has('roles'))
                <em class="invalid-feedback">
                    {{ $errors->first('roles') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('cruds.user.fields.roles_helper') }}
            </p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
            <label for="first_name" class="font-weight-bold text-black">{{ trans('cruds.user.fields.first_name') }}</label>
            <input type="text" id="first_name" name="first_name" class="form-control" value="{{ old('first_name', isset($user) ? $user->first_name : '') }}" required>
            @if($errors->has('first_name'))
                <em class="invalid-feedback">
                    {{ $errors->first('first_name') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('cruds.user.fields.first_name_helper') }}
            </p>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
            <label for="last_name" class="font-weight-bold text-black">{{ trans('cruds.user.fields.last_name') }}</label>
            <input type="text" id="last_name" name="last_name" class="form-control" value="{{ old('last_name', isset($user) ? $user->last_name : '') }}" required>
            @if($errors->has('last_name'))
                <em class="invalid-feedback">
                    {{ $errors->first('last_name') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('cruds.user.fields.last_name_helper') }}
            </p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="form-group {{ $errors->has('user_name') ? 'has-error' : '' }}">
            <label for="user_name" class="font-weight-bold text-black">{{ trans('cruds.user.fields.user_name') }}</label>
            <input type="text" id="user_name" name="user_name" class="form-control" value="{{ old('user_name', isset($user) ? $user->user_name : '') }}" required>
            @if($errors->has('user_name'))
                <em class="invalid-feedback">
                    {{ $errors->first('user_name') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('cruds.user.fields.user_name_helper') }}
            </p>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            <label for="email" class="font-weight-bold text-black">{{ trans('cruds.user.fields.email') }}</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($user) ? $user->email : '') }}" required>
            @if($errors->has('email'))
                <em class="invalid-feedback">
                    {{ $errors->first('email') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('cruds.user.fields.email_helper') }}
            </p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
            <label for="password" class="font-weight-bold text-black">{{ trans('cruds.user.fields.password') }} {!! isset($user->id) ? null : '<span class="text-danger">*</span>' !!}</label>
            <input type="password" id="password" name="password" class="form-control" {{ isset($user->id) ? null : 'required' }}>
            @if($errors->has('password'))
                <em class="invalid-feedback">
                    {{ $errors->first('password') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('cruds.user.fields.password_helper') }}
            </p>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group {{ $errors->has('confirm_password') ? 'has-error' : '' }}">
            <label for="confirm_password" class="font-weight-bold text-black">{{ trans('cruds.user.fields.confirm_password') }} {!! isset($user->id) ? null : '<span class="text-danger">*</span>' !!}</label>
            <input type="password" id="confirm_password" name="confirm_password" class="form-control" {{ isset($user->id) ? null : 'required' }}>
            @if($errors->has('confirm_password'))
                <em class="invalid-feedback">
                    {{ $errors->first('confirm_password') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('cruds.user.fields.confirm_password_helper') }}
            </p>
        </div>
    </div>
</div>

<div>
    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
</div>
