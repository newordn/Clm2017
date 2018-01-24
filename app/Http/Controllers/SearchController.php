<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Eleve; 
class SearchController extends Controller
{
    
    public function search(Request $request)
    {
    	$student = Eleve::where('matricule',$request->input('search'))->get()->last();
    	if($student== null) return redirect('/');
    	$account = $student->account;
        $classe = $student->classe;
    	return view('showAStudent')->withstudent($student)->withaccount($account)->withclasse($classe);
    }
}
