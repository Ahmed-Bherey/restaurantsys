<?php

namespace App\Http\Controllers\Admin;

use App\Models\Treasury;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TreasuryController extends Controller
{
    //
    public function create()
    {
        $treasuries = Treasury::get();
        return view('admin.pages.treasuries.create', compact('treasuries'));
    }

    public function store(Request $request)
    {
        Treasury::create([
            'user_id' => Auth::user()->id,
            'date' => $request->date,
            'name' => $request->name,
            'treasury_secretary' => $request->treasury_secretary,
            'balance' => $request->balance,
        ]);
        return redirect()->back()->with(['success' => 'تم الحفظ بنجاح']);
    }

    public function edit($id)
    {
        $treasury = Treasury::findOrFail($id);
        return view('admin.pages.treasuries.edit', compact('treasury'));
    }

    public function update(Request $request,$id)
    {
        $treasury = Treasury::findOrFail($id);
        $treasury->update([
            'user_id' => Auth::user()->id,
            'date' => $request->date,
            'name' => $request->name,
            'treasury_secretary' => $request->treasury_secretary,
            'balance' => $request->balance,
        ]);
        return redirect()->route('treasury.create')->with(['success' => 'تم التحديث بنجاح']);
    }

    public function destroy($id)
    {
        $treasury = Treasury::findOrFail($id);
        $treasury->delete();
        return redirect()->back()->with(['success' => 'تم الحذف بنجاح']);
    }
}
