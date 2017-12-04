<?php 

class Flog{

	private static $log_path = LOG_PATH;
	//private static $log_path = $_SERVER['DOCUMENT_ROOT'];
	private static $log_file_name;
	private static $extension = ".txt";

    private static $log_expire_time = 604800; //expire time in minutes, 7 days = 7*24*60*60
	
	
	public static function logError($text,$log_file_name ="log",$output = false){

        //check if other logs are olther than $log_expire_time if true they will deleted
        self::deleteOlderLog(self::$log_path);
		$date  = Date("Y-m-d h:i:s");


		$fullText =$date." <--> ". $text . " <--> " . self::getBacktrace() ;
		self::$log_file_name = Date("Y_m_d")."_".$log_file_name .self::$extension;
		self::writeFile($fullText);
        if($output)echo($text);
	}

	public static function logInfo($text,$log_file_name ="log",$output = false){
        $date  = Date("Y-m-d h:i:s");
        $fullText =$date." <--> ". $text ;
        self::$log_file_name = Date("Y_m_d")."_".$log_file_name .self::$extension;
        self::writeFile($fullText);
        if($output)echo($text);
    }
	
	private static function  writeFile($text){
		if (!file_exists(self::$log_path)) {
			mkdir(self::$log_path, 0777, true);
		}
		file_put_contents(self::$log_path.self::$log_file_name, $text."\r\n", FILE_APPEND );
	}

	private static function getBacktrace(){
        ob_start();
        debug_print_backtrace();
        $data = ob_get_clean();
        return $data;
    }



    private static function deleteOlderLog($path){


        $tmpFolder=$path.'/';
        $fileTypes="*.*";

        foreach (glob($tmpFolder . $fileTypes) as $Filename) {

            // Read file creation time
            $FileCreationTime = filectime($Filename);

            // Calculate file age in seconds
            $FileAge = time() - $FileCreationTime;
            //echo("<br>FILEAGE = ".$FileAge);
            //echo("<br>log_expire_time = ".self::$log_expire_time);
            // Is the file older than the given time span?
            if ($FileAge > self::$log_expire_time){

                // Now do something with the olders files...

                //echo "<br>The file $Filename is older than ".self::$log_expire_time." minutes\n";

                //delete files:
                unlink($Filename);
            }

        }
    }




}
