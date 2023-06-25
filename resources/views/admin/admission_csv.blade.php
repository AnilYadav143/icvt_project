@extends('admin.includes.master')
@section('title','Upload Certificate')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span>Upload Excel Sheet</h4>
    <!-- Basic Layout -->
    <!-- add client -->
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Upload Admission Excel Sheet</h5>
                <small class="text-muted float-end">Certificate</small>
            </div>
            <div class="card-body">
                <form action="{{route('save_admission')}}" method='post' enctype='multipart/form-data'>
                    @csrf
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
                            <label for="file">Admission Excel</label>
                            <div class="input-group input-group-merge">
                                <span id="file" class="input-group-text"><i class="bx bx-user"></i
                                ></span><input type="file" name='excel' class="form-control" id="file"/>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-start">
                        <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Upload Excel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@include('sweetalert::alert')