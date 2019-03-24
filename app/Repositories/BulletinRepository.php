<?php

namespace App\Repositories;
use App\Bulletin;
use App\Matiere;
use App\Eleve;
use App\Classe;

Class BulletinRepository implements BulletinRepositoryInterface
{

    protected $bulletin;

	public function __construct(Bulletin $bulletin)
	{
		$this->bulletin = $bulletin;
	}

	public function save($form)
	{
		$this->bulletin = new Bulletin;
		$this->bulletin->year = date("Y-m-d h-m-s");
		$this->bulletin->eleve_id = $form->input('id');
		$this->bulletin->decision = $form->input('decision');
		$this->bulletin->book= $form->input('book');
		$eleve_id = $form->input('id');
		$this->bulletin->save();

		$listening = new Matiere;
		$useOfEnglish = new Matiere;
		$writting = new Matiere;
		$reading = new Matiere;
		$speaking = new Matiere;

		$listening->intitule = "COMPREHENSION ORALE/LISTENING";
		$useOfEnglish->intitule = "USAGE DE LA LANGUE/USE OF ENGLISH";
		$writting->intitule = "EXPRESSION ECRITE/WRITTING";
		$reading->intitule = "COMPREHENSION ECRITE/READING COMPREHENSION";
		$speaking->intitule = "EXPRESSION ORALE/SPEAKING";

		$listening->note = $form->input('listening');
		$useOfEnglish->note = $form->input('useOfEnglish');
		$writting->note = $form->input('writting');
		$reading->note = $form->input('reading');
		$speaking->note = $form->input('speaking');
		$listening1 = $form->input('listening1');
		$useOfEnglish1 = $form->input('useOfEnglish1');
		$writting1 = $form->input('writting1');
		$reading1 = $form->input('reading1');
		$speaking1 = $form->input('speaking1');
		if($listening1==null) $listening1 =-1;
		if($useOfEnglish1==null) $useOfEnglish1 =-1;
		if($writting1==null) $writting1 =-1;
		if($reading1==null) $reading1 =-1;
		if($speaking1==null) $speaking1 =-1;

		$listening->note1 = $listening1;
		$useOfEnglish->note1 = $useOfEnglish1;
		$writting->note1 = $writting1;
		$reading->note1 = $reading1;
		$speaking->note1 = $speaking1;

		$bulletin_id = Bulletin::all()->last()->id;
		$listening->bulletin_id = $bulletin_id;
		$useOfEnglish->bulletin_id = $bulletin_id;
		$writting->bulletin_id = $bulletin_id;
		$reading->bulletin_id = $bulletin_id;
		$speaking->bulletin_id = $bulletin_id;

		$listening->save();
		$useOfEnglish->save();
		$writting->save();
		$reading->save();
		$speaking->save();
		/*if($listening1!=-1)
		$moyenne = ($listening->note + $useOfEnglish->note + $writting->note + $reading->note  + $speaking->note + $listening->note1 + $useOfEnglish->note1 + $writting->note1 + $reading->note1  + $speaking->note1)/10;
	    else 
	    	$moyenne = ($listening->note + $useOfEnglish->note + $writting->note + $reading->note  + $speaking->note)/5;
	    if($moyenne >= 10)
	    {
	    	$eleve = Eleve::find($eleve_id);
	    	$classe = $eleve->classe;
	    	if($classe->module[0]=="A")
	    	$eleve->classe_id = Classe::where([['category',$classe->category], ['level',$classe->level],['module','like',"B%"]])->get()->last()->id;
	    }
*/
		return $bulletin_id;
		
	}
}
