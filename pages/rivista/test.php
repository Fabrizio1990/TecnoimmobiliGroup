<?php
include('class.ezpdf.php');

error_reporting(E_ALL);
set_time_limit(200000); 
ini_set('memory_limit','150M');



$pdf =new Cezpdf();

// seleziono font
$pdf->selectFont('./fonts/Helvetica.afm');


 


switch(date("m")){

case "1" :
$pdf->addJpegFromFile("images/cover_4.jpg",0,0,600);
break;

case "2" :
$pdf->addJpegFromFile("images/cover_4.jpg",0,0,600);
break;

case "3" :
$pdf->addJpegFromFile("images/cover_3.jpg",0,0,600);
break;

case "4" :
$pdf->addJpegFromFile("images/cover_3.jpg",0,0,600);
break;

case "5" :
$pdf->addJpegFromFile("images/cover_3.jpg",0,0,600);
break;

case "6" :
$pdf->addJpegFromFile("images/cover_1.jpg",0,0,600);
break;

case "7" :
$pdf->addJpegFromFile("images/cover_1.jpg",0,0,600);
break;

case "8" :
$pdf->addJpegFromFile("images/cover_1.jpg",0,0,600);
break;

case "9" :
$pdf->addJpegFromFile("images/cover_2.jpg",0,0,600);
break;

case "10" :
$pdf->addJpegFromFile("images/cover_2.jpg",0,0,600);
break;

case "11" :
$pdf->addJpegFromFile("images/cover_2.jpg",0,0,600);
break;

case "12" :
$pdf->addJpegFromFile("images/cover_4.jpg",0,0,600);
break;


}



$pdf->ezNewPage();


$pdf->ezStream();

?>