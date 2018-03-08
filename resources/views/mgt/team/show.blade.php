@extends('layouts.mgt.template')

@section('content')

            <div>
                <div class="panel panel-default">
                    <div class="panel-heading">Team {{ $team->name }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/mgt/team') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/mgt/team/' . $team->id . '/edit') }}" title="Edit Team"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['mgt/team', $team->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete Team',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr><th> Name </th><td> {{ $team->name }} </td></tr>
                                    <tr><th> Memebers </th><td> {{ $team->users->pluck('name') }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
@endsection
