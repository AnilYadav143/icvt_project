@extends('admin.includes.master')
@section('title','Manage Client')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span>Manage Client</h4>
    <!-- Basic Layout -->
    <!-- Manage client -->
    <div class="col-xxl">
        <div class="card mb-4">
            <h5 class="card-header">Manage Clients</h5>
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-header">Search</h5>
                <!-- <small class="text-muted float-end">Cliets</small> -->
                <input id="searchInput" class='form-control float-end' type="text" placeholder="Search...">
            </div>
               
            <div class="table-responsive text-nowrap">
                <table class="table" id='clientTable'>
                <thead class="table-light">
                    <tr>
                        <th>Sr.no</th>
                        <th>Institute Name</th>
                        <th>Institute Image</th>
                        <th>Create At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @isset($inst_imgs)
                    @foreach($inst_imgs as $img_val)
                    @php
                        $img1 = json_decode($img_val->image);
                    @endphp
                    <tr>
                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$loop->index+1}}</strong></td>
                    <td>
                            {{$img_val->getUserGallery->full_name}} 
                    </td>
                    
                    <td>{{$img_val->created_at}}</td>
                    <td>
                        <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item btn btn-success" href="{{route('edit_inst_img',$img_val->id)}}"
                            ><i class="bx bx-edit-alt me-1"></i> Edit</a
                            >
                            <form action="{{route('delete_inst_img',$img_val->id)}}" onsubmit="return confirm('Are you sure?');" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="dropdown-item btn btn-warning"><i class="bx bx-trash me-1"></i> Delete</button>
                            </form>
                        </div>
                        </div>
                    </td>
            
                    
                    </tr>
                    @endforeach
                    @endisset
                </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--end add client -->
</div>
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<!-- search client -->
<script>
$(document).ready(function(){
  $("#searchInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#clientTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
// get status by ajax
var chk_cls = '.chk_status';
    $('.chk_status').on('click', function(event){
        event.preventDefault();
        var status = $(this).val();
        alert(status);
        
    });
});
</script>
@endsection
        
@endsection