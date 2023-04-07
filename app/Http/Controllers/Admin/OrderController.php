<?php

namespace App\Http\Controllers\Admin;

use App\Events\OrderNotifaction;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Delivery;
use App\Models\OrderHidden;
use App\Models\OrderTotal;
use App\Models\Table;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //

    public function show()
    {
        $orderTotals = OrderTotal::latest()->get();
        return view('admin.pages.orders.show', compact('orderTotals'));
    }

    public function store(Request $request)
    {
        OrderHidden::where('client_id', auth()->guard('client')->user()->id)->delete();

        $orderTotal = OrderTotal::create([
            'user_id' => 0,
            'client_id' => auth()->guard('client')->user()->id,
            'orderHidden_id' => $request->orderHidden_id,
            'table_id' => $request->table_id,
            'delivery_id' => $request->delivery_id,
            'receive_way' => $request->receive_way,
            'receive_time' => $request->receive_time,
            'tel' => $request->tel,
            'address' => $request->address,
            'notes' => $request->notes,
            'prepared' => 0,
            'received' => 0,
            'finished' => 0,
        ]);

        foreach ($request->data['name'] as $key => $value)
            Order::create([
                'orderTotal_id' => $orderTotal->id,
                'img' => $request->data['img'][$key],
                'name' => $value,
                'price' => $request->data['price'][$key],
                'quantity' => $request->data['quantity'][$key],
            ]);

        return redirect()->route('web.index')->with(['success' => 'تم الارسال بنجاح']);
    }

    public function show_detailes($id)
    {
        $orderTotalCount = OrderTotal::count() + 1;
        $orderTotal = OrderTotal::findOrFail($id);
        $tables = Table::get();
        $deliveries = Delivery::get();
        $orders = Order::where('orderTotal_id',$id)->get();
        return view('admin.pages.orders.show_detailes', compact('orderTotal','orders','tables','deliveries','orderTotalCount'));
    }

    public function update(Request $request, $id)
    {
        $orderTotal = OrderTotal::findOrFail($id);
        $prepared = 0;
        if($request->prepared == 1){
            $prepared = 1;
        }
        $received = 0;
        if($request->received == 1){
            $received = 1;
        }
        $finished = 0;
        if($request->finished == 1){
            $finished = 1;
        }
        $orderTotal->update([
            'user_id' => Auth::user()->id,
            'prepared' => $prepared,
            'received' => $received,
            'finished' => $finished,
        ]);
        return redirect()->route('order.show')->with(['success' => 'تم التأكيد بنجاح']);
    }

    public function destroy($id)
    {
        Order::where('orderTotal_id',$id)->delete();
        OrderTotal::findOrFail($id)->delete();
        return redirect()->back()->with(['success' => "تم الرفض بنجاح"]);
    }
}
