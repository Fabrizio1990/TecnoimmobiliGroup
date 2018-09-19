<?php
header('Content-type: application/json;  Charset=UTF-8');
require_once("../config.php");
require_once(BASE_PATH."/app/classes/PropertyManager.php");
require_once(BASE_PATH."/app/classes/Utils.php");
require_once(BASE_PATH."/app/classes/PropertyLinksAndTitles.php");
require_once(BASE_PATH."/app/classes/GenericDbHelper.php");
require_once(BASE_PATH."/app/classes/ImageHelper/ImagesInfo.php");
require_once BASE_PATH."/app/classes/AgencyManager.php";


function bindParamsValues($param,$value){
    global $params,$values;
    array_push($params, $param);
    array_push($values, urldecode($value));
}



$params = Array("id_ads_status = 1");
$extra_params = array();
$values = Array();
$rand_num = Rand(0,100);
$baseImgPath = SITE_URL."/public/images/images_properties";
$imgEof  = "img_eof/Immagine_eof.jpg";
$maxTitLen = 43;


$propertyM = new PropertyManager();

//sintassi di base che si aspetta datatable , cioè un json con elemento padre aaData e i sottoelementi contengono i dati
$array_res = array("aaData"=>array());


$dbH = new GenericDbHelper();

$agencyName = "";
$id_agency ="";
if(isset($_GET["agency"])){
    $agMng = new AgencyManager();
    $agencyName = urldecode($_GET["agency"]);
    //GET ALL AGENCY DATA
    $agencyDetails = $agMng->getAgenciesData("name = ?",null,array($agencyName),null,false);
    if(count($agencyDetails) > 0)
        $id_agency = $agencyDetails[0]["id"];
}

$contract   = isset($_GET["contract"])?$_GET["contract"]:"";
$category   = isset($_GET["category"])?$_GET["category"]:"";
$tipology   = isset($_GET["tipology"])?$_GET["tipology"]:"";
if($tipology =="Qualsiasi") $tipology = "";
$town       = isset($_GET["town"])?$_GET["town"]:"";
if($town =="Qualsiasi") $town = "";
$conditions = isset($_GET["conditions"])?$_GET["conditions"]:"";
$garden     = isset($_GET["garden"])?$_GET["garden"]:"";
$elevator   = isset($_GET["elevator"])?$_GET["elevator"]:"";
$box        = isset($_GET["box"])?$_GET["box"]:"";

$district = isset($_GET["district"])?$_GET["district"]:"";
$priceMin = isset($_GET["priceMin"])?$_GET["priceMin"]:"";
$priceMax = isset($_GET["priceMax"])?$_GET["priceMax"]:"";
$mqMin = isset($_GET["mqMin"])?$_GET["mqMin"]:"";
$mqMax = isset($_GET["mqMax"])?$_GET["mqMax"]:"";
$locals = isset($_GET["locals"])?str_replace("+","",$_GET["locals"]):"";
$bathrooms = isset($_GET["bathrooms"])?str_replace("+","",$_GET["bathrooms"]):"";

/* VARIABILI PER ORDINAMENTO */
$orderGet      = isset($_GET["order"])?explode("|",$_GET["order"]):"";
$orderKey = isset($orderGet[0]) ?$orderGet[0]:"";
$orderDir = isset($orderGet[1]) ?$orderGet[1]:"";

//echo("TOWN = ".$town." - district = ".$district);
if($id_agency > 0 && $id_agency != null)bindParamsValues("id_agency = ?",$id_agency);
if($contract!="")bindParamsValues("id_contract = ?",$contract);
if($category!="")bindParamsValues("id_category = ?",$category);
if($tipology!="")bindParamsValues("id_tipology = ?",$tipology);
if($town!="")bindParamsValues("id_town = ?",$town);
if($district!="")bindParamsValues("district Like(?)","%".$district."%");
if($priceMin!="")bindParamsValues("price >= CAST(? AS UNSIGNED)",$priceMin);
if($priceMax!="")bindParamsValues("price <= CAST(? AS UNSIGNED)",$priceMax);
if($mqMin!="")bindParamsValues("mq >= CAST(? AS UNSIGNED)",$mqMin);
if($mqMax!="")bindParamsValues("mq <= CAST(? AS UNSIGNED)",$mqMax);
if($locals!="")bindParamsValues("locals_num >= ?",$locals);
if($bathrooms!="")bindParamsValues("bathrooms_num >= ?",$bathrooms);
if($conditions!="")bindParamsValues("id_property_conditions = ?",$conditions);
if($garden!="")bindParamsValues("id_garden = ?",$garden);
if($elevator!="")bindParamsValues("id_elevator = ?",$elevator);
if($box!="")bindParamsValues("id_box = ?",$box);

/* CONTROLLO SE E' STATO SETTATO L' ORDINAMENTO E SE IL CAMPO DA ORDINARE ESISTE, SE ESISTE ORDINO, ALTRIMENTI NO*/
if($orderKey!=""){
    //$query = "CALL `new_tecnoimmobili`.`CheckColumnExist`('properties_view', '".$orderKey."')";
    $orderParExist = $dbH->executeQuery("CALL `new_tecnoimmobili`.`CheckColumnExist`('properties_view', '".$orderKey."')");
    if(intval($orderParExist[0][0]) > 0){
        array_push($extra_params,"order by ".$orderKey. " ".$orderDir);
    }
}

$res = $propertyM->readAllAds($params,$extra_params,$values,null,false);


