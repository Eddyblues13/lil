<?php

namespace App\Http\Controllers\User;

use App\Models\Plan;
use App\Models\PlanHistory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class InvestController extends Controller
{
    // Show investment plans page
    public function index()
    {
        $plans = Plan::all();
        $planHistories = PlanHistory::where('user_id', Auth::id())
            ->with('plan') // eager load related Plan
            ->latest()
            ->get();
        return view('user.plan', compact('plans', 'planHistories'));
    }

    // Handle investment submission
    public function invest(Request $request)
    {
        $request->validate([
            'plan_id' => 'required|exists:plans,id',
            'account_type' => 'required|in:holding,staking,trading'
        ]);

        $plan = Plan::findOrFail($request->plan_id);

        // Check if user has sufficient balance (you'll need to implement this)
        // if (Auth::user()->balance < $plan->price) {
        //     return back()->with('error', 'Insufficient balance');
        // }

        // Create plan history record
        PlanHistory::create([
            'user_id' => Auth::id(),
            'plan_id' => $plan->id,
            'amount' => $plan->price,
            'account_type' => $request->account_type
        ]);

        // Deduct from user balance (you'll need to implement this)
        // Auth::user()->decrement('balance', $plan->price);

        return redirect()->back()->with('success', 'Investment successful!');
    }
}
