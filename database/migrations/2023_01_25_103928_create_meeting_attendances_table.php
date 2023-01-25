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
        Schema::create('meeting_attendances', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable()->comment('ユーザーID');
            // $table->unsignedBigInteger('user_id')->comment('ユーザーID');
            $table->unsignedBigInteger('meeting_id')->comment('イベントID');
            $table->unsignedBigInteger('type_id')->comment('出欠タイプID');
            $table->timestamps();

            // $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('meeting_id')->references('id')->on('meetings');
            $table->foreign('type_id')->references('id')->on('meeting_attendance_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meeting_attendances');
    }
};
