<?php

namespace App\Http\Controllers;

use App\Repositories\TermRepository;
use App\Http\Requests\TermRequest;
use App\Classe;
class TermsController extends Controller
{
    public function getTerms(TermRepository $termRepository)
    {
        $terms = $termRepository->getTerms();
        return view('terms')->withTerms($terms);
    }


    public function closeTerm(TermRepository $termRepository,$term_id)
    {
        $termRepository->closeTerm($term_id);
        return redirect("/terms");
    }
    public function postTerm(TermRequest $termRequest,TermRepository $termRepository)
    {

         $termRepository->save($termRequest);
        return redirect("/terms");

    }
    public function getTerm($term_id)
    {
        $classes = Classe::where('term_id',$term_id)->get();
        return view("/class")->withtermId($term_id)->withclasses($classes);
    }
 

}