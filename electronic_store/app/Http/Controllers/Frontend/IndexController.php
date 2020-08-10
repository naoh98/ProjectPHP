<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{



    //lấy ra các danh mục con Cuối Cùng của danh mục cha
    public function lowest_cat(&$arr,$category_id){
        $data = DB::table('category')->where('parent_id',$category_id)->get();
        if ($data->isNotEmpty()){
            foreach ($data as $value){
                $id = $value->category_id;
                $this->lowest_cat($arr,$id);
            }
        }else{
            $arr[]=$category_id;
        }
    }


    public function index(){
        $arr=[];
        $category = DB::table('category')->get();
        foreach ($category as $value){
            $this->lowest_cat($arr,$value->category_id);
        }
        $categories = DB::table('category')->whereIn('category_id',$arr)->get();

        $products = DB::table('product')
            ->join('category','product.product_type','=','category.category_id')
            ->select('product.*','category.category_id','category.category_name')
            ->get();

        $lastest_products = DB::table('product')
        ->orderBy('product_id','desc')
        ->take(4)
        ->get();

        $manufacturer = DB::table('manufacturer')->get();

        return view('frontend.contents.homepage',['min_cat'=>$categories,'product'=>$products,'lastest_product'=>$lastest_products,'manufacturer'=>$manufacturer]);

    }


}
