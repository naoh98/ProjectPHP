@extends("backend.layouts.main")
@section("title","Sửa Sản Phẩm")
@section("content")
    <div class="container-fluid">
        <div class="row">
            <h1>Sửa Sản Phẩm</h1>
            <div class="col-md-12">
                <a href="{{url('/admin/product')}}" class="btn btn-info">Quay về</a>
            </div>
            <br><br>
            <div class="col-md-12">
                <form name="up_pro" action="{{url("/admin/product/edit/$product->product_id")}}"  method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>ID: </label>
                        <span>{{$product->product_id}}</span>
                    </div>
                    <div class="form-group">
                        <label>Tên Sản Phẩm</label>
                        <input type="text" value="{{$product->product_title}}" name="product_title" class="form-control">
                    </div>
                    @error('product_title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label style="display: block;">Ảnh Đại Diện</label>
                        <label class="custom_img">
                            <input type="file" value="{{$product->product_main_image}}" name="product_main_image">
                            <span><i class="fa fa-upload"></i>&nbsp;&nbsp;Chọn file</span>
                        </label>
                    </div>
                    <div class="text-center">
                        <?php if($product->product_main_image){ ?>
                            <img src="{{asset('storage/files/' .basename($product->product_main_image))}}" alt="" width="500px" height="350px">
                        <?php } ?>
                    </div>
                    @error('product_main_image')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <div class="form-group">
                            <label style="display: block;">Album Ảnh
                                <span style="margin-left: 10px;">
                                    <button class="btn btn-success add_images" type="button"  style="border-radius: 50%;">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </span>
                            </label>
                            <div class="group_imgs">
                                <label class="custom_img" id="clone_images">
                                    <input type="file" value="{{$product->product_images}}" name="product_images[]">
                                    <span><i class="fa fa-upload"></i>&nbsp;&nbsp;Chọn file</span>
                                </label>
                            </div>
                            <div>
                            </div>
                        </div>
                        <div class="text-center">
                            <?php
                            $data = json_decode($product->product_images);


                            if(is_array($data)){
                            foreach($data as $image){ ?>
                            <img src="{{asset('storage/files/' .basename($image))}}" alt="" width="500px" height="350px">
                            <?php }
                            } ?>
                        </div>
                    </div>
                    @error('product_images')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label>Giới Thiệu</label>
                        <input type="text" value="{{$product->product_desc}}" name="product_desc" class="form-control">
                    </div>
                    @error('product_desc')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label>Hãng Sản Xuất</label>
                        <div>
                            <select name="product_manufacturer">
                                <?php
                                foreach ($fact as $partner){ ?>
                                    <option value="{{$partner->manufacturer_id}}" {{($product->product_manufacturer == $partner->manufacturer_id) ? "selected" : ""}}>
                                    {{$partner->manufacturer_name}}
                                    </option>
                              <?php  }
                                ?>
                            </select>
                        </div>
                    </div>
                    @error('product_manufacturer')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label>Số Lượng</label>
                        <input type="text" value="{{$product->product_quantity}}" name="product_quantity" class="form-control">
                    </div>
                    @error('product_quantity')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label>Giá Nhập</label>
                        <input type="text" value="{{$product->product_price_core}}" name="product_price_core" class="form-control">
                    </div>
                    @error('product_price_core')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label>Thuế</label>
                        <input type="text" value="{{$product->product_tax}}" name="product_tax" class="form-control">
                    </div>
                    @error('product_tax')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label>Danh Mục</label>
                        <div>
                            <select name="product_type">
                                <option value="-1" {{($product->product_type == -1) ? "selected" : ""}}>Không xác định</option>
                                <?php
                                foreach ($category as $value){ ?>
                                <option value="{{$value->category_id}}" {{($value->category_id == $product->product_type) ? "selected" : ""}}>
                                    <?php  echo $value->category_name  ?>
                                </option>
                                <?php     }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Thuộc Tính
                            <span style="margin-left: 10px;">
                                    <button class="btn btn-success add_product_att" type="button"  style="border-radius: 50%;">
                                        <i class="fa fa-plus"></i>
                                    </button>
                            </span>
                        </label>
                        <table class="att_tbl">
                            <tr id="product_att_clone" style="display: none;">
                                <td>
                                    <select>

                                        <?php
                                        foreach ($att_all as $att){ ?>
                                            <option value="{{$att->attribute_id}}">{{$att->attribute_name}}</option>
                                 <?php  }
                                        ?>
                                    </select>
                                </td>
                                <td><input type="text" value="" class="form-control"></td>
                                <td></td>
                                <td></td>
                            </tr>
                        <?php
                        foreach ($product_att as $key=> $item){  ?>
                                <tr>
                                    <td><label>{{$item->attribute_name}}</label></td>
                                    <td><input type="text" value="{{$item->value}}" name="edit_value[]" class="form-control"></td>
                                    <td><a class="att_action"><i class="fa fa-window-close"></i></a></td>
                                    <td><input type="hidden" value="{{$item->id}}" name="id[]" class="form-control"></td>
                                </tr>
                 <?php   }
                        ?>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-danger">Sửa</button>
                </form>
            </div>
        </div>
    </div>

@endsection
