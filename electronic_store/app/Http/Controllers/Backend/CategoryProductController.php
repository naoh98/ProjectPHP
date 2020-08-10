<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CategoryProductModel;
use Illuminate\Validation\Rule;

class CategoryProductController extends Controller
{
    //hiển thị trang quản lý thể loại
    public function index() {
        $category = DB::table('category')->get();
        /*echo "<pre>";
        print_r($category);
        echo "</pre>";*/
        return view('backend.contents.productcategories.index',['category'=>$category]);
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
            'category_name' => 'required|unique:category,category_name',
            'category_image' => 'required'
        ];
        $error_messages = [
            'required' => ':attribute không được để trống',
            'unique' => ':attribute đã tồn tại'
        ];
        $this->validate($request,$validate_cat,$error_messages);

        //tạo biến lấy ra mảng các sản phẩm trong danh mục
        $products = DB::table('product')->where('product_type',$request->parent_id)->get();
        if ($products->isNotEmpty()){
            return redirect('/admin/product_category/create')
                ->with('error','Danh mục đã chọn vẫn còn sản phẩm.<br>Vui lòng xóa sản phẩm hoặc sửa lại danh mục của sản phẩm trong mục Sản Phẩm trước khi thêm danh mục.');
        }else{
            $cr_arr=[];
            if ($request->hasFile('category_image')) {
                $file_name = $request->category_image->getClientOriginalName();
                $path = $request->category_image->storeAs('public/files', $file_name);
                $cr_arr['category_image'] = $path;
            }
            $cr_arr['category_name'] = $request->category_name;
            $cr_arr['parent_id'] = $request->parent_id;
            DB::table('category')->insert($cr_arr);
        }

        return redirect('/admin/product_category')->with('success','Thêm danh mục thành công');
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
            'category_name' => ["required",Rule::unique('category')->ignore($category_id,'category_id')]
        ];
        $error_messages = [
            'required' => ':attribute không được để trống',
            'unique' => ':attribute đã tồn tại'
        ];
        $this->validate($request,$validate_cat,$error_messages);

        //khai báo mảng mới để truyền vào function cat()
        $arr=[];
        $test = $this->cat($arr,$category_id);
        //dump($arr);die;
        //tạo biến lấy ra mảng các sản phẩm trong danh mục
        $products = DB::table('product')->where('product_type',$request->parent_id)->get();
        if (in_array($request->parent_id,$arr)){
            return redirect('/admin/product_category/edit/'.$category_id)->with('error','Danh mục cha không thể làm con của danh mục con trong chính nó !');
        }
        elseif ($products->isNotEmpty()){
            return redirect('/admin/product_category/edit/'.$category_id)
                ->with('error','Danh mục đã chọn vẫn còn sản phẩm.<br>Vui lòng xóa sản phẩm hoặc sửa lại danh mục của sản phẩm trong mục Sản Phẩm trước khi sửa danh mục.');
        }
        else{
            $ed_arr=[];
            if ($request->hasFile('category_image')) {
                $file_name1 = $request->category_image->getClientOriginalName();
                $path1 = $request->category_image->storeAs('public/files', $file_name1);
                $ed_arr['category_image'] = $path1;
            }
            $ed_arr['category_name'] = $request->category_name;
            $ed_arr['parent_id'] = $request->parent_id;
            DB::table('category')->where('category_id', $category_id)->update($ed_arr);
        }

        return redirect('/admin/product_category')->with('success','Sửa danh mục thành công');
    }

    //code xóa
    public function delete($category_id){
        $array = [];
        $this->cat($array,$category_id);
        if (!empty($array)){
            return redirect('/admin/product_category')->with('error', 'Danh mục này hiện vẫn còn danh mục con. Chưa thể xóa');
        }else{
            $products = DB::table('product')->where('product_type',$category_id)->get();
            if($products->isNotEmpty()){
                return redirect('/admin/product_category')->with('error', 'Danh mục này hiện vẫn còn sản phẩm. Chưa thể xóa');
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

        return redirect('/admin/product_category')->with('success', 'Xóa danh mục thành công');

        //Xóa phần tử cha thì phần tử con sẽ lên làm phần tử cha
        /*$data = DB::table('category')->where('category_id',$category_id)->first();
        $arr = ['parent_id'=>$data->parent_id];
        DB::table('category')->where('parent_id',$category_id)->update($arr);
        DB::table('category')->where('category_id',$category_id)->delete();*/
    }
}
