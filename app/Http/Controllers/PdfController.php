<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;
use App\Repositories\InscriptionRepository;
use App\RecuPdf;
use App\RecuPdf1;
use App\Bulletin;
use App\Term;

class PdfController extends Controller
{
   // to generate pdf for inscription receipt
    public function getPdfInscription($id,InscriptionRepository $inscriptionRepository)
    {
        // we define the pdf and font and encodage
        $pdf  = new RecuPdf1();
        $pdf->AddPage();
        $pdf->SetFont('Times','',8);

        // we write within
            // before we got the student, his account to provide all the informations and his class.
        $eleve = $inscriptionRepository->getStudent($id);
        $account = $eleve->account;
        $classe = $eleve->classe;
        $mAmount = (int) $account->amount_paid;
        $mFees = (int) $account->fees;

        // we write properly
        $pdf->Cell(0,6,'PROGRAMME DE FORMATION LINGUISTIQUE BILINGUE','0','','C');
        $pdf->Ln();
        $pdf->SetFont('Times','I',10);
        $pdf->Cell(0,6,'BILINGUAL TRAINING PROGRAMME','0','','C'); 
        $pdf->Ln(3);
        
        $pdf->SetFont('Times','',10);
        $pdf->Cell(0,6,'CENTRE LINGUISTIQUE REGIONAL DE MAROUA','0','','C');
        $pdf->Ln();
        $pdf->SetFont('Times','I',10);
        $pdf->Cell(0,6,'MAROUA REGIONAL LINGUISTIC CENTRE','0','','C'); 

        $pdf->Ln(5);

        $pdf->SetFont('Times','',10);
        $pdf->Cell(0,5,"RE".utf8_decode("Ç")."U D'INSCRIPTION",'0','','C');
        $pdf->Ln();
        $pdf->SetFont('Times','I',10);
        $pdf->Cell(0,5,'REGISTRATION RECEIPT','0','','C'); 
        $pdf->Ln(5);
        $pdf->cell(10);
        $pdf->SetFont('Times','',10);
        // fix the date
        $date = explode('-',$account->year);
        $termId = Term::find($classe->term_id)->term_num;

        $pdf->Cell(70,5,'Ann'.utf8_decode("é").'e scolaire/Academic year : '.$date[0],'0','','R');
        $pdf->Cell(40,5,'Trimestre/Term : '.$termId,'0','','C');
        $pdf->Cell(0,5,'Identifiant : '.utf8_decode($eleve->matricule),'0','','C');
        $pdf->Ln();
        $pdf->Cell(0,5,"Nom de l'apprenant(e) / Participant's name :",'0','','C');
        $pdf->Ln();
        $pdf->SetFont('Times','B',13);
        $pdf->Cell(0,5,$eleve->last_name.' '.$eleve->first_name,'0','','C');
        $pdf->Ln(5);
        $pdf->SetFont('Times','',10);
        $pdf->Cell(0,5,'Cat'.utf8_decode("é").'gorie / category : '.str_replace("-","/",$classe->category),'0','','C');
        $pdf->SetFont('Times','',14);
        $pdf->Ln();
        $pdf->SetFont('Times','',10);
        $pdf->Cell(0,5,'Classe / Class : '.utf8_decode(str_replace("-","/",$classe->level).' '.$classe->module),'0','','C');//.......
        $pdf->SetFont('Times','',14);
       
        $pdf->Ln(5);
        $pdf->cell(10);
        $pdf->SetFont('Times','',10);
        $pdf->Cell(105,5,'Mode de paiement/Mode of payment : '.$account->payment,'0','','L');
        if($mAmount)
        $pdf->Cell(80,5,'Somme vers'.utf8_decode("é").'e/Amount paid : '.$account->amount_paid. " Francs",'0','','L');
        else
        $pdf->Cell(80,5,'Somme vers'.utf8_decode("é").'e/Amount paid : '.$account->amount_paid,'0','','L');
        $pdf->Ln(6);
        $pdf->cell(10);
        $reste =0;
        if($mAmount && $mFees)
        $reste = $mFees - $mAmount;
        $pdf->Cell(90,5,'Arri'.utf8_decode("é").'r'.utf8_decode("é").'s d'.utf8_decode("û").'s / Fees Owed :  '.$reste.' Francs','0','','L');

        $pdf->Ln(5);
        $pdf->Cell(10);
        $pdf->SetFont('Times','',10);
        $pdf->Cell(80,5,'D'.utf8_decode("é").'but du module / Start of module : '.$classe->start_of_module,'0','','L');
        // $pdf->Cell(35,5,$classe->start_of_module,'0','','C');
        $pdf->Ln(4);
        $pdf->Cell(10);
        if($mFees)
        $pdf->Cell(60,5,'Frais des cours / Tuition fees : ' .$classe->amount." Francs",'0','','L');
        else
        $pdf->Cell(60,5,'Frais des cours / Tuition fees : ' .$classe->amount,'0','','L');
        
        $pdf->Ln(5);
        $pdf->Cell(10);
        $pdf->Cell(55,5,'Imprim'.utf8_decode("é").' le : ' .date("Y-m-d h-m-s"),'0','','L');

        $pdf->Ln(5);
        $pdf->Cell(10);
        $pdf->Cell(55,5,'Par Mr/Mme : '.session('login') ,'0','','L');

        $pdf->Ln(0);
        $pdf->SetFont('Times','B',11);
        $pdf->Cell(0,5,'Le Directeur/The Director :              ','0','','R');
        $pdf->Ln(15);
        // Footer
        $pdf->SetDrawColor('0','212','0');
        $pdf->SetFillColor(0,230,0);
        $pdf->MultiCell(0,1,'','1','','C','true');
        $pdf->Ln(0);

        $pdf->SetDrawColor('222','0','212');
        $pdf->SetFillColor(230,0,0);
        $pdf->MultiCell(0,1,'','1','','C','true');
        $pdf->Ln(0);

        $pdf->SetDrawColor('230','230','0');
        $pdf->SetFillColor(230,230,0);
        $pdf->MultiCell(0,1,'','1','','C','true');

        $pdf->Ln(1);
        // les centres
        $pdf->SetFont('Times','B',6);
        $pdf->Cell(0,4,'Centre Linguistique         Douala Centre        Buea Centre           Bamenda Centre         Ebolowa Centre             Garoua Centre           Bertoua Centre       Baffoussam Centre         Maroua Centre       Ngaound'.utf8_decode("é").'r'.utf8_decode("é").' Centre','0','','J');


        //localisation
        $pdf->Ln(3);
        $pdf->SetFont('Times','',5.9);
        $pdf->Cell(0,4,'               Pilote                   Av. de Gaulle          B.P.14                  Derri'.utf8_decode("è").'re le Garage Adm    Face CAMTEL     Derri'.utf8_decode("è").'re D'.utf8_decode("é").'l. MINCAF         R'.utf8_decode("é").'sid Gouverneur          Vers les Services du             Sis au Quartier                  BP: ','0','','J');
        // les boites postales
        $pdf->Ln(2);
        $pdf->Cell(0,4,'B.P. 7239 Yaound'.utf8_decode("é").'            B.P. 3584               T'.utf8_decode("é").'l:233,32,24,12          B.P. 560                            B.P. 1008                au plateau,BP: 960        Tel.(237) 222 24 12 60        Gouverneur                  pitoar'.utf8_decode("é").'(400 places)          Tel: (237)','0','','J');
        $pdf->Ln(2);
        $pdf->SetFont('Times','',5);

        $pdf->Cell(0,4,'E-mails: ypc@bilcam.net        T'.utf8_decode("é").'l:(237) 233 42 91 44   Middle Farms- Cit'.utf8_decode("é").'- Sic Bota    T'.utf8_decode("é").'l:(237) 233 36 32 9    T'.utf8_decode("é").'l : (237) 222,28,46,51   T'.utf8_decode("é").'l:(237) 222 27 25 97   Fax :(237) 222 24 21 60  BP :706    T'.utf8_decode("é").'l:233 18 33 40 B.P. 630    T'.utf8_decode("é").'l:222293372                       Email  ','0','','J');

        $pdf->Ln(2);
        $pdf->Cell(0,4,'www.bilcam.net                       douala.plc@bilcam.net     buea.plc@bilcam.net    bamenda.plc@bilcam.net      ebolowa.plc@bilcam.net   garoua.plc@bilcam.net         bertoua.plc@bilcam.net         baffoussam.plc@bilcam.net    maroua.plc@bilcam.net    ngaoundere.plc@bilcam.net','0','','J');
        // Footer
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
        $mAmount = (int)$account->amount_paid;
        $mFees = (int)$account->fees;


        $pdf->SetFont('Times','',16);
        $pdf->Cell(0,6,'PROGRAMME DE FORMATION LINGUISTIQUE BILINGUE','0','','C');
        $pdf->Ln();
        $pdf->SetFont('Times','I',16);
        $pdf->Cell(0,6,'BILINGUAL TRAINING PROGRAMME','0','','C'); 

        $pdf->Ln(7);


        $pdf->SetFont('Times','',16);
        $pdf->Cell(0,6,'CENTRE LINGUISTIQUE REGIONAL DE MAROUA','0','','C');
        $pdf->Ln();
        $pdf->SetFont('Times','I',16);
        $pdf->Cell(0,6,'MAROUA REGIONAL LINGUISTIC CENTRE','0','','C'); 

        $pdf->Ln(7);

        $pdf->SetFont('Times','',13);
        $pdf->Cell(0,5,"COURS D'ANGLAIS/FRANCAIS POUR ".$classe->category,'0','','C');
        $pdf->Ln();
        $pdf->cell(55);
        $pdf->SetFont('Times','I',13);
        $pdf->Cell(73,5,'ENGLISH/FRENCH COURSE FOR '.$classe->category,'0','','C');
        $date = explode('-',$account->year);
        $pdf->Ln(10);
        $pdf->SetFont('Times','',9);

        $pdf->Cell(0,5,'Ann'.utf8_decode("é").'e scolaire / Academic year  :'.$date[0]  .' ---> Trimestre/Term : ' .$account->trimestre .' ---> P'.utf8_decode("é").'riode/Period :','0','','C');
        $pdf->Image('avatar.png',20,95,-350);
        $pdf->Ln(6);
        $pdf->cell(80);
        $pdf->Cell(17,5,'Identifiant : '. utf8_decode($eleve->matricule),'0','','C');//.......

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
        $pdf->Cell(0,5,'Classe / Class : '.utf8_decode(str_replace("-","/",$classe->level.' '.$classe->module.' '.$classe->indice)),'0','','C');

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
        $total = $matieres[0]->note + $matieres[1]->note + $matieres[2]->note+ $matieres[3]->note + $matieres[4]->note;
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
            $total1 = $matieres[0]->note1 + $matieres[1]->note1 + $matieres[2]->note1+ $matieres[3]->note1 + $matieres[4]->note1;
            $pdf->Cell(13,11,$total1,'1','','C');


            $pdf->Ln();
        }
        $pdf->Cell(10);


