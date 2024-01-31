<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function _construct(){
        //echo 'khởi động';
        //return 'Khởi động dashboard';
        //Sử dụng session để check login
    }
    public function index(){
        return '<h2>Dashboard Welcome</h2>';
    }
}
