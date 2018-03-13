
<?php
/*
 * CONVERSION CATEGORIES ID's
1	Contratto	property_contracts
2	Categoria	property_categories
3	Tipologia	property_tipologies
4	Provincia	geo_city
5	Comune	geo_town
6	Zona	geo_district
7	Paese	geo_country
8	Regione	geo_region
9	istat	geo_town
10	istat	geo_district
11	Camere	property_rooms
12	Locali	property_locals
13	Bagni	property_bathrooms
14	Piano	property_floors
15	Ascensore	property_elevators
16	Riscaldamento	property_heatings
17	box	property_box
18	Giardino	property_gardens
19	Condizioni immobile	property_conditions
20	Stato immobile	property_status
21	Classe energetica	property_energy_class
22	ipe_um	property_ipe_um
*/


require_once(BASE_PATH."/app/classes/GenericDbHelper.php");
require_once(BASE_PATH."/app/classes/ImageHelper/ImagesInfo.php");

//header("content-type: text/text;charset=utf-8");
class Feed
{

    protected $portalId;
    protected $template;
    protected $template_items;

    public function __construct($portalId,$template,$items) {
        $this->portalId = $portalId;
        $this->template = $template;
        $this->template_items = $items;
    }



    public function getPropertyFeed($rst){

        $finalFile = $this->template;
        $finalItems = "";
        for($i = 0 ; $i < Count($rst) ;$i++){

            $finalItems .= $this->PopulateRow($rst[$i]);
        }
        $finalFile = str_replace("{items}",$finalItems,$finalFile);


        return $finalFile;

    }


    public function getAgencyFeed($template,$template_items){
        return "agenzie_test";
    }


