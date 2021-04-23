<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Newsletter;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function subscribeNewsletter(Request $request) {
        $validateData = $request->validate([
            'email' => 'required|unique:newsletters|max:255|email',
        ]);

        $newsletter = new Newsletter();
        $newsletter->email = $request->email;
        $newsletter->save();

        $notification=array(
            'messege'=>'Thank you for subscribing',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }
}
