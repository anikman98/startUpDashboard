<div class="form-group row{{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('stage_no', ' Stage No', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-10">
        {!! Form::selectRange('stage_no', 1,8 , ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    </div>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group row{{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-10">
        {!! Form::text('name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    </div>
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group row {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('description', 'Description', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-10">
        {!! Form::textarea('description', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    </div>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>

{{-- <div class="form-group row {{ $errors->has('progress') ? 'has-error' : ''}}">
    {!! Form::label('progress', 'Progress', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-10">
        {!! Form::text('progress', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    </div>
    {!! $errors->first('progress', '<p class="help-block">:message</p>') !!}
</div> --}}


<div class="form-group row {{ $errors->has('status') ? 'has-error' : ''}}">
    {!! Form::label('status', 'Status', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-10 " >
        {!! Form::select('status', ['Completed' => 'Completed', 'Pending' => 'Pending','Progress in Schedule' =>'Progress in Schedule'], null,  ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']  ) !!}
        {{-- {!! Form::text('status', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!} --}}
    </div>
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group row">
    <label for="stage_deadline" class=" col-md-2 ">Stage Deadline</label>
    <div class="col-sm-10">
        <input type="date" name="stage_deadline" class="form-control datepicker" id="stage_deadline">
    </div>
</div>
{{-- <div class="form-group row {{ $errors->has('comment') ? 'has-error' : ''}}">
    {!! Form::label('comment', 'Comment', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-10">
        {!! Form::text('comment', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    </div>
    {!! $errors->first('comment', '<p class="help-block">:message</p>') !!}
</div> --}}
<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
