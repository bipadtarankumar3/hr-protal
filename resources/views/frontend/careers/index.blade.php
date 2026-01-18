{{-- frontend/career/index.blade.php --}}
@extends('frontend.layouts.app')

@section('title', 'Careers at RYDZAA')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section bg-primary text-white">
        <div class="container">
            <div class="text-center">
                <h1 class="display-4 fw-bold mb-3">Join Our Team</h1>
                <p class="lead mb-4">Be part of something amazing. Explore opportunities to grow with us.</p>
                <a href="#openings" class="btn btn-light btn-lg">
                    <i class="fas fa-arrow-down me-2"></i>View Open Positions
                </a>
            </div>
        </div>
    </section>

    <!-- Job Openings Section -->
    <section id="openings" class="section-padding">
        <div class="container">
            <!-- Filters -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label for="department" class="form-label">Department</label>
                                    <select class="form-select" id="department">
                                        <option value="">All Departments</option>
                                        <option value="Tech">Technology</option>
                                        <option value="Ops">Operations</option>
                                        <option value="Support">Support</option>
                                        <option value="Finance">Finance</option>
                                        <option value="HR">Human Resources</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="location" class="form-label">Location</label>
                                    <select class="form-select" id="location">
                                        <option value="">All Locations</option>
                                        <option value="Durgapur">Durgapur</option>
                                        <option value="Kolkata">Kolkata</option>
                                        <option value="Remote">Remote</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="experience" class="form-label">Experience</label>
                                    <select class="form-select" id="experience">
                                        <option value="">All Levels</option>
                                        <option value="Fresher">Fresher</option>
                                        <option value="Experienced">Experienced</option>
                                    </select>
                                </div>
                                <div class="col-md-3 d-flex align-items-end">
                                    <button class="btn btn-primary w-100" onclick="filterJobs()">
                                        <i class="fas fa-filter me-2"></i>Filter Jobs
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Job Listings -->
            <div class="row g-4" id="jobListings">
                @forelse($jobs as $job)
                <!-- Job Card -->
                <div class="col-md-6 col-lg-4 job-card" data-department="{{ $job->department }}" data-location="{{ $job->location }}" data-experience="">
                    <div class="card h-100 border-0 shadow-sm card-hover">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <span class="badge bg-primary">{{ $job->department }}</span>
                                <span class="badge bg-secondary">{{ $job->location ?? 'Various' }}</span>
                            </div>
                            <h4 class="card-title">{{ $job->job_title }}</h4>
                            <p class="card-text text-muted mb-3">{{ Str::limit($job->description, 80) ?? 'Join our team to make an impact...' }}</p>
                            <div class="job-details mb-3">
                                <p class="mb-1"><i class="fas fa-briefcase me-2"></i>{{ $job->job_type ?? 'Full-time' }}</p>
                                <p class="mb-0"><i class="fas fa-users me-2"></i>{{ $job->applicants_count }} applicants</p>
                            </div>
                            <a href="{{ URL::to('careers/apply/' . $job->id) }}" class="btn btn-primary w-100">
                                Apply Now
                            </a>
                        </div>
                        <div class="card-footer bg-transparent border-top-0">
                            <small class="text-muted"><i class="fas fa-clock me-1"></i>{{ $job->created_at->diffForHumans() }}</small>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        No job openings available at the moment. Please check back soon!
                    </div>
                </div>
                @endforelse
            </div>

            <!-- No Results Message -->
            <div id="noResults" class="text-center mt-5" style="display: none;">
                <i class="fas fa-search fa-3x text-muted mb-3"></i>
                <h4>No Jobs Found</h4>
                <p class="text-muted">Try adjusting your filters to find more opportunities.</p>
            </div>
        </div>
    </section>

    <!-- Why Join Us Section -->
    <section class="bg-light section-padding">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-3">Why Join RYDZAA?</h2>
                <p class="text-muted">Discover what makes us a great place to work</p>
            </div>
            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="text-center p-4">
                        <div class="icon-box mb-3">
                            <i class="fas fa-rocket fa-3x text-primary"></i>
                        </div>
                        <h5>Growth Opportunities</h5>
                        <p class="text-muted">Continuous learning and career advancement programs.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center p-4">
                        <div class="icon-box mb-3">
                            <i class="fas fa-handshake fa-3x text-success"></i>
                        </div>
                        <h5>Inclusive Culture</h5>
                        <p class="text-muted">Diverse and inclusive workplace that values every individual.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center p-4">
                        <div class="icon-box mb-3">
                            <i class="fas fa-balance-scale fa-3x text-warning"></i>
                        </div>
                        <h5>Work-Life Balance</h5>
                        <p class="text-muted">Flexible working hours and remote work options.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    function filterJobs() {
        const department = document.getElementById('department').value;
        const location = document.getElementById('location').value;
        const experience = document.getElementById('experience').value;
        
        const jobCards = document.querySelectorAll('.job-card');
        let visibleCount = 0;
        
        jobCards.forEach(card => {
            const cardDept = card.getAttribute('data-department');
            const cardLoc = card.getAttribute('data-location');
            const cardExp = card.getAttribute('data-experience');
            
            const deptMatch = !department || cardDept === department;
            const locMatch = !location || cardLoc === location;
            const expMatch = !experience || cardExp === experience;
            
            if (deptMatch && locMatch && expMatch) {
                card.style.display = 'block';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });
        
        // Show/hide no results message
        const noResults = document.getElementById('noResults');
        if (visibleCount === 0) {
            noResults.style.display = 'block';
        } else {
            noResults.style.display = 'none';
        }
    }
</script>
@endpush