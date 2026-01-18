<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('offboard_desks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->date('exit_date');
            $table->text('reason')->nullable();
            $table->string('checklist_status', 100);
            $table->boolean('documents_returned')->default(false);
            $table->boolean('final_settlement')->default(false);
            $table->boolean('reference_provided')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->foreign('employee_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('offboard_desks');
    }
};
