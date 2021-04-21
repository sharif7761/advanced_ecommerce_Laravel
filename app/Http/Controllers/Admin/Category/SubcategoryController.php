<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function subcategories() {
        $subcategories = Subcategory::all();
        $categories = Category::all();
        return view('admin.subcategory.subcategories', compact('subcategories', 'categories'));
    }

    public function storeSubcategory(Request $request) {
        $validateData = $request->validate([
            'subcategory_name' => 'required|unique:subcategories|max:255',
            'category_id' => 'required'
        ]);

        $subcategory = new Subcategory();
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->category_id = $request->category_id;
        $subcategory->save();

        $notification=array(
            'messege'=>'Subcategory Added successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }

    public function deleteSubcategory($id) {
        $subcategory = Subcategory::find($id);
        $subcategory->delete();
        $notification=array(
            'messege'=>'Subcategory deleted successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }


}
