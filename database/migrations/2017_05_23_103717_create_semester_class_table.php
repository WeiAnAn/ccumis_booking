<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSemesterClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semester_classes', function($table){
            $table->increments('id');
            $table->unsignedInteger('semester_id');
            $table->unsignedInteger('day');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('borrower');
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
        Schema::dropIfExists('semester_classes');
    }
}
