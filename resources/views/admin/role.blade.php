@extends('admin.includes.master')
@section('title','Role')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Roles</h4>
    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">{{isset($single_data)?'Update Role':'Add Role'}}</h5>
                    <small class="text-muted float-end">Role</small>
                </div>
                <div class="card-body">
                    <form action="{{isset($single_data)?route('rolepermission.update',$single_data->id):route('rolepermission.store')}}" method="post">
                        @csrf
                        @isset($single_data)
                        @method('PUT')
                        @endisset
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="basic-default-fullname">Role name</label>
                            <input type="text" class="form-control" value="{{isset($single_data)?$single_data->name:''}}" name='rolename' id="basic-default-fullname" placeholder="Role" />
                        </div>
                        <button type="submit" class="btn btn-success">{{isset($single_data)?'Update':'Add'}}</button>
                    </form>
                </div>
            </div>
            <!-- Role Listing -->
            <div class="card mb-4">
                <h5 class="card-header">Role Listing</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead class="table-light">
                      <tr>
                        <th>Sr.no</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Create At</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      @isset($roles)
                      @foreach($roles as $roleval)
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$loop->index+1}}</strong></td>
                        <td>{{$roleval->name}}</td>
                        <td>
                            <div class="form-check form-switch" >
                                <a href="{{route('rolestatus',$roleval->status)}}" >    
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" {{ $roleval->status > 0?'checked':''}} />
                                </a>
                            </div>
                        </td>
                        <td>{{$roleval->created_at}}</td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item btn btn-success" href="{{route('rolepermission.edit',$roleval->id)}}"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a
                              >
                              <form action="{{route('rolepermission.destroy',$roleval->id)}}" onsubmit="return confirm('Are you sure?');" method="POST">
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
              <!--end Role listing -->
        </div>
    </div>
</div>
        
@endsection