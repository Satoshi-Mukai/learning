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
        Schema::create('create=department_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')->constrained()->onDelete('cascade');
            $table->enum('change_type', ['rename', 'merge', 'split', 'deleted']);
            $table->string('old_name')->nullable();//前の部署名というものが存在しない、ということを許容する
            $table->string('new_name')->nullable();
            $table->json('merged_from')->nullable();//どこの部署と統合したかをjson形式で
            $table->json('split_into')->nullable();//どこの部署に分割したかをjson形式で
            $table->date('effective_date');
            $table->text('details'); // 内容を記録
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
        Schema::dropIfExists('create=department_histories');
    }
};
