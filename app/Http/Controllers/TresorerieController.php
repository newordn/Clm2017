<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Eleve;
use App\Account;
class TresorerieController extends Controller
{
    public function getTresor()
    {
    	$users = Eleve::all()->count();
    	$account = Account::all()->sum('amount_paid'); 
    	return view('tresorerie')->withusers($users)->withmoney($account);
    }
}
