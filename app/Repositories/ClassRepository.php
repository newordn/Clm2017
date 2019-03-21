<?php

namespace App\Repositories;
use App\Bulletin;
use App\Matiere;
use App\Eleve;
use App\Classe;
use App\Account;

Class ClassRepository implements ClassRepositoryInterface
{
	public function getClass()
    {
    	return view('class');
    }

    public function show($termId,$category,$level,$module)
    {
        $classe = Classe::where([['term_id',$termId],['category',$category],['level',$level],['module',$module]])->get()->first();
        return view('show')->withclasseId($classe->id)->withstudents($classe->eleves()->get())->
        withcategory($category)->withlevel($level)->withmodule($module)->withtermId($termId)->withamount($classe->amount);
            
    }


    public function create( $request)
    {
        $classe = new Classe();
        $classe->category = $request->input('category');
        $classe->level = $request->input('level');
        $classe->module = $request->input('module');
        $classe->amount = $request->input('amount');
        $classe->year =  date("Y-m-d h-m-s");
        $classe->start_of_module = $request->input('start_of_module');
        $classe->term_id = $request->input('term_id');
        $classe->indice = $request->input('indice');
        $classe->save();
        return redirect('/term/' . $request->input('term_id'));
    }
 }
