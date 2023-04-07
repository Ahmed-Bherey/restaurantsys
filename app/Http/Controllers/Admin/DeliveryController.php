<?php

namespace App\Http\Controllers\Admin;

use App\Models\Delivery;
use Illuminate\Http\Request;
use App\Events\OrderNotifaction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DeliveryController extends Controller
{
    //
    public function create()
    {
        $deliveries = Delivery::get();
        return view('admin.pages.deliveries.create', compact('deliveries'));
    }

    public function store(Request $request)
    {
        Delivery::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'cost' => $request->cost,
            'tel' => $request->tel,
        ]);
        return redirect()->back()->with(['success' => "تم الحفظ بنجاح"]);
    }

    public function edit($id)
    {
        $delivery = Delivery::findOrFail($id);
        return view('admin.pages.deliveries.edit', compact('delivery'));
    }

    public function update(Request $request, $id)
    {
        $delivery = Delivery::findOrFail($id);
        $delivery->update([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'cost' => $request->cost,
            'tel' => $request->tel,
        ]);
        return redirect()->route('delivery.create')->with(['success' => "تم التحديث بنجاح"]);
    }

    public function destroy($id)
    {
        $delivery = Delivery::findOrFail($id);
        $delivery->delete();
        return redirect()->back()->with(['success' => "تم الحذف بنجاح"]);
    }
}

