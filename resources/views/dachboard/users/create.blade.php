@extends('layouts.admin')



@section('styles')



@endsection
@section('title')

{{ __('mycustom.AddUser') }}

@endsection
@section('content')

<div class="card card-info">
    
    <!-- /.card-header -->
    <!-- form start -->


    <form class="form-horizontal" action="{{ route('user.store') }}" method="POST">
        @csrf
      <div class="card-body">
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">{{ __('mycustom.Name') }}</label>
            <div class="col-sm-10">
              <input  class="form-control" id="name" name="name"  placeholder="{{ __('mycustom.Name') }}" required>
            </div>
          </div>
        <div class="form-group row">
          <label for="email" class="col-sm-2 col-form-label">{{ __('mycustom.email') }}</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="email" name="{{ __('mycustom.email') }}" placeholder="email" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="password" class="col-sm-2 col-form-label">{{ __('mycustom.Password') }}</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="password" name="password" placeholder="{{ __('mycustom.Password') }}" required>
          </div>
        </div>
        <div class="form-group row">
            <label for="inputtype" class="col-sm-2 col-form-label">{{ __('mycustom.Account Type') }}</label>
            <div class="col-sm-10">
                <select class="  custom-select" id="num" name="num">
                    <option value="0">{{ __('mycustom.Not enabled') }}</option>
                    <option value="3">{{ __('mycustom.Student') }}</option>
                    <option value="2">{{ __('mycustom.Teacher') }}</option>
                    <option value="1">{{ __('mycustom.Admin') }}</option>
                  </select>
                </div>
          </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer " >
        <a  href="javascript:history.back()" class="btn btn-info text-dark m-1 " float-right>{{ __('mycustom.Cancel') }}</a>
        <button type="submit" class="btn btn-success float-right">{{ __('mycustom.Save') }}</button>
      </div>
      <!-- /.card-footer -->
    </form>
  </div>

@endsection
@section('scripts')


@endsection