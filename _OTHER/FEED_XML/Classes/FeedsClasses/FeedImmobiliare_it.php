<?php
//header("content-type: text/text;charset=utf-8");
class FeedImmobiliare_it extends Feed
{

    public function getPropertyFeed($rst){
        $finalFile = parent::getPropertyFeed($rst);

        return $finalFile;
    }

    public function PopulateRow($row){
        $tmpItems =  parent::PopulateRow($row);
        $id_category = $this->getRealCategory($row["id_tipology"]);
        $show_address =$row["show_address"]=="1" ?"true" : "false";
        $tmpItems = str_replace("{show_address_custom}",$show_address,$tmpItems);
        $tmpItems = str_replace("{auction}",$row["id_contract"]=="7" ?"true" : "false",$tmpItems);
        $tmpItems = str_replace("{id_category}",$id_category,$tmpItems);
        //METTO QUI LA SEZIONE DEDICATA ALLA CATEGORIA
        $tmpItems = $this->PopulateCategorySection($row,$id_category,$tmpItems);
        return $tmpItems;
    }

    public function PopulateImages($images,$row,$template){
        $ret = $template;

        $imagesTmp = "";
        for($i = 0 ; $i < Count($images) ; $i++){
            $isFeatured = $images[$i]["id_type"] == 1?"true":"false";
            $imagesTmp .= "<Immagine IDImmagine='".($i+1)."'><Url>".$images[$i]["url"]."</Url><DataModifica>".$row["date_up"]."</DataModifica></Immagine>";
        }
        $ret = str_replace("{images}",$imagesTmp,$ret);
        return $ret;
    }

    public function getRealCategory($tipology){
        $ret = 1;
        switch ($tipology){
            //RESIDENZIALE
            case 1: case 2: case 3: case 4: case 5: case 6: case 7: case 8: case 9: case 10:case 11: case 13:case 14:case 17:case 19:case 20:
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
            case 16:
                $ret = 4;
                break;
            //TERRENI
            case 12: case 15:case 30:
                $ret = 5;
                break;
        }
        return $ret;
    }

