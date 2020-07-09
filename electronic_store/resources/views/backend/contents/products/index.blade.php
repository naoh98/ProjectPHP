@extends("backend.layouts.main")
@section("title","Quản lý Sản Phẩm")
@section("content")

    <div class="container-fluid">
        <div>
            <a href="{{url("/admin/product/create")}}" class="btn btn-success">Thêm Sản Phẩm</a>
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
                <th>Hãng Sản Xuất</th>
                <th>Số Lượng</th>
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
                       <td>{{$products->product_title}}</td>
                       <td>{{$products->product_desc}}</td>
                       <td>{{$products->product_manufacturer}}</td>
                       <td>{{$products->product_quantity}}</td>
                       <td class="catname">
                            {{$products->category_name}}
                       </td>
                       <td>{{$products->product_price_core}}</td>
                       <td>{{$products->product_tax}}</td>
                       <td>{{$products->product_price_sell}}</td>
                       <td>
                           <a href="{{url("/admin/product/edit/$products->product_id")}}" class="btn btn-warning">Sửa</a>
                           <a href="{{url("/admin/product/delete/$products->product_id")}}" class="btn btn-danger">Xóa</a>
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