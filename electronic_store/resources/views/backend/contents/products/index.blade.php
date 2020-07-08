@extends("backend.layouts.main")
@section("title","Quản lý sản phẩm")
@section("content")

    <div class="container-fluid">
        <div>
            <a href="{{url("/admin/product/create")}}" class="btn btn-success">Thêm Sách</a>
        </div>
        <div>
            <input type="text" class="searchcat form-control">
        </div>
        @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif
        <br>
        <table class="table qlproduct">
            <thead class=" thead-dark">
            <tr>
                <th>Sách</th>
                <th>Giới Thiệu</th>
                <th>Tác Giả</th>
                <th>Thể Loại</th>
                <th>Giá</th>
                <th>Thuế</th>
                <th>Thành Tiền</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                <?php
                foreach($product as $products){ ?>
                   <tr>
                       <td>{{$products->book_title}}</td>
                       <td>{{$products->book_desc}}</td>
                       <td>{{$products->book_author}}</td>
                       <td class="catname">
                            {{$products->category_name}}
                       </td>
                       <td>{{$products->book_price_core}}</td>
                       <td>{{$products->book_tax}}</td>
                       <td>{{$products->book_price_sell}}</td>
                       <td>
                           <a href="{{url("/admin/product/edit/$products->book_id")}}" class="btn btn-warning">Sửa</a>
                           <a href="{{url("/admin/product/delete/$products->book_id")}}" class="btn btn-danger">Xóa</a>
                       </td>
                   </tr>
            <?php }
                ?>
            </tbody>
        </table>
        <div class="row pages">
            {{ $product->links() }}
        </div>
    </div>

@endsection