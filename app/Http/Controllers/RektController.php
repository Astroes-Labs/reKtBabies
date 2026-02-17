<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RektUser;
use Illuminate\Support\Str;

class RektController extends Controller
{
    public function index()
    {
        return view('details');
    }

public function register(Request $request)
{
    try {

        $validated = $request->validate([
            'x_username' => ['required', 'regex:/^@[A-Za-z0-9_]+$/'],
            'wallet' => ['required', 'regex:/^0x[a-fA-F0-9]{40}$/'],
            'referrer' => ['nullable', 'regex:/^@[A-Za-z0-9_]+$/'],
            'retweet_proof' => ['required', 'regex:/^https:\/\/(www\.)?x\.com\/.+$/'],
            'comment_proof' => ['required', 'regex:/^https:\/\/(www\.)?x\.com\/.+$/'],
        ]);

        // Username uniqueness
        if (RektUser::where('x_username', $validated['x_username'])->exists()) {
            return response()->json(['error' => 'Username already registered'], 422);
        }

        // Self referral protection
        // if (!empty($validated['referrer'])) {
        //     $refExists = RektUser::where('x_username', $validated['referrer'])->exists();

        //     if (!$refExists) {
        //         return response()->json(['error' => 'Invalid referrer'], 422);
        //     }
        // }

        // Wallet uniqueness
        if (RektUser::where('wallet', strtolower($validated['wallet']))->exists()) {
            return response()->json(['error' => 'Wallet already registered'], 422);
        }

        $cleanUsername = strtolower(str_replace('@', '', $validated['x_username']));
        $referralCode = $cleanUsername;

        if (RektUser::where('referral_code', $referralCode)->exists()) {
            $referralCode = $cleanUsername . Str::random(4);
        }

        RektUser::create([
            'x_username' => $validated['x_username'],
            'referrer' => $validated['referrer'] ?? null,
            'wallet' => strtolower($validated['wallet']),
            'referral_code' => $referralCode
        ]);

        return response()->json([
            'success' => true,
            'referral_link' => url('/details?ref=' . $referralCode)
        ]);

    } catch (\Illuminate\Validation\ValidationException $e) {

        return response()->json([
            'error' => $e->errors()
        ], 422);
    }
}

}
