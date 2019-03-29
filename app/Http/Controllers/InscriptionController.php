<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InscriptionRequest;
use App\Repositories\InscriptionRepository;
use App\Eleve;
use App\Term;
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
        if(session('authentificated')=="yes" || session('register')=="yes")
        {
            $id = $inscriptionRepository->save($inscriptionRequest);
    	if($id!=-1 && $id!=0) // si l'eleve a ete inscrit
    	return view('recuInscription')->withid($id)->witherror("")->withtermId($inscriptionRequest->input('trimestre'))->withcategory($inscriptionRequest->input('category'))
            ->withmodule($inscriptionRequest->input('module'))
            ->withlevel($inscriptionRequest->input('level'));
        else if($id==-1) // si l'eleve est deja inscript
            return view ('recuInscription')->witherror("L' Apprenant(e) est déja inscrit(e).")->withid($id)
                ->withtermId($inscriptionRequest->input('trimestre'))
                ->withcategory($inscriptionRequest->input('category'))
                ->withmodule($inscriptionRequest->input('module'))
                ->withlevel($inscriptionRequest->input('level'));
        }
        else
            return redirect('showClass/'.$inscriptionRequest->input('termId').'/'. $inscriptionRequest->input('category').'/'.$inscriptionRequest->input('level').'/'.$inscriptionRequest->input('module'));
	}

    // to get the modify form for the inscription of a student
    public function modifyForm($id)
    {
        $eleve = Eleve::find($id);
        $account = $eleve->account;
        $classe = $eleve->classe;
        $termId = Term::find($classe->term_id)->term_num;
       if(session('register')=="yes" | session('admin')=="yes")
        {
            return view('updateInscription')->witheleve($eleve)->withaccount($account)->withclasse($classe)->withtermId($termId);
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
        return view('recuInscription')->withid($id)->witherror("L' Apprenant(e) est déja inscrit(e).")
            ->withtermId($inscriptionRequest->input('trimestre'))
            ->withcategory($inscriptionRequest->input('category'))
            ->withmodule($inscriptionRequest->input('module'))
            ->withlevel($inscriptionRequest->input('level'));;
        // si il y'a erreur lors de l'inscription
            return $this->modifyForm($id);
         
        
        } 
        else
            return redirect('/');
    }
}
