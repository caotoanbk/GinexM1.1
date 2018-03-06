@extends('layouts.mgt.template')

@section('content')

            <div>
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Team #{{ $team->id }}</div>
                    <div class="panel-body">
                        <a href="{{ url('/mgt/team') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($team, [
                            'method' => 'PATCH',
                            'url' => ['/mgt/team', $team->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('mgt.team.form', ['submitButtonText' => 'Update'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
@endsection
