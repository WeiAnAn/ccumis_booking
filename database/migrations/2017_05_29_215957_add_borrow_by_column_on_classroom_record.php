<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBorrowByColumnOnClassroomRecord extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('classroom_records', function($table){
            $table->unsignedInteger('borrow_by')->nullable();
            $table->foreign('borrow_by')->references('id')->on('users');
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
            $table->dropForeign('classroom_records_borrow_by_foreign');
            $table->dropColumn('borrow_by');
        });
    }
}
