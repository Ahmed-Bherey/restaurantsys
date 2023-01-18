<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Table;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $cartItems = \Cart::getContent();
        $categories = Category::get();
        $tables = Table::get();
        if (auth()->guard('client')->check()) {
            $orders = Order::where('client_id', auth()->guard('client')->user()->id)->get();
        }
        if (auth()->guard('client')->check())
            return view('web.pages.index', compact('categories', 'cartItems', 'tables', 'orders'));
        else
            return view('web.pages.index', compact('categories', 'cartItems', 'tables'));
    }
}
