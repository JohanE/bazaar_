<?php

/**
 * Class for handling the copying of images and
 * other image related stuff
 * 
 *
 * @package lib.model
 */ 
class ImageCopier
{
  const MAX_THUMB_WIDTH = 80;
  const MAX_THUMB_HEIGHT = 60;
  const MAX_WIDTH = 640;
  const MAX_HEIGHT = 480;

  public static function getThumbDimensions ($width, $height)
  {
    $scale = min(ImageCopier::MAX_THUMB_WIDTH/$width, ImageCopier::MAX_THUMB_HEIGHT/$height);  	    
    // Calculate thumbnail width and height 
    $thumb_width = 0;
    $thumb_height = 0;    
    if ($scale < 1) {
      $thumb_width = floor($scale*$width);
      $thumb_height = floor($scale*$height);
    }
    return array('thumb_width' => $thumb_width, 'thumb_height' => $thumb_height);
  }

  public static function getRegularDimensions ($width, $height)
  {
    $scale = min(ImageCopier::MAX_WIDTH/$width, ImageCopier::MAX_HEIGHT/$height);  	    
    // Calculate regular image width and height 
    $_width = 0;
    $_height = 0;    
    if ($scale < 1) {
      $_width = floor($scale*$width);
      $_height = floor($scale*$height);
    }
    return array('regular_width' => $_width, 'regular_height' => $_height);
  }

  public static function getFileType ()
  {
    return ".jpg";
  }

  public static function getFileName ($filename)
  {
    $tmp = 'tmp';
    if(strlen($filename) >= 4)
      {
	if(ctype_alnum(substr($filename, 0, 4)))
	  $tmp =  substr($filename, 0, 4);
      }
    return 'img_' . time() .'_' . rand(100, 999) . '_' .$tmp;
  }  

  // Fix the format, should always be JPEG
  private static function fixFormat ($file)
  {

    $info = getimagesize($file->getTempName());
    $mime = $info['mime'];

    // If the type is png, convert to jpeg
    if($mime == 'image/png'){
      $im =  @imagecreatefrompng($file->getTempName());      
      imagejpeg($im, $file->getTempName());
      imagedestroy($im);
    // If the type is gif, convert to jpeg
    }elseif ($mime == 'image/gif'){
      $im =  @imagecreatefromgif($file->getTempName());      
      imagejpeg($im, $file->getTempName());
      imagedestroy($im);
    }
    
  }

