<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('program_type', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('program_id')->constrained('training_programs')->onDelete('cascade');
            $table->foreignId('type_id')->constrained('training_types')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('program_type');
    }
};
