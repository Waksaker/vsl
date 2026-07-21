<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function loginshow() {
		return view('login');
	}

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'katalaluan' => 'required|string',
        ]);

        $user = DB::table('beuty_user')
                    ->where('email', $request->email)
                    ->first();

        if ($user && $request->katalaluan === $user->pass) {

            // simpan user dalam session
            session([
                'user_id' => $user->user_id,
                'user_name' => $user->name,
                'user_email' => $user->email
            ]);

            return redirect()
                    ->route('dashboard')
                    ->with('success', 'Login successful.');

        } else {

            return back()
                    ->with('error', 'Invalid email or password.');
        }
    }
}
