@extends('layouts.mgt.template')

@section('content')

            <div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <button type="button" id="sidebarCollapse" class="btn btn-sm btn-info">
                            <i class="glyphicon glyphicon-align-left"></i>
                            <span>Toggle Sidebar</span>
                        </button>
                        <span style="margin-left: calc(50% - 120px); font-weight: bold;">Salary</span>
                    </div>
                    <div class="panel-body">
                        <a href="{{ url('/mgt/salary/create') }}" class="btn btn-success btn-sm" title="Add New Salary">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New Salary Table
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/mgt/salary', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                            <span class="input-group-btn">
                                <button class="btn btn-secondary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!}

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>#</th><th>User</th><th>Job</th><th>Amount</th><th>Month</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($salary as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->user()->first()->name }}</td>
                                        <td>{{ $item->user()->first()->bphan }}</td>
                                        <td>{{ number_format($item->amount, 0, ',', '.') }}</td><td>{{ $item->monthYear }}</td>
                                        <td>
                                            <a href="{{ url('/mgt/salary/' . $item->id) }}" title="View Salary"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/mgt/salary/' . $item->id . '/edit') }}" title="Edit Salary"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/mgt/salary', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Delete Salary',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $salary->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
