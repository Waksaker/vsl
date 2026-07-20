<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashController extends Controller
{
    public function dashboard()
    {
        $id = session('user_id');

        $user = DB::table('beuty_user')
                    ->where('user_id', $id)
                    ->first();

        return view('dashboard', compact('user'));
    }
}
