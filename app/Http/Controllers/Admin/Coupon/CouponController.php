<?php

namespace App\Http\Controllers\Admin\Coupon;

use App\Http\Controllers\Controller;
use App\Models\Admin\Coupon;
use Illuminate\Http\Request;


class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function coupons() {
        $coupons = Coupon::all();
        return view('admin.coupon.coupons', compact('coupons'));
    }

    public function storeCoupon(Request $request) {
        $validateData = $request->validate([
            'coupon' => 'required|unique:coupons|max:255',
            'discount' => 'required'
        ]);

        $coupon = new Coupon();
        $coupon->coupon = $request->coupon;
        $coupon->discount = $request->discount;
        $coupon->save();

        $notification=array(
            'messege'=>'Coupon Added successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }

    public function deleteCoupon($id) {
        $coupon = Coupon::find($id);
        $coupon->delete();
        $notification=array(
            'messege'=>'Coupon deleted successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }

    public function editCoupon($id) {
        $coupon = Coupon::find($id);
        return view('admin.coupon.edit_coupon', compact('coupon'));
    }

    public function updateCoupon(Request $request, $id){
        $validateData = $request->validate([
            'coupon' => 'required|unique:coupons|max:255',
            'discount' => 'required'
        ]);

        $coupon = Coupon::find($id);
        $coupon->coupon = $request->coupon;
        $coupon->discount = $request->discount;
        $coupon->save();

        $notification=array(
            'messege'=>'Coupon Updated successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('admin.coupons')->with($notification);
    }
}
