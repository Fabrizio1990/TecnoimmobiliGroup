<?php
//header("content-type: text/text;charset=utf-8");
class FeedImmobiliare_it extends Feed
{

    public function getPropertyFeed($rst){
        $finalFile = parent::getPropertyFeed($rst);
        return $finalFile;
    }

    public function PopulateRow($row){
        
        /*$this->tmp_items = str_replace("{misssing_rooms}",($locals - $rooms),$this->tmp_items);*/
        $this->tmp_items = str_replace("{negotiation_reserved}",($row["negotiation_reserved"]==1?true:false),$this->tmp_items);
        

        //BASE POPULATE ROW (FROM PARENT) PUT BEFORE ALL FIELD OVERRIDES WITH SAME PLACEHOLDER
        $this->tmp_items =  parent::PopulateRow($row);


        $id_category = $this->getRealCategory($row["id_tipology"]);
        $show_address =$row["show_address"]=="1" ?"true" : "false";
        $locals = $this->getConvertedValue($this->portalId,12,$row["id_locals"],$row["locals"]);
        $rooms = $this->getConvertedValue($this->portalId,11,$row["id_rooms"],$row["rooms"]);
        $district = "";
        $district = parent::getConvertedValue($this->portalId,6,$row["id_district"],$row["district"]);
        if(!is_numeric($district))
            $district = "";

        $this->tmp_items = str_replace("{misssing_rooms}",($locals - $rooms),$this->tmp_items);
        $this->tmp_items = str_replace("{show_address_custom}",$show_address,$this->tmp_items);
        $this->tmp_items = str_replace("{auction}",$row["id_contract"]=="7" ?"true" : "false",$this->tmp_items);
        $this->tmp_items = str_replace("{id_category}",$id_category,$this->tmp_items);
        $this->tmp_items = str_replace("{longitude_custom}",str_replace(",",".",$row["longitude"]),$this->tmp_items);
        $this->tmp_items = str_replace("{latitude_custom}",str_replace(",",".",$row["latitude"]),$this->tmp_items);
        $this->tmp_items = str_replace("{date_ins_custom}",parent::toCoustomDate($row["date_ins"],"c"),$this->tmp_items);
        $this->tmp_items = str_replace("{date_up_custom}",parent::toCoustomDate($row["date_up"],"c"),$this->tmp_items);

        if($district=="")
            $this->tmp_items = str_replace("<CodiceQuartiere>{district_custom}</CodiceQuartiere>","",$this->tmp_items);
        else
            $this->tmp_items = str_replace("{district_custom}",$district,$this->tmp_items);
        //METTO QUI LA SEZIONE DEDICATA ALLA CATEGORIA
        $this->tmp_items = $this->PopulateCategorySection($row,$id_category,$this->tmp_items);
        return $this->tmp_items;
    }

    public function PopulateImages($images,$row,$template){
        $ret = $template;

        $imagesTmp = "";
        for($i = 0 ; $i < Count($images) ; $i++){
            $isFeatured = $images[$i]["id_type"] == 1?"true":"false";
            $imagesTmp .= "<Immagine IDImmagine='".($i+1)."'><URL>".$images[$i]["url"]."</URL><DataModifica>".parent::toCoustomDate($row["date_up"],"c")."</DataModifica><Posizione>".($i+1)."</Posizione></Immagine>";
        }
        $ret = str_replace("{images}",$imagesTmp,$ret);
        return $ret;
    }

    public function getRealCategory($tipology){
        $ret = 1;
        switch ($tipology){
            //RESIDENZIALE
            case 1: case 2: case 3: case 4: case 5: case 6: case 7: case 8: case 9: case 10:case 11: case 13:case 14:case 16: case 17:case 19:case 20:
                $ret = 1;
                break;
            //COMMERCIALE
            case 21:case 22:case 23:case 24:case 25:case 26: case 28:case 29:case 31: case 33:case 34:case 36:case 37:case 38:
                $ret = 2;
                break;
            //ATTIVITA
            case 27: case 32:
                $ret = 3;
                break;
            //VACANZE
            /*case 16:
                $ret = 4;
                break;*/
            //TERRENI
            case 12: case 15:case 30:
                $ret = 5;
                break;
            default:
             $ret = 1;
        }
        return $ret;
    }

    //Immobiliare.it richiede una serie di tag basati sulla categoria, qui li aggiungo
    public function PopulateCategorySection($row,$id_category,$tmp_items){
        $ret ="";

        switch ($id_category){
            //######### RESIDENZIALE ##############
            case 1:
                $floor = $this->getConvertedValue($this->portalId,14,$row["id_floor"],$row["floorN"]);
                $bathrooms = $this->getConvertedValue($this->portalId,13,$row["id_bathrooms"],$row["bathrooms_num"]);
                $ret.="<Residenziale>";

                $ret.="<StatoImmobile>". $this->getConvertedValue($this->portalId,20,$row["id_property_status"],$row["property_status"])."</StatoImmobile>";
                if(is_numeric($floor)){
                    $ret.="<Piano>". $floor."</Piano>";
                    $ret.="<PianiEdificio>". $this->getConvertedValue($this->portalId,14,$row["id_floor"],$row["floorN"])."</PianiEdificio>";
                }
                //$ret.="<NrLocali>".$this->getConvertedValue($this->portalId,13,$row["id_locals"],$row["locals_num"])."</NrLocali>";
                if(is_numeric($bathrooms) && $bathrooms > 0)
                    $ret.="<NrBagni>".$this->getConvertedValue($this->portalId,13,$row["id_bathrooms"],$row["bathrooms_num"])."</NrBagni>";
                
                $ret.="<Ascensore>".$this->getConvertedValue($this->portalId,15,$row["id_elevator"])."</Ascensore>";
                $ret.="<BoxAuto>".$this->getConvertedValue($this->portalId,17,$row["id_box"],$row["box"])."</BoxAuto>";
                $ret.="<Cantina>0</Cantina>";
                $ret.="<Panoramico>0</Panoramico>";
                $ret.="<Taverna>0</Taverna>";
                $ret.="<Ripostiglio>0</Ripostiglio>";
                $ret.="<Soffitta>0</Soffitta>";
                $ret.="<Mansarda>0</Mansarda>";
                $ret.="<MQCalpestabili>".$row["mq"]."</MQCalpestabili>";
                $ret.="<GiardinoCondominiale>".($row["id_garden"]=="3"?"true":"false")."</GiardinoCondominiale>";
                $ret.="<GiardinoPrivato>".($row["id_garden"]=="2"?"1":"2")."</GiardinoPrivato>";
                $ret.="<Riscaldamento>".$this->getConvertedValue($this->portalId,16,$row["id_heating"],$row["heating"])."</Riscaldamento>";
                $ret.="<StatoCostruzione>".$this->getConvertedValue($this->portalId,19,$row["id_property_conditions"],$row["property_conditions"])."</StatoCostruzione>";
                //$ret.="<Energia>";
                $ret.="<ClasseEnergetica>".$this->getConvertedValue($this->portalId,21,$row["id_energy_class"],$row["energy_class"])."</ClasseEnergetica>";
                $ret.="<IndicePrestazioneEnergetica>".round($row["ipe"],2)."</IndicePrestazioneEnergetica>";
                //$ret.="<Unita>".$this->getConvertedValue($this->portalId,22,$row["id_ipe_um"],$row["ipe_um"])."</Unita>";
                //$ret.="</Energia>";
                $ret.="</Residenziale>";
                $this->tmp_items = str_replace("{infoResidenziale}",$ret,$this->tmp_items);
                $this->tmp_items = str_replace(array("{infoCommerciale}","{infoAttività}","{infoTerreno}","{infoVacanze}"),"",$this->tmp_items);
                break;
            //######### COMMERCIALE ##############
            case 2:
                $floor = $this->getConvertedValue($this->portalId,14,$row["id_floor"],$row["floorN"]);
                $ret.="<Commerciale>";
                

                $ret.="<StatoCostruzione>".$this->getConvertedValue($this->portalId,19,$row["id_property_conditions"],$row["property_conditions"])."</StatoCostruzione>";
                $ret.="<StatoImmobile>". $this->getConvertedValue($this->portalId,20,$row["id_property_status"],$row["property_status"])."</StatoImmobile>";
                if(is_numeric($floor)){
                    $ret.="<Piano>". $floor."</Piano>";
                    $ret.="<PianiEdificio>". $this->getConvertedValue($this->portalId,14,$row["id_floor"],$row["floorN"])."</PianiEdificio>";
                }
                $ret.="<GiardinoPrivato>".($row["id_garden"]=="2"?"1":"2")."</GiardinoPrivato>";
                $ret.="<Riscaldamento>".$this->getConvertedValue($this->portalId,16,$row["id_heating"],$row["heating"])."</Riscaldamento>";
                $ret.="<Ascensore>".$this->getConvertedValue($this->portalId,15,$row["id_elevator"])."</Ascensore>";
                
                //$ret.="<Energia>";
                $ret.="<ClasseEnergetica>".$this->getConvertedValue($this->portalId,21,$row["id_energy_class"],$row["energy_class"])."</ClasseEnergetica>";
                $ret.="<IndicePrestazioneEnergetica>".round($row["ipe"],2)."</IndicePrestazioneEnergetica>";
                //$ret.="<Unita>".$this->getConvertedValue($this->portalId,22,$row["id_ipe_um"],$row["ipe_um"])."</Unita>";
                //$ret.="</Energia>";
                $ret.="</Commerciale>";
                $this->tmp_items = str_replace("{infoCommerciale}",$ret,$this->tmp_items);
                $this->tmp_items = str_replace(array("{infoResidenziale}","{infoAttività}","{infoTerreno}","{infoVacanze}"),"",$this->tmp_items);
                break;
            case 3:
                $floor = $this->getConvertedValue($this->portalId,14,$row["id_floor"],$row["floorN"]);
                $ret.="<Attivita>";
                $ret.="<Riscaldamento>".$this->getConvertedValue($this->portalId,16,$row["id_heating"],$row["heating"])."</Riscaldamento>";
                if(is_numeric($floor)){
                    $ret.="<Piano>". $floor."</Piano>";
                    $ret.="<PianiEdificio>". $this->getConvertedValue($this->portalId,14,$row["id_floor"],$row["floorN"])."</PianiEdificio>";
                }
                $ret.="</Attivita>";
                $this->tmp_items = str_replace("{infoAttività}",$ret,$this->tmp_items);
                $this->tmp_items = str_replace(array("{infoResidenziale}","{infoCommerciale}","{infoTerreno}","{infoVacanze}"),"",$this->tmp_items);
                break;
            //############## VACANZE ##########
            case 4:
                $floor = $this->getConvertedValue($this->portalId,14,$row["id_floor"],$row["floorN"]);
                $bathrooms = $this->getConvertedValue($this->portalId,13,$row["id_bathrooms"],$row["bathrooms_num"]);

                $ret.="<Vacanze>";


                $ret.="<StatoImmobile>". $this->getConvertedValue($this->portalId,20,$row["id_property_status"],$row["property_status"])."</StatoImmobile>";
                if(is_numeric($floor)){
                    $ret.="<Piano>". $floor."</Piano>";
                    $ret.="<PianiEdificio>". $this->getConvertedValue($this->portalId,14,$row["id_floor"],$row["floorN"])."</PianiEdificio>";
                }
                if(is_numeric($bathrooms) && $bathrooms > 0)
                    $ret.="<NrBagni>".$this->getConvertedValue($this->portalId,13,$row["id_bathrooms"],$row["bathrooms_num"])."</NrBagni>";
                $ret.="<Ascensore>".$this->getConvertedValue($this->portalId,15,$row["id_elevator"])."</Ascensore>";
                $ret.="<BoxAuto>".$this->getConvertedValue($this->portalId,17,$row["id_box"],$row["box"])."</BoxAuto>";
                $ret.="<GiardinoCondominiale>".($row["id_garden"]=="3"?"true":"false")."</GiardinoCondominiale>";
                $ret.="<GiardinoPrivato>".($row["id_garden"]=="2"?"1":"2")."</GiardinoPrivato>";
                $ret.="<Riscaldamento>".$this->getConvertedValue($this->portalId,16,$row["id_heating"],$row["heating"])."</Riscaldamento>";
                $ret.="<StatoCostruzione>".$this->getConvertedValue($this->portalId,19,$row["id_property_conditions"],$row["property_conditions"])."</StatoCostruzione>";
                //$ret.="<Energia>";
                $ret.="<ClasseEnergetica>".$this->getConvertedValue($this->portalId,21,$row["id_energy_class"],$row["energy_class"])."</ClasseEnergetica>";
                $ret.="<IndicePrestazioneEnergetica>".round($row["ipe"],2)."</IndicePrestazioneEnergetica>";
                //$ret.="<Unita>".$this->getConvertedValue($this->portalId,22,$row["id_ipe_um"],$row["ipe_um"])."</Unita>";
                //$ret.="</Energia>";

                $ret.="</Vacanze>";
                $this->tmp_items = str_replace("{infoVacanze}",$ret,$this->tmp_items);
                $this->tmp_items = str_replace(array("{infoResidenziale}","{infoCommerciale}","{infoTerreno}","{infoAttività}"),"",$this->tmp_items);
                break;

            //################ TERRENI ##############
            case 5:
                $ret.="<Terreno>";
                $ret.="<SupTerritoriale>".$row["mq"]."</SupTerritoriale>";
                $ret.="</Terreno>";
                $this->tmp_items = str_replace("{infoTerreno}",$ret,$this->tmp_items);
                $this->tmp_items = str_replace(array("{infoResidenziale}","{infoCommerciale}","{infoVacanze}","{infoAttività}"),"",$this->tmp_items);
                break;
        }

        return $this->tmp_items;
    }

    /*public function PopulateImages($images,$template){
        $ret = $template;
        $ret = str_replace("{images_start}","<images>",$ret);

        $imagesTmp = "";
        for($i = 0 ; $i < Count($images) ; $i++){
            $isFeatured = $images[$i]["id_type"] == 1?"true":"false";
            $imagesTmp .= '<advertismentimage path="'.$images[$i]["url"].'" imagetype="Image" />';
        }
        $ret = str_replace("{images}",$imagesTmp,$ret);
        $ret = str_replace("{images_end}","</images>",$ret);
        return $ret;
    }*/

}