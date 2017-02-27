
<?php

/**
 * Created by PhpStorm.
 * User: Developer
 * Date: 27/02/2017
 * Time: 13:11
 */
class FileHelper
{

    public function readFile($filePath,$readMode ="r"){
        if ($this->fileExist($filePath)){
            $file = fopen($filePath, $readMode) or die(Flog::logError("Unable to open file ->".$filePath,"FileManager.php"));
            $fileContent = fread($file,filesize($filePath));
            return $fileContent;
        }else{
            Flog::logError("Trying to open file that not exist ->".$filePath,"FileManager.php");
        }
    }

    public function fileExist($file){
        return file_exists($file);
    }

}