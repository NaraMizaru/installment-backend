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
        Schema::create('installment_apply_societies', function (Blueprint $table) {
            $table->id();
            $table->text('notes');
            $table->foreignIdFor(\App\Models\AvailableMonth::class)->constrained()->cascadeOnDelete();
            $table->date('date');
            $table->foreignIdFor(\App\Models\Society::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Installment::class)->constrained()->cascadeOnDelete();
            $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('installment_apply_societies');
    }
};
