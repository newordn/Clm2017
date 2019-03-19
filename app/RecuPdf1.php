<?php
namespace App;
use Codedge\Fpdf\Fpdf\Fpdf;

class RecuPdf1 extends Fpdf
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



}