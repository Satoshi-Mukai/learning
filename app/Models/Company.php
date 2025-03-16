<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'status'];
    // セキュリティのため、Eloquentで登録・更新できるカラムを制御。
    // 今はここだけにして、後にしよう（今やっても変更が多そうなので）。

    public function users() //usersというメソッドをここに定義
    {
        return $this->hasMany(User::class); //ある会社に所属するユーザー情報を取得できるようにする
        /* 学習メモ（詳解）
        $this（=Companyモデル）は、
        hasMany(xxx)・・・１対多の関係にあるxxxの複数レコードの中から取得する。
        hasMany(User::class)・・・Userモデルのレコードの中から取得する。何を？
        複数あるUserレコードの中から、company_idが一致するusersを。
        */
    }

}
