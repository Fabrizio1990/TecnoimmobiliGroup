<?php
//header("content-type: text/text;charset=utf-8");
class FeedCasa_it extends Feed
{

    public function getPropertyFeed($rst){
        $finalFile = parent::getPropertyFeed($rst);

        return $finalFile;
    }

    public function PopulateRow($row){
        $this->tmp_items =  parent::PopulateRow($row);
        $show_address =$row["show_address"]=="1" ?"true" : "false";
        $latitude = str_replace(",",".",$row["latitude"]);
        $longitude = str_replace(",",".",$row["longitude"]);


        $this->tmp_items = str_replace("{show_address_custom}",$show_address,$this->tmp_items);
        $this->tmp_items = str_replace("{latitude_custom}",$latitude,$this->tmp_items);
        $this->tmp_items = str_replace("{longitude_custom}",$longitude,$this->tmp_items);

        return $this->tmp_items;
    }

    public function getFormattedDescription($description){

        $toReplace=array("&","è","à","ì","ù",'"');
        $replacement=array("&amp;","e'","a'","i'","u'","");
        $ret=str_replace($toReplace,$replacement,$description);
        $ret=str_replace("&amp;#39;","'",$ret);
        return $ret;
    }

    public function PopulateImages($images,$row,$template){
        $ret = $template;
        $ret = str_replace("{images_start}","<images>",$ret);

        $imagesTmp = "";
        for($i = 0 ; $i < Count($images) ; $i++){
            //$isFeatured = $images[$i]["id_type"] == 1?"true":"false";
            $imagesTmp .= '<advertismentimage path="'.$images[$i]["url"].'" imagetype="Image" />';
        }
        $ret = str_replace("{images}",$imagesTmp,$ret);
        $ret = str_replace("{images_end}","</images>",$ret);
        return $ret;
    }

}