@extends('layouts.adminapp')
@section('content')
    <div >
        <div class="col-md-12">
            {{-- @include('admin.sidebar') --}}
            <div >
                <div class="card">
                    <div style="font-size:28px;" class="card-header"><strong>{{$project->name}}</strong></div>
                    <div class="card-body">
                        <a href="{{ url('/admin/projects/'.$company.'/'.$project->id.'/create') }}" class="btn btn-success btn-sm" title="Add New StagesManagement">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New Stages
                        </a>
                        {!! Form::open(['method' => 'GET', 'url' => '/admin/projects/'.$company.'/'.$project->id, 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                            <span class="input-group-append">
                                <button class="btn btn-secondary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!}
                        <br/>
                        <br/>
                        @if($stagesmanagement->count() === 0)
                        <h4>No Stages created !</h4>
                        @else
                        <div class="table-responsive">
                            <table class="table table-bordered table-hovers">
                                <thead>
                                    <tr>
                                        <td></td>
                                        <th style="font-size:18px;" scope="col"><b>Name</b></th>
                                        <th style="font-size:18px;" scope="col"><b>Description</b></th>
                                        <th style="font-size:18px;" scope="col"><b>Status </b></th>
                                        <th style="font-size:18px;" scope="col"><b>Deadline</b></th>
                                        <th style="font-size:18px;" scope="col"><b>Comment</b></th>
                                        <th style="font-size:18px;" scope="col"><b>Actions</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($stagesmanagement as $item)
                                @if(($item->company === $company) or ($item->project_name === $project->id))
                                    <tr>
                                        <th style="font-size:18px;" scope="row"><b>Stage{{ $item->stage_no }}</b></th>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->status }}</td> 
                                        <td>{{ $item->stage_deadline }}</td>
                                        <td style="width: 20%">
                                            @foreach($comment as $adminComments)
                                           
                                            @if($adminComments->projects_id === $project->id)
                                               <span style="font-size:18px;  font-weight: bold;">{{Auth::user()->name}} </span> : <span style="font-size:14px;">{{ $adminComments->comment}}</span>
                                               <br>
                                            @endif
                                            
                                        @endforeach

                                            <br>
                                            <hr>
                                            <div class="panel panel-default">
                                                <form action="{{ url('admin/projects/'.$company.'/'.$project->id.'/store' )}}" enctype="multipart/form-data" method="post">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        {{-- <label for="comment">Add Comment</label> --}}
                                                        <input type="text" id="comment" class="form-control" name="comment">
                                                    </div>
                                                    {{-- <input class="form-check-input" type="hidden" value="{{$item->name}}" name="template_type" id="template_type">
                                                    <input type="hidden" name="company" id="company" value="{{$item->company}}"> --}}
                                                    <button type="submit" class="btn btn-primary btn-sm active">Add Comment</button>
                                                </form>
                                            </div>
                                        </td>
                                        <td>
<!--                                            <a href="{{ url('/admin/projects/'.$company . $item->id) }}" title="View StagesManagement"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
 -->                                            <a href="{{ url('/admin/projects/'.$company.'/'.$project->id.'/'.$item->id.'/edit') }}" title="Edit StagesManagement"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/projects/'.$company.'/'.$project->id.'/'.$item->id.'/delete'],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Delete StagesManagement',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endif
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $stagesmanagement->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
