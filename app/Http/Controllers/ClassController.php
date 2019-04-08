<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassRequest;
use App\Repositories\ClassRepository;
use App\Classe;
class ClassController extends Controller
{
    public function getForm($termId,$category,$level,$module,ClassRepository $classRepository)
    {
        $classe = $classRepository->show($termId,$category,$level,$module);
         return view('updateClass')->withclasse($classe)->withtermId($termId);
    }

    public function postForm(ClassRequest $request, ClassRepository $classRepository)
    {
        $classRepository->save($request);
        return redirect('/term/'.$request->input("termId"));
    }
    public function getClass(ClassRepository $classRepository)
    {
    	return $classRepository->getClass();
    }
    public function show(ClassRepository $classRepository,$termId, $category,$level,$module)
    {
        $classe = $classRepository->show($termId,$category,$level,$module);
        return view('show')->withclasseId($classe->id)->withstudents($classe->eleves()->get())->
        withcategory($category)->withlevel($level)->withmodule($module)->withtermId($termId)->withamount($classe->amount);
    }
    public function create(ClassRequest $request, ClassRepository $classRepository)
    {
        if(session('admin')=="yes" |session('register')=="yes" ) {
            return $classRepository->create($request);
        }
        else
            return redirect('/terms');
    }
}
