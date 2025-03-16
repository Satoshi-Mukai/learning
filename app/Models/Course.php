<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_courses')->withTimestamps();
        /* 学習メモ（詳解）
        berlongsToMany（多対多）の場合、今回の場合 user と courses の場合、
        直接これらを紐づけることができないので、「中間テーブル」を使って管理する。

        user_coursesという中間テーブルを介して、userを取得するということ。

        withTimestampsで、created_atとupdated_atを自動更新してくれる
        */
    }

}
