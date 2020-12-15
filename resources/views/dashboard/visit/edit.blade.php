@extends('dashboard.layouts.app')


@section('title', __('global.Visits.fields.update_visit'))


@section('content')
<!-- begin:: Content Head -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                <button class="kt-subheader__mobile-toggle kt-subheader__mobile-toggle--left"
                    id="kt_subheader_mobile_toggle"><span></span></button>
                @lang('global.Visits.fields.update_visit')
            </h3>

            <span class="kt-subheader__separator kt-hidden"></span>

            <div class="kt-subheader__breadcrumbs">
                <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="{{ route('admin.visit.index') }}" class="kt-subheader__breadcrumbs-link">
                    @lang('global.Visits.title')
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
            <h3>@lang('global.Visits.fields.update_visit')</h3>
        </div>
        <div class="card-body">
            <form action="{{route('admin.visit.update' ,$visit->id)}}" method="post" enctype="multipart/form-data">
                @include('dashboard.layouts.includes.alerts.errors')
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user_id">@lang('global.Visits.fields.patient')</label>
                            <select name="user_id" id="user_id" class="form-control" value="{{$visit->user_id}}">
                                @foreach ($users as $user)
                                <option selected value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">

                        <div class="form-group">
                            <label>@lang('global.Visits.fields.type')</label>
                            <select name="type" class="form-control">
                                <optgroup>
                                    <option value="new_visit" {{$visit->type == "new_visit" ? "selected" : ""}}>New
                                        Visit</option>
                                    <option value="follow_up" {{$visit->type == "follow_up" ? "selected" : ""}}>Follow
                                        Up</option>
                                </optgroup>
                            </select>
                            @error('type')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="date">@lang('global.Visits.fields.date')</label>
                            <input type="date" name="date" id="date" class="form-control" placeholder="Date "
                                value="{{old('date',$visit->date)}}">
                            @error('date')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="conclusion">@lang('global.Visits.fields.conclusion')</label>
                            <input type="text" name="conclusion" id="conclusion" class="form-control"
                                placeholder="conclusion " value="{{old('conclusion',$visit->conclusion)}}">
                            @error('conclusion')
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
