<?php

namespace App\Http\Controllers\Mgt;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Utility;
use App\Team;

class FundermantalIndexController extends Controller
{
	private   $monthYear = [
            '2018-01' => '01/2018',
            '2018-02' => '02/2018',
            '2018-03' => '03/2018',
            '2018-04' => '04/2018',
            '2018-05' => '05/2018',
            '2018-06' => '06/2018',
            '2018-07' => '07/2018',
            '2018-08' => '08/2018',
            '2018-09' => '09/2018',
            '2018-10' => '10/2018',
            '2018-11' => '11/2018',
            '2018-11' => '11/2018',
            '2018-12' => '12/2018',
        ];
    public function index()
    {
    	$month = $this->monthYear;
    	return view('mgt.fundermantal-index.form', compact('month'));
    }
    public function show(Request $request)
    {
        $months = explode(",", $request->get('monthYear'));
        asort($months);
        $utility = new Utility();
        $teams = Team::all();
    	return view('mgt.fundermantal-index.data', compact('utility', 'teams', 'months'));
    }
}
