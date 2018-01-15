<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Absence;
class AbsenceController extends Controller
{
    public function setAbsence($eleve_id)
    {
    	$oneAbsence = new Absence;
    	$oneAbsence->eleve_id = $eleve_id;
    	$oneAbsence->year = date('y-m-d h-m-s');
    	$oneAbsence->absence = 1;
    	$oneAbsence->save();
    	return back();

    }
}
