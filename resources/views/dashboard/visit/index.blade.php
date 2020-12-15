@extends('dashboard.layouts.app')


@section('title', __('global.Visits.title'))


@section('content')
@include('dashboard.layouts.includes.alerts.success')
@include('dashboard.layouts.includes.alerts.errors')


<!-- begin:: Content Head -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                <button class="kt-subheader__mobile-toggle kt-subheader__mobile-toggle--left" id="kt_subheader_mobile_toggle"><span></span></button>
                @lang('global.Visits.title')
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
                        <h3 class="kt-portlet__head-title">@lang('global.Visits.title')</h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-wrapper">
                            <a href=" {{route('admin.home')}} " class="btn btn-brand btn-icon-sm">
                                <i class="la la-long-arrow-left"></i>
                                @lang('global.back')
                            </a>
                            &nbsp;
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-hover" id=" example">
                    <thead>
                        <tr>
                            <th scope="col">@lang('global.Visits.fields.patient')</th>
                            <th scope="col">@lang('global.Visits.fields.type')</th>
                            <th scope="col">@lang('global.Visits.fields.date')</th>
                            <th scope="col">@lang('global.Visits.fields.conclusion')</th>
                            <th scope="col">@lang('global.Visits.fields.action')</th>



                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($visits as $index => $visit)
                        <tr>
                            <td>{{ $visit->user->name }}</td>
                            <td>{{ $visit->type }}</td>
                            <td>{{ $visit->date }}</td>
                            <td>{{ $visit->conclusion }}</td>


                            <td> <a href="{{route('admin.visit.edit',$visit->id)}}"
                                    class="btn btn-sm  btn-icon btn-icon-md btn-primary"><i class="fa fa-edit"></i>
                                </a>

                                <form class="delete_form d-inline-block" action=" {{route('admin.visit.destroy', $visit->id)}}" method="post">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button class="delete_btn btn btn-danger btn-icon btn-sm" type="button">
                                        <i class="la la-trash"> </i>
                                    </button>
                                </form>
                            </td>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>


        </div>
    </div>
    <div class="card-footer">
        {{ $visits->links() }}
    </div>
</div>

</div>
@endsection
