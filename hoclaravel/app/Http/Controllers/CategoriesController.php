<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //
    public function __construct(){
        
    }

    //Hien thi danh sach chuyen muc(Phuong thuc Get)
    public function index(){
        return view('clients/categories/list');
    }

    //lay ra 1 chuyen muc theo id(Phuong thuc GET)
    public function getCategory($id){
        return view('clients/categories/edit');
    }

    //Sua 1 chuyen muc(Phuong thuc POST)
    public function updateCategory($id){
        return 'Submit sua chuyen muc:'.$id;
    }

    //Show form them du lieu(Phuong thuc GET)
    public function addCategory(){
        return view('clients/categories/add');
    }

    //Them du lieu vao chuyen muc(Phuong thuc POST)
    public function handleAddCategory(){
        return redirect(route('categories.add'));
        // return 'Submit them chuyen muc';
    }

    //Xoa du lieu(Phuong thuc Delete)
    public function deleteCategory($id){
        return 'Submit xoa chuyen muc:'.$id;
    }
}
