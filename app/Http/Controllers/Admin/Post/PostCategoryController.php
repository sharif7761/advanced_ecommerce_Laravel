<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;


class PostCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
}
