<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRoleUser extends Migration
{
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {

            $table->integer('user_id')->unsigned();
            $table->integer('role_id')->unsigned();
            $table->primary(['user_id',
                'role_id']);
        });
    }

    public function down()
    {
        Schema::drop('role_user');
    }
}
