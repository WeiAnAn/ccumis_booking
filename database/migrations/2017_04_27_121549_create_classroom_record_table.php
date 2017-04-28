<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassroomRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classroom_records', function($table){
            $table->increments('id');
            $table->unsignedInteger('classroom_id');
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->datetime('return_datetime');
            $table->integer('status');
            $table->foreign('classroom_id')->references('id')->on('classrooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('classroom_records',function($table){
            $table->dropForeign('classroom_records_classroom_id_foreign');
        });
        Schema::dropIfExists('classroom_records');
    }
}
