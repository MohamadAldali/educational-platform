@extends('layouts.admin')

@section('styles')

<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<!-- Theme style -->

@endsection


@section('content')
@if(count($users)>0)
<div class="card">
    <div class="card-header">
      <h3 class="card-title">DataTable with default features</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Email</th>
          <th>Num</th>
          <th></th>
        </tr>
        </thead>
        <tbody>
          @foreach ($users as $user )
          <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}
            </td>
            <td>{{$user->email}}</td>
            <td>{{$user->num}}</td>
            <td>
              <a href="{{ route('user.show',$user->id) }}" class="btn btn-success text-dark m-1"><b>View details</b></a>
              <a href="{{ route('user.edit',$user->id) }}" class="btn btn-warning m-1"><b>Edit</b></a>
              <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display: inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger m-1 text-dark">Delete</button>
            </form>
            </td>
          </tr>
          @endforeach
        
      
        </tbody>
        <tfoot>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Email</th>
          <th>Num</th>
          <th></th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  @else
  <h1>no DATA</h1>
  @endif


@endsection


@section('scripts')
  
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

@endsection