<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSemesterIdColumnOnClassroomRecord extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("classroom_records", function($table){
            $table->unsignedInteger('semester_class_id')->nullable();
            $table->foreign('semester_class_id')->references('id')->on('semester_classes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("classroom_records", function($table){
            $table->dropForeign("classroom_records_semester_class_id_foreign");
            $table->dropColumn("semester_class_id");
        });
    }
}
