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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->dateTime('punchIn')->comment('登園時間');
            $table->dateTime('punchOut')->nullable()->comment('降園時間');
            // $table->date('date')->comment('登園・降園の日付');
            // $table->time('punchIn')->comment('登園時間');
            // $table->time('punchOut')->comment('降園時間');
            #student_id; one-many relationship
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
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
        Schema::dropIfExists('attendances');
    }
};
