@extends('layouts.userapp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        {{-- @include('user.sidebar') --}}
        <div class="col-md-8">
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
            <div class="card-header">Files</div>
                <div class="card-body" style="padding-top: 30px; padding-bottom: 30px;">
<!--                     <div class="jumbotron" style="background-color:white;">
 -->                       <table class="table">
                            <tr>
                                <th scope="col">File Id</th>
                                <th scope="col">File name</th>
                                <th scope="col">File Type</th>
                                <th scope="col"></th>
                            </tr>
                            @foreach($files as $file)
                                @if(Auth::user()->compnay === $file->company))
                                <tr>
                                    <td scope="row">
                                        {{ $file->id }}
                                    </td>
                                    <td>
                                        {{ $file->name }}
                                    </td>
                                    <td>
                                        {{ $file->template_type.' template' }}
                                    </td>
                                        <!--  @define $path = '/public/admin/'.$file->name -->
                                    <td>
                                        <a href="/download/{{ $file->name }}" target="_blank"><button class="btn btn-primary btn-sm">Open File</button></a>
                                    </td>
                                </tr>                                      
                                @endif 
                            @endforeach                
                        </table>
<!--                     </div>
 -->                </div>
            </div>
        </div>
    </div>
</div>
@endsection
