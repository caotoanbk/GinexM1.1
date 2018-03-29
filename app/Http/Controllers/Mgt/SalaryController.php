<?php

namespace App\Http\Controllers\Mgt;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Salary;
use App\User;
use App\Team;
use Illuminate\Http\Request;

class SalaryController extends Controller
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 15;

        if (!empty($keyword)) {
            $salary = Salary::where('user_id', 'LIKE', "%$keyword%")
                ->orWhere('ammount', 'LIKE', "%$keyword%")
                ->orWhere('monthYear', 'LIKE', "%$keyword%")
                ->orderBy('monthYear', 'DESC')
                ->paginate($perPage);
        } else {
            $salary = Salary::orderBy('monthYear', 'DESC')->paginate($perPage);
        }
        return view('mgt.salary.index', compact('salary'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $monthYear = $this->monthYear;
        // $users = User::get()->pluck('name', 'id');
        return view('mgt.salary.create', compact('monthYear'));
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
        
        Salary::create($requestData);

        return redirect('mgt/salary')->with('flash_message', 'Salary added!');
    }
    public function storeSalaries(Request $request)
    {
        $userIds = User::where('active', true)->get()->pluck('id');
        foreach ($userIds as $userId) {
            if(Salary::where('user_id', $userId)
                ->where('monthYear', $request->get('monthYear'))
                ->get()
                ->toArray())
                return redirect('mgt/salary')->with('flash_message', 'Salary of this person on this month already exist!');
            $team = User::find($userId)->team()->first();
            $team_id = null;
            if($team){
                $team_id = $team->id;
            }
            Salary::create(['user_id' => $userId, 'monthYear' => $request->get('monthYear'), 'user_type' => User::find($userId)->type, 'amount' => 4000, 'user_name' => User::find($userId)->name, 'team_id' => $team_id]);
        }
        return redirect('mgt/salary')->with('flash_message', 'Salary Table created!');
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
        $salary = Salary::findOrFail($id);

        return view('mgt.salary.show', compact('salary'));
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
        $salary = Salary::findOrFail($id);
        $teams = Team::get()->pluck('name', 'id');

        return view('mgt.salary.edit', compact('salary', 'teams'));
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
        
        $salary = Salary::findOrFail($id);
        $salary->update($requestData);

        return redirect('mgt/salary')->with('flash_message', 'Salary updated!');
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
        Salary::destroy($id);

        return redirect('mgt/salary')->with('flash_message', 'Salary deleted!');
    }
}
