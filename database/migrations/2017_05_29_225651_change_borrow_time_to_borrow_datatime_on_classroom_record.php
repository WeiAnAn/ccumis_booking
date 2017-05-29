<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeBorrowTimeToBorrowDatatimeOnClassroomRecord extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('classroom_records',function($table){
            $table->renameColumn('borrow_time', 'borrow_datetime');
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
            $table->renameColumn('borrow_datetime', 'borrow_time');
        });
    }
}
