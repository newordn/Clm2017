<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Eleve; 
use App\Term;
class SearchController extends Controller
{
   public function searchInterface($matricule)
    {
    	$student = Eleve::where('matricule',$matricule)->get()->last();
    	$account = $student->account;
        $classe = $student->classe;
        $termId = Term::find($classe->term_id)->term_num;
    	return view('showAStudent')->withstudent($student)->withaccount($account)->withclasse($classe)->withtermId($termId);
    } 
    public function search(Request $request)
    {
    	return $this->searchInterface($request->input('search'));
    }
    public function searchInterface1($id)
    {
        $student = Eleve::where('id',$id)->get()->last();
        $account = $student->account;
        $classe = $student->classe;
        $termId = Term::find($classe->term_id)->term_num;
        return view('showAStudent')->withstudent($student)->withaccount($account)->withclasse($classe)->withtermId($termId);
    }
	public function search1($student_id)
    {
		return $this->searchInterface1($student_id);
    }

}
