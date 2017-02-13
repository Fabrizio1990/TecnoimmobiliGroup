<?php
include("../config.php");
include(BASE_PATH."/app/classes/SessionManager.php");
include(BASE_PATH."/app/classes/UserEntity.php");
include(BASE_PATH."/app/classes/UserManager.php");

if(SessionManager::getVal("authenticated") != null){
	$SS_usr = SessionManager::getVal("user",true);
	$agency_id 		= $SS_usr->id;
	$tipo_utente 	= $SS_usr->id_user_type;
	if($tipo_utente!="1")
		header("location:login.php");
}else{
	header("location:login.php");
}

if(isset($_POST["id_operator"])){
	$id_operator = $_POST["id_operator"];
	$mng = new UserManager();
	$res = $mng->loginAs($id_operator);
	if($res){
		// se voglio tornare alla mia utenza back_to verrà valorizzato e elimino dalla sessione logged_as perchè sto tornando al mio utente, altrimenti devo settare logged_as per ricordare quale utente ha voluto accedere con le credenziali di un altro
		if(isset($_POST["back_to"])){
			SessionManager::unsetVal("logged_as");
		}else{
			SessionManager::setVal("logged_as",$agency_id);

		}

		SessionManager::setVal("user",$res);
		SessionManager::setVal("authenticated",1);


		header("location: ".SITE_URL."/AdminPanel/index.php");
	}else{
		echo("UTENTE NON TROVATO");
	}

}

?>