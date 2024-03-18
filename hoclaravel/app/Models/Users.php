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

        //Lấy tất cả bản ghi của table
        $lists = DB::table($this->table)
        //->where('id','>=',19)
        //->where('id','<>',19)
        ->select('fullname as hoten','email','id')
        //->where('id',19)
        ->where('id',19)
        ->orWhere('id',20)
        ->get();
        dd($lists);

        //Lấy 1 bản ghi đầu tiên của table lấy thông tin chi tiết
        $detail = DB::table($this->table)->first();
    }
}
