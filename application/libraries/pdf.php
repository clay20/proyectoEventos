<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    require_once APPPATH."/third_party/fpdf/fpdf.php";
    class Pdf extends FPDF {		
		
        public function Header(){
            //si se requiere agregar una imagen
            //$this->Image('ruta de la imagen',x,y,ancho,alto);

              $ruta= base_url();
           $this->Image('img/log22.png',170,2,20,);
            // $this->Image('img/marca.png',0,2,200,);
            $this->SetFont('Arial','B',10);
            $this->Cell(30);
            $this->Cell(120,10,'fade-soft',0,0,'C');
            $this->Ln('10');
            $this->SetDrawColor(0,80,180);

             $this->SetFillColor(230,230,0);
             $this->SetTextColor(220,50,50);
       }

	   public function Footer(){
           $this->SetY(-15);
           $this->SetFont('Arial','I',7);
           $this->Cell(10,10,'Fecha. '.$this->PageNo().'/{nb}',0,0,'R');

           $this->Cell(20,10,'Usuario. '.$this->PageNo().'/{nb}',0,0,'R');

           $this->Cell(30,10,'Pag. '.$this->PageNo().'/{nb}',0,0,'R');
      }
}
?>