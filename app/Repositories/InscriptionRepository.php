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

	public function generateMatricule($level_integer,$trimestre)
    {
        $last_student = Eleve::all()->last();
        if($last_student!=null)
        {
            $id_eleve = $last_student->id +1 ;
            if($id_eleve<=9)
                return  substr(date('yy'),0,2).$level_integer.$trimestre."00".$id_eleve.'CLM';
            else if($id_eleve<=99)
                return substr(date('yy'),0,2).$level_integer.$trimestre."0".$id_eleve.'CLM';
            else
                return substr(date('yy'),0,2).$level_integer.$trimestre."00".$id_eleve.'CLM';

        }
        else
           return substr(date('yy'),0,2).$level_integer.$trimestre.'001CLM';


    }
	public function save($account)
	{
		// if the student isn't already in the database
		$testStudent = Eleve::where([['last_name',$account->input('last_name')],['first_name',$account->input('first_name')]])->get()->last();
		if($testStudent==null)
		{
		    //getting from the request
            $last_name = $account->input('last_name');
            $first_name = $account->input('first_name');
            $level = $account->input('level');
            $trimestre = $account->input('trimestre');
            $matricule = $this->generateMatricule($level,$trimestre);
            $category = $account->input('category');
			$module = $account->input('module');
			$payment = $account->input('payment');
			$amount_paid = $account->input('amount_paid');
			$paymentSpec = $account->input('paymentSpec');
            // getting from the request

            // creating student object
            $accountSaved = new Account ;
            $eleve = new Eleve;
            //creating student object

            //setting the values
            $eleve->last_name = $last_name;
            $eleve->first_name = $first_name;
            $eleve->matricule = $matricule;


            $accountSaved->payment =$payment ;
            $accountSaved->amount_paid = $amount_paid ;
            $accountSaved->year = date("Y-m-d h-m-s");
            $accountSaved->paymentSpec = $paymentSpec;
            //setting the values

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
        $accountUpdated->paymentSpec = $account->input('paymentSpec');
        // perfoming
        $eleve->save();
        $accountUpdated->save();
        return $eleve->id;


	}	

}
