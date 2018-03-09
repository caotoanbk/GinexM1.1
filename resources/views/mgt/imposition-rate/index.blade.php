@extends('layouts.mgt.template')

@section('content')
   
            <div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <button type="button" id="sidebarCollapse" class="btn btn-sm btn-info">
                            <i class="glyphicon glyphicon-align-left"></i>
                            <span>Toggle Sidebar</span>
                        </button>
                       
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

                        {!! Form::open(['url' => '/mgt/imposition-rate', 'method' => 'get', 'class' => 'form-horizontal', 'files' => true]) !!}

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
                                {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Submit', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>

                        {!! Form::close() !!}
           							@if($isRequest)
                        <div class="table-responsive">
                            
                            <table class="table table-bordered" style="white-space: nowrap;">
		<thead>
		<tr>
			<th colspan="3">&nbsp;</th>
			<th colspan="7">Phân bổ chi phí lao động</th>
			<th>&nbsp;</th>
			<th colspan="7">Phân bổ headcount</th>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
			<th>Hunter</th>
			<th>Điều hành</th>
			<th>Sales & Marketing</th>
			<th>Q.lý KD & Acc</th>
			<th>IT</th>
			<th>Nấu ăn</th>
			<th>CTV</th>
			<th>&nbsp;</th>
			<th>Hunter</th>
			<th>Điều hành</th>
			<th>Sales & Marketing</th>
			<th>Q.lý KD & Acc</th>
			<th>IT</th>
			<th>Nấu ăn</th>
			<th>CTV</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><strong>Nhóm</strong></td>
			<td><strong>Doanh thu</strong></td>
			<td><strong>TL phân bổ</strong></td>
			<td>{{ number_format($utility->calculateSalaryDepart($monthValue, 4),
			0, ',', '.') }}</td>
			<td>{{ number_format($utility->calculateSalaryDepart($monthValue, 2),
			0, ',', '.') }}</td>
			<td>{{ number_format($utility->calculateSalaryDepart($monthValue, 5),
			0, ',', '.') }}</td>
			<td>{{ number_format($utility->calculateSalaryDepart($monthValue, 1),
			0, ',', '.') }}</td>
			<td>{{ number_format($utility->calculateSalaryDepart($monthValue, 7),
			0, ',', '.') }}</td>
			<td>{{ number_format($utility->calculateSalaryDepart($monthValue, 6),
			0, ',', '.') }}</td>
			<td></td>
			<td></td>
			<td>{{ $utility->countType(4) }}</td>
			<td>{{ $utility->countType(2) }}</td>
			<td>{{ $utility->countType(5) }}</td>
			<td>{{ $utility->countType(1) }}</td>
			<td>{{ $utility->countType(7) }}</td>
			<td>{{ $utility->countType(6) }}</td>
			<td></td>
		</tr>

		@foreach ($teams as $team)
		<tr>
			<td>{{ $team->name }}</td>
			<td>{{ number_format($team->revenues()->where('monthYear', $monthValue)->first()->amount,
			0, ',', '.') }}</td>
			<td>@if($tongdoanhthu > 0) {{ number_format($team->revenues()->where('monthYear', $monthValue)->first()->amount / $tongdoanhthu, 2, ',', '.') }} @else 0 @endif</td>
			<td>@if($tongdoanhthu > 0) {{ number_format($team->revenues()->where('monthYear', $monthValue)->first()->amount / $tongdoanhthu * $utility->calculateSalaryDepart($monthValue, 4), 0, ',', '.') }} @else 0 @endif</td>
			<td>@if($tongdoanhthu > 0) {{ number_format($team->revenues()->where('monthYear', $monthValue)->first()->amount / $tongdoanhthu * $utility->calculateSalaryDepart($monthValue, 2), 0, ',', '.') }} @else 0 @endif</td>
			<td>@if($tongdoanhthu > 0) {{ number_format($team->revenues()->where('monthYear', $monthValue)->first()->amount / $tongdoanhthu * $utility->calculateSalaryDepart($monthValue, 5), 0, ',', '.') }} @else 0 @endif</td>
			<td>@if($tongdoanhthu > 0) {{ number_format($team->revenues()->where('monthYear', $monthValue)->first()->amount / $tongdoanhthu * $utility->calculateSalaryDepart($monthValue, 1), 0, ',', '.') }} @else 0 @endif</td>
			<td>@if($tongdoanhthu > 0) {{ number_format($team->revenues()->where('monthYear', $monthValue)->first()->amount / $tongdoanhthu * $utility->calculateSalaryDepart($monthValue, 7), 0, ',', '.') }} @else 0 @endif</td>
			<td>@if($tongdoanhthu > 0) {{ number_format($team->revenues()->where('monthYear', $monthValue)->first()->amount / $tongdoanhthu * $utility->calculateSalaryDepart($monthValue, 6), 0, ',', '.') }} @else 0 @endif</td>
			<td></td>
			<td></td>
			<td>{{ count($team->users()->where('active', true)->get()->toArray())}}</td>
			<td>@if($tongdoanhthu > 0) {{ number_format($team->revenues()->where('monthYear', $monthValue)->first()->amount / $tongdoanhthu * $utility->countType(2), 2, ',', '.') }} @else 0 @endif</td>
			<td>@if($tongdoanhthu > 0) {{ number_format($team->revenues()->where('monthYear', $monthValue)->first()->amount / $tongdoanhthu * $utility->countType(5), 2, ',', '.') }} @else 0 @endif</td>
			<td>@if($tongdoanhthu > 0) {{ number_format($team->revenues()->where('monthYear', $monthValue)->first()->amount / $tongdoanhthu * $utility->countType(1), 2, ',', '.') }} @else 0 @endif</td>
			<td>@if($tongdoanhthu > 0) {{ number_format($team->revenues()->where('monthYear', $monthValue)->first()->amount / $tongdoanhthu * $utility->countType(7), 2, ',', '.') }} @else 0 @endif</td>
			<td>@if($tongdoanhthu > 0) {{ number_format($team->revenues()->where('monthYear', $monthValue)->first()->amount / $tongdoanhthu * $utility->countType(6), 2, ',', '.') }} @else 0 @endif</td>
			<td></td>
		</tr>
		@endforeach
		<tr>
			<td><strong>Tổng</strong></td>
			<td>{{ number_format($tongdoanhthu, 0, ',', '.') }}</td>
			<td>@if($tongdoanhthu > 0) 1 @else 0 @endif</td>
			<td>{{ number_format($utility->calculateSalaryDepart($monthValue, 4),
			0, ',', '.') }}</td>
			<td>{{ number_format($utility->calculateSalaryDepart($monthValue, 2),
			0, ',', '.') }}</td>
			<td>{{ number_format($utility->calculateSalaryDepart($monthValue, 5),
			0, ',', '.') }}</td>
			<td>{{ number_format($utility->calculateSalaryDepart($monthValue, 1),
			0, ',', '.') }}</td>
			<td>{{ number_format($utility->calculateSalaryDepart($monthValue, 7),
			0, ',', '.') }}</td>
			<td>{{ number_format($utility->calculateSalaryDepart($monthValue, 6),
			0, ',', '.') }}</td>
			<td></td>
			<td></td>
			<td>{{ $utility->countType(4) }}</td>
			<td>{{ $utility->countType(2) }}</td>
			<td>{{ $utility->countType(5) }}</td>
			<td>{{ $utility->countType(1) }}</td>
			<td>{{ $utility->countType(7) }}</td>
			<td>{{ $utility->countType(6) }}</td>
			<td></td>
		</tr>
	</tbody>
</table>
                            
                        </div>
                        @endif
                        

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
