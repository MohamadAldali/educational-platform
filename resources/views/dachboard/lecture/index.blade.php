@extends('layouts.admin')

@section('styles')

<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<!-- Theme style -->

@endsection

@section('title')
Course :  {{$course->name_courses}} 
@endsection
@section('content')

<div class="content-header">
  <div class="container-fluid">
      <div class="row mb-2">
          <div class="col-sm-6">
              <h1 class="m-0">Teacher is: {{ $teacher->name }}</h1>
          </div><!-- /.col -->
         
      </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
@if((Auth::user()->num == 1)||(Auth::user()->num == 2) )
<div class="card-footer mb-3 " >
 
    <a  href="{{route('lecture.create')}}" class="btn btn-success text-dark m-1 " float-right>Create Lecture</a>
    <a  href="{{route('lecture.showAddUser',$course->id)}}" class="btn btn-warning m-1 " float-right>Add User</a>
   

</div>
@endif
@if(count($lectures)>0)
<div class="card">

    <div class="card-header">
      <h3 class="card-title">{{$course->name_courses}}</h3>
    </div>
    
    <!-- /.card-header -->
    <div class="card-body">
       
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>number</th>
          <th>discription</th>
          <th>videoPath</th>
          <th>name_courses</th>
          <th class="d-flex justify-content-center">Attended</th>
        </tr>
        </thead>
        <tbody>
        
          @foreach ($lectures as $lecture )
          <tr>
           
            <td>{{$lecture->num_le}}</td>
            <td>{{$lecture->discription_le}}
            </td>
            <td><a href="{{$lecture->videoPath}}">{{$lecture->videoPath}}</a></td>
            <td>{{$lecture->course->name_courses}}</td>
            <td class="d-flex justify-content-center">
     
              @if(!(Auth::user()->num == 1)&&!(Auth::user()->num == 2) )
              @if ($lecture->users->find(auth()->id())== null )
               
              <a  href="{{route('is_attend',$lecture->id)}}" class="btn btn-danger text-dark m-1 " float-right>NO</a>
     
              @elseif($lecture->users->find(auth()->id())->pivot->is_attend )

              <a  href="{{route('is_attend',$lecture->id)}}" class="btn btn-success text-dark m-1 "  float-right>YES</a>
       
              @else
                
              <a  href="{{route('is_attend',$lecture->id)}}" class="btn btn-danger text-dark m-1 " float-right>NO</a>
       

              @endif
       
        @endif
 

            </td>
          
          </tr>
          @endforeach
        
      
        </tbody>
        <tfoot>
        <tr>
            <th>number</th>
          <th>discription</th>
          <th>videoPath</th>
          <th>name_courses</th>
          <th class="d-flex justify-content-center">Attended</th>
        </tr>
        </tfoot>
      </table>
      
    </div>
   
    <!-- /.card-body -->
  </div>
  @else
  <h1>no DATA</h1>
  @endif
  

  @if((Auth::user()->num == 1)||(Auth::user()->num == 2) )
@if(count($users)>0)
<div class="card">

    <div class="card-header">
      <h3 class="card-title">{{$course->name_courses}}</h3>
    </div>
    
    <!-- /.card-header -->
    <div class="card-body">
       
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>number</th>
          <th>name</th>
          <th style="text-align: center;">Attendance rates</th>
          <th style="text-align: center;">mark</th>
          <th style="text-align: center;">Attended</th>
        </tr>
        </thead>
        <tbody>
        
          @foreach ($users as $user )
          <tr>
           
            <td>{{$user->id}}</td>
            <td>{{$user->name}}
            </td>
            <td style="text-align: center ;"> @if (isset($usersData[$user->id]['attendance_percentage']))
              {{ $usersData[$user->id]['attendance_percentage'] }}
          @else
              0
          @endif
            </td>
            <td style="text-align: center;">
              <form method="POST" action="{{route('lecture.ubdatemarck')}}" style="display: inline-block">
                @csrf
                <div style="display: flex; align-items: center;">
                  <input type="hidden" name="courseID" value="{{ $course->id }}">
                  <input type="hidden" name="userID" value="{{ $user->id }}">
                
                  <input type="number" id="newMarkValue" name="newMarkValue" min="0" max="100" value="{{$user->pivot->mark}}" class="form-control" required>
                  <button type="submit" class="btn btn-success m-1 text-dark">update</button>
              </div>
            </form>
            </td>
            <td style="text-align: center;">
     
           
 
              <form action="{{ route('lecture.saveDeleteUser', $course->id) }}" method="POST" style="display: inline-block">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <button type="submit" class="btn btn-danger m-1 text-dark">Delete</button>
            </form>

            </td>
          
          </tr>
          @endforeach
        
      
        </tbody>
        <tfoot>
        <tr>
          <th>number</th>
          <th>name</th>
          <th style="text-align: center;">Attendance rates</th>
          <th style="text-align: center;">mark</th>
          <th style="text-align: center;">Attended</th>
        </tr>
        </tfoot>
      </table>
      
    </div>
   
    <!-- /.card-body -->
  </div>
  @else
  <h1>no DATA</h1>
  @endif

  @else
  @if(count($users)>0)
  <div class="card">
       
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>number</th>
        <th>name</th>
        <th style="text-align: center;">Attendance rates</th>
        <th style="text-align: center;">mark</th>
      </tr>
      </thead>
      <tbody>
  @foreach  ($users as $user )
  @if((Auth::user()->id ==$user->id))
 
  <tr>
           
    <td>{{$user->id}}</td>
    <td>{{$user->name}}
    </td>
    <td style="text-align: center ;"> @if (isset($usersData[$user->id]['attendance_percentage']))
      {{ $usersData[$user->id]['attendance_percentage'] }}
  @else
      0
  @endif
    </td>
    <td style="text-align: center;">
      {{$user->pivot->mark}}
    </td>

  
  </tr>
@endif
@endforeach 
</tbody>

</table>

</div>



  @endif

  
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