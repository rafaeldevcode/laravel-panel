<?php

use App\Enums\StatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('icon', 50);
            $table->string('slug', 100)->unique();
            $table->string('position');
            $table->char('show', 3)->default(StatusEnum::ON);
            $table->json('submenus')->nullable();
            $table->string('prefix', 100);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('menus');
    }
};
