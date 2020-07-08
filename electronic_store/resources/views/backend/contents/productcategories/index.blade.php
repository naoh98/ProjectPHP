@extends("backend.layouts.main")
@section("title","Quản lý thể loại")
@section("content")

    <div class="container-fluid">
        <div>
            <a href="{{url("/admin/product_category/create")}}" class="btn btn-success">Thêm Thể Loại</a>
        </div>
        @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif
        <br>
        <table class="table">
            <thead class=" thead-dark">
            <tr>
                <th>Thể Loại</th>
                <th>Category ID</th>
                <th>Parent ID</th>
                <th>Level</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php viewmenu($category); ?>
            </tbody>
        </table>
    </div>
    <?php
    function viewmenu(&$categories,$parent_id=0,$char='',$level=0){
    foreach ($categories as $key => $manage){
    if ($manage['parent_id']==$parent_id){
    ?>
    <tr>
        <td>
            <?php echo $char.$manage['category_name']; ?>
        </td>
        <td>
            <?php echo $manage['category_id']; ?>
        </td>
        <td>
            <?php echo $manage['parent_id']; ?>
        </td>
        <td>
            <?php $a = $level+1; echo $a; ?>
        </td>
        <td class="text-right">
            <a href="{{url("/admin/product_category/edit/$manage->category_id")}}" class="btn btn-warning">Sửa</a>
            <a href="{{url("/admin/product_category/delete/$manage->category_id")}}" class="btn btn-danger">Xóa</a>
        </td>
    </tr>
    <?php
    unset($categories[$key]);
    viewmenu($categories,$manage['category_id'],$manage['category_name'].' > ',$a);
    }
    }
    }
    ?>
@endsection