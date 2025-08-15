<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pustakawans', function (Blueprint $table) {
            $table->id(); // ID auto increment
            $table->string('name'); // Nama pustakawan
            $table->string('email')->unique(); // Email unik
            $table->string('phone')->nullable(); // Telepon (opsional)
            $table->string('nip')->nullable(); // Status aktif/nonaktif // Password opsional, jika login diperlukan
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pustakawans');
    }
};
