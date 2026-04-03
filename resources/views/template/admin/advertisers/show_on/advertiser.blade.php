@extends("layouts.admin.panel_app")

@pushonce('styles')
    <style>
        .disabled {
            pointer-events: none;
            cursor: pointer;
            opacity: 0.7;
        }
        .btn {
            display: inline-block !important;
        }
        .hide {
            display: none !important;
        }
    </style>
@endpushonce

@pushonce('scripts')
    <script>
        let GET_ADVERTISERS_BY_NETWORK_URL = '{{ route("admin.advertiser-management.api-advertisers.show_on_publisher.get-advertisers-by-network") }}';
        let GET_COUNTRIES_BY_NETWORK_URL = '{{ route("admin.advertiser-management.api-advertisers.show_on_publisher.get-countries-by-network") }}';
    </script>
    <script type="text/javascript" src="{{ \App\Helper\Static\Methods::staticAsset("js/admin/advertiser/show_on.js") }}"></script>
@endpushonce

@section("content")
    <div class="contents">
        <div class="container-fluid">
            <div class="social-dash-wrap">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-main mt-4">
                            <h4 class="text-capitalize breadcrumb-title mt-3">{{ trans('advertiser.api-advertiser.show_on_publisher.title_singular') }}</h4>
                        </div>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                @include("partial.admin.alert")
                                <form action="{{ route("admin.advertiser-management.api-advertisers.show_on_publisher.store") }}" method="post" enctype="multipart/form-data" id="advertiserForm" class="p-5">
                                    @csrf
                                    <input type="hidden" id="page" name="page" value="{{ request()->page }}">
                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <a href="{{ route("admin.advertiser-management.api-advertisers.show_on_publisher.index") }}" class="btn btn-sm btn-danger @if(empty($request->search_by_network || $request->search_by_country)) hide @endif" id="clearFilter">Clear Filter</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group {{ $errors->has('network') ? 'has-error' : '' }}">
                                                <label for="SearchByNetwork" class="font-weight-bold text-black">{{ trans('advertiser.api-advertiser.show_on_publisher.fields.network') }}</label>
                                                <select class="js-example-basic-single js-states form-control" id="SearchByNetwork" name="SearchByNetwork">
                                                    <option value="" disabled selected>Please Select</option>
                                                    @foreach($networks as $network)
                                                        <option value="{{ $network }}" @if($network == request()->search_by_network) selected @endif>{{ $network }}</option>
                                                    @endforeach
                                                    <option value="manual">Manual Added Advertiser</option>
                                                </select>
                                                @if($errors->has('network'))
                                                    <em class="invalid-feedback">{{ $errors->first('network') }}</em>
                                                @endif
                                                <p class="helper-block">{{ trans('advertiser.api-advertiser.show_on_publisher.fields.network_helper') }}</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group {{ $errors->has('country') ? 'has-error' : '' }}">
                                                <label for="SearchByCountry" class="font-weight-bold text-black">{{ trans('advertiser.api-advertiser.show_on_publisher.fields.country') }}</label>
                                                <select class="js-example-basic-single js-states form-control" id="SearchByCountry" name="SearchByCountry">
                                                    <option value="" disabled selected>First Select Network</option>
                                                </select>
                                                @if($errors->has('country'))
                                                    <em class="invalid-feedback">{{ $errors->first('country') }}</em>
                                                @endif
                                                <p class="helper-block">{{ trans('advertiser.api-advertiser.show_on_publisher.fields.country_helper') }}</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group {{ $errors->has('search') ? 'has-error' : '' }}">
                                                <label for="SearchByInput" class="font-weight-bold text-black">{{ trans('advertiser.api-advertiser.show_on_publisher.fields.search') }}</label>
                                                <input type="text" class="form-control" id="SearchByInput" name="SearchByInput" @if(empty($request->search_by_network || $request->search_by_country)) disabled @endif value="{{ $request->search_by_input }}" />
                                                @if($errors->has('search'))
                                                    <em class="invalid-feedback">{{ $errors->first('search') }}</em>
                                                @endif
                                                <p class="helper-block">{{ trans('advertiser.api-advertiser.show_on_publisher.fields.search_helper') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                    <td colspan="4">
                                                        <label class="p-0 m-0 font-weight-bold text-black">Advertiser List</label>
                                                        <div class="float-right">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input type="checkbox" class="form-check-input disabled" id="selectAll" name="selectAll" disabled value="1"> Select All
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </td>
                                                </tr>
                                                </thead>
                                                <tbody id="advertiserContent">
                                                    <tr>
                                                        <td colspan="4" class="text-center">
                                                            <small>No Advertiser Exist</small>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <td>
                                                        <button type="submit" class="btn btn-xs btn-primary disabled" id="updateBttn" disabled>Update</button>
                                                    </td>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
