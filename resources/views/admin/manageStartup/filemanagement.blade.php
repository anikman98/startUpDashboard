@extends('layouts.adminapp')

@section('content')
    <div class=" ">
        <div class="row justify-content-center">
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
               <div class="container">
                    <div class="col-md-12" >
                            <div class="card">
                                <div class="card-header"> <b>File Management</b></div>
                                <div class="card-body" style="align-items: center;">
                                        <h1 class="display-4">File Management</h1>
                                        <p class="lead">This is a simple dashboard for managing FILE MANAGEMENT.</p>
                                        <hr class="my-4">
                                        <a href="{{ url('/admin/file/upload') }}"><button class="btn btn-lg btn-primary active">Upload Files</button></a>
                                        <a href="{{ url('/admin/file/show') }}"><button class="btn btn-lg btn-primary active">Uploaded Files</button></a>
                                        <a href="{{ url('/admin/user_uploaded_files') }}"><button class="btn btn-lg btn-primary active">User Uploaded Files</button></a>
                                </div>
                            </div>
                        </div>
               </div>
            </div>
        </div>
    </div>
@endsection
