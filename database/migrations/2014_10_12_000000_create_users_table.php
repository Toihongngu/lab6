<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  // database/migrations/xxxx_xx_xx_create_users_table.php
public function up()
{
    Schema::create('users', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('fullname');
        $table->string('username')->unique();
        $table->string('email')->unique();
        $table->string('password');
        $table->string('avatar')->nullable();
        $table->enum('role', ['admin', 'user'])->default('user');
        $table->boolean('active')->default(true);
        $table->timestamps();
    }); 
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
