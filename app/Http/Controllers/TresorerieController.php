<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Eleve;
use App\Account;
use App\Classe;
class TresorerieController extends Controller
{
    public function getTresor()
    {
    	$users = Eleve::all()->count();
    	$classes = Classe::all();
    	$money = Account::all()->sum('amount_paid');  
		$sum=0;
		$accounts = array();
		$amounts = array();
		$eleves = array();
		foreach ($classes as $classe) {
			
			array_push($eleves,$classe->eleves);
		}
			foreach($eleves as $eleve)
			{
				$sum=0;
				foreach ($eleve as $e) {
					
					$sum += $e->account["amount_paid"];	
				}
				array_push($amounts, $sum);
			}
			
		
    	return view('tresorerie')->withusers($users)->withmoney($money)->withclasses($classes)->withamounts($amounts);
    }
}
