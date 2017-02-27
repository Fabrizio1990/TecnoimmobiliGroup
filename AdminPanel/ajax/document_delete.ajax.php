<?php
// TODO FAI UN FILE MANAGER PER GESTIRE iL salVATAGIO, L'ELIMINAZIONE ECC DEI FILE


if(isset($_POST["doc_id"])){
    include("../../config.php");
    include(BASE_PATH."/app/classes/DocumentManager.php");

    $docMng = new DocumentManager();

    $doc_id = $_POST["doc_id"];


    $res = $docMng->deleteDocumentFromDb($doc_id);

    echo($res);

}