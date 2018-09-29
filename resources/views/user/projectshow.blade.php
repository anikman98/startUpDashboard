@extends('layouts.userapp')
@section('content')
    <div class="justify-content-center">
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
            <div class="card-header">Projects</div>
                <div class="card-body" style="padding-top: 30px; padding-bottom: 30px;">
                    <table class="table table-bordered">
                            <tr>
                                <th scope="col" style="font-size:18px;"><b>Project Name</b></th>
                                <th scope="col" style="font-size:18px;"><b>Description</b></th>
                                <th scope="col" style="font-size:18px;"><b>Project Deadline</b></th>
                                <th scope="col" style="font-size:18px;"><b>Upload files</b></th>
                                <th scope="col" style="font-size:18px;"><b>Uploaded files</b></th>
                                <th scope="col" style="font-size:18px;"><b>Comments</b></th>
                           
                            </tr>
                            @foreach($projects as $item)
                                @if($user_company === $item->company)
                                <tr>
                                    <th style="font-size:18px;" scope="row"><b>{{$item->name}}</b></th>
                                    <td>{{$item->description}}</td>
                                    <td>{{ $item->deadline}}</td>
                                    <td>    
                                        <div class="panel panel-default">
                                            <form action="{{ url('user/projects/store' )}}" enctype="multipart/form-data" method="post">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <label for="InputTemplate">Select File</label>
                                                    <input type="file" id="InputTemplate" class="form-control" name="template">
                                                </div>
                                                <input class="form-check-input" type="hidden" value="{{$item->name}}" name="template_type" id="template_type">
                                                <input type="hidden" name="company" id="company" value="{{$user_company}}">
                                                <button type="submit" class="btn btn-primary btn-sm active">Upload</button>
                                            </form>
                                        </div>
                                    </td>
                                    <td>
                                        @foreach($files as $projectFiles)
                                            @if($item->name === $projectFiles->template_type)
                                                {{ $projectFiles->name}}
                                                    <br>
                                                    <hr>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td style="width: 20%">
                                        @foreach($comments as $adminComments)
                                            @if($item->id === $adminComments->projects_id)
                                               <span style="font-size:16px;">{{ $adminComments->comment}}</span>
                                            <hr> 
                                               <br>
                                               @endif
                                        @endforeach
                                   
                                        <div class="panel panel-default">
                                            <form action="{{ url('/user/projects/store' )}}" enctype="multipart/form-data" method="post">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <input type="text" id="comment" class="form-control" name="comment">
                                                </div>
                                                {{-- {{-- <input class="form-check-input" type="hidden" value="{{$item->name}}" name="template_type" id="template_type"> --}}
                                                <input type="hidden" name="projects_id" id="projects_id" value="{{$item->id}}">
                                                <button type="submit" class="btn btn-primary btn-sm active">Add Comment</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>                                      
                                @endif 
                            @endforeach                
                        </table>
<!--                     </div>
 -->                </div>
            </div>

    </div>
@endsection