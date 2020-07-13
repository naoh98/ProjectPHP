<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    public function index() {

        $product = DB::table('product')
            ->join('category', 'product.product_type', '=', 'category.category_id')
            ->select('product.*','category.category_id','category.category_name')
            ->paginate(10);

        return view("backend.contents.products.index",['product'=>$product]);
    }

    //code xóa
    public function delete($product_id){
        DB::table('product')->where('product_id',$product_id)->delete();
        return redirect('/admin/product')->with('success', 'Xóa sản phẩm thành công');
    }

    //hiển thị trang edit
    public function editpage($product_id){
        //trả về toàn bộ csdl để đệ quy option category theo dạng object - dùng " product-> "
        $category = DB::table('category')->get();
        //trả về toàn bộ csdl để đệ quy option category theo dạng array (mảng) - dùng " product[''] "
        //$category = CategoryProductModel::all();

        //trả về 1 bản ghi cần chỉnh sửa
        $product = DB::table('product')->where('product_id',$product_id)->first();

        return view("backend.contents.products.edit",['category'=>$category,'product'=>$product]);
    }

    //code edit
    public function edit(Request $request,$product_id){

        $validate_pro =[
            'product_title' => 'required',
            'product_desc' => 'required',
            'product_main_image' => 'required',
            'product_images' => 'required',
            'product_manufacturer' => 'required',
            'product_quantity' => 'required|numeric',
            'product_type' => 'required|numeric',
            'product_price_core' => 'required|numeric',
            'product_tax' => 'required|numeric'
        ];
        $error_messages = [
            'required' => ':attribute không được để trống',
            'numeric' => ':attribute phải là số'
        ];
        $this->validate($request,$validate_pro,$error_messages);
        $arr=[];
        if ($request->hasFile('product_main_image')) {
            $file_name1 = $request->product_main_image->getClientOriginalName();
            $path1 = $request->product_main_image->storeAs('public/files', $file_name1);
            $arr['product_main_image'] = $path1;
        }
        if ($request->hasFile('product_images')) {
            foreach ($request->file('product_images') as $mul_file){
                $file_name2 = $mul_file->getClientOriginalName();
                $path2 = $mul_file->storeAs('public/files',$file_name2);
                $data2[] = $path2;
                $arr['product_images'] = json_encode($data2);
            }
        }
        $arr['product_title'] = $request->product_title;
        $arr['product_desc'] = $request->product_desc;
        $arr['product_manufacturer'] = $request->product_manufacturer;
        $arr['product_quantity'] = $request->product_quantity;
        $arr['product_price_core'] = $request->product_price_core;
        $arr['product_tax'] = $request->product_tax;
        $arr['product_price_sell'] = $request->product_price_core + ($request->product_price_core*$request->product_tax)/100;
        $arr['product_type'] = $request->product_type;
        DB::table('product')->where('product_id', $product_id)->update($arr);

        return redirect('/admin/product')->with('success','Sửa sản phẩm thành công');
    }

    //hiển thị trang thêm thể loại
    public function createpage(){
        //trả về toàn bộ csdl để đệ quy option category theo dạng object - dùng " product-> "
        $category = DB::table('category')->get();
        return view("backend.contents.products.create",['category'=>$category]);
    }

    //code thêm san pham
    public function create(Request $request){
        $validate_pro =[
            'product_title' => 'required|unique:product,product_title',
            'product_desc' => 'required',
            'product_main_image' => 'required',
            'product_images' => 'required',
            'product_manufacturer' => 'required',
            'product_quantity' => 'required|numeric',
            'product_type' => 'required|numeric',
            'product_price_core' => 'required|numeric',
            'product_tax' => 'required|numeric'
        ];
        $error_messages = [
            'required' => ':attribute không được để trống',
            'numeric' => ':attribute phải là số',
            'unique' => ':attribute đã tồn tại'
        ];
        $this->validate($request,$validate_pro,$error_messages);
        $arr=[];
        if ($request->hasFile('product_main_image')) {
            $file_name1 = $request->product_main_image->getClientOriginalName();
            $path1 = $request->product_main_image->storeAs('public/files', $file_name1);
            $arr['product_main_image'] = $path1;
        }
        if ($request->hasFile('product_images')) {
            foreach ($request->file('product_images') as $mul_file){
                $file_name2 = $mul_file->getClientOriginalName();
                $path2 = $mul_file->storeAs('public/files',$file_name2);
                $data2[] = $path2;
                $arr['product_images'] = json_encode($data2);
            }
        }
        $arr['product_title'] = $request->product_title;
        $arr['product_desc'] = $request->product_desc;
        $arr['product_manufacturer'] = $request->product_manufacturer;
        $arr['product_quantity'] = $request->product_quantity;
        $arr['product_price_core'] = $request->product_price_core;
        $arr['product_tax'] = $request->product_tax;
        $arr['product_price_sell'] = $request->product_price_core + ($request->product_price_core*$request->product_tax)/100;
        $arr['product_type'] = $request->product_type;
        DB::table('product')->insert($arr);

        return redirect('/admin/product')->with('success','Thêm sản phẩm thành công');
    }

}
