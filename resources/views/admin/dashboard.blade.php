
@extends('layouts.adminapp')

@section('content')
    <div class="container">
        <div class="row">
            
                {{-- @include('admin.sidebar') --}}
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><b>Admin Dashboard</b></div>
                    <div class="card-body">
                        <h1 class="display-4">Hello, {{ Auth::user()->name }}!</h1>
                        <hr class="row">
                        <p class="lead">This is a dashboard <br> where you can create, update, delete , and edit users.</p>
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
  
@endsection
