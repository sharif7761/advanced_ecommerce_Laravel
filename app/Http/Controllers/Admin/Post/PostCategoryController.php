<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\PostCategory;
use Illuminate\Http\Request;


class PostCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function postCategory() {
        $postCategories = PostCategory::all();
        return view('admin.post.categories', compact('postCategories'));
    }

    public function storePostCategory(Request $request){
        $validateData = $request->validate([
            'category_name_en' => 'required | unique:post_categories|max:255',
            'category_name_bn' => 'required | unique:post_categories|max:255',
        ]);

        $post_category = new PostCategory();
        $post_category->category_name_en = $request->category_name_en;
        $post_category->category_name_bn = $request->category_name_bn;
        $post_category->save();
        $notification=array(
            'messege'=>'Post Category Added successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);

    }

    public function edit(Request $request, $id){
        $post_category = PostCategory::find($id);
        return view('admin.post.edit_category', compact('post_category'));
    }

    public function update(Request $request, $id) {
        $validateData = $request->validate([
            'category_name_en' => 'required | max:255',
            'category_name_bn' => 'required | max:255',
        ]);

        $post_category = PostCategory::find($id);
        $post_category->category_name_en = $request->category_name_en;
        $post_category->category_name_bn = $request->category_name_bn;
        $post_category->save();
        $notification=array(
            'messege'=>'Post Category Updated successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }

    public function delete( $id){
        PostCategory::find($id)->delete();
        $notification=array(
            'messege'=>'Post Category deleted successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }
}
