<?php

namespace App\Http\Controllers\User;

use App\Models\Deposit;
use App\Models\Earning;
use App\Models\Withdrawal;
use App\Models\PlanHistory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();


        $data['user'] = Auth::user();
        $data['total_earning'] = Earning::where('user_id', $user->id)->sum('amount') ?? 0;
        $data['total_invested'] = PlanHistory::where('user_id', $user->id)->sum('amount') ?? 0;
        $data['total_withdrawal'] = Withdrawal::where('user_id', $user->id)->sum('amount') ?? 0;
        $data['total_deposit'] = Deposit::where('user_id', $user->id)
            ->sum('amount') ?? 0;
        $last_withdrawal = Withdrawal::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->first();

        $data['last_withdrawal_sum'] = $last_withdrawal ? $last_withdrawal->amount : 0;



        // Total sum of all balances
        $data['total_balance'] =
            ($data['total_earning'] ?? 0) +
            ($data['total_deposit'] ?? 0) -
            ($data['total_withdrawal'] ?? 0) -
            ($data['total_invested'] ?? 0);


        return view('user.home', $data);
    }
}
