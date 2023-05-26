@extends('admin.includes.master')
@section('title','Permission Assign')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span>Role Has Permission</h4>
    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Fetch Permission</h5>
                    <small class="text-muted float-end">Fetch Permission</small>
                </div>
                <div class="card-body">
                    <form action="{{route('assignpermission.store')}}" method="post">
                        @csrf
                        <div class="col-md-6 mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Example select</label>
                            <select class="form-select" id="exampleFormControlSelect1" name="fetchrole" aria-label="Default select example">
                              <option selected disabled>--Select Role--</option>
                              @isset($roles)
                              @foreach($roles as $roledata)
                                <option value="{{$roledata->id}}">{{$roledata->name}}</option>
                              @endforeach
                              @endisset
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Fetch</button>
                    </form>
                </div>
            </div>
            <!-- Assign Permission -->
            @isset($selectrole)
            <form action="{{route('assignpermission.update',$selectrole->id)}}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="roleid" value="{{ $selectrole->id }}" />
                <div class="card mb-4">
                  <h5 class="card-header">Assign Permission</h5>
                  <div class="table-responsive text-nowrap">
                    <table class="table">
                      <thead class="table-light">
                        <tr>
                          <th>Permission name</th>
                          <th>Menu</th>
                          <th>Create</th>
                          <th>Read</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody class="table-border-bottom-0">
                      @if (!isset($permissionnames))
                          <tr>
                              <td colspan="7">No permission assigned</td>
                          </tr>
                      @else
                          @foreach ($permissionnames as $pname)
                              <tr>
                                  <th>
                                      {{ $pname->name }}
                                  </th>
                                  @foreach ($pname->permissions as $permission)
                                      <td>
                                          <input type="checkbox" class="form-check" value="{{ $permission->name }}"
                                              name='rolepermissions[]'
                                              {{ $selectrole->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                      </td>
                                  @endforeach
                              </tr>
                          @endforeach
                      @endif
                      </tbody>
                    </table>
                    <div class="mt-5 mb-3">
                    
                      <button type="submit" class="btn btn-info">Assign Permission</button>
                    </div>
                  </div>
              </div>
            </form>
              @endisset
              <!--end  Assign Permission -->
        </div>
    </div>
</div>
        
@endsection