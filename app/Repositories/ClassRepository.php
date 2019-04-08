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
        return $classe;

            
    }
    public function save($request)
    {

        $class = Classe::where('id',$request->input("classId"))->get()->first();
        $class->category = $request->input("category");
        $class->level = $request->input("level");
        $class->module = $request->input("module");
        $class->indice = $request->input("indice");
        $class->start_of_module = $request->input("start_of_module");
        $class->amount = $request->input("amount");
        $class->save();
    }


    public function create( $request)
    {
        $classe = new Classe();

        $classe->category = $request->input('category'). " ".   $request->input('category_suffix');
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
