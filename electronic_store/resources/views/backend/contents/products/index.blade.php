@extends("backend.layouts.main")
@section("title","Quản lý Sản Phẩm")
@section("content")
    <div class="cf_del_pro">
        <p>Sản phẩm này sẽ bị xóa khỏi hệ thống</p>
    </div>
    <div class="container-fluid">
        <div>
            <a href="{{url("/admin/product/create")}}" class="btn btn-success">Thêm Sản Phẩm</a>
        </div>
        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
        <br>
        <table class="table qlproduct">
            <thead class=" thead-dark">
            <tr>
                <th>Sản Phẩm</th>
                <th>Giới Thiệu</th>
                <th>Hãng Sản Xuất</th>
                <th>Số Lượng</th>
                <th>Danh Mục</th>
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
                       <td>{{$products->manufacturer_name}}</td>
                       <td>{{$products->product_quantity}}</td>
                       <td class="catname">
                           <?php
                           if ($products->category_name){ ?>
                                {{$products->category_name}}
                   <?php   }else{ ?>
                                <p style="color: red;"><?php echo 'Không xác định'; ?></p>
                   <?php   } ?>
                       </td>
                       <td>{{$products->product_price_core}}</td>
                       <td>{{$products->product_tax}}</td>
                       <td>{{$products->product_price_sell}}</td>
                       <td>
                           <a href="{{url("/admin/product/edit/$products->product_id")}}" class="btn btn-warning" style="width: 43px;">
                               <i class="fas fa-edit"></i>
                           </a>
                           <form class="del_pro" action="{{url("/admin/product/delete/$products->product_id")}}" method="post" style="display: inline;">
                               @method('delete')
                               @csrf
                               <button class="btn btn-danger" style="width: 43px" type="submit">
                                   <i class="fa fa-trash"></i>
                               </button>
                           </form>
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