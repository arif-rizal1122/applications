<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * ini tempat membuat structur table atau schema nya
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     * 
     * ini untuk menghilangkan / menghapus schema yg dibuat 
     * 
     * titik dua (:) artinya mejalankan perintah down()
     * 
     * migrations ini mirip dengan git tapi ini melacak perubahan pada database
     * 
     * antara db dan database.php ini akan dibuat di folder model sebagai penghubung keduanya
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
