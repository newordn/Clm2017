<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InscriptionRequest;
use App\Repositories\InscriptionRepository;

class InscriptionController extends Controller
{
    public function getForm()
    {
        if(session('authentificated')=="yes")
        {
    	return view('inscription')->witherror("");
        }
        else
            return redirect('/');

    }

    public function postForm(InscriptionRequest $inscriptionRequest, InscriptionRepository $inscriptionRepository)
    {
        if(session('authentificated')=="yes")
        {
            $id = $inscriptionRepository->save($inscriptionRequest);
    	if($id!=-1 && $id!=0) // si l'eleve a ete inscrit
    	return view('recuInscription')->withid($id);
        else if($id==-1) // si l'eleve est deja inscript
            return view ('inscription')->witherror("L' APPRENANT(E) EST DÉJA INSCRIT(E).");
        else // si il y'a erreur lors de l'inscription
            return view('inscription')->witherror("ERREUR.ENTREZ CORRECTEMENT LA VALEUR DE CHAQUE CHAMP.");
        }
        else
            return redirect('/');
    }
}
