<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ForgotController extends Controller
{
    public function forgot(Request $request)
    {
        $email = $request->input('email');
        $user = DB::table('beuty_user')->where('email', $email)->first();
        $random = random_int(100000, 999999);
        $upadte = DB::table('beuty_user')->where('email', $email)->update(['pass' => bcrypt($random)]);
        if ($user && $upadte) {
            $name = $user->name;
            $emailuser = $user->email;
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
            return redirect()->route('loginshow')->with('success', 'Password reset instructions have been sent to your email.');
        } else {
            // User does not exist
            return redirect()->back()->with('error', 'No user found with that email address.');
        }
    }
}
