
<?php
    //TODO IMPOSTARE PATH IMMAGINE PICCOLA ,recuperare campi veri e non id , immagini non ancora presenti, prenderle dall' altro sito e molte altre cose da finire
	header('Content-type: text/json; charset=utf-8');
	include("../../config.php");
    include(BASE_PATH."/app/classes/UserManager.php");
    include(BASE_PATH."/app/classes/PropertyManager.php");


    $params = Array();
    $values = Array();
	$rand_num = Rand(0,100);

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
	    if(isset($_GET["filiale"])){
            array_push($params," id_agency = ?");
            array_push($values,$_GET["filiale"]);
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

    if(isset($_GET["categoria"])){
        if($_GET["categoria"]!="") {
            array_push($params, " id_category in(?)");
            array_push($values, str_replace(",","','",urldecode($_GET["categoria"])));
        }
    }

    if(isset($_GET["tipologia"])){
        if($_GET["tipologia"]!="") {
            array_push($params, " id_tipology in(?)");
            array_push($values, str_replace(",","','",urldecode($_GET["tipologia"])));
        }
    }

    if(isset($_GET["tipologia"])){
        if($_GET["tipologia"]!="") {
            array_push($params, " id_tipology in(?)");
            array_push($values, str_replace(",","','",urldecode($_GET["tipologia"])));
        }
    }


    if(isset($_GET["provincia"])){
        if($_GET["provincia"]!="") {
            array_push($params, " id_city in(?)");
            array_push($values, str_replace(",","','",urldecode($_GET["tipologia"])));
        }
    }

    if(isset($_GET["provincia"])){
        if($_GET["provincia"]!="") {
            array_push($params, " id_city = in(?)");
            array_push($values, str_replace(",","','",urldecode($_GET["provincia"])));
        }
    }

    if(isset($_GET["comune"])){
        if($_GET["comune"]!="") {
            array_push($params, " id_town  = in(?)");
            array_push($values, str_replace(",","','",urldecode($_GET["comune"])));
        }
    }

    if(isset($_GET["zona"])){
        if($_GET["zona"]!="") {
            array_push($params, " id_district  = in(?)");
            array_push($values, str_replace(",","','",urldecode($_GET["zona"])));
        }
    }

    // stato dell annuncio (non geografico)
    if(isset($_GET["stato"])){
        if($_GET["stato"]!="") {
            array_push($params, " id_ads_status  = in(?)");
            array_push($values, str_replace(",","','",urldecode($_GET["stato"])));
        }
    }

    $res = $propertyM->readAllAds($params,null,$values);

	$resultFound = Count($res);
	if ($resultFound>0 && $resultFound!="" && $resultFound!=null){
	    for($i=0;$i<$resultFound;$i++){
				/* --- CONVERTO LE DATE TOGLIENDO L'ora (ma metto la data completa hidden perchè serve per un ordinamento corretto --*/
				$data_up = Date("d-m-Y",strtotime($res[$i]["date_up"]));
				$data_ins = Date("d-m-Y",strtotime($res[$i]["date_ins"]));
				$data_ins_field = "<span style='display:none'>".$res[$i]["date_ins"]."</span>".$data_ins;
				$data_up_field = "<span style='display:none'>".$res[$i]["date_up"]."</span>".$data_up;

                //TODO IMPOSTARE PATH IMMAGINE PICCOLA
				$first_col = "<a href='AR_immobili_inserimento.php?idimmobile=".$res[$i]["id"]."' > <img class='real_tumb' src='?id=".$rand_num."' /> </a>";

				/* ------------ RECUPERO DATI PER COLONNA STATO ------------ */
				$strstato = $res[$i]["id_ads_status"]==3?"../images/ann_attivo.png":"../images/ann_bloccato.png";


				$ico_trattativa="";
				if($res[$i]["price"]=="0"){
					$ico_trattativa="<img style='width:28px;height:14px; border:0;' title='In trattativa' src='../images/img_AR/ico_in_trattativa.png'>";
				}elseif($res[$i]['id_contract_status']=="2"){//se venduto
					$ico_trattativa="<img style='width:14px;height:14px; border:0;' title='Venduto' src='../images/img_AR/ico_venduto.png'>";
				}elseif($res[$i]['id_contract_status']=="4"){// se affittato
					$ico_trattativa="<img style='width:14px;height:14px; border:0;' title='Affittato' src='../images/img_AR/ico_affittato.png'>";
				}

				$stato_annuncio = '<div id="stato_annuncio'.$res[$i]["id"].'"><a href="javascript:SwitchAdsStatus('.$res[$i]["id"].')"><img id="ads_status_img_'.$res[$i]["id"].'" style="width:24px;height:24px;border:0px;margin-top:3px;" title="clicca per modificare" src="'.$strstato.'" ></a><p>'.$ico_trattativa.'</p></div>';
				/* ------------   ------------ */

				/* ------------ RECUPERO DATI PER COLONNA RIVISTA ------------ */
				if($res[$i]["show_on_magazine"]==1){
					$strRivista = "../images/img_AR/annuncio_in_rivista.png";
				}
				else
				{
					$strRivista = "../images/img_AR/annuncio_nn_rivista.png";
				}
				$rivista = '<a href="javascript:SwitchNewsStatus('.$res[$i]["id"].')"><img id="news_status_img_'.$res[$i]["id"].'" style="width:48px;height:48px;border:0px;margin-top:3px;" title="clicca per modificare" src="'.$strRivista.'" ></a>';
				/* -----------   ------------ */

				if($userLogged->id_user_type=="1"){
				//controllo se l annuncio è sui portali per settare l immagine giusta, per fare ci� controllo se nella tabella immobili_portali c è almeno un portale settato a 1, se c � n � uno settato a 1 allora l immagine sarà mostra in portali, altrimenti sar� non in portali
					$trovato= 1;//controlloImmobiliSuiPortali($res['id'],$cn);
					if($res[$i]["show_on_portal"]=="1"){
						$strPortali = "../images/img_AR/mostra_in_portali.png";
					}
					else
					{
						$strPortali = "../images/img_AR/non_in_portali.png";
					}

					$portali = '<a href="javascript:SwitchPortalStatus('.$res[$i]["id"].')"><img id="portal_status_img_'.$res[$i]["id"].'" style="width:40px;height:40px;border:0px;margin-top:3px;" title="clicca per modificare" src="'.$strPortali.'" ></a>';

					// se sono amministratore restituisco anche i dati dei portali alla datatable
					array_push($array["aaData"],array($first_col,$res[$i]["city"],$res[$i]["town"],$res[$i]["district"],$res[$i]["category"],$res[$i]["tipology"],$res[$i]["price"],$data_ins_field,$data_up_field,$stato_annuncio,$rivista,$portali));

				 }else{
					// se non sono amministratore non restituisco i dati dei portali
					array_push($array["aaData"],array($first_col,$res[$i]["city"],$res[$i]["town"],$res[$i]["district"],$res[$i]["category"],$res[$i]["tipology"],$res[$i]["price"],$data_ins_field,$data_up_field,$stato_annuncio,$rivista));
				}

		}
	}

	echo(json_encode($array));



?>