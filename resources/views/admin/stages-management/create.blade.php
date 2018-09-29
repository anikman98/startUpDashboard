@extends('layouts.adminapp')

@section('content')
    <div class="container">
        <div class="row">
            {{-- @include('admin.sidebar') --}}

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Add New Stages</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/projects/'.$company.'/'.$project_id) }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/admin/projects/'.$company.'/'.$project_id, 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('admin.stages-management.form', ['formMode' => 'create'])
                        {{ Form::hidden('company', $company) }} 
                        {{ Form::hidden('project_name', $project_id) }}
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection