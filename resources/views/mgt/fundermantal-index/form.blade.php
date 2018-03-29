@extends('layouts.mgt.template')
@section('css')
<link rel="stylesheet" href="/css/tokeninput-facebook.css">
@endsection
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
                        <button onclick="window.history.back()" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/mgt/fundermantal-index', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true]) !!}

                        {{-- @include ('mgt.salary.form') --}}
                        <div class="form-group required {{ $errors->has('monthYear') ? 'has-error' : ''}}">
                            {!! Form::label('monthYear', 'Month(s)', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                              {{--  {!! Form::text('monthYear', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Choose'] : ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Choose', 'multiple']) !!} --}}
                                <input type="text" name="monthYear" class="form-control" id="months" placeholder="Input month(s)..." required>
                                {!! $errors->first('monthYear', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-4 col-md-4">
                                {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Submit', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>

                        {!! Form::close() !!}
                        

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-tokeninput/1.7.0/jquery.tokeninput.min.js"></script>

<script>
        $(document).ready(function() {
            let arr = [];
            for (var i = 2018; i >= 2017; i--) {
                for (var j = 12; j >= 1; j--) {
                    if(j<10){
                        var str = i.toString()+'-0'+j.toString();
                        arr.push({id:str, name: str});
                    }else{
                        var str = i.toString()+'-'+j.toString();
                        arr.push({id: str, name: str});
                    }
                }
            }
            $("#months").tokenInput(arr, {
        theme: "facebook"
    });
            $('input#test').click(function(){
                console.log($('input[name=blah]').val());
            });
        });
        </script>
@endsection