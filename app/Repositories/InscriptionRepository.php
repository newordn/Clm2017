<?php

namespace App\Repositories;

use App\Account;
use App\Eleve;
use App\Classe;


class InscriptionRepository implements InscriptionRepositoryInterface
{

    protected $account;

	public function __construct(Account $account)
	{
		$this->account = $account;
	}

	public function save($account)
	{
		// if the student isn't already in the database
		$testStudent = Eleve::where([['last_name',$account->input('last_name')],['first_name',$account->input('first_name')]])->get()->last();
		if($testStudent==null)
		{
			$accountSaved = new Account ;

			$eleve = new Eleve;

			$level = $account->input('level');
			

			$eleve->last_name = $account->input('last_name');
			$eleve->first_name = $account->input('first_name');
			if($level=="Débutant")
				$level_integer=1;
			if($level=="Foundation")
				$level_integer=1;
			if($level=="Elémentaire")
				$level_integer=2;
			if($level=="Elementary")
				$level_integer=2;
			if($level=="Pré Intermédiaire")
				$level_integer=3;
			if($level=="Lower Intermediate")
				$level_integer=3;
			if($level=="Intermédiaire")
				$level_integer=4;
			if($level=="Intermediate")
				$level_integer=4;
			if($level=="Supérieur")
				$level_integer=5;
			if($level=="Upper")
				$level_integer=5;
			if($level=="Perfectionnement")
				$level_integer=6;
			if($level=="Advanced")
				$level_integer=6;
			$last_student = Eleve::all()->last(); 
			if($last_student!=null)
			{
				$id_eleve = $last_student->id +1 ;
			$eleve->matricule = substr(date('yy'),0,2).$level_integer.$id_eleve.'CLM';
				
			}
			else
				$eleve->matricule = substr(date('yy'),0,2).$level_integer.'1CLM';
				
			$eleve->img  = "k";
			
			$category = $account->input('category');
			$category = str_replace("/","-",$category);
			$module = $account->input('module');

			$accountSaved->payment = $account->input('payment');
	    	$accountSaved->amount_paid = $account->input('amount_paid');

			$accountSaved->fees = $account->input('fees');
	    	$accountSaved->year = date("Y-m-d h-m-s");
	    	$accountSaved->trimestre = $account->input('trimestre');
	        $this->account=$accountSaved;
	        

			$classe=Classe::where([['category',$category], ['level',$level],['module',$module]])->get()->last();
			
			if($classe!=null)
			{ 
				$classe->eleves()->save($eleve);
				$id_eleve = Eleve::all()->last()->id; 
				$this->account->eleve_id= $id_eleve  ;
				$this->account->save();
				return $this->account->eleve_id;
				 
			}
			else
				return 0;
		}
		else
		return -1;	
    	
       
	}
	// to get a student
	public function getStudent($id)
	{
		return Eleve::find($id);
	}
	// to get the account of a student
	public function getAccount($id)
	{
		return Account::find($id);		
	}

	// to make modification to a student
	public function modify($account)
	{	
		// we make all the updates
		$eleve = Eleve::find($account->input('id'));
		$eleve->last_name = $account->input('last_name');
		$eleve->first_name = $account->input('first_name'); 
        $accountUpdated = $eleve->account;
        $accountUpdated->payment = $account->input('payment');
        $accountUpdated->amount_paid = $account->input('amount_paid');
        $accountUpdated->fees = $account->input('fees');
        $accountUpdated->trimestre = $account->input('trimestre');
        $classe = $eleve->classe;
        $classe->category = $account->input('category');
        $classe->level = $account->input('level');
        $classe->module = $account->input('module');
        // perfoming
        $eleve->save();
        $classe->save();
        $accountUpdated->save();
        return $eleve->id;


	}	

}