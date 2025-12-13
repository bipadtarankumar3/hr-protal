{{-- frontend/home.blade.php --}}
@extends('frontend.layouts.app')

@section('title', 'RYDZAA HRMS - Home')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4">Revolutionizing HR Management</h1>
                    <p class="lead mb-4">Streamline your HR processes with our comprehensive management system built for modern organizations.</p>
                    <div class="d-flex gap-3">
                        <a href="{{ URL::to('careers') }}" class="btn btn-light btn-lg">
                            <i class="fas fa-briefcase me-2"></i>View Openings
                        </a>
                        <a href="#features" class="btn btn-outline-light btn-lg">
                            <i class="fas fa-star me-2"></i>Explore Features
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="https://via.placeholder.com/600x400" alt="HR Management" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="section-padding bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-3">Comprehensive HR Solutions</h2>
                <p class="text-muted">Everything you need to manage your workforce efficiently</p>
            </div>
            
            <div class="row g-4">
                <!-- Feature 1 -->
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm card-hover">
                        <div class="card-body text-center p-4">
                            <div class="icon-box mb-4">
                                <i class="fas fa-user-tie fa-3x text-primary"></i>
                            </div>
                            <h4 class="card-title">Talent Hub</h4>
                            <p class="card-text">Create job postings, track candidates, and manage hiring pipeline seamlessly.</p>
                        </div>
                    </div>
                </div>
                
                <!-- Feature 2 -->
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm card-hover">
                        <div class="card-body text-center p-4">
                            <div class="icon-box mb-4">
                                <i class="fas fa-handshake fa-3x text-success"></i>
                            </div>
                            <h4 class="card-title">Onboard Pro</h4>
                            <p class="card-text">Automated onboarding with KYC verification and document management.</p>
                        </div>
                    </div>
                </div>
                
                <!-- Feature 3 -->
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm card-hover">
                        <div class="card-body text-center p-4">
                            <div class="icon-box mb-4">
                                <i class="fas fa-file-invoice-dollar fa-3x text-warning"></i>
                            </div>
                            <h4 class="card-title">Pay Pulse</h4>
                            <p class="card-text">Automated payroll processing with payslip generation and tax compliance.</p>
                        </div>
                    </div>
                </div>
                
                <!-- Feature 4 -->
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm card-hover">
                        <div class="card-body text-center p-4">
                            <div class="icon-box mb-4">
                                <i class="fas fa-calendar-alt fa-3x text-info"></i>
                            </div>
                            <h4 class="card-title">Leave Track</h4>
                            <p class="card-text">Manage leave applications, approvals, and attendance synchronization.</p>
                        </div>
                    </div>
                </div>
                
                <!-- Feature 5 -->
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm card-hover">
                        <div class="card-body text-center p-4">
                            <div class="icon-box mb-4">
                                <i class="fas fa-project-diagram fa-3x text-danger"></i>
                            </div>
                            <h4 class="card-title">Project Desk</h4>
                            <p class="card-text">Assign and track projects with resource allocation and monitoring.</p>
                        </div>
                    </div>
                </div>
                
                <!-- Feature 6 -->
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm card-hover">
                        <div class="card-body text-center p-4">
                            <div class="icon-box mb-4">
                                <i class="fas fa-chart-line fa-3x text-purple"></i>
                            </div>
                            <h4 class="card-title">Analytics & Reports</h4>
                            <p class="card-text">Comprehensive dashboards and reports for data-driven decisions.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="bg-primary text-white section-padding">
        <div class="container text-center">
            <h2 class="display-5 fw-bold mb-4">Ready to Transform Your HR Processes?</h2>
            <p class="lead mb-4">Join leading companies using RYDZAA HRMS to streamline their operations.</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="{{ URL::to('careers') }}" class="btn btn-light btn-lg">
                    <i class="fas fa-user-plus me-2"></i>Join Our Team
                </a>
                <a href="#contact" class="btn btn-outline-light btn-lg">
                    <i class="fas fa-envelope me-2"></i>Contact Us
                </a>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="section-padding">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-3">Get In Touch</h2>
                <p class="text-muted">Have questions? We'd love to hear from you.</p>
            </div>
            
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="card shadow-sm border-0">
                        <div class="card-body p-4">
                            <form id="contactForm">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" id="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="subject" class="form-label">Subject</label>
                                    <input type="text" class="form-control" id="subject" required>
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea class="form-control" id="message" rows="4" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fas fa-paper-plane me-2"></i>Send Message
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Contact form submission
        $('#contactForm').submit(function(e) {
            e.preventDefault();
            alert('Thank you for your message! We will get back to you soon.');
            $(this).trigger('reset');
        });
    });
</script>
@endpush