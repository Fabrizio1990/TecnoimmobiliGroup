<?php

// THIS PAGE IS SIMILAR TO STAMPA_RIVISTA BUT IT TAKES DATA FROM ANOTHER TABLE
require(BASE_PATH."/libs/backend/fpdf181/fpdf.php");
require(BASE_PATH."/app/classes/MagazineManager.php");
require(BASE_PATH."/app/classes/AgencyManager.php");
require(BASE_PATH."/app/classes/Utils.php");

$pdf = new FPDF();
$mng = new MagazineManager();
$agMng  = new AgencyManager();



$pdf->SetFont('Arial','B',16);
$pdf->SetAutoPageBreak(false, 0);
$pdf->AddPage();// Cover page (with season background)
$pdf->Image(getSeasonCover(), 0, 0, 210);




$id_agency      = isset($_REQUEST["id_agency"])?$_REQUEST["id_agency"]:null;
$magazine_type  = isset($_REQUEST["magazine_type"])?$_REQUEST["magazine_type"]:null;

$res            = null;
$params         = null;
$extra_params   = array("order by id_agency asc,date_up desc");
$values         = null;
$fields         = null;

/* ############ BASE VALUE FOR POSITION PLACEMENTS ############ */
/* INITIAL POSITIONS */
$box_pos   = array("x" => 14.5   , "y" => 40 );
$image_pos = array("x" => 17     , "y" => 43 );
$title_pos = array("x" => 16.5   , "y" => 75 );
$specs_pos = array("x" => 16.5   , "y" => 78 );
$price_pos = array("x" => 16.5   , "y" => 83 );
$desc_pos  = array("x" => 16.5   , "y" => 88 );
/*INCREMENTS VALUE */
$xMultiplier = 65;
$yMultiplier = 75;
/* NUM COL AND ROW */
$maxCol = 3;
$maxRow = 3;

/* ############ /END BASE VALUE FOR POSITION PLACEMENTS ############ */


$res = $mng->getMagazineProperties($id_agency,1);

$lastAgencyId = 0;
$defX = 75;
$defY = 15;
$step_x = "";
$step_y = "";
$x =  0;
$y = 0;

$inPageIdx = 1 ; // Used to set row position of propertyCards in page
$pageNum = 1; // Used to set PageNum
for($i = 0,$len = Count($res) ; $i<$len ; $i++){
    //echo($inPageIdx);
    $agencyId = $res[$i]["id_agency"];

    if($agencyId!=$lastAgencyId){ // NEW Agency Page
        $lastAgencyId = $agencyId;
        $pdf->AddPage();
        $pdf->Image(SITE_URL."/public/images/images_magazine/background_agency_details.jpg", 0, 0, 210);
        $agData = $agMng->getAgenciesData("id = ?",null,array($res[$i]["id_agency"]) ,null, false);
        $operatorData = $agMng->getOperators("id_agency = ?",array("order by id asc  limit 1"),array($res[$i]["id_agency"]),null,false);

        writeAgencyData($pdf,$agData[0],$operatorData[0]);
        $inPageIdx = 1 ;

        writePageNum($pdf,$pageNum);
        $pageNum++;

    }
    else if($i == 0 || (($i+1)%9) == 0 ){ // NEW PAGE
        $pdf->AddPage();
        $pdf->Image(SITE_URL."/public/images/images_magazine/background.jpg", 0, 0, 210);
        $inPageIdx = 1 ;

        writePageNum($pdf,$pageNum);
        $pageNum++;
    }

    writePropertyCard($pdf,$res,$i,$inPageIdx);
    $inPageIdx ++;

}

$pdf->Output(); // PRINT PDF

function writePageNum($pdf,$pageNum){
    $pdf->SetFontSize(10);
    $pdf->setY(278.5);
    $pdf->setX(103);
    $pdf->Cell(4,4,$pageNum,0,0,"C");
}

