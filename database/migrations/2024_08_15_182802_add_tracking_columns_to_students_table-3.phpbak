<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTrackingColumnsToStudentsTable3 extends Migration
{
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->unsignedBigInteger('inputted_id')->nullable();
            $table->string('inputted_email')->nullable();
            $table->string('changed_by_admin')->nullable();
            $table->text('reason')->nullable();

            // Jika Anda ingin menambahkan foreign key
            $table->foreign('inputted_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign(['inputted_id']);
            $table->dropColumn(['inputted_id', 'inputted_email', 'changed_by_admin', 'reason']);
        });
    }

}
