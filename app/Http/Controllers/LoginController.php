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
            'email' => 'required|string|email|max:255',
            'katalaluan' => 'required|string|max:255',
        ]);

        $email = $request->input('email');
        $password = $request->input('katalaluan');

        $user = \DB::table('beuty_user')->where('email', $email)->first();

        $pass = \Hash::check($password, $user->pass);

        if ($user != null && $pass == true) {
            // Authentication successful
            return redirect()->route('dashboard')->with('success', 'Login successful.');
        } else {
            // Authentication failed
            return redirect()->back()->with('error', 'Invalid email or password.');
        }
    }
}
