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
        Schema::create('available_months', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Installment::class)->constrained()->cascadeOnDelete();
            $table->integer('month');
            $table->text('description');
            $table->integer('nominal');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('available_months');
    }
};
