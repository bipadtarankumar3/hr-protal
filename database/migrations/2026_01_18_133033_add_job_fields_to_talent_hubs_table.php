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
        Schema::table('talent_hubs', function (Blueprint $table) {
            // Make employee_id nullable since this is for job postings
            $table->unsignedBigInteger('employee_id')->nullable()->change();
            
            // Add new job-related fields
            $table->string('location')->nullable()->after('department');
            $table->integer('application_limit')->nullable()->after('notes');
            $table->string('hiring_manager')->nullable()->after('application_limit');
            $table->string('project')->nullable()->after('hiring_manager');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('talent_hubs', function (Blueprint $table) {
            $table->dropColumn(['location', 'application_limit', 'hiring_manager', 'project']);
            $table->unsignedBigInteger('employee_id')->nullable(false)->change();
        });
    }
};
