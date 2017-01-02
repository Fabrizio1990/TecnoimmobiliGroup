<html>
<head>
    <link rel="stylesheet" href="<?php echo(SITE_URL) ?>/libs/frontend/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo(SITE_URL) ?>/css/modals.css">

    <script src="<?php echo(SITE_URL) ?>/libs/frontend/jQuery/js/jquery-2.2.3.min.js"></script>
    <script src="<?php echo(SITE_URL) ?>/libs/frontend/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo(SITE_URL) ?>/js/UTILS.js"></script>
    <script src="<?php echo(SITE_URL) ?>/js/MODALS.js"></script>
    <script>
        function populateModal(){
            openModal(0,Math.random(),Math.random(),modalFunction);
        }

        function populateModal2(){
            openModal(2,Math.random(),Math.random(),modalFunction2);
        }

        function deleteModal(){
            $("#myModal").remove();
        }

        function deleteModalInfo(){
            $("#myModalInfo").remove();
        }

        function populateModalInfo(){
            openInfoModal(0,"Info 1",Math.random());
        }

        function populateModalInfo2(){
            openInfoModal(2,"Info 2",Math.random());
        }

        function deleteModal(){
            $("#myModal").remove();
        }


        function modalFunction(){
            console.log("premuto salva");
        }
        function modalFunction2(){
            console.log("premuto salva2");
        }

    </script>
</head>
<body >
<h1> PROVA A CASO</h1>
<button onclick="populateModal()">
    Premi
</button>
<button onclick="populateModal2()">
    Premi 2
</button>

<button onclick="deleteModal()">
    Premi per cancellare la modale
</button>

<br><br>
<button onclick="populateModalInfo()">
    Premi info
</button>
<button onclick="populateModalInfo2()">
    Premi info 2
</button>

<button onclick="deleteModalInfo()">
    Premi per cancellare la modale info
</button>

</body>
</html>