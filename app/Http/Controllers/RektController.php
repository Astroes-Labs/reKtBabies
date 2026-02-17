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
        $request->validate([
            'x_username' => ['required', 'regex:/^@[A-Za-z0-9_]+$/'],
            'wallet' => ['required', 'regex:/^0x[a-fA-F0-9]{40}$/']
        ]);

        if (RektUser::where('wallet', $request->wallet)->exists()) {
            return response()->json([
                'error' => 'Wallet already registered'
            ], 422);
        }

        $referralCode = Str::lower(Str::random(8));

        $user = RektUser::create([
            'x_username' => $request->x_username,
            'referrer' => $request->referrer,
            'wallet' => $request->wallet,
            'referral_code' => $referralCode
        ]);

        return response()->json([
            'success' => true,
            'referral_link' => url('/details?ref=' . $referralCode)
        ]);
    }
}
