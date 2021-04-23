<?php

namespace App\Http\Controllers\Admin\Newsletter;

use App\Http\Controllers\Controller;

use App\Models\Admin\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function newsletters() {
        $newsletters = Newsletter::all();
        return view('admin.newsletter.newsletters', compact('newsletters'));
    }

    public function deleteNewsletter($id) {
        $newsletter = Newsletter::find($id);
        $newsletter->delete();
        $notification=array(
            'messege'=>'Newsletter deleted successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }
}
