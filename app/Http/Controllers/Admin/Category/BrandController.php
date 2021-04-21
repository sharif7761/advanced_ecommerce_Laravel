<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function brands() {
        $brands = Brand::all();
        return view('admin.brand.brands', compact('brands'));
    }

    public function storeBrand (Request $request) {
        $validateData = $request->validate([
            'brand_name' => 'required | unique:brands|max:255',
        ]);

        $brand = new Brand();
        $brand->brand_name = $request->brand_name;
        $logo = $request->file('brand_logo');
        if($logo) {
            $logo_name = date('dmy_H_s_i');
            $ext = strtolower($logo->getClientOriginalExtension());
            $logo_full_name = $logo_name.'.'.$ext;
            $upload_path = 'media/brand/';
            $logo_url = $upload_path.$logo_full_name;
            $success = $logo->move($upload_path, $logo_full_name);

            $brand->brand_logo = $logo_url;

        }

        $brand->save();

        $notification=array(
            'messege'=>'Brand Added successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }

    public function deleteBrand($id) {
        $brand = Brand::find($id);
        $logo = $brand->brand_logo;
        unlink($logo);
        $brand->delete();

        $notification=array(
            'messege'=>'Brand deleted successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);

    }

    public function editBrand($id) {
        $brand = Brand::find($id);
        return view('admin.brand.edit_brand', compact('brand'));
    }

    public function updateBrand(Request $request, $id) {
        $validateData = $request->validate([
            'brand_name' => 'required|unique:brands|max:255',
        ]);

        $brand = Brand::find($id);
        $brand->brand_name = $request->brand_name;
        $logo = $request->file('brand_logo');
        //dd($request->all());
        if($logo) {
            $current_logo = $brand->brand_logo;
            unlink($current_logo);

            $logo_name = date('dmy_H_s_i');
            $ext = strtolower($logo->getClientOriginalExtension());
            $logo_full_name = $logo_name.'.'.$ext;
            $upload_path = 'media/brand/';
            $logo_url = $upload_path.$logo_full_name;
            $success = $logo->move($upload_path, $logo_full_name);

            $brand->brand_logo = $logo_url;

        }

        $brand->save();

        $notification=array(
            'messege'=>'Brand updated successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }
}
