<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        // Validate login credentials
        $request->validate([
            'login' => 'required|string', // Can be email or username
            'password' => 'required|string',
        ]);

        // Check rate limiting
        $throttleKey = strtolower($request->login) . '|' . $request->ip();

        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            $seconds = RateLimiter::availableIn($throttleKey);
            throw ValidationException::withMessages([
                'login' => trans('auth.throttle', [
                    'seconds' => $seconds,
                    'minutes' => ceil($seconds / 60),
                ]),
            ]);
        }

        // Attempt authentication
        $credentials = $this->getCredentials($request);
        $remember = $request->filled('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            RateLimiter::clear($throttleKey);

            // Log successful login
            Log::info('User logged in', [
                'user_id' => Auth::id(),
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent()
            ]);

            // Check if email is verified
            if (Auth::user()->verification_code !== null) {
                Auth::logout();
                return response()->json([
                    'success' => false,
                    'message' => 'Please verify your email address first.',
                    'redirect' => route('email_verify')
                ], 403);
            }

            return response()->json([
                'success' => true,
                'message' => 'Login successful!',
                'redirect' => $this->redirectPath()
            ]);
        }

        // Track failed attempts
        RateLimiter::hit($throttleKey);

        // Log failed login attempt
        Log::warning('Failed login attempt', [
            'login' => $request->login,
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent()
        ]);

        throw ValidationException::withMessages([
            'login' => trans('auth.failed'),
        ]);
    }

    /**
     * Get the login credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function getCredentials(Request $request)
    {
        $login = $request->input('login');

        return filter_var($login, FILTER_VALIDATE_EMAIL)
            ? ['email' => $login, 'password' => $request->password]
            : ['username' => $login, 'password' => $request->password];
    }

    /**
     * Get the post-login redirect path.
     *
     * @return string
     */
    protected function redirectPath()
    {
        return route('home'); // Change to your dashboard route
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        // Log logout activity
        Log::info('User logged out', [
            'user_id' => Auth::id(),
            'ip' => $request->ip()
        ]);

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json([
            'success' => true,
            'message' => 'Logged out successfully',
            'redirect' => route('login')
        ]);
    }
}
