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
                        <button onclick="window.history.back()" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
                        <br />
                        <br />

                        <div class="table-responsive">
                            
                            <table class="table table-bordered" style="white-space: nowrap;border-collapse: collapse;">
        <thead>
        <tr>
            <th>Subsidiary</th>
            <th>Product</th>
            <th>Index2</th>
            <th>Index3</th>
            @foreach($months as $m)
             <th>{{$m}}</th>
            @endforeach
        </tr>
<!--Begin Template-->
        <tr>
            <td rowspan="19">GINEX</td>
            <td rowspan="19">Total</td>
            <td>Doanh Thu (VND)</td>
            <td></td>
            @foreach($months as $m)
            <td></td>
            @endforeach
        </tr>
        <tr>
            <td>Doanh Thu/chi phí lao động</td>
            <td></td>
            @foreach($months as $m)
            <td></td>
            @endforeach
        </tr>
        <tr>
            <td>Tổng LĐ_Kg bao gồm CTV</td>
            <td></td>
            @foreach($months as $m)
            <td></td>
            @endforeach
        </tr>
        <tr>
            <td>Tổng LĐ_Bao gồm CTV</td>
            <td></td>
            @foreach($months as $m)
            <td></td>
            @endforeach
        </tr>
        <tr>
            <td rowspan="7" style="vertical-align: middle;">Headcount</td>
            <td>Cấp điều hành</td>
            @foreach($months as $m)
            <td></td>
            @endforeach
        </tr>
        <tr>
            <td>Hunters</td>
            @foreach($months as $m)
            <td></td>
            @endforeach
        </tr>
        <tr>
            <td>Sales & Marketing</td>
            @foreach($months as $m)
            <td></td>
            @endforeach
        </tr>
        <tr>
            <td>QLKD & Acc</td>
            @foreach($months as $m)
            <td></td>
            @endforeach
        </tr>
        <tr>
            <td>IT</td>
            @foreach($months as $m)
            <td></td>
            @endforeach
        </tr>
        <tr>
            <td>Nấu ăn</td>
            @foreach($months as $m)
            <td></td>
            @endforeach
        </tr>
        <tr>
            <td>CTV</td>
            @foreach($months as $m)
            <td></td>
            @endforeach
        </tr>
        <tr>
            <td colspan="2" style="vertical-align: middle; border-bottom: none;">Chi phí lao động (VND)</td>
            @foreach($months as $m)
            <td></td>
            @endforeach
        </tr>
        <tr>
            <td rowspan="7" style="vertical-align: middle; border-top: none;"></td>
            <td>Cấp điều hành</td>
            @foreach($months as $m)
            <td></td>
            @endforeach
        </tr>
        <tr>
            <td>Hunters</td>
            @foreach($months as $m)
            <td></td>
            @endforeach
        </tr>
        <tr>
            <td>Sales & Marketing</td>
            @foreach($months as $m)
            <td></td>
            @endforeach
        </tr>
        <tr>
            <td>QLKD & Acc</td>
            @foreach($months as $m)
            <td></td>
            @endforeach
        </tr>
        <tr>
            <td>IT</td>
            @foreach($months as $m)
            <td></td>
            @endforeach
        </tr>
        <tr>
            <td>Nấu ăn</td>
            @foreach($months as $m)
            <td></td>
            @endforeach
        </tr>
        <tr>
            <td>CTV</td>
            @foreach($months as $m)
            <td></td>
            @endforeach
        </tr>
<!--End Template-->
        @foreach($teams as $t)
            <tr>
                <td rowspan="19">GINEX</td>
                <td rowspan="19">{{$t->name}}</td>
                <td>Doanh Thu (VND)</td>
                <td></td>
                @foreach($months as $m)
                <td>{{number_format($utility->calculateDoanhthu($t->id, $m), 0, '.', ',')}}</td>
                @endforeach
            </tr>
            <tr>
                <td>Doanh Thu/chi phí lao động</td>
                <td></td>
                @foreach($months as $m)
                <td>@if($utility->calculateChiphilaodong($t->id, $m) > 0) {{number_format($utility->calculateDoanhthu($t->id, $m)/$utility->calculateChiphilaodong($t->id, $m), 2, '.', ',')}} @endif</td>
                @endforeach
            </tr>
            <tr>
                <td>Tổng LĐ_Kg bao gồm CTV</td>
                <td></td>
                @foreach($months as $m)
                 <td>{{number_format($utility->calculateTongLDKhongbaogomCTV($t->id, $m), 2, '.', ',') }}</td>
                @endforeach
            </tr>
            <tr>
                <td>Tổng LĐ_Bao gồm CTV</td>
                <td></td>
                @foreach($months as $m)
                    <td>{{number_format($utility->calculateTongLDBaogomCTV($t->id, $m), 2, '.', ',') }}</td>
                @endforeach
            </tr>
            <tr>
                <td rowspan="7" style="vertical-align: middle;">Headcount</td>
                <td>Cấp điều hành</td>
                @foreach($months as $m)
                 <td>{{number_format($utility->calculatePositionRateTeam($t->id, $m)*$utility->countType(2, $m), 2, '.', ',') }}</td>
                @endforeach
            </tr>
            <tr>
                <td>Hunters</td>
                @foreach($months as $m)
                    <td>{{$utility->calculateNumberOfHunterInTeam($t->id, $m) }}</td>
                @endforeach
            </tr>
            <tr>
                <td>Sales & Marketing</td>
                @foreach($months as $m)
                    <td>{{number_format($utility->calculatePositionRateTeam($t->id, $m)*$utility->countType(5, $m), 2, '.', ',') }}</td>
                @endforeach
            </tr>
            <tr>
                <td>QLKD & Acc</td>
                @foreach($months as $m)
                <td>{{number_format($utility->calculatePositionRateTeam($t->id, $m)*$utility->countType(1, $m), 2, '.', ',') }}</td>
                @endforeach
            </tr>
            <tr>
                <td>IT</td>
                @foreach($months as $m)
                <td>{{number_format($utility->calculatePositionRateTeam($t->id, $m)*$utility->countType(7, $m), 2, '.', ',') }}</td>
                @endforeach
            </tr>
            <tr>
                <td>Nấu ăn</td>
                @foreach($months as $m)
                <td>{{number_format($utility->calculatePositionRateTeam($t->id, $m)*$utility->countType(6, $m), 2, '.', ',') }}</td>
                @endforeach
            </tr>
            <tr>
                <td>CTV</td>
                @foreach($months as $m)
                <td>{{$utility->calculateNumberOfCTVInTeam($t->id, $m)}}</td>
                @endforeach
            </tr>
            <tr>
                <td colspan="2" style="vertical-align: middle; border-bottom: none;">Chi phí lao động (VND)</td>
                @foreach($months as $m)
                <td>{{number_format($utility->calculateChiphilaodong($t->id, $m), 2, '.', ',')}}</td>
                @endforeach
            </tr>
            <tr>
                <td rowspan="7" style="vertical-align: middle; border-top: none;"></td>
                <td>Cấp điều hành</td>
                @foreach($months as $m)
                <td>{{number_format($utility->calculatePositionRateTeam($t->id, $m)*$utility->calculateSalaryDepart($m, 2), 2, '.', ',') }}</td>
                @endforeach
            </tr>
            <tr>
                <td>Hunters</td>
                @foreach($months as $m)
                <td>{{number_format($utility->calculateSalariesOfHunterInTeam($t->id, $m), 2, '.', ',') }}</td>
                @endforeach
            </tr>
            <tr>
                <td>Sales & Marketing</td>
                @foreach($months as $m)
                <td>{{number_format($utility->calculatePositionRateTeam($t->id, $m)*$utility->calculateSalaryDepart($m, 5), 0, '.', ',') }}</td>
                @endforeach
            </tr>
            <tr>
                <td>QLKD & Acc</td>
                @foreach($months as $m)
                <td>{{number_format($utility->calculatePositionRateTeam($t->id, $m)*$utility->calculateSalaryDepart($m, 1), 2, '.', ',') }}</td>
                @endforeach
            </tr>
            <tr>
                <td>IT</td>
                @foreach($months as $m)
                <td>{{number_format($utility->calculatePositionRateTeam($t->id, $m)*$utility->calculateSalaryDepart($m, 7), 2, '.', ',') }}</td>
                @endforeach
            </tr>
            <tr>
                <td>Nấu ăn</td>
                @foreach($months as $m)
                <td>{{number_format($utility->calculatePositionRateTeam($t->id, $m)*$utility->calculateSalaryDepart($m, 6), 2, '.', ',') }}</td>
                @endforeach
            </tr>
            <tr>
                <td>CTV</td>
                @foreach($months as $m)
                <td>{{number_format($utility->calculateSalariesOfCTVInTeam($t->id, $m), 0, '.', ',')}}</td>
                @endforeach
                </tr>
        @endforeach

    </thead>
    <tbody>

    </tbody>
</table>
                            
                        </div>
                        

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
