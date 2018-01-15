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
    	return view('inscription');
        }
        else
            return redirect('/');

    }

    public function postForm(InscriptionRequest $inscriptionRequest, InscriptionRepository $inscriptionRepository)
    {
        if(session('authentificated')=="yes")
        {
            $id = $inscriptionRepository->save($inscriptionRequest);
    	if($id)
    	return view('recuInscription')->withid($id);
        else
            return view ('inscription');
        }
        else
            return redirect('/');
    }
}
