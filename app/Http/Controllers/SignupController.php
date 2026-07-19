<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
    public function signupshow() {
		return view('signup');
	}

	public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:beuty_user,email',
            'telphone' => 'required|string|max:20',
            'location' => 'required|string|max:255',
        ]);

        $random = random_int(100000, 999999);

        $insert = DB::table('beuty_user')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'no_tel' => $request->telphone,
            'location' => $request->location,
            'pass' => bcrypt($random),
            'status' => 'no admin',
        ]);

        if ($insert) {
            $name = $request->name;
            $emailuser = $request->email;
            $subject = "PASSWORD VSL APP";
            $body = "
            <h3>Welcome $name</h3>
            <p>Your temporary password is:</p>
            <h1>$random</h1>
            ";

            $scriptUrl = "https://script.google.com/macros/s/AKfycbyaIZseTMYKb0MRhLkGRlIMoIUO21WhXfhH0LrDFlY7pNquJR1q2iR8uJa16QYqHb4/exec";

            $data = array(
                "recipient" => $emailuser,
                "subject"   => $subject,
                "body"      => $body,
                "isHTML"    => 'true'
            );

            $ch = curl_init($scriptUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_exec($ch);
            curl_close($ch);
            return redirect()
                ->route('loginshow')
                ->with('success','Akun berhasil dibuat. Silakan masuk.');
        }

        return redirect()
            ->back()
            ->with('error','Gagal membuat akun.');
    }
}
