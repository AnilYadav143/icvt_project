@extends('admin.includes.master')
@section('title', 'Dashboard')
@section('content')
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-sm-6"><a href="{{route('my_certificate')}}" class="btn btn-success">My Certificate</a></div>
    <div class="col-sm-6"><a href="{{ route('userprofile', Auth::user()->id ) }}" class="btn btn-success">My Profile</a></div>
   
  </div>
</div>
<!-- / Content -->
@endsection