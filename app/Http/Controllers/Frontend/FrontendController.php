<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Newsletter;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function storeNewsletter(Request $request) {
        $validateData = $request->validate([
            'email' => 'required|unique:newsletters|max:255|email',
        ]);

        $newsletter = new Newsletter();
        $newsletter->email = $request->email;
        $newsletter->save();

        $notification=array(
            'messege'=>'Newsletter Added successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }

    public function deleteNewsletter($email) {
        $newsletter = Newsletter::find($email);
        return $newsletter;
        $coupon->delete();
        $notification=array(
            'messege'=>'Coupon deleted successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }
}
