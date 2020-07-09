<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CategoryProductModel;

class CategoryProductController extends Controller
{
    //hiển thị trang quản lý thể loại
    public function index() {
        $category = CategoryProductModel::all();
        /*echo "<pre>";
        print_r($category);
        echo "</pre>";*/
        $data = [];
        $data["category"] = $category;
        return view('backend.contents.productcategories.index',$data);
    }

    //hiển thị trang thêm thể loại
    public function createpage(){
        $category = CategoryProductModel::all();
        $data = [];
        $data["category"] = $category;
        return view("backend.contents.productcategories.create",$data);
    }

    //code thêm thể loại
    public function create(Request $request){
        $validate_cat =[
            'category_name' => 'required',
            'parent_id' => 'required'

        ];
        $error_messages = [
            'required' => ':attribute không được để trống'
        ];
        $this->validate($request,$validate_cat,$error_messages);

        if ($request->hasFile('category_image')) {
            $file_name = $request->category_image->getClientOriginalName();
            $path = $request->category_image->storeAs('public/files', $file_name);
            $arr = [
                'category_name' => $request->category_name,
                'category_image' => $path,
                'parent_id' => $request->parent_id
            ];
            DB::table('category')->insert($arr);
        }
        else{
            $arr = [
                'category_name' => $request->category_name,
                'category_image' => "",
                'parent_id' => $request->parent_id
            ];
            DB::table('category')->insert($arr);
        }

        return redirect('/admin/product_category')->with('status','Thêm danh mục thành công');
    }


    //hiển thị trang edit
    public function editpage($category_id){
        //trả về toàn bộ csdl để đệ quy option
        $category_all = CategoryProductModel::all();
        $data_all = [];
        $data_all["category_all"] = $category_all;

        //trả về 1 bản ghi cần chỉnh sửa

        $category_1 = DB::table('category')->where('category_id',$category_id)->first();
        $data_1 = [];
        $data_1["category_1"] = $category_1;

        return view("backend.contents.productcategories.edit",$data_all,$data_1);
    }

    //lấy ra toàn bộ phần tử con của phần tử đang chọn
    public function cat(&$arr,$category_id){
        $data = DB::table('category')->where('parent_id',$category_id)->get();
        foreach ($data as $key=> $value){
            $id =  $value->category_id;
            $arr[]= $id;
            unset($data[$key]);
            $this->cat($arr,$id);
        }
    }

    //code edit
    public function edit(Request $request,$category_id){

        $validate_cat =[
            'category_name' => 'required',
            'parent_id' => 'required'

        ];
        $error_messages = [
            'required' => ':attribute không được để trống'
        ];
        $this->validate($request,$validate_cat,$error_messages);

        //khai báo mảng mới để truyền vào function cat()
        $arr=[];
        $test = $this->cat($arr,$category_id);
        //dump($test);die;
        if (in_array($request->parent_id,$arr)){
            return redirect('/admin/product_category/edit/'.$category_id)->with('status','Danh mục cha không thể làm con của danh mục con trong chính nó !');
        }
        else{
            if ($request->hasFile('category_image')) {
                $file_name1 = $request->category_image->getClientOriginalName();
                $path1 = $request->category_image->storeAs('public/files', $file_name1);
                $arr = [
                    'category_name' => $request->category_name,
                    'category_image' => $path1,
                    'parent_id' => $request->parent_id
                ];
                DB::table('category')->where('category_id', $category_id)->update($arr);
            }
            else{
                $arr = [
                    'category_name' => $request->category_name,
                    'parent_id' => $request->parent_id
                ];
                DB::table('category')->where('category_id', $category_id)->update($arr);
            }
        }

        return redirect('/admin/product_category')->with('status','Sửa danh mục thành công');
    }

    //hiển thị xóa
    public function delpage($category_id){

        $category1 = DB::table('category')->where('category_id',$category_id)->first();
        $data = [];
        $data["category"] = $category1;
        return view("backend.contents.productcategories.delete",$data);
    }

    //code xóa
    public function delete($category_id){
        $array = [];
        $this->cat($array,$category_id);
        if (!empty($array)){
            return redirect('/admin/product_category/delete/'.$category_id)->with('status', 'Danh mục này hiện vẫn còn danh mục con. Chưa thể xóa');
        }else{
            $products = DB::table('product')->where('product_type',$category_id)->get();
            if($products->isNotEmpty()){
                return redirect('/admin/product_category/delete/'.$category_id)->with('status', 'Danh mục này hiện vẫn còn sản phẩm. Chưa thể xóa');
            }else{
                DB::table('category')->where('category_id',$category_id)->delete();
            }
        }
        //xóa danh mục cha thì xóa luôn cả danh mục con
        //$data = DB::table('category')->where('parent_id',$category_id)->get();
        //$data1=gettype($data);
        //dump($data);die;
        //foreach ($data as $value){
        //$id = $value->category_id;
        //$this->delete($id);
        //}

        return redirect('/admin/product_category')->with('status', 'Xóa danh mục thành công');

        //Xóa phần tử cha thì phần tử con sẽ lên làm phần tử cha
        /*$data = DB::table('category')->where('category_id',$category_id)->first();
        $arr = ['parent_id'=>$data->parent_id];
        DB::table('category')->where('parent_id',$category_id)->update($arr);
        DB::table('category')->where('category_id',$category_id)->delete();*/
    }
}
