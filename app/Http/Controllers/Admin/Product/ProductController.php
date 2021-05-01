<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Admin\Subcategory;
use Illuminate\Http\Request;
use Image;


class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index() {
        $products = Product::all();
        return view('admin.product.products', compact('products'));
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
        $product->product_quantity = $request->product_quantity;
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

        $image_one = $request->image_one;
        $image_two = $request->image_two;
        $image_three = $request->image_three;

//        if($image_one && $image_two && $image_three) {
//
//            $image_one_name = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
//
//            Image::make($image_one)->resize(300, 300)->save('public/media/products/'.$image_one_name);
//            $product->image_one = 'public/media/products/'.$image_one_name;
//
//
//            $image_two_name = hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
//            Image::make($image_two)->resize(300, 300)->save('public/media/products/'.$image_two_name, 80);
//            $product->image_two = 'public/media/products/'.$image_two_name;
//
//            $image_three_name = hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
//            Image::make($image_three)->resize(300, 300)->save('public/media/products/'.$image_three_name, 80);
//            $product->image_three = 'public/media/products/'.$image_three_name;
//        }

        $product->save();

        $notification=array(
            'messege'=>'Product Added successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);

    }

    public function active($id){
        $product = Product::find($id);
        $product->status = 1;
        $product->save();
        $notification=array(
            'messege'=>'Product activated successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }

    public function inactive($id){
        $product = Product::find($id);
        $product->status = 0;
        $product->save();
        $notification=array(
            'messege'=>'Product inactivated successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }

    public function delete($id) {
        $product = Product::find($id);
        $image_one = $product->image_one;
        $image_two = $product->image_two;
        $image_three = $product->image_three;
//        unlink($image_one);
//        unlink($image_two);
//        unlink($image_three);
        $product->delete();
        $notification=array(
            'messege'=>'Product deleted successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }

    public function show($id) {
        $product = Product::find($id);
        return view('admin.product.show', compact('product'));
    }
}
