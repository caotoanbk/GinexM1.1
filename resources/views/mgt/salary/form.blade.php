<div class="form-group required {{ $errors->has('user_id') ? 'has-error' : ''}}">
    {!! Form::label('user_id', 'User', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('user_id', $users, null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Choose'] : ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Choose']) !!}
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('amount') ? 'has-error' : ''}}">
    {!! Form::label('amount', 'Amount', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('amount', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('amount', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group required {{ $errors->has('monthYear') ? 'has-error' : ''}}">
    {!! Form::label('monthYear', 'Monthyear', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('monthYear', $monthYear, null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Choose'] : ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Choose']) !!}
        {!! $errors->first('monthYear', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
