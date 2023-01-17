<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
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
        return view('web.pages.index', compact('categories','cartItems','tables'));
    }
}
