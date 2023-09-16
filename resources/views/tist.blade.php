@extends('layouts.admin')



@section('styles')



@endsection
@section('title')
dgghgf
@endsection
@section('content')


  
@endsection
@section('scripts')


@endsection

<body class="sidebar-mini layout-fixed sidebar-collapse sidebar-closed control-sidebar-slide-open" style="height: auto;">
   </body>


   <body class="sidebar-mini layout-fixed sidebar-collapse sidebar-closed control-sidebar-slide-open dark-mode" style="height: auto;">
   </body>


   <div class="form-group row">
      <label for="id_t" class="col-sm-2 col-form-label">Add teacher</label>
      <div class="col-sm-10">
          <select class="  custom-select" id="id_t" name="id_t">
            @if(count($teachers) > 0)
             @foreach ($teachers as $teacher)
             <option value="{{$teacher->id}}">{{$teacher->name}}</option>
             @endforeach
             @endif
            </select>
          </div>
    </div>






    @extends('layouts.admin')



@section('styles')


<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="../../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">

@endsection
@section('title')
Add User
@endsection
@section('content')
<div class="wrapper">
    <!-- Navbar -->
    
  
    <!-- /.navbar -->
  
    <!-- Main Sidebar Container -->
    
  
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 2171.31px;">
      <!-- Content Header (Page header) -->
  
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- SELECT2 EXAMPLE -->
       
          <!-- /.card -->
  
          <!-- SELECT2 EXAMPLE -->
          <div class="card card-default">
          
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Minimal</label>
                    <select class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                      <option selected="selected" data-select2-id="19">Alabama</option>
                      <option>Alaska</option>
                      <option>California</option>
                      <option>Delaware</option>
                      <option>Tennessee</option>
                      <option>Texas</option>
                      <option>Washington</option>
                    </select>
                 </div>
                  <!-- /.form-group -->
                
                  <!-- /.form-group -->
                </div>
                  <div class="col-12">
                  <div class="form-group">
                    <label>Multiple</label>
                    <div class="bootstrap-duallistbox-container row moveonselect moveondoubleclick">
                         <div class="box1 col-md-6"> 
                              <label for="bootstrap-duallistbox-nonselected-list_" style="display: none;"></label>  
                               <span class="info-container">   
                                  <span class="info">Showing all 6</span>   
                                    <button type="button" class="btn btn-sm clear1" style="float:right!important;">show all</button> 
                                
                                </span>   <input class="form-control filter" type="text" placeholder="Filter">  
                                 <div class="btn-group buttons">  
                                       <button type="button" class="btn moveall btn-outline-secondary" title="Move all">&gt;&gt;</button>
                                            </div>  
                                             <select multiple="multiple" id="bootstrap-duallistbox-nonselected-list_" name="_helper1" style="height: 102px;">
                                                <option>Alaska</option><option>California</option>
                                                <option>Delaware</option><option>Tennessee</option>
                                                <option>Texas</option><option>Washington</option>
                                            </select> </div> <div class="box2 col-md-6">  
                                                 <label for="bootstrap-duallistbox-selected-list_" style="display: none;">
                                                </label>   <span class="info-container">    
                                                     <span class="info">Showing all 1</span> 
                                                         <button type="button" class="btn btn-sm clear2" style="float:right!important;">show all</button> 
                                                          </span>   
                                                          <input class="form-control filter" type="text" placeholder="Filter">   
                                                          <div class="btn-group buttons">        
                                                              <button type="button" class="btn removeall btn-outline-secondary" title="Remove all">&lt;&lt;</button>  
                                                             </div>   <select multiple="multiple" id="bootstrap-duallistbox-selected-list_" name="_helper2" style="height: 102px;">
                                                                <option selected="">Alabama</option></select>
                                                             </div></div>
                                                             <select class="duallistbox" multiple="multiple" style="display: none;">
                                                                <option selected="">Alabama</option>
                     
                                                                <option>Alaska</option>
                     
                                                                <option>California</option>
                      
                                                                <option>Delaware</option>
                     
                                                                <option>Tennessee</option>
                     
                                                                <option>Texas</option>
                     
                                                                <option>Washington</option>
                    
                                                            </select>
                 
                                                        </div>
                  <!-- /.form-group -->
               
                </div>
                <!-- /.col -->
            
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.card-body -->
           
          </div>
          <!-- /.card -->
  
          
          <!-- /.card -->
  
        
          <!-- /.row -->
          
          <!-- /.row -->
          
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
   
  
    <!-- Control Sidebar -->
   
      <!-- Control sidebar content goes here -->
     <!-- /.control-sidebar -->
  </div>
@endsection
@section('scripts')
<!-- Bootstrap4 Duallistbox -->
<script src="../../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()
  
      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
  
   
  
    
  
   
    
    
  
   
  
      //Bootstrap Duallistbox
      $('.duallistbox').bootstrapDualListbox()
  
     
    // BS-Stepper Init
    document.addEventListener('DOMContentLoaded', function () {
      window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    })
  
    // DropzoneJS Demo Code Start
    Dropzone.autoDiscover = false
  
    // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
    var previewNode = document.querySelector("#template")
    previewNode.id = ""
    var previewTemplate = previewNode.parentNode.innerHTML
    previewNode.parentNode.removeChild(previewNode)
  
    var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
      url: "/target-url", // Set the url
      thumbnailWidth: 80,
      thumbnailHeight: 80,
      parallelUploads: 20,
      previewTemplate: previewTemplate,
      autoQueue: false, // Make sure the files aren't queued until manually added
      previewsContainer: "#previews", // Define the container to display the previews
      clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
    })
  
    myDropzone.on("addedfile", function(file) {
      // Hookup the start button
      file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
    })
  
    // Update the total progress bar
    myDropzone.on("totaluploadprogress", function(progress) {
      document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
    })
  
    myDropzone.on("sending", function(file) {
      // Show the total progress bar when upload starts
      document.querySelector("#total-progress").style.opacity = "1"
      // And disable the start button
      file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
    })
  
    // Hide the total progress bar when nothing's uploading anymore
    myDropzone.on("queuecomplete", function(progress) {
      document.querySelector("#total-progress").style.opacity = "0"
    })
  
    // Setup the buttons for all transfers
    // The "add files" button doesn't need to be setup because the config
    // `clickable` has already been specified.
    document.querySelector("#actions .start").onclick = function() {
      myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
    }
    document.querySelector("#actions .cancel").onclick = function() {
      myDropzone.removeAllFiles(true)
    }
    // DropzoneJS Demo Code End
  </script>
@endsection
