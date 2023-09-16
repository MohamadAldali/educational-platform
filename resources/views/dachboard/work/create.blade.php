@extends('layouts.admin')



@section('styles')



@endsection
@section('title')
Create Previous Jobs
@endsection
@section('content')


<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Previous Jobs</h3>
      </div>
      <!-- /.card-header -->
   
     <form class="form-horizontal" action="{{ route('work.store', ['id' => $id]) }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="name_works" class="col-lg-4 col-form-label">name_works</label>
                    <div class="col-lg-8">
                        <input  class="form-control" id="name_works" name="name_works"  placeholder="Name" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="start_date" class="col-lg-4 col-form-label">start_date</label>
                    <div class="col-lg-8">
                        <input type="date" class="form-control" id="start_date" name="start_date" placeholder="start_date" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="end_date" class="col-lg-4 col-form-label">end_date</label>
                    <div class="col-lg-8">
                        <input type="date" class="form-control" id="end_date" name="end_date" placeholder="end_date" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="company" class="col-lg-4 col-form-label">company</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="company" name="company" placeholder="company" required>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer " >
                <button type="submit" class="btn btn-success float-right">Save</button>
            </div>
            <!-- /.card-footer -->
        </form> 
  </div>

  
@endsection
@section('scripts')


@endsection
