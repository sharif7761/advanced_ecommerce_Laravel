<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;


class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
}
