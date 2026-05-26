<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\User;
use Carbon\Carbon;

class ForgotPasswordController extends Controller
{
    /**
     * Show the forgot password form.
     */
    public function showForm()
    {
        return view('forgot-password');
    }

    /**
     * Handle the forgot password form submission.
     * Generates a token, stores it, and emails the reset link.
     */
    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        // Always show success — don't reveal whether the email exists (security best practice)
        if (!$user) {
            return back()->with('success', 'If that email is registered, a reset link has been sent.');
        }

        // Delete any existing token for this email
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        // Generate a secure token
        $token = Str::random(64);

        // Store the token
        DB::table('password_reset_tokens')->insert([
            'email'      => $request->email,
            'token'      => bcrypt($token),
            'created_at' => Carbon::now(),
        ]);

        // Build the reset URL
        $resetUrl = url('/reset-password?token=' . $token . '&email=' . urlencode($request->email));

        // Send the email
        Mail::send('reset-password', ['resetUrl' => $resetUrl, 'user' => $user], function ($message) use ($request) {
            $message->to($request->email)
                    ->subject('Reset Your Password - Car Rental');
        });

        return back()->with('success', 'If that email is registered, a reset link has been sent.');
    }
}
