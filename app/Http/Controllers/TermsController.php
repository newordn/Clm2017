<?php

namespace App\Http\Controllers;

use App\Repositories\TermRepository;
use App\Http\Requests\TermRequest;
use App\Classe;
use App\Term;
class TermsController extends Controller
{
    public function getTerms(TermRepository $termRepository)
    {
        if(session('admin')=="yes" |session('register')=="yes" ) {
            $terms = $termRepository->getTerms();
            return view('terms')->withTerms($terms);
        }
        return redirect('/');
    }


    public function closeTerm(TermRequest $termRequest,TermRepository $termRepository,$term_id)
    {
        if(session('admin')=="yes")
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

    public function openTerm(TermRequest $termRequest,$term_id,TermRepository $termRepository)
    {
        if(session('admin')=="yes") {
            $term = Term::where('id', $term_id)->get()->first();
            $term->status = true;
            $termRepository->saveOne($term);
        }
        return redirect("/terms");

    }
}