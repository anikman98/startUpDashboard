@extends('layouts.userapp')

@section('content')
    <div class="justify-content-center">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $message }}</strong>
        </div>
        @endif
        @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $message }}</strong>
        </div>
        @endif
        <div class="panel panel-default">    
            <div class="jumbotron" style="background-color:white;">
                <h1 class="display-4">File Management</h1>
                <p class="lead">Click on any of the options to view the files in respective options.</p>
                <hr class="my-4">
                <a href="{{ url('/user/file/business') }}" class="btn btn-primary ">Business template</a>
                <a href="{{ url('/user/file/milestone') }}" class="btn btn-primary ">Milestone Setup</a>
                <a href="{{ url('/user/file/pilotproject') }}" class="btn btn-primary">Pilot project </a>
            </div>
        </div>
    </div>

@endsection
