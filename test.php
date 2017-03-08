<html>
<head>
    <script src="js/UTILS.js"></script>
    <script src="js/MODALS.js"></script>
</head>


    <?php

include("config.php");



include("app/classes/MyCrypter/MyCrypter.php");

include("app/classes/DbManager.php");

//include(BASE_PATH."/app/classes/FileHelper/FileHelper.php");



//require_once(BASE_PATH."/app/classes/OptionsManager.php");



//include("app/classes/UserEntity.php");

//include(BASE_PATH."/app/classes/SessionManager.php");


//include("app/classes/UserManager.php");



/*include("app/classes/NewsEntity.php");*/


//include("app/classes/NewsManager.php");


include("app/classes/PropertyManager.php");

if(true){
	
	if(false){
		
		echo test;
		
	}
	
}



/* ################# CRYPT TEST #################
    /*$cryptedString = MyCrypter::myEncrypt("test");
    echo("stringa criptata<br>");
    echo($cryptedString);
    echo("<br>stringa DEcriptata<br>");
    echo(MyCrypter::myDecrypt($cryptedString));*/


//$dbMng = new DbManager();

//$dbMng->openConnection();





/*$fMng = new FileHelper();
    $fileContent = $fMng->readFile(BASE_PATH."/app/classes/conn_par.txt");
    $fileContentJson = json_decode($fileContent);
    //var_dump($fileContentJson);
    echo($fileContentJson->username);*/

//$db = new DbManager();

//$mng = new OptionsManager();

//$agencies = $mng ->readOptions("agencies_list");

//var_dump($agencies);

//$usrM = new PropertyManager();

//$resImg = $usrM->getImages(array("id_property=?","id_image_type = ?"),array("LIMIT 1"),array(4,1),"img_name");

//echo($resImg[0]["img_name"]);

//$res = $usrM->checkLogin("info@tecnoimmobiligroup.it","b151195");

//$SS_usr = SessionManager::getVal("user",true);

//$agency_id 		= $SS_usr->id;

//echo($agency_id);

//$usrM->setOffline($agency_id);

//echo(sha1("b151195"));

//echo($res);

$propM = new PropertyManager();

//$res = $propM->read(array("reference_code = ?","id_cit = ?"),array("Group by ?"),array("123",4,"id"),array("id","id_contract","id_country","id_city"));

$res = $propM->readAllAds(null,null,null ,null,false);

//var_dump($res);


//$newsM = new NewsManager();


//$res = $newsM->read(array("title = ?","description = ?"),array("Limit  12"),array("te'st","test"),array("id","title","description"));



//$res = $newsM->create(array("test create ","test create desc nuova struttura"));


//$res = $newsM->update(array("title = ?","description = ?"),array("id = ?"),array("update prova titolo2","update prova descr",18));


//$res = $newsM->delete(array("id=?"),array(18));



//var_dump($res);






?>
</body>
</html>
