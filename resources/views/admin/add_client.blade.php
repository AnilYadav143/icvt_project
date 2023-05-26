@extends('admin.includes.master')
@section('title','add Client')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span>{{isset($single_data)?'Update Client Details':'Add Client'}}</h4>
    <!-- Basic Layout -->
    <!-- add client -->
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">{{isset($single_data)?'Edit Client':'Add Clients'}}</h5>
                <small class="text-muted float-end">Cliets</small>
            </div>
            <div class="card-body">
                <form action="{{isset($single_data)?route('clienturl.update',$single_data->id):route('clienturl.store')}}" method='post' enctype='multipart/form-data'>
                    @csrf
                    @isset($single_data)
                        @method('PATCH')
                    @endisset
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="fname">First Name</label>
                            <div class="input-group input-group-merge">
                                <span id="fname" class="input-group-text"><i class="bx bx-user"></i
                                ></span><input type="text" name='fname' class="form-control" value="{{isset($single_data->firstname)?$single_data->firstname:''}}" id="fname" placeholder="Enter First Name"/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="lname">Last Name</label>
                            <div class="input-group input-group-merge">
                                <span id="lname" class="input-group-text"><i class="bx bx-user"></i
                                ></span><input type="text" name='lname' class="form-control" value="{{isset($single_data->lastname)?$single_data->lastname:''}}" id="lname" placeholder="Enter last Name"/>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="email">Email</label>
                            <div class="input-group input-group-merge">
                                <span id="email" class="input-group-text"><i class="bx bx-envelope"></i
                                ></span><input type="email" name='email' class="form-control" value="{{isset($single_data->email)?$single_data->email:''}}" id="email" placeholder="Enter Email Name"/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="password">Password</label>
                            <div class="input-group input-group-merge">
                                <span id="password" class="input-group-text"><i class="bx bx-lock"></i
                                ></span><input type="number" name='password' class="form-control" id="password" placeholder="Enter Password"/>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="phone">Phone</label>
                            <div class="input-group input-group-merge">
                                <span id="phone" class="input-group-text"><i class="bx bx-phone"></i
                                ></span><input type="number" name='phone' class="form-control" value="{{isset($single_data->phone)?$single_data->phone:''}}" id="phone" placeholder="Enter phone Name"/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="profile">Profile</label>
                            <div class="input-group input-group-merge">
                                <span id="profile" class="input-group-text"><i class="bx bx-user"></i
                                ></span><input type="file" class="form-control" name='profile' id="profile"/>
                                @isset($single_data->profile)
                                <input type='hidden' name='old_pro_img' value="{{isset($single_data->profile)?$single_data->profile:''}}">
                                <img src="{{asset('clients_profile/'.$single_data->profile)}}" height='40px' width='40px'>
                                @endisset
                            </div>
                        </div>
                        
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="country">Country</label>
                            <div class="input-group input-group-merge">
                                <span id="country" class="input-group-text"><i class="bx bx-map"></i
                                ></span><input type="text" name='country' class="form-control" value="{{isset($single_data->country)?$single_data->country:''}}" id="country" placeholder="Enter Country Name"/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="state">State</label>
                            <div class="input-group input-group-merge">
                                <span id="state" class="input-group-text"><i class="bx bx-map"></i
                                ></span><input type="text" class="form-control" name='state' value="{{isset($single_data->state)?$single_data->state:''}}"  id="state"/>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="city">City</label>
                            <div class="input-group input-group-merge">
                                <span id="city" class="input-group-text"><i class="bx bx-map"></i
                                ></span><input type="text" class="form-control" name='city' value="{{isset($single_data->city)?$single_data->city:''}}" id="city"/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="address">Address</label>
                            <div class="input-group input-group-merge">
                                <span id="address" class="input-group-text"><i class="bx bx-message"></i
                                ></span><textarea name='address' class="form-control" id="address" placeholder="Enter Email Name">{{isset($single_data->address)?$single_data->address:''}}</textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row justify-content-start">
                        <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">{{isset($single_data)?'Update Client':'Add Client'}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end add client -->
</div>

        
@endsection