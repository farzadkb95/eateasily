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
            $table->string('code', 64);
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('guest_id')->nullable()->constrained()->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('data_id')->nullable()->constrained()->cascadeOnUpdate()->restrictOnDelete();
            $table->string('gateway');
            $table->json('info');
            $table->string('description');
            $table->decimal('amount', 20, 2);
            $table->enum('status', ['success', 'fail', 'cancel', 'pending'])->nullable();
            $table->boolean('apply')->default(false);
            $table->string('pay_code')->nullable();
            $table->string('pay_ref')->nullable();
            $table->string('card_number')->nullable();
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
