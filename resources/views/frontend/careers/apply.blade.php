{{-- frontend/career/apply.blade.php --}}
@extends('frontend.layouts.app')

@section('title', 'Apply for Position')

@section('content')
    <!-- Application Form -->
    <section class="section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-primary text-white">
                            <h4 class="mb-0">
                                <i class="fas fa-user-edit me-2"></i>
                                Application Form - {{ $jobTitle ?? 'Senior Backend Developer' }}
                            </h4>
                        </div>
                        <div class="card-body">
                            <form id="applicationForm" method="POST" action="{{ URL::to('career.submit') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="job_id" value="{{ $jobId ?? 'DEV001' }}">
                                
                                <!-- Personal Information -->
                                <div class="mb-5">
                                    <h5 class="border-bottom pb-2 mb-4">
                                        <i class="fas fa-user-circle me-2"></i>Personal Information
                                    </h5>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="full_name" class="form-label">Full Name *</label>
                                            <input type="text" class="form-control" id="full_name" name="full_name" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="dob" class="form-label">Date of Birth *</label>
                                            <input type="date" class="form-control" id="dob" name="dob" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="email" class="form-label">Email Address *</label>
                                            <input type="email" class="form-control" id="email" name="email" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="phone" class="form-label">Mobile Number *</label>
                                            <input type="tel" class="form-control" id="phone" name="phone" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="pan" class="form-label">PAN Number *</label>
                                            <input type="text" class="form-control" id="pan" name="pan" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="aadhaar" class="form-label">Aadhaar Number *</label>
                                            <input type="text" class="form-control" id="aadhaar" name="aadhaar" required>
                                        </div>
                                    </div>
                                </div>

                                <!-- Education -->
                                <div class="mb-5">
                                    <h5 class="border-bottom pb-2 mb-4">
                                        <i class="fas fa-graduation-cap me-2"></i>Education
                                    </h5>
                                    <div id="education-section">
                                        <div class="education-entry mb-3">
                                            <div class="row g-3">
                                                <div class="col-md-4">
                                                    <label class="form-label">Level *</label>
                                                    <select class="form-select" name="education[0][level]" required>
                                                        <option value="">Select Level</option>
                                                        <option value="10th">Class 10</option>
                                                        <option value="12th">Class 12</option>
                                                        <option value="bachelors">Bachelor's Degree</option>
                                                        <option value="masters">Master's Degree</option>
                                                        <option value="phd">PhD</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Institution *</label>
                                                    <input type="text" class="form-control" name="education[0][institution]" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Year of Passing *</label>
                                                    <input type="number" class="form-control" name="education[0][year]" min="1900" max="{{ date('Y') }}" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-outline-primary btn-sm" onclick="addEducation()">
                                        <i class="fas fa-plus me-1"></i>Add Education
                                    </button>
                                </div>

                                <!-- Experience -->
                                <div class="mb-5">
                                    <h5 class="border-bottom pb-2 mb-4">
                                        <i class="fas fa-briefcase me-2"></i>Experience
                                    </h5>
                                    <div id="experience-section">
                                        <div class="experience-entry mb-3">
                                            <div class="row g-3">
                                                <div class="col-md-4">
                                                    <label class="form-label">Company *</label>
                                                    <input type="text" class="form-control" name="experience[0][company]" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Designation *</label>
                                                    <input type="text" class="form-control" name="experience[0][designation]" required>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="form-label">From Date *</label>
                                                    <input type="date" class="form-control" name="experience[0][from_date]" required>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="form-label">To Date *</label>
                                                    <input type="date" class="form-control" name="experience[0][to_date]" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-outline-primary btn-sm" onclick="addExperience()">
                                        <i class="fas fa-plus me-1"></i>Add Experience
                                    </button>
                                </div>

                                <!-- Additional Information -->
                                <div class="mb-5">
                                    <h5 class="border-bottom pb-2 mb-4">
                                        <i class="fas fa-info-circle me-2"></i>Additional Information
                                    </h5>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="referral_source" class="form-label">How did you hear about this job? *</label>
                                            <select class="form-select" id="referral_source" name="referral_source" required>
                                                <option value="">Select Source</option>
                                                <option value="career_portal">RYDZAA Career Portal</option>
                                                <option value="naukri">Naukri</option>
                                                <option value="linkedin">LinkedIn</option>
                                                <option value="internal_referral">Internal Referral</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="referred_by" class="form-label">If referred, by whom?</label>
                                            <input type="text" class="form-control" id="referred_by" name="referred_by">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="country_citizenship" class="form-label">Country of Citizenship *</label>
                                            <select class="form-select" id="country_citizenship" name="country_citizenship" required>
                                                <option value="india">India</option>
                                                <option value="usa">United States</option>
                                                <option value="uk">United Kingdom</option>
                                                <!-- Add more countries as needed -->
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="us_citizen" class="form-label">Are you a U.S. citizen? *</label>
                                            <select class="form-select" id="us_citizen" name="us_citizen" required>
                                                <option value="no">No</option>
                                                <option value="yes">Yes</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="visa_sponsorship" class="form-label">Do you require visa sponsorship? *</label>
                                            <select class="form-select" id="visa_sponsorship" name="visa_sponsorship" required>
                                                <option value="no">No</option>
                                                <option value="yes">Yes</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="current_visa" class="form-label">Current Visa Type (if applicable)</label>
                                            <input type="text" class="form-control" id="current_visa" name="current_visa">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="disability" class="form-label">Do you have any disability that requires workplace accommodation? *</label>
                                            <select class="form-select" id="disability" name="disability" required>
                                                <option value="no">No</option>
                                                <option value="yes">Yes</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="accommodation_needs" class="form-label">If yes, specify accommodation needs</label>
                                            <textarea class="form-control" id="accommodation_needs" name="accommodation_needs" rows="2"></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="gender" class="form-label">Gender</label>
                                            <select class="form-select" id="gender" name="gender">
                                                <option value="">Prefer not to say</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="ethnicity" class="form-label">Ethnicity</label>
                                            <select class="form-select" id="ethnicity" name="ethnicity">
                                                <option value="">Prefer not to say</option>
                                                <option value="asian">Asian</option>
                                                <option value="african">African</option>
                                                <option value="caucasian">Caucasian</option>
                                                <option value="hispanic">Hispanic</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Legal Declarations -->
                                <div class="mb-5">
                                    <h5 class="border-bottom pb-2 mb-4">
                                        <i class="fas fa-balance-scale me-2"></i>Legal Declarations
                                    </h5>
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="legal_work" name="legal_work" required>
                                                <label class="form-check-label" for="legal_work">
                                                    Are you legally eligible to work in India? *
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="worked_before" name="worked_before">
                                                <label class="form-check-label" for="worked_before">
                                                    Have you worked with RYDZAA or its affiliates before?
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="criminal_offense" name="criminal_offense" required>
                                                <label class="form-check-label" for="criminal_offense">
                                                    Have you ever been convicted of a criminal offense? *
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="criminal_details" class="form-label">If yes, please specify:</label>
                                            <textarea class="form-control" id="criminal_details" name="criminal_details" rows="2"></textarea>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="arrested" name="arrested">
                                                <label class="form-check-label" for="arrested">
                                                    Have you been arrested or detained by law enforcement?
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="government_work" name="government_work">
                                                <label class="form-check-label" for="government_work">
                                                    Have you ever worked for a government agency or PSU?
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="legal_proceedings" name="legal_proceedings">
                                                <label class="form-check-label" for="legal_proceedings">
                                                    Are you currently under any legal proceedings or investigation?
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Resume Upload -->
                                <div class="mb-5">
                                    <h5 class="border-bottom pb-2 mb-4">
                                        <i class="fas fa-file-upload me-2"></i>Resume Upload
                                    </h5>
                                    <div class="mb-3">
                                        <label for="resume" class="form-label">Upload Resume (PDF/DOC/DOCX) *</label>
                                        <input type="file" class="form-control" id="resume" name="resume" accept=".pdf,.doc,.docx" required>
                                        <div class="form-text">Maximum file size: 5MB</div>
                                    </div>
                                </div>

                                <!-- Consents -->
                                <div class="mb-5">
                                    <h5 class="border-bottom pb-2 mb-4">
                                        <i class="fas fa-handshake me-2"></i>Consents & Authorizations
                                    </h5>
                                    <div class="consent-section">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" id="consent_data" name="consent_data" required>
                                            <label class="form-check-label" for="consent_data">
                                                I Consent to RYDZAA India Mobility Pvt Ltd. collecting and processing my personal data for recruitment purposes. *
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" id="consent_storage" name="consent_storage" required>
                                            <label class="form-check-label" for="consent_storage">
                                                I agree to the secure storage of my resume and identity documents for up to 12 months. *
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" id="consent_background" name="consent_background" required>
                                            <label class="form-check-label" for="consent_background">
                                                I authorize RYDZAA India Mobility Pvt Ltd. or its partners to conduct background checks as part of the hiring process. *
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" id="consent_communication" name="consent_communication" required>
                                            <label class="form-check-label" for="consent_communication">
                                                I agree to be contacted via email or phone regarding my application status. *
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-lg px-5">
                                        <i class="fas fa-paper-plane me-2"></i>Submit Application
                                    </button>
                                    <p class="text-muted mt-3">
                                        <small>* Required fields</small>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
