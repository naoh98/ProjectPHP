@extends("backend.layouts.main")
@section("title","Sửa thể loại")
@section("content")
    <div class="container-fluid">
        <div class="row">
            <h1>Sửa Danh Mục</h1>
            <div class="col-md-12">
                <a href="{{url('/admin/product_category')}}" class="btn btn-info">Quay về</a>
            </div>
            <br><br>
            <div class="col-md-12">
                <form name="up_cat" action="{{url("/admin/product_category/edit/$category_1->category_id")}}"  method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>ID: </label>
                        <span>{{$category_1->category_id}}</span>
                    </div>
                    <div class="form-group">
                        <label>Tên Danh Mục</label>
                        <input type="text" value="{{$category_1->category_name}}" name="category_name" class="form-control">
                    </div>
                    @error('category_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label style="display: block;">Ảnh Đại Diện</label>
                        <label class="custom_img">
                            <input type="file" value="{{$category_1->category_image}}" name="category_image">
                            <span><i class="fa fa-upload"></i>&nbsp;&nbsp;Chọn file</span>
                        </label>
                    </div>
                    <div class="text-center">
                        <?php if($category_1->category_image){ ?>
                        <img src="{{asset('storage/files/' .basename($category_1->category_image))}}" alt="" width="500px" height="350px">
                        <?php } ?>
                    </div>
                    @error('category_image')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label>Danh Mục</label>
                        <div>
                            <select name="parent_id">
                                <option value="0">None</option>
                                <?php viewedit($category_all,$category_1); ?>
                            </select>
                        </div>
                    </div>
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {!! session('error') !!}
                        </div>
                    @endif
                    <button type="submit" class="btn btn-danger">Sửa</button>
                </form>
            </div>
        </div>
    </div>

    <?php
    function viewedit(&$categories,$category,$parent_id=0,$char=""){
    foreach ($categories as $key => $manage){
    if ($manage['parent_id']==$parent_id){

    ?>
    <option value="{{$manage->category_id}}" {{($manage->category_id == $category->category_id) ? "disabled" : ""}}><?php echo $char.$manage['category_name']; ?></option>
    <?php
    unset($categories[$key]);
    viewedit($categories,$category,$manage['category_id'],$char.$manage['category_name'].' > ');
    }
    }
    }
    ?>
@endsection