<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderHidden;
use Illuminate\Http\Request;

class OrderHiddenController extends Controller
{
    //
    public function store(Request $request)
    {
        OrderHidden::create([
            'client_id' => auth()->guard('client')->user()->id,
            'item_id' => $request->item_id,
            'img' => $request->img,
            'name' => $request->name,
            'price' => $request->price,
            'desc' => $request->desc,
            'quantity' => $request->quantity,
        ]);
        return redirect()->back()->with(['success' => '']);
    }

    public function destroy($id)
    {
        $orderHidden = OrderHidden::findOrFail($id);
        $orderHidden->delete();
        return redirect()->back()->with(['success' => "تم الحذف بنجاح"]);
    }
}
