@extends("backend.layouts.main")
@section("title","Xóa sản phẩm")
@section("content")
    <div class="container-fluid">
        <div class="row">
            <h1>Xóa Sách</h1>
            <div class="col-md-12">
                <a href="{{url('/admin/product')}}" class="btn btn-info">Quay về</a>
            </div>
            <div class="col-md-12">
                <form name="products" action="{{url("/admin/product/delete/$product->book_id")}}"  method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>ID: </label><span> {{$product->book_id}}</span> <br>
                        <label>Tên Sách: </label><span> {{$product->book_title}}</span><br>
                        <label>Thể Loại: </label>
                        <span>
                        <?php
                                if($catdetail){
                                    if($catdetail->category_id == $product->book_type){
                                        echo $catdetail->category_name;
                                    }
                                }
                         ?>
                        </span><br>
                        <label>Tác Giả: </label><span> {{$product->book_author}}</span><br>
                    </div>
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </div>
        </div>
    </div>

@endsection