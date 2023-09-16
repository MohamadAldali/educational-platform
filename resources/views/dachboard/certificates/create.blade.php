@extends('layouts.admin')



@section('styles')



@endsection
@section('title')
Create Cretificates
@endsection
@section('content')


<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Certificates</h3>
      </div>
    <!-- /.card-header -->
    <!-- form start -->


    <form class="form-horizontal" action="{{ route('certificate.store', ['id'=>$id]) }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group row">
                <label for="name_cert" class="col-lg-4 col-form-label">name_cert</label>
                <div class="col-lg-8">
                    <input  class="form-control" id="name_cert" name="name_cert"  placeholder="Name" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="date" class="col-lg-4 col-form-label">date</label>
                <div class="col-lg-8">
                    <input type="date" class="form-control" id="date" name="date" placeholder="date" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="donor" class="col-lg-4 col-form-label">donor</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" id="donor" name="donor" placeholder="donor" required>
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
