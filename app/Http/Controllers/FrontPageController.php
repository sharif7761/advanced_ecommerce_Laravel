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
        $mid_slider = Product::where('mid_slider', true)->latest()->take(3)->get();
        $featured = Product::where('status', true)->latest()->take(8)->get();
        $trend = Product::where([['status', true],['trend', true]])->latest()->take(8)->get();
        $best_rated = Product::where([['status', true],['best_rated', true]])->latest()->take(8)->get();
        $hot_deal = Product::where([['status', true],['hot_deal', true]])->latest()->take(3)->get();
        $popular_cate = Category::latest()->take(8)->get();
        return view('pages.index',  compact('categories', 'banner', 'featured', 'trend', 'best_rated', 'hot_deal', 'popular_cate', 'mid_slider'));
    }
}
