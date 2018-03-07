@extends('layouts.mgt.template')

@section('content')
            <div>
                <div class="panel panel-default">
                    <div class="panel-heading">Revenue {{ $revenue->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/mgt/revenue') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/mgt/revenue/' . $revenue->id . '/edit') }}" title="Edit Revenue"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['mgt/revenue', $revenue->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete Revenue',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $revenue->id }}</td>
                                    </tr>
                                    <tr><th> Team Id </th><td> {{ $revenue->team()->first()->name }} </td></tr><tr><th> Amount </th><td> {{ number_format($revenue->amount, 0, ',', '.') }} </td></tr><tr><th> Month </th><td> {{ $revenue->monthYear }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
