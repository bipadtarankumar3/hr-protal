<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('onboard_pros', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->date('joining_date');
            $table->string('department', 100);
            $table->string('mentor_assigned')->nullable();
            $table->string('checklist_status', 100);
            $table->boolean('training_completed')->default(false);
            $table->boolean('orientation_done')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->foreign('employee_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('onboard_pros');
    }
};
