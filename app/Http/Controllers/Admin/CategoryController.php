<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    //
    public function store(Request $request)
    {
        Category::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
        ]);
        return redirect()->back()->with(['success' => "تم الحفظ بنجاح"]);
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.pages.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
        ]);
        return redirect()->route('items.show')->with(['success' => "تم التحديث بنجاح"]);
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        Item::where('category_id',$id)->delete();
        return redirect()->back()->with(['success' => "تم الحذف بنجاح"]);
    }
}
