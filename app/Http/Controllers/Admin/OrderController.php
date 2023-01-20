<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrderHidden;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //
    public function store(Request $request)
    {
        OrderHidden::where('client_id', auth()->guard('client')->user()->id)->delete();

        $user_id = 0;
        if(isset(auth()->guard('web')->user()->id)){
            $user_id = Auth::user()->id;
        }
        foreach ($request->data['name'] as $key => $value)
            Order::create([
                'user_id' => $user_id,
                'client_id' => auth()->guard('client')->user()->id,
                'orderHidden_id' => $request->data['orderHidden_id'][$key],
                'table_id' => $request->table_id,
                'delivery_id' => $request->delivery_id,
                'receive_way' => $request->receive_way,
                'receive_time' => $request->receive_time,
                'tel' => $request->tel,
                'address' => $request->address,
                'img' => $request->data['img'][$key],
                'name' => $value,
                'price' => $request->data['price'][$key],
                'quantity' => $request->data['quantity'][$key],
                'notes' => $request->notes,
            ]);
        return redirect()->route('web.index')->with(['success' => 'تم الارسال بنجاح']);
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update([
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->back()->with(['success' => 'تم التأكيد بنجاح']);
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->back()->with(['success' => "تم الرفض بنجاح"]);
    }
}
