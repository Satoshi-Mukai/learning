<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    public function company()
    {
        return $this->belongsTo(Company::class); // ユーザーが所属する会社を取得
    }
    public function department()
    {
        return $this->belongsTo(Department::class); //ユーザーが所属する部署を取得
    }
    public function courses()
    {
        return $this->belongsTo(Coures::class)->withTimestamps();
        //withTimestampsを追加すると、created_atとupdated_atが自動追加される

    }
}
