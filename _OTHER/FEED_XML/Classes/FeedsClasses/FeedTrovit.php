<?php
//header("content-type: text/text;charset=utf-8");
class FeedTrovit extends Feed
{

    public function getPropertyFeed($rst){
        $finalFile = parent::getPropertyFeed($rst);

        return $finalFile;
    }

    public function PopulateRow($row){
        $tmpItems =  parent::PopulateRow($row);
        return $tmpItems;
    }

    public function PopulateImages($images,$template){
        $ret = $template;
        $ret = str_replace("{images_start}","<pictures>",$ret);

        $imagesTmp = "";
        for($i = 0 ; $i < Count($images) ; $i++){
            $isFeatured = $images[$i]["id_type"] == 1?"true":"false";
            $imagesTmp .= "<picture featured='".$isFeatured."'><picture_url><![CDATA[".$images[$i]["url"]."]]></picture_url><picture_title><![CDATA[]]></picture_title></picture>";
        }
        $ret = str_replace("{images}",$imagesTmp,$ret);
        $ret = str_replace("{images_end}","</pictures>",$ret);
        return $ret;
    }


}