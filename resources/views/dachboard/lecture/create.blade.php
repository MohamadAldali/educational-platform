
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


    <form class="form-horizontal" action="{{ route('lecture.store') }}" method="POST">
        @csrf
        
      <div class="card-body">
        <div class="form-group row">
            <label for="number" class="col-sm-2 col-form-label">Discription</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="number" name="number" placeholder="number" required>
            </div>
          </div>
        <div class="form-group row">
          <label for="discription_le" class="col-sm-2 col-form-label">Discription</label>
          <div class="col-sm-10">
            <input type="textarea" class="form-control" id="discription_le" name="discription_le" placeholder="Discription" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="videoPath" class="col-sm-2 col-form-label">videoPath</label>
          <div class="col-sm-10">
            <input type="textarea" class="form-control" id="videoPath" name="videoPath" placeholder="videoPath" required>
          </div>
        </div>
        {{dd($course_id)}}
        <input type="hidden" name="course_id" id="course_id" value="{{$course_id}}">
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