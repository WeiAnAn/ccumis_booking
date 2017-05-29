<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeClassroomRecordTableColumnName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('classroom_records', function($table){
            $table->renameColumn('user_id','reserve_user_id');
            $table->renameColumn('borrow_by', 'borrow_user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('classroom_records', function($table){
            $table->renameColumn('reserve_user_id','user_id');
            $table->renameColumn('borrow_user_id', 'borrow_by');
        });
    }
}
