<?php

/**
 * QUICK REFERENCE GUIDE
 * Copy-paste ready code examples
 */

// ============================================
// 1. EXAMPLE: Using DashboardMetric in Views
// ============================================

/**
 * In your Blade view:
 */
?>

@foreach($metrics as $metric)
    <div class="card">
        <div class="card-body d-flex align-items-center">
            <div class="avatar {{ $metric->badge_class }} me-3">
                <i class="{{ $metric->icon_class }}"></i>
            </div>
            <div>
                <h6>{{ $metric->metric_label }}</h6>
                <h4>{{ $metric->metric_value }}</h4>
                <small>{{ $metric->reference_module }}</small>
            </div>
        </div>
    </div>
@endforeach

<?php
// ============================================
// 2. EXAMPLE: Using JobPosting in Views
// ============================================
?>

@foreach($jobs as $job)
    <div class="job-card">
        <h3>{{ $job->job_title }}</h3>
        <p>{{ $job->department }} - {{ $job->location }}</p>
        <span class="badge">{{ $job->status }}</span>
        <p>{{ $job->applicants_count }} applicants</p>
    </div>
@endforeach

<?php
// ============================================
// 3. EXAMPLE: Using Feature in Views
// ============================================
?>

@foreach($features as $feature)
    <div class="feature-card">
        <i class="{{ $feature->icon_class }}"></i>
        <h4>{{ $feature->feature_name }}</h4>
        <p>{{ $feature->description }}</p>
    </div>
@endforeach

<?php
// ============================================
// 4. EXAMPLE: Querying in Controller
// ============================================
?>

namespace App\Http\Controllers\Frontend;

use App\Models\Feature;
use App\Models\JobPosting;
use App\Models\PageContent;

class HomeController extends Controller
{
    public function index()
    {
        // Get only active features, sorted by order
        $features = Feature::where('is_active', true)
            ->orderBy('sort_order')
            ->get();
        
        // Get hero section content
        $heroContent = PageContent::where('page_name', 'home')
            ->where('section_name', 'hero')
            ->where('is_active', true)
            ->first();
        
        // Get open job postings
        $jobs = JobPosting::where('is_active', true)
            ->where('status', 'open')
            ->orderBy('sort_order')
            ->paginate(10);
        
        return view('frontend.home', compact('features', 'heroContent', 'jobs'));
    }
}

<?php
// ============================================
// 5. EXAMPLE: Creating Data Programmatically
// ============================================
?>

// In a Seeder or Console Command:

use App\Models\Feature;
use App\Models\DashboardMetric;
use App\Models\JobPosting;

// Create a feature
Feature::create([
    'feature_name' => 'Talent Hub',
    'icon_class' => 'fas fa-user-tie',
    'description' => 'Create job postings, track candidates, and manage hiring pipeline seamlessly.',
    'sort_order' => 1,
    'is_active' => true
]);

// Create a dashboard metric
DashboardMetric::create([
    'metric_key' => 'total_employees',
    'metric_label' => 'Total Employees',
    'metric_value' => 128,
    'icon_class' => 'ri ri-group-line',
    'badge_class' => 'bg-label-primary',
    'reference_module' => 'Talent Vault',
    'sort_order' => 1,
    'is_active' => true
]);

// Create a job posting
JobPosting::create([
    'job_title' => 'Senior Backend Developer',
    'department' => 'Tech',
    'status' => 'open',
    'applicants_count' => 34,
    'description' => 'We are looking for an experienced backend developer...',
    'job_type' => 'Full-time',
    'location' => 'Durgapur',
    'sort_order' => 1,
    'is_active' => true
]);

<?php
// ============================================
// 6. EXAMPLE: Updating Data Programmatically
// ============================================
?>

use App\Models\DashboardMetric;

// Find and update a metric
$metric = DashboardMetric::where('metric_key', 'total_employees')->first();
$metric->update(['metric_value' => 130]);

