<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constraind()->onDelete('cascade'); //companiesテーブルのidカラムと紐付け、当該idが削除されたら、cascadeにより当該その会社idのデータが削除される
            $table->foreignId('department_id')->nullable()->constraind()->onDelete('set null');//部署が削除されても、所属従業員のデータは保持する。nullable＝nullを許容する
            $table->string('name');
            $table->string('email')->unique();
            $table->enum('status', ['active', 'inactive']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
