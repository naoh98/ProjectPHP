@extends("backend.layouts.main")
@section("title","Sửa Thuộc Tính")
@section("content")
    <div class="container-fluid">
        <div class="row">
            <h1>Sửa Thuộc Tính</h1>
            <div class="col-md-12">
                <a href="{{url('/admin/attribute')}}" class="btn btn-info">Quay về</a>
            </div>
            <br><br>
            <div class="col-md-12">
                <form name="up_att" action="{{url("/admin/attribute/edit/$att->attribute_id")}}"  method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Tên Thuộc Tính</label>
                        <input type="text" value="{{$att->attribute_name}}" name="attribute_name" class="form-control">
                    </div>
                    @error('attribute_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="btn btn-danger">Sửa</button>
                </form>
            </div>
        </div>
    </div>
@endsection
