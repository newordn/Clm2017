<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Eleve; 
class SearchController extends Controller
{
   public function searchInterface($matricule)
    {
    	$student = Eleve::where('matricule',$matricule)->get()->last();
    	if($student== null) return redirect('/');
    	$account = $student->account;
        $classe = $student->classe;
    	return view('showAStudent')->withstudent($student)->withaccount($account)->withclasse($classe);
    } 
    public function search(Request $request)
    {
    	return $this->searchInterface($request->input('search'));
    }
	public function search1($matricule)
    {
		return $this->searchInterface($matricule);
    }

}
