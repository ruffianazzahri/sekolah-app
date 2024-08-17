<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToStudentsTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->unsignedBigInteger('inputted_id')->nullable()->after('age');
            $table->string('inputted_email')->nullable()->after('inputted_id');
            $table->string('reason')->nullable()->after('status');
            $table->string('changed_by_admin')->nullable()->after('reason');

            // Tambahkan foreign key constraint
            $table->foreign('inputted_id')->references('id')->on('users')->onDelete('set null');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign(['inputted_id']);
            $table->dropColumn(['inputted_id', 'inputted_email', 'reason', 'changed_by_admin']);
        });
    }
}