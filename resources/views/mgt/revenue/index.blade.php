@extends('layouts.mgt.template')

@section('content')

            <div>
                <div class="panel panel-default">
                    <div class="panel-heading">Revenue</div>
                    <div class="panel-body">
                        <a href="{{ url('/mgt/revenue/create') }}" class="btn btn-success btn-sm" title="Add New Revenue">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/mgt/revenue', 'class' => 'navbar-form my-2 my-lg-0 navbar-right', 'role' => 'search'])  !!}
                        {{--
                        <select name="month" id="month" class="form-control" value="{{ request('month') }}">
                            <option value="">Choose month</option>
                            <option value="2018-01">01/2018</option>
                            <option value="2018-02">02/2018</option>
                            <option value="2018-03">03/2018</option>
                            <option value="2018-04">04/2018</option>
                            <option value="2018-05">05/2018</option>
                            <option value="2018-06">06/2018</option>
                            <option value="2018-07">07/2018</option>
                            <option value="2018-08">08/2018</option>
                            <option value="2018-09">09/2018</option>
                            <option value="2018-10">10/2018</option>
                            <option value="2018-11">11/2018</option>
                            <option value="2018-12">12/2018</option>
                        </select>
                        --}}
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
                                        <th>#</th><th>Team</th><th>Amount</th><th>Month</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($revenue as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->team()->first()->name }}</td><td>{{ number_format($item->amount, '0', ',', '.') }}</td><td>{{ $item->monthYear }}</td>
                                        <td>
                                            <a href="{{ url('/mgt/revenue/' . $item->id) }}" title="View Revenue"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/mgt/revenue/' . $item->id . '/edit') }}" title="Edit Revenue"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/mgt/revenue', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Delete Revenue',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $revenue->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
@endsection
