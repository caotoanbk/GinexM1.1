@extends('layouts.mgt.template')

@section('content')

            <div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <button type="button" id="sidebarCollapse" class="btn btn-sm btn-info">
                            <i class="glyphicon glyphicon-align-left"></i>
                            <span>Toggle Sidebar</span>
                        </button>
                        <span style="margin-left: calc(50% - 120px); font-weight: bold;">Create Salaries</span>
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

                        {!! Form::open(['url' => '/mgt/salary-table', 'class' => 'form-horizontal', 'files' => true]) !!}

                        {{-- @include ('mgt.salary.form') --}}
                        <div class="form-group required {{ $errors->has('monthYear') ? 'has-error' : ''}}">
                            {!! Form::label('monthYear', 'Month', ['class' => 'col-md-4 control-label']) !!}
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

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
