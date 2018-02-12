<?php
require_once(BASE_PATH."/app/classes/GenericDbHelper.php");
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
            $tmpItems = $this->template_items;

            // GET AND CONVERT VALUES

            $agencyName =$rst[$i]["agency_name"];
            $agencyEmail = $rst[$i]["agent_email"];
            $agencyPhone = $rst[$i]["agent_phone"];
            $agencyMobilePhone = $rst[$i]["agent_mobile_phone"];
            $agencyMobileFax = $rst[$i]["agent_fax"];
            $agencyMobileSkype = $rst[$i]["agent_skype"];

            $link = $this->getPropertyLink($rst[$i]);
            $title = $this->getPropertyTitle($rst[$i]);

            $category = $this->getConvertedValue($this->portalId,2,$rst[$i]["id_category"]);
            $tipology = $this->getConvertedValue($this->portalId,3,$rst[$i]["id_tipology"]);
            $contract = $this->getConvertedValue($this->portalId,1,$rst[$i]["id_contract"]);

            $country = $this->getConvertedValue($this->portalId,7,$rst[$i]["id_country"]);
            $region = $this->getConvertedValue($this->portalId,8,$rst[$i]["id_region"]);
            $city = $this->getConvertedValue($this->portalId,4,$rst[$i]["id_city"]);
            $town = $this->getConvertedValue($this->portalId,5,$rst[$i]["id_town"]);
            $istat = $this->getConvertedValue($this->portalId,9,$rst[$i]["istat"]);
            $district = $this->getConvertedValue($this->portalId,6,$rst[$i]["id_district"]);

            $rooms = $this->getConvertedValue($this->portalId,10,$rst[$i]["id_rooms"]);
            $locals = $this->getConvertedValue($this->portalId,11,$rst[$i]["id_locals"]);
            $bathrooms = $this->getConvertedValue($this->portalId,12,$rst[$i]["id_bathrooms"]);
            $floor = $this->getConvertedValue($this->portalId,13,$rst[$i]["id_floor"]);
            $elevator = $this->getConvertedValue($this->portalId,14,$rst[$i]["id_elevator"]);
            $heating = $this->getConvertedValue($this->portalId,15,$rst[$i]["id_heating"]);
            $box = $this->getConvertedValue($this->portalId,16,$rst[$i]["id_box"]);
            $garden = $this->getConvertedValue($this->portalId,17,$rst[$i]["id_garden"]);

            $propertyConditions = $this->getConvertedValue($this->portalId,18,$rst[$i]["id_property_conditions"]);
            $propertyStatus = $this->getConvertedValue($this->portalId,19,$rst[$i]["id_property_status"]);

            $energyClass = $this->getConvertedValue($this->portalId,20,$rst[$i]["id_energy_class"]);
            $ipe_um = $this->getConvertedValue($this->portalId,21,$rst[$i]["id_ipe_um"]);

            $toReplace=array("&","è","à","ì","ù");
            $replacement=array("&amp;","e'","a'","i'","u'");
            $description=str_replace($toReplace,$replacement,$rst[$i]["desc_it"]);
            $description.=" Per info www.tecnoimmobiligroup.it email:$agencyEmail telefono:$agencyPhone.";
            $description=str_replace("&amp;#39;","'",$description);



            // POPULATE TEMPLATE REPEAT WITH VALUES
            $tmpItems = str_replace("{agency_name}",$rst[$i]["agency_name"],$tmpItems);
            $tmpItems = str_replace("{agent_email}",$rst[$i]["agent_email"],$tmpItems);
            $tmpItems = str_replace("{agent_phone}",$rst[$i]["agent_phone"],$tmpItems);
            $tmpItems = str_replace("{agent_mobile_phone}",$rst[$i]["agent_mobile_phone"],$tmpItems);
            $tmpItems = str_replace("{agent_fax}",$rst[$i]["agent_fax"],$tmpItems);
            $tmpItems = str_replace("{agent_skype}",$rst[$i]["agent_skype"],$tmpItems);


            $tmpItems = str_replace("{link}",SITE_URL."/".$link,$tmpItems);
            $tmpItems = str_replace("{title}",$title,$tmpItems);
            $tmpItems = str_replace("{id_property}",$rst[$i]["id"],$tmpItems);

            $tmpItems = str_replace("{category}",$category,$tmpItems);
            $tmpItems = str_replace("{tipology}",$tipology,$tmpItems);
            $tmpItems = str_replace("{contract}",$contract,$tmpItems);


            $tmpItems = str_replace("{country}",$country,$tmpItems);
            $tmpItems = str_replace("{region}",$region,$tmpItems);
            $tmpItems = str_replace("{city}",$city,$tmpItems);
            $tmpItems = str_replace("{city_short}",$rst[$i]["city_short"],$tmpItems);
            $tmpItems = str_replace("{town}",$town,$tmpItems);
            $tmpItems = str_replace("{istat}",$istat,$tmpItems);
            $tmpItems = str_replace("{district}",$district,$tmpItems);
            $tmpItems = str_replace("{street}",$rst[$i]["street"],$tmpItems);
            $tmpItems = str_replace("{street_num}",$rst[$i]["street_num"],$tmpItems);
            $tmpItems = str_replace("{complete_address}",$rst[$i]["street"]." ".$rst[$i]["street_num"],$tmpItems);
            $tmpItems = str_replace("{longitude}",$rst[$i]["longitude"],$tmpItems);
            $tmpItems = str_replace("{latitude}",$rst[$i]["latitude"],$tmpItems);

            $tmpItems = str_replace("{price}",$rst[$i]["price"],$tmpItems);
            $tmpItems = str_replace("{surface}",$rst[$i]["mq"],$tmpItems);
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
            $tmpItems = str_replace("{ipe_um}",$ipe_um,$tmpItems);
            $tmpItems = str_replace("{date_ins}",$rst[$i]["date_ins"],$tmpItems);
            $tmpItems = str_replace("{date_up}",$rst[$i]["date_up"],$tmpItems);

            $tmpItems = str_replace("{description}",$description,$tmpItems);


            $finalItems .= $tmpItems;

        }
        $finalFile = str_replace("{items}",$finalItems,$finalFile);


        return $finalFile;

    }


    public static function getConvertedValue($portalId,$conversionCategory,$original){
        $dbH = new GenericDbHelper();

        $ret = $dbH->executeQuery("Select converted from prt_feed_field_conversion where category_id=$conversionCategory and original='$original' and id_portal=$portalId ");

        if(count($ret)<1)
            return $original;
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