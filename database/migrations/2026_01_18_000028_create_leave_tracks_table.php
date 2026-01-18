<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('leave_tracks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->string('leave_type')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('days')->nullable();
            $table->string('status')->default('pending');
            $table->text('reason')->nullable();
            $table->date('approved_date')->nullable();
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->timestamps();
            $table->index('employee_id');
            $table->index('status');
            $table->foreign('approved_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('leave_tracks');
    }
};
