<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->hasMany(User::class);
        /* 学習メモ（詳解）
        $this（=Departmentモデル）は、１対多の関係にあるUserモデルのなかから、
        department_idが一致するUserのレコードを取得する
        */
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

}
