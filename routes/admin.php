
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

Route::prefix('admin')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/talent-hub', [TalentHubController::class, 'index']);
    Route::get('/talent-hub/create', [TalentHubController::class, 'create']);

    Route::get('/hire-desk', [HireDeskController::class, 'index']);
    Route::get('/onboard-pro', [OnboardProController::class, 'index']);
    Route::get('/team-map', [TeamMapController::class, 'index']);
    Route::get('/pulse-log', [PulseLogController::class, 'index']);
    Route::get('/time-away', [TimeAwayController::class, 'index']);
    Route::get('/leave-track', [LeaveTrackController::class, 'index']);
    Route::get('/pay-pulse', [PayPulseController::class, 'index']);
    Route::get('/buzz-desk', [BuzzDeskController::class, 'index']);
    Route::get('/talent-vault', [TalentVaultController::class, 'index']);
    Route::get('/project-desk', [ProjectDeskController::class, 'index']);
    Route::get('/curtain-call', [CurtainCallController::class, 'index']);
    Route::get('/offboard-desk', [OffBoardDeskController::class, 'index']);
    Route::get('/role-master', [RoleMasterController::class, 'index']);
    Route::get('/learn-zone', [LearnZoneController::class, 'index']);
});
