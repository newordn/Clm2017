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
    public function show(ClassRepository $classRepository, $category,$level,$module)
    {
        return $classRepository->show($category,$level,$module);
    }
 public function propose( ClassRepository $classRepository,$category,$level,$module)
    {
        return $classRepository->propose($category,$level,$module);
    }

    public function create(ClassRequest $request, ClassRepository $classRepository)
    {
        return $classRepository->create($request);
    }
}
