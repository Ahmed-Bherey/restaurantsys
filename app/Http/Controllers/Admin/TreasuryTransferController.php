<?php

namespace App\Http\Controllers\Admin;

use App\Models\Treasury;
use Illuminate\Http\Request;
use App\Models\TreasuryTransfer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TreasuryTransferController extends Controller
{
    //
    public function create()
    {
        $treasuriesFrom = Treasury::get();
        $treasuriesTo = Treasury::get();
        $treasuriesTransfer = TreasuryTransfer::get();
        return view('admin.pages.treasuryTransfer.create', compact('treasuriesFrom','treasuriesTo', 'treasuriesTransfer'));
    }

    public function store(Request $request)
    {
        TreasuryTransfer::create([
            'user_id' => Auth::user()->id,
            'date' => $request->date,
            'treasuryFrom_id' => $request->treasuryFrom_id,
            'treasuryTo_id' => $request->treasuryTo_id,
            'amount' => $request->amount,
        ]);
        $treasuryFromBalance = Treasury::where('id', $request->treasuryFrom_id)->value('balance');
        Treasury::where('id', $request->treasuryFrom_id)->update([
            'balance'=>$treasuryFromBalance - $request->amount,
        ]);
        $treasuryToBalance = Treasury::where('id', $request->treasuryTo_id)->value('balance');
        Treasury::where('id', $request->treasuryTo_id)->update([
            'balance'=>$treasuryToBalance + $request->amount,
        ]);
        return redirect()->back()->with(['success' => 'تم الحفظ بنجاح']);
    }

    public function edit($id)
    {
        $treasury = Treasury::get();
        $treasuryTransfer = TreasuryTransfer::findOrFail($id);
        return view('admin.pages.treasuryTransfer.edit', compact('treasury', 'treasuryTransfer'));
    }

    public function update(Request $request, $id)
    {
        $treasuryTransfer = TreasuryTransfer::findOrFail($id);
        $treasuryTransfer->update([
            'user_id' => Auth::user()->id,
            'date' => $request->date,
            'treasuryFrom_id' => $request->treasuryFrom_id,
            'treasuryTo_id' => $request->treasuryTo_id,
            'amount' => $request->amount,
        ]);
        return redirect()->route('treasuryTransfer.create')->with(['success' => 'تم التحديث بنجاح']);
    }

    public function destroy($id)
    {
        $treasuryTransfer = TreasuryTransfer::findOrFail($id);
        $treasuryTransfer->delete();
        return redirect()->back()->with(['success' => 'تم الحذف بنجاح']);
    }
}
