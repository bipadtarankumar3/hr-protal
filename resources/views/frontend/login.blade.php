@extends('frontend.layouts.app')

@section('title', 'Login - HR Portal')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css">
@endpush

@section('content')
<section class="log_in_area my-4">
    <div class="login_frm_container">
        <div class="login_frm_header mb-4">
            <h2 class="login_frm_title">Welcome Back</h2>
            <p class="text-muted mb-0">Sign in to access your HR Portal</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="ri ri-check-line me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="ri ri-error-warning-line me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" id="loginForm" novalidate>
            @csrf

            <!-- Email Field -->
            <div class="mb-3">
                <label for="email" class="form-label">
                    <i class="ri ri-mail-line me-1"></i>Email Address
                </label>
                <input 
                    type="email" 
                    class="form-control @error('email') is-invalid @enderror" 
                    id="email" 
                    name="email" 
                    placeholder="Enter your email address"
                    value="{{ old('email') }}"
                    required
                    autocomplete="email"
                    autofocus
                >
                @error('email')
                    <div class="invalid-feedback">
                        <i class="ri ri-error-warning-line me-1"></i>{{ $message }}
                    </div>
                @enderror
                <div class="form-text">We'll never share your email with anyone else.</div>
            </div>

            <!-- Password Field -->
            <div class="mb-3">
                <label for="password" class="form-label">
                    <i class="ri ri-lock-line me-1"></i>Password
                </label>
                <div class="input-group">
                    <input 
                        type="password" 
                        class="form-control @error('password') is-invalid @enderror" 
                        id="password" 
                        name="password" 
                        placeholder="Enter your password"
                        required
                        autocomplete="current-password"
                    >
                    <button 
                        class="btn btn-outline-secondary" 
                        type="button" 
                        id="togglePassword"
                        title="Show/Hide Password"
                    >
                        <i class="ri ri-eye-line" id="eyeIcon"></i>
                    </button>
                </div>
                @error('password')
                    <div class="invalid-feedback d-block">
                        <i class="ri ri-error-warning-line me-1"></i>{{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="mb-3 d-flex justify-content-between align-items-center">
                <div class="form-check">
                    <input 
                        class="form-check-input" 
                        type="checkbox" 
                        name="remember" 
                        id="remember" 
                        {{ old('remember') ? 'checked' : '' }}
                    >
                    <label class="form-check-label" for="remember">
                        Remember me
                    </label>
                </div>
                <a href="#" class="text-decoration-none" id="forgotPasswordLink">
                    Forgot password?
                </a>
            </div>

            <!-- Submit Button -->
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary btn-lg" id="loginBtn">
                    <i class="ri ri-login-box-line me-2"></i>
                    <span id="loginBtnText">Sign In</span>
                    <span class="spinner-border spinner-border-sm d-none" id="loginSpinner" role="status" aria-hidden="true"></span>
                </button>
            </div>

            <!-- Additional Links -->
            <div class="mt-4 text-center">
                <p class="text-muted mb-0">
                    Don't have an account? 
                    <a href="#" class="text-decoration-none">Contact Administrator</a>
                </p>
            </div>
        </form>

        <!-- Forgot Password Modal (Optional) -->
        <div class="modal fade" id="forgotPasswordModal" tabindex="-1" aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="forgotPasswordModalLabel">
                            <i class="ri ri-lock-password-line me-2"></i>Reset Password
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="text-muted">Please contact your system administrator to reset your password.</p>
                        <div class="alert alert-info">
                            <i class="ri ri-information-line me-2"></i>
                            <strong>Note:</strong> Password reset functionality will be available soon.
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const loginForm = document.getElementById('loginForm');
        const loginBtn = document.getElementById('loginBtn');
        const loginBtnText = document.getElementById('loginBtnText');
        const loginSpinner = document.getElementById('loginSpinner');
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');
        const forgotPasswordLink = document.getElementById('forgotPasswordLink');
        const forgotPasswordModal = new bootstrap.Modal(document.getElementById('forgotPasswordModal'));

        // Toggle password visibility
        if (togglePassword) {
            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                
                if (type === 'password') {
                    eyeIcon.classList.remove('ri-eye-off-line');
                    eyeIcon.classList.add('ri-eye-line');
                } else {
                    eyeIcon.classList.remove('ri-eye-line');
                    eyeIcon.classList.add('ri-eye-off-line');
                }
            });
        }

        // Forgot password link
        if (forgotPasswordLink) {
            forgotPasswordLink.addEventListener('click', function(e) {
                e.preventDefault();
                forgotPasswordModal.show();
            });
        }

        // Form submission with loading state
        if (loginForm) {
            loginForm.addEventListener('submit', function(e) {
                // Basic validation
                if (!loginForm.checkValidity()) {
                    e.preventDefault();
                    e.stopPropagation();
                    loginForm.classList.add('was-validated');
                    return false;
                }

                // Show loading state
                loginBtn.disabled = true;
                loginBtnText.textContent = 'Signing in...';
                loginSpinner.classList.remove('d-none');
            });
        }

        // Auto-hide alerts after 5 seconds
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);
    });
</script>
@endpush

@push('styles')
<style>
    .log_in_area {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 60vh;
    }

    .login_frm_container {
        max-width: 450px;
        width: 100%;
        padding: 2rem;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .login_frm_header {
        text-align: center;
    }

    .login_frm_title {
        font-size: 1.75rem;
        font-weight: 600;
        color: #333;
        margin-bottom: 0.5rem;
    }

    .form-label {
        font-weight: 500;
        color: #495057;
        margin-bottom: 0.5rem;
    }

    .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
    }

    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        padding: 0.75rem 1.5rem;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
    }

    .btn-primary:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none;
    }

    .input-group .btn-outline-secondary {
        border-left: none;
    }

    .input-group .form-control:focus + .btn-outline-secondary {
        border-color: #0d6efd;
    }

    @media (max-width: 576px) {
        .login_frm_container {
            padding: 1.5rem;
            margin: 1rem;
        }
    }
</style>
@endpush
@endsection