@extends('layouts.adminapp')

@section('content')
    <div class="container">
        <div class="row">
            {{-- @include('admin.sidebar') --}}

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Edit StagesManagement #{{ $stagesmanagement->id }}</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/stages-management') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($stagesmanagement, [
                            'method' => 'PATCH',
                            'url' => ['/admin/projects/'.$company.'/'.$project_id.'/'. $stagesmanagement->id.'/update'],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('admin.stages-management.form', ['formMode' => 'edit'])
                        {{ Form::hidden('company', $company) }} 
                        {{ Form::hidden('project_name', $project_id) }}
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
