@extends('dashboard.layouts.app')

@section('title', __('global.Visit Request.fields.update_visit_request'))

@section('content')

<!-- begin:: Content Head -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                <button class="kt-subheader__mobile-toggle kt-subheader__mobile-toggle--left"
                    id="kt_subheader_mobile_toggle"><span></span></button>
                @lang('global.Home Request.fields.update_home_request')
            </h3>

            <span class="kt-subheader__separator kt-hidden"></span>

            <div class="kt-subheader__breadcrumbs">
                <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="{{ route('admin.home_ex_request.index') }}" class="kt-subheader__breadcrumbs-link">
                    @lang('global.Home Request.title')
                </a>

                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="{{ route('admin.home') }}" class="kt-subheader__breadcrumbs-link">
                    @lang('global.home')
                </a>
            </div>
        </div>

    </div>
</div>
<!-- end:: Content Head -->

<div class="container-fluid kt-mb-100">
    <div class="card">
        <div class="card-header">
            <h3>@lang('global.Home Request.fields.update_home_request')</h3>
        </div>
        <div class="card-body">
            <form action="{{route('admin.home_ex_request.update' ,$homeExRequest->id ??'')}}" method="post"
                enctype="multipart/form-data">
                @include('dashboard.layouts.includes.alerts.errors')
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user_id">@lang('global.Home Request.fields.patient')</label>
                            <input type="hidden" name="user_id" value="{{$homeExRequest->user_id}}">
                            <input type="text" name="user_name" value="{{$homeExRequest->user->name}}" class="form-control" disabled>
                            @error('user_id')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="required_date">@lang('global.Home Request.fields.required_date')</label>
                            <input type="date" name="required_date" id="required_date" class="form-control"
                                placeholder="Required Date " value="{{old('date',$homeExRequest->required_date)}}">
                            @error('required_date')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>



                    <div class="col-md-6">

                        <div class="form-group">
                            <label>@lang('global.Home Request.fields.status')</label>
                            <select name="status" class="form-control">
                                <optgroup>
                                    <option value="accepted" {{$homeExRequest->status == 'accepted' ? 'selected' : ''}}>
                                        Accepted
                                    </option>
                                    <option value="pending" {{$homeExRequest->status == 'pending' ? 'selected': ''}}>
                                        Pending</option>
                                    <option value="postponed"
                                        {{$homeExRequest->status == 'postponed' ? 'selected': ''}}>Postponed
                                    </option>
                                    <option value="rejected" {{$homeExRequest->status == 'rejected'? 'selected' : ''}}>
                                        Rejected
                                    </option>
                                </optgroup>
                            </select>
                            @error('status')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                </div>

                <button class="btn btn-primary ">@lang('global.update')</button>
        </div>
    </div>
    </form>
</div>
</div>
</div>
@endsection
