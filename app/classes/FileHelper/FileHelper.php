<?php

class  FileHelper
{

    public static function readFile($filePath,$readMode ="r"){
        if (FileHelper::fileExist($filePath)){
            $file = fopen($filePath, $readMode) or die(Flog::logError("Unable to open file ->".$filePath,"FileManager"));
            $fileContent = fread($file,filesize($filePath));
            return $fileContent;
        }else{
            Flog::logError("Trying to open file that not exist ->".$filePath,"FileManager");
        }
    }

    public static function fileExist($file){
        return file_exists($file);
    }


    public static function writeFile($filePath, $text){
        if (FileHelper::fileExist($filePath)){
            $file = fopen($filePath,"a+");
            fwrite( $file ,$text);
            fclose($file);
        }else{
            Flog::logError("Trying to open file that not exist ->".$filePath,"FileManager");
        }
    }


}