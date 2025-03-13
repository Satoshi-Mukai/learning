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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->unique();//一意の値を指定。なおtableのidはデフォルトで一意なのでuniqueは不要
            $table->enum('status', ['active', 'inactive']);
            $table->timestamps(); // created_atとupdated_atは、自動生成して値を保持しているので呼び出せる
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies'); // このテーブルが存在するときに、ロールバック時に削除するという意味
    }
};
