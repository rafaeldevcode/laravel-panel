<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name', 100);
            $table->string('site_description', 100);
            $table->integer('site_logo_main')->nullable();
            $table->integer('site_logo_secondary')->nullable();
            $table->integer('site_favicon')->nullable();
            $table->integer('site_bg_login')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
