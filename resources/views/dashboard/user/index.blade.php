@extends('dashboard.layouts.app')

@section('title', __('global.Users.title'))

@section('content')

@include('dashboard.layouts.includes.alerts.success')
@include('dashboard.layouts.includes.alerts.errors')


<!-- begin:: Content Head -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                <button class="kt-subheader__mobile-toggle kt-subheader__mobile-toggle--left" id="kt_subheader_mobile_toggle"><span></span></button>
                @lang('global.Users.title')
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


<div class="container-fluid">
    <div class="card">
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">@lang('global.Users.title')</h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="dropdown dropdown-inline">

                        <a href="{{ route('admin.users.create') }}" class="btn btn-primary font-weight-bolder"><i
                                class="la la-plus"></i>
                            @lang('global.add_new') </a>
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

            <div class="kt-portlet__body">
                <div class="card-body">
                    <table class="table table-hover" id=" example">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">@lang('global.Users.fields.name')</th>
                                <th scope="col">@lang('global.Users.fields.phone')</th>
                                <th scope="col">@lang('global.Users.fields.image')</th>
                                <th scope="col">@lang('global.Users.fields.age')</th>
                                <th scope="col">@lang('global.Users.fields.gender')</th>
                                <th scope="col">@lang('global.Users.fields.email')</th>
                                <th scope="col">@lang('global.Users.fields.address')</th>
                                <th scope="col">@lang('global.Users.fields.action')</th>
                            </tr>
                        </thead>

                        @foreach ($users as $index => $user)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>
                                <img src="{{ asset('storage/images/users/'.$user->image) }}" alt="image"
                                    class="img-thumbnail" width="80px;">
                            </td>
                            <td>{{ $user->age() }}</td>
                            <td>{{ $user->gender }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->address }}</td>
                            <td>
                                <a href="{{route('admin.users.edit',$user->id)}}"
                                    class="btn btn-sm btn-icon btn-primary" title="Edit details">
                                    <i class="fa fa-edit"> </i>
                                </a>

                                <form class="delete_form d-inline-block"
                                    action=" {{route('admin.users.destroy', $user->id)}}" method="post">
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
            {{ $users->links() }}
        </div>
    </div>

</div>

@endsection
