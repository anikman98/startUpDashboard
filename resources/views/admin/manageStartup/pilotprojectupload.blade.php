@extends('layouts.adminapp')

@section('content')
     
    <div class="container">
        <div class="row">
            {{-- @include('admin.sidebar') --}}
            <div class="col-md-12">
                <div class="panel panel-default">    
                    <div class="jumbotron" style="background-color:white;">
                        <p class="lead"><strong>Upload Pilot Project Template</strong></p>
                        <hr class="my-4">
                        <form action="{{ url('/admin/file/store' )}}" enctype="multipart/form-data" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="InputTemplate">Select File</label>
                                <input type="file" id="InputTemplate" class="form-control" name="template">
                            </div>
                            <hr class="my-4">
                            {{-- <div class="form-group {{ $errors->has('roles') ? 'has-error' : ''}}">
                                {!! Form::label('roles', 'Roles', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::select('roles[]', Spatie\Permission\Models\Role::get()->pluck('name','name'), isset($user)?$user->getRoleNames():null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required','multiple'] : ['class' => 'form-control','multiple']) !!}
                                    {!! $errors->first('roles', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div> --}}
                            <div id="companyTable" class="form-group {{ $errors->has('company') ? 'has-error' : ''}}">
                                {!! Form::label('company', 'Company', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::select('company[0]',App\Company::get()->pluck('name','name'), null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required','multiple'] : ['class' => 'form-control','multiple']) !!}
                                    {!! $errors->first('company', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <hr class="my-4">
                            <div class="form-group">
                                <label for="deadline" class="col-sm-2 control-label">Deadline</label>
                                <div class="col-sm-6">
                                    <input type="date" name="deadline" class="form-control datepicker" id="deadline">
                                </div>
                            </div>
                            
                            <hr class="my-4">
                            <input type="hidden" name="template_type" value="pilot-project">
                            <button type="submit" class="btn btn-primary btn-lg active">Upload</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
