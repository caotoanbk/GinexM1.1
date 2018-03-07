@extends('layouts.mgt.template')

@section('content')

            <div>
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Revenue #{{ $revenue->id }}</div>
                    <div class="panel-body">
                        <a href="{{ url('/mgt/revenue') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($revenue, [
                            'method' => 'PATCH',
                            'url' => ['/mgt/revenue', $revenue->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('mgt.revenue.form', ['submitButtonText' => 'Update'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
