<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassRequest;
use App\Repositories\ClassRepository;
class ClassController extends Controller
{
    public function getClass(ClassRepository $classRepository)
    {
    	return $classRepository->getClass();
    }
    public function show(ClassRepository $classRepository,$termId, $category,$level,$module)
    {
        return $classRepository->show($termId,$category,$level,$module);
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
