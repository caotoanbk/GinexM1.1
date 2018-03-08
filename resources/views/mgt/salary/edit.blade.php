@extends('layouts.mgt.template')

@section('content')
            <div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <button type="button" id="sidebarCollapse" class="btn btn-sm btn-info">
                            <i class="glyphicon glyphicon-align-left"></i>
                            <span>Toggle Sidebar</span>
                        </button>
                        <span style="font-weight: bold;">Edit Salary of {{ $salary->user()->first()->name}} in {{ $salary->monthYear}}</span>
                    </div>
                    <div class="panel-body">
                        <a href="{{ url('/mgt/salary') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($salary, [
                            'method' => 'PATCH',
                            'url' => ['/mgt/salary', $salary->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        {{--@include ('mgt.salary.form', ['submitButtonText' => 'Update'])--}}
                        <div class="form-group {{ $errors->has('amount') ? 'has-error' : ''}}">
                            {!! Form::label('amount', 'Amount', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::number('amount', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                {!! $errors->first('amount', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-4 col-md-4">
                                {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
