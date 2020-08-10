@extends("backend.layouts.main")
@section("title","Thêm Hãng")
@section("content")
    <div class="container-fluid">
        <div class="row">
            <h1>Thêm Hãng Sản Xuất</h1>
            <div class="col-md-12">
                <a href="{{url('/admin/manufacturer')}}" class="btn btn-info">Quay về</a>
            </div>
            <br><br>
            <div class="col-md-12">
                <form name="up_fact" action="{{url("/admin/manufacturer/create")}}"  method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Tên Hãng</label>
                        <input type="text" value="" name="manufacturer_name" class="form-control">
                    </div>
                    @error('manufacturer_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label style="display: block;">Ảnh Đại Diện</label>
                        <label class="custom_img">
                            <input type="file" value="" name="manufacturer_image">
                            <span><i class="fa fa-upload"></i>&nbsp;&nbsp;Chọn file</span>
                        </label>
                    </div>
                    @error('manufacturer_image')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label>Giới Thiệu</label>
                        <input type="text" value="" name="manufacturer_desc" class="form-control">
                    </div>
                    @error('manufacurer_desc')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="btn btn-danger">Thêm</button>
                </form>
            </div>
        </div>
    </div>
@endsection