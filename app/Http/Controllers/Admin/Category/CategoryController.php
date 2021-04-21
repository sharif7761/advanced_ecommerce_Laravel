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
        //$category = Category::all();
        return view('admin.category.categories');
}

    public function storeCategory(Request $request) {
        $validateData = $request->validate([
           'category_name' => 'required | unique:categories|max:255'
        ]);

//        $data = array();
//        $data['category_name'] = $request->category_name;
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
}
