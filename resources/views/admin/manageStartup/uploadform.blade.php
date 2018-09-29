
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
                </div> --}}
            </div>
            <hr class="my-4">
            <button type="submit" class="btn btn-primary btn-lg active">Upload file</button>
        </form>