<?php

namespace App\Http\Controllers\User;

use App\Models\Deposit;
use App\Models\WalletOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DepositController extends Controller
{
    public function create()
    {
        // Get all active wallet options
        $walletOptions = WalletOption::get();

        return view('user.deposit', [
            'walletOptions' => $walletOptions
        ]);
    }

    /**
     * Process the deposit submission
     */
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'amount' => 'required|numeric|min:10', // Minimum deposit of 10
            'wallet_id' => 'required|exists:wallet_options,id',
            'transaction_id' => 'required|string|max:255',
            'proof' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048' // 2MB max
        ]);

        try {
            // Store the proof file
            $proofPath = $request->file('proof')->store('deposit_proofs', 'public');

            // Create the deposit record
            $deposit = Deposit::create([
                'user_id' => Auth::id(),
                'wallet_id' => $validated['wallet_id'],
                'amount' => $validated['amount'],
                'transaction_id' => $validated['transaction_id'],
                'proof_path' => $proofPath,
                'status' => 'pending',
                'currency' => Auth::user()->currency
            ]);

            // You might want to notify admin here
            // $this->notifyAdminAboutNewDeposit($deposit);

            return redirect()->route('deposit.create')
                ->with('success', 'Deposit submitted successfully! We will process it shortly.');
        } catch (\Exception $e) {
            // Log the error
            Log::error('Deposit submission error: ' . $e->getMessage());

            return back()->withInput()
                ->with('error', 'Something went wrong. Please try again.');
        }
    }

    /**
     * Show user's deposit history
     */
    public function history()
    {
        $deposits = Deposit::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('deposit-history', [
            'deposits' => $deposits
        ]);
    }

    /**
     * Helper method to notify admin about new deposit
     */
    protected function notifyAdminAboutNewDeposit(Deposit $deposit)
    {
        // Implement your notification logic here
        // This could be an email, database notification, etc.
    }
}
