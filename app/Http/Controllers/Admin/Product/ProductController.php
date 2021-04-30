<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Admin\Subcategory;
use Faker\Provider\Image;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index() {
        return 'index';
    }

    public function create() {

        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.create', compact('categories', 'brands'));
    }

    public function getSubcat($category_id) {
        $cat = Subcategory::where('category_id', $category_id)->get();
        return json_encode($cat);

    }

    public function store(Request $request) {
        $validateData = $request->validate([

        ]);

        $product = new Product();
        $product->product_name = $request->product_name;
        $product->product_code = $request->product_code;
        $product->quantity = $request->quantity;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->brand_id = $request->brand_id;
        $product->size = $request->size;
        $product->color = $request->color;
        $product->details = $request->details;
        $product->selling_price = $request->selling_price;
        $product->discount_price = $request->discount_price;
        $product->video_link = $request->video_link;
        $product->main_slider = $request->main_slider;
        $product->mid_slider = $request->mid_slider;
        $product->hot_deal = $request->hot_deal;
        $product->best_rated = $request->best_rated;
        $product->hot_new = $request->hot_new;
        $product->trend = $request->trend;
        $product->status = 1;

        $image_one = $request->file('image_one');
        $image_two = $request->file('image_two');
        $image_three = $request->file('image_three');

        // return response()->json($product);
        if($image_one && $image_two && $image_three) {
            $image_one_name = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(300, 300)->save('public/media/product', $image_one_name);
            $product->image_one = 'public/media/product/'.$image_one_name;


            $image_two_name = hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
            Image::make($image_two)->resize(300, 300)->save('public/media/product', $image_two_name);
            $product->image_two = 'public/media/product/'.$image_two_name;

            $image_three_name = hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
            Image::make($image_three)->resize(300, 300)->save('public/media/product', $image_three_name);
            $product->image_three = 'public/media/product/'.$image_three_name;
        }

        $product->save();

        $notification=array(
            'messege'=>'Product Added successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);

    }
}
