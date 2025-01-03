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
        Schema::create('data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('guest_id')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->timestamp('phone_verified_at')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('status', ['in_process', 'finished', 'unfinished'])->default('in_process');
            $table->string('step', 256)->nullable();
            $table->string('type', 128);
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->unsignedTinyInteger('age')->nullable();
            $table->unsignedTinyInteger('height')->nullable();
            $table->unsignedTinyInteger('weight')->nullable();
            $table->decimal('ideal_weight')->nullable();
            $table->decimal('extra_weight')->nullable();
            $table->decimal('x_value')->nullable();
            $table->decimal('y_value')->nullable();
            $table->decimal('right')->nullable();
            $table->decimal('left')->nullable();
            $table->decimal('age_offset')->nullable();
            $table->decimal('fat_risk')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data');
    }
};
