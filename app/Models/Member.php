<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Member extends Model
{
    protected $table = 'member';
    protected $fillable = ['user_account', 'user_name', 'user_password',];
    public $primaryKey = 'user_id';
    public $timestamps = false;
    public static function new_member(){
        $member = DB::table('member')
                    ->select('user_account', 'user_name', 'user_password')
                    ->get();
        return $member;
    }
    public static function find_member($user_account){
        $member = DB::table('member')
                    ->select('user_account', 'user_name', 'user_password')
                    ->where('user_account', '=', "$user_account")
                    ->get();
        return $member;
    }
    public static function member_space($user_account){
        $img = DB::table('img_upload')
                 ->select('id', 'img_url', 'width_height')
                 ->where('user_account', '=', "$user_account")
                 ->get();
        return $img;
    }
    public static function name_update($user_account, $user_name){
        $member = DB::table('member')
                    ->where('user_account', '=', "$user_account")
                    ->update(['user_name' => $user_name]);
        return $member;
    }
    public static function password_update($user_account, $user_password){
        $member = DB::table('member')
                    ->where('user_account', '=', "$user_account")
                    ->update(['user_password' => $user_password]);
        return $member;
    }
}
