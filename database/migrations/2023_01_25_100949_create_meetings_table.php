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
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('イベント名');
            $table->text('description')->comment('イベント詳細');
            $table->date('eventDay')->comment('イベント日');
            $table->time('startTime')->comment('開始時間');
            $table->time('endTime')->comment('終了時間');
            $table->date('deadline')->comment('提出期日');
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
        Schema::dropIfExists('meetings');
    }
};
