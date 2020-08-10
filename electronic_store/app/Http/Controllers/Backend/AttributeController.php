<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class AttributeController extends Controller
{
    //
    public function index(){
        $att = DB::table('attributes')->get();
        return view('backend.contents.attributes.index',['att'=>$att]);
    }
    public function createpage(){
        return view('backend.contents.attributes.create');
    }
    public function editpage($attribute_id){
        $att = DB::table('attributes')->where('attribute_id',$attribute_id)->first();
        return view('backend.contents.attributes.edit',['att'=>$att]);
    }
    //
    public function create(Request $request){
        $validate_att = [
            "attribute_name" => "required",
        ];
        $error_message = [
            'required' => ':attribute không được để trống',
        ];
        $this->validate($request,$validate_att,$error_message);

        $arr['attribute_name'] = $request->attribute_name;

        DB::table('attributes')->insert($arr);
        return redirect('/admin/attribute')->with('success','Thêm thuộc tính thành công');
    }
    //
    public function edit(Request $request, $attribute_id){
        $validate_att = [
            "attribute_name" => ["required",Rule::unique('attributes')->ignore($attribute_id,'attribute_id')],
        ];
        $error_message = [
            "required" => ":attribute không được để trống",
            'unique' => ':attribute đã tồn tại'
        ];
        $this->validate($request,$validate_att,$error_message);

        $arr['attribute_name'] = $request->attribute_name;

        DB::table("attributes")->where("attribute_id",$attribute_id)->update($arr);
        return redirect('/admin/attribute')->with('success','Sửa thuộc tính thành công');
    }
    //
    public function delete($attribute_id){
        DB::table('attributes')->where('attribute_id',$attribute_id)->delete();
        DB::table('product_attributes')->where('attribute_id',$attribute_id)->delete();
        return redirect('/admin/attribute')->with('success','Xóa thuộc tính thành công');
    }
}
