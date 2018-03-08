@extends('layouts.mgt.template')

@section('content')

            <div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <button type="button" id="sidebarCollapse" class="btn btn-sm btn-info">
                            <i class="glyphicon glyphicon-align-left"></i>
                            <span>Toggle Sidebar</span>
                        </button>
                        <span style="margin-left: calc(50% - 120px); font-weight: bold;">Salary of {{ $salary->user()->first()->name }}</span>
                    </div>
                    <div class="panel-body">

                        <a href="{{ url('/mgt/salary') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/mgt/salary/' . $salary->id . '/edit') }}" title="Edit Salary"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['mgt/salary', $salary->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete Salary',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr><th> User</th><td> {{ $salary->user()->first()->name }} </td></tr><tr><th> Amount </th><td> {{ number_format($salary->ammount, 0, ',', '.') }} </td></tr><tr><th> Month </th><td> {{ $salary->monthYear }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
