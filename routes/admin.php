<?php

use App\Http\Controllers\Admin\DashboardController;
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

Route::prefix('admin')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Talent Hub
    Route::get('/talent-hub', [TalentHubController::class, 'index']);
    Route::get('/talent-hub/create', [TalentHubController::class, 'create']);
    Route::get('/talent-hub/applicants', [TalentHubController::class, 'applicants']);
    Route::get('/talent-hub/{id}/edit', [TalentHubController::class, 'edit']);
    Route::get('/talent-hub/{id}', [TalentHubController::class, 'show']);

    // Hire Desk
    Route::get('/hire-desk', [HireDeskController::class, 'index']);
    Route::get('/hire-desk/offer', [HireDeskController::class, 'offer']);
    Route::get('/hire-desk/{id}/edit', [HireDeskController::class, 'edit']);
    Route::get('/hire-desk/{id}', [HireDeskController::class, 'show']);

    // Onboard Pro
    Route::get('/onboard-pro', [OnboardProController::class, 'index']);
    Route::get('/onboard-pro/{id}/edit', [OnboardProController::class, 'edit']);
    Route::get('/onboard-pro/{id}', [OnboardProController::class, 'show']);

    // Team Map
    Route::get('/team-map', [TeamMapController::class, 'index']);
    Route::get('/team-map/{id}/edit', [TeamMapController::class, 'edit']);
    Route::get('/team-map/{id}', [TeamMapController::class, 'show']);

    // Pulse Log
    Route::get('/pulse-log', [PulseLogController::class, 'index']);
    Route::get('/pulse-log/{id}/edit', [PulseLogController::class, 'edit']);
    Route::get('/pulse-log/{id}', [PulseLogController::class, 'show']);

    // Time Away
    Route::get('/time-away', [TimeAwayController::class, 'index']);
    Route::get('/time-away/create', [TimeAwayController::class, 'create']);
    Route::get('/time-away/{id}/edit', [TimeAwayController::class, 'edit']);
    Route::get('/time-away/{id}', [TimeAwayController::class, 'show']);

    // Leave Track
    Route::get('/leave-track', [LeaveTrackController::class, 'index']);
    Route::get('/leave-track/create', [LeaveTrackController::class, 'create']);
    Route::get('/leave-track/{id}/edit', [LeaveTrackController::class, 'edit']);
    Route::get('/leave-track/{id}', [LeaveTrackController::class, 'show']);

    // Pay Pulse
    Route::get('/pay-pulse', [PayPulseController::class, 'index']);
    Route::get('/pay-pulse/{id}/edit', [PayPulseController::class, 'edit']);
    Route::get('/pay-pulse/{id}', [PayPulseController::class, 'show']);

    // Buzz Desk
    Route::get('/buzz-desk', [BuzzDeskController::class, 'index']);
    Route::get('/buzz-desk/create', [BuzzDeskController::class, 'create']);
    Route::get('/buzz-desk/{id}/edit', [BuzzDeskController::class, 'edit']);
    Route::get('/buzz-desk/{id}', [BuzzDeskController::class, 'show']);

    // Talent Vault
    Route::get('/talent-vault', [TalentVaultController::class, 'index']);
    Route::get('/talent-vault/create', [TalentVaultController::class, 'create']);
    Route::get('/talent-vault/{id}/edit', [TalentVaultController::class, 'edit']);
    Route::get('/talent-vault/{id}', [TalentVaultController::class, 'show']);

    // Project Desk
    Route::get('/project-desk', [ProjectDeskController::class, 'index']);
    Route::get('/project-desk/create', [ProjectDeskController::class, 'create']);
    Route::get('/project-desk/{id}/edit', [ProjectDeskController::class, 'edit']);
    Route::get('/project-desk/{id}', [ProjectDeskController::class, 'show']);

    // Curtain Call
    Route::get('/curtain-call', [CurtainCallController::class, 'index']);
    Route::get('/curtain-call/resign', [CurtainCallController::class, 'resign']);
    Route::get('/curtain-call/{id}/edit', [CurtainCallController::class, 'edit']);
    Route::get('/curtain-call/{id}', [CurtainCallController::class, 'show']);

    // OffBoard Desk
    Route::get('/offboard-desk', [OffBoardDeskController::class, 'index']);
    Route::get('/offboard-desk/{id}/edit', [OffBoardDeskController::class, 'edit']);
    Route::get('/offboard-desk/{id}', [OffBoardDeskController::class, 'show']);

    // Role Master
    Route::get('/role-master', [RoleMasterController::class, 'index']);
    Route::get('/role-master/create', [RoleMasterController::class, 'create']);
    Route::get('/role-master/{id}/edit', [RoleMasterController::class, 'edit']);
    Route::get('/role-master/{id}', [RoleMasterController::class, 'show']);

    // Learn Zone
    Route::get('/learn-zone', [LearnZoneController::class, 'index']);
    Route::get('/learn-zone/create', [LearnZoneController::class, 'create']);
    Route::get('/learn-zone/{id}/edit', [LearnZoneController::class, 'edit']);
    Route::get('/learn-zone/{id}', [LearnZoneController::class, 'show']);

    // Organization - Departments, Teams, Grievance Cell
    Route::get('/departments', [DepartmentController::class, 'index']);
    Route::get('/departments/create', [DepartmentController::class, 'create']);
    Route::post('/departments', [DepartmentController::class, 'store']);
    Route::get('/departments/{id}/edit', [DepartmentController::class, 'edit']);
    Route::match(['put','patch'],'/departments/{id}', [DepartmentController::class, 'update']);
    Route::delete('/departments/{id}', [DepartmentController::class, 'destroy']);
    Route::get('/departments/{id}', [DepartmentController::class, 'show']);

    Route::get('/teams', [TeamController::class, 'index']);
    Route::get('/teams/create', [TeamController::class, 'create']);
    Route::post('/teams', [TeamController::class, 'store']);
    Route::get('/teams/{team}/edit', [TeamController::class, 'edit']);
    Route::match(['put','patch'], '/teams/{team}', [TeamController::class, 'update']);
    Route::delete('/teams/{team}', [TeamController::class, 'destroy']);
    Route::get('/teams/{team}', [TeamController::class, 'show']);

    Route::get('/grievance-cell', [GrievanceCellController::class, 'index']);
    Route::get('/grievance-cell/{id}', [GrievanceCellController::class, 'show']);

    // Users (Admin-managed)
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/create', [UserController::class, 'create']);
    Route::get('/users/{id}/edit', [UserController::class, 'edit']);
    Route::get('/users/{id}', [UserController::class, 'show']);

    // Offer Letter / KYC / Payslip / Audit
    Route::get('/offer-letters', [OfferLetterController::class, 'index']);
    Route::get('/offer-letters/{id}', [OfferLetterController::class, 'show']);
    Route::get('/offer-letters/compose', [OfferLetterController::class, 'compose']);

    Route::get('/kyc', [KycController::class, 'index']);
    Route::get('/kyc/{id}', [KycController::class, 'show']);

    Route::get('/payslips', [PayslipController::class, 'index']);
    Route::get('/payslips/generate', [PayslipController::class, 'generate']);
    Route::get('/payslips/{id}', [PayslipController::class, 'show']);

    Route::get('/audit-trail', [AuditTrailController::class, 'index']);
    Route::get('/audit-trail/{id}', [AuditTrailController::class, 'show']);
});
