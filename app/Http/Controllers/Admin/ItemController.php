<?php

namespace App\Http\Controllers\Admin;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    //
    public function show()
    {
        $categories = Category::get();
        return view('admin.pages.items.show', compact('categories'));
    }

    public function create()
    {
        $categories = Category::get();
        $items = Item::get();
        return view('admin.pages.items.create', compact('categories', 'items'));
    }

    public function store(Request $request)
    {
        $img = null;
        if (isset($request->img)) {
            $img = $request->img->store('public/items');
        }

        $active = 0;
        if ($request->active == 1) {
            $active = 1;
        }
        Item::create([
            'user_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'date' => $request->date,
            'img' => $img,
            'name' => $request->name,
            'desc' => $request->desc,
            'price' => $request->price,
            'active' => $active,
        ]);
        return redirect()->route('items.show')->with(['success' => "تم الحفظ بنجاح"]);
    }

    public function edit($id)
    {
        $categories = Category::get();
        $item = Item::findOrFail($id);
        return view('admin.pages.items.edit', compact('categories', 'item'));
    }

    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        $img = $item->img;
        if (isset($request->img)) {
            $img = $request->img->store('public/items');
        }

        $active = 0;
        if ($request->active == 1) {
            $active = 1;
        }
        $item->update([
            'user_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'date' => $request->date,
            'img' => $img,
            'name' => $request->name,
            'desc' => $request->desc,
            'price' => $request->price,
            'active' => $active,
        ]);
        return redirect()->route('items.show')->with(['success' => "تم التحديث بنجاح"]);
    }

    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
        return redirect()->back()->with(['success' => "تم الحذف بنجاح"]);
    }
}
