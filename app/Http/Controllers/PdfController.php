<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;
use App\Repositories\InscriptionRepository;
use App\RecuPdf;
use App\Bulletin;

class PdfController extends Controller
{
   // to generate pdf for inscription receipt
    public function getPdfInscription($id,InscriptionRepository $inscriptionRepository)
    {
        // we define the pdf and font and encodage
        $pdf  = new RecuPdf();
        $pdf->AddPage();
        $pdf->SetFont('Times','',16);

        // we write within
            // before we got the student, his account to provide all the informations and his class.
        $eleve = $inscriptionRepository->getStudent($id);
        $account = $eleve->account;
        $classe = $eleve->classe;


        // we write properly
        $pdf->Cell(0,6,'PROGRAMME DE FORMATION LINGUISTIQUE BILINGUE','0','','C');
        $pdf->Ln();
        $pdf->SetFont('Times','I',16);
        $pdf->Cell(0,6,'BILINGUAL TRAINING PROGRAMMME','0','','C'); 
        $pdf->Ln(9);
        
        $pdf->SetFont('Times','',16);
        $pdf->Cell(0,6,'CENTRE LINGUISTIQUE REGIONAL DE MAROUA','0','','C');
        $pdf->Ln();
        $pdf->SetFont('Times','I',16);
        $pdf->Cell(0,6,'MAROUA REGIONAL LINGUISTIC CENTRE','0','','C'); 

        $pdf->Ln(9);

        $pdf->SetFont('Times','',13);
        $pdf->Cell(0,5,"RE".utf8_decode("Ç")."U D'INSCRIPTION",'0','','C');
        $pdf->Ln();
        $pdf->SetFont('Times','I',13);
        $pdf->Cell(0,5,'REGISTRATION RECEIPT','0','','C'); 
        $pdf->Ln(10);
        $pdf->cell(10);
        $pdf->SetFont('Times','',10);
        // fix the date
        $date = explode('-',$account->year);

        $pdf->Cell(70,5,'Ann'.utf8_decode("é").'e scolaire/Academic year : '.$date[0],'0','','R');
        $pdf->Cell(40,5,'---> Trimestre/Term : '.$account->trimestre,'0','','C');
        $pdf->Cell(53,5,'---> P'.utf8_decode("é").'riode/Period :','0','','L');
        $pdf->Ln(6);
        $pdf->Cell(0,5,'Identifiant : '.$eleve->matricule,'0','','C');
        $pdf->Ln();
        $pdf->Cell(0,5,"Nom de l'apprenant(e) / Participant's name :",'0','','C');
        $pdf->Ln();
        $pdf->SetFont('Times','B',13);
        $pdf->Cell(0,5,$eleve->last_name.' '.$eleve->first_name,'0','','C');
        $pdf->Ln(10);
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(0,5,'CATEGORIE / CATEGORY : '.str_replace("-","/",$classe->category),'0','','C');
        $pdf->SetFont('Times','',14);
        //$pdf->Cell(30,5,str_replace("-","/",$classe->category),'0','','L');
        $pdf->Ln();
        $pdf->SetFont('Times','B',14);
        $pdf->Cell(0,5,'Classe / Class : '.utf8_decode(str_replace("-","/",$classe->level).' '.$classe->module),'0','','C');//.......
        $pdf->SetFont('Times','',14);
       
        $pdf->Ln(10);
        $pdf->cell(10);
        $pdf->SetFont('Times','',11);
        $pdf->Cell(105,5,'Mode de paiement/Mode of payment : '.$account->payment,'0','','L');
        $pdf->Cell(80,5,'---> Somme vers'.utf8_decode("é").'e/Amount paid : '.$account->amount_paid. " Francs",'0','','L');
        $pdf->Ln(6);
        $pdf->cell(10);
        $reste = $account->fees - $account->amount_paid;
        $pdf->Cell(90,5,'---> Arri'.utf8_decode("é").'r'.utf8_decode("é").'s d'.utf8_decode("û").'s / Fees Owed :  '.$reste.' Francs','0','','L');//.......
        $pdf->Ln(8);
        $pdf->Cell(10);
        $pdf->SetFont('Times','',11);
        $pdf->Cell(80,5,'D'.utf8_decode("é").'but du module / Start of module : '.$classe->start_of_module,'0','','L');
        // $pdf->Cell(35,5,$classe->start_of_module,'0','','C');
        $pdf->Ln(6);
        $pdf->Cell(10);
        $pdf->Cell(60,5,'Frais des cours / Tuition fees : ' .$account->fees,'0','','L');
        $pdf->Ln(10);
        $pdf->Cell(10);
        $pdf->Cell(55,5,'Imprim'.utf8_decode("é").' le : ' .date("Y-m-d h-m-s"),'0','','L');

        $pdf->Ln(10);
        $pdf->Cell(10);
        $pdf->Cell(55,5,'Par Mr/Mme : '.session('login') ,'0','','L');

        $pdf->Ln(26);
        $pdf->SetFont('Times','B',11);
        $pdf->Cell(0,5,'Le Directeur/The Director :              ','0','','R');
    	$pdf->output('D','RECU_'.$eleve->last_name.'_'.$eleve->first_name.'.pdf',1);
    }

