<?php
$con = mysqli_connect("localhost","root","","fashion1");
if(!$con){
    echo "Connection Failed " . " ". mysqli_connect_error();
}
require("./fpdf/fpdf.php");

    $pdf = new FPDF();
    $pdf->AddPage();
    $order_id='';
    $user_id='';

    if(isset($_GET['submit'])){
      $order_id =$_GET['order_id'];
      $user_id=$_GET['user_id'];

     //Display Company Info
     $pdf->SetFont('Arial','B',14);
     $pdf->Cell(50,10,"FASHION CLOTHING",0,1);
     $pdf->SetFont('Arial','',14);
     $pdf->Cell(50,7,"Genda Circle,",0,1);
     $pdf->Cell(50,7,"Vadodara 490001.",0,1);
     $pdf->Cell(50,7,"PH : 8778731770",0,1);
     
     //Display INVOICE text
     $pdf->SetY(15);
     $pdf->SetX(-40);
     $pdf->SetFont('Arial','B',18);
     $pdf->Cell(50,10,"INVOICE",0,1);
     
     //Display Horizontal line
     $pdf->Line(0,48,210,48);


      $sql="select * from ordered where user_id='$user_id'";
      $res=mysqli_query($con,$sql);
      while($row=mysqli_fetch_assoc($res)){
        $name=$row['name'];
        $number=$row['number'];
        $email=$row['email'];
        $flat=$row['flat'];
        $street=$row['street'];
        $city=$row['city'];
        $state=$row['state'];
        $country=$row['country'];
        $pincode=$row['pincode'];
        $added_on=$row['added_on'];
      }
      
       //Billing Details
       $pdf->SetY(55);
       $pdf->SetX(10);
       $pdf->SetFont('Arial','B',12);
       $pdf->Cell(50,10,"Bill To: ",0,1);
       $pdf->SetFont('Arial','',12);
       $pdf->Cell(50,7,$name,0,1);
       $pdf->Cell(50,7,$flat.','.$street.',',0,1);
       $pdf->Cell(50,7,$city.','.$state.',',0,1);
       $pdf->Cell(50,7,$country.'-'.$pincode,0,1);
       
       //Display Invoice no
       $pdf->SetY(55);
       $pdf->SetX(-60);
       $pdf->Cell(50,7,"Invoice No : ".$order_id);
       
       //Display Invoice date
       $pdf->SetY(63);
       $pdf->SetX(-60);
       $pdf->Cell(50,7,"Invoice Date : ".$added_on);

       $pdf->SetY(95);
       $pdf->SetX(10);
       $pdf->SetFont('Arial','B',12);
       $pdf->Cell(80,9,"DESCRIPTION",1,0);
       $pdf->Cell(40,9,"PRICE",1,0,"C");
       $pdf->Cell(30,9,"QTY",1,0,"C");
       $pdf->Cell(40,9,"TOTAL",1,1,"C");
       $pdf->SetFont('Arial','',12);

       $select_orders=mysqli_query($con,"select distinct(order_detail.orderdetail_id),order_detail.*,product.pname,product.image from order_detail,product,ordered where order_detail.order_id='$order_id' and ordered.user_id='$user_id' and product.pro_id=order_detail.product_id") or die('query Failed');
       if(mysqli_num_rows($select_orders)>0){
        $total=0;
        $subtotal=0;
       while($fetch_orders=mysqli_fetch_assoc($select_orders)){
         $total=$total+($fetch_orders['price'] * $fetch_orders['qty']);
         $pname=$fetch_orders['pname'] ;
         $qty= $fetch_orders['qty'];
         $price=$fetch_orders['price'] ;
         $subtotal= $fetch_orders['price'] * $fetch_orders['qty'];

        $pdf->Cell(80,9,$pname,"LR",0);
        $pdf->Cell(40,9,$price,"R",0,"R");
        $pdf->Cell(30,9,$qty,"R",0,"C");
        $pdf->Cell(40,9,$subtotal,"R",1,"R");
      }
      for($i=0;$i<10;$i++)
      {
        $pdf->Cell(80,9,"","LR",0);
        $pdf->Cell(40,9,"","R",0,"R");
        $pdf->Cell(30,9,"","R",0,"C");
        $pdf->Cell(40,9,"","R",1,"R");
      }
      //Display table total row
      $pdf->SetFont('Arial','B',12);
      $pdf->Cell(150,9,"TOTAL",1,0,"R");
      $pdf->Cell(40,9,$total,1,1,"R");
       }

       $pdf->SetY(245);
       $pdf->SetX(10);
       $pdf->SetFont('Arial','B',12);
       $pdf->Cell(0,9,"for FASHION CLOTHING",0,1,"R");
       $pdf->Ln(2);
       $pdf->SetFont('Arial','',12);
       $pdf->Cell(0,9,"Mayank J Joshi",0,1,"R");
       $pdf->Ln(2);
       $pdf->SetFont('Arial','',12);
       $pdf->Cell(0,9,"Authorized Signature",0,1,"R");
       $pdf->SetFont('Arial','',10);
       
       //Display Footer Text
      //  $pdf->Cell(0,9,"This is a computer generated invoice",0,1,"C");
      }
    $file= time().' .pdf';
    $pdf->output($file,'D');
?>