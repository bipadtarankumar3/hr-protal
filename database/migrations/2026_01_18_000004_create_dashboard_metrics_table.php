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
        Schema::create('dashboard_metrics', function (Blueprint $table) {
            $table->id();
            $table->string('metric_key')->unique(); // 'total_employees', 'open_jobs', etc.
            $table->string('metric_label');
            $table->string('icon_class')->nullable();
            $table->string('badge_class')->default('bg-label-primary'); // Bootstrap color class
            $table->integer('metric_value')->default(0);
            $table->string('reference_module')->nullable(); // 'Talent Vault', 'Talent Hub'
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->index('metric_key');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dashboard_metrics');
    }
};
