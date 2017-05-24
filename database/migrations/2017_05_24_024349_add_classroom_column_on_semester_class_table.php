<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddClassroomColumnOnSemesterClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('semester_classes',function($table){
            $table->unsignedInteger('classroom_id')->default(1);
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
        Schema::table('semester_classes',function($table){
            $table->dropForeign('semester_classes_classroom_id_foreign');
            $table->dropColumn('classroom_id');
        });
    }
}