$resultFound = Count($res);
if ($res & $resultFound>0 && $resultFound!="" && $resultFound!=null){;
    for($i=0;$i<$resultFound;$i++) {

        /*$agentData = $propertyM->getAgentData($res[$i]["id"]);*/
        $agentTel = $res[$i]["agent_phone"];
        $agentMobile = $res[$i]["agent_mobile_phone"];
        $agentMail = $res[$i]["agent_email"];


        $link = SITE_URL."/".PropertyLinksAndTitles::getDetailLink($res[$i]["contract"],$res[$i]["tipology"],$res[$i]["street"],$res[$i]["town"],$res[$i]["reference_code"]);

        $title = PropertyLinksAndTitles::getTitleNoDb($res[$i]["tipology"],$res[$i]["contract"],$res[$i]["town"],$res[$i]["street"],$res[$i]["district"]);
        $title_short = Utils::truncateText($title,$maxTitLen);

        $desc = UTILS::escapeJsonString($res[$i]["desc_it"]);
        $desc_short = substr($desc,0,250)."...";
        $price =  $res[$i]["negotiation_reserved"]?"Tratt. Riservata":"&euro; ".Utils::formatPrice($res[$i]["price"]);

        /*  IMAGES */
        //RECUPERA PATH IMMAGINI

        $imgInfo = new ImagesInfo($propertyM->conn);
        $imgPaths = $imgInfo->info;


        $imgPathNormal = $imgPaths["properties"]["normal"]["path"];
        $imgPathBig = $imgPaths["properties"]["big"]["path"];;

        $imgNormal = SITE_URL."/".$imgPathNormal."/".$imgEof;
        $imgBig = SITE_URL."/".$imgPathBig."/".$imgEof;
        if($res[$i]["img_name"]!=""){
            $imgNormal =  SITE_URL."/".$imgPathNormal.$res[$i]["img_name"];
            $imgBig = SITE_URL."/".$imgPathBig.$res[$i]["img_name"];
        }




        $property_box = "<div class='property_wrapper boxes clearfix'>";
        $property_box .= "<div class='row'>";
        $property_box .= "<div class='col-lg-6 col-md-6 col-sm-6 col-xs-12'>";
        $property_box .= "<div class='ImageWrapper boxes_img'>";
        $property_box .= "<img class='img-responsive' src='$imgNormal' alt=''>";
        $property_box .= "<div class='ImageOverlayH'></div>";
        $property_box .= "<div class='Buttons StyleSc'>";
        $property_box .= "<span class='WhiteSquare' title='Vai al dettaglio'><a  href='$link'><i class='fa fa-search fa-2'></i></a></span>";
        $property_box .= "<span class='WhiteSquare' title='Ingrandisci Foto'><a class='fancybox' href='".$imgBig."'><i class='fa fa-picture-o fa-2'></i></a></span>";
        $property_box .= "<span class='WhiteSquare' title='Contattaci'><a class='contact-modal-toggle' href='#'><i class='fa fa-envelope-o fa-2'></i></a></span>";
        $property_box .= "<div class='hiddenInfo'>";
        $property_box .= "<input type='hidden' class='email_info' value='$agentMail' />";
        $property_box .= "<input type='hidden' class='telephone_info' value='$agentTel' />";
        $property_box .= "<input type='hidden' class='mobile_info' value='$agentMobile' />";
        $property_box .= "</div>";//<!-- end hiddenInfo -->
        $property_box .="</div>";//<!-- end Buttons -->
        $property_box .= "<div class='box_type'>".$price."</div>";
        $property_box .= "<div class='status_type'>".$res[$i]['contract']."</div>";
        $property_box .="</div>";//<!-- ImageWrapper -->
        $property_box .="</div>";//<!-- end col-lg-6 -->

        $property_box .= "<div class='col-lg-6 col-md-6 col-sm-6 col-xs-12'>";
        $property_box .= "<div class='title clearfix'>";
        $property_box .= "<h3><a href='".$link."' title='$title'>$title_short</a> <small class='small_title'>in ".$res[$i]['contract']."</small> </h3>";
        $property_box .="</div>";//<!-- end title -->
        $property_box .="<div class='boxed_mini_details1 clearfix'>";

        $property_box .="<span class='type first price' title='".$price."'><strong>".$price."</strong></span>";
        $property_box .="<span class='rooms' title='".$res[$i]['rooms']."'> <i class='icon-bed'></i><b>". $res[$i]['rooms_short']."</b><br>Camere</span></span>";
        $property_box .="<span class='bathrooms' title='".$res[$i]['bathrooms']."'><i class='icon-bath'></i><b>". $res[$i]['bathrooms_short']."</b><br>Bagni</span>";
        $property_box .="<span class='sqft' title='superficie'><b>". $res[$i]['mq']."</b> m<sup>2</sup><br>Superficie</span>";

        $property_box .="</div>";//<!-- end boxed_mini_details1 -->

        $property_box .="<div class='property_desc clearfix'>";
        $property_box .="<p>".$desc_short."</p>";
        $property_box .="</div>";//<!-- end property_desc -->

        $property_box .="</div>";//<!-- end col-lg-6 -->
        $property_box .="</div>";//<!-- end row -->

        $property_box .="</div>";//<!-- end property_wrapper -->


        array_push($array_res["aaData"], array($property_box));

    }

    //echo(json_encode($array_res));
}

echo(json_encode($array_res));




//echo(json_encode($array_res));