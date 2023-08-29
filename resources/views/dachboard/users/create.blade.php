@extends('layouts.admin')



@section('styles')



@endsection
@section('content')

<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">Horizontal Form</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->


    <form class="form-horizontal" action="{{ route('user.store') }}" method="POST">
        @csrf
      <div class="card-body">
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
              <input  class="form-control" id="name" name="name"  placeholder="Name" required>
            </div>
          </div>
        <div class="form-group row">
          <label for="email" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="email" name="email" placeholder="email" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="password" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="password" name="password" placeholder="password" required>
          </div>
        </div>
        <div class="form-group row">
            <label for="inputtype" class="col-sm-2 col-form-label">Account Type</label>
            <div class="col-sm-10">
                <select class="  custom-select" id="num" name="num">
                    <option value="0">Not enabled</option>
                    <option value="3">Student</option>
                    <option value="2">Teacher</option>
                    <option value="1">Admin</option>
                  </select>
                </div>
          </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer " >
        <a  href="javascript:history.back()" class="btn btn-info text-dark m-1 " float-right>Cancel</a>
        <button type="submit" class="btn btn-success float-right">Save</button>
      </div>
      <!-- /.card-footer -->
    </form>
  </div>

@endsection
@section('scripts')


@endsection