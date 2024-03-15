<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ProductRequest;

use Illuminate\Support\Facades\Validator;


use App\Rules\Uppercase;
//use Illuminate\Support\Facades\DB;
use DB;


class HomeController extends Controller
{
    public $data = [];
    public function index(){
       $this->data['title']='Đào tạo lập trình web';

       $this->data['message']='Đăng kí tài khoản thành công';

    //    $users = DB::select('SELECT * FROM users WHERE email=:email',[
    //     'email'=>'myduyen@gmail.com'
    //    ]);

    //    dd($users);

        return view('clients.home',$this->data);
    }

    public function products(){
       $this->data['title']='Sản phẩm';
       return view('clients.products',$this->data);

    }

    public function getAdd(){
       $this->data['title']='Thêm sản phẩm';
       $this->data ['errorMessage'] = 'Vui lòng kiểm tra lại dữ liệu';

        return view('clients.add',$this->data);
    }

    public function postAdd(ProductRequest $request){
        $rules = [
            'product_name'=> ['required','min:6'],
            'product_price'=>['required','integer']

        ];


         $messages =[
            'required'=>'Trường :attribute bắt buộc phải nhập',
            'min'=>'Trường :attribute không được nhỏ hơn :min ký tự',
            'integer'=>'Trường :attribute phải là số',
        ];

        $attributes = [
            'product_name'=>'Tên sản phẩm',
            'product_price'=>'Giá sản phẩm'
        ];

        //$validator= Validator::make($request->all(), $rules, $messages, $attributes);

        //$validator->validate();

        //$request->validate($rules,$messages);


        return response()->json(['status'=>'success']);

        //$validator->validate();
        // if ($validator->fails()){
        //     $validator->errors()->add('msg','Vui lòng kiểm tra lại dữ liệu');
        //     //return 'validate thất bại';
        // }else{
        //    // return 'Validate thành công';
        //    return redirect()->route('product')->with('msg','Validate thành công');
        // }

        // return back()->withErrors($validator);
       

        //$request->validate($rules,$messages);
            
 
        //Xử lí việc thêm dữ liệu vào Laravel
     }

    public function putAdd(Request $request){
        return 'Phương thức PUT';
        dd($request);
 
    }

    public function getArr(){
        $contentArr = [
            'name' => 'Laravel 8.x',
            'lesson' => 'Khóa học lập trình Laravel',
            'academy' => 'Unicode Academy'
        ];
    
        return $contentArr;
    }

    public function downloadImage(Request $request){
        if (!empty($request->image)){
            $image = trim($request->image);

            $fileName = 'image_'.uniqid().'.jpg';

            //$fileName = basename($image);

            // return response()->streamDownload(function() use($image){
            //     $imageContent = file_get_contents($image);
            //     echo $imageContent;
            // },$fileName);
            
            return response()->download($image,$fileName);
        }
    }

    public function downloadDoc(Request $request){
        if (!empty($request->file)){
            $file = trim($request->file);

            $fileName = 'tai-lieu_'.uniqid().'.pdf';

            //$fileName = basename($image);

            // return response()->streamDownload(function() use($image){
            //     $imageContent = file_get_contents($image);
            //     echo $imageContent;
            // },$fileName);

            $headers = [
                'content-Type'=>'application/pdf'
            ];
            
            return response()->download($file,$fileName);
        }
    }

    
}
