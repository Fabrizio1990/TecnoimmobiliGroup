
<?php
    //TODO IMPOSTARE PATH IMMAGINE PICCOLA ,recuperare campi veri e non id , immagini non ancora presenti, prenderle dall' altro sito e molte altre cose da finire
	header('Content-type: text/json; charset=utf-8');
	include("../../config.php");
    include(BASE_PATH."/app/classes/UserManager.php");
    include(BASE_PATH."/app/classes/PropertyManager.php");


    $params = Array();
    $values = Array();
	$rand_num = Rand(0,100);
    $baseImgPath = SITE_URL."/public/images/images_properties";
    $imgEof  = "img_eof/Immagine_eof.jpg";

    $propertyM = new PropertyManager();
    $userLogged = SessionManager::getVal("user",true);
	$agency_id = $userLogged->id;
	$array = array("aaData"=>array());//sintassi di base che si aspetta datatable , cioè un json con elemento padre aaData e i sottoelementi contengono i dati


    if(isset($_GET["date_up"])){
        array_push($params,"data_up = ?");
        array_push($values);
    }

    // se agenzia admin può richiedere immobili di tutte le agenzie altrimenti no
	if($userLogged->id_user_type==1){
	    if(isset($_GET["agency"]) ){
	        if($_GET["agency"]!=""){
                array_push($params," id_agency = ?");
                array_push($values,$_GET["agency"]);
            }
	       }
	}else{
        array_push($params," id_agency = ?");
        array_push($values,$agency_id);
	}
    // controllo il range di date (FROM)
	if(isset($_GET["dt_from"])){
	    if($_GET["dt_from"]!="") {
            array_push($params, " date_ins > ?");
            array_push($values, $_GET["dt_from"]);
        }
    }

    if(isset($_GET["dt_to"])){
        if($_GET["dt_to"]!="") {
            array_push($params, " date_ins < ?");
            array_push($values, $_GET["dt_to"]);
        }
    }

    if(isset($_GET["category"])){
        if($_GET["category"]!="") {
                array_push($params, " id_category in(?)");
                array_push($values, str_replace(",","','",urldecode($_GET["category"])));
        }
    }

    if(isset($_GET["tipology"])){
        if($_GET["tipology"]!="") {
            array_push($params, " id_tipology in(?)");
            array_push($values, str_replace(",","','",urldecode($_GET["tipology"])));
        }
    }



    if(isset($_GET["country"])){
        if($_GET["country"]!="") {
            array_push($params, " id_country  in(?)");
            array_push($values, str_replace(",","','",urldecode($_GET["country"])));
        }
    }

    if(isset($_GET["region"])){
        if($_GET["region"]!="") {
            array_push($params, " id_region  in(?)");
            array_push($values, str_replace(",","','",urldecode($_GET["region"])));
        }
    }

    if(isset($_GET["city"])){
        if($_GET["city"]!="") {
            array_push($params, " id_city in(?)");
            array_push($values, str_replace(",","','",urldecode($_GET["city"])));
        }
    }



    if(isset($_GET["town"])){
        if($_GET["town"]!="") {
            array_push($params, " id_town   in(?)");
            array_push($values, str_replace(",","','",urldecode($_GET["town"])));
        }
    }

    if(isset($_GET["district"])){
        if($_GET["district"]!="") {
            array_push($params, " id_district   in(?)");
            array_push($values, str_replace(",","','",urldecode($_GET["district"])));
        }
    }

    // stato dell annuncio (non geografico)
    if(isset($_GET["ads_status"])){
        if($_GET["ads_status"]!="") {
            array_push($params, " id_ads_status   in(?)");
            array_push($values, str_replace(",","','",urldecode($_GET["ads_status"])));
        }
    }else{
        array_push($params, " id_ads_status   in(1,2,4)");//ENABLED,DISABLED
    }
    //var_dump($values);

    $res = $propertyM->readAllAds($params,null,$values,null);

	$resultFound = Count($res);
	if ($resultFound>0 && $resultFound!="" && $resultFound!=null){
	    for($i=0;$i<$resultFound;$i++) {
            $resImg = "";
            /* --- CONVERTO LE DATE TOGLIENDO L'ora (ma metto la data completa hidden perchè serve per un ordinamento corretto --*/
            $data_up = Date("d-m-Y", strtotime($res[$i]["date_up"]));
            $data_ins = Date("d-m-Y", strtotime($res[$i]["date_ins"]));
            $data_ins_field = "<span style='display:none'>" . $res[$i]["date_ins"] . "</span>" . $data_ins;
            $data_up_field = "<span style='display:none'>" . $res[$i]["date_up"] . "</span>" . $data_up;

            $imgTit = "";


            // Dati proprietario che verranno mostrati nel title dell' immagine (tooltip bootstrap)
            $infoImg = "";
            if($userLogged->id_user_type==1 &&  $res[$i]["id_easywork"]!=null && $res[$i]["id_easywork"]!="0"){
                $retApp = $propertyM->getAppointment($res[$i]["id"]);
                $imgTit.="<h3>Dati proprietario</h3>";
                $imgTit.="<p><i>Nome  : </i><b>".$retApp[0]["owner_name"]."</b>";
                $imgTit.="<p><i>Cognome  : <b>".$retApp[0]["owner_lastname"]."</b>";
                $imgTit.="<p><i>Provincia  : </i><b>".$retApp[0]["owner_town"]."</b>";
                $imgTit.="<p><i>Indirizzo  : </i><b>".$retApp[0]["owner_address"]."</b>";
                $imgTit.="<p><i>Cellulare : </i><b>".$retApp[0]["owner_mobile"]."</b>";
                $infoImg = "<img style='position:absolute;'  src='".SITE_URL."/AdminPanel/images/icons/ico_info_20x20.png'/>";
            }

            // Descrizione dell' immobile, verrà mostrata nel title dell immagine di copertina

            $imgTit .="<h3>Descrizione Immobile</h3>";
            $description = htmlentities($res[$i]["desc_it"], ENT_QUOTES);
            $imgTit .= $description ==""?"Nessuna descrizione":"<p>".$description."</p>";


            if($res[$i]["img_name"] =="")
                $imgPath = $baseImgPath."/min/".$imgEof;
            else
                $imgPath = $baseImgPath."/min/".$res[$i]["img_name"];

            $first_col = "
            <form name='GoToAds' method='POST' ACTION='".SITE_URL."/AdminPanel/add_property.php'>
            <input type='hidden' name='id_ads' value='".$res[$i]["id"]."'/>
            ".$infoImg."
            <img  onclick='this.parentNode.submit()' class='real_tumb POINTER Tooltip'  src=$imgPath?id=". $rand_num . "' alt='Immagine Mancante' data-toggle='tooltip' data-placement='right' data-html='true' title='".$imgTit."'/> </form>";

            /* ------------ RECUPERO DATI PER COLONNA STATO ------------ */
            // immagine stato
            $strstatus = SITE_URL."/".$res[$i]["ads_status_icon"];


            /* ----- SEMPRE NELLA COLONNA STATO VISUALIZZO LE VARIE ICONE IN BASE al contract_status---------- */
            $contract_status = $res[$i]["id_contract_status"];
            $contract_status_image_path = $res[$i]["contract_status_icon"];
            $ico_contract_status="";
            if($contract_status_image_path!="")
                $ico_contract_status = "<img style=' border:0;' title='".$res[$i]["contract_status"]."' src='".SITE_URL."/".$contract_status_image_path."'>";

        //compongo la cella stato
        $ads_status = '<div id="stato_annuncio'.$res[$i]["id"].'"><img onclick="openAdsStatusSwitch('.$res[$i]["id"].',' . $res[$i]['id_ads_status'] . ',this)" id="ads_status_img_'.$res[$i]["id"].'" style="width:24px;height:24px;border:0px;margin-top:3px;" title="clicca per modificare" src="'.$strstatus.'" ><p>'.$ico_contract_status.'</p></div>';
            /* ------------   ------------ */

            /* ------------ RECUPERO DATI PER COLONNA RIVISTA ------------ */
            if($res[$i]["show_on_magazine"]==1){
                $strRivista = SITE_URL."/AdminPanel/images/icons/ico_newspaper_on.png";
            }
            else
            {
                $strRivista = SITE_URL."/AdminPanel/images/icons/ico_newspaper_off.png";
            }
            $rivista = '<input type="hidden" id="magazine_status_'.$res[$i]["id"].'" value="' . $res[$i]["show_on_magazine"] .'"/><img onclick="SwitchNewsStatus('.$res[$i]["id"].',this)" id="news_status_img_'.$res[$i]["id"].'" style="width:48px;height:48px;border:0px;margin-top:3px;" title="clicca per modificare" src="'.$strRivista.'" >';
				/* -----------   ------------ */

				if($userLogged->id_user_type=="1"){
				//controllo se l annuncio è sui portali per settare l immagine giusta, per fare ciò controllo se nella tabella immobili_portali c è almeno un portale settato a 1, se c è n è uno settato a 1 allora l immagine sarà mostra in portali, altrimenti sarà non in portali
					$trovato= 1;//controlloImmobiliSuiPortali($res['id'],$cn);
					if($res[$i]["show_on_portal"]=="1"){
						$strPortali = SITE_URL."/AdminPanel/images/icons/ico_portal_on.png";
					}
					else
					{
						$strPortali = SITE_URL."/AdminPanel/images/icons/ico_portal_off.png";
					}

					$portali = '<input type="hidden" id="ads_portal_status_'.$res[$i]["id"].'" value="' . $res[$i]["show_on_portal"] .'"/><img onclick="SwitchPortalStatus('.$res[$i]["id"].',this)" id="portal_status_img_'.$res[$i]["id"].'" style="width:40px;height:40px;border:0px;margin-top:3px;" title="clicca per modificare" src="'.$strPortali.'" ></a>';

					// se sono amministratore restituisco anche i dati dei portali alla datatable
					array_push($array["aaData"],array($first_col,$res[$i]["city"],$res[$i]["town"],$res[$i]["district"],$res[$i]["category"],$res[$i]["tipology"],$res[$i]["price"],$data_ins_field,$data_up_field,$ads_status,$rivista,$portali));

				 }else{
					// se non sono amministratore non restituisco i dati dei portali
					array_push($array["aaData"],array($first_col,$res[$i]["city"],$res[$i]["town"],$res[$i]["district"],$res[$i]["category"],$res[$i]["tipology"],$res[$i]["price"],$data_ins_field,$data_up_field,$ads_status,$rivista));
				}

		}
	}

	echo(json_encode($array));



?>