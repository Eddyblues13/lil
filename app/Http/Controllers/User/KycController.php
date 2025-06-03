<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class KycController extends Controller
{
    // Show KYC form
    public function showForm()
    {
        $user = Auth::user();
        $kyc = $user->kycVerification;

        return view('user.kyc', [
            'kyc' => $kyc,
            'user' => $user
        ]);
    }

    // Handle KYC submission
    public function submit(Request $request)
    {
        $request->validate([
            'document_type' => 'required|in:passport,national_id,drivers_license',
            'front_file' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'back_file' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'selfie_file' => 'required|file|mimes:jpg,jpeg,png|max:5120',
            'full_name' => 'required|string|max:255',
            'dob' => 'required|date',
            'document_number' => 'required|string|max:255',
            'terms_agree' => 'required|accepted'
        ]);

        $user = Auth::user();

        // Check if user already has a pending or approved KYC
        if ($user->kycVerification && $user->kycVerification->status === 'approved') {
            return redirect()->back()->with('error', 'Your account is already verified.');
        }

        if ($user->kycVerification && $user->kycVerification->status === 'pending') {
            return redirect()->back()->with('error', 'Your verification is already pending review.');
        }

        // Handle file uploads
        $frontPath = $this->storeFile($request->file('front_file'), 'kyc');
        $backPath = $request->hasFile('back_file') ? $this->storeFile($request->file('back_file'), 'kyc') : null;
        $selfiePath = $this->storeFile($request->file('selfie_file'), 'kyc');

        // Create or update KYC record
        $kycData = [
            'user_id' => $user->id,
            'document_type' => $request->document_type,
            'front_document_path' => $frontPath,
            'back_document_path' => $backPath,
            'selfie_path' => $selfiePath,
            'full_name' => $request->full_name,
            'dob' => $request->dob,
            'document_number' => $request->document_number,
            'status' => 'pending',
            'verified_at' => null,
            'rejection_reason' => null
        ];

        if ($user->kycVerification) {
            // Delete old files if they exist
            $this->deleteFile($user->kycVerification->front_document_path);
            $this->deleteFile($user->kycVerification->back_document_path);
            $this->deleteFile($user->kycVerification->selfie_path);

            $user->kycVerification->update($kycData);
        } else {
            KycVerification::create($kycData);
        }

        return redirect()->route('verification')->with('success', 'Your documents have been submitted for verification. We will review them shortly.');
    }

    // Show KYC status
    public function status()
    {
        $kyc = Auth::user()->kycVerification;
        return view('kyc.status', compact('kyc'));
    }

    // Helper function to store files
    private function storeFile($file, $directory)
    {
        $filename = Str::random(20) . '_' . time() . '.' . $file->getClientOriginalExtension();
        return $file->storeAs($directory, $filename, 'public');
    }

    // Helper function to delete files
    private function deleteFile($path)
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}
