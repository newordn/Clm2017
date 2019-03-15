<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Eleve;
use App\Account;
use App\Classe;
use App\Term;
class TresorerieController extends Controller
{
    public function howMuch($eleves)
    {
        $sum = 0;
        foreach ($eleves as $e) {

            $sum += $e->account["amount_paid"];
        }
        return $sum;
    }

    public function howMuchForAllStudentOfATerm($elevess)
    {
        $sum = 0;
        foreach ($elevess as $eleves)
        {
            $sum+=$this->howMuch($eleves);
        }
        return $sum;
    }
    public function howMany($eleves)
    {
        $sum = 0;
        foreach ($eleves as $e) {
            $sum+= count($e);
        }
        return $sum;
    }

    public function getTresor()
    {
    	$users = Eleve::all()->count();
    	$money = Account::all()->sum('amount_paid');
    	$terms = Term::all();
		$sum=0;
		$accounts = array();
		$amounts = array();
		$eleves = array();
		$classess = array();
		$studentNumber = array();
		$studentMoney = array();
		foreach($terms as $term) {
		    $i=0;
		    $classes = Classe::where('term_id',$term->id)->get();
            foreach ($classes as $classe) {
                array_push($eleves, $classe->eleves);

                array_push($amounts, $this->howMuch($classe->eleves));
            }

            array_push($classess, $classes);
            array_push($studentMoney,$this->howMuchForAllStudentOfATerm($eleves));
            array_push($studentNumber,$this->howMany($eleves));
            $i=$i+1;
            $eleves = array();

        }
    	return view('tresorerie')->withstudentMoney($studentMoney)->withstudentNumber($studentNumber)->withterms($terms)->withusers($users)->withmoney($money)->withclassess($classess)->withamounts($amounts);
    }
}
