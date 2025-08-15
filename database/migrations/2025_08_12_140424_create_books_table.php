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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('book_code', 50);
            $table->string('category', 50);
            $table->string('judul', 255);
            $table->string('status')->default('in stock');
            $table->string('pengarang', 100)->nullable();
            $table->string('penerbit', 100)->nullable();
            $table->year('tahun_terbit')->nullable();
            $table->string('isbn', 20)->nullable();
            $table->integer('jumlah_stok')->default(0);
            $table->string('lokasi_rak', 50)->nullable();
            $table->text('deskripsi')->nullable();
            $table->text('cover')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
