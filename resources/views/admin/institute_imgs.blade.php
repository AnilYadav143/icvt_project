@extends('admin.includes.master')
@section('title','add Client')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span>Institute Images</h4>
    <!-- Basic Layout -->
    <!-- add client -->
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0"> Institute Images</h5>
                <small class="text-muted float-end">Gallery</small>
            </div>
            <div class="card-body">
                <div class="row">
                @isset($institute_imgs)
                   @foreach($institute_imgs as $ins_img)
                   @foreach(json_decode($ins_img->image) as $img_data)
                   
                        <div class="col-sm-4">
                            <div class="card">
                            <img src="{{url($img_data)}}" class="card-img-top"
                                alt="Institute photos not uploaded" height="400px" width="400px" />
                            <div class="card-body">
                                <h5 class="card-title"><!-- can write title title --></h5>
                                <p class="card-text">
                                    <!-- can write title desc -->
                                </p>
                            </div>
                            </div>
                        </div>
                    
                    
                    @endforeach
                   @endforeach
                @endisset
                </div>
            </div>
        </div>
    </div>
    <!--end add client -->
</div>

        
@endsection