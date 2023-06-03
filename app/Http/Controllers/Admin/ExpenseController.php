<?php

namespace App\Http\Controllers\Admin;

use App\Models\Expense;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\ExpenseSection;
use App\Http\Controllers\Controller;
use App\Models\Treasury;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    //
    public function create()
    {
        $expenseSections = ExpenseSection::get();
        $suppliers = Supplier::get();
        $expenses = Expense::get();
        return view('admin.pages.expenses.create', compact('expenses', 'expenseSections', 'suppliers'));
    }

    public function store(Request $request)
    {
        Expense::create([
            'user_id' => Auth::user()->id,
            'supplier_id' => $request->supplier_id,
            'expenseSection_id' => $request->expenseSection_id,
            'date' => $request->date,
            'amount' => $request->amount,
            'notes' => $request->notes,
        ]);
        $treasuryBalance = Treasury::where('active', 1)->value('balance');
        Treasury::where('active', 1)->update([
            'balance' => $treasuryBalance - $request->amount,
        ]);
        return redirect()->back()->with(['success' => "تم الحفظ بنجاح"]);
    }

    public function edit($id)
    {
        $expenseSections = ExpenseSection::get();
        $suppliers = Supplier::get();
        $expense = Expense::findOrFail($id);
        return view('admin.pages.expenses.edit', compact('expense', 'expenseSections', 'suppliers'));
    }

    public function update(Request $request, $id)
    {
        $expense = Expense::findOrFail($id);
        $expenseAmount = Expense::where('id', $expense->id)
            ->where('supplier_id', $request->supplier_id)
            ->where('expenseSection_id', $request->expenseSection_id)
            ->value('amount');
        $data = $expenseAmount - $request->amount;
        $treasuryBalance = Treasury::where('active', 1)->value('balance');
        Treasury::where('active', 1)->update([
            'balance' => $treasuryBalance + $data,
        ]);
        $expense->update([
            'user_id' => Auth::user()->id,
            'supplier_id' => $request->supplier_id,
            'expenseSection_id' => $request->expenseSection_id,
            'date' => $request->date,
            'amount' => $request->amount,
            'notes' => $request->notes,
        ]);

        return redirect()->route('expense.create')->with(['success' => "تم التحديث بنجاح"]);
    }

    public function destroy($id)
    {
        $expense = Expense::findOrFail($id);
        $expense->delete();
        return redirect()->back()->with(['success' => "تم الحذف بنجاح"]);
    }
}
