<?php

namespace App\Http\Controllers\Web;

use App\Models\Order;
use App\Models\Table;
use App\Models\Category;
use App\Models\Delivery;
use App\Models\OrderHidden;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //
    public function index()
    {
        $cartItems = \Cart::getContent();
        $categories = Category::get();
        $tables = Table::get();
        if (auth()->guard('client')->check()) {
            $orderHiddens = OrderHidden::where('client_id', auth()->guard('client')->user()->id)->get();
        }
        if (auth()->guard('client')->check())
            return view('web.pages.index', compact('categories', 'cartItems', 'tables', 'orderHiddens'));
        else
            return view('web.pages.index', compact('categories', 'cartItems', 'tables'));
    }

    public function order()
    {
        $cartItems = \Cart::getContent();
        $tables = Table::get();
        $orderHiddens = OrderHidden::where('client_id',auth()->guard('client')->user()->id)->get();
        $deliveries = Delivery::get();
        return view('web.pages.orders', compact('cartItems', 'tables','orderHiddens','deliveries'));
    }
}
