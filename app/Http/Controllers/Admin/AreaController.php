<?php

namespace App\Http\Controllers\Admin;

use App\Models\Area;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AreaController extends Controller
{
    //
    public function create()
    {
        $areas = Area::get();
        return view('admin.pages.areas.create', compact('areas'));
    }

    public function store(Request $request)
    {
        Area::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'notes' => $request->notes,
        ]);
        return redirect()->back()->with(['success' => "تم الحفظ بنجاح"]);
    }

    public function edit($id)
    {
        $area = Area::findOrFail($id);
        return view('admin.pages.areas.edit', compact('area'));
    }

    public function update(Request $request, $id)
    {
        $area = Area::findOrFail($id);
        $area->update([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'notes' => $request->notes,
        ]);
        return redirect()->route('area.create')->with(['success' => "تم التحديث بنجاح"]);
    }

    public function destroy($id)
    {
        $area = Area::findOrFail($id);
        $area->delete();
        return redirect()->back()->with(['success' => "تم الحذف بنجاح"]);
    }
}
