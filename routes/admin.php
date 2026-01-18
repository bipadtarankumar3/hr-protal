<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DashboardMetricController;
use App\Http\Controllers\Admin\TalentHubController;
use App\Http\Controllers\Admin\HireDeskController;
use App\Http\Controllers\Admin\OnboardProController;
use App\Http\Controllers\Admin\TeamMapController;
use App\Http\Controllers\Admin\PulseLogController;
use App\Http\Controllers\Admin\TimeAwayController;
use App\Http\Controllers\Admin\LeaveTrackController;
use App\Http\Controllers\Admin\PayPulseController;
use App\Http\Controllers\Admin\BuzzDeskController;
use App\Http\Controllers\Admin\TalentVaultController;
use App\Http\Controllers\Admin\ProjectDeskController;
use App\Http\Controllers\Admin\CurtainCallController;
use App\Http\Controllers\Admin\OffBoardDeskController;
use App\Http\Controllers\Admin\RoleMasterController;
use App\Http\Controllers\Admin\LearnZoneController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\GrievanceCellController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OfferLetterController;
use App\Http\Controllers\Admin\KycController;
use App\Http\Controllers\Admin\PayslipController;
use App\Http\Controllers\Admin\AuditTrailController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\JobPostingController;
use App\Http\Controllers\Admin\ModuleCardController;

