<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $categories = Category::get();
        $cartItems = \Cart::getContent();
        return view('web.pages.index', compact('categories','cartItems'));
    }
}