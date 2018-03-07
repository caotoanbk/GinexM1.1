<?php

namespace App\Http\Controllers\Mgt;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Revenue;
use App\Team;
use Illuminate\Http\Request;

class RevenueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
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
        $keyword = $request->get('search');
        $month = $request->get('month');
        $perPage = 25;

        if (!empty($keyword)) {
            $revenue = Revenue::where('team_id', 'LIKE', "%$keyword%")
                ->where('monthYear', 'LIKE', "%$month")
                ->orWhere('amount', 'LIKE', "%$keyword%")
                ->orWhere('monthYear', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $revenue = Revenue::where('monthYear', 'LIKE', "%$month")
                            ->paginate($perPage);
        }

        return view('mgt.revenue.index', compact('revenue'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $teams = Team::get()->pluck('name', 'id');
        $monthYear = $this->monthYear;
        return view('mgt.revenue.create', compact('teams', 'monthYear'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Revenue::create($requestData);

        return redirect('mgt/revenue')->with('flash_message', 'Revenue added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $revenue = Revenue::findOrFail($id);

        return view('mgt.revenue.show', compact('revenue'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $revenue = Revenue::findOrFail($id);
        $teams = Team::get()->pluck('name', 'id');
        $monthYear = $this->monthYear;

        return view('mgt.revenue.edit', compact('revenue', 'teams', 'monthYear'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $revenue = Revenue::findOrFail($id);
        $revenue->update($requestData);

        return redirect('mgt/revenue')->with('flash_message', 'Revenue updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Revenue::destroy($id);

        return redirect('mgt/revenue')->with('flash_message', 'Revenue deleted!');
    }
}
