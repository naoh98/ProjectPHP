<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //
    public function index($category_id){
        $cat = DB::table('product')->where('product_type',$category_id)->get();
        return view('frontend.contents.product',['product'=>$cat]);
    }
}
