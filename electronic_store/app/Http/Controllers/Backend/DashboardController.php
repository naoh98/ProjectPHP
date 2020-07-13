<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AdminModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('sblogin')->except(['login', 'loginAdmin','register' , 'registerAdmin', 'logout']);
    }

    public function index(){
        return view('backend.contents.dashboard');

    }

    public function login() {
        return view('backend.sbadmin2.subviews.login');
    }

    public function register() {
        return view('backend.sbadmin2.subviews.register');
    }

    public function loginAdmin(Request $request) {

        $username = $request->input('username');
        $password = $request->input('password');


        $admin = DB::table('admins')->where('name', $username)->first();

        if ($admin && Hash::check($password, $admin->password)) {

            session(['sblogin' => [
                'username' => $username,
                'password' => $password
            ]]);

            return redirect('admin')->with('status', 'Đăng nhập thành công');
        }

        return redirect('admin/login')->with('status', 'Username hoặc mật khẩu không đúng, thử lại !');


    }

    public function registerAdmin(Request $request) {

        $rules = [
            'username' => 'required',
            'email' => 'required',
            'password' => 'required'
        ];

        $customMessages = [
            'required' => 'Trường :attribute không được để trống.',
        ];

        $this->validate($request, $rules, $customMessages);

        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');
        $password = Hash::make($password);

        $admin = new AdminModel();
        $admin->name = $username;
        $admin->email = $email;
        $admin->password = $password;
        $admin->save();

        return redirect('admin/login')->with('status', 'Tạo tài khoản thành công');

    }

    public function logout(Request $request) {

        $request->session()->forget('sblogin');
        $request->session()->flush();

        return redirect('admin/login')->with('status', 'Đăng xuất thành công');

    }

}
