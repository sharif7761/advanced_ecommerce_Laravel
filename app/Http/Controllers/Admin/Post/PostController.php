<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Admin\Post;
use App\Models\Admin\PostCategory;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function create() {
        $categories = PostCategory::all();
        return view('admin.post.add_post', compact('categories'));
    }

    public function store(Request $request) {
        $validateData = $request->validate([
            'category_id' => 'required',
            'post_title_en' => 'required',
            'post_title_bn' => 'required',
            'details_en' => 'required',
            'details_bn' => 'required',
            'post_image' => 'required',
        ]);

        $post = new Post();
        $post->category_id = $request->category_id ;
        $post->post_title_en = $request->post_title_en ;
        $post->post_title_bn = $request->post_title_bn ;
        $post->details_en = $request->details_en ;
        $post->details_bn = $request->details_bn ;

        $post_image = $request->file('post_image');

        if($post_image){
            $relPath = 'media/post/';
            if (!file_exists(public_path($relPath))) {
                mkdir(public_path($relPath), 777, true);
            }
            $image_name = hexdec(uniqid()).'.'.$post_image->getClientOriginalExtension();
            Image::make($post_image)->resize(400, 200)->save('media/post/'.$image_name);
            $post->post_image = 'media/post/'.$image_name;
        }
        $post->save() ;
        $notification=array(
            'messege'=>'Post Added Successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }

    public function index(){
        $posts = Post::all();
        return view('admin.post.posts', compact('posts'));
    }

    public function delete($id){
        $post = Post::find($id);
        unlink($post->post_image);
        $post->delete();

        $notification=array(
            'messege'=>'Post deleted Successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }

    public function edit($id){
        $post = Post::find($id);
        $categories = PostCategory::all();
        return view('admin.post.edit_post', compact('post', 'categories'));
    }

    public function update(Request $request, $id) {
        $validateData = $request->validate([
            'category_id' => 'required',
            'post_title_en' => 'required',
            'post_title_bn' => 'required',
            'details_en' => 'required',
            'details_bn' => 'required',
        ]);

        $post = Post::find($id);
        $post->category_id = $request->category_id ;
        $post->post_title_en = $request->post_title_en ;
        $post->post_title_bn = $request->post_title_bn ;
        $post->details_en = $request->details_en ;
        $post->details_bn = $request->details_bn ;

        $post_image = $request->file('post_image');

        if($post_image){
            $relPath = 'media/post/';
            if (!file_exists(public_path($relPath))) {
                mkdir(public_path($relPath), 777, true);
            }
            $image_name = hexdec(uniqid()).'.'.$post_image->getClientOriginalExtension();
            Image::make($post_image)->resize(400, 200)->save('media/post/'.$image_name);
            $post->post_image = 'media/post/'.$image_name;
        }
        $post->save() ;
        $notification=array(
            'messege'=>'Post update Successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }
}
