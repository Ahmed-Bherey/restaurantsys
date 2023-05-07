<?php

namespace App\Http\Controllers\Admin;

use App\Models\OrderTotal;
use Illuminate\Http\Request;
use Spatie\FlareClient\View;
use App\Http\Controllers\Controller;
use App\Models\Order;

class DashboardController extends Controller
{
    //
    public function dashboard()
    {
        $orderTotal =Order::WhereHas('order_totals',function($x){
            $x->where('finished',0)
            ->where('received',0)
            ->where('prepared',0);
        })
        ->sum('price');
        return View('admin.pages.dashboard');
    }
}
