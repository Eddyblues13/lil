<?php

namespace App\Http\Controllers\User;

use App\Models\Withdrawal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class WithdrawController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $balance = $user->balance; // Assuming you have a balance column in your users table

        return view('user.withdrawal', [
            'balance' => $balance
        ]);
    }

    public function submitWithdrawal(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:10',
            'payment_method' => 'required|in:bank,paypal,crypto',
            'password' => 'required',
        ]);

        $user = Auth::user();

        // Verify password
        if (!Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Incorrect password. Please try again.');
        }

        // Check if user has sufficient balance
        if ($request->amount > $user->balance) {
            return back()->with('error', 'Insufficient balance for this withdrawal.');
        }

        // Additional validation based on payment method
        if ($request->payment_method == 'bank' && empty($request->bank_account)) {
            return back()->with('error', 'Please provide your bank account details.');
        }

        if ($request->payment_method == 'crypto' && empty($request->wallet_address)) {
            return back()->with('error', 'Please provide your wallet address.');
        }

        // Create withdrawal record
        $withdrawal = new Withdrawal();
        $withdrawal->user_id = $user->id;
        $withdrawal->amount = $request->amount;
        $withdrawal->payment_method = $request->payment_method;

        // Store additional details based on payment method
        if ($request->payment_method == 'bank') {
            $withdrawal->details = $request->bank_account;
        } elseif ($request->payment_method == 'crypto') {
            $withdrawal->details = json_encode([
                'wallet_address' => $request->wallet_address,
                'crypto_type' => $request->crypto_type
            ]);
        }

        $withdrawal->save();

        // Deduct from user balance (you might want to do this after approval)
        // $user->balance -= $request->amount;
        // $user->save();

        return back()->with('success', 'Withdrawal request submitted successfully. It will be processed within 24-48 hours.');
    }
}
