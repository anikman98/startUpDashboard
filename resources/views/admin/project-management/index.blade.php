@extends('layouts.adminapp')

@section('content')
    <div class="container-fluid">
        <div  class="col-md-12">
            {{-- @include('admin.sidebar') --}}

            <div >
                <div class="card">
                    <div style="font-size:28px;" class="card-header"><strong>{{$company}}</strong></div>
                    <div class="card-body" style="width:100%;">
                            <a href="{{ url('/admin/startups/'.$company.'/create') }}" class="btn btn-success btn-sm" title="Add New ProjectManagement">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add New projects
                            </a>
                            {{-- <a href="#" class="btn btn-primary btn-lg " title="Define Stages"><i class="fas fa-plus-circle"  aria-hidden="true"></i> Stages</a> --}}

                            {!! Form::open(['method' => 'GET', 'url' => '/admin/startups/'.$company, 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
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
                        @if($projectmanagement->count() === 0)
                            <h4>No Projects created !</h4>
                        @else
                        <div >
                           
                            
                           
                            <table class="table table-bordered table-hover table-responsive">
                                <thead>
                                    <tr >

                                        <th style="font-size:18px;" scope="col"><b>Name</b></th>
                                        <th style="font-size:18px;" scope="col"><b>Status</b></th>
                                        <th style="font-size:18px;" scope="col"><b>Priority</b></th>
                                        <th style="font-size:18px;" scope="col"><b>Deadline</b></th>
                                        <th style="font-size:18px;" scope="col"><b>Assignee</b></th>
                                        <th style="font-size:18px;" scope="col"><b>Deliverable</b></th>
                                        <th style="font-size:18px;" scope="col"><b>Description</b></th>
                                        <th style="font-size:18px;" scope="col"><b>Stakeholders</b></th>
                                        <th style="font-size:18px;" scope="col"><b>Company</b></th>
                                        <th style="font-size:18px" scope="col"><B>Progress</B></th> 
                                        <th style="font-size:18px" scope="col"><b>Files</b></th>
                                        <th style="font-size:18px" scope="col"><b>Upload Files</b></th>
                                        <th style="font-size:18px;" scope="col"><b>Actions</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($projectmanagement as $item)
                                @if($item->company === $company)
                                    <tr>
                                        <th scope="row" style="font-size:18px;"><b>{{ $item->name }}</b></th>

                                        <td>{{ $item->status }}
                                            <br>
                                            <div class="panel panel-default">
                                                <form action="{{ url('admin/startups/'.$company.'/storestatus' )}}"  method="Post">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PATCH') }}
                                                    <br>
                                                    <hr>
                                                    {!! Form::select('status', ['selected'=>'Choose','Completed' => 'Completed', 'Pending' => 'Pending','Progress in Schedule' =>'Progress in Schedule','Running Behind Schedule' =>'Running Behind Schedule', 'Not yet started' => 'Not yet started'], null,  ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']  ) !!}
                                                    <button type="submit" class="btn btn-primary btn-sm active">Update Status</button>
                                                </form>
                                            </div>
                                        </td>

                                        <td>{{ $item->priority }}</td>
                                        <td>{{ $item->deadline }}</td>
                                        <td>{{ $item->assignee }}</td>
                                        <td>{{ $item->deliverable }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->stakeholders }}</td>
                                        <td>{{ $item->company }}</td>
                                        <td>This is Progresbars</td>
                                        <td>
                                            @foreach($files as $projectFiles)
                                            @if($item->name === $projectFiles->template_type)
                                                {{ $projectFiles->name}}
                                                    <br>
                                                    <hr>
                                                
                                            @endif
                                            @endforeach
                                            <td>
                                                    <div class="panel panel-default">
                                                            <form action="{{ url('admin/startups/'.$company.'/store' )}}" enctype="multipart/form-data" method="post">
                                                                {{ csrf_field() }}
                                                                <div class="form-group">
                                                                    <label for="InputTemplate">Select File</label>
                                                                    <input type="file" id="InputTemplate" class="form-control" name="template">
                                                                </div>
                                                                <input class="form-check-input" type="hidden" value="{{$item->name}}" name="template_type" id="template_type">
                                                                <input type="hidden" name="company" id="company" value="{{$item->company}}">
                                                                <button type="submit" class="btn btn-primary btn-sm active">Upload</button>
                                                            </form>
                                                        </div>
                                            </td>
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/projects/'.$company.'/'.$item->id) }}" title="View ProjectManagement"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/admin/startups/'. $company.'/' . $item->id . '/edit') }}" title="Edit ProjectManagement"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/startups/'.$company.'/'.$item->id.'/delete'],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Delete ProjectManagement',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endif
                                @endforeach
                               
                                </tbody>
                            </table>
<!--                             <div class="pagination-wrapper"> {!! $projectmanagement->appends(['search' => Request::get('search')])->render() !!} </div> -->
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <script>
            $( function() {
              $( "#progressbar" ).progressbar({
                value: 37
              });
            } );
            </script> --}}
@endsection
