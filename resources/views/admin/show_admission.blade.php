@extends('admin.includes.master')
@section('title','My Cetificate')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span>Admissions</h4>
    <!-- Basic Layout -->
    <!-- Manage client -->
    <div class="col-xxl">
        <div class="card mb-4">
            <h5 class="card-header"> Institute Admissions</h5>
            <div class="row">
                @if(isset($stu_excel->excel))
                    @php
                        $extname = explode('.',$stu_excel->excel);
                        $extn   =   end($extname);
                       
                    @endphp
                    @if($extn == 'pdf')
                    <object data="{{url('admin/admission_excel/'.$stu_excel->excel)}}" type="application/pdf" width="100%" height="500px">
                        <p>Unable to display PDF file. <a href="{{url('admin/admission_excel/'.$stu_excel->excel)}}">Download</a> instead.</p>
                    </object>
                    @elseif($extn != 'pdf')
                    <div class="col-sm-3">
                        
                        <a class="btn btn-success" href="{{url('admin/admission_excel/'.$stu_excel->excel)}}" target="_blank">View Admission Excel</a>
                    </div>
                    @endif
                @endif
            </div>
        
        </div>
    </div>
    <!--end add client -->
</div>

@endsection