    // #####################################################################
    //######## I WILL REPLACE THIS FUNCTION IF I NEED MORE COMPLEX CONVERSIONS
    //#####################################################################
    public function PopulateRow($row){
        $tmpItems = $this->template_items;

        // GET AND CONVERT VALUES

        $agencyId   = $row["id_agency"];
        $agencyName = $row["agency_name"];
        $agencyEmail = $row["agent_email"];
        $agencyPhone = $row["agent_phone"];
        $agencyMobilePhone = $row["agent_mobile_phone"];
        $agencyeFax = $row["agent_fax"];
        $agencySkype = $row["agent_skype"];

        $link = $this->getPropertyLink($row);
        $title = $this->getPropertyTitle($row);

        $category = $this->getConvertedValue($this->portalId,2,$row["id_category"],$row["category"]);
        $tipology = $this->getConvertedValue($this->portalId,3,$row["id_tipology"],$row["tipology"]);
        $contract = $this->getConvertedValue($this->portalId,1,$row["id_contract"],$row["contract"]);

        $country = $this->getConvertedValue($this->portalId,7,$row["id_country"],$row["country"]);
        $region = $this->getConvertedValue($this->portalId,8,$row["id_region"],$row["region"]);
        $city = $this->getConvertedValue($this->portalId,4,$row["id_city"],$row["city"]);
        $town = $this->getConvertedValue($this->portalId,5,$row["id_town"],$row["town"]);
        $istat = $this->getConvertedValue($this->portalId,9,$row["istat"]);
        $district = $this->getConvertedValue($this->portalId,6,$row["id_district"],$row["district"]);
        $cap = $this->getConvertedValue($this->portalId,10,$row["cap"]);
        $rooms = $this->getConvertedValue($this->portalId,11,$row["id_rooms"],$row["rooms"]);
        $locals = $this->getConvertedValue($this->portalId,12,$row["id_locals"],$row["locals"]);
        $bathrooms = $this->getConvertedValue($this->portalId,13,$row["id_bathrooms"],$row["bathrooms"]);
        $floor = $this->getConvertedValue($this->portalId,14,$row["id_floor"],$row["floorN"]);
        $elevator = $this->getConvertedValue($this->portalId,15,$row["id_elevator"]);
        $heating = $this->getConvertedValue($this->portalId,16,$row["id_heating"],$row["elevator"]);
        $box = $this->getConvertedValue($this->portalId,17,$row["id_box"],$row["box"]);
        $garden = $this->getConvertedValue($this->portalId,18,$row["id_garden"],$row["garden"]);

        $propertyConditions = $this->getConvertedValue($this->portalId,19,$row["id_property_conditions"],$row["property_conditions"]);
        $propertyStatus = $this->getConvertedValue($this->portalId,20,$row["id_property_status"],$row["property_status"]);

        $energyClass = $this->getConvertedValue($this->portalId,21,$row["id_energy_class"],$row["energy_class"]);
        $ipe_um = $this->getConvertedValue($this->portalId,22,$row["id_ipe_um"],$row["ipe_um"]);

        $toReplace=array("&","è","à","ì","ù");
        $replacement=array("&amp;","e'","a'","i'","u'");
        $description=str_replace($toReplace,$replacement,$row["desc_it"]);
        $description.=" Per info www.tecnoimmobiligroup.it email:$agencyEmail telefono:$agencyPhone.";
        $description=str_replace("&amp;#39;","'",$description);



        // POPULATE TEMPLATE REPEAT WITH VALUES
        $tmpItems = str_replace("{id_agency}",$agencyId,$tmpItems);
        $tmpItems = str_replace("{agency_name}",$agencyName,$tmpItems);
        $tmpItems = str_replace("{agent_email}",$agencyEmail,$tmpItems);
        $tmpItems = str_replace("{agent_phone}",$agencyPhone,$tmpItems);
        $tmpItems = str_replace("{agent_mobile_phone}",$agencyMobilePhone,$tmpItems);
        $tmpItems = str_replace("{agent_fax}",$agencyeFax,$tmpItems);
        $tmpItems = str_replace("{agent_skype}",$agencySkype,$tmpItems);


        $tmpItems = str_replace("{link}",SITE_URL."/".$link,$tmpItems);
        $tmpItems = str_replace("{title}",$title,$tmpItems);
        $tmpItems = str_replace("{id_property}",$row["id"],$tmpItems);
        $tmpItems = str_replace("{reference_code}",$row["reference_code"],$tmpItems);

        $tmpItems = str_replace("{category}",$category,$tmpItems);
        $tmpItems = str_replace("{tipology}",$tipology,$tmpItems);
        $tmpItems = str_replace("{contract}",$contract,$tmpItems);


        $tmpItems = str_replace("{country}",$country,$tmpItems);
        $tmpItems = str_replace("{region}",$region,$tmpItems);
        $tmpItems = str_replace("{city}",$city,$tmpItems);
        $tmpItems = str_replace("{city_short}",$row["city_short"],$tmpItems);
        $tmpItems = str_replace("{town}",$town,$tmpItems);
        $tmpItems = str_replace("{istat}",$istat,$tmpItems);
        $tmpItems = str_replace("{district}",$district,$tmpItems);
        $tmpItems = str_replace("{cap}",$cap,$tmpItems);
        $tmpItems = str_replace("{street}",$row["street"],$tmpItems);
        $tmpItems = str_replace("{street_num}",$row["street_num"],$tmpItems);
        $tmpItems = str_replace("{complete_address}",$row["street"]." ".$row["street_num"],$tmpItems);
        $tmpItems = str_replace("{show_address}",$row["show_address"],$tmpItems);
        $tmpItems = str_replace("{longitude}",$row["longitude"],$tmpItems);
        $tmpItems = str_replace("{latitude}",$row["latitude"],$tmpItems);

        $tmpItems = str_replace("{price}",$row["price"],$tmpItems);
        $tmpItems = str_replace("{negotiation_reserved}",$row["negotiation_reserved"],$tmpItems);
        $tmpItems = str_replace("{surface}",$row["mq"],$tmpItems);
        $tmpItems = str_replace("{rooms}",$rooms,$tmpItems);
        $tmpItems = str_replace("{locals}",$locals,$tmpItems);
        $tmpItems = str_replace("{bathrooms}",$bathrooms,$tmpItems);
        $tmpItems = str_replace("{floor}",$floor,$tmpItems);
        $tmpItems = str_replace("{elevator}",$elevator,$tmpItems);
        $tmpItems = str_replace("{heating}",$heating,$tmpItems);
        $tmpItems = str_replace("{box}",$box,$tmpItems);
        $tmpItems = str_replace("{garden}",$garden,$tmpItems);

        $tmpItems = str_replace("{property_conditions}",$propertyConditions,$tmpItems);
        $tmpItems = str_replace("{property_status}",$propertyStatus,$tmpItems);



        $tmpItems = str_replace("{energy_class}",$energyClass,$tmpItems);
        $tmpItems = str_replace("{ipe}",$row["ipe"],$tmpItems);
        $tmpItems = str_replace("{ipe_um}",$ipe_um,$tmpItems);
        $tmpItems = str_replace("{date_ins}",$row["date_ins"],$tmpItems);
        $tmpItems = str_replace("{date_up}",$row["date_up"],$tmpItems);

        $tmpItems = str_replace("{description}",$description,$tmpItems);

        $images = $this->GetImages($row);

        $tmpItems = $this->PopulateImages($images,$tmpItems);

        return $tmpItems;
    }


