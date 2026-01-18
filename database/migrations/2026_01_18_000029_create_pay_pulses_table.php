<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pay_pulses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->decimal('base_salary', 12, 2)->nullable();
            $table->decimal('allowances', 12, 2)->nullable();
            $table->decimal('deductions', 12, 2)->nullable();
            $table->decimal('net_salary', 12, 2)->nullable();
            $table->string('pay_frequency')->nullable();
            $table->date('payment_date')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('status')->default('pending');
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->index('employee_id');
            $table->index('status');
            $table->foreign('employee_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pay_pulses');
    }
};
