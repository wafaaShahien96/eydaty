@extends('dashboard.layouts.app')

@section('title', __('global.Setting.fields.update_setting'))

@section('content')

<!-- begin:: Content Head -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                <button class="kt-subheader__mobile-toggle kt-subheader__mobile-toggle--left"
                    id="kt_subheader_mobile_toggle"><span></span></button>
                @lang('global.Setting.fields.update_setting')
            </h3>

            <span class="kt-subheader__separator kt-hidden"></span>

            <div class="kt-subheader__breadcrumbs">
                <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="{{ route('admin.settings.index') }}" class="kt-subheader__breadcrumbs-link">
                    @lang('global.Setting.title')
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

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3>@lang('global.Setting.fields.update_setting')</h3>
        </div>
        <div class="card-body">
            <form action="{{route('admin.settings.update' ,$setting->id ?? '')}}" method="post"
                enctype="multipart/form-data">
                @include('dashboard.layouts.includes.alerts.errors')
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        {{-- name --}}
                        <div class="form-group">
                            <label for="name">@lang('global.Setting.fields.name')</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Name"
                                value="{{old('name' ,$setting->name ?? '')}}">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="phone">@lang('global.Setting.fields.phone')</label>
                            <input type="number" name="phone" id="phone" class="form-control" value="{{old('phone',
                                $setting->phone ?? '')}}">
                            @error('phone')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address">@lang('global.Setting.fields.address')</label>
                            <textarea name="address" id="address" cols="30" rows="1" class="form-control"
                                placeholder="Address">{{$setting->address ?? ''}}</textarea>
                            @error('address')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="email">@lang('global.Setting.fields.email')</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email .."
                                value="{{old('email',$setting->email ?? '')}}">
                            @error('email')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="FB_link">@lang('global.Setting.fields.fb_link')</label>
                            <input type="text" name="FB_link" id="FB_link" class="form-control"
                                value="{{old('FB_link',$setting->FB_link ?? '')}}">
                            @error('FB_link')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="TW_link">@lang('global.Setting.fields.tw_link')</label>
                            <input type="text" name="TW_link" id="TW_link" class="form-control"
                                value="{{old('TW_link',$setting->TW_link  ?? '')}}">
                            @error('TW_link')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="logo">@lang('global.Setting.fields.logo')</label>
                            <input type="file" name="logo" id="logo" class="form-control">
                            @error('logo')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary ">@lang('global.update')</button>
            </form>
        </div>
    </div>
</div>
@endsection
