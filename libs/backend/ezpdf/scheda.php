<?php

include("../../include/connessione.php");


include('class.ezpdf.php');
$pdf =new Cezpdf();

function replaceDescriptionCode($descrizione){
	$toReplace=array("&#39;","&ldquo;","&rsquo;","&ndash;","&euro;","%u2013","\n","\r\n","&#09;","09","&nbsp;","&rdquo;","&ugrave;","&egrave;","&igrave;","&agrave;","&deg;","&ograve;"."&Ugrave;","&Egrave;","&Igrave;","&Agrave;","&Ograve;");
	$replacement=array("'",'"',"'","-","€","."," "," "," "," "," ",'"',"ù","è","ì","à","°","ò","ù","è","ì","à","ò");
	$toReplace2=array("A'","&#192;","À","&Agrave;","?","&ograve;");
	$replacement2=array("a'","a'","a'","a'","è","ò");
	$testo=$descrizione[0].strtolower(substr($descrizione,1));
	$testo= htmlentities($testo ,ENT_NOQUOTES ,"UTF-8");
	$testo = str_replace($toReplace,$replacement,$testo);
	$testo = utf8_decode($testo);
	$testo = str_replace($toReplace2,$replacement2,$testo);
	$testo =ltrim($testo);
	if(strpos($testo,"---")){
	$pos=strpos($testo,"---");
	$testo=substr($testo,0,$pos);
	}
	$lunghezza = strlen($testo);
	if($lunghezza>450){

	$testo = substr($testo,0,450)."...";
	}
	else
	{
	//$testo = substr($testo,0,$pos + 1)."...";
	}
	


	$testo=substr($testo,-$pos);
	return $testo;
}


$pdf->selectFont('./fonts/Helvetica.afm');

	$id = $_GET["id"];

	$sql = "select * from immobili where id=".$id;
	$result = mysql_query($sql,$connessione);
	$rs_im = mysql_fetch_array($result);

	$sql = "select * from agenzie where id=";
			if($_GET['idAg']){
				$sql.=$_GET['idAg'];
			}else{
				$sql.=$rs_im["id_agenzia"];
			};
	$result = mysql_query($sql,$connessione);
	$rs_ag = mysql_fetch_array($result);

//$pdf ->ezText('ciao');

// aggiungo sfondo
	$pdf->addJpegFromFile("images/sfondo.jpg",-50,-550,900);





