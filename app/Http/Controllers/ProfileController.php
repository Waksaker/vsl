<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile()
    {
	    $iduser = session('user_id');
        // You can use the $id parameter to fetch the user's profile data
        return view('profile', compact('iduser'));
    }
}
