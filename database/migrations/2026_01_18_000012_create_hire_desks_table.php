<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hire_desks', function (Blueprint $table) {
            $table->id();
            $table->string('position');
            $table->string('department', 100);
            $table->integer('vacancy_count')->default(1);
            $table->enum('status', ['open', 'ongoing', 'closed'])->default('open');
            $table->date('opening_date');
            $table->date('closing_date')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hire_desks');
    }
};