// aggiungo logo
	//$pdf->addJpegFromFile("images/Logo.jpg",20,780,250,41);
 	$pdf->setColor(0,0,0.5);
	$pdf->addText(20,710,13,"<b>AGENZIA DI RIFERIMENTO</b>");

	$pdf->ezSetY(695);
	$data = array(array('name'=>$rs_ag["insegna"]),array('name'=>"Indirizzo: ".$rs_ag["indirizzo"]." ".$rs_ag["civico"]),array('name'=>strtoupper(str_replace("Ã¨","E'",$rs_ag["comune"]))."  (".strtoupper(str_replace("Ã¨","E'",$rs_ag["provincia"]).")")),array('name'=>"Tel.  ".$rs_ag["telefono"]),array('name'=>"Fax. ".$rs_ag["fax"]),array('name'=>"Email: ".$rs_ag["email"]));
	$pdf->ezTable($data,"","",array('showHeadings'=>0,'shaded'=>0,'showLines'=>0,'fontSize' => 12,'xPos' => '20','xOrientation' => 'right'));
	
	$pdf->setStrokeColor(0,0,0);
	$pdf->setLineStyle(0.5);
	$pdf->line(20,580,575,580);

	$pdf->setLineStyle(3);
	$pdf->setStrokeColor(1,1,1);
	
	if($rs_im["prezzo"]=="0"){
		$prezzo = "Trattativa Riservata";
	}
	else
	{
		
		$prezzo = number_format($rs_im["prezzo"],2,",",".");
	}
	//TITOLO PAGINA
	$pdf->setColor(0,0,0.5);
	$pdf->addText(20,545,14,"<b>".$rs_im['tipologia']." in ".$rs_im['contratto']." ".$rs_im['comune']."</b>");
	$pdf->setColor(0,0,0);
	//PREZZO
	$pdf->setColor(0,0,0.5);
	if($prezzo == "Trattativa Riservata"){
		$pdf->addText(450,545,14,$prezzo);
		$pdf->setColor(0,0,0);
	}else{
	$pdf->addText(470,545,14,"€");
	$pdf->addText(490,545,14,$prezzo);
	$pdf->setColor(0,0,0);
	}
	
	if($rs_im["img1"]!= ""){
	$pdf->rectangle(20,380,200,144);
	$pdf->addJpegFromFile('../../'.$rs_im["img1"],20,380,200,144);
	}
	if($rs_im["img2"]!= ""){
	$pdf->rectangle(20,220,200,144);
	$pdf->addJpegFromFile('../../'.$rs_im["img2"],20,220,200,144);
	}
	if($rs_im["img3"]!= ""){
	$pdf->rectangle(20,60,200,144);
	$pdf->addJpegFromFile('../../'.$rs_im["img3"],20,60,200,144);
	}


	$pdf->setLineStyle(10);
	$pdf->setStrokeColor(30,30,30,5);
	$pdf->rectangle(0,0,595,842);
	
	
	

	$pdf->addJpegFromFile("images/logo_icona.jpg",250,505,20);
	$pdf->setColor(0,0,0.5);
	$pdf->addText(270,510,13,"<b>DETTAGLIO DELL'IMMOBILE</b>");
	$pdf->setColor(0,0,0);


	
	$pdf->addText(260,470,14,"Comune: ");
	$pdf->addText(260,450,12,"Provincia: ");
	$pdf->addText(260,435,12,"Zona: ");
	$pdf->addText(260,420,12,"Categoria immobile: ");
	$pdf->addText(260,405,12,"Tipologia immobile ");
	$pdf->addText(260,390,12,"Superficie (mq): ");
	$pdf->addText(260,375,12,"Piano: ");
	$pdf->addText(260,360,12,"Locali: ");
	$pdf->addText(260,345,12,"Camere: ");
	$pdf->addText(260,330,12,"Ascensore: ");
	$pdf->addText(260,315,12,"Riscaldamento: ");
	$pdf->addText(260,300,12,"Bagni: ");
	$pdf->addText(260,285,12,"Box: ");
	$pdf->addText(260,270,12,"Giardino: ");
	


	$provincia="";
	$comune="";
	$zona="";
	$via="";
	$stato="";
	$condizioni="";
	$piano="";
	$locali="";
	$camere="";
	$ascensore="";
	$riscaldamento="";
	$bagni="";
	$box="";
	$giardino="";
	$prezzo="";

// *************************   PIANO

if($rs_im["piano"]==""){
$piano = "Non specificato";
}
else
{
switch($rs_im["piano"]){
case "R":
$piano = "Piano rialzato";
break;
case "T":
$piano = "Piano terreno";
break;
case "U":
$piano = "Ultimo piano";
break;
case "7+":
$piano = "Oltre il 7° piano";
break;
case "PL":
$piano = "Su più livelli";
break;
default:
$piano = "Situato al ".$rs_im["piano"]."° piano";
break;
}
}

// *************************   LOCALI
if($rs_im["locali"]==""){
$locali = "Non specificato";
}
else
{
if($rs_im["locali"]==1){
$locali = "Composto da ".$rs_im["locali"]." locale";
}
else
{
$locali = "Composto da ".$rs_im["locali"]." locali";
}
}

// *************************   CAMERE


if($rs_im["camere"]==""){
$camere = "Non specificato";
}
else
{
if($rs_im["camere"]==1){
$camere = $rs_im["camere"]." camera";
}
else
{
$camere = $rs_im["camere"]." camere";
}
}
// *************************   ASCENSORE
if($rs_im["ascensore"]==""){
$ascensore = "Non specificato";
}
else
{
if(strtoupper($rs_im["ascensore"])=="NO"){
$ascensore = "Senza ascensore";
}
else
{
$ascensore = "Con ascensore";
}
}


