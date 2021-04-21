<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function categories() {
        $categories = Category::all();
        return view('admin.category.categories', compact('categories'));
}

    public function storeCategory(Request $request) {
        $validateData = $request->validate([
           'category_name' => 'required | unique:categories|max:255'
        ]);

//        $data = array();
//        $data['category_name'] = $request->category_name;
//        $data['created_at'] = \Carbon\Carbon::now();
//        $data['updated_at'] = \Carbon\Carbon::now();
//        DB::table('categories')->insert($data);



        $category = new Category();
        $category->category_name = $request->category_name;
        $category->save();

        $notification=array(
            'messege'=>'Category added successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('admin.categories')->with($notification);

    }

    public function deleteCategory($id) {
        $category = Category::find($id);
        $category->delete();

        $notification=array(
            'messege'=>'Category deleted successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);

    }

    public function editCategory($id) {
        $category = Category::find($id);
        return view('admin.category.edit_category', compact('category'));
    }

    public function updateCategory($id, Request $request) {
        $validateData = $request->validate([
            'category_name' => 'required | unique:categories|max:255'
        ]);
        $category = Category::find($id);
        $category->category_name = $request->category_name;
        $category->save();

        $notification=array(
            'messege'=>'Category updated successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('admin.categories')->with($notification);
    }
}
