<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PlanHistory;
use App\Models\User;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlanHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $histories = PlanHistory::with(['user', 'plan'])
            ->latest()
            ->get();

        $users = User::where('status', 'active')->get(['id', 'first_name', 'last_name']);
        $plans = Plan::get(['id', 'name']);

        return view('admin.plan-histories.index', compact('histories', 'users', 'plans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'plan_id' => 'required|exists:plans,id',
            'amount' => 'required|numeric|min:0',
            'account_type' => 'required|in:holding,staking,trading',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $history = PlanHistory::create([
                'user_id' => $request->user_id,
                'plan_id' => $request->plan_id,
                'amount' => $request->amount,
                'account_type' => $request->account_type,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Plan purchase history created successfully',
                'data' => $history
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to create plan history: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'plan_id' => 'required|exists:plans,id',
            'amount' => 'required|numeric|min:0',
            'account_type' => 'required|in:holding,staking,trading',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $history = PlanHistory::findOrFail($id);

            $history->update([
                'user_id' => $request->user_id,
                'plan_id' => $request->plan_id,
                'amount' => $request->amount,
                'account_type' => $request->account_type,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Plan purchase history updated successfully',
                'data' => $history
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to update plan history: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $history = PlanHistory::findOrFail($id);
            $history->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Plan purchase history deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to delete plan history: ' . $e->getMessage()
            ], 500);
        }
    }
}
