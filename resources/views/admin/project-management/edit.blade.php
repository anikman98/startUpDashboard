@extends('layouts.adminapp')

@section('content')
    <div class="container">
        <div class="row">
            {{-- @include('admin.sidebar') --}}

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Edit ProjectManagement #{{ $projectmanagement->id }}</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/startups/'.$company) }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($projectmanagement, [
                            'method' => 'PATCH',
                            'url' => ['/admin/startups/'.$company.'/'.$projectmanagement->id.'/update'],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('admin.project-management.form', ['formMode' => 'edit'])
                        {{ Form::hidden('company', $company) }} 

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
