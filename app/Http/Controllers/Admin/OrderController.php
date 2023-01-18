<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    //
    public function store(Request $request)
    {
        Order::create([
            'client_id' => auth()->guard('client')->user()->id,
            'item_id' => $request->item_id,
            'img' => $request->img,
            'name' => $request->name,
            'price' => $request->price,
            'desc' => $request->desc,
            'quantity' => $request->quantity,
        ]);
        return redirect()->back()->with(['success'=>'']);
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->back()->with(['success' => "تم الحذف بنجاح"]);
    }
}