function writePropertyCard($pdf,$res,$i,$inPageIdx){
    global $box_pos ,$image_pos,$title_pos,$specs_pos,$price_pos,$desc_pos ;

    $title = $res[$i]["contract"] ." " . $res[$i]["tipology"];
    $specs = "Mq ".$res[$i]["mq"]." - ".$res[$i]["locals"];
    $price = "€ ".Utils::formatPrice($res[$i]["price"]);
    $description = strlen($res[$i]["desc_it"])>180?substr($res[$i]["desc_it"],0,180)."....":$res[$i]["desc_it"];

    $pdf->Image(SITE_URL."/public/images/images_magazine/bg_annuncio_rivista.jpg", getColPos($box_pos["x"],$i), getRowPos($box_pos["y"],$inPageIdx), 50);

    $pdf->Image(SITE_URL."/public/images/images_properties/normal/".$res[$i]["img_path"], getColPos($image_pos["x"],$i), getRowPos($image_pos["y"],$inPageIdx), 45,27);
    $pdf->SetFontSize(7);
    $pdf->setY(getRowPos($title_pos["y"],$inPageIdx));
    $pdf->setX(getColPos($title_pos["x"],$i));
    $pdf->Cell(40,4,iconv('UTF-8', 'windows-1252',$title),0,0);

    $pdf->setY(getRowPos($specs_pos["y"],$inPageIdx));
    $pdf->setX(getColPos($specs_pos["x"],$i));
    $pdf->Cell(40,4,iconv('UTF-8', 'windows-1252',$specs),0,0);

    $pdf->SetTextColor(21,33,255);
    $pdf->setY(getRowPos($price_pos["y"],$inPageIdx));
    $pdf->setX(getColPos($price_pos["x"],$i));
    $pdf->Cell(40,4,iconv('UTF-8', 'windows-1252',$price),0,0);

    $pdf->SetFontSize(6);
    $pdf->SetTextColor(0,0,0);
    $pdf->setY(getRowPos($desc_pos["y"],$inPageIdx));
    $pdf->setX(getColPos($desc_pos["x"],$i));
    $pdf->MultiCell(45,3,iconv('UTF-8', 'windows-1252',$description),0,"L");
}


function writeAgencyData($pdf,$agData,$operatorData){
    $address = $agData["street"].", ".$agData["street_num"]." - ".$agData["town"]."(".$agData["city_short"].")";
    $contacts = "Tel ".$operatorData["phone"]." - Fax ".$operatorData["fax"]. " - Cellulare ".$operatorData["mobile_phone"]." - Email ".$operatorData["email"];
    $pdf->SetFont("helvetica",'',9);
    $pdf->SetFontSize(9);
    $pdf->SetTextColor(21,33,255);
    $pdf->Cell(40,4,'AGENZIA DI RIFERIMENTO',0,1);
    $pdf->SetFontSize(7);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(40,4,$agData["banner"],0,1);
    $pdf->Cell(40,4,$address,0,1);
    $pdf->Cell(40,4,$contacts,0,1);
    $pdf->SetFont("helvetica",'B',9);
    $pdf->Cell(40,13,"Area di competenza ".$agData["competence_area"],0,1);
    $pdf->SetFont("helvetica",'',16);
}

function getColPos($defPosX,$i){
    global $xMultiplier,$maxCol;
    return $defPosX + (($i % $maxCol) * $xMultiplier);
}
function getRowPos($defPosY,$inPageIdx){

    global $yMultiplier;
    $multiplier = 0 ;
    if($inPageIdx>3 && $inPageIdx <7)
        $multiplier = 1;
    else if($inPageIdx >6 && $inPageIdx < 10)
        $multiplier = 2;
    return $defPosY + ($yMultiplier * $multiplier);
}

function getSeasonCover(){
    $coverPath = SITE_URL."/public/images/images_magazine/";
    switch(date("m")){
        case "1" :
        case "2" :
        case "12" :
            $coverPath.="cover_1.jpg";
            break;
        case "3" :
        case "4" :
        case "5" :
            $coverPath.="cover_2.jpg";
            break;
        case "6" :
        case "7" :
        case "8" :
            $coverPath.="cover_3.jpg";
            break;
        case "9" :
        case "10" :
        case "11" :
            $coverPath.="cover_4.jpg";
            //$pdf->addJpegFromFile("images/cover_4.jpg",0,0,600);
            break;
    }

    return $coverPath;
}