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

    public function show($category,$level,$module)
    {

        $classes = Classe::where([['category',$category],['level',$level],['module',$module]])->get();
        $students = array();
        $absences = array();
        $absences2 = array();
        $sum=0;
        foreach ($classes as $classe) {

            array_push($students, $classe->eleves()->get());
        }
        
        foreach ($students[0] as $student) {

            array_push($absences, $student->absences);
        }
        foreach ($absences as $absence) {
            $sum=0;
            foreach ($absence as $a) {
                $sum +=$a->absence;
            }
            array_push($absences2,$sum);
        }

    	return view('show')->withstudents($students[0])->withabsences($absences2);
    }


    public function propose( $category,$level,$module)
    {

        $classes = Classe::where([['category',$category], ['level',$level],['module','like',$module."%"]])->get();
        $modules = array();
        foreach ($classes as $classe) {
            array_push($modules, $classe->module);
        }

    	return view('proposeClass')->withmodules($modules)->withcategory($category)->withlevel($level)->withradical($module[0]);
    }

    public function create( $request)
    {
        $classe = new Classe();
        $classe->category = $request->input('category');
        $classe->level = $request->input('level');
        $classe->module = $request->input('module');
        $classe->start_of_module = $request->input('start_of_module');
        if($classe->category=="Juniors-Juniors")
        $classe->amount = 15000;
        else
            $classe->amount = 20000; 
        $classe->year = date("Y-m-d");
        $classe->save();
        return redirect("/class/".$classe->category."/".$classe->level."/".$classe->module[0]);
    }
 }
