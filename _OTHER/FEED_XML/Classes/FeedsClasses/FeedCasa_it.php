<?php
//header("content-type: text/text;charset=utf-8");
class FeedCasa_it extends Feed
{

    public function getPropertyFeed($rst){
        $finalFile = parent::getPropertyFeed($rst);

        return $finalFile;
    }

    public function PopulateRow($row){
        $tmpItems =  parent::PopulateRow($row);
        $show_address =$row["show_address"]=="1" ?"true" : "false";
        $tmpItems = str_replace("{show_address_custom}",$show_address,$tmpItems);
        return $tmpItems;
    }

    public function PopulateImages($images,$row,$template){
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
    }

}