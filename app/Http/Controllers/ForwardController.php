<?php

namespace App\Http\Controllers;


use App\Repositories\EleveRepository;
use Illuminate\Http\Request;
use App\Classe;
use App\Eleve;
class ForwardController extends Controller
{
    public function forward($id, Request $request, EleveRepository $eleveRepository)
    {
        $termId = $request->input('term_id');
        $category = $request->input('category');
        $level = $request->input('level');
        $module = $request->input('module');
        $classe = Classe::where([['term_id',$termId],['category',$category],['level',$level],['module',$module]])->get()->first();
        $student = Eleve::find($id);
        $student->classe_id= $classe->id;
        $eleveRepository->save($student);

        return redirect('/showClass/' .$termId . '/' . $category .'/' .$level.'/'. $module );
    }
}