<?php
header('Content-type: text/json; charset=utf-8');
include("../config.php");
include(BASE_PATH."/app/classes/PropertyManager.php");
include(BASE_PATH."/app/classes/Utils.php");
include(BASE_PATH."/app/classes/PropertyLinksAndTitles.php");

$params = Array();
$values = Array();
$rand_num = Rand(0,100);
$baseImgPath = SITE_URL."/public/images/images_properties";
$imgEof  = "img_eof/Immagine_eof.jpg";
$maxTitLen = 43;


$propertyM = new PropertyManager();

//sintassi di base che si aspetta datatable , cioè un json con elemento padre aaData e i sottoelementi contengono i dati
$array_res = array("aaData"=>array());

if(isset($_GET["sel_category"])){
    $category = $_GET["sel_category"];
    if($category!="") {
        array_push($params, " id_category in(?)");
        array_push($values, str_replace(",","','",urldecode($category)));
    }
}


$res = $propertyM->readAllAds($params,null,$values,null);

$resultFound = Count($res);
if ($resultFound>0 && $resultFound!="" && $resultFound!=null){
    for($i=0;$i<$resultFound;$i++) {

        $agentData = $propertyM->getAgentData($res[$i]["id"]);
        $agentTel = $agentData[0]["phone"];
        $agentMobile = $agentData[0]["mobile_phone"];
        $agentMail = $agentData[0]["email"];


        //$title = $res[$i]["tipology"]. " " .$res[$i]["street"];
        //$title .= $res[$i]["district"] == $res[$i]["town"] ? ", ". $res[$i]["town"]: ", ".  $res[$i]["district"] .", ". $res[$i]["town"];

        $title = PropertyLinksAndTitles::getTitle($res[0]["reference_code"],4);

        $title_short = Utils::truncateText($title,$maxTitLen);


        $desc = $res[$i]["desc_it"];
        $desc_short = substr($desc,0,250)."...";
        $price =  $res[$i]["negotiation_reserved"]?"Tratt. Riservata":"&euro; ".Utils::formatPrice($res[$i]["price"]);

        if($res[$i]["img_name"] =="")
            $imgPath = $baseImgPath."/normal/".$imgEof;
        else
            $imgPath = $baseImgPath."/normal/".$res[$i]["img_name"];



        $property_box = "<div class='property_wrapper boxes clearfix'>";
            $property_box .= "<div class='row'>";
                $property_box .= "<div class='col-lg-6 col-md-6 col-sm-6 col-xs-12'>";
                    $property_box .= "<div class='ImageWrapper boxes_img'>";
                        $property_box .= "<img class='img-responsive' src='$imgPath' alt=''>";
                        $property_box .= "<div class='ImageOverlayH'></div>";
                        $property_box .= "<div class='Buttons StyleSc'>";
                            $property_box .= "<span class='WhiteSquare' title='Vai al dettaglio'><a  href='demos/01_home.jpg'><i class='fa fa-search fa-2'></i></a></span>";
                            $property_box .= "<span class='WhiteSquare' title='Ingrandisci Foto'><a class='fancybox' href='#'><i class='fa fa-picture-o fa-2'></i></a></span>";
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
                        $property_box .= "<h3><a href='single-property.html' title='$title'>$title_short</a> <small class='small_title'>in ".$res[$i]['contract']."</small> </h3>";
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
}

echo(json_encode($array_res));