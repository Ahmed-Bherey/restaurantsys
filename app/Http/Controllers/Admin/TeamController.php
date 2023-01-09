<?php

namespace App\Http\Controllers\Admin;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    //
    public function create()
    {
        $teams = Team::get();
        return view('admin.pages.teams.create', compact('teams'));
    }

    public function store(Request $request)
    {
        $img = null;
        if(isset($request->img)){
            $img = $request->img->store('public/teams');
        }
        Team::create([
            'user_id' => Auth::user()->id,
            'img' => $img,
            'name' => $request->name,
            'job' => $request->job,
            'email' => $request->email,
            'tel' => $request->tel,
        ]);
        return redirect()->back()->with(['success' => "تم الحفظ بنجاح"]);
    }

    public function edit($id)
    {
        $team = Team::findOrFail($id);
        return view('admin.pages.teams.edit', compact('team'));
    }

    public function update(Request $request, $id)
    {
        $team = Team::findOrFail($id);
        $img = $team->img;
        if(isset($request->img)){
            $img = $request->img->store('public/teams');
        }
        $team->update([
            'user_id' => Auth::user()->id,
            'img' => $img,
            'name' => $request->name,
            'job' => $request->job,
            'email' => $request->email,
            'tel' => $request->tel,
        ]);
        return redirect()->route('team.create')->with(['success' => "تم التحديث بنجاح"]);
    }

    public function destroy($id)
    {
        $team = Team::findOrFail($id);
        $team->delete();
        return redirect()->back()->with(['success' => "تم الحذف بنجاح"]);
    }
}
