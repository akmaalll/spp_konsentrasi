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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->timestamp('paid_at')->nullable();
            $table->unsignedInteger('amount')->default(0);
            $table->string('paid_month');
            $table->string('paid_year');
            $table->char('nim', 6);
            $table->enum('status', ['unpaid', 'paid']);
            $table->string('order_id');
            $table->foreignId('spp_id')->constrained('spps')->cascadeOnDelete();
            $table->foreign('nim')->references('nim')->on('mahasiswas')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
