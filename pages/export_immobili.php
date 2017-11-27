<?php 
echo '<?xml version="1.0" encoding="UTF-8" ?>';
echo '<properties>';

header("content-type: text/xml ");
include("../include/connessione_mysqli.php");

//$SITE_URL = "http://localhost/Tecnoimmobili/SITE/";
$SITE_URL = "http://www.tecnoimmobiligroup.it/";

$feed ="";
$conn = openConn();
//$sql = "SELECT * FROM immobili where id in(2901) order by id desc ";
//$sql = "SELECT * FROM immobili where id in(2926,2925,2924,2915,2905,2903,2901) order by id desc ";
//$sql = "SELECT * FROM immobili where id in(2900,2899,2898,2897,2996,2995,2994,2993) order by id desc ";
//$sql = "SELECT * FROM immobili  where statoannuncio = 1 and eliminato = 0 order by id desc LIMIT 400";
$sql = "SELECT * FROM immobili LIMIT 200";
$result = $conn->query($sql);

while($rs = mysqli_fetch_array($result)){
	$sql = "SELECT partita_iva FROM agenzie where id = ".$rs['id_agenzia']." Limit 1";
	$res_p_iva = mysqli_fetch_array($conn->query($sql));
	
	$feed .="<property id_ew='".$rs['id_easywork']."' id='".$rs['id']."'>";
	// MANCA AGENT ID
	$feed .="<agency_id>".$rs['id_agenzia']."</agency_id>";
	$feed .="<agency_p_iva>".$res_p_iva['partita_iva']."</agency_p_iva>";
	$feed .="<agent_id>1</agent_id>";
	$feed .="<contract>".$rs['contratto']."</contract>";
	$feed .="<asta_immobiliare>".$rs['asta_immobiliare']."</asta_immobiliare>";
	$feed .="<id_contract_status>".getContractStatus($rs)."</id_contract_status>";
	$feed .="<country>Italia</country>";
	$feed .="<region><![CDATA[".getRegionByCity($rs,$conn)."]]></region>";
	$feed .="<city><![CDATA[".$rs['provincia']."]]></city>";
	$feed .="<town><![CDATA[".$rs['comune']."]]></town>";
	$feed .="<district><![CDATA[".$rs['zona']."]]></district>";
	$feed .="<street show_address='".$rs['indirizzomappa']."'><![CDATA[".$rs['via']."]]></street>";
	$feed .="<street_num>".$rs['civico']."</street_num>";
	$feed .="<longitude>".$rs['longitudine']."</longitude>";
	$feed .="<latitude>".$rs['latitudine']."</latitude>";
	$feed .="<category><![CDATA[".$rs['categoria']."]]></category>";
	$feed .="<tipology><![CDATA[".rtrim($rs['tipologia']," ")."]]></tipology>";
	$feed .="<mq>".$rs['mq']."</mq>";
	$feed .="<price>".$rs['prezzo']."</price>";
	$feed .="<negotiation_reserved>".($rs['ico_trattativa']=='0'?0:1)."</negotiation_reserved>";
	$feed .="<id_locals>".realVal($rs["locali"],"NN","0")."</id_locals>";
	$feed .="<id_rooms>".realVal($rs["camere"],"NN")."</id_rooms>";
	$feed .="<id_bathrooms>".realVal($rs["bagni"],"NN")."</id_bathrooms>";
	$feed .="<id_box>".realVal($rs["box"],"NN")."</id_box>";
	$feed .="<id_floor>".realVal($rs["piano"],"NN")."</id_floor>";
	$feed .="<id_elevator>".realVal($rs["ascensore"],"NN")."</id_elevator>";
    $feed .="<id_heating>".realVal($rs["riscaldamento"],"NN")."</id_heating>";
    $feed .="<id_garden>".realVal($rs["giardino"],"NN")."</id_garden>";
    $feed .="<id_property_conditions>".realVal($rs["condizioni"],"BC")."</id_property_conditions>";
    $feed .="<id_property_status>".realVal($rs["stato"],"NN")."</id_property_status>";
    $feed .="<id_ads_status>".getAdsStatus($rs)."</id_ads_status>";
    $feed .="<prestige>".($rs["prestige"]==1?1:0)."</prestige>";
    $feed .="<price_lowered>".($rs["prezzo_ribassato"]==1?1:0)."</price_lowered>";
    $feed .="<video_url></video_url>";
    $feed .="<description><![CDATA[".$rs["descrizione"]."]]></description>";
    $feed .="<id_energy_class>".strtoupper (realVal($rs["classe_energetica"],"NN",array("in fase di","IN FASE DI")))."</id_energy_class>";
    $feed .="<id_ipe_um><![CDATA[".realVal($rs["um_IPE"],"kwh/m2 anno","NN")."]]></id_ipe_um>";
    $feed .="<ipe>".$rs["IPE"]."</ipe>";
	$feed .="<images>
				<url>".getImageUrl($rs["img1"])."</url>
				<url>".getImageUrl($rs["img2"])."</url>
				<url>".getImageUrl($rs["img3"])."</url>
				<url>".getImageUrl($rs["img4"])."</url>
				<url>".getImageUrl($rs["img5"])."</url>
				<url>".getImageUrl($rs["img6"])."</url>
				<url>".getImageUrl($rs["img7"])."</url>
				<url>".getImageUrl($rs["img8"])."</url>
				<url>".getImageUrl($rs["img9"])."</url>
				<url>".getImageUrl($rs["img10"])."</url>
			</images>";
			
	$sqlIncarico = "SELECT t2.nominativo,
						t2.indirizzo,t2.citta,t2.telefono_casa,t2.telefono_ufficio,t2.cellulare,
						t2.inquilino_nominativo,t2.inquilino_telefono,
						t3.tipo as condizione,t1.data_incarico,t1.inizio_incarico,t1.scadenza_incarico,
						t1.agente,t1.canale,t1.rinnovabile,t1.note FROM `incarichi` as t1
					JOIN incarichi_proprietari as t2 on t1.id_proprietario = t2.id
					JOIN incarichi_condizioni as t3 on t1.id_condizioni_incarico = t3.id
					WHERE t1.id = ".$rs["id_incarico"];
	$res_incarico = mysqli_fetch_array($conn->query($sqlIncarico));
	$feed .="<appointment>
				<owner_name><![CDATA[".$res_incarico['nominativo']."]]></owner_name>
				<owner_tel_home><![CDATA[".$res_incarico['telefono_casa']."]]></owner_tel_home>
				<owner_tel_office><![CDATA[".$res_incarico['telefono_ufficio']."]]></owner_tel_office>
				<owner_mobile><![CDATA[".$res_incarico['cellulare']."]]></owner_mobile>
				<owner_address><![CDATA[".$res_incarico['indirizzo']."]]></owner_address>
				<owner_town><![CDATA[".$res_incarico['citta']."]]></owner_town>
				<occupant_name><![CDATA[".$res_incarico['inquilino_nominativo']."]]></occupant_name>
				<occupant_tel><![CDATA[".$res_incarico['inquilino_telefono']."]]></occupant_tel>
				<appointment_date><![CDATA[".$res_incarico['inizio_incarico']."]]></appointment_date>
				<appointment_start_date><![CDATA[".$res_incarico['inizio_incarico']."]]></appointment_start_date>
				<appointment_end_date><![CDATA[".$res_incarico['scadenza_incarico']."]]></appointment_end_date>
				<appointment_agent><![CDATA[".$res_incarico['agente']."]]></appointment_agent>
				<appointment_channel><![CDATA[".$res_incarico['canale']."]]></appointment_channel>
				<appointment_conditions><![CDATA[".$res_incarico['condizione']."]]></appointment_conditions>
				<appointment_renwable><![CDATA[".$res_incarico['rinnovabile']."]]></appointment_renwable>
				<appointment_note><![CDATA[".$res_incarico['note']."]]></appointment_note>
			</appointment>";
	
	
	
	$feed .="</property>";
}

echo($feed);




closeConn($conn);


function getImageUrl($imagePath){
	global $SITE_URL;
	/*if($imagePath == "")
		return;
	else*/
		return $SITE_URL."".$imagePath;
}


function getContractStatus($rs){
	if($rs["ico_venduto"])
		return 2;
	else if($rs["ico_affittato"])
		return 4;
	else if($rs["contratto"] == "Vendita")
		return 1;
	else if($rs["contratto"] == "Affitto" || $rs["contratto"] == "Affitto a riscatto")
		return 3;
	
}


function getRegionByCity($rs,$conn){
	$sql = "SELECT Distinct Regione from geografica where provincia ='".$rs['provincia']."'";
	$result = $conn->query($sql);
	$res = mysqli_fetch_array($result);
	return $res["Regione"];
}

function realVal($value,$defValue,$notAcceptedValues = null){
		if($notAcceptedValues != null ){
			if(is_array($notAcceptedValues)){
				if(in_array($value, $notAcceptedValues))
				return $defValue;
			}else{
				if($value == $notAcceptedValues)
					return $defValue;
			}
		}
		if($value == "" || $value == null)
			return $defValue;
		else
			return trim($value);
}

function getAdsStatus($rs){
	if($rs["eliminato"]==1)
		return 3;
	else if($rs["statoannuncio"] == 1)
		return 1;
	else 
		return 2;
}
	
?>
</properties>



        
        
       
        