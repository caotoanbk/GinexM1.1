<div class="form-group required {{ $errors->has('team_id') ? 'has-error' : ''}}">
    {!! Form::label('team_id', 'Team', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('team_id', $teams, null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Choose', 'required'] : ['class' => 'form-control', 'placeholder' => 'Choose team', 'required']) !!}
        {!! $errors->first('team_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('amount') ? 'has-error' : ''}}">
    {!! Form::label('amount', 'Amount', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('amount', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('amount', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group required {{ $errors->has('monthYear') ? 'has-error' : ''}}">
    {!! Form::label('monthYear', 'Month', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('monthYear', $monthYear, null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required', 'required', 'placeholder' => 'Choose'] : ['class' => 'form-control', 'required', 'placeholder' => 'Choose']) !!}
        {!! $errors->first('monthYear', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
