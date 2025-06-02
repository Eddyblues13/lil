<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\VerificationEmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Show the registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        $countries = [
            'United States',
            'Canada',
            'United Kingdom',
            'Australia',
            'Germany',
            'France',
            'Japan',
            'China',
            'India',
            'Brazil',
            'Nigeria',
            'South Africa'
        ];

        $currencies = [
            'USD' => 'US Dollar',
            'EUR' => 'Euro',
            'GBP' => 'British Pound',
            'JPY' => 'Japanese Yen',
            'CAD' => 'Canadian Dollar',
            'AUD' => 'Australian Dollar',
            'CNY' => 'Chinese Yuan',
        ];

        return view('auth.register', [
            'countries' => $countries,
            'currencies' => $currencies
        ]);
    }

    /**
     * Handle the registration form submission.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:50',
            'middle_name' => 'nullable|string|max:50',
            'last_name' => 'required|string|max:50',
            'username' => 'required|string|max:30|unique:users,username',
            'email' => 'required|string|email|max:100|unique:users,email',
            'password' => 'required|string|min:4|confirmed',
            'occupation' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
            'country' => 'required|string',
            'city' => 'required|string|max:100',
            'currency' => 'required|string',
            'gender' => 'required|in:male,female,other',
            'marital_status' => 'required|in:single,married,divorced,widowed',
            'address' => 'required|string|max:255',
            'terms' => 'required|accepted',
        ], [
            'username.regex' => 'Username may only contain letters, numbers, and underscores.',
            'terms.required' => 'You must accept the terms and conditions.',
            'password.confirmed' => 'The password confirmation does not match.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Create the user
        try {
            $user = new User();
            $user->first_name = $request->first_name;
            $user->middle_name = $request->middle_name;
            $user->last_name = $request->last_name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->occupation = $request->occupation;
            $user->phone_number = $request->phone;
            $user->country_code = $request->country;
            $user->city = $request->city;
            $user->currency_code = $request->currency;
            $user->gender = $request->gender;
            $user->marital_status = $request->marital_status;
            $user->address = $request->address;
            $user->save();

            // You might want to send a verification email here
            // event(new Registered($user));

            Auth::login($user);

            return response()->json([
                'success' => true,
                'message' => 'Registration successful! Redirecting to login...',
                'redirect' => route('home')
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Registration failed. Please try again later.'
            ], 500);
        }
    }
}
