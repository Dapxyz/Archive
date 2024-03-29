<?php 
  require ("fpdf/fpdf.php");

  include("koneksi.php");
  $no = 1;
  $totalPrice = 0;
  $products_info = [];
  $totalQty = 0;
  $totalAllQty = 0;
  $total = 0;
  $data = mysqli_query($koneksi, "SELECT 
  pesan.id, 
  pesan.cakeType, 
  pesan.quantity, 
  pesan.deliveryDate, 
  pesan.price, 
  pesan.message, 
  pengiriman.metode_pembayaran, 
  pengiriman.resi, 
  pengiriman.status
  FROM pesan
  LEFT JOIN pengiriman 
  ON pesan.id = pengiriman.id;
  ");
  while ($r = mysqli_fetch_array($data)) {
    $id = $r['id'];
    $cakeType = $r['cakeType'];
    $quantity = $r['quantity'];
    $deliveryDate = $r['deliveryDate'];
    $price = $r['price'];
    $formattedPrice = number_format($r['price'], 0, ',', '.'); // Format angka dengan pemisah ribuan
    $message = $r['message'];
    $status = $r['status'];
    $totalQty += $quantity;
    $totalAllQty += $totalQty;
    $total = $price * $quantity;
    $totalPrice += $total;

    $products_info[]=[
      'cakeType' => $cakeType,
      'qty' => $quantity,
      'deliveryDate' => $deliveryDate,
      'price' => $formattedPrice,
      'formattedPrice' => $formattedPrice,
      'message' => $message,
      'total' => number_format($total, 0, ',', '.')
  ];
  }
  //email and invoice details
  $info=[
    "email"=>"email : boluibukokom@rocketmail.com",
    "instagram"=>"instagram : @_boluibukokom_",
    "telp"=>"No.Hp/WA : 081324584831",
    "invoice_no"=> 'INV' . rand(100000, 999999),
    "invoice_date"=> date('d-m-Y'),
    "total_amt"=>number_format($totalPrice, 0, ',', '.'),
    "total_qty"=>$totalQty,
    "words"=>"Rupees Five Thousand Two Hundred Only",
  ];
  
  class PDF extends FPDF
  {
    function Header(){
      
      //Display Company Info
      $this->SetFont('Arial','B',14);
      $this->Cell(50,10,"BOLU IBU KOKOM",0,1);
      $this->SetFont('Arial','',14);
      $this->Cell(50,7,"Jl. Panca Desa Nagrak,",0,1);
      $this->Cell(50,7,"Kecamatan Pacet",0,1);
      $this->Cell(50,7,"Kabupaten Bandung",0,1);
      
      //Display INVOICE text
      $this->SetY(15);
      $this->SetX(-90);
      $this->SetFont('Arial','B',18);
      $this->Cell(50,10,"LAPORAN PENJUALAN",0,1);
      
      //Display Horizontal line
      $this->Line(0,48,210,48);
    }
    
    function body($info,$products_info){
      
      //Billing Details
      $this->SetY(55);
      $this->SetX(10);
      $this->SetFont('Arial','B',12);
      $this->Cell(50,10,"Contact Us: ",0,1);
      $this->SetFont('Arial','',12);
      $this->Cell(50,7,$info["email"],0,1);
      $this->Cell(50,7,$info["instagram"],0,1);
      $this->Cell(50,7,$info["telp"],0,1);
      
      //Display Invoice no
      $this->SetY(55);
      $this->SetX(-60);
      $this->Cell(50,7,"Invoice No : ".$info["invoice_no"]);
      
      //Display Invoice date
      $this->SetY(63);
      $this->SetX(-60);
      $this->Cell(50,7,"Invoice Date : ".$info["invoice_date"]);
      
      //Display Table headings
      $this->SetY(95);
      $this->SetX(10);
      $this->SetFont('Arial','B',12);
      $this->Cell(80,9,"DESCRIPTION",1,0);
      $this->Cell(40,9,"PRICE",1,0,"C");
      $this->Cell(30,9,"QTY",1,0,"C");
      $this->Cell(40,9,"TOTAL",1,1,"C");
      $this->SetFont('Arial','',12);
      
      //Display table product rows
      foreach($products_info as $row){
        $this->Cell(80,9,$row["cakeType"],"LR",0);
        $this->Cell(40,9,$row["price"],"R",0,"R");
        $this->Cell(30,9,$row["qty"],"R",0,"C");
        $this->Cell(40,9,$row["total"],"R",1,"R");
      }
      //Display table empty rows
      for($i=0;$i<12-count($products_info);$i++)
      {
        $this->Cell(80,9,"","LR",0);
        $this->Cell(40,9,"","R",0,"R");
        $this->Cell(30,9,"","R",0,"C");
        $this->Cell(40,9,"","R",1,"R");
      }
      //Display table total row
      $this->SetFont('Arial','B',12);
      $this->Cell(120,9,"TOTAL",1,0,"C");
      // $this->Cell(150,9,"TOTAL",1,0,"C");
      $this->Cell(30,9,$info["total_qty"],1,0,"C");
      $this->Cell(40,9,$info["total_amt"],1,1,"R");
      
      //Display amount in words
      // $this->SetY(225);
      // $this->SetX(10);
      // $this->SetFont('Arial','B',12);
      // $this->Cell(0,9,"Amount in Words ",0,1);
      // $this->SetFont('Arial','',12);
      // $this->Cell(0,9,$info["words"],0,1);
      
    }
    function Footer(){
      
      //set footer position
      $this->SetY(-50);
      $this->SetFont('Arial','B',12);
      $this->Cell(0,10,"Bolu ibu kokom",0,1,"R");
      $this->Ln(15);
      $this->SetFont('Arial','',12);
      $this->Cell(0,10,"Authorized Signature",0,1,"R");
      $this->SetFont('Arial','',10);
      
      //Display Footer Text
      $this->Cell(0,10,"This is a computer generated invoice",0,1,"C");
      
    }
    
  }
  //Create A4 Page with Portrait 
  $pdf=new PDF("P","mm","A4");
  $pdf->AddPage();
  $pdf->body($info,$products_info);
  $pdf->Output();
?>