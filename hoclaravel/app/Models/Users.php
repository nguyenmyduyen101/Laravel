<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Users extends Model
{
    use HasFactory;
    protected $table = 'users';

    public function getAllUsers(){
        $users = DB::select('SELECT*FROM users ORDER BY create_at DESC');

        return $users;
    }

    public function addUser($data){
        DB::insert('INSERT INTO users (fullname,email,create_at) values(?,?,?)',
        $data);
    }


    public function getDetail($id){
        return DB::select('SELECT * FROM' .$this->table.'WHERE id = ?',[$id]);
    }

    public function updateUser($data,$id){
        $data = $id;

        return DB::update('UPDATE'.$this->table.'SET fullname=?, email=?, update_at=? where id = ?', $data);
    }

    public function deleteUser($id){
        return DB::delete("DELETE FROM $this->table WHERE id=?",[$id]);
    }

    public function statementUser($sql){
        return DB::statement($sql);
    }

    public function learnQueryBuilder(){

        DB::enableQueryLog();

        //Lấy tất cả bản ghi của table
        // $id = 20;
        // $lists = DB::table($this->table)
        // ->select('fullname as hoten','email','id','update_at','create_at')
        //->where('id',18)
        // ->where(function($query) use ($id){
        //     $query->where('id','<',$id)->orWhere('id','>',$id);

        // })
        // ->where('fullname','like','%van quan%')
        // ->whereBetween('id',[18,20])
        // ->whereNotBetween('id',[18,20])
        // ->whereNotIn('id',[18,20])
        // ->whereNotNull('update_at')
        //->whereYear('create_at','2021')
       // ->whereColumn('create_at','create_at')
        //->get();
        // ->toSql();

        //Join bảng
        //$lists = DB::table('users')
        // ->select('users.*','groups.name as group_name')
        //->rightJoin('groups','users.group_id', '=', 'groups.id')
        // ->orderBy('create_at','asc')
        // ->orderBy('id','desc')
        // ->inRandomOrder()
        // ->select(DB::raw('count(id) as email_count'),'email','fullname')
        // ->groupBy('email')
        // ->groupBy('fullname')
        // ->having('email_count','>=',2)
        // ->limit(2)
        // ->offset(2)
        // ->take(2)
        // ->skip(2)
        // ->get();

        //dd($lists);

        // $status = DB::table('users')->insert([
        //     'fullname'=>'Nguyễn Văn A',
        //     'email'=> 'nguyenvana@gmail.com',
        //     'group_id' => 1,
        //     'create_at' => date('Y-m-d H:i:s')
        // ]);
        
        //dd($status);

        //$lastId = DB::getPdo()->lastInsertId();

        // $lastId = DB::table('users')->insertGetId([
        //     'fullname' => 'Nguyễn Văn A',
        //     'email' => 'nguyenvana@gmail.com',
        //     'group_id' => 1,
        //     'create_at' => date('Y-m-d H:i:s')
        // ]);

        // dd($lastId);

        // $status = DB::table('users')
        // ->where('id',29)
        // ->update([
        //     'fullname' => 'Nguyễn Văn B',
        //     'email' => 'nguyenvanb@gmail.com',
        //     'update_at' => date('Y-m-d H:i:s')
        // ]);

        // $status = DB::table('users')
        // ->where('id',28)
        // ->delete();

        //Đếm số bản ghi
        $count = DB::table('users')->where('id','>',20)->count();
        // $count = count($lists);
        // dd($count);

        $sql = DB::getQueryLog();
        dd($sql);
        
        //Lấy 1 bản ghi đầu tiên của table lấy thông tin chi tiết
        $detail = DB::table($this->table)->first();
    }
}
