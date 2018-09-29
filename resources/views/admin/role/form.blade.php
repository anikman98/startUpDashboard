<div class="form-group row{{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'col-md-2 col-form-label']) !!}
   <div class="col-md-10">
    {!! Form::text('name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
   </div>
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group row {{ $errors->has('permissions') ? 'has-error' : ''}}">
    {!! Form::label('permissions', 'Permission', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-10">
        {!! Form::select('permissions[]',$permissions ,old('permissions')??isset($role)?$role->permissions->pluck('name','name'):null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required','multiple'] : ['class' => 'form-control','multiple']) !!}
        {!! $errors->first('permissions', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group row">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
