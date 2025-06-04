<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KycVerification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KycVerificationController extends Controller
{
    /**
     * Display a listing of KYC verifications.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $verifications = KycVerification::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.kyc-verifications.index', compact('verifications'));
    }

    /**
     * Approve a KYC verification.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approve($id)
    {
        try {
            $verification = KycVerification::findOrFail($id);

            // Only pending verifications can be approved
            if ($verification->status !== 'pending') {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Only pending verifications can be approved.'
                ], 400);
            }

            // Update verification status
            $verification->update([
                'status' => 'approved',
                'verified_at' => now(),
                'rejection_reason' => null
            ]);

            // Update user KYC status if needed
            $user = $verification->user;
            if ($user) {
                $user->update([
                    'kyc_verified' => true,
                    'kyc_verified_at' => now()
                ]);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'KYC verification approved successfully.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while approving the KYC verification.'
            ], 500);
        }
    }

    /**
     * Reject a KYC verification.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reject(Request $request, $id)
    {
        $request->validate([
            'rejection_reason' => 'required|string|max:500'
        ]);

        try {
            $verification = KycVerification::findOrFail($id);

            // Only pending verifications can be rejected
            if ($verification->status !== 'pending') {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Only pending verifications can be rejected.'
                ], 400);
            }

            // Update verification status
            $verification->update([
                'status' => 'rejected',
                'rejection_reason' => $request->rejection_reason,
                'verified_at' => null
            ]);

            // Update user KYC status if needed
            $user = $verification->user;
            if ($user) {
                $user->update([
                    'kyc_verified' => false,
                    'kyc_verified_at' => null
                ]);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'KYC verification rejected successfully.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while rejecting the KYC verification.'
            ], 500);
        }
    }
}
