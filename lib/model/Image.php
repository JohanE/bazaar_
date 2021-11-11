<?php

/**
 * Subclass for representing a row from the 'internetbazar_image' table.
 *
 * 
 * @author: Johan Edlund
 * @package lib.model
 */ 
class Image extends BaseImage
{
  const regular      = '1';
  const extra        = '2';
  const temp_regular = '3';
  const temp_extra   = '4';

 public function __toString()
  {
    return $this->id;
  }

 // Override
 public function delete(PropelPDO $con = null)
 {   
   ////// Insert into temp deleted image table //////////
   $connection = Propel::getConnection();
   $query = 'insert into temp_image_info (path, is_deleted) values (?,?)';
   $statement = $connection->prepare($query);
   $statement->bindValue(1, $this->getPath());
   $statement->bindValue(2, 0);
   $statement->execute();
   //////////////////////////////////////////////////////

   return parent::delete($con);
 }

 public static function clearRegularImage($myItem)
 {
   $imgs = $myItem->getRegularImage();		
   $img = $imgs[0];
   $img->delete();
 }

 public static function regularImageUpload($myItem, $file, $status)
 {
   // If there is an image already, overwrite it.
   if($myItem->hasRegularImage())    
     {
       self::clearRegularImage($myItem);
     }
   // clear temp image if one exists
   if($myItem->hasTempImage())    
     {
       $imgs = $myItem->getTempImage();		
       $img = $imgs[0];
       $img->delete();
     }
   $filename = self::imageHandling($file);
   $image = new Image();
   $image->setItemid($myItem->getId());
   $image->setPath(Image::getImageFolder() .'/' . $filename . ImageCopier::getFileType());
   $image->setImagetypeId($status);
   $image->save();
 }

public static function regularImageUploadChange($myItem, $file, $status)
 {

   // clear temp image if one exists
   if($myItem->hasTempImage())    
     {
       $imgs = $myItem->getTempImage();		
       $img = $imgs[0];
       $img->delete();
     }
   $filename = self::imageHandling($file);
   $image = new Image();
   $image->setItemid($myItem->getId());
   $image->setPath(Image::getImageFolder() .'/' . $filename . ImageCopier::getFileType());
   $image->setImagetypeId($status);
   $image->save();
 }

 public static function hasToManyImgs($item)
 {
   // Count nr of images
   $maxImages = SystemSetting::getMaxNumberOfImagesForAd();
   if(count($item->getImages()) >= $maxImages)
     {		
       sfContext::getInstance()->getUser()->setFlash('uploadinfo_extra', ErrorMsgHelper::getTooManyImgsError($maxImages));
       return true;
     }
   return false;
 }

 // Generic image uploader function for change/edit section
public static function imageUploadChange($myItem, $file)
 {   
   if(!self::hasToManyImgs($myItem))
     {
       //Determine status, should either be temp_regular or temp_extra
       $status = "";
       if($myItem->hasTempImageRegular() || $myItem->hasRegularImage())    
	 $status = self::temp_extra;
       else
	 $status = self::temp_regular;
      
       $filename = self::imageHandling($file);
       $image = new Image();
       $image->setItemid($myItem->getId());
       $image->setPath(Image::getImageFolder() .'/' . $filename . ImageCopier::getFileType());
       $image->setImagetypeId($status);
       $image->save();
     }
 }

 // Generic image uploader function for "create ad" section
public static function imageUpload($myItem, $file)
 {
   if(!self::hasToManyImgs($myItem))
     {
       //Determine status, should either be regular or extra
       $status = "";
       if($myItem->hasRegularImage())    
	 $status = self::extra;
       else
	 $status = self::regular;

       $filename = self::imageHandling($file);
       $image = new Image();
       $image->setItemid($myItem->getId());
       $image->setPath(Image::getImageFolder() .'/' . $filename . ImageCopier::getFileType());
       $image->setImagetypeId($status);
       $image->save();
     }
 }

 # in change section, if new images were supplied
 # here is were they are "saved" (status change)
 public static function saveTempImages ($myitem)
 {
   //If the user supplied a new image, switch to it now
   // And remove the reference to the old one

   # First check the main image
   if($myitem->hasTempImageRegular())
     {
       # erase old main image
       if($myitem->hasRegularImage())	  
	 self::clearRegularImage($myitem);
       # make the temp image to a regular one
       $image = $myitem->getTempImageRegular();
       $image->setImagetypeId(Image::regular);
       $image->save();
     }

   # 2nd check extra images, change status of all temp extra images to extra/additional
   if($myitem->hasTempImagesAdditional())
     {
       $tempImageArray = $myitem->getTempImagesAdditional();
       foreach($tempImageArray as $tempImage)
	 {
	   $tempImage->setImagetypeId(Image::extra);
	   $tempImage->save();
	 }
     }
 }

 public static function getImageFolder()
  {
    return sfConfig::get('app_imagefolder');
  }

 public static function imageHandling($file)
  {
        
    $filename = ImageCopier::getFileName($file->getOriginalName()); 
    
    // Do image copy stuff
    ImageCopier::imageCopy($file);
    
    // Get the mime type
    $info = getimagesize($file->getTempName());
    $mime = $info['mime'];
    
    // try to get size
    list($width, $height, $type, $attr) = getimagesize($file->getTempName());	    
    
    $thumbsArray = ImageCopier::getThumbDimensions($width, $height);	    
    $regularArray = ImageCopier::getRegularDimensions($width, $height);
    
    // Create the thumbnail and the regular image  			
    $thumbnail = new sfThumbnail($thumbsArray['thumb_width'], $thumbsArray['thumb_height']);				    	    
    $subfolder = '/' . Image::getImageFolder() . '/';
    $regular_image = new sfThumbnail($regularArray['regular_width'], $regularArray['regular_height']);
    $thumbnail->loadFile($file->getTempName());
    $regular_image->loadFile($file->getTempName());
    $thumbnail->save(sfConfig::get('sf_upload_dir').'/thumbnail/'. $subfolder.$filename . ImageCopier::getFileType(), "image/jpeg");
    $regular_image->save(sfConfig::get('sf_upload_dir').'/images/'.$subfolder.$filename . ImageCopier::getFileType(), "image/jpeg");	    	    	    	    
    return $filename;
  }
 
}
