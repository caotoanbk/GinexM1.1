<?php

namespace App\Http\Controllers\Mgt;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ImpositionRateController extends Controller
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
    public function index(Request $request)
    {
    	$monthYear = $this->monthYear;
    	$isRequest = $request->get('monthYear')?true:false;
    	/*$revenues = null;
    	if($request->get('monthYear')){
    		$revenues = \App\Revenue::where('monthYear', $request->get('monthYear'))->get()->toArray();
    	}*/
    	$teams = \App\Team::all();
    	return view('mgt.imposition-rate.index', compact('monthYear', 'teams', 'isRequest'));
    }
}
