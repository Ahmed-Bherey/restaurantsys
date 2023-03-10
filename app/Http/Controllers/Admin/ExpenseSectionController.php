<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ExpenseSection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ExpenseSectionController extends Controller
{
    //
    public function create()
    {
        $expenseSections = ExpenseSection::get();
        $code = $expenseSections->count() + 1;
        return view('admin.pages.expenseSections.create', compact('expenseSections','code'));
    }

    public function store(Request $request)
    {
        ExpenseSection::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'code' => $request->code,
        ]);
        return redirect()->back()->with(['success' => "تم الحفظ بنجاح"]);
    }

    public function edit($id)
    {
        $expenseSection = ExpenseSection::findOrFail($id);
        return view('admin.pages.expenseSections.edit', compact('expenseSection'));
    }

    public function update(Request $request, $id)
    {
        $expenseSection = ExpenseSection::findOrFail($id);
        $expenseSection->update([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'code' => $request->code,
        ]);
        return redirect()->route('expenseSection.create')->with(['success' => "تم التحديث بنجاح"]);
    }

    public function destroy($id)
    {
        $expenseSection = ExpenseSection::findOrFail($id);
        $expenseSection->delete();
        return redirect()->back()->with(['success' => "تم الحذف بنجاح"]);
    }
}
