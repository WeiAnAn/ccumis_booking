<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateClassroomRecord extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('classroom_records', function($table){
            $table->unsignedInteger('user_id');
            $table->string('borrower');
            $table->foreign('user_id')->references('id')->on('users');
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
            $table->dropForeign('classroom_records_user_id_foreign');
        });
        Schema::table('classroom_records', function($table){
            $table->dropColumn(['user_id','borrower']);
        });
    }
}
