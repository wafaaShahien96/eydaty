@extends('dashboard.layouts.app')

@section('title', __('global.Price.fields.update_pricing'))

@section('content')

<!-- begin:: Content Head -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                <button class="kt-subheader__mobile-toggle kt-subheader__mobile-toggle--left"
                    id="kt_subheader_mobile_toggle"><span></span></button>
                @lang('global.Price.fields.update_pricing')
            </h3>

            <span class="kt-subheader__separator kt-hidden"></span>

            <div class="kt-subheader__breadcrumbs">
                <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="{{ route('admin.pricing.index') }}" class="kt-subheader__breadcrumbs-link">
                    @lang('global.Price.title')
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
            <h3>@lang('global.Price.fields.update_pricing')</h3>
        </div>
        <div class="card-body">
            <form action="{{route('admin.pricing.update' ,$pricing->id ?? '')}}" method="post"
                enctype="multipart/form-data">
                @include('dashboard.layouts.includes.alerts.errors')
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="feas">@lang('global.Price.fields.fees')</label>
                            <input type="number" name="feas" id="feas" class="form-control" placeholder="Feas"
                                value="{{old('feas' ,$pricing->feas ?? '')}}">
                            @error('feas')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="home_feas">@lang('global.Price.fields.home_fees')</label>
                            <input type="number" name="home_feas" id="home_feas" class="form-control" value="{{old('home_feas',
                                $pricing->home_feas ?? '')}}">
                            @error('phone')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="agence_feas">@lang('global.Price.fields.agence_fees')</label>
                            <input type="number" name="agence_feas" id="agence_feas" class="form-control"
                                value="{{old('agence_feas',$pricing->agence_feas ?? '')}}">
                            @error('agence_feas')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="follow_up">@lang('global.Price.fields.follow_up')</label>
                            <input type="text" name="follow_up" id="follow_up" class="form-control"
                                value="{{old('follow_up',$pricing->follow_up  ?? '')}}">
                            @error('follow_up')
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
