<?php
/**
 * Created by PhpStorm.
 * User: Developer
 * Date: 16/01/2017
 * Time: 12:57
 */

// Check if all params was sent
if(isset($_POST["sel_category"],$_POST["sel_tipology"],$_POST["inp_surface"],$_POST["sel_locals"],$_POST["sel_rooms"],$_POST["sel_floors"],$_POST["sel_elevators"],$_POST["sel_conditions"],$_POST["sel_property_status"],$_POST["sel_heatings"],$_POST["sel_bathrooms"],$_POST["sel_box"],$_POST["sel_gardens"],$_POST["sel_contracts"],$_POST["inp_price"],$_POST["sel_energy_class"],$_POST["sel_ipe_um"],$_POST["inp_ipe"],$_POST["txt_description"],$_POST["sel_country"],$_POST["sel_region"],$_POST["sel_city"],$_POST["sel_town"],$_POST["sel_district"],$_POST["inp_address"],$_POST["inp_street_num"],$_POST["sel_show_street_num"],$_POST["sel_ads_status"],$_POST["sel_negotiation_status"],$_POST["sel_negotiation"],$_POST["sel_price_lowered"],$_POST["sel_prestige"],$_POST["img_1"],$_POST["img_2"],$_POST["img_3"]) ){


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
    $inp_longitude              = isset($_POST["inp_longitude"])?$_POST["inp_longitude"]:"";
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



            if(isset($_POST["id_ads"])){// UPDATE

            }else{// INSERT

                $values = array($sel_contracts,$sel_negotiation_status,$sel_country,$sel_region,$sel_city,$sel_town,$sel_district,$inp_address,$inp_street_num,$sel_show_street_num,$inp_latitude,$inp_longitude,$sel_category,$sel_tipology,$inp_surface,$inp_price,$sel_negotiation,$sel_locals,$sel_rooms,$sel_bathrooms,$sel_floors,$sel_elevators,$sel_heatings,$sel_box,$sel_gardens,$sel_conditions,$sel_property_status,$sel_ads_status,$sel_prestige,$sel_price_lowered,$inp_video_url,$id_description,$sel_energy_class,$sel_ipe_um,$inp_ipe);

                $mng = new PropertyManager();
                //saving ads
                $id = $mng->saveAds($values,Null);//res must be the id of ads or an error
                $res = $id;
                // if not save i will not execute the next command
                if($id != null && $id !="" & !strpos($id,"error")){
                    // create reference code and update it on table

                    $res_refC = $mng->createRefenceCode($id);
                    if($res_refC =="" || $res_refC == null){
                        echo("errore - Salvataggio del codice di riferimento fallito");
                    }

                    // Saving Description
                    $res_desc = $mng->SaveDescription($id,$txt_description,"");
                    if($res_desc =="" || $res_desc == null){
                        echo("errore - Salvataggio della descrizione fallito");
                    }

                    // Saving Images
                    $resImgs = $mng->saveImages($id,array($img_1,$img_2,$img_3,$img_4,$img_5,$img_6,$img_7,$img_8,$img_9,$img_10));
                    if($resImgs =="" || $resImgs == null){
                        echo("errore - Salvataggio di alcune immagini");
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