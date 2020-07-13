<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        return view('backend.contents.dashboard');

    }

    public function login() {
        return view('frontend.contents.homepage');
    }

    public function register() {
        return view('frontend.contents.homepage');
    }

    public function loginAdmin() {

    }

    public function registerAdmin() {



    }

    public function logout() {

    }

}
