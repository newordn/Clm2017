<?php

namespace App\Repositories;

interface ClassRepositoryInterface
{

    public function getClass();
    public function show($termId,$category,$level,$module);
    public function create($request);
}