<?php

namespace App\Http\Controllers\Admin;

use App\Models\Area;
use App\Models\Table;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TableController extends Controller
{
    //
    public function create()
    {
        $areas = Area::get();
        $tables = Table::get();
        return view('admin.pages.tables.create', compact('tables','areas'));
    }

    public function store(Request $request)
    {
        Table::create([
            'user_id' => Auth::user()->id,
            'area_id' => $request->area_id,
            'name' => $request->name,
            'customer_num' => $request->customer_num,
        ]);
        return redirect()->back()->with(['success' => "تم الحفظ بنجاح"]);
    }

    public function edit($id)
    {
        $areas = Area::get();
        $table = Table::findOrFail($id);
        return view('admin.pages.tables.edit', compact('table','areas'));
    }

    public function update(Request $request, $id)
    {
        $table = Table::findOrFail($id);
        $table->update([
            'user_id' => Auth::user()->id,
            'area_id' => $request->area_id,
            'name' => $request->name,
            'customer_num' => $request->customer_num,
        ]);
        return redirect()->route('table.create')->with(['success' => "تم التحديث بنجاح"]);
    }

    public function destroy($id)
    {
        $table = Table::findOrFail($id);
        $table->delete();
        return redirect()->back()->with(['success' => "تم الحذف بنجاح"]);
    }
}
