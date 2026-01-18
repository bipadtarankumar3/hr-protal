<?php

/**
 * ROUTES CONFIGURATION FOR DYNAMIC CONTENT
 * 
 * Add these routes to your routes/admin.php file
 * 
 * These routes manage all dynamic content for the HRMS system
 */

// Example configuration for routes/admin.php:

use App\Http\Controllers\Admin\{
    DashboardMetricController,
    JobPostingController,
    FeatureController,
    PageContentController,
    ModuleCardController,
    DashboardController,
    UserController
};

// Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Dashboard Metrics Management
Route::resource('dashboard-metrics', DashboardMetricController::class);

// Job Postings Management
Route::resource('job-postings', JobPostingController::class);

// Features Management
Route::resource('features', FeatureController::class);

// Page Content Management
Route::resource('page-content', PageContentController::class);

// Module Cards Management
Route::resource('module-cards', ModuleCardController::class);

// Users Management (Updated)
Route::resource('users', UserController::class);

/**
 * AVAILABLE ROUTES AFTER CONFIGURATION
 * 
 * Dashboard Metrics:
 *   GET    /admin/dashboard-metrics              - List all metrics
 *   GET    /admin/dashboard-metrics/create       - Show create form
 *   POST   /admin/dashboard-metrics              - Store new metric
 *   GET    /admin/dashboard-metrics/{id}/edit    - Show edit form
 *   PUT    /admin/dashboard-metrics/{id}         - Update metric
 *   DELETE /admin/dashboard-metrics/{id}         - Delete metric
 * 
 * Job Postings:
 *   GET    /admin/job-postings                   - List all jobs
 *   GET    /admin/job-postings/create            - Show create form
 *   POST   /admin/job-postings                   - Store new job
 *   GET    /admin/job-postings/{id}/edit         - Show edit form
 *   PUT    /admin/job-postings/{id}              - Update job
 *   DELETE /admin/job-postings/{id}              - Delete job
 * 
 * Features:
 *   GET    /admin/features                       - List all features
 *   GET    /admin/features/create                - Show create form
 *   POST   /admin/features                       - Store new feature
 *   GET    /admin/features/{id}/edit             - Show edit form
 *   PUT    /admin/features/{id}                  - Update feature
 *   DELETE /admin/features/{id}                  - Delete feature
 * 
 * Page Content:
 *   GET    /admin/page-content                   - List all content
 *   GET    /admin/page-content/create            - Show create form
 *   POST   /admin/page-content                   - Store new content
 *   GET    /admin/page-content/{id}/edit         - Show edit form
 *   PUT    /admin/page-content/{id}              - Update content
 *   DELETE /admin/page-content/{id}              - Delete content
 * 
 * Module Cards:
 *   GET    /admin/module-cards                   - List all cards
 *   GET    /admin/module-cards/create            - Show create form
 *   POST   /admin/module-cards                   - Store new card
 *   GET    /admin/module-cards/{id}/edit         - Show edit form
 *   PUT    /admin/module-cards/{id}              - Update card
 *   DELETE /admin/module-cards/{id}              - Delete card
 * 
 * Users:
 *   GET    /admin/users                          - List all users
 *   GET    /admin/users/create                   - Show create form
 *   POST   /admin/users                          - Store new user
 *   GET    /admin/users/{user}/show              - Show user details
 *   GET    /admin/users/{user}/edit              - Show edit form
 *   PUT    /admin/users/{user}                   - Update user
 *   DELETE /admin/users/{user}                   - Delete user
 */
