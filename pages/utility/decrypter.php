<form name="crypter" method="post" action="">
    <input id="toCrypt" name="toCrypt" type="text">
    <input type="submit" value="procedi"/>
</form>
<?php
if(isset($_REQUEST["toCrypt"])){
    require_once(BASE_PATH."/app/classes/MyCrypter/MyCrypter.php");

    $text = $_REQUEST["toCrypt"];
    $convertedText = MyCrypter::myDecrypt($text);
    echo("<br>Valore decriptato : <br>");
    echo($convertedText);

}
?>