// Or update directly
DashboardMetric::where('metric_key', 'total_employees')
    ->update(['metric_value' => 130]);

<?php
// ============================================
// 7. EXAMPLE: Querying by Multiple Conditions
// ============================================
?>

use App\Models\JobPosting;

// Get open jobs in Tech department, sorted by date
$techJobs = JobPosting::where('department', 'Tech')
    ->where('status', 'open')
    ->where('is_active', true)
    ->orderBy('created_at', 'desc')
    ->get();

// Get jobs by location
$durgapurJobs = JobPosting::where('location', 'Durgapur')
    ->where('is_active', true)
    ->orderBy('sort_order')
    ->get();

<?php
// ============================================
// 8. EXAMPLE: Pagination in Controller
// ============================================
?>

use App\Models\JobPosting;

public function careers()
{
    $jobs = JobPosting::where('is_active', true)
        ->where('status', 'open')
        ->orderBy('created_at', 'desc')
        ->paginate(12); // 12 jobs per page
    
    return view('careers', compact('jobs'));
}

// In Blade template:
@foreach($jobs as $job)
    {{-- display job --}}
@endforeach

{{ $jobs->links() }} {{-- pagination links --}}

<?php
// ============================================
// 9. EXAMPLE: Creating Seeders
// ============================================
?>

// Create seeder: php artisan make:seeder FeatureSeeder

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    public function run(): void
    {
        Feature::create([
            'feature_name' => 'Talent Hub',
            'icon_class' => 'fas fa-user-tie',
            'description' => 'Create job postings and manage hiring pipeline.',
            'sort_order' => 1,
            'is_active' => true
        ]);
        
        Feature::create([
            'feature_name' => 'Pay Pulse',
            'icon_class' => 'fas fa-file-invoice-dollar',
            'description' => 'Automated payroll processing.',
            'sort_order' => 2,
            'is_active' => true
        ]);
        
        // ... more features
    }
}

// Then run: php artisan db:seed --class=FeatureSeeder

<?php
// ============================================
// 10. EXAMPLE: Custom Scopes
// ============================================
?>

// In Model (app/Models/Feature.php):

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    // ... other code ...
    
    // Create a scope for active features
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
    
    // Create a scope for sorted features
    public function scopeSorted($query)
    {
        return $query->orderBy('sort_order');
    }
}

// Usage in controller:
$features = Feature::active()->sorted()->get();

<?php
// ============================================
// 11. EXAMPLE: API Endpoint (Optional)
// ============================================
?>

// In routes/api.php or within your API:

use App\Models\Feature;
use App\Models\JobPosting;

Route::get('/api/features', function() {
    return Feature::active()->sorted()->get();
});

Route::get('/api/jobs', function() {
    return JobPosting::where('is_active', true)
        ->where('status', 'open')
        ->sorted()
        ->get();
});

// Usage:
// GET /api/features returns JSON array of features

<?php
// ============================================
// 12. EXAMPLE: Batch Operations
// ============================================
?>

use App\Models\JobPosting;

// Deactivate all closed jobs
JobPosting::where('status', 'closed')->update(['is_active' => false]);

// Update applicant count for all open jobs
JobPosting::where('status', 'open')->increment('applicants_count');

// Delete old job postings (over 6 months)
JobPosting::where('created_at', '<', now()->subMonths(6))->delete();

<?php
// ============================================
// VALIDATION EXAMPLES
// ============================================
?>

// In Controller:

$validated = $request->validate([
    'feature_name' => 'required|string|max:255',
    'icon_class' => 'nullable|string',
    'description' => 'required|string',
    'sort_order' => 'required|integer|min:0',
]);

$validated = $request->validate([
    'job_title' => 'required|string|max:255',
    'department' => 'required|string',
    'status' => 'required|in:open,closed,filled',
    'applicants_count' => 'required|integer|min:0',
    'location' => 'nullable|string',
]);

?>
