@extends("backend.layouts.main")
@section("title","Quản lý nhà sản xuất")
@section("content")
    <div class="cf_del_fact">
        <p>Nhà sản xuất này sẽ bị xóa khỏi hệ thống</p>
    </div>
    <div class="container-fluid">
        <div>
            <a href="{{url("/admin/manufacturer/create")}}" class="btn btn-success">Thêm Nhà Sản Xuất</a>
        </div>
        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                {{session('error')}}
            </div>
        @endif
        <br>
        <table class="table">
            <thead class=" thead-dark">
            <tr>
                <th>Nhà sản xuất</th>
                <th>Giới thiệu</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($fact as $partner){ ?>
                <tr>
                    <td>{{$partner->manufacturer_name}}</td>
                    <td>{{$partner->manufacturer_desc}}</td>
                    <td style="text-align: right;">
                        <a href="{{url("/admin/manufacturer/edit/$partner->manufacturer_id")}}" class="btn btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form class="del_fact" action="{{url("/admin/manufacturer/delete/$partner->manufacturer_id")}}" method="post" style="display: inline;">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger" type="submit">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            <?php }
            ?>
            </tbody>
        </table>
    </div>
@endsection
