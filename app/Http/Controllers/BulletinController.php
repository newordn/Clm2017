<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\BulletinRequest;
use App\Repositories\BulletinRepository;

class BulletinController extends Controller
{
    public function getBulletin($eleve_id)
    {
    	return view('bulletin')->withid($eleve_id);
    }
    public function postBulletin(BulletinRequest $bulletinRequest, BulletinRepository $bulletinRepository)
    {
    	if(session('authentificated')=="yes")
        {
            $id = $bulletinRepository->save($bulletinRequest); 
	    	if($id)
	    	return view('recuBulletin')->withid($id);
	        else
	            return view ('recuBulletin');
        }
        else
            return redirect('/');
    }
    public function searchBulletin(BulletinRequest $bulletinRequest)
    {
        if(session('admin')!="yes") return redirect('/');
        return redirect('/pdf_bulletin/'.$bulletinRequest->input('bulletin_id'));
    }
    
}
