<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Deposit;
use App\Models\Earning;
use App\Models\Withdrawal;
use App\Models\User\Profit;
use Illuminate\Http\Request;
use App\Models\User\MiningBalance;
use App\Models\User\HoldingBalance;
use App\Models\User\StakingBalance;
use App\Models\User\TradingBalance;
use App\Http\Controllers\Controller;
use App\Models\User\ReferralBalance;
use Illuminate\Support\Facades\Mail;
use App\Mail\TransactionNotificationMail;

class BalanceController extends Controller
{
    // Update Holding Balance
    public function updateEarningBalance(Request $request)
    {
        $holdingBalance = Earning::firstOrCreate(['user_id' => $request->user_id]);

        // Determine transaction type
        $transactionType = $request->type === 'credit' ? 'Credit' : 'Debit';

        // Update balance
        if ($request->type === 'credit') {
            $holdingBalance->increment('amount', $request->amount);
        } else {
            $holdingBalance->decrement('amount', $request->amount);
        }

        // Send transaction email
        // $this->sendTransactionEmail(
        //     $request->user_id, // User ID
        //     $transactionType,  // Transaction type (Credit/Debit)
        //     $request->amount,  // Amount
        //     'Earning Balance' // Transaction category
        // );

        return redirect()->back()->with('success', 'Earning updated successfully.');
    }

    public function updateDepositBalance(Request $request)
    {
        $depositBalance = Deposit::firstOrCreate(['user_id' => $request->user_id]);

        // Determine transaction type
        $transactionType = $request->type === 'credit' ? 'Credit' : 'Debit';

        // Update balance
        if ($request->type === 'credit') {
            $depositBalance->increment('amount', $request->amount);
        } else {
            $depositBalance->decrement('amount', $request->amount);
        }

        // Optional: Send transaction email
        // $this->sendTransactionEmail(
        //     $request->user_id,   // User ID
        //     $transactionType,    // Transaction type (Credit/Debit)
        //     $request->amount,    // Amount
        //     'Deposit Balance'    // Transaction category
        // );

        return redirect()->back()->with('success', 'Deposit balance updated successfully.');
    }


    public function updateWithdrawalBalance(Request $request)
    {
        $withdrawalBalance = Withdrawal::firstOrCreate(['user_id' => $request->user_id]);

        // Determine transaction type
        $transactionType = $request->type === 'credit' ? 'Credit' : 'Debit';

        // Update balance
        if ($request->type === 'credit') {
            $withdrawalBalance->increment('amount', $request->amount);
        } else {
            $withdrawalBalance->decrement('amount', $request->amount);
        }

        // Optional: Send transaction email
        // $this->sendTransactionEmail(
        //     $request->user_id,     // User ID
        //     $transactionType,      // Transaction type (Credit/Debit)
        //     $request->amount,      // Amount
        //     'Withdrawal Balance'   // Transaction category
        // );

        return redirect()->back()->with('success', 'Withdrawal balance updated successfully.');
    }



    // Update Mining Balance

    // Send transaction email
    protected function sendTransactionEmail($userId, $transactionType, $amount, $transactionCategory)
    {
        // Find the user
        $user = User::find($userId);

        if ($user) {
            // Prepare the email details
            $name = $user->username;
            $date = now()->toDateTimeString();

            // Send the email with individual arguments
            Mail::to($user->email)->send(new TransactionNotificationMail(
                $name, // User's name
                $amount, // Transaction amount
                $transactionCategory, // Transaction category (e.g., Holding Balance)
                $transactionType, // Transaction type (Credit/Debit)
                $date // Transaction date
            ));
        }
    }
}
