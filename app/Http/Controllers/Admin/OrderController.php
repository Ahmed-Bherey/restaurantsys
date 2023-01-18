<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //
    public function store(Request $request)
    {
        Order::create([
            'user_id' => Auth::user()->id,
            'client_id' => auth()->guard('client')->user()->id,
            'orderHidden_id' => $request->orderHidden_id,
            'table_id' => $request->table_id,
            'delivery_id' => $request->delivery_id,
            'receive_way' => $request->receive_way,
            'receive_time' => $request->receive_time,
            'tel' => $request->tel,
            'address' => $request->address,
            'notes' => $request->notes,
        ]);
        return redirect()->back()->with(['success'=>'تم الارسال بنجاح']);
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update([
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->back()->with(['success'=>'تم التأكيد بنجاح']);
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->back()->with(['success' => "تم الرفض بنجاح"]);
    }
}
