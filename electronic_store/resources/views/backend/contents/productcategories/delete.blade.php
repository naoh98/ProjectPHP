@extends("backend.layouts.main")
@section("title","Xóa danh mục")
@section("content")
<div class="container-fluid">
    <div class="row">
        <h1>Xóa Danh Mục</h1>
        <div class="col-md-12">
            <a href="{{url('/admin/product_category')}}" class="btn btn-info">Quay về</a>
        </div>
        @if(session('status'))
            <div class="alert alert-danger">
                {{session('status')}}
            </div>
        @endif
        <div class="col-md-12">
            <form name="book_category" action="{{url("/admin/product_category/delete/$category->category_id")}}"  method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label>ID: </label><span> {{$category->category_id}}</span> <br>
                    <label>Tên Thể Loại: </label><span> {{$category->category_name}}</span>
                </div>
                <button type="submit" class="btn btn-danger">Xóa</button>
            </form>
        </div>
    </div>
</div>

@endsection