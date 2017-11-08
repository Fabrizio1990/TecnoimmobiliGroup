<?php
//echo ("ref = ".urldecode($_REQUEST["ref"]));
if(isset($_REQUEST["ref"])){
    $ref = urldecode($_REQUEST["ref"]);
    require("../config.php");
    require(BASE_PATH."/app/classes/PropertyLinksAndTitles.php");
    echo PropertyLinksAndTitles::getDetailLinkFromRef($ref);
}else{
    echo "";
}