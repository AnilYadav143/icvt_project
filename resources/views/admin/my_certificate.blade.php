@extends('admin.includes.master')
@section('title','My Cetificate')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span>My Certificate</h4>
    <!-- Basic Layout -->
    <!-- Manage client -->
    <div class="col-xxl">
        <div class="card mb-4">
            <h5 class="card-header">My Certificate</h5>
            <div class="row">
                @if(isset($crtfct->certificate))
                    @php
                        $extname = explode('.',$crtfct->certificate);
                        $extn   =   end($crtfct);
                        var_dump($crtfct);
                    @endphp
                    @if($extn == 'pdf')
                    <object data="{{url('admin/certificate/'.$crtfct->certificate)}}" type="application/pdf" width="100%" height="500px">
                        <p>Unable to display PDF file. <a href="{{url('admin/certificate/'.$crtfct->certificate)}}">Download</a> instead.</p>
                    </object>
                    @elseif($extn != 'pdf')
                        <img src="{{url('admin/certificate/'.$crtfct->certificate)}}" alt="certificate not uploaded">
                    @endif
                @endif
            </div>
           
            @hasrole('SuperAdmin|Admin')
            <div class="row">
                <img src="{{url('admin/certificate/certificate2.jpeg')}}">
            </div>
            @endhasrole
        </div>
    </div>
    <!--end add client -->
</div>

@endsection