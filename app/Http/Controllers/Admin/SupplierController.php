<?php

namespace App\Http\Controllers\Admin;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    //
    public function create()
    {
        $suppliers = Supplier::get();
        $code = $suppliers->count() + 1;
        return view('admin.pages.suppliers.create', compact('suppliers','code'));
    }

    public function store(Request $request)
    {
        Supplier::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'code' => $request->code,
        ]);
        return redirect()->back()->with(['success' => "تم الحفظ بنجاح"]);
    }

    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('admin.pages.suppliers.edit', compact('supplier'));
    }

    public function update(Request $request, $id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->update([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'code' => $request->code,
        ]);
        return redirect()->route('supplier.create')->with(['success' => "تم التحديث بنجاح"]);
    }

    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        return redirect()->back()->with(['success' => "تم الحذف بنجاح"]);
    }
}