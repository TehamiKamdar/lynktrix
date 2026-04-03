@extends("layouts.admin.panel_app")

@section("content")
    <div class="contents">

        <div class="container-fluid">
            <div class="social-dash-wrap">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="breadcrumb-main">
                            <h4 class="text-capitalize breadcrumb-title">{{ trans('global.show') }} {{ trans('cruds.role.title') }}</h4>
                            <div class="breadcrumb-action justify-content-center flex-wrap">
                                <div class="action-btn">
                                    <a href="{{ route("admin.user-management.roles.index") }}" class="btn btn-sm btn-gray btn-add">
                                        <i class="la la-undo"></i> {{ trans('global.back_to_list') }}</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-2">
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                        <tr>
                                            <th>
                                                {{ trans('cruds.role.fields.id') }}
                                            </th>
                                            <td>
                                                {{ $role->id }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                {{ trans('cruds.role.fields.title') }}
                                            </th>
                                            <td>
                                                {{ $role->title }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                {{ trans('cruds.role.fields.permissions') }}
                                            </th>
                                            <td>
                                                {!! '<span class="badge badge-info">' . implode('</span> <span class="badge badge-info">', $role->permissions->pluck('title')->toArray()) . '</span>' !!}
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
