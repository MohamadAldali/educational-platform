@extends('layouts.admin')

@section('styles')
    <!-- Custom Styles Here -->
@endsection
@section('title')
show user
@endsection
@section('content')
<div class="card-body">
    
    <div class="form-group row">
       <div class="  col-sm-12  ">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="form-group row">
              <div class="col-xl-6 ">
              <div class="text-center">
                @if($user->image == null)

                <img class="profile-user-img img-fluid img-circle" src="{{asset('imgs/null.jpeg')}}" alt="User profile picture" style="width: 60%">
         
                @else
                <img class="profile-user-img img-fluid img-circle" src="{{asset('imgs/'.$user->image)}}" alt="User profile picture" style="width: 60%">
         

              @endif
              <h3 class="profile-username text-center">{{ $user->name }}</h3>

              <p class="text-muted text-center">
                @if($user->num==0)
                Not enabled
                @elseif($user->num==3)
                Student
                @elseif($user->num==2)
                Teacher
                @elseif($user->num==1)
                Admin
                @endif
                <br>
                {{$user->email}}
              </p>
            </div>
           
            </div>
            <div class="col-xl-6 p-2  ">
                
                <form class="form-horizontal mt-2" action="{{ route('photo.save', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                       
                            <input type="file" class="custom-file-input " id="photo " name="photo">
                            <label class="custom-file-label m-2" for="photo">Choose image</label>
                         <br>
                  
                   
                            <button type="submit" class="btn btn-primary btn-block ">update image</button>
                </form>

                <form class="form-horizontal mt-2" action="{{ route('photo.destroy', ['id' => $user->id]) }}" method="POST" >
                    @csrf
                   
                 
                        <button type="submit" class="btn btn-danger  text-dark btn-block">Delete image</button>
               
                    
                   </form>
              
                   <a href="
                   {{ route('certificate.create')}}
                     @php
                     Session::put('user-id',$user->id);
                     @endphp
                   
                   "class="btn btn-warning  text-dark btn-block mt-5">Add Certificates</button>
               
                 
                   <a  href=" {{ route('work.create')}}
                   @php
                   Session::put('user-id',$user->id);
                   @endphp" class="btn btn-info text-dark btn-block mt-2" >Add Previous Jobs</a>

                  
                   
                   <a href="{{ route('user.edit',$user->id) }}" class="btn btn-success text-dark btn-block mt-2"><b>More editing options</b></a>
            </div>
              
            </div>
         </div>
            <!-- /.card-body -->
          </div>
       </div>
       

       <div class="  col-sm-12 ">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Previous Jobs</h3>
              </div>
              <!-- /.card-header -->
           @if(count($user->work) > 0)
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>company</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user->work as $wor)
                    <tr>
                        <td>{{$wor->name_works}}</td>
                        <td>{{$wor->start_date}}</td>
                        <td>{{$wor->end_date}}</td>
                        <td>{{$wor->company}}</td>
                        <td class="d-flex justify-content-end"><form action="{{ route('work.destroy',  $wor->id) }}" method="POST" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <div class="float-right">
                                    <button type="submit" class="btn btn-danger m-1 text-dark ">Delete</button>
                           
                                </div>
                               </form></td>
    
                    </tr>
                @endforeach
                </tbody>
            </table>
            @else
            <h2 class="p-2 d-flex justify-content-center">no data</h2>
            @endif
       
    </div>
      



    </div>
    <div class="  col-sm-12 ">
        <div class="card ">
            <div class="card-header ">
                <h3 class="card-title ">Certificates</h3>
              </div>
              <!-- /.card-header -->
              @if(count($user->certificate) > 0)
            <table class="table table-bordered table-striped  ">
              
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Donor</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user->certificate as $certificat)
                        <tr>
                            <td>{{$certificat->name_cert}}</td>
                            <td>{{$certificat->date}}</td>
                            <td >{{$certificat->donor}}</td>
                            <td class="d-flex justify-content-end"><form action="{{ route('certificate.destroy',  $certificat->id) }}" method="POST" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger m-1 text-dark float-right">Delete</button>
                                </form></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @else
                <h2 class="p-2 d-flex justify-content-center">no data</h2>
                @endif
       
    </div>
      



    </div>
   
    </div>

   
    </div>
</div>
    


@endsection

@section('scripts')
    <!-- Custom Scripts Here -->
@endsection

