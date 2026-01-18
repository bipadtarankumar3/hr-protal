<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Show the login form
     */
    public function showLoginForm()
    {
        // Redirect if already authenticated
        if (Auth::check()) {
            return redirect()->intended('/admin');
        }

        //  User::create([
        //     'name' => 'Admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make('123456'),
        // ]);
        
        return view('frontend.login');
    }

    /**
     * Handle login request
     */
    public function login(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ], [
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'password.required' => 'Please enter your password.',
            'password.min' => 'Password must be at least 6 characters.',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput($request->only('email'))
                ->with('error', 'Please correct the errors below.');
        }

        $credentials = $request->only('email', 'password');
        $remember = $request->filled('remember');

        // Attempt to authenticate
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            // Log the login in audit trail
            $this->logLogin($request, Auth::user());

            // Redirect based on user role or intended URL
            $intended = $request->session()->get('url.intended', '/admin');
            return redirect()->intended($intended)
                ->with('success', 'Welcome back, ' . Auth::user()->name . '!');
        }

        // Authentication failed
        return back()
            ->withErrors(['email' => 'These credentials do not match our records.'])
            ->withInput($request->only('email', 'remember'))
            ->with('error', 'Invalid email or password.');
    }

    /**
     * Handle logout request
     */
    public function logout(Request $request)
    {
        $user = Auth::user();
        
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Log the logout in audit trail
        if ($user) {
            $this->logLogout($request, $user);
        }

        return redirect('/login')
            ->with('success', 'You have been logged out successfully.');
    }

    /**
     * Log login activity
     */
    private function logLogin(Request $request, $user)
    {
        try {
            \App\Models\AuditTrail::create([
                'user_id' => $user->id,
                'action' => 'login',
                'module' => 'authentication',
                'description' => 'User logged in successfully',
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);
        } catch (\Exception $e) {
            // Silently fail if audit trail fails
        }
    }

    /**
     * Log logout activity
     */
    private function logLogout(Request $request, $user)
    {
        try {
            \App\Models\AuditTrail::create([
                'user_id' => $user->id,
                'action' => 'logout',
                'module' => 'authentication',
                'description' => 'User logged out',
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);
        } catch (\Exception $e) {
            // Silently fail if audit trail fails
        }
    }
}

