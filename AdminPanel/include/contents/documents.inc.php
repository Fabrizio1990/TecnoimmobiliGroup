<?php
require(BASE_PATH."/app/classes/DocumentManager.php");
$docMng = new DocumentManager();


if($SS_usr->id_user_type==1)
    include(BASE_PATH."/AdminPanel/include/contents/subcontents/documents_add_panel.inc.php");


include(BASE_PATH."/AdminPanel/include/contents/subcontents/documents_list.inc.php");

?>
