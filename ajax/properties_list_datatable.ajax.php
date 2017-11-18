<?php
header('Content-type: application/json;  Charset=UTF-8');
include("../config.php");
include(BASE_PATH."/app/classes/PropertyManager.php");
include(BASE_PATH."/app/classes/Utils.php");
include(BASE_PATH."/app/classes/PropertyLinksAndTitles.php");

$params = Array("id_ads_status = 1");
$values = Array();
$rand_num = Rand(0,100);
$baseImgPath = SITE_URL."/public/images/images_properties";
$imgEof  = "img_eof/Immagine_eof.jpg";
$maxTitLen = 43;


$propertyM = new PropertyManager();

//sintassi di base che si aspetta datatable , cioè un json con elemento padre aaData e i sottoelementi contengono i dati
$array_res = array("aaData"=>array());



if(isset($_GET["category"]))bindParamsValues("category = ?",$_GET["category"]);
if(isset($_GET["contract"]))bindParamsValues("contract = ?",$_GET["contract"]);
if(isset($_GET["tipology"]))bindParamsValues("tipology in(?)",$_GET["tipology"]);
if(isset($_GET["town"]))bindParamsValues("town in(?)",$_GET["town"]);
if(isset($_GET["district"]))bindParamsValues("district =?",$_GET["district"]);

if(isset($_GET["priceMin"]))bindParamsValues("price >= CAST(? AS UNSIGNED)",$_GET["priceMin"]);
if(isset($_GET["priceMax"]))bindParamsValues("price <= CAST(? AS UNSIGNED)",$_GET["priceMax"]);
if(isset($_GET["mqMin"]))bindParamsValues("mq >= CAST(? AS UNSIGNED)",$_GET["mqMin"]);
if(isset($_GET["mqMax"]))bindParamsValues("mq <= CAST(? AS UNSIGNED)",$_GET["mqMax"]);
if(isset($_GET["locals"]))bindParamsValues("locals = ?",$_GET["locals"]);
if(isset($_GET["bathrooms"]))bindParamsValues("bathrooms_short >= ?",$_GET["bathrooms"]);
if(isset($_GET["propertyStatus"]))bindParamsValues("property_status = ?",$_GET["propertyStatus"]);
if(isset($_GET["garden"]))bindParamsValues("garden = ?",$_GET["garden"]);
if(isset($_GET["elevator"]))bindParamsValues("elevator = ?",$_GET["elevator"]);
if(isset($_GET["box"]))bindParamsValues("box = ?",$_GET["box"]);

/*var_dump($params);
var_dump($values);*/







$res = $propertyM->readAllAds($params,null,$values,null,false);


$resultFound = Count($res);

if ($resultFound>0 && $resultFound!="" && $resultFound!=null){
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
        $imgPathNormal = $propertyM->getImagesPath("title = ?","limit 1", array("normal"),"path",false)[0]["path"];
        $imgPathBig = $propertyM->getImagesPath("title = ?","limit 1", array("big"),"path",false)[0]["path"];

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

function bindParamsValues($param,$value){
    global $params,$values;
    array_push($params, $param);
    array_push($values, urldecode($value));
}
//echo(json_encode($array_res));