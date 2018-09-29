@extends('layouts.adminapp')

@section('content')
    <div class="container">
        <div class="row">
            {{-- @include('admin.sidebar') --}}
            <div class="col-md-12">
               <div class="card">
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
            



                <div class="card-header"> <b>Admin Dashboard</b></div>
                    <div class="card-body">
                        <h1 class="display-6"> Hello {{Auth:: user()->name}}</h1>
                        <hr>
                        <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">File Management</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    <a href="{{ url('/admin/file') }}" class="btn btn-primary">File Management</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                <h5 class="card-title">Project Management</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <a href="{{ url('/admin/startups') }}" class="btn btn-primary">Click me!</a>
                            </div>
                        </div>
                        </div>
                    </div>                    </div>
                </div>
               </div>
            </div>
        </div>
    </div>
@endsection