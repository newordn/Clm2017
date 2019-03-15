<?php

namespace App\Repositories;

interface TermRepositoryInterface
{
    public function closeTerm($id);
        public function getTerms();

    public function saveOne($term);
}