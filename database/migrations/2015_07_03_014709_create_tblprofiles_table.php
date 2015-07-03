<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblprofilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblprofiles', function (Blueprint $table) {
            $table->string('username')->primary();
            $table->string('email')->unique();
            $table->date('birthday');
            $table->string('address');
            $table->string('city');
            $table->string('province');
            $table->timestamps(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblprofiles');
    }
}
