@extends('admin.includes.master')
@section('title','Cetificate')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span>Clients Certificate</h4>
    <!-- Basic Layout -->
    <!-- Manage client -->
    <div class="col-xxl">
        <div class="card mb-4">
            <h5 class="card-header">MClients Certificate</h5>
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
                        <th>Certificate</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>State</th>
                        <th>City</th>
                        <th>Issue At</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @isset($certificate_list)
                    @foreach($certificate_list as $certival)
                    <tr>
                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$loop->index+1}}</strong></td>
                    <td><a href="{{url('admin/certificate/'.$certival->certificate)}}" target="_blank" class='btn btn-success'>View</a></td>
                    <td>{{Auth::user($certival->user_id)->firstname}}</td>
                    <td>{{Auth::user($certival->user_id)->phone}}</td>
                    <td>{{Auth::user($certival->user_id)->state}}</td>
                    <td>{{Auth::user($certival->user_id)->city}}</td>
                    <td>{{$certival->created_at}}</td>
                    <td>
                        <div class="form-check form-switch" >
                            <a href="{{route('clienturl.show',$certival->status)}}" >    
                            <input class="form-check-input chk_status" type="checkbox" role="switch" id="flexSwitchCheckChecked" value="{{ $certival->status}}" {{ $certival->status > 0?'checked':''}} />
                            </a>
                        </div>
                    </td>
                    <td>
                        <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item btn btn-success" href="{{route('clienturl.edit',$certival->id)}}"
                            ><i class="bx bx-edit-alt me-1"></i> Edit</a
                            >
                            <form action="{{route('clienturl.destroy',$certival->id)}}" onsubmit="return confirm('Are you sure?');" method="POST">
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

@endsection