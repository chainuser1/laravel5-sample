<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->string('email');
            $table->string('title');
            $table->string('fname',40);
            $table->string('mname',40);
            $table->string('lname',40);
            $table->string('address',100);
            $table->string('city',21);
            $table->date('birthday');
            $table->text('about_me');
            $table->string('prof_pic');
            $table->string('mime');
            $table->primary('email');

            $table->timestamps('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('profile');
    }
}
