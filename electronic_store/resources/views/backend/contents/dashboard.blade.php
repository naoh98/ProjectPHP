@extends('backend.layouts.main')

@section('title', 'Admin')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')


    <!-- Begin Page Content -->
    <div class="container-fluid">

    <?php
        $login = session("sblogin");
        if (isset($login) && $login){
            echo "<div class='al_admin'>Hello ".$login["username"]."</div>";
        }
        ?>

    </div>
    <!-- /.container-fluid -->

@endsection