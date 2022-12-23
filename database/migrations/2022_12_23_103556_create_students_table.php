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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_name')->comment('園児の名前');
            $table->string('student_kana')->comment('園児のフリガナ');
            $table->enum('student_gender', ['Male', 'Female'])->comment('園児の性別');
            $table->string('student_image')->comment('園児の画像');
            $table->foreignId('user_id')->constrained()->comment('usersテーブルの外部キー制約');
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
        Schema::dropIfExists('students');
    }
};
