<?php

namespace App\Repositories;

interface ClassRepositoryInterface
{

    public function getClass();
    public function show($category,$level,$module);
    public function propose( $category,$level,$module);
    public function create($request);
}