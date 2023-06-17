@extends('admin.includes.master')
@section('title','add Client')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span>{{isset($single_data)?'Update Institute Images':'Add Instute images'}}</h4>
    <!-- Basic Layout -->
    <!-- add client -->
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">{{isset($single_data)?'Edit Instute images':'Add Instute Images'}}</h5>
                <small class="text-muted float-end">Gallery</small>
            </div>
            <div class="card-body">
                <form action="{{isset($single_data)?route('ins_img_update',$single_data->id):route('ins_save_img')}}" method='post' enctype='multipart/form-data'>
                    @csrf
                    <!-- @isset($single_data)
                        @method('PATCH')
                    @endisset -->
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="institute_id">Institute Name</label>
                            <select class="form-control" name="institute_id" id="institute_id">
                                <option selected disabled>--select Institute--</option>
                                @isset($inst_ids)
                                    @foreach($inst_ids as $ins_name)
                                       
                                            <option value="{{$ins_name->id}}">{{$ins_name->full_name}}</option>
                                 
                                    @endforeach
                                @endisset

                                
                            </select>
                        </div>
                        
                        <div class="col-sm-6">
                            <label for="image">Institute Gallery</label>
                            <div class="input-group input-group-merge">
                                <span id="image" class="input-group-text"><i class="bx bx-user"></i
                                ></span><input type="file" class="form-control" name='image[]' id="image" multiple/>
                                @isset($single_data->image)
                                <input type='hidden' name='old_pro_img' value="{{isset($single_data->image)?$single_data->image:''}}">
                                <img src="{{asset('institute_img/'.$single_data->image)}}" height='40px' width='40px'>
                                @endisset
                            </div>
                        </div>
                        
                    </div>
                    
                    
                    <div class="row justify-content-start">
                        <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">{{isset($single_data)?'Update Image':'Add Image'}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end add client -->
</div>

        
@endsection