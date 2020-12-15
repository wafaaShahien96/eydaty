@extends('dashboard.layouts.app')

@section('title', __('global.Patient Query.fields.update_patient_query'))

@section('content')

<!-- begin:: Content Head -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                <button class="kt-subheader__mobile-toggle kt-subheader__mobile-toggle--left"
                    id="kt_subheader_mobile_toggle"><span></span></button>
                @lang('global.Home Request.fields.required_date')
            </h3>

            <span class="kt-subheader__separator kt-hidden"></span>

            <div class="kt-subheader__breadcrumbs">
                <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="{{ route('admin.patient_query.index') }}" class="kt-subheader__breadcrumbs-link">
                    @lang('global.Patient Query.title')
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
            <h3>@lang('global.Patient Query.fields.update_patient_query')</h3>
        </div>
        <div class="card-body">
            <form action="{{route('admin.patient_query.update',$patientQuery->id)}}" method="post"
                enctype="multipart/form-data">
                @include('dashboard.layouts.includes.alerts.errors')
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user_id">Patient</label>
                            <input type="text" value="{{$user->name}}" class="form-control" disabled>
                            @error('user_id')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="question">Query</label>
                            <textarea name="question" id="question"  rows="3" class="form-control"
                                placeholder="Ask Your Question "
                                value="{{old('question')}}" disabled>{{($patientQuery->question)}}</textarea>
                            @error('question') <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="response">Response</label>
                            <textarea name="response" id="response" rows="3" class="form-control"
                                placeholder="Response " value="{{old('response',$patientQuery->response)}}"></textarea>
                            @error('response')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <button class="btn btn-primary ">Update</button>
        </div>
        </form>
    </div>
</div>
</div>
@endsection
