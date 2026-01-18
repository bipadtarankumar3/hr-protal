<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('talent_vaults', function (Blueprint $table) {
            $table->id();
            $table->string('candidate_name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('position_applied')->nullable();
            $table->string('qualification')->nullable();
            $table->string('experience_years')->nullable();
            $table->string('source')->nullable();
            $table->string('status')->default('pending');
            $table->date('application_date')->nullable();
            $table->text('resume_link')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->index('status');
            $table->index('position_applied');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('talent_vaults');
    }
};