<style>
    .consent-section .form-check-label {
        font-size: 0.9rem;
        text-align: justify;
    }
    
    .education-entry, .experience-entry {
        padding: 15px;
        background-color: #f8f9fa;
        border-radius: 5px;
        border-left: 4px solid #3498db;
    }
</style>
@endpush

@push('scripts')
<script>
    let educationCount = 1;
    let experienceCount = 1;
    
    function addEducation() {
        const section = document.getElementById('education-section');
        const newEntry = document.createElement('div');
        newEntry.className = 'education-entry mb-3';
        newEntry.innerHTML = `
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">Level *</label>
                    <select class="form-select" name="education[${educationCount}][level]" required>
                        <option value="">Select Level</option>
                        <option value="10th">Class 10</option>
                        <option value="12th">Class 12</option>
                        <option value="bachelors">Bachelor's Degree</option>
                        <option value="masters">Master's Degree</option>
                        <option value="phd">PhD</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Institution *</label>
                    <input type="text" class="form-control" name="education[${educationCount}][institution]" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Year of Passing *</label>
                    <input type="number" class="form-control" name="education[${educationCount}][year]" min="1900" max="${new Date().getFullYear()}" required>
                </div>
            </div>
            <div class="mt-2 text-end">
                <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeEntry(this)">
                    <i class="fas fa-times me-1"></i>Remove
                </button>
            </div>
        `;
        section.appendChild(newEntry);
        educationCount++;
    }
    
    function addExperience() {
        const section = document.getElementById('experience-section');
        const newEntry = document.createElement('div');
        newEntry.className = 'experience-entry mb-3';
        newEntry.innerHTML = `
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">Company *</label>
                    <input type="text" class="form-control" name="experience[${experienceCount}][company]" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Designation *</label>
                    <input type="text" class="form-control" name="experience[${experienceCount}][designation]" required>
                </div>
                <div class="col-md-2">
                    <label class="form-label">From Date *</label>
                    <input type="date" class="form-control" name="experience[${experienceCount}][from_date]" required>
                </div>
                <div class="col-md-2">
                    <label class="form-label">To Date *</label>
                    <input type="date" class="form-control" name="experience[${experienceCount}][to_date]" required>
                </div>
            </div>
            <div class="mt-2 text-end">
                <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeEntry(this)">
                    <i class="fas fa-times me-1"></i>Remove
                </button>
            </div>
        `;
        section.appendChild(newEntry);
        experienceCount++;
    }
    
    function removeEntry(button) {
        button.closest('.education-entry, .experience-entry').remove();
    }
    
    // Form validation
    document.getElementById('applicationForm').addEventListener('submit', function(e) {
        // Additional validation if needed
        const consentCheckboxes = document.querySelectorAll('.consent-section input[type="checkbox"]');
        let allConsented = true;
        
        consentCheckboxes.forEach(checkbox => {
            if (!checkbox.checked) {
                allConsented = false;
            }
        });
        
        if (!allConsented) {
            e.preventDefault();
            alert('Please check all consent checkboxes before submitting.');
        }
    });
</script>
@endpush