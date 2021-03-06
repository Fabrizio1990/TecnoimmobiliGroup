<?php
require_once(BASE_PATH."/app/classes/LogHelper/Flog.php");
class ImageManager {


    private $currImage;
	private $currImageName;
    private $savedImageName;
    private $ext;
	private $tmpImg;
	private $watemark;

    public function ImageManager($image,$sourceImageName,$forceNotString = false) {
        $this->setImage($image,$sourceImageName,$forceNotString);
    }

    public function setImage($sourceImage,$sourceImageName,$forceNotString = false){
		$this->currImageName 	= $sourceImageName;
        $this->ext       		= $this->getExtension($sourceImageName);
		
		$this->currImage 		= $this->getImageSource($sourceImage,$forceNotString);
		
    }

    public function getExtension($sourceImageName){
        return strtolower(substr(strrchr($sourceImageName,'.'),1));
    }

	// ################## FUNCTION FOR IMAGES RESIZE  ##################
	
	private function getImageSource($image,$forceNotString = false){
		if(!$forceNotString && is_string($image) && !filter_var($image, FILTER_VALIDATE_URL))
			return imagecreatefromstring($image);
		else if(strtolower($this->ext) == "jpg" || $this->ext == "jpeg")
			return imagecreatefromjpeg($image);
        else if(strtolower($this->ext) == "png" || $this->ext == "PNG"){
            return imagecreatefrompng($image);
        }
	    else if(strtolower($this->ext) == "gif")
			return imagecreatefromgif($image);
		else 
			return false;
	}
	
	
    public function resizeImage($width, $height){
         try{
			if($this->currImage){
                $curr_image_width = ImageSX($this->currImage);
                $curr_image_height = ImageSY($this->currImage);
				$this->tmpImg = imagecreatetruecolor($width,$height);
				if($this->ext =="png"){
                    imagesavealpha($this->tmpImg, true);
                    $color = imagecolorallocatealpha($this->tmpImg, 0, 0, 0, 127);
                    imagefill($this->tmpImg, 0, 0, $color);
                }
				imagecopyresampled($this->tmpImg,$this->currImage,0,0,0,0,$width,$height,$curr_image_width,$curr_image_height);
			}
        }
        catch (Exception $e) {
            return false;
        }
		return true;
    }
	

	// //################## END FUNCTION FOR IMAGES RESIZE  ##################
	
	// ################## APPLY WATERMARK  ##################
	// se il formato del watermark non è png restituisce false, altrimenti true
	private function initWatemark($path){
		if($this->getExtension($path) == "png"){
			$this->watermark= imagecreatefrompng($path);
			imagealphablending($this->watermark, false);
			imagesavealpha($this->watermark, true);
			
			return true;
		}else{
			return false;
		}
	}
	
	public function applyWatemark($path,$left, $top){
		if($this->initWatemark($path)){
			if(imagecopy($this->tmpImg, $this->watermark, $left, $top, 0, 0, imagesx($this->watermark), imagesy($this->watermark))){
				return true;
			}
		}
		return false;
	}
	// //################## END APPLY WATERMARK  ##################
	
	
	// ################## SAVE FUNCTIONS  ##################
	public function saveImage($path, $name, $quality = 80){
		$ret = false;

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        // if name contain extension, must be removed
        $name =  preg_replace('/\\.[^.\\s]{3,4}$/', '', $name);
        $savePath = $path.$name.".".$this->ext;
		if($this->ext == "jpg" || $this->ext == "jpeg")
			$ret = imagejpeg($this->tmpImg,$savePath,$quality);
        else if($this->ext == "png") {//png ha un range di quality minore di 10 volte
            $ret = imagepng($this->tmpImg, $savePath, $quality / 10);
        }
		else if($this->ext == "gif")
			$ret = imagegif($this->tmpImg,$savePath,$quality);


        $this->savedImageName = $name.".".$this->ext;
		return $ret;
	}
	// //################## END SAVE FUNCTIONS  ##################

    public function getSavedImgName(){
        return $this->savedImageName;
    }


    public function getExt(){
        return $this->ext;
    }



}