    //Immobiliare.it richiede una serie di tag basati sulla categoria, qui li aggiungo
    public function PopulateCategorySection($row,$id_category,$tmpItems){
        $ret ="";

        switch ($id_category){
            //######### RESIDENZIALE ##############
            case 1:
                $ret.="<Residenziale>";

                $ret.="<StatoImmobile>". $this->getConvertedValue($this->portalId,20,$row["id_property_status"],$row["property_status"])."</StatoImmobile>";
                $ret.="<Piano>". $this->getConvertedValue($this->portalId,14,$row["id_floor"],$row["floorN"])."</Piano>";
                $ret.="<PianiEdificio>". $this->getConvertedValue($this->portalId,14,$row["id_floor"],$row["floorN"])."</PianiEdificio>";
                $ret.="<NrBagni>".$this->getConvertedValue($this->portalId,13,$row["id_bathrooms"],$row["bathrooms_num"])."</NrBagni>";
                $ret.="<Ascensore>".$this->getConvertedValue($this->portalId,15,$row["id_elevator"])."</Ascensore>";
                $ret.="<BoxAuto>".$this->getConvertedValue($this->portalId,17,$row["id_box"],$row["box"])."</BoxAuto>";
                $ret.="<GiardinoCondominiale>".($row["id_garden"]=="3"?"true":"false")."</GiardinoCondominiale>";
                $ret.="<GiardinoPrivato>".($row["id_garden"]=="2"?"true":"false")."</GiardinoPrivato>";
                $ret.="<Riscaldamento>".$this->getConvertedValue($this->portalId,16,$row["id_heating"],$row["heating"])."</Riscaldamento>";
                $ret.="<StatoCostruzione>".$this->getConvertedValue($this->portalId,19,$row["id_property_conditions"],$row["property_conditions"])."</StatoCostruzione>";
                $ret.="<ClasseEnergetica>".$this->getConvertedValue($this->portalId,21,$row["id_energy_class"],$row["energy_class"])."</ClasseEnergetica>";
                $ret.="<IndicePrestazioneEnergetica>".$row["ipe"]."</IndicePrestazioneEnergetica>";
                $ret.="<Energia><Unita>".$this->getConvertedValue($this->portalId,22,$row["id_ipe_um"],$row["ipe_um"])."</Unita></Energia>";

                $ret.="</Residenziale>";
                $tmpItems = str_replace("{infoResidenziale}",$ret,$tmpItems);
                $tmpItems = str_replace(array("{infoCommerciale}","{infoAttività}","{infoTerreno}","{infoVacanze}"),"",$tmpItems);
                break;
            //######### COMMERCIALE ##############
            case 2:
                $ret.="<Commerciale>";


                    $ret.="<StatoCostruzione>".$this->getConvertedValue($this->portalId,19,$row["id_property_conditions"],$row["property_conditions"])."</StatoCostruzione>";
                $ret.="<StatoImmobile>". $this->getConvertedValue($this->portalId,20,$row["id_property_status"],$row["property_status"])."</StatoImmobile>";
                $ret.="<Piano>". $this->getConvertedValue($this->portalId,14,$row["id_floor"],$row["floorN"])."</Piano>";
                $ret.="<PianiEdificio>". $this->getConvertedValue($this->portalId,14,$row["id_floor"],$row["floorN"])."</PianiEdificio>";
                $ret.="<GiardinoPrivato>".($row["id_garden"]=="2"?"true":"false")."</GiardinoPrivato>";
                $ret.="<Riscaldamento>".$this->getConvertedValue($this->portalId,16,$row["id_heating"],$row["heating"])."</Riscaldamento>";
                $ret.="<Ascensore>".$this->getConvertedValue($this->portalId,15,$row["id_elevator"])."</Ascensore>";
                $ret.="<ClasseEnergetica>".$this->getConvertedValue($this->portalId,21,$row["id_energy_class"],$row["energy_class"])."</ClasseEnergetica>";
                $ret.="<IndicePrestazioneEnergetica>".$row["ipe"]."</IndicePrestazioneEnergetica>";
                $ret.="<Energia><Unita>".$this->getConvertedValue($this->portalId,22,$row["id_ipe_um"],$row["ipe_um"])."</Unita></Energia>";

                $ret.="</Commerciale>";
                $tmpItems = str_replace("{infoCommerciale}",$ret,$tmpItems);
                $tmpItems = str_replace(array("{infoResidenziale}","{infoAttività}","{infoTerreno}","{infoVacanze}"),"",$tmpItems);
                break;
            case 3:

                $ret.="<Attivita>";
                $ret.="<Riscaldamento>".$this->getConvertedValue($this->portalId,16,$row["id_heating"],$row["heating"])."</Riscaldamento>";
                $ret.="<Piano>". $this->getConvertedValue($this->portalId,14,$row["id_floor"],$row["floorN"])."</Piano>";
                $ret.="<PianiEdificio>". $this->getConvertedValue($this->portalId,14,$row["id_floor"],$row["floorN"])."</PianiEdificio>";
                $ret.="</Attivita>";
                $tmpItems = str_replace("{infoAttività}",$ret,$tmpItems);
                $tmpItems = str_replace(array("{infoResidenziale}","{infoCommerciale}","{infoTerreno}","{infoVacanze}"),"",$tmpItems);
                break;
            //############## VACANZE ##########
            case 4:
                $ret.="<Vacanze>";


                $ret.="<StatoImmobile>". $this->getConvertedValue($this->portalId,20,$row["id_property_status"],$row["property_status"])."</StatoImmobile>";
                $ret.="<Piano>". $this->getConvertedValue($this->portalId,14,$row["id_floor"],$row["floorN"])."</Piano>";
                $ret.="<PianiEdificio>". $this->getConvertedValue($this->portalId,14,$row["id_floor"],$row["floorN"])."</PianiEdificio>";
                $ret.="<NrBagni>".$this->getConvertedValue($this->portalId,13,$row["id_bathrooms"],$row["bathrooms_num"])."</NrBagni>";
                $ret.="<Ascensore>".$this->getConvertedValue($this->portalId,15,$row["id_elevator"])."</Ascensore>";
                $ret.="<BoxAuto>".$this->getConvertedValue($this->portalId,17,$row["id_box"],$row["box"])."</BoxAuto>";
                $ret.="<GiardinoCondominiale>".($row["id_garden"]=="3"?"true":"false")."</GiardinoCondominiale>";
                $ret.="<GiardinoPrivato>".($row["id_garden"]=="2"?"true":"false")."</GiardinoPrivato>";
                $ret.="<Riscaldamento>".$this->getConvertedValue($this->portalId,16,$row["id_heating"],$row["heating"])."</Riscaldamento>";
                $ret.="<StatoCostruzione>".$this->getConvertedValue($this->portalId,19,$row["id_property_conditions"],$row["property_conditions"])."</StatoCostruzione>";
                $ret.="<ClasseEnergetica>".$this->getConvertedValue($this->portalId,21,$row["id_energy_class"],$row["energy_class"])."</ClasseEnergetica>";
                $ret.="<IndicePrestazioneEnergetica>".$row["ipe"]."</IndicePrestazioneEnergetica>";
                $ret.="<Energia><Unita>".$this->getConvertedValue($this->portalId,22,$row["id_ipe_um"],$row["ipe_um"])."</Unita></Energia>";

                $ret.="</Vacanze>";
                $tmpItems = str_replace("{infoVacanze}",$ret,$tmpItems);
                $tmpItems = str_replace(array("{infoResidenziale}","{infoCommerciale}","{infoTerreno}","{infoAttività}"),"",$tmpItems);
                break;

            //################ TERRENI ##############
            case 5:
                $ret.="<Terreno>";
                $ret.="<SupTerritoriale>".$row["mq"]."</SupTerritoriale>";
                $ret.="</Terreno>";
                $tmpItems = str_replace("{infoTerreno}",$ret,$tmpItems);
                $tmpItems = str_replace(array("{infoResidenziale}","{infoCommerciale}","{infoVacanze}","{infoAttività}"),"",$tmpItems);
                break;
        }

        return $tmpItems;
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