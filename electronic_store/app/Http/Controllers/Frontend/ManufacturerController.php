<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManufacturerController extends Controller
{
    //
    public function index($manufacturer_id){
        $manu = DB::table('product')->where('product_manufacturer',$manufacturer_id)->get();
        return view('frontend.contents.product',['product'=>$manu]);
    }
}
