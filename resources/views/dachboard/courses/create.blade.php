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


    <form class="form-horizontal" action="{{ route('course.store') }}" method="POST">
        @csrf
        
      <div class="card-body">
        <div class="form-group row">
            <label for="name_courses" class="col-sm-2 col-form-label">Name Courses</label>
            <div class="col-sm-10">
              <input  class="form-control" id="name_courses" name="name_courses" placeholder="Name" required>
            </div>
          </div>
        <div class="form-group row">
          <label for="discription" class="col-sm-2 col-form-label">Discription</label>
          <div class="col-sm-10">
            <input type="textarea" class="form-control" id="discription" name="discription" placeholder="Discription" required>
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