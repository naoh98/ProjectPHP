
@extends("backend.layouts.main")
@section("title","Thêm bài viết")
@section("content")
    <div class="container-fluid">
        <div class="row">
            <h1>Thêm bài viết</h1>
            <div class="col-md-12">
                <a href="{{ route('admin.new.index') }}" class="btn btn-info">Quay về</a>
            </div>
            <br><br>
            <div class="col-md-12">
                <form action="{{ route('admin.new.store') }}"  method="post" enctype="multipart/form-data">
                    {{csrf_field() }}

                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input type="text" value="" name="title" class="form-control">
                    </div>
                    @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label style="display: block;">Ảnh đại diện </label>
                        <label class="custom_img">
                            <input type="file" value="" name="image">
                            <span><i class="fa fa-upload"></i>&nbsp;&nbsp;Chọn file</span>
                        </label>
                    </div>
                    @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label>Tóm tắt</label>
                        <textarea name="excerpt" cols="20" rows="20" class="form-control"></textarea>
                    </div>
                    @error('excerpt')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea name="content_post" cols="40" rows="20" class="form-control"></textarea>
                    </div>
                    @error('content_post')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <button type="submit" class="btn btn-danger">Thêm</button>
                </form>
            </div>
        </div>
    </div>
@endsection
