@extends('layouts.userapp')

@section('content')

    <div class="justify-content-center">
        {{-- @include('user.sidebar') --}}
        <div class="">
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
            <div class="card-header">Welcome</div>

                <div class="card-body">

                    <div class="jumbotron" style="background-color:white;">
                            <h1 class="display-4">Welcome {{ Auth::user()->name }} </h1>
                            <p class="lead">You can manage your data here..</p>
                            {{Auth::user()->company}}
                          </div>
                </div>
            </div>
        </div>
    </div>
@endsection
