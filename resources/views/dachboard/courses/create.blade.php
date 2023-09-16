@extends('layouts.admin')



@section('styles')



@endsection
@section('title')
create course
@endsection
@section('content')

<div class="card card-info">
   
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
        <div class="form-group row">
          <label for="inputtype" class="col-sm-2 col-form-label">Choose a teacher</label>
          <div class="col-sm-10">
          
              <select class="  custom-select" id="num" name="userID"  required>
                @if(count($users)>0)
                @foreach ( $users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
                @else
               
              @endif
            
              </select>
              @if(count($users)<0)
              <br>
              You must add a teacher first, then create the course
              @endif
              </div>
        </div>
        
       
      </div>
      <!-- /.card-body -->
      <div class="card-footer " >
        <a  href="javascript:history.back()" class="btn btn-info text-dark m-1 " float-right>Cancel</a>
        <button type="submit" class="btn btn-success float-right" id="submitButton">Save</button>

      </div>
      <!-- /.card-footer -->
    </form>
  </div>

@endsection
@section('scripts')


@endsection