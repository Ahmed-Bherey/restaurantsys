<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    //
    public function create()
    {
        $categories = Category::get();
        return view('admin.pages.items.create', compact('categories'));
    }
}
