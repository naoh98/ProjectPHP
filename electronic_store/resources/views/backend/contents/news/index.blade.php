@extends("backend.layouts.main")
@section("title","Quản lý bài viết")
@section("content")
    <div class="cf_del_pro">
        <p>Bài viết này sẽ bị xóa khỏi hệ thống</p>
    </div>
    <div class="container-fluid">
        <div>
            <a href="{{ route('admin.new.create') }}" class="btn btn-success">Thêm Bài viết</a>
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
                <th>Tiêu đề</th>
                <th>Ảnh</th>
                <th>Tóm Tắt</th>
                <th>Nội dung</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>

            @foreach($news as $new)
                <tr>
                    <td>{{$new->title}}</td>
                    <td>{{$new->image}}</td>
                    <td>{{$new->excerpt}}</td>
                    <td>{{$new->content}}</td>
                    <td>
                    <a href="{{url("/admin/news/edit/$new->id")}}" class="btn btn-warning" style="width: 43px;">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form class="del_pro" action="{{url("/admin/news/delete/$new->id")}}" method="post" style="display: inline;">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" style="width: 43px" type="submit">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                    </td>

                </tr>
            @endforeach

            </tbody>
        </table>
        <div class="row pages">
            {{ $news->links() }}
        </div>
    </div>

@endsection
