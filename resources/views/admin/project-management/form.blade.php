<div class="form-group row {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-10">
        {!! Form::text('name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    </div>
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group row {{ $errors->has('description') ? 'has-error' : ''}}">
    {!! Form::label('description', 'Description', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-10">
        {!! Form::text('description', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('status') ? 'has-error' : ''}}">
    {!! Form::label('status', 'Status', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-10 " >
        {!! Form::select('status', ['selected'=>'Choose','Completed' => 'Completed', 'Pending' => 'Pending','Progress in Schedule' =>'Progress in Schedule','Running Behind Schedule' =>'Running Behind Schedule'], null,  ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']  ) !!}
        {{-- {!! Form::text('status', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!} --}}
    </div>
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>
 




<div class="form-group row {{ $errors->has('priority') ? 'has-error' : ''}}">
    {!! Form::label('priority', 'Priority', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-10">
        {!! Form::text('priority', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('priority', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row">
    <label for="deadline" class="col-sm-2 control-label">Deadline</label>
    <div class="col-md-10">
        <input type="date" name="deadline" class="form-control datepicker" id="deadline">
    </div>
</div>

<div class="form-group row{{ $errors->has('assignee') ? 'has-error' : ''}}">
    {!! Form::label('assignee', 'Assignee', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-10">
        {!! Form::text('assignee', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('assignee', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row{{ $errors->has('deliverable') ? 'has-error' : ''}}">
    {!! Form::label('deliverable', 'Deliverable', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-10">
        {!! Form::text('deliverable', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('deliverable', '<p class="help-block">:message</p>') !!}
    </div>
</div>




<div class="form-group row {{ $errors->has('stakeholders') ? 'has-error' : ''}}">
    {!! Form::label('stakeholders', 'Stakeholders', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-10">
        {!! Form::text('stakeholders', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('stakeholders', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('company') ? 'has-error' : ''}}">
        {!! Form::label('company', 'Company', ['class' => 'col-md-2 col-form-label']) !!}
        <div class="col-md-10">
            {!! Form::select('company[0]',App\Company::get()->pluck('name','name'), null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required','multiple'] : ['class' => 'form-control','multiple']) !!}
            {!! $errors->first('company', '<p class="help-block">:message</p>') !!}
        </div>
    </div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-md btn-primary']) !!}
</div>
