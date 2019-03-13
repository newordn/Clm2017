<?php

namespace App\Repositories;
use App\Term;
Class TermRepository implements TermRepositoryInterface
{
    protected $term;

    public function __construct(Term $term)
    {
        $this->term = $term;
    }
	public function getTerms()
    {
    	return Term::all();
    }

    public function closeTerm($id)
    {
        $term1 = Term::where('id',$id)->get()->first();
        $term1->status = false;
        $this->term= $term1;
        $this->term->save();
    }

    public function save($term)
    {
        $termToSave = new Term;
        $termToSave->term_num = $term->term_num;
        $termToSave->start_term = $term->start_term;
        $termToSave->end_term = $term->end_term;
        $termToSave->status = true;
        $this->term = $termToSave;
        $this->term->save();

    }
}