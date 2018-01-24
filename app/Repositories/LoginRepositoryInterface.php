<?php

namespace App\Repositories;

interface LoginRepositoryInterface
{

    public function save($form);
    public function login($form);
}
