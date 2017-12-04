<?php
// TODO SE UN QUALCHE PUNTO VA IN ERRORE (IN INSERT) FARE IL REVERT DELLE ALTRE PARTI
// Check if all params was sent
if(isset($_POST["sel_category"],$_POST["sel_tipology"],$_POST["inp_surface"],$_POST["sel_locals"],$_POST["sel_rooms"],$_POST["sel_floors"],$_POST["sel_elevators"],$_POST["sel_conditions"],$_POST["sel_property_status"],$_POST["sel_heatings"],$_POST["sel_bathrooms"],$_POST["sel_box"],$_POST["sel_gardens"],$_POST["sel_contracts"],$_POST["inp_price"],$_POST["sel_energy_class"],$_POST["sel_ipe_um"],$_POST["inp_ipe"],$_POST["txt_description"],$_POST["sel_country"],$_POST["sel_region"],$_POST["sel_city"],$_POST["sel_town"],$_POST["sel_district"],$_POST["inp_address"],$_POST["inp_street_num"],$_POST["sel_show_street_num"],$_POST["sel_ads_status"],$_POST["sel_negotiation_status"],$_POST["sel_negotiation"],$_POST["sel_price_lowered"],$_POST["sel_prestige"],$_POST["img_1"],$_POST["img_2"],$_POST["img_3"]) ){

    $id_ads                     = isset($_POST["id_ads"])?$_POST["id_ads"]:"";
    $sel_contracts              = $_POST["sel_contracts"];
    $sel_negotiation_status     = $_POST["sel_negotiation_status"];
    $sel_country                = $_POST["sel_country"];
    $sel_region                 = $_POST["sel_region"];
    $sel_city                   = $_POST["sel_city"];
    $sel_town                   = $_POST["sel_town"];
    $sel_district               = $_POST["sel_district"];

    $inp_address                = $_POST["inp_address"];
    $inp_street_num             = $_POST["inp_street_num"];
    $sel_show_street_num        = $_POST["sel_show_street_num"];
    $inp_latitude               = isset($_POST["inp_latitude"])?$_POST["inp_latitude"]:"";
    $inp_latitude               = substr($inp_latitude,0,10);
    $inp_longitude              = isset($_POST["inp_longitude"])?$_POST["inp_longitude"]:"";
    $inp_longitude              =substr($inp_longitude,0,10);

    $sel_category               = $_POST["sel_category"];
    $sel_tipology               = $_POST["sel_tipology"];
    $inp_surface                = $_POST["inp_surface"];
    $inp_price                  = $_POST["inp_price"];
    $sel_negotiation            = $_POST["sel_negotiation"];
    $sel_locals                 = $_POST["sel_locals"];
    $sel_rooms                  = $_POST["sel_rooms"];
    $sel_bathrooms              = $_POST["sel_bathrooms"];
    $sel_floors                 = $_POST["sel_floors"];
    $sel_elevators              = $_POST["sel_elevators"];
    $sel_heatings               = $_POST["sel_heatings"];
    $sel_box                    = $_POST["sel_box"];
    $sel_gardens                = $_POST["sel_gardens"];
    $sel_conditions             = $_POST["sel_conditions"];
    $sel_property_status        = $_POST["sel_property_status"];
    $sel_ads_status             = $_POST["sel_ads_status"];
    $sel_prestige               = $_POST["sel_prestige"];
    $sel_price_lowered          = $_POST["sel_price_lowered"];
    $inp_video_url              = isset($_POST["inp_video_url"])?$_POST["inp_video_url"]:"";
    $id_description             = "";
    $sel_energy_class           = $_POST["sel_energy_class"];
    $sel_ipe_um                 = $_POST["sel_ipe_um"];
    $inp_ipe                    = $_POST["inp_ipe"];
    $currTs                     = date("Y-m-d H:i:s");

    // description will be saved to another table
    $txt_description            = $_POST["txt_description"];
    // images will be saved to another table
    $img_1                      = $_POST["img_1"];
    $img_2                      = $_POST["img_2"];
    $img_3                      = $_POST["img_3"];
    // Not required images
    $img_4                      = isset($_POST["img_4"])?$_POST["img_4"]:"";
    $img_5                      = isset($_POST["img_5"])?$_POST["img_5"]:"";
    $img_6                      = isset($_POST["img_6"])?$_POST["img_6"]:"";
    $img_7                      = isset($_POST["img_7"])?$_POST["img_7"]:"";
    $img_8                      = isset($_POST["img_8"])?$_POST["img_8"]:"";
    $img_9                      = isset($_POST["img_9"])?$_POST["img_9"]:"";
    $img_10                     = isset($_POST["img_10"])?$_POST["img_10"]:"";

    // Check if all params was valorized
    if($sel_category =="" || $sel_tipology =="" || $inp_surface =="" || $sel_locals =="" || $sel_rooms =="" || $sel_floors =="" || $sel_elevators =="" || $sel_conditions =="" || $sel_property_status =="" || $sel_heatings =="" || $sel_bathrooms =="" || $sel_box =="" || $sel_gardens =="" || $sel_contracts =="" || $inp_price =="" || $sel_energy_class =="" || $sel_ipe_um =="" || $inp_ipe =="" || $txt_description =="" || $sel_country =="" || $sel_region =="" || $sel_city =="" || $sel_town=="" || $sel_district =="" || $inp_address =="" || $inp_street_num =="" || $sel_show_street_num =="" || $sel_ads_status =="" || $sel_negotiation_status =="" || $sel_negotiation =="" || $sel_price_lowered =="" || $sel_prestige =="" || $img_1 =="" || $img_2 =="" || $img_3 =="" )
    {

            echo("Errore: Alcuni campi non sono stati inviati o non sono stati valorizzati");// campi con valore "";
            exit();

        }else{//if all params are ok i can proceed to Insert/Update
            include("../../config.php");
            include(BASE_PATH."/app/classes/PropertyManager.php");

            $mng = new PropertyManager();
            $images = array($img_1,$img_2,$img_3,$img_4,$img_5,$img_6,$img_7,$img_8,$img_9,$img_10);

            // -----------------------------------------------
            // ----------------  UPDATE ----------------------
            // -----------------------------------------------
            if($id_ads!="" && $id_ads!=null){

                $values = array($sel_contracts,$sel_negotiation_status,$sel_country,$sel_region,$sel_city,$sel_town,$sel_district,$inp_address,$inp_street_num,$sel_show_street_num,$inp_latitude,$inp_longitude,$sel_category,$sel_tipology,$inp_surface,$inp_price,$sel_negotiation,$sel_locals,$sel_rooms,$sel_bathrooms,$sel_floors,$sel_elevators,$sel_heatings,$sel_box,$sel_gardens,$sel_conditions,$sel_property_status,$sel_ads_status,$sel_prestige,$sel_price_lowered,$inp_video_url,$id_description,$sel_energy_class,$sel_ipe_um,$inp_ipe,$currTs,$id_ads);
                // UPDATE IMMOBILE
                $ret = $mng->updateAds($values,"id = ?");
                if($ret != "0"  &&  $ret != "1"){
                    echo("errore - Aggiornamento dell' immobile fallito");
                    exit;
                }
                // UPDATE DESCRIZIONE
                $retD = $mng->updateDescription($id_ads,$txt_description,"");
                if($ret != "0"  &&  $ret != "1"){
                    echo("errore - Aggiornamento della descrizione fallito");
                    exit;
                }
                // UPDATE NOMI IMMAGINI
                $retD = $mng->updateImages($id_ads,$images);
                if($ret != "0"  &&  $ret != "1"){
                    echo("errore - Aggiornamento delle immagini fallito");
                    exit;
                }


                echo"success";

            // -----------------------------------------------
            // ----------------  INSERT ----------------------
            // -----------------------------------------------
            }else{

                $values = array($sel_contracts,$sel_negotiation_status,$sel_country,$sel_region,$sel_city,$sel_town,$sel_district,$inp_address,$inp_street_num,$sel_show_street_num,$inp_latitude,$inp_longitude,$sel_category,$sel_tipology,$inp_surface,$inp_price,$sel_negotiation,$sel_locals,$sel_rooms,$sel_bathrooms,$sel_floors,$sel_elevators,$sel_heatings,$sel_box,$sel_gardens,$sel_conditions,$sel_property_status,$sel_ads_status,$sel_prestige,$sel_price_lowered,$inp_video_url,$id_description,$sel_energy_class,$sel_ipe_um,$inp_ipe,$currTs);

                include(BASE_PATH."/app/classes/SessionManager.php");
                include(BASE_PATH."/app/classes/UserEntity.php");
                include(BASE_PATH."/app/classes/MagazineManager.php");

                $SS_usr = SessionManager::getVal("user",true);
                $id_agency		= $SS_usr->id;
                $id_agent       = $SS_usr->id_agent;
                $mgzMng = new MagazineManager();
                //saving ads

                $id_property = $mng->saveProperty($values);//res must be the id of ads or an error
                $res = $id_property;
                // if not save i will not execute the next command
                if($id_property != null && $id_property !="" & !strpos($id_property,"error")){

                    // create reference code and update it on table
                    $res_refC = $mng->createRefenceCode($id_property);
                    if($res_refC =="" || $res_refC == null){
                        echo("errore - Salvataggio del codice di riferimento fallito");
                        exit;
                    }

                    // RELATE AGENT WITH PROPERTY
                    $res_rel = $mng->savePropertyAgentRelations($id_agency,$id_agent,$id_property);
                    if($res_rel =="" || $res_rel == null){
                        echo("errore - Salvataggio della relazione Immbile - agenzia fallito");
                        exit;
                    }


                    // Saving Description
                    $res_desc = $mng->saveDescription($id_property,$txt_description,"");
                    if($res_desc =="" || $res_desc == null){
                        echo("errore - Salvataggio della descrizione fallito ");
                        exit;
                    }

                    // Saving Images
                    $resImgs = $mng->saveImages($id_property,$images);
                    if($resImgs =="" || $resImgs == null){
                        echo("errore - Salvataggio di alcune immagini");
                        exit;
                    }

                    // SET PROPERTY ON MAGAZINE TABLE (WITH STATUS DISABLED)
                    $resMagazine = $mgzMng->addOnMangazine($id_property,$id_agency,0);
                    if($resMagazine =="" || $resMagazine == null) {
                        echo("errore - Salvataggio nella rista");
                        exit;
                    }



                }else{
                    echo $res;
                    exit;
                }


                echo "Success";

            }
        }
}else{
    echo("Errore: Alcuni campi non sono stati inviati");// campi non settati;
}
?>