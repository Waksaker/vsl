<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
public function profile()
{
$iduser = session('user_id');
// You can use the $id parameter to fetch the user's profile data
return view('profile', compact('iduser'));
}
public function profileaction(Request $request)
{
$id=session('user_id');	
$name=$request->input('name');
$pass=$request->input('pass');
$email=$request->input('email');
$telphone=$request->input('telphone');
$location=$request->input('location');
$update=DB::table('beuty_user')->where('user_id', $id)->update(['name'=>$name,'pass'=>$pass,'email'=>$email,'no_tel'=>$telphone,'location'=>$location]);
if($update)
{
return redirect()->route('profile')->with('success', 'Update Profile Success.');
}
else
{
return back()->with('error', 'Update Profile Failed. Please Try Again.');
}
}
}
