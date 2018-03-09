<?php

namespace App\Http\Controllers\Mgt;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Team;
use App\User;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $team = Team::where('name', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $team = Team::paginate($perPage);
        }

        return view('mgt.team.index', compact('team'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $members = User::get()->pluck('name', 'id');
        return view('mgt.team.create', compact('members'));
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
        
        $requestData = $request->except('members');
        $memberIds = $request->get('members');
        $team = Team::create($requestData);
        foreach ($memberIds as $mid)
        {
            $m = User::find($mid);
            $m->team()->associate($team);
            $m->save();
        }

        return redirect('mgt/team')->with('flash_message', 'Team added!');
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
        $team = Team::findOrFail($id);

        return view('mgt.team.show', compact('team'));
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
        $team = Team::findOrFail($id);
        $members = User::get()->pluck('name', 'id');

        return view('mgt.team.edit', compact('team', 'members'));
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
        
        $requestData = $request->except('members');
        $memberIds = $request->get('members');
        
        $team = Team::findOrFail($id);
        $team->update($requestData);
        foreach ($team->users()->get() as $user) {
            $user->team()->dissociate();
            $user->save();
        } 
                
        if($memberIds){
            foreach ($memberIds as $mid) {
            $m = User::find($mid);
            $m->team()->associate($team);
            $m->save();
        }
        }
        return redirect('mgt/team')->with('flash_message', 'Team updated!');
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
        $revenues = Team::find($id)->revenues()->get();
        foreach ($revenues as $revenue) {
            $revenue->delete();
        }
        Team::destroy($id);

        return redirect('mgt/team')->with('flash_message', 'Team deleted!');
    }
}
