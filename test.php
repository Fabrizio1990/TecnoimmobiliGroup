<html>
    <head>
        <script src="js/UTILS.js"></script>
        <script src="js/form/form_utils.js"></script>
        <script>
            var json ="[{\"value\":\"1\",\"text\":\"Abruzzo\"},{\"value\":\"2\",\"text\":\"Basilicata\"},{\"value\":\"3\",\"text\":\"Calabria\"},{\"value\":\"4\",\"text\":\"Campania\"},{\"value\":\"5\",\"text\":\"Emilia-Romagna\"},{\"value\":\"6\",\"text\":\"Friuli-Venezia Giulia\"},{\"value\":\"7\",\"text\":\"Lazio\"},{\"value\":\"8\",\"text\":\"liguria\"},{\"value\":\"9\",\"text\":\"Lombardia\"},{\"value\":\"10\",\"text\":\"Marche\"},{\"value\":\"11\",\"text\":\"Molise\"},{\"value\":\"12\",\"text\":\"Piemonte\"},{\"value\":\"13\",\"text\":\"Puglia\"},{\"value\":\"14\",\"text\":\"Regione\"},{\"value\":\"15\",\"text\":\"Sardegna\"},{\"value\":\"16\",\"text\":\"Sicilia\"},{\"value\":\"17\",\"text\":\"Toscana\"},{\"value\":\"18\",\"text\":\"Trentino-Alto Adige\"},{\"value\":\"19\",\"text\":\"Umbria\"},{\"value\":\"20\",\"text\":\"Valle d'Aosta\"},{\"value\":\"21\",\"text\":\"Veneto\"}]";
        //console.log(JSON.stringify(json));

        </script>
    </head>
    <body onload='getVal("TXT_ISTAT","geo","cap",14175)'>
        <input type="txt" id="TXT_ISTAT" />
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
            //$propM = new PropertyManager();
            //$res = $propM->read(array("reference_code = ?","id_city = ?"),array("Group by ?"),array("123",4,"id"),array("id","id_contract","id_country","id_city"));
            //$res = $propM->readAllAds();
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