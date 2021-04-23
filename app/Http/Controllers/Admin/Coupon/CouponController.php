<?php

namespace App\Http\Controllers\Admin\Coupon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
}
