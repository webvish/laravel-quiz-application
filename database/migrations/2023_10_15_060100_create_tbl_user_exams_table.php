<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblUserExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_user_exams', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('exam_id')->nullable();
            $table->string('std_status')->nullable();
            $table->string('exam_joined')->nullable();
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
        Schema::dropIfExists('tbl_user_exams');
    }
}
