<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //action index
    public function index(){
        return 'Home';
    }

    //action getNews
    public function getNews(){
        return 'Danh sách tin tức';
    }

    public function getCategories($id){
        return 'Chuyên mục'.$id;
    }
}
