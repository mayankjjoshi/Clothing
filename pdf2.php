<?php
require('./includes/config.php');
require("fpdf/fpdf.php");

class PDF extends FPDF
{
    function Header()
    {
      $this->SetFont('Arial','B',14);
      $this->Cell(50,10,"FASHION CLOTHING",0,1);
      $this->SetFont('Arial','',14);
      $this->Cell(50,7,"Genda Circle,",0,1);
      $this->Cell(50,7,"Vadodara 490001.",0,1);
      $this->Cell(50,7,"PH : 8778731770",0,1);
      
      //Display INVOICE text
      $this->SetY(15);
      $this->SetX(-40);
      $this->SetFont('Arial','B',18);
      $this->Cell(50,10,"INVOICE",0,1);
      
      //Display Horizontal line
      $this->Line(0,48,210,48);
    }
}
 //Create A4 Page with Portrait 
 $pdf = new FPDF();
 $file= time().' .pdf';
 $pdf->output($file,'D');
?>