        $pdf->Ln(0);

        $pdf->Cell(10);
        $pdf->SetFont('Times','I',9);
        $pdf->Cell(23,11,'Total','1','','C');
        $Moyenne = $total1+$total;
        if($matieres[1]->note1==-1)
        {  
            $Moyenne = $total;
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
         $reste =0;
        if($mAmount && $mFees)
         $reste = $classe->amount - $account->amount_paid;
        $pdf->Cell(70,5,'Arri'.utf8_decode("é").'r'.utf8_decode("é").'s d'.utf8_decode("û").'s / Fees Owed : '.$reste.' Francs','0','','L');

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
        if($mFees)
        $pdf->Cell(0,5,'Frais des cours / Tuition fees : '.$classe->amount. ' Francs','0','','L');
        else 
        $pdf->Cell(0,5,'Frais des cours / Tuition fees : '.$classe->amount.' Francs','0','','L');
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

        $pdf->output('D','BULLETIN_'.$eleve->last_name.'_'.$eleve->first_name.'.pdf',1);
    }

    // to generate pdf for list of student
    public function getPdfListeStudents($id, InscriptionRepository$inscriptionRepository)
    { 
        $pdf  = new RecuPdf();

        $pdf->SetFont('Times','',13);
        $pdf->AddPage();
        // recuperation des donnees

        $eleve = $inscriptionRepository->getStudent($id);
        $classe = $eleve->classe;

        // definition de l'entete
        $header = array('Id', 'NOMS ET PR'.utf8_decode("É").'NOMS', 'ARRI'.utf8_decode("É").'R'.utf8_decode("É").'S D'.utf8_decode("Û").'S','PAY'.utf8_decode("É").'E');
        // affichage de l'entete
        $pdf->Ln(15);
            $pdf->Cell(200,7,"LISTE DE ".strtoupper($classe->category.' '.utf8_decode($classe->level).' '.$classe->module).' DU '.date("y-m-d h:m"),0,0,"C");
                $pdf->Ln(15);
            $pdf->Cell(8,7,$header[0],1,0,"C");
            $pdf->Cell(110,7,$header[1],1,0,"C");
            $pdf->Cell(47,7,$header[2],1,0,"C");
            $pdf->Cell(30,7,$header[3],1,0,"C");

         $pdf->Ln();
         $j=0;;
        foreach ($classe->eleves->sortBy('last_name') as $eleve) {
            $pdf->Cell(8,7,$j,1,0,"C");
            $j++;
            if($eleve->first_name!="//")
            $pdf->Cell(110,7,utf8_decode($eleve->last_name).' '.utf8_decode($eleve->first_name),1,0,"L"); 
            else 
            $pdf->Cell(110,7,$eleve->last_name,1,0,"L"); 
                      
        $mAmount = (int) $eleve->account->amount_paid;
        $mFees = (int) $eleve->account->fees;
            $reste =0;
        if($mAmount && $mFees)
        $reste = $mFees - $mAmount;
        // arrieres dus
        $pdf->Cell(47,7,$reste,1,0,"C");
        // absences
        /*$absences = $eleve->absences;
        $ab =0;
        foreach ($absences as $absence) {
            $ab += $absence->absence;
        }
*/
	// SOMME VERSee
        $pdf->Cell(30,7,$mAmount,1,0,"C");
        $pdf->Ln(7);
        }

        $pdf->output('D','LISTE_'.strtoupper($classe->category.'_'.$classe->level.'_'.$classe->module).' '.$classe->indice.'.pdf',1);
    }
}

