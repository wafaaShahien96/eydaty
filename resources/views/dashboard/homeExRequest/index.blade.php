@extends('dashboard.layouts.app')

@section('title', __('global.Home Request.title'))

@section('content')

@include('dashboard.layouts.includes.alerts.success')
@include('dashboard.layouts.includes.alerts.errors')

<!-- begin:: Content Head -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                <button class="kt-subheader__mobile-toggle kt-subheader__mobile-toggle--left" id="kt_subheader_mobile_toggle"><span></span></button>
                @lang('global.Home Request.title')
            </h3>

            <span class="kt-subheader__separator kt-hidden"></span>

            <div class="kt-subheader__breadcrumbs">
                <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>

                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="{{ route('admin.home') }}" class="kt-subheader__breadcrumbs-link"> @lang('global.home') </a>
            </div>
        </div>

    </div>
</div>
<!-- end:: Content Head -->

<div class="container-fluid kt-mb-100">
    <div class="card">
        <div class="card-body">
            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                            <i class="kt-font-brand flaticon2-line-chart"></i>
                        </span>
                        <h3 class="kt-portlet__head-title">@lang('global.Home Request.title')</h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="dropdown dropdown-inline">
                            {{-- Add New --}}
                            <a href=" {{route('admin.home_ex_request.create')}} " class="btn btn-primary btn-icon-sm"><i
                                    class="flaticon2-plus"></i>@lang('global.add_new')</a>
                        </div>

                        &nbsp;
                        <div class="kt-portlet__head-wrapper">
                            <a href=" {{route('admin.home')}} " class="btn btn-brand btn-icon-sm">
                                <i class="la la-long-arrow-left"></i>
                                @lang('global.back')
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover" id=" example">
                        <thead>
                            <tr>
                                <th scope="col">@lang('global.Home Request.fields.patient')</th>
                                <th scope="col">@lang('global.Home Request.fields.required_date')</th>
                                <th scope="col">@lang('global.Home Request.fields.accepted_date')</th>
                                <th scope="col">@lang('global.Home Request.fields.status')
                                </th>

                                <th scope="col">@lang('global.Home Request.fields.action')</th>

                            </tr>
                        </thead>
                        @foreach ($homeExRequests as $index => $homeExRequest)
                        <tr>
                            <td>{{ $homeExRequest->user->name }}</td>
                            <td>{{ $homeExRequest->required_date }}</td>
                            <td>{{ $homeExRequest->accepted_date }}</td>
                            <td>{{ $homeExRequest->status }}</td>

                            <td> <a href=" {{route('admin.home_ex_request.edit',$homeExRequest->id)}} "
                                    class="btn btn-sm  btn-icon btn-icon-md btn-success"><i class="fa fa-check"></i>
                                </a>
                            <td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{ $homeExRequests->links() }}
            </div>
        </div>
    </div>
</div>


@endsection
