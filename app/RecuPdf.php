<?php
namespace App;
use Codedge\Fpdf\Fpdf\Fpdf;

class RecuPdf extends Fpdf
{
	
    // En-tête
        public function Header()
        {

        $this->SetFont('Times','',7);
        $this->Cell(40,10,'REPUBLIQUE DU CAMEROUN','0','','C');
        $this->Cell(10);
        $this->Cell(90,3,' For effective bilingualism','0','','C');
        $this->Cell(10);
        $this->Cell(30,10,'REPUBLIC OF CAMEROON','0','','C');
        $this->Ln(1);
        $this->Cell(40,15,'Paix - Travail - Patrie','0','','C');
        $this->Cell(10);
        $this->Cell(90,3,'','0','','C');
        $this->Cell(10);
        $this->Cell(30,15,'Peace - Work - Fatherland','0','','C');
        $this->Ln(6);
        $this->Cell(40,10,'PRESIDENCE DE LA REPUBLIQUE','0','','C');
        $this->Cell(45);
        $this->Image('iss.png',98,13,-430);
        $this->Cell(160,10,'PRESIDENCY OF THE REPUBLIC','0','','C');
        $this->Ln(3);
        $this->Cell(40,10,'SECRETARIAT GENERAL','0','','C');
        $this->Cell(10);
        $this->Cell(90,15,'Pour un bilinguisme efficace','0','','C');
        $this->Cell(5);
        $this->Cell(40,10,'SECRETARIAT GENERAL','0','','C');
        $this->Ln(5);
        $this->Cell(90);
        $this->Cell(10,15,'','0','','C');
        $this->Ln(10);
        }

        // Pied de page
        public function Footer()
        {
            // Positionnement à 1,5 cm du bas
        $this->SetY(-18);
        $this->SetDrawColor('0','212','0');
        $this->SetFillColor(0,230,0);
        $this->MultiCell(0,1,'','1','','C','true');
        $this->Ln(0);

        $this->SetDrawColor('222','0','212');
        $this->SetFillColor(230,0,0);
        $this->MultiCell(0,1,'','1','','C','true');
        $this->Ln(0);

        $this->SetDrawColor('230','230','0');
        $this->SetFillColor(230,230,0);
        $this->MultiCell(0,1,'','1','','C','true');

        $this->Ln(1);
        // les centres
        $this->SetFont('Times','B',6);
        $this->Cell(0,4,'Centre Linguistique         Douala Centre        Buea Centre           Bamenda Centre         Ebolowa Centre             Garoua Centre           Bertoua Centre       Baffoussam Centre         Maroua Centre       Ngaound'.utf8_decode("é").'r'.utf8_decode("é").' Centre','0','','J');


        //localisation
        $this->Ln(3);
        $this->SetFont('Times','',5.9);
        $this->Cell(0,4,'               Pilote                   Av. de Gaulle          B.P.14                  Derri'.utf8_decode("è").'re le Garage Adm    Face CAMTEL     Derri'.utf8_decode("è").'re D'.utf8_decode("é").'l. MINCAF         R'.utf8_decode("é").'sid Gouverneur          Vers les Services du             Sis au Quartier                  BP: ','0','','J');
        // les boites postales
         $this->Ln(2);
        $this->Cell(0,4,'B.P. 7239 Yaound'.utf8_decode("é").'            B.P. 3584               T'.utf8_decode("é").'l:233,32,24,12          B.P. 560                            B.P. 1008                au plateau,BP: 960        Tel.(237) 222 24 12 60        Gouverneur                  pitoar'.utf8_decode("é").'(400 places)          Tel: (237)','0','','J');
        $this->Ln(2);
         $this->SetFont('Times','',5);

        $this->Cell(0,4,'E-mails: ypc@bilcam.net        T'.utf8_decode("é").'l:(237) 233 42 91 44   Middle Farms- Cit'.utf8_decode("é").'- Sic Bota    T'.utf8_decode("é").'l:(237) 233 36 32 9    T'.utf8_decode("é").'l : (237) 222,28,46,51   T'.utf8_decode("é").'l:(237) 222 27 25 97   Fax :(237) 222 24 21 60  BP :706    T'.utf8_decode("é").'l:233 18 33 40 B.P. 630    T'.utf8_decode("é").'l:222293372                       Email  ','0','','J');

         $this->Ln(2);
        $this->Cell(0,4,'www.bilcam.net                       douala.plc@bilcam.net     buea.plc@bilcam.net    bamenda.plc@bilcam.net      ebolowa.plc@bilcam.net   garoua.plc@bilcam.net         bertoua.plc@bilcam.net         baffoussam.plc@bilcam.net    maroua.plc@bilcam.net    ngaoundere.plc@bilcam.net','0','','J');


       
       
        }
        
    

}