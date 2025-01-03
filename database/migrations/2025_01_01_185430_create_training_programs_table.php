<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('training_programs', function (Blueprint $table) {
            $table->id();
            $table->string('program_id')->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamp('schedule_start');
            $table->timestamp('schedule_end');
            $table->string('venue');
            $table->text('prerequisites')->nullable();
            $table->boolean('is_feature')->default(false);
            $table->integer('max_participants')->default(20);
            $table->enum('status', ['Scheduled', 'Ongoing', 'Completed', 'Cancelled'])->default('Scheduled');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('training_programs');
    }
};
