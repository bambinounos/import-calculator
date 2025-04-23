<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            // Agregar campos adicionales
            $table->string('company')->nullable();
            $table->string('phone')->nullable();

            // Para roles de usuario
            $table->enum('role', ['admin', 'user'])->default('user');

            // Para almacenar información de la última conexión
            $table->timestamp('last_login_at')->nullable();
            $table->string('last_login_ip')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