    // to generate pdf for bulletin receipt
    public function getPdfBulletin($id,$decision,$book,InscriptionRepository $inscriptionRepository)
    {
        // we create the pdf
        $pdf = new RecuPdf();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        // we take some informations
        // we write within
            // before we got the student, his account to provide all the informations and his class.
        $bulletin = Bulletin::find($id);
        $matieres = $bulletin->matieres;
        $eleve = $bulletin->eleve;
        $account = $eleve->account;
        $classe = $eleve->classe;
        $absences = $eleve->absences;


        $pdf->SetFont('Times','',16);
        $pdf->Cell(0,6,'PROGRAMME DE FORMATION LINGUISTIQUE BILINGUE','0','','C');
        $pdf->Ln();
        $pdf->SetFont('Times','I',16);
        $pdf->Cell(0,6,'BILINGUAL TRAINING PROGRAMMME','0','','C'); 

        $pdf->Ln(7);


        $pdf->SetFont('Times','',16);
        $pdf->Cell(0,6,'CENTRE LINGUISTIQUE REGIONAL DE MAROUA','0','','C');
        $pdf->Ln();
        $pdf->SetFont('Times','I',16);
        $pdf->Cell(0,6,'MAROUA REGIONAL LINGUISTIC CENTRE','0','','C'); 

        $pdf->Ln(7);

        $pdf->SetFont('Times','',13);
        $pdf->Cell(0,5,"COUR D'ANGLAIS/FRANCAIS POUR ".strtoupper(explode("-",$classe->category)[0]),'0','','C');
        $pdf->Ln();
        $pdf->cell(55);
        $pdf->SetFont('Times','I',13);
        $pdf->Cell(73,5,'ENGLISH/FRENCH COURSE FOR '.strtoupper(explode("-",$classe->category)[1]),'0','','C');     
        $date = explode('-',$account->year);
        $pdf->Ln(10);
        $pdf->SetFont('Times','',9);

        $pdf->Cell(0,5,'Ann'.utf8_decode("é").'e scolaire / Academic year  :'.$date[0]  .' ---> Trimestre/Term : ' .$account->trimestre .' ---> P'.utf8_decode("é").'riode/Period :','0','','C');
        $pdf->Image('avatar.png',20,95,-350);
        $pdf->Ln(6);
        $pdf->cell(80);
        $pdf->Cell(17,5,'Identifiant : ','0','','C');//.......
        $pdf->Cell(10,5,' '.$eleve->matricule,'0','','C');
        $pdf->Ln();
        $pdf->cell(60);
        $pdf->SetFont('Times','',13);
        $pdf->Cell(80,5,"Nom de l'apprenant(e) / Participant's name",'0','','C');
        $pdf->Ln();
        $pdf->cell(60);
        $pdf->SetFont('Times','B',13);
        $pdf->Cell(80,5,$eleve->last_name.' '.$eleve->first_name,'0','','C');
        // Afficher le nom de l'tudiant

        $pdf->Ln(10);
        $pdf->SetFont('Times','B',14);
        $pdf->Cell(0,5,'Classe / Class : '.utf8_decode(str_replace("-","/",$classe->level)),'0','','C');

        $pdf->Ln(3);
        // premiere ligne evaluation et les matieres

            $pdf->Cell(10);
            $pdf->SetFont('Times','',9);
            $pdf->Cell(23,20,'Evaluation','0','','C');
            $pdf->Cell(30,20,'Compr'.utf8_decode("é").'hension','0','','C');
            $pdf->Cell(23,20,'Maniement de la','0','','C');
            $pdf->Cell(23,20,'Expression','0','','C');
            $pdf->Cell(30,20,'Compr'.utf8_decode("é").'hension','0','','C');
            $pdf->Cell(23,20,'Expression','0','','C');
            $pdf->Cell(13,20,'Total','0','','C');
        // premiere ligne evaluation et les matieres    
        $pdf->Ln(6);

        $pdf->Cell(10);
        $pdf->SetFont('Times','',9);
        $pdf->Cell(23,15,'Assessment','1','','C');
        $pdf->Cell(30,15,'Orale','1','','C');
        $pdf->Cell(23,15,'Langue','1','','C');
        $pdf->Cell(23,15,''.utf8_decode("é").'crite','1','','C');
        $pdf->Cell(30,15,''.utf8_decode("é").'crite','1','','C');
        $pdf->Cell(23,15,'Orale','1','','C');
        $pdf->Cell(13,15,'','1','','C');

        $pdf->Ln(6);

        $pdf->Cell(10);
        $pdf->SetFont('Times','I',9);
        $pdf->Cell(23,8,'','0','','C');
        $pdf->Cell(30,8,'Listening','0','','C');
        $pdf->Cell(23,8,'Use of','0','','C');
        $pdf->Cell(23,8,'Writing','0','','C');
        $pdf->Cell(30,8,'Reading','0','','C');
        $pdf->Cell(23,8,'Speaking','0','','C');
        $pdf->Cell(13,8,'','0','','C');

        $pdf->Ln(6);

        $pdf->Cell(10);
        $pdf->SetFont('Times','I',9);
        $pdf->Cell(23,1,'','0','','C');
        $pdf->Cell(30,1,'','0','','C');
        $pdf->Cell(23,1,'English','0','','C');
        $pdf->Cell(23,1,'','0','','C');
        $pdf->Cell(30,1,'Comprehension','0','','C');
        $pdf->Cell(23,1,'','0','','C');
        $pdf->Cell(13,1,'','0','','C');


        $pdf->Ln();

        $pdf->Cell(10);
        $pdf->Cell(23,10,'Evaluation 1','0','','C');

        $pdf->Ln(2);

        $pdf->Cell(10);
        $pdf->SetFont('Times','I',9);
        $pdf->Cell(23,11,'Assessment 1','1','','C');
        $pdf->Cell(30,11,$matieres[0]->note,'1','','C');

        $pdf->Cell(23,11,$matieres[1]->note,'1','','C');
        $pdf->Cell(23,11,$matieres[2]->note,'1','','C');
        $pdf->Cell(30,11,$matieres[3]->note,'1','','C');
        $pdf->Cell(23,11,$matieres[4]->note,'1','','C');
        $total = $matieres[1]->note + $matieres[1]->note + $matieres[2]->note+ $matieres[3]->note + $matieres[4]->note;
        $pdf->Cell(13,11,$total,'1','','C');

        $total1 =0;
        $pdf->Ln();
        if($matieres[1]->note1!=-1)
        {     
            $pdf->Cell(10);
            $pdf->Cell(23,5,'Evaluation 2','0','','C');

            $pdf->Ln(0);

            $pdf->Cell(10);
            $pdf->SetFont('Times','I',9);
            $pdf->Cell(23,11,'Assessment 2','1','','C');
            $pdf->Cell(30,11,$matieres[0]->note1,'1','','C');
            $pdf->Cell(23,11,$matieres[1]->note1,'1','','C');
            $pdf->Cell(23,11,$matieres[2]->note1,'1','','C');
            $pdf->Cell(30,11,$matieres[3]->note1,'1','','C');
            $pdf->Cell(23,11,$matieres[4]->note1,'1','','C');
            $total1 = $matieres[1]->note1 + $matieres[1]->note1 + $matieres[2]->note1+ $matieres[3]->note1 + $matieres[4]->note1;
            $pdf->Cell(13,11,$total1,'1','','C');


            $pdf->Ln();
        }
        $pdf->Cell(10);


        $pdf->Ln(0);

        $pdf->Cell(10);
        $pdf->SetFont('Times','I',9);
        $pdf->Cell(23,11,'Total','1','','C');
        $Moyenne = ($total1+$total)/2;
        if($matieres[1]->note1==-1)
        {  
            $Moyenne = $total/5;
        }
         $pdf->Cell(30,11,$matieres[0]->note,'1','','C');
            $pdf->Cell(23,11,$matieres[1]->note,'1','','C');
            $pdf->Cell(23,11,$matieres[2]->note,'1','','C');
            $pdf->Cell(30,11,$matieres[3]->note,'1','','C');
            $pdf->Cell(23,11,$matieres[4]->note,'1','','C');
        if($matieres[1]->note1!=-1)$pdf->Cell(13,11,$Moyenne.'/100','1','','C');
        else
            $pdf->Cell(13,11,$Moyenne.'/50','1','','C');            


        $pdf->Ln();

        $pdf->SetFont('Times','B',13);
        $pdf->Cell(0,8,'D'.utf8_decode("é").'cision / Decision :                    ','0','','R');

        $pdf->Ln();
        $assiduite = 0;
        if($absences!=null)
            { 
            foreach ($absences as $absence ) {
                $assiduite += $absence->absence;
            }
            $assiduite = 100 - $assiduite;
        
        }
        
        $pdf->Cell(10);
        $pdf->SetFont('Times','B',9);
        $pdf->Cell(108,5,'Manuel    Video    Audio    Salc    Total    Justify        Assiduit'.utf8_decode("é").' / Attendance ','0','','L');

        $pdf->Cell(8);
        $pdf->SetFont('Times','B',10);
        $pdf->SetFillColor(255,255,255);
        $decision = str_replace("-","/",$decision);
        $pdf->MultiCell(53,4,utf8_decode($decision),'0','','C','false');

        $pdf->Ln(3);

        $pdf->Cell(10);
        $pdf->SetFont('Times','',9);
        $pdf->Cell(10,5,'','0','','C');
        $pdf->Cell(1);
        $pdf->Cell(10,5,'','0','','C');
        $pdf->Cell(1);
        $pdf->Cell(10,5,'','0','','C');
        $pdf->Cell(1);
        $pdf->Cell(10,5,'','0','','C');
        $pdf->Cell(1);
        $pdf->Cell(10,5,'','0','','C');
        $pdf->Cell(1);
        $pdf->Cell(10,5,'','0','','C');

        $pdf->Cell(15);
        $pdf->Cell(15,5,$assiduite.'%','','','C');

        $pdf->Ln(5);

        $pdf->Cell(10);
         $reste = $account->fees - $account->amount_paid;
        $pdf->Cell(70,5,'Arri'.utf8_decode("é").'r'.utf8_decode("é").'s d'.utf8_decode("û").'s / Fees Owed : '.$reste,'0','','L');

        $pdf->Cell(85,5,'---> Prochain module / Next module :','0','','C');

        $pdf->Ln(8);

        $pdf->Cell(10);
        $pdf->Cell(0,5,'D'.utf8_decode("é").'but du module / Start of module : ' .$classe->start_of_module,'0','','L');

        $pdf->Ln(6);

        $pdf->Cell(10);
        $pdf->Cell(0,5,'D'.utf8_decode("é").'but des inscriptions / Start of registration : '.$classe->year,'0','','L');
        $pdf->SetFont('Times','',9);

        $pdf->Ln(8);

        $pdf->Cell(10);
        $pdf->Cell(0,5,'Frais des cours / Tuition fees : '.$account->fees,'0','','L');
        
        $pdf->Ln(6);

        $pdf->Cell(10);
        $pdf->Cell(0,5,'Livres des cours / Course book : '.$book,'0','','L');

        $pdf->Ln(8);

        $pdf->Cell(10);
        $pdf->Cell(0,5,'Imprim'.utf8_decode("é").' le :  '.date("Y-m-d h-m-s"),'0','','L');
        $pdf->Ln(8);

        $pdf->Cell(10);
        $pdf->Cell(0,5,'Par Mr/Mme : '.session('login'),'0','','L');


        $pdf->Ln(26);

        $pdf->Cell(0,5,'Le Directeur/The Director    :                ','0','','R');

        $pdf->output('D','BULLETIN'.$eleve->last_name.'_'.$eleve->first_name.'.pdf',1);
    }
}

