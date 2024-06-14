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
        Schema::create('other_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('data_id')->nullable();
            $table->string('key');
            $table->enum('type', ['text', 'json', 'number']);
            $table->string('value', 1000);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('other_data');
    }
};
