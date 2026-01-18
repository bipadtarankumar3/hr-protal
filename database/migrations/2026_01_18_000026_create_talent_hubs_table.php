<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('talent_hubs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->string('name')->nullable();
            $table->string('skills')->nullable();
            $table->string('experience_level')->nullable();
            $table->string('department')->nullable();
            $table->string('career_path')->nullable();
            $table->date('applied_date')->nullable();
            $table->string('status')->default('active');
            $table->text('notes')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->index('employee_id');
            $table->index('status');
            $table->foreign('employee_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('talent_hubs');
    }
};
