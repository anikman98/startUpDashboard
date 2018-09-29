@extends('layouts.adminapp')

@section('content')
<div class="container">
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
            <div class="card">
            <div class="card-header">Uploaded Files</div>
                <div class="card-body" style="padding-top: 30px; padding-bottom: 30px;">
<!--                     <div class="jumbotron" style="background-color:white;">
 -->                       <table class="table table-bordered">
                            <tr>
                                <th scope="col"><strong>File name</strong></th>
                                <th scope="col"><strong>Template Type</strong></th>
                                <th scope="col"><strong>Company</strong></th>
                                <th scope="col"><strong>From</strong></th>
                                <th scope="col"><strong>Uploaded At</strong></th>
                                <th scope="col"><strong>Submission Date</strong></th>
                                <th scope="col"><strong></strong></th>
                            </tr>
                           
                            @foreach($files as $file)
                            @if($file->from_whom === '["Super-Admin"]')
                                <tr>
                                    <td>
                                        {{ $file->name }}
                                    </td>
                                    <td>
                                        {{ $file->template_type.' template' }}
                                    </td>
                                    <td>
                                        {{ $file->company }}
                                    </td>
                                    <td>
                                        {{ $file->from_whom }}
                                    </td>

                                    <td>
                                        {{ $file->created_at }}
                                    </td>
                                    <td>
                                        {{ $file->deadline }}
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