    public function GetImages($row){

        $imgH = new ImagesInfo();
        $img_path = $imgH->info["properties"]["big"]["path"];
        $id = $row["id"];
        $dbh = new GenericDbHelper();
        $dbh->setTable("property_images");
        $images = array();
        $retImages = $dbh->read("id_property = ?",null, array($id),null,false);
        $dbh->setDefTable();
        for($i = 0 , $len = Count($retImages) ; $i < $len ; $i++ ){
            $imgUrl = SITE_URL."/".$img_path.$retImages[$i]["img_name"];
            array_push($images,array("id_type" => $retImages[$i]["id_img_type"], "url" => $imgUrl));
        }

        return $images;
    }


    // #####################################################################
    //######## I WILL REPLACE THIS FUNCTION TO MATCH DIFFERENT IMAGES TAGS AND PATTERNS
    //#####################################################################
    public function PopulateImages($images,$template){
        $ret = $template;
        $ret = str_replace("{images_start}","<images>",$ret);

        $imagesTmp = "";
        for($i = 0 ; $i < Count($images) ; $i++){

            $imagesTmp .= "<image><![CDATA[".$images[$i]["url"]."]]></image>";
        }
        $ret = str_replace("{images}",$imagesTmp,$ret);
        $ret = str_replace("{images_end}","<images>",$ret);
        return $ret;
    }







    public  function getConvertedValue($portalId,$conversionCategory,$originalId,$originalTxt ="",$ifNullgetTxt = true){
        $dbH = new GenericDbHelper();

        $ret = $dbH->executeQuery("Select converted from prt_feed_field_conversion where category_id=$conversionCategory and original='$originalId' and id_portal=$portalId ");

        if(count($ret)<1){
            if($ifNullgetTxt && $originalTxt !="")
                return $originalTxt;
            else
                return $originalId;
        }
        else
            return $ret[0]["converted"];
    }
    public function getPropertyLink($row){

        return PropertyLinksAndTitles::getDetailLink($row["contract"],$row["tipology"],$row["town"],$row["reference_code"],$row["reference_code"]);

    }

    public function getPropertyTitle($row){

        return PropertyLinksAndTitles::getTitleNoDb($row["tipology"],$row["contract"],$row["town"],$row["street"],$row["district"]);

    }


    public function replaceValues($values,$replacements,$inputValue){

        if(is_array($values) || is_array($replacements)){
            if(!is_array($values) || !is_array($replacements)){
                Flog::logError("Feed.php -> replaceValues -> if values or replacements is an array the other must be the same", "feeds_log",true);
                exit();
            }else{
                if(Count($values) != Count($replacements)){
                    Flog::logError("Feed.php -> replaceValues -> Values and replacements must be sent with equals length", "feeds_log",true);
                    exit();
                }
            }
        }

        $retVal = str_replace($values,$replacements,$inputValue);
        return $retVal;

    }

}