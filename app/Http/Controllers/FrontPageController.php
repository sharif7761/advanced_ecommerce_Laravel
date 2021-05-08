<?php

namespace App\Http\Controllers;

use App\Models\Admin\Category;
use App\Models\Admin\Product;
use Illuminate\Http\Request;

class FrontPageController extends Controller
{
    public function index(){
        $categories = Category::all();
        $banner = Product::where('main_slider', true)->latest()->first();
        return view('pages.index',  compact('categories', 'banner'));
    }
}
