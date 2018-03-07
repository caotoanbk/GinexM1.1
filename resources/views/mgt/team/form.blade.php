<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('members') ? 'has-error' : ''}}">
    {!! Form::label('members', 'Member', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('members[]',$members, ['1', '2', '3'], ('' == 'required') ? ['class' => 'form-control', 'required' => 'required', 'multiple', 'size' => '10'] : ['class' => 'form-control', 'multiple', 'size' => '10']) !!}
        {!! $errors->first('members', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
