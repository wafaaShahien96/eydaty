@extends('dashboard.layouts.app')

@section('title', __('global.Patient Query.title'))


@section('content')
@include('dashboard.layouts.includes.alerts.success')
@include('dashboard.layouts.includes.alerts.errors')

<!-- begin:: Content Head -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                <button class="kt-subheader__mobile-toggle kt-subheader__mobile-toggle--left" id="kt_subheader_mobile_toggle"><span></span></button>
                @lang('global.Patient Query.title')
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
                        <h3 class="kt-portlet__head-title">@lang('global.Patient Query.title')</h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="dropdown dropdown-inline">
                            {{-- Add New --}}
                            <a href=" {{route('admin.patient_query.create')}} " class="btn btn-primary btn-icon-sm"><i
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

                                <th scope="col">@lang('global.Patient Query.fields.patient')</th>
                                <th scope="col">@lang('global.Patient Query.fields.question')</th>
                                <th scope="col">@lang('global.Patient Query.fields.question_date')</th>
                                <th scope="col">@lang('global.Patient Query.fields.response')</th>
                                <th scope="col">@lang('global.Patient Query.fields.response_date')</th>
                                <th scope="col">@lang('global.Patient Query.fields.action')</th>



                            </tr>
                        </thead>
                        @foreach ($patientQueries as $index => $patientQuery)
                        <tr>
                            <td>{{ $patientQuery->user->name }}</td>
                            <td>{{ $patientQuery->question }}</td>
                            <td>{{ $patientQuery->question_date }}</td>
                            <td>{{ $patientQuery->response }}</td>
                            <td>{{ $patientQuery->response_date }}</td>

                            <td>
                                <a href=" {{route('admin.patient_query.edit' ,$patientQuery->id, $patientQuery->user_id )}} " class="btn btn-sm btn-primary">
                                    <i class="fa fa-check"> </i> Answer
                                </a>

                                <form class="delete_form d-inline-block" action=" {{route('admin.patient_query.destroy', $patientQuery->id)}}" method="post">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button class="delete_btn btn btn-danger btn-icon btn-sm" type="button">
                                        <i class="la la-trash"> </i>
                                    </button>
                                </form>

                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card-footer">
            {{ $patientQueries->links() }}
        </div>
    </div>

</div>
@endsection
