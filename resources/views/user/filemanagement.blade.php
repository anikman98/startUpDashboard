@extends('layouts.userapp')

@section('content')
     
        <div class="justify-content-center ">
            {{-- @include('user.sidebar') --}}
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
                <div class="card">
                    <div class="card-header">File Management</div>
                    <div class="card-body">
                        <h3>File Management</h3>
                        <hr>
                        <a href="{{url('/user/file/option')}}" class="btn btn-lg btn-primary active">Uploaded Files</a>
                        <a href="{{ url('/user/file/upload') }}" class="btn btn-lg btn-primary active">Upload File</a>
                    </div>
                </div>
        </div>
@endsection
