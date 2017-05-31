<?php
require(BASE_PATH."/libs/backend/fpdf181/fpdf.php");
require(BASE_PATH."/app/classes/PropertyManager.php");
$pdf = new FPDF();
$mng = new PropertyManager();

$pdf->SetFont('Arial','B',16);

$pdf->AddPage();// Cover page (with season background)
$pdf->Image(getSeasonCover(), 0, 0, 210);
/*$pdf->Cell(40,10,'Hello World!');*/



$id_agency      = isset($_REQUEST["id_agency"])?$_REQUEST["id_agency"]:null;
$magazine_type  = isset($_REQUEST["magazine_type"])?$_REQUEST["magazine_type"]:null;

$res            = null;
$params         = null;
$extra_params   = array("order by id_agency asc,date_up desc");
$values         = null;
$fields         = null;





if($id_agency!= null){
    $params = array("id_agency = ?");
    $values = array($id_agency);
}

if($magazine_type!= null) {
    switch ($magazine_type) {
        case "prestige":
            if(is_array($params))
                array_push($params,"is_prestige = 1");
            else
            $params = array("is_prestige = 1");
            break;
        case "companies":
            if(is_array($params))
                array_push($params,"id_category = 2");
            else
                $params = array("id_category = 2");
            break;

    }

}

$res = $mng->readAllAds($params,$extra_params,$values ,$fields,false);

$lastAgencyId = 0;
for($i = 0,$len = Count($res) ; $i<$len ; $i++){
    $agencyId = $res[$i]["id_agency"];

  if($agencyId!=$lastAgencyId){
      $lastAgencyId = $agencyId;
      $pdf->AddPage();
      $pdf->Image(SITE_URL."/public/images/images_magazine/background_agency_details.jpg", 0, 0, 210);
  }
  else if($i == 0 || (($i+1)%9) == 0 ){
      $pdf->AddPage();
      $pdf->Image(SITE_URL."/public/images/images_magazine/background.jpg", 0, 0, 210);
  }

    //$pdf->Cell(40,10,$res[$i]["id_agency"],1);

}







//var_dump($res);

$pdf->Output();



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