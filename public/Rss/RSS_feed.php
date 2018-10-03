<?php
//Con questa riga mandiamo al browser un header compatibile col formato XML
//header("Content-type: application/xml; charset=utf-8");

require_once ("../../config.php");
include BASE_PATH."/app/classes/PropertyManager.php";
include BASE_PATH."/app/classes/PropertyLinksAndTitles.php";


$pMng = new PropertyManager();
$imgInfo = new ImagesInfo();
$IMG_INFO = $imgInfo->info;

//GET PROPERTY IMAGES DEFAULT PATHS
$imgPathMin = SITE_URL."/".$IMG_INFO["properties"]["min"]['path'];
$imgPathNormal = SITE_URL."/".$IMG_INFO["properties"]["normal"]['path'];
$imgPathBig = SITE_URL."/".$IMG_INFO["properties"]["big"]['path'];



//Seleziono le ultime 20 notizie
$properties = $pMng->getAllProperties("id_ads_status = 1","limit 20",null,null,false);
//var_dump($properties);



//Ora iniziamo a occuparci del feed vero e proprio
require_once(BASE_PATH."/app/classes/feedcreator.class.php");
//includiamo la classe col nome che le abbiamo assegnato

//e inizializziamo l'oggetto con parametri personalizzati (descrizione, titolo e link)
$rss = new UniversalFeedCreator();
$rss->useCached();
$rss->title = "Tecnoimmobiligroup.it";
$rss->description = "Annunci immobiliari di Teconimmobili Group Service";


$rss->link = "http://www.tecnoimmobiligroup.it"; //Questo non viene reso nel feed, sarà un bug
$rss->feedURL = "http://www.tecnoimmobiligroup.it/rss/rss.php";

$image = new FeedImage();

$image->title = "TecnoimmobiliGroupService";
$image->url = "http://www.tecnoimmobiligroup.it/images/Logo.jpg";
$image->link = "http://www.tecnoimmobiligroup.it";
$image->description = "Annunci immobiliari su Tecnoimmobiligroup.it";

$rss->image = $image;

//Questa funzione rimpiazza alcuni caratteri speciali con le relative entità XML
//serve per evitare errori nell'output
function xmlentities ( $string ) {
    $ar1 = array ( '&' , '&quot;', '&apos;' , '&lt;' , '&gt;' );
    $ar2 = array ( '&', '"', "’", '<', '>' ) ;
    return str_replace ( $ar1 , $ar2, $string );
}

//Questo ciclo che estrae le notizie dal DB e le inserisce come nuovo ITEM nel feed
//I campi da cui estraggo le notizie si chiamano 'subject', 'content', 'cat', e 'pubdate'
//ma nel vostro caso i nomi potrebbero essere differenti, e alcuni campi assenti
//(come Author nel mio caso)

foreach ($properties as $property){
    //Eseguo xhtmlentities() sui primi due campi, che potrebbero contenere entità non valide
    $find=array("Â°","Ã","&#39;","â€™","à¬","à¨");
    $replace= array("°","à","'","'","í","è");
    $property['desc_it'] = xmlentities(str_replace($find,$replace,$property['desc_it']));
    $property['floor'] = xmlentities($property['floor']);
    $property['town'] = xmlentities($property['town']);
    $property['category'] = xmlentities($property['category']);
    $property['tipology'] = xmlentities($property['tipology']);
    $property['img_name'] = xmlentities($property["img_name"]);


// routine per composizione url pagine ---> rewrite	$cercare = array("'",chr(32),"/","-","à","è","ì","ù","ò");



    $cercare = array("'",chr(32),"/","-","à","è","ì","ù","ò");
    $sostituire = array("_","_","_","_","a","e","i","u","o");
    $strl1 =str_replace($cercare,$sostituire,$property['id']);
    $strl2 =str_replace($cercare,$sostituire,$property['contract']);
    $strl3 =str_replace($cercare,$sostituire,$property['category']);
    $strl4 =str_replace($cercare,$sostituire,$property['tipology']);
    $strl5 =str_replace($cercare,$sostituire,$property['town']);
    $strl6 =str_replace($cercare,$sostituire,$property['street']);
    //E ora comincio a inserire le informazioni di ogni item.
    $item = new FeedItem();
    $stringalink=$strl1."-".$strl2."-".$strl3."-".$strl4."-".$strl5."-".$strl6;

    //notate come a volte prendo i dati così come sono dal db, altre li costruisco al volo
    $item->title = $property['contract']." ".$property['tipology']." ".$property['town']." --> Clicca per visualizzare la scheda immobile.";
    $item->link =$stringalink.".html";




    $item->description = "<img src='".$imgPathMin.$property["img_name"]."' /><br/>".$property['desc_it'];
    $item->media = $imgPathMin.$property["img_name"];
    $item->id = $property['id'];

    $additionalElements = array($property['category']=>$property['category']);




    $anno = substr($property['date_ins'],1,4);
    $mese = substr($property['date_ins'],5,2);
    $giorno = substr($property['date_ins'],8,2);
    $ore = substr($property['date_ins'],11,2);
    $minuti = substr($property['date_ins'],14,2);
    $secondi = substr($property['date_ins'],17,2);
    //La mia PUBDATE è in formato UNIX TIMESTAMP, ma la classe la converte in formato leggibile
    $item->date = mktime($ore + 1,$minuti,$secondi,$mese,$giorno,$anno);
    //Questa riga per me è invariabile
    $item->author = "info@tecnoimmobiligroup.it";

    //Definiamo le opzioni dell'item: questo contiene tag HTML...
    $item->descriptionHtmlSyndicated = true;
    //avremmo impostato FALSE per togliere i tag HTML

    //...e contiene anche l'elemento <category>
    $item->categoryHtmlSyndicated = true;
    $item->$additionalElements;

    //decommentando la riga seguente, troncheremmo Description (anche con tag) dopo 500 caratteri
    //item->descriptionTruncSize = 500;

    $rss->addItem($item); //Questo lasciatelo, inserisce il nuovo item coi dati appena processati

}

//E infine l'output a video.
echo $rss->createFeed("RSS2.0", "");
//Ovviamente abbiamo anche la possibilità di salvare il file su disco, o di scegliere altri formati
//Vi rimando ai commenti presenti nella classe per gli esempi del caso.
?>