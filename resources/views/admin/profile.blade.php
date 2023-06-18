@extends('admin.includes.master')
@section('title','Profile')
@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

        <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-3">
            <li class="nav-item">
                <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a>
            </li>
            </ul>
            <div class="card mb-4">
            <h5 class="card-header">Profile Details</h5>
            <!-- Account -->
            <form id="formAccountSettings" method="PATCH" action="#" enctype='multipart/form-data'>
                @csrf
                <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <img src="{{isset($user_data->profile)?url('clients_profile/'.$user_data->profile):''}}"
                        alt="user-avatar"
                        class="d-block rounded"
                        height="100"
                        width="100"
                        id="uploadedAvatar"
                    />
                    <div class="button-wrapper">
                        <!-- <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload new photo</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" id="upload" name='profile' class="account-file-input" hidden />
                        </label> -->
                
                    </div>
                    </div>
                </div>
                <hr class="my-0" />
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="fname" class="form-label">Owner Name</label>
                            <input class="form-control" type="text" readonly id="fname" name="fname" value="{{isset($user_data->firstname)?$user_data->firstname:''}}" autofocus/>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="lname" class="form-label">Institute Name</label>
                            <input class="form-control" type="text" readonly id="lname" name="lname" value="{{isset($user_data->lastname)?$user_data->lastname:''}}" autofocus/>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input class="form-control" type="email" readonly id="email" name="email" value="{{isset($user_data->email)?$user_data->email:''}}" autofocus/>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="password" class="form-label" >Password</label>
                            <input class="form-control" type="password" readonly id="password" name="password" placeholder="********" autofocus/>
                        </div>
                        <div class="mb-3 col-md-6">
                        <label class="form-label" for="phone">Phone Number</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text">IN (+91)</span>
                            <input class="form-control" type="number" readonly id="phone" name="phone" value="{{isset($user_data->phone)?$user_data->phone:''}}" autofocus/>
                        </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="country" class="form-label">Country</label>
                            <input type="text" class="form-control" readonly id="country" name="country" value="{{isset($user_data->country)?$user_data->country:''}}" placeholder="Country" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="state" class="form-label">State</label>
                            <input type="text" class="form-control" readonly id="state" name="state" value="{{isset($user_data->state)?$user_data->state:''}}" placeholder="State" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" readonly id="city" name="city" value="{{isset($user_data->city)?$user_data->city:''}}" placeholder="State" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="address" class="form-label">Address</label>
                            <textarea name='address' readonly class="form-control" id='address'>{{isset($user_data->address)?$user_data->address:''}}</textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2">Save changes</button>
                    </div>
                </div>
            </form>
            <!-- /Account -->
            </div>
            
        </div>
        </div>
    </div>
    <!-- / Content -->

    
@endsection