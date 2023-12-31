@extends('layouts.admin')



@section('styles')



@endsection
@section('title')
esit user
@endsection
@section('content')

<div class="card card-info">
   
    <!-- /.card-header -->
    <!-- form start -->


 
    <form class="form-horizontal" action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
      <div class="card-body">
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
              <input  class="form-control" id="name" name="name" value="{{$user->name}}" required>
            </div>
          </div>
        <div class="form-group row">
          <label for="email" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" placeholder="email" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="password" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="password" name="password" placeholder="Type to change the password" >
          </div>
        </div>
        @if(auth()->user()->num ==1)
        <div class="form-group row">
            <label for="inputtype" class="col-sm-2 col-form-label">Account Type</label>
            <div class="col-sm-10">
                <select class="custom-select" id="num" name="num" ">
                    <option value="0"  @if($user->num==0)selected @endif>Not enabled</option>
                    <option value="3" @if($user->num==3)selected @endif>Student</option>
                    <option value="2" @if($user->num==2)selected @endif>Teacher</option>
                    
                    <option value="1"  @if($user->num==1)selected @endif>Admin</option>
                    
                  </select>
                  
            </div>
          </div>
          @endif
      </div>
      <!-- /.card-body -->
      <div class="card-footer " >
        <a  href="javascript:history.back()" class="btn btn-info text-dark m-1 " float-right>Cancel</a>
        <button type="submit" class="btn btn-success float-right">Update User</button>
      </div>
      <!-- /.card-footer -->
    </form>
  </div>

@endsection
@section('scripts')


@endsection