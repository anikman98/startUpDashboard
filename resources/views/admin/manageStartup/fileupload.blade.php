@extends('layouts.adminapp')

@section('content')
     
    <div class="container">
        <div class="row">
            {{-- @include('admin.sidebar') --}}
            <div class="col-md-12">
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
                        <h1 class="display-4">File Upload</h1>
                        <p class="lead"></p>
                        <hr class="my-4">
                        <a href="{{ url('/admin/file/upload/business') }}" class="btn btn-lg btn-primary active">Business Template</a>
                        <a href="{{ url('/admin/file/upload/milestone') }}" class="btn btn-lg btn-primary active">Milestone Setup</a>
                        <a href="{{ url('/admin/file/upload/pilotproject') }}" class="btn btn-lg btn-primary active">Pilot Project</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
