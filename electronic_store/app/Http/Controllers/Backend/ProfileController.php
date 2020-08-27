<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    //
    public function adminList(){
        $list = DB::table('admins')->paginate(10);
        return view('backend.contents.admin.adminList',['list'=>$list]);
    }
}
