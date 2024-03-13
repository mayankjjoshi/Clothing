<?php
if(!empty($_POST['submit'])){
    $name = $_POST['name'];
    $placed_on = $_POST['placed_on'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $address = $_POST['address'];
    $method = $_POST['method'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    $order_id =$_POST['order_id'];


    require("./fpdf/fpdf.php");

    $pdf = new FPDF();
    $pdf->AddPage();

    $pdf->SetFont("Arial","",16);
    $pdf->Cell(0,10,"Orders Bill",1,1,'C');
    $pdf->Cell(0,10," ",0,1,'c');
    $pdf->Cell(45,10,"Order ID",1,0);
    $pdf->Cell(0,10,$order_id,1,1,'c');
    $pdf->Cell(45,10,"Name",1,0);
    $pdf->Cell(0,10,$name,1,1,'c');
    $pdf->Cell(45,10,"Placed On",1,0);
    $pdf->Cell(0,10,$placed_on,1,1,'c');
    $pdf->Cell(45,10,"Email ID",1,0);
    $pdf->Cell(0,10,$email,1,1,'c');
    $pdf->Cell(45,10,"Mobile Number",1,0);
    $pdf->Cell(0,10,$number,1,1,'c');
   // $pdf->Cell(45,10,"Product",1,0);
    //$pdf->Cell(0,50,$image,1,1,'c');
    $pdf->Cell(45,30,"Address",1,0);
    $pdf->Cell(0,30,$address,1,1,'c');
    $pdf->Cell(45,10,"Payment Method",1,0);
    $pdf->Cell(0,10,$method,1,1,'c');
    $pdf->Cell(45,10,"Total Price",1,0);
    $pdf->Cell(0,10,$price,1,1,'c');
    $pdf->Cell(45,10,"Payment Status",1,0);
    $pdf->Cell(0,10,$status,1,1,'c');

    $file= time().' .pdf';
    $pdf->output($file,'D');
}

?>