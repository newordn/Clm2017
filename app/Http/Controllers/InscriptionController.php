<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InscriptionRequest;
use App\Repositories\InscriptionRepository;
use App\Eleve;
class InscriptionController extends Controller
{
    public function getForm()
    {
        if(session('authentificated')=="yes" && session('register')=="yes")
        {
    	return view('inscription')->witherror("");
        }
        else
            return redirect('/');

    }

    public function postForm(InscriptionRequest $inscriptionRequest, InscriptionRepository $inscriptionRepository)
    {
        if(session('authentificated')=="yes" && session('register')=="yes")
        {
            $id = $inscriptionRepository->save($inscriptionRequest);
    	if($id!=-1 && $id!=0) // si l'eleve a ete inscrit
    	return view('recuInscription')->withid($id);
        else if($id==-1) // si l'eleve est deja inscript
            return view ('inscription')->witherror("L' APPRENANT(E) EST DÉJA INSCRIT(E).");
        else // si il y'a erreur lors de l'inscription
            return view('inscription')->witherror("ENTREZ CORRECTEMENT LA VALEUR DE CHAQUE CHAMP.");
        }
        else
            return redirect('/');
	}

    // to get the modify form for the inscription of a student
    public function modifyForm($id)
    {
        $eleve = Eleve::find($id);
        $account = $eleve->account;
        $classe = $eleve->classe;
       if(session('authentificated')=="yes")
        {
            return view('inscriptionModify')->witheleve($eleve)->withaccount($account)->withclasse($classe);
        } 
        else
            return redirect('/');
    }
    // to make modification to the student's inscription
    public function modifyPost(InscriptionRequest $inscriptionRequest, InscriptionRepository $inscriptionRepository)
    {
        if(session('authentificated')=="yes")
        {
              $id = $inscriptionRepository->modify($inscriptionRequest);
        if( $id!=0) // si l'eleve a ete inscrit
        return view('recuInscription')->withid($id);
        // si il y'a erreur lors de l'inscription
            return $this->modifyForm($id);
         
        
        } 
        else
            return redirect('/');
    }
}
