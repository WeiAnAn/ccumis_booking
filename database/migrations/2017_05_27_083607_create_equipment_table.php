<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment', function($table){
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('total');
            $table->unsignedInteger('remain');
            $table->timestamps();
        });
        Schema::create('equipment_records', function($table){
            $table->increments('id');
            $table->unsignedInteger('equipment_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('count');
            $table->datetime('borrow_datetime');
            $table->datetime('return_datetime');
            $table->timestamps();
            $table->foreign('equipment_id')->references('id')->on('equipment');
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
        Schema::table('equipment_records', function($table){
            $table->dropForeign('equipment_records_equipment_id_foreign');
            $table->dropForeign('equipment_records_user_id_foreign');
        });
        Schema::dropIfExists('equipment');
        Schema::dropIfExists('equipment_records');
    }
}
