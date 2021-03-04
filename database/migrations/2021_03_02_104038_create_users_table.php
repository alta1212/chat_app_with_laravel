<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            //https://laravel.com/docs/8.x/migrations#column-method-text
            // $table->id();
            // $table->binary('avata');
            // $table->text('email');
            // $table->text('name');
            // $table->text('mota');
            // $table->text('phone');
            // $table->text('pass');
            // $table->text('diachi');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
