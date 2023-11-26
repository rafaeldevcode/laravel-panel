<?php

use App\Enums\StatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 150);
            $table->string('password');
            $table->string('avatar', 100)->default('default.png');
            $table->char('status', 3)->default(StatusEnum::ON);

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();

            $table->integer('permission_id')->unsigned();
            $table->foreign('permission_id')->references('id')->on('permissions');

            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
