<?php
include("config.php");
include("app/classes/DbManager.php");
//include("app/classes/UserEntity.php");
include("app/classes/UserManager.php");
/*include("app/classes/NewsEntity.php");*/

include("app/classes/NewsManager.php");

include("app/classes/PropertyManager.php");



//$db = new DbManager();

/*$usrM = new UserManager();
$res = $usrM->checkLogin("info@tecnoimmobiligroup.it",sha1("b151195"));*/
//echo($res);
$propM = new PropertyManager();
//$res = $propM->read(array("reference_code = ?","id_city = ?"),array("Group by ?"),array("123",4,"id"),array("id","id_contract","id_country","id_city"));
$res = $propM->readAllAds();
var_dump($res);

//$newsM = new NewsManager();

//$res = $newsM->read(array("title = ?","description = ?"),array("Limit  12"),array("te'st","test"),array("id","title","description"));


//$res = $newsM->create(array("test create ","test create desc nuova struttura"));

//$res = $newsM->update(array("title = ?","description = ?"),array("id = ?"),array("update prova titolo2","update prova descr",18));

//$res = $newsM->delete(array("id=?"),array(18));


//var_dump($res);





?>