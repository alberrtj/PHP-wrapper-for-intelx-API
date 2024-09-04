<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSettings extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('settings')) {
            Schema::create('settings', function (Blueprint $table) {
                $table->increments('id');
                $table->string('title')->nullable();
            });
        }
    }

    public function down()
    {
        if (Schema::hasTable('settings')) {
            Schema::drop('settings');
        }
    }
}
