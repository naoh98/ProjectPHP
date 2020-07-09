@extends("backend.layouts.main")
@section("title","Xóa Sản Phẩm")
@section("content")
    <div class="container-fluid">
        <div class="row">
            <h1>Xóa Sản Phẩm</h1>
            <div class="col-md-12">
                <a href="{{url('/admin/product')}}" class="btn btn-info">Quay về</a>
            </div>
            <div class="col-md-12">
                <form name="products" action="{{url("/admin/product/delete/$product->product_id")}}"  method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Tên Sản Phẩm: </label><span> {{$product->product_title}}</span><br>
                        <label>Thể Loại: </label>
                        <span>
                        <?php
                                if($catdetail){
                                    if($catdetail->category_id == $product->product_type){
                                        echo $catdetail->category_name;
                                    }
                                }
                         ?>
                        </span><br>
                        <label>Hãng Sản Xuất: </label><span> {{$product->product_manufacturer}}</span><br>
                    </div>
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </div>
        </div>
    </div>

@endsection