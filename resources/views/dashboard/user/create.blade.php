@extends('dashboard.layouts.app')

@section('title', __('global.Users.fields.create_user'))

@section('content')

  <!-- begin:: Content Head -->
  <div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                <button class="kt-subheader__mobile-toggle kt-subheader__mobile-toggle--left" id="kt_subheader_mobile_toggle"><span></span></button>
                @lang('global.Users.fields.create_user')
            </h3>

            <span class="kt-subheader__separator kt-hidden"></span>

            <div class="kt-subheader__breadcrumbs">
                <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="{{ route('admin.users.index') }}" class="kt-subheader__breadcrumbs-link">
                    @lang('global.Users.title')
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
                <h3>@lang('global.Users.fields.create_user')</h3>
            </div>
            <div class="card-body">
                <form action="{{route('admin.users.store')}}" method="post" enctype="multipart/form-data">
                    @include('dashboard.layouts.includes.alerts.errors')
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            {{-- name --}}
                            <div class="form-group">
                                <label for="name">@lang('global.Users.fields.name')</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name " value="{{old('name')}}" >
                                  @error('name')
                                      <span class="text-danger">{{$message}}</span>
                                  @enderror
                              </div>
                        </div>

                        <div class="col-md-6">
                            {{-- phone --}}
                            <div class="form-group">
                                <label for="phone">@lang('global.Users.fields.phone')</label>
                                <input type="number" name="phone" id="phone" class="form-control" value="{{old('phone')}}">
                                  @error('phone')
                                      <span class="text-danger">{{$message}}</span>
                                  @enderror
                            </div>
                    </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            {{-- email --}}
                            <div class="form-group">
                                <label for="email">@lang('global.Users.fields.email')</label>
                                <input type="email" name="email" placeholder="Email" id="email" class="form-control" value="{{old('email',)}}" >
                                  @error('email')
                                      <span class="text-danger">{{$message}}</span>
                                  @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            {{-- password --}}
                            <div class="form-group">
                                <label for="password">@lang('global.Users.fields.password')</label>
                                <input type="password" name="password" id="password" class="form-control" >
                                  @error('password')
                                      <span class="text-danger">{{$message}}</span>
                                  @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            {{-- age --}}
                            <div class="form-group">
                                <label for="age">@lang('global.Users.fields.age')</label>
                                <input type="date" name="age" id="age" class="form-control" value="{{old('age')}}">
                                  @error('age')
                                      <span class="text-danger">{{$message}}</span>
                                  @enderror
                            </div>
                        </div>


                        <div class="col-md-6">
                            {{-- gender --}}
                            <div class="form-group">
                                <label for="gender">@lang('global.Users.fields.gender')</label>
                                <select name="gender" id="gender" class="form-control" >
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                  @error('gender')
                                      <span class="text-danger">{{$message}}</span>
                                  @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                             {{-- Image --}}
                             <div class="form-group">
                                <label for="image">@lang('global.Users.fields.image')</label>
                                <input type="file" name="image" id="image" class="form-control" >
                                  @error('image')
                                      <span class="text-danger">{{$message}}</span>
                                  @enderror
                              </div>
                        </div>

                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="address">@lang('global.Users.fields.address')</label>
                            <textarea name="address" id="address" cols="30" rows="1" class="form-control" placeholder="Address " value="{{old('address')}}" ></textarea>
                              @error('address')
                                  <span class="text-danger">{{$message}}</span>
                              @enderror
                          </div>
                        </div>
                    </div>
          <button class="btn btn-primary ">@lang('global.save')</button>
</div>
                </form>
            </div>
        </div>
    </div>
@endsection
