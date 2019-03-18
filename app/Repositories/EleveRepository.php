<?php

namespace App\Repositories;
use App\Eleve;
Class EleveRepository implements EleveRepositoryInterface
{
    protected $eleve;

    public function __construct(Eleve $eleve)
    {
        $this->eleve = $eleve;
    }
    public function save( $eleve)
    {
        $this->eleve = $eleve;
        $this->eleve->save();
    }

}