// *************************   RISCALDAMENTO
if($rs_im["riscaldamento"]==""){
$riscaldamento = "Non specificato";
}
else
{
if(strtoupper($rs_im["riscaldamento"])=="CEN"){
$riscaldamento = "Risc. centralizzato";
}
if(strtoupper($rs_im["riscaldamento"])=="AUT"){
$riscaldamento = "Risc. autonomo";
}
if(strtoupper($rs_im["riscaldamento"])=="NO"){
$riscaldamento = "Senza riscaldamento";
}
}
// *************************   BAGNI

if($rs_im["bagni"]==""){
$bagni = "Non specificato";
}
else
{
if($rs_im["bagni"]==1){
$bagni = $rs_im["bagni"]." bagno";
}
else
{
$bagni = $rs_im["bagni"]." bagni";
}
if($rs_im["bagni"]=="EST"){
$bagni = "Bagno esterno";
}
if($rs_im["bagni"]=="NO"){
$bagni = "Senza bagno";
}
}

// *************************   BOX
$box="";
if($rs_im["box"]==""){
$box = "Non specificato";
}
else
{
switch($rs_im["box"]){
case "NO":
case "":
$box = "Senza Box";
break;
case "SC":
$box = "Box singolo";
break;
case "D":
$box = "Box doppio";
break;
case "T":
$box = "Box triplo";
break;
case "PC":
$box = "Posto auto coperto";
break;
case "PS":
$box = "Posto auto scoperto";
break;
}
}

// *************************   INDIRIZZO

if($rs_im["via"]==""){
$via = "Non specificato";
}
else
{
$via = $rs_im["via"]." ".$rs_im["civico"];
}

// *************************   STATO

if($rs_im["stato"]==""){
$stato = "Non specificato";
}
else
{
$stato = $rs_im["stato"];
}

// *************************   CONDIZIONI

if($rs_im["condizioni"]==""){
$condizioni = "Non specificato";
}
else
{
$condizioni = $rs_im["condizioni"];
}


// *************************   GIARDINO

if($rs_im["giardino"]==""){
$giardino = "Non specificato";
}
else
{
$giardino = $rs_im["giardino"];
	switch ($giardino){
		case "PRI":
			$giardino="Giardino privato";
			break;
		case "COM":
			$giardino="Giardino in comune";
			break;
		case "NN":
			$giardino="Non specificato";
			break;
			
	}
}


// *************************   PREZZO

if($rs_im["prezzo"]=="0"){
$prezzo = "Trattativa";
}
else
{
$prezzo = number_format($rs_im["prezzo"],2,",",".")." €";
}

	
	
	$pdf->addText(400,470,14,str_replace("Ã¨","è",$rs_im["comune"]));
	$pdf->addText(400,450,12,str_replace("Ã¨","è",$rs_im["provincia"]));
	$pdf->addText(400,435,12,str_replace("Ã¨","è",$rs_im["zona"]));
	$pdf->addText(400,420,12,$rs_im["categoria"]);
	$pdf->addText(400,405,12,$rs_im["tipologia"]);
	$pdf->addText(400,390,12,$rs_im["mq"]);
	$pdf->addText(400,375,12,$piano);
	$pdf->addText(400,360,12,$locali);
	$pdf->addText(400,345,12,$camere);
	$pdf->addText(400,330,12,$ascensore);
	$pdf->addText(400,315,12,$riscaldamento);
	$pdf->addText(400,300,12,$bagni);
	$pdf->addText(400,285,12,$box);
	$pdf->addText(400,270,12,$giardino);
	


	$pdf->addJpegFromFile("images/logo_icona.jpg",250,190,20);
	$pdf->setColor(0,0,0.5);
	$pdf->addText(270,195,13,"<b>DESCRIZIONE DELL'IMMOBILE</b>");
	$pdf->setColor(0,0,0);
	$pdf->ezsetY(180);
	
	$descrizione=replaceDescriptionCode($rs_im["descrizione"]);
	$pdf->ezText($descrizione,12,array('left'=> 231,"justification"=>"full"));



	//$pdf->addJpegFromFile("..\img\Immagine_prova.jpg",20,80,200,144);

// aggiungo etichetta agenzia


//	$pdf->setStrokeColor(0,0,0);
	//$pdf->setLineStyle(1);
//	$pdf->rectangle(75,400,200,144);
//$pdf->addJpegFromFile("..\img\Immagine_prova.jpg",75,400,200,144);



	$pdf->ezStream();

?>