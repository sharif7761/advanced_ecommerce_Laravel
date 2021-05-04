<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\PostCategory;


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
}