  public static function imageCopy ($file)
  {
    $disp_width_max=150;                    // used when displaying watermark choices
    $disp_height_max=80;                    // used when displaying watermark choices
    $edgePadding=15;                        // used when placing the watermark near an edge
    $quality=70;                           // used when generating the final image

    ImageCopier::fixFormat($file);
    $size=getimagesize($file->getTempName());

    $original=$file->getTempName();
    $target_name= 'foobar';
    $dir_name = '/web/temp_imgs/';
    
    $target= ($file->getTempName()); #'/tmp/' . $target_name;
    //$watermark=dirname(__FILE__).'/watermarks/'.$_POST['watermark'];
    $watermark= sfConfig::get('sf_root_dir') . $dir_name . 'watermark.png';
    $wmTarget='/tmp/watermark.png.tmp';
    
    $origInfo = getimagesize($original); 
    $origWidth = $origInfo[0]; 
    $origHeight = $origInfo[1]; 
    
    $waterMarkInfo = getimagesize($watermark);
    $waterMarkWidth = $waterMarkInfo[0];
    $waterMarkHeight = $waterMarkInfo[1];

    $wm_size = '.5';

    // watermark sizing info
    if($wm_size=='larger'){
      $placementX=0;
      $placementY=0;
      $h_position='center';
      $v_position='center';
      $waterMarkDestWidth=$waterMarkWidth;
      $waterMarkDestHeight=$waterMarkHeight;
      
      // both of the watermark dimensions need to be 5% more than the original image...
      // adjust width first.
      if($waterMarkWidth > $origWidth*1.05 && $waterMarkHeight > $origHeight*1.05){
	// both are already larger than the original by at least 5%...
	// we need to make the watermark *smaller* for this one.
        
	// where is the largest difference?
	$wdiff=$waterMarkDestWidth - $origWidth;
	$hdiff=$waterMarkDestHeight - $origHeight;
	if($wdiff > $hdiff){
	  // the width has the largest difference - get percentage
	  $sizer=($wdiff/$waterMarkDestWidth)-0.05;
	}else{
	  $sizer=($hdiff/$waterMarkDestHeight)-0.05;
	}
	$waterMarkDestWidth-=$waterMarkDestWidth * $sizer;
	$waterMarkDestHeight-=$waterMarkDestHeight * $sizer;
      }else{
	// the watermark will need to be enlarged for this one
	
	// where is the largest difference?
	$wdiff=$origWidth - $waterMarkDestWidth;
	$hdiff=$origHeight - $waterMarkDestHeight;
	if($wdiff > $hdiff){
	  // the width has the largest difference - get percentage
	  $sizer=($wdiff/$waterMarkDestWidth)+0.05;
	}else{
	  $sizer=($hdiff/$waterMarkDestHeight)+0.05;
	}
	$waterMarkDestWidth+=$waterMarkDestWidth * $sizer;
	$waterMarkDestHeight+=$waterMarkDestHeight * $sizer;
      }
    }else{
      $waterMarkDestWidth=round($origWidth * floatval($wm_size));
      $waterMarkDestHeight=round($origHeight * floatval($wm_size));
      if($wm_size==1){
	$waterMarkDestWidth-=2*$edgePadding;
	$waterMarkDestHeight-=2*$edgePadding;
      }
    }
    
    // OK, we have what size we want the watermark to be, time to scale the watermark image
    ImageCopier::resize_png_image($watermark,$waterMarkDestWidth,$waterMarkDestHeight,$wmTarget);
    
    // get the size info for this watermark.
    $wmInfo=getimagesize($wmTarget);
    $waterMarkDestWidth=$wmInfo[0];
    $waterMarkDestHeight=$wmInfo[1];
    
    $differenceX = $origWidth - $waterMarkDestWidth;
    $differenceY = $origHeight - $waterMarkDestHeight;
    
    $h_position = 'right';
    $v_position = 'bottom';

    // where to place the watermark?
    switch($h_position){
      // find the X coord for placement
    case 'left':
      $placementX = $edgePadding;
      break;
    case 'center':
      $placementX =  round($differenceX / 2);
      break;
    case 'right':
      $placementX = $origWidth - $waterMarkDestWidth - $edgePadding;
      break;
    }
    
    switch($v_position){
      // find the Y coord for placement
    case 'top':
      $placementY = $edgePadding;
      break;
    case 'center':
      $placementY =  round($differenceY / 2);
      break;
    case 'bottom':
      $placementY = $origHeight - $waterMarkDestHeight - $edgePadding;
      break;
    }
    
    if($size[2]==3)
      $resultImage = imagecreatefrompng($original);
    else
      $resultImage = imagecreatefromjpeg($original);
    imagealphablending($resultImage, TRUE);
    
    $finalWaterMarkImage = imagecreatefrompng($wmTarget);
    $finalWaterMarkWidth = imagesx($finalWaterMarkImage);
    $finalWaterMarkHeight = imagesy($finalWaterMarkImage);
    
    imagecopy($resultImage,
	      $finalWaterMarkImage,
	      $placementX,
	      $placementY,
	      0,
	      0,
	      $finalWaterMarkWidth,
	      $finalWaterMarkHeight
	      );
    
    if($size[2]==3){
      imagealphablending($resultImage,FALSE);
      imagesavealpha($resultImage,TRUE);
      imagepng($resultImage,$target,$quality);
    }else{
      imagejpeg($resultImage,$target,$quality); 
    }
    
    imagedestroy($resultImage);
    imagedestroy($finalWaterMarkImage);            
  }

 public static function resize_png_image($img,$newWidth,$newHeight,$target){
    $srcImage=imagecreatefrompng($img);
    if($srcImage==''){
      return FALSE;
    }
    $srcWidth=imagesx($srcImage);
    $srcHeight=imagesy($srcImage);
    $percentage=(double)$newWidth/$srcWidth;
    $destHeight=round($srcHeight*$percentage)+1;
    $destWidth=round($srcWidth*$percentage)+1;
    if($destHeight > $newHeight){
      // if the width produces a height bigger than we want, calculate based on height
      $percentage=(double)$newHeight/$srcHeight;
      $destHeight=round($srcHeight*$percentage)+1;
      $destWidth=round($srcWidth*$percentage)+1;
    }
    $destImage=imagecreatetruecolor($destWidth-1,$destHeight-1);
    if(!imagealphablending($destImage,FALSE)){
      return FALSE;
    }
    if(!imagesavealpha($destImage,TRUE)){
      return FALSE;
    }
    if(!imagecopyresampled($destImage,$srcImage,0,0,0,0,$destWidth,$destHeight,$srcWidth,$srcHeight)){
      return FALSE;
    }
    if(!imagepng($destImage,$target)){
      return FALSE;
    }
    imagedestroy($destImage);
    imagedestroy($srcImage);
    return TRUE;
  }
}
