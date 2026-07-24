<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class EditProdukController extends Controller
{
    public function showeditproduk($id){
	$iduser=session('user_id');
	$user = DB::table('beuty_user')->where('user_id', $iduser)->first();
        return view('editproduk', compact('user'));	
    }
}
