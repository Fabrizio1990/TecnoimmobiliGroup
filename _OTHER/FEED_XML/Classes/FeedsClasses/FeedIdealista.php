<?php
//header("content-type: text/text;charset=utf-8");
class FeedIdealista extends Feed
{

    public function getPropertyFeed($rst){
        //RISCRIVO LA PROCEDURA PERCHè DEVO RIMUOVERE L' ULTIMA VIRGOLA DAL JSON
        $finalFile = $this->template;
        $finalItems = "";
        for($i = 0 ; $i < Count($rst) ;$i++){
            $finalItems .= $this->PopulateRow($rst[$i]);
            if($i < Count($rst) -1){
                $finalItems.=",";
            }
        }
        $finalFile = str_replace("{items}",$finalItems,$finalFile);
        $finalFile = str_replace("{feed_creation_date}",date("Y-m-d H:i:s"),$finalFile);

        return $finalFile;
    }

    public function PopulateRow($row){
        $tmpItems =  parent::PopulateRow($row);
        //VARI REPLACE DESCRIZIONE
        $agencyEmail = $row["agent_email"];
        $agencyPhone = $row["agent_phone"];
        $longitude = str_replace(",",".",$row["longitude"]);
        $latitude = str_replace(",",".",$row["latitude"]);

        $description = $this->getFormattedDescription($row["desc_it"]);
        $description.=" Per info www.tecnoimmobiligroup.it email:$agencyEmail telefono:$agencyPhone.";
        $toReplace=array("\\'","\r\n","\r","\n");
        $replacement=array("'"," "," "," ");
        $description=str_replace($toReplace,$replacement,$description);

        $tmpItems = str_replace("{description_custom}",$description,$tmpItems);

        $tmpItems = str_replace("{longitude_custom}",$longitude,$tmpItems);
        $tmpItems = str_replace("{latitude_custom}",$latitude,$tmpItems);



        /*
        $tmpItems = str_replace("{show_address_custom}",$show_address,$tmpItems);*/
        return $tmpItems;
    }

    public function PopulateImages($images,$row,$template){
        $ret = $template;
        $ret = str_replace("{images_start}",'"propertyImages": [',$ret);

        $imagesTmp = "";
        for($i = 0 ; $i < Count($images) ; $i++){
            $imagesTmp .= '{"imageOrder": '.($i+1).',"imageLabel": "room","imageUrl": "'.$images[$i]["url"].'"},';
        }
        $imagesTmp = rtrim($imagesTmp,",");
        $ret = str_replace("{images}",$imagesTmp,$ret);
        $ret = str_replace("{images_end}","]",$ret);
        return $ret;
    }

}