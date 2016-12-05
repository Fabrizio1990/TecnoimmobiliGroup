
<?php 
	
	header('Content-type: text/json; charset=utf-8');
	include("../../include/connessione_mysqli.php");
	$cn = openConn();
	$rand_num = Rand(0,100);
	
	$array = array("aaData"=>array());//sintassi di base che si aspetta datatable , cioè un json con elemento padre aaData e i sottoelementi contengono i dati
	
	$data_up = isset($_GET["data_up"])?urldecode($_GET["data_up"]):"";
	if($_COOKIE['agency_id']=="1"){
		$filiale = isset($_GET["filiale"])?urldecode($_GET["filiale"]):"";
	}else{
		$filiale = $_COOKIE['agency_id'];
	}

	$dt_from		=	isset($_GET["dt_from"])?urldecode($_GET["dt_from"]):"";
	$dt_to			=	isset($_GET["dt_to"])?urldecode($_GET["dt_to"]):"";
	$categoria		=	isset($_GET["categoria"])?str_replace(",","','",urldecode($_GET["categoria"])):"";
	$tipologia		=	isset($_GET["tipologia"])?str_replace(",","','",urldecode($_GET["tipologia"])):"";
	$provincia		=	isset($_GET["provincia"])?str_replace(",","','",urldecode($_GET["provincia"])):"";
	$comune			=	isset($_GET["comune"])?str_replace(",","','",urldecode($_GET["comune"])):"";
	$zona			=	isset($_GET["zona"])?str_replace(",","','",urldecode($_GET["zona"])):"";
	$stato			=	isset($_GET["stato"])?str_replace(",","','",urldecode($_GET["stato"])):"";
	
	$query = "select * from immobili where 1=1 ";
	$query .= $filiale!=""?" and id_agenzia in ( ".$filiale.") ":"";
	$query .= $data_up!=""?" and data_up LIKE '%".$data_up."%' ":"";
	
	$query .= $dt_from!=""?" and data_ins > '".$dt_from."' ":"";
	$query .= $dt_to!=""?" and data_ins < '".$dt_to."' ":"";
	$query .= $categoria!=""?" and categoria in ('".$categoria."') ":"";
	$query .= $tipologia!=""?" and tipologia in ('".$tipologia."') ":"";
	$query .= $provincia!=""?" and provincia in ( '".$provincia."') ":"";
	$query .= $comune!=""?" and comune  in ( '".$comune."') ":"";
	$query .= $zona!=""?" and zona  in ( '".$zona."') ":"";
	$query .= $stato!=""?" and statoannuncio  in ( '".$stato."') ":"";
	//$query .= "Limit 1";
	//echo($query);
	$result = mysqli_query($cn,$query);
	
	if (mysqli_num_rows($result) > 0){
		while($res = mysqli_fetch_assoc($result)){
				
				/* --- CONVERTO LE DATE TOGLIENDO L'ora (ma metto la data completa hidden perchè servè per un ordinamento corretto --*/
				$data_up = Date("d-m-Y",strtotime($res["data_up"]));
				$data_ins = Date("d-m-Y",strtotime($res["data_ins"]));
				$data_ins_field = "<span style='display:none'>".$res["data_ins"]."</span>".$data_ins;
				$data_up_field = "<span style='display:none'>".$res["data_up"]."</span>".$data_up;
				
				
				$first_col = "<a href='AR_immobili_inserimento.php?idimmobile=".$res["id"]."' > <img class='real_tumb' src='../".$res["img_th_min"]."?id=".$rand_num."' /> </a>";
				
				/* ------------ RECUPERO DATI PER COLONNA STATO ------------ */
				$strstato = $res["statoannuncio"]==1?"../images/ann_attivo.png":"../images/ann_bloccato.png";
				
				
				$ico_trattativa="";
				if($res["ico_trattativa"]=="1"){
					$ico_trattativa="<img style='width:28px;height:14px; border:0;' title='In trattativa' src='../images/img_AR/ico_in_trattativa.png'>";
				}elseif($res['ico_venduto']=="1"){
					$ico_trattativa="<img style='width:14px;height:14px; border:0;' title='Venduto' src='../images/img_AR/ico_venduto.png'>";
				}elseif($res['ico_affittato']=="1"){
					$ico_trattativa="<img style='width:14px;height:14px; border:0;' title='Affittato' src='../images/img_AR/ico_affittato.png'>";
				}
				
				$stato_annuncio = '<div id="stato_annuncio'.$res["id"].'"><a href="javascript:SwitchAdsStatus('.$res["id"].')"><img id="ads_status_img_'.$res["id"].'" style="width:24px;height:24px;border:0px;margin-top:3px;" title="clicca per modificare" src="'.$strstato.'" ></a><p>'.$ico_trattativa.'</p></div>';
				/* ------------   ------------ */
				
				/* ------------ RECUPERO DATI PER COLONNA RIVISTA ------------ */
				if($res["mostra_rivista"]==1){
					$strRivista = "../images/img_AR/annuncio_in_rivista.png";
				}
				else
				{
					$strRivista = "../images/img_AR/annuncio_nn_rivista.png";
				}
				$rivista = '<a href="javascript:SwitchNewsStatus('.$res["id"].')"><img id="news_status_img_'.$res["id"].'" style="width:48px;height:48px;border:0px;margin-top:3px;" title="clicca per modificare" src="'.$strRivista.'" ></a>';
				/* -----------   ------------ */
				
				if($_COOKIE['user_type']=="1"){
				//controllo se l annuncio è sui portali per settare l immagine giusta, per fare ciò controllo se nella tabella immobili_portali c è almeno un portale settato a 1, se c è n è uno settato a 1 allora l immagine sarà mostra in portali, altrimenti sarà non in portali
					$trovato= 1;//controlloImmobiliSuiPortali($res['id'],$cn);
					if($res["mostra_in_portali"]=="1"){
						$strPortali = "../images/img_AR/mostra_in_portali.png";
					}
					else
					{
						$strPortali = "../images/img_AR/non_in_portali.png";
					}	
				
					$portali = '<a href="javascript:SwitchPortalStatus('.$res["id"].')"><img id="portal_status_img_'.$res["id"].'" style="width:40px;height:40px;border:0px;margin-top:3px;" title="clicca per modificare" src="'.$strPortali.'" ></a>';
					
					// se sono amministratore restituisco anche i dati dei portali alla datatable
					array_push($array["aaData"],array($first_col,$res["provincia"],$res["comune"],$res["zona"],$res["categoria"],$res["tipologia"],$res["prezzo"],$data_ins_field,$data_up_field,$stato_annuncio,$rivista,$portali));

				 }else{
					// se non sono amministratore non restituisco i dati dei portali
					array_push($array["aaData"],array($first_col,$res["provincia"],$res["comune"],$res["zona"],$res["categoria"],$res["tipologia"],$res["prezzo"],$data_ins_field,$data_up_field,$stato_annuncio,$rivista));
				}
			
		}
	}
	
	$cn = closeConn($cn);
	echo(json_encode($array));
	
	
	
?>