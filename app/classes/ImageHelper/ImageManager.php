<?php
require_once(BASE_PATH."/app/classes/LogHelper/Flog.php");
class ImageManager {


    private $currImage;
	private $currImageName;
    private $savedImageName;
    private $ext;
	private $tmpImg;
	private $watemark;

    public function ImageManager($image,$sourceImageName) {
        $this->setImage($image,$sourceImageName);
    }

    public function setImage($sourceImage,$sourceImageName){
		$this->currImageName 	= $sourceImageName;
        $this->ext       		= $this->getExtension($sourceImageName);
		
		$this->currImage 		= $this->getImageSource($sourceImage);
		
    }

    public function getExtension($sourceImageName){
        return strtolower(substr(strrchr($sourceImageName,'.'),1));
    }

	// ################## FUNCTION FOR IMAGES RESIZE  ##################
	
	private function getImageSource($image){
		if(is_string($image))
			return imagecreatefromstring($image);
		else if($this->ext == "jpg" || $this->ext == "jpeg")
			return imagecreatefromjpeg($image);
	    else if($this->ext == "gif")
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
        // if name contain extension, must be removed
        $name =  preg_replace('/\\.[^.\\s]{3,4}$/', '', $name);
        $savePath = $path."/".$name.".".$this->ext;
		if($this->ext == "jpg" || $this->ext == "jpeg")
			$ret = imagejpeg($this->tmpImg,$savePath,$quality);
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
