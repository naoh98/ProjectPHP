@extends("backend.layouts.main")
@section("title","Thêm Danh Mục")
@section("content")
    <div class="container-fluid">
        <div class="row">
            <h1>Thêm Danh Mục</h1>
            <div class="col-md-12">
                <a href="{{url('/admin/product_category')}}" class="btn btn-info">Quay về</a>
            </div>
            <br><br>
            <div class="col-md-12">
                <form name="up_cat" action="{{url("/admin/product_category/create")}}"  method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Tên Thể Loại</label>
                        <input type="text" value="" name="category_name" class="form-control">
                    </div>
                    @error('category_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label style="display: block;">Ảnh Đại Diện</label>
                        <label class="custom_img">
                            <input type="file" value="" name="category_image">
                            <span><i class="fa fa-upload"></i>&nbsp;&nbsp;Chọn file</span>
                        </label>
                    </div>
                    @error('category_image')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label>Danh Mục</label>
                        <div>
                            <select name="parent_id">
                                <option value="0">Gốc</option>
                                <?php viewcreate($category); ?>
                            </select>
                        </div>
                    </div>
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {!! session('error') !!}
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
    if ($manage['parent_id']==$parent_id){
    ?>
    <option value="{{$manage->category_id}}"}}><?php echo $char.$manage['category_name']; ?></option>
    <?php
    unset($categories[$key]);
    viewcreate($categories,$manage['category_id'],$char.$manage['category_name'].' > ');
    }
    }
    }
    ?>
@endsection