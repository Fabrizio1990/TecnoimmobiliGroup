<?php



if(!isset($_POST["inp_title"]))
    echo"NON è settato il title";


if(isset($_POST["inp_title"]) && isset($_POST["txt_description"])){
    include("../../config.php");
    include(BASE_PATH."/app/classes/DocumentManager.php");

    $mng = new DocumentManager();

    $title          = $_POST["inp_title"];
    $description    = $_POST["txt_description"];
    $edit_id        = isset($_POST["inp_edit_id"])?$_POST["inp_edit_id"]:"";

    if($edit_id =="" || $edit_id < 1) { // ADD DOCUMENT

        if ($_FILES) {
            $fileName = $_FILES['inp_file']['name'];
            $ext = pathinfo($fileName, PATHINFO_EXTENSION);
            $res = $savePath = $mng->getPathFromExt($ext);

            $savePath = $res[0]["save_path"];
            $idDocType = $res[0]["id"];
            $newFileName = Date("Y-m-d H_i_s") . "." . $ext;
            $fullPath = BASE_PATH . "/" . $savePath . "/" . $newFileName;

            move_uploaded_file($_FILES['inp_file']['tmp_name'], $fullPath);
        } else {
            echo "file non settato";
        }

        $values = array($title, $description, $newFileName, $idDocType);
        $res = $mng->saveDocument($values);
        echo($res);

    }else{// EDIT DOCUMENT
        if ($_FILES) {
            $resDocPath = $mng->getDocuments("id=?",null,array($edit_id));
            $fullPath = BASE_PATH."/".$resDocPath[0]["save_path"]."/".$resDocPath[0]["filename"];
            move_uploaded_file($_FILES['inp_file']['tmp_name'], $fullPath);
        }

        $values = array($title,$description,Date("Y-m-d H:i:s"),$edit_id);
        $res = $mng->update(array("title = ?","description = ?","date_up = ?"),"id = ?",$values);
        echo($res);
    }



}
?>