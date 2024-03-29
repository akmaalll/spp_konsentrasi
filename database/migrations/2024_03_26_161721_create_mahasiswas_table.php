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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->char('nim', 6)->primary();
            $table->string('name');
            $table->string('username');
            $table->string('password');
            $table->text('address');
            $table->string('phone');
            $table->foreignId('jurusan_id')->nullable()->constrained('Jurusans')->cascadeOnDelete();
            $table->foreignId('spp_id')->nullable()->constrained('Spps')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
