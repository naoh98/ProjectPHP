@extends("backend.layouts.main")
@section("title","Thêm sản phẩm")
@section("content")
    <div class="container-fluid">
        <div class="row">
            <h1>Thêm Sản Phẩm</h1>
            <div class="col-md-12">
                <a href="{{url('/admin/product')}}" class="btn btn-info">Quay về</a>
            </div>
            <div class="col-md-12">
                <form name="up_pro" action="{{url("/admin/product/create")}}"  method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Tên Sản Phẩm</label>
                        <input type="text" value="" name="product_title" class="form-control">
                    </div>
                    @error('product_title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label>Ảnh Bìa</label>
                        <input type="file" value="" name="product_main_image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Album Ảnh</label>
                        <div class="group_imgs">
                            <input type="file" id="clone_images" value="" name="product_images[]" class="form-control">
                        </div>
                        <div class="text-center">
                            <button class="btn btn-success add_images" type="button">Thêm</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Giới Thiệu</label>
                        <input type="text" value="" name="product_desc" class="form-control">
                    </div>
                    @error('product_desc')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label>Hãng Sản Xuất</label>
                        <input type="text" value="" name="product_manufacturer" class="form-control">
                    </div>
                    @error('product_manufacturer')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label>Số Lượng</label>
                        <input type="text" value="" name="product_quantity" class="form-control">
                    </div>
                    @error('product_quantity')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label>Giá Nhập</label>
                        <input type="text" value="" name="product_price_core" class="form-control">
                    </div>
                    @error('product_price_core')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label>Thuế</label>
                        <input type="text" value="" name="product_tax" class="form-control">
                    </div>
                    @error('product_tax')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label>Thể Loại</label>
                        <div>
                            <select name="product_type">
                                <?php viewcreate($category); ?>
                            </select>
                        </div>
                    </div>
                    @if(session('status'))
                        <div class="alert alert-danger">
                            {{session('status')}}
                        </div>
                    @endif
                    <button type="submit" class="btn btn-danger">Thêm</button>
                </form>
            </div>
        </div>
    </div>




    <?php
    function viewcreate(&$categories,$parent_id=0,$char=""){
    foreach ($categories as $key => $manage){
    if ($manage->parent_id==$parent_id){
    ?>
    <option value="{{$manage->category_id}}"><?php echo $char.$manage->category_name.' ['.$manage->category_id.']'; ?></option>
    <?php
    unset($categories[$key]);
    viewcreate($categories,$manage->category_id,$manage->category_name.' ['.$manage->category_id.']'.' > ');
    }
    }
    }
    ?>
@endsection