Route::prefix('admin')->middleware(['auth'])->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Talent Hub
    Route::get('/talent-hub', [TalentHubController::class, 'index'])->name('talent-hubs.index');
    Route::get('/talent-hub/create', [TalentHubController::class, 'create'])->name('talent-hubs.create');
    Route::post('/talent-hub', [TalentHubController::class, 'store'])->name('talent-hubs.store');
    Route::get('/talent-hub/applicants', [TalentHubController::class, 'applicants'])->name('talent-hubs.applicants');
    Route::get('/talent-hub/{id}/edit', [TalentHubController::class, 'edit'])->name('talent-hubs.edit');
    Route::match(['put', 'patch'], '/talent-hub/{id}', [TalentHubController::class, 'update'])->name('talent-hubs.update');
    Route::delete('/talent-hub/{id}', [TalentHubController::class, 'destroy'])->name('talent-hubs.destroy');
    Route::get('/talent-hub/{id}', [TalentHubController::class, 'show'])->name('talent-hubs.show');

    // Hire Desk
    Route::get('/hire-desk', [HireDeskController::class, 'index'])->name('hire-desks.index');
    Route::get('/hire-desk/create', [HireDeskController::class, 'create'])->name('hire-desks.create');
    Route::post('/hire-desk', [HireDeskController::class, 'store'])->name('hire-desks.store');
    Route::get('/hire-desk/offer', [HireDeskController::class, 'offer'])->name('hire-desks.offer');
    Route::get('/hire-desk/{id}/edit', [HireDeskController::class, 'edit'])->name('hire-desks.edit');
    Route::match(['put', 'patch'], '/hire-desk/{id}', [HireDeskController::class, 'update'])->name('hire-desks.update');
    Route::delete('/hire-desk/{id}', [HireDeskController::class, 'destroy'])->name('hire-desks.destroy');
    Route::get('/hire-desk/{id}', [HireDeskController::class, 'show'])->name('hire-desks.show');

    // Onboard Pro
    Route::get('/onboard-pro', [OnboardProController::class, 'index'])->name('onboard-pros.index');
    Route::get('/onboard-pro/create', [OnboardProController::class, 'create'])->name('onboard-pros.create');
    Route::post('/onboard-pro', [OnboardProController::class, 'store'])->name('onboard-pros.store');
    Route::get('/onboard-pro/{id}/edit', [OnboardProController::class, 'edit'])->name('onboard-pros.edit');
    Route::match(['put', 'patch'], '/onboard-pro/{id}', [OnboardProController::class, 'update'])->name('onboard-pros.update');
    Route::delete('/onboard-pro/{id}', [OnboardProController::class, 'destroy'])->name('onboard-pros.destroy');
    Route::get('/onboard-pro/{id}', [OnboardProController::class, 'show'])->name('onboard-pros.show');

    // Team Map
    Route::get('/team-map', [TeamMapController::class, 'index'])->name('team-maps.index');
    Route::get('/team-map/create', [TeamMapController::class, 'create'])->name('team-maps.create');
    Route::post('/team-map', [TeamMapController::class, 'store'])->name('team-maps.store');
    Route::get('/team-map/{id}/edit', [TeamMapController::class, 'edit'])->name('team-maps.edit');
    Route::match(['put', 'patch'], '/team-map/{id}', [TeamMapController::class, 'update'])->name('team-maps.update');
    Route::delete('/team-map/{id}', [TeamMapController::class, 'destroy'])->name('team-maps.destroy');
    Route::get('/team-map/{id}', [TeamMapController::class, 'show'])->name('team-maps.show');

    // Pulse Log
    Route::get('/pulse-log', [PulseLogController::class, 'index'])->name('pulse-logs.index');
    Route::get('/pulse-log/create', [PulseLogController::class, 'create'])->name('pulse-logs.create');
    Route::post('/pulse-log', [PulseLogController::class, 'store'])->name('pulse-logs.store');
    Route::get('/pulse-log/{id}/edit', [PulseLogController::class, 'edit'])->name('pulse-logs.edit');
    Route::match(['put', 'patch'], '/pulse-log/{id}', [PulseLogController::class, 'update'])->name('pulse-logs.update');
    Route::delete('/pulse-log/{id}', [PulseLogController::class, 'destroy'])->name('pulse-logs.destroy');
    Route::get('/pulse-log/{id}', [PulseLogController::class, 'show'])->name('pulse-logs.show');
    Route::post('/pulse-log/save-weekly-notes', [PulseLogController::class, 'saveWeeklyNotes'])->name('pulse-logs.save-weekly-notes');

    // Time Away
    Route::get('/time-away', [TimeAwayController::class, 'index'])->name('time-aways.index');
    Route::get('/time-away/create', [TimeAwayController::class, 'create'])->name('time-aways.create');
    Route::post('/time-away', [TimeAwayController::class, 'store'])->name('time-aways.store');
    Route::get('/time-away/{id}/edit', [TimeAwayController::class, 'edit'])->name('time-aways.edit');
    Route::match(['put', 'patch'], '/time-away/{id}', [TimeAwayController::class, 'update'])->name('time-aways.update');
    Route::delete('/time-away/{id}', [TimeAwayController::class, 'destroy'])->name('time-aways.destroy');
    Route::get('/time-away/{id}', [TimeAwayController::class, 'show'])->name('time-aways.show');

    // Leave Track
    Route::get('/leave-track', [LeaveTrackController::class, 'index'])->name('leave-tracks.index');
    Route::get('/leave-track/create', [LeaveTrackController::class, 'create'])->name('leave-tracks.create');
    Route::post('/leave-track', [LeaveTrackController::class, 'store'])->name('leave-tracks.store');
    Route::get('/leave-track/{id}/edit', [LeaveTrackController::class, 'edit'])->name('leave-tracks.edit');
    Route::match(['put', 'patch'], '/leave-track/{id}', [LeaveTrackController::class, 'update'])->name('leave-tracks.update');
    Route::delete('/leave-track/{id}', [LeaveTrackController::class, 'destroy'])->name('leave-tracks.destroy');
    Route::get('/leave-track/{id}', [LeaveTrackController::class, 'show'])->name('leave-tracks.show');

    // Pay Pulse
    Route::get('/pay-pulse', [PayPulseController::class, 'index'])->name('pay-pulses.index');
    Route::get('/pay-pulse/create', [PayPulseController::class, 'create'])->name('pay-pulses.create');
    Route::post('/pay-pulse', [PayPulseController::class, 'store'])->name('pay-pulses.store');
    Route::get('/pay-pulse/{id}/edit', [PayPulseController::class, 'edit'])->name('pay-pulses.edit');
    Route::match(['put', 'patch'], '/pay-pulse/{id}', [PayPulseController::class, 'update'])->name('pay-pulses.update');
    Route::delete('/pay-pulse/{id}', [PayPulseController::class, 'destroy'])->name('pay-pulses.destroy');
    Route::get('/pay-pulse/{id}', [PayPulseController::class, 'show'])->name('pay-pulses.show');

    // Buzz Desk
    Route::get('/buzz-desk', [BuzzDeskController::class, 'index'])->name('buzz-desks.index');
    Route::get('/buzz-desk/create', [BuzzDeskController::class, 'create'])->name('buzz-desks.create');
    Route::post('/buzz-desk', [BuzzDeskController::class, 'store'])->name('buzz-desks.store');
    Route::get('/buzz-desk/{id}/edit', [BuzzDeskController::class, 'edit'])->name('buzz-desks.edit');
    Route::match(['put', 'patch'], '/buzz-desk/{id}', [BuzzDeskController::class, 'update'])->name('buzz-desks.update');
    Route::delete('/buzz-desk/{id}', [BuzzDeskController::class, 'destroy'])->name('buzz-desks.destroy');
    Route::get('/buzz-desk/{id}', [BuzzDeskController::class, 'show'])->name('buzz-desks.show');

    // Talent Vault
    Route::get('/talent-vault', [TalentVaultController::class, 'index'])->name('talent-vaults.index');
    Route::get('/talent-vault/create', [TalentVaultController::class, 'create'])->name('talent-vaults.create');
    Route::post('/talent-vault', [TalentVaultController::class, 'store'])->name('talent-vaults.store');
    Route::get('/talent-vault/{id}/edit', [TalentVaultController::class, 'edit'])->name('talent-vaults.edit');
    Route::match(['put', 'patch'], '/talent-vault/{id}', [TalentVaultController::class, 'update'])->name('talent-vaults.update');
    Route::delete('/talent-vault/{id}', [TalentVaultController::class, 'destroy'])->name('talent-vaults.destroy');
    Route::get('/talent-vault/{id}', [TalentVaultController::class, 'show'])->name('talent-vaults.show');

    // Project Desk
    Route::get('/project-desk', [ProjectDeskController::class, 'index'])->name('project-desks.index');
    Route::get('/project-desk/create', [ProjectDeskController::class, 'create'])->name('project-desks.create');
    Route::post('/project-desk', [ProjectDeskController::class, 'store'])->name('project-desks.store');
    Route::get('/project-desk/{id}/edit', [ProjectDeskController::class, 'edit'])->name('project-desks.edit');
    Route::match(['put', 'patch'], '/project-desk/{id}', [ProjectDeskController::class, 'update'])->name('project-desks.update');
    Route::delete('/project-desk/{id}', [ProjectDeskController::class, 'destroy'])->name('project-desks.destroy');
    Route::get('/project-desk/{id}', [ProjectDeskController::class, 'show'])->name('project-desks.show');

    // Curtain Call
    Route::get('/curtain-call', [CurtainCallController::class, 'index'])->name('curtain-calls.index');
    Route::get('/curtain-call/create', [CurtainCallController::class, 'create'])->name('curtain-calls.create');
    Route::post('/curtain-call', [CurtainCallController::class, 'store'])->name('curtain-calls.store');
    Route::get('/curtain-call/resign', [CurtainCallController::class, 'resign'])->name('curtain-calls.resign');
    Route::get('/curtain-call/{id}/edit', [CurtainCallController::class, 'edit'])->name('curtain-calls.edit');
    Route::match(['put', 'patch'], '/curtain-call/{id}', [CurtainCallController::class, 'update'])->name('curtain-calls.update');
    Route::delete('/curtain-call/{id}', [CurtainCallController::class, 'destroy'])->name('curtain-calls.destroy');
    Route::get('/curtain-call/{id}', [CurtainCallController::class, 'show'])->name('curtain-calls.show');

    // OffBoard Desk
    Route::get('/offboard-desk', [OffBoardDeskController::class, 'index'])->name('offboard-desks.index');
    Route::get('/offboard-desk/create', [OffBoardDeskController::class, 'create'])->name('offboard-desks.create');
    Route::post('/offboard-desk', [OffBoardDeskController::class, 'store'])->name('offboard-desks.store');
    Route::get('/offboard-desk/{id}/edit', [OffBoardDeskController::class, 'edit'])->name('offboard-desks.edit');
    Route::match(['put', 'patch'], '/offboard-desk/{id}', [OffBoardDeskController::class, 'update'])->name('offboard-desks.update');
    Route::delete('/offboard-desk/{id}', [OffBoardDeskController::class, 'destroy'])->name('offboard-desks.destroy');
    Route::get('/offboard-desk/{id}', [OffBoardDeskController::class, 'show'])->name('offboard-desks.show');

    // Role Master
    Route::get('/role-master', [RoleMasterController::class, 'index'])->name('role-masters.index');
    Route::get('/role-master/create', [RoleMasterController::class, 'create'])->name('role-masters.create');
    Route::post('/role-master', [RoleMasterController::class, 'store'])->name('role-masters.store');
    Route::get('/role-master/{id}/edit', [RoleMasterController::class, 'edit'])->name('role-masters.edit');
    Route::match(['put', 'patch'], '/role-master/{id}', [RoleMasterController::class, 'update'])->name('role-masters.update');
    Route::delete('/role-master/{id}', [RoleMasterController::class, 'destroy'])->name('role-masters.destroy');
    Route::get('/role-master/{id}', [RoleMasterController::class, 'show'])->name('role-masters.show');
    Route::get('/role-master/{id}/permissions', [RoleMasterController::class, 'showPermissions'])->name('role-masters.permissions');
    Route::post('/role-master/{id}/permissions', [RoleMasterController::class, 'updatePermissions'])->name('role-masters.permissions.update');

    // Learn Zone
    Route::get('/learn-zone', [LearnZoneController::class, 'index'])->name('learn-zones.index');
    Route::get('/learn-zone/create', [LearnZoneController::class, 'create'])->name('learn-zones.create');
    Route::post('/learn-zone', [LearnZoneController::class, 'store'])->name('learn-zones.store');
    Route::get('/learn-zone/{id}/edit', [LearnZoneController::class, 'edit'])->name('learn-zones.edit');
    Route::match(['put', 'patch'], '/learn-zone/{id}', [LearnZoneController::class, 'update'])->name('learn-zones.update');
    Route::delete('/learn-zone/{id}', [LearnZoneController::class, 'destroy'])->name('learn-zones.destroy');
    Route::get('/learn-zone/{id}', [LearnZoneController::class, 'show'])->name('learn-zones.show');

    // Organization - Departments, Teams, Grievance Cell
    Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');
    Route::get('/departments/create', [DepartmentController::class, 'create'])->name('departments.create');
    Route::post('/departments', [DepartmentController::class, 'store'])->name('departments.store');
    Route::get('/departments/{id}/edit', [DepartmentController::class, 'edit'])->name('departments.edit');
    Route::match(['put','patch'],'/departments/{id}', [DepartmentController::class, 'update'])->name('departments.update');
    Route::delete('/departments/{id}', [DepartmentController::class, 'destroy'])->name('departments.destroy');
    Route::get('/departments/{id}', [DepartmentController::class, 'show'])->name('departments.show');

    Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');
    Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');
    Route::post('/teams', [TeamController::class, 'store'])->name('teams.store');
    Route::get('/teams/{team}/edit', [TeamController::class, 'edit'])->name('teams.edit');
    Route::match(['put','patch'], '/teams/{team}', [TeamController::class, 'update'])->name('teams.update');
    Route::delete('/teams/{team}', [TeamController::class, 'destroy'])->name('teams.destroy');
    Route::get('/teams/{team}', [TeamController::class, 'show'])->name('teams.show');

    Route::get('/grievance-cell', [GrievanceCellController::class, 'index'])->name('grievance-cells.index');
    Route::get('/grievance-cell/create', [GrievanceCellController::class, 'create'])->name('grievance-cells.create');
    Route::post('/grievance-cell', [GrievanceCellController::class, 'store'])->name('grievance-cells.store');
    Route::get('/grievance-cell/{id}/edit', [GrievanceCellController::class, 'edit'])->name('grievance-cells.edit');
    Route::match(['put', 'patch'], '/grievance-cell/{id}', [GrievanceCellController::class, 'update'])->name('grievance-cells.update');
    Route::delete('/grievance-cell/{id}', [GrievanceCellController::class, 'destroy'])->name('grievance-cells.destroy');
    Route::get('/grievance-cell/{id}', [GrievanceCellController::class, 'show'])->name('grievance-cells.show');

    // Users (Admin-managed)
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::match(['put', 'patch'], '/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

    // Offer Letter / KYC / Payslip / Audit
    Route::get('/offer-letters', [OfferLetterController::class, 'index'])->name('offer-letters.index');
    Route::get('/offer-letters/create', [OfferLetterController::class, 'create'])->name('offer-letters.create');
    Route::post('/offer-letters', [OfferLetterController::class, 'store'])->name('offer-letters.store');
    Route::get('/offer-letters/compose', [OfferLetterController::class, 'compose'])->name('offer-letters.compose');
    Route::get('/offer-letters/{id}/edit', [OfferLetterController::class, 'edit'])->name('offer-letters.edit');
    Route::match(['put', 'patch'], '/offer-letters/{id}', [OfferLetterController::class, 'update'])->name('offer-letters.update');
    Route::delete('/offer-letters/{id}', [OfferLetterController::class, 'destroy'])->name('offer-letters.destroy');
    Route::get('/offer-letters/{id}', [OfferLetterController::class, 'show'])->name('offer-letters.show');

    Route::get('/kyc', [KycController::class, 'index'])->name('kyc.index');
    Route::get('/kyc/create', [KycController::class, 'create'])->name('kyc.create');
    Route::post('/kyc', [KycController::class, 'store'])->name('kyc.store');
    Route::get('/kyc/{id}/edit', [KycController::class, 'edit'])->name('kyc.edit');
    Route::match(['put', 'patch'], '/kyc/{id}', [KycController::class, 'update'])->name('kyc.update');
    Route::delete('/kyc/{id}', [KycController::class, 'destroy'])->name('kyc.destroy');
    Route::get('/kyc/{id}', [KycController::class, 'show'])->name('kyc.show');

    Route::get('/payslips', [PayslipController::class, 'index'])->name('payslips.index');
    Route::get('/payslips/create', [PayslipController::class, 'create'])->name('payslips.create');
    Route::post('/payslips', [PayslipController::class, 'store'])->name('payslips.store');
    Route::get('/payslips/generate', [PayslipController::class, 'generate'])->name('payslips.generate');
    Route::get('/payslips/{id}/edit', [PayslipController::class, 'edit'])->name('payslips.edit');
    Route::match(['put', 'patch'], '/payslips/{id}', [PayslipController::class, 'update'])->name('payslips.update');
    Route::delete('/payslips/{id}', [PayslipController::class, 'destroy'])->name('payslips.destroy');
    Route::get('/payslips/{id}', [PayslipController::class, 'show'])->name('payslips.show');

    Route::get('/audit-trail', [AuditTrailController::class, 'index'])->name('audit-trails.index');
    Route::get('/audit-trail/{id}', [AuditTrailController::class, 'show'])->name('audit-trails.show');

    // Features
    Route::get('/features', [FeatureController::class, 'index'])->name('features.index');
    Route::get('/features/create', [FeatureController::class, 'create'])->name('features.create');
    Route::post('/features', [FeatureController::class, 'store'])->name('features.store');
    Route::get('/features/{id}/edit', [FeatureController::class, 'edit'])->name('features.edit');
    Route::match(['put', 'patch'], '/features/{id}', [FeatureController::class, 'update'])->name('features.update');
    Route::delete('/features/{id}', [FeatureController::class, 'destroy'])->name('features.destroy');
    Route::get('/features/{id}', [FeatureController::class, 'show'])->name('features.show');

    // Job Postings
    Route::get('/job-postings', [JobPostingController::class, 'index'])->name('job-postings.index');
    Route::get('/job-postings/create', [JobPostingController::class, 'create'])->name('job-postings.create');
    Route::post('/job-postings', [JobPostingController::class, 'store'])->name('job-postings.store');
    Route::get('/job-postings/{id}/edit', [JobPostingController::class, 'edit'])->name('job-postings.edit');
    Route::match(['put', 'patch'], '/job-postings/{id}', [JobPostingController::class, 'update'])->name('job-postings.update');
    Route::delete('/job-postings/{id}', [JobPostingController::class, 'destroy'])->name('job-postings.destroy');
    Route::get('/job-postings/{id}', [JobPostingController::class, 'show'])->name('job-postings.show');

    // Module Cards
    Route::get('/module-cards', [ModuleCardController::class, 'index'])->name('module-cards.index');
    Route::get('/module-cards/create', [ModuleCardController::class, 'create'])->name('module-cards.create');
    Route::post('/module-cards', [ModuleCardController::class, 'store'])->name('module-cards.store');
    Route::get('/module-cards/{id}/edit', [ModuleCardController::class, 'edit'])->name('module-cards.edit');
    Route::match(['put', 'patch'], '/module-cards/{id}', [ModuleCardController::class, 'update'])->name('module-cards.update');
    Route::delete('/module-cards/{id}', [ModuleCardController::class, 'destroy'])->name('module-cards.destroy');
    Route::get('/module-cards/{id}', [ModuleCardController::class, 'show'])->name('module-cards.show');

    // Dashboard Metrics
    Route::get('/dashboard-metrics', [DashboardMetricController::class, 'index'])->name('dashboard-metrics.index');
    
    
});