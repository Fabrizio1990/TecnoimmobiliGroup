<?php 

class Flog{

	private static $log_path = LOG_PATH;
	//private static $log_path = $_SERVER['DOCUMENT_ROOT'];
	private static $log_file_name;
	private static $extension = ".txt";
	
	
	public static function logError($text,$log_file_name ="log"){
		//TEST
		//self::$log_path = "D:/xampp/htdocs/Tecnoimmobili/SITE/log/";	
		//PROD
		//self::$log_path = dirname(__FILE__)."/../../log/";
		
		$date = Date("Y-m-d h:i:s");


		$fullText =$date." <--> ". $text . " <--> " . self::getBacktrace() ;
		self::$log_file_name = $log_file_name .self::$extension;
		self::WriteFile($fullText);
	}
	
	private static function  WriteFile($text){
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


}
