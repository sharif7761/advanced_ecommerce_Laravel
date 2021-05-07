<?php

namespace App\Http\Controllers;

use App\Models\Admin\Category;
use Illuminate\Http\Request;

class FrontPageController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('pages.index',  compact('categories'));
    }
}
