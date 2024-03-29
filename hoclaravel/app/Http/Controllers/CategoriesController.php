<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //
    public function __construct(Request $request){

        // if ($request->is('categories')){
        //     echo '<h3>Xin chao unicode</h3>';
        // }
       
        
    }

    //Hien thi danh sach chuyen muc(Phuong thuc Get)
    public function index(Request $request){

        // if (isset($_GET['id'])){
        //     echo $_GET['id'];
        // }

        // $allData = $request->all();

        // echo $request->all()['name'];

        // dd($allData);

        // $path = $request->path();
        // echo $path;

        //$url = $request->url();
        // $fullurl = $request->fullurl();
        // echo $fullurl;

        //$method = $request->method();
        //echo $method;

        $ip = $request->ip();
        // echo 'IP la: '.$ip;

        // if ($request->isMethod('GET')){
        //     echo 'Phuong thuc GET';
        // }

        // $server = $request->server();
        // dd($server['REQUEST_URL']);

        // $header = $request->header('user-agent');
        // dd($header);

        // $id = $request->input('id');
        // echo $id;

        // $id = $request->input('id.*.name');

        // $id = $request->id;
        // $name = $request->name();

        //$id = $request->query('id');

        //dd($id);

        // $query = $request->query();
        // dd($query);

        //dd(request()->id);
        // $name = request('name'.'Unicode');
        // dd($name);


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
    public function addCategory(Request $request){

        // $path = $request->path();
        // echo $path;
        $cateName = $request->old('category_name','Mặc định');
       

        return view('clients/categories/add');
    }

    //Them du lieu vao chuyen muc(Phuong thuc POST)
    public function handleAddCategory(Request $request){

        // $allData = $request->all();

        // dd($allData);

        // if ($request->isMethod('POST')){
        //     echo 'Phuong thuc POST';
        // }


        //return redirect(route('categories.add'));
        // return 'Submit them chuyen muc';
        //$cateName= $request->query();
        if ($request->has('category_name')){
            $cateName=$request->category_name;
            $request->flash();//set session flash

            return redirect(route('categories.add'));
        }else{
            return 'Không có category_name';
        }
        
    }

    //Xoa du lieu(Phuong thuc Delete)
    public function deleteCategory($id){
        return 'Submit xoa chuyen muc:'.$id;
    }
    public function getFile(){
        return view('clients/categories/file');
    }

    //Xử lí lấy thông tin file
    public function handleFile(Request $request){
        //$file = $request->file('photo');
        if ($request->hasFile('photo')){
            if ($request->photo->isValid()){
                $file = $request->photo;
                //$path = $file->path();
                $ext = $file->extension();
                //$path = $file->store('file-txt','local');
                //$path = $file->storeAs('file-txt','khoa-hoc.txt');
               
                
                //$fileName = $file->getClientOriginalName();

                //Đổi tên
                $fileName = md5(uniqid()).'.'.$ext;
                dd($fileName);

            }else{
                return 'Upload không thành công';
            }
           
        }else{
            return 'Vui lòng chọn file';
        }
        
    }

}
