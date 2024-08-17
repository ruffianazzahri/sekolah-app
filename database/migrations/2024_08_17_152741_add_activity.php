<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddActivity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Ubah dari Schema::table menjadi Schema::create untuk membuat tabel baru
        Schema::create('activity', function (Blueprint $table) {
            $table->id();
            $table->string('day');
            $table->string('time');
            $table->string('description');
            $table->text('mentor');
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
        // Menghapus tabel 'activity' jika rollback
        Schema::dropIfExists('activity');
    }
}