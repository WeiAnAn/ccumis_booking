<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTimestampColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('classrooms',function($table){
            $table->timestamps();
        });
        Schema::table('classroom_records',function($table){
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
        //
        Schema::table('classroom_records',function($table){
            $table->dropColumn(['updated_at','created_at']);
        });
        Schema::table('classrooms',function($table){
            $table->dropColumn(['updated_at','created_at']);
        });
    }
}
