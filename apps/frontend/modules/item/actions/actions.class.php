<?php

  /**
   * item actions.
   *
   * @package    internetbazar
   * @subpackage item
   * @author     Johan Edlund
   * @version    SVN: $Id: actions.class.php 8507 2008-04-17 17:32:20Z fabien $
   */
class itemActions extends sfActions
{    
  public function executeIndex(sfWebRequest $request)
  {        
    $params = Item::processSearchParams($request);
    // Redirect if the params were manipulated
    if (isset($params['input_error']))
      {
	$this->logMessage("-------- redirect due to form error:".$params['input_error']);
	$this->redirect('item/index');	
      }
    
    // Get / Set location 
    if($this->getUser()->getAttribute('locationId') == null)
      {
	$locationId = (isset($params['locationId'])) ? $params['locationId'] : sfConfig::get('app_kievid');
	$this->getUser()->setAttribute('locationId', $locationId);
      }

    $this->superCategories = SuperCategoryPeer::getSupercategories();
    $this->locations = LocationPeer::getLocations();
    $this->customerTypes = CustomerTypePeer::getCustomerTypes();
    # is/has.. variables to be used in the template
    $this->hasPriceInfo = false;
    $this->isApartmentMode = false;
    $this->isCarMode = false;
    $itemsCriteria = ItemPeer::getItemsBySearchParams($params, 
		     $this->getUser()->getAttribute('locationId'), 
		     Status::approved,
		     DateHelper::getTodaysDate());

    // Create array to keep track of different "modes" in template
    $this->modes = Mode::getModesArray($params);
    
    $this->params = $params;  

    // Toggle image link
    $this->showImgs = $this->getUser()->getAttribute('showImages');
    // Toggle sorting
    $this->sort = (isset($params['sort'])) ? $params['sort'] : '';

    $this->customerTypes = CustomerTypePeer::getCustomerTypes();

    // init arrays of different types to display IF there exists a catId param 
    // (set them to something reasonable if a category was selected)
    $this->priceFromList  = array();
    $this->priceToList    = array();
    $this->subCategories  = array();
    $this->yearModelsFrom = array();
    $this->yearModelsTo   = array();
    $this->milageFrom     = array();
    $this->milageTo       = array();
    $this->roomsFrom      = array();
    $this->roomsTo        = array();
    $this->gearBoxes      = array();
    $this->areaFromList   = array();
    $this->areaToList     = array();
    $this->fuelList       = array();
    if(isset($params['catId']))
      {	
	$this->fuelList       = FuelPeer::getFuelTypes();
	$this->areaFromList   = ItemPeer::getAreaFrom();
	$this->areaToList     = ItemPeer::getAreaTo();
	$this->gearBoxes      = GearboxPeer::getGearboxes();
	$this->roomsTo        = RoomPeer::getRoomsTo();
	$this->roomsFrom      = RoomPeer::getRoomsFrom();
	$this->milageFrom     = Milage::getMilageFrom();
	$this->milageTo       = Milage::getMilageTo();
	$this->yearModelsFrom = YearmodelPeer::getYearmodelsFrom();
	$this->yearModelsTo   = YearmodelPeer::getYearmodelsTo();
	$this->subCategories  = SubCategoryPeer::getSubCategoriesById($params['catId']);
	$this->priceFromList  = PriceHandler::getPriceList($params['catId'], PriceHandler::listFrom);
	$this->priceToList    = PriceHandler::getPriceList($params['catId'], PriceHandler::listTo);
	$this->hasPriceInfo   = (PriceHandler::isPriceComparisonCategory ($params['catId'])) ? true : false; 
	$this->isCarMode      = (Category::getCategoryName ($params['catId']) == "car-cat-val") ? true : false;
	$this->isApartmentMode      = (Category::getCategoryName ($params['catId']) == "apartment-cat-val") ? true : false;
      }

    // Set maximum articles in the list, either from the form or from other source
    $this->max_items_per_page = (isset($params['max_per_page'])) ? $params['max_per_page'] : sfConfig::get('app_max_items_per_page');

    $this->pager = new sfPropelPager(
    'Item',
     $this->max_items_per_page
    );
    $this->pager->setCriteria($itemsCriteria);
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
  }
  
  public function executeCreate()
  {
    // just in order to avoid error msg
    $this->sublocs = array(); // this needs to be present in the template
    $this->form = new ItemForm();
    $this->setTemplate('edit');
  }
  
  public function executeEdit(sfWebRequest $request)
  {
    $this->form = new ItemForm(ItemPeer::retrieveByPk($request->getParameter('id')));
    $item = ItemPeer::retrieveByPk($request->getParameter('id'));        
    $this->sublocs = SubLocationPeer::getSubLocationsById ($item->getLocation()->getId());    
    $status = $item->getStatus();
    $this->forward404Unless(!$status);
  }

 public function executeSubmitItem (sfWebRequest $request)
  {
    $this->myitem = ItemPeer::retrieveByPk($request->getParameter('id'));
    // Set status to submitted
    $mystatus = StatusPeer::retrieveByPk(Status::submitted);        
    $this->myitem->setStatus($mystatus);    
    // Send mail to "customer"
    $submitBody = MailHelper::makeSubmitBody();            

    try 
      {
	MailHelper::sendMail(MailHelper::getMailFrom(), $this->myitem->getEmail(), "Спасибо за подачу объявления", $submitBody, MailHelper::getMailUser(), MailHelper::getMailPassword());
      }
    
    catch(EmailTransferException $e)
      {
	$this->logMessage("--------- Unable to send mail when submitting ad!-------------------"); 	  
      }

    // Save the item
    $this->myitem->save();    
    $this->redirect('item/thankyou');
  }

  public function executeThankyou (sfWebRequest $request)
  {
  }

  public function executeSaveItem (sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));    

    # some security check
    $item = ItemPeer::retrieveByPk($request->getParameter('id'));    
    $status = $item->getStatus();    
    $this->forward404Unless(!$status);


    $this->form = new ItemFormShort(ItemPeer::retrieveByPk($request->getParameter('id')));    
    // binding the form
    $this->form->bind($request->getParameter('item'), $request->getFiles('item'));
        
    if ($this->form->isValid())
      {
	$this->logMessage("------------------------ SAVING the form ---------------");
    	$item = $this->form->save();
	// Redirect
    	$this->redirect('item/submitItem?id='.$request->getParameter('id'));	 		
      }

    
    $this->setTemplate('preview');
  }

  
  public function executeShowBySlug (sfWebRequest $request)
  {
    
    $this->item = $this->getRoute()->getObject();     

    // Can only view items with correct status
    $this->forward404Unless($this->item->getStatus()->getId() == Status::approved);
    $this->setTemplate('show');
  }

  public function executeShow (sfWebRequest $request)
  {
    
    $this->item = ItemPeer::retrieveByPk($request->getParameter('id'));   
    $this->forward404Unless($this->item);
    // Can only view items with correct status
    $this->forward404Unless($this->item->getStatus()->getId() == Status::approved);
    $this->setTemplate('show');
  }


  public function executeChangepreview (sfWebRequest $request)
  {
    # get hold of the changed item through the routing mechanism
    #$origItem = $this->getRoute()->getObject();     
    # security check
    $this->forward404Unless($this->getUser()->getAttribute('editmode') == $request->getParameter('id'));
    // Get the item stored in session
    $this->myitem = $this->getUser()->getAttribute('myitem');    
    $this->form = new ItemFormChange($this->myitem);
    $this->currentId = $this->getUser()->getAttribute('editmode');
    #$this->currentSlug = $origItem->getSlug();
    $this->forward404Unless($this->form);
    // Check that images are correctly uploaded (i.e. no missing main image)
    $this->logMessage("--- has regular image-------" . $this->myitem->hasRegularImage().",has temp regular image " . $this->myitem->hasTempImageRegular());
    // also get the normal item 
    $theitem = ItemPeer::retrieveByPk($request->getParameter('id'));       
    
    // Check that the images were correctly uploaded
    if($theitem->hasExtraImagesFull() && (!$theitem->hasRegularImage() && !$theitem->hasTempImageRegular() ))
      {
	$this->getUser()->setFlash('uploadinfo_extra', ErrorMsgHelper::getNoMainImageError());
	// redirect
    	$this->redirect('item/change?id='.$request->getParameter('id'));	 		
      }


    $this->customerTypeId = $theitem->getCustomerType()->getId();
    $this->imgRegular = ($theitem->hasTempImageRegular()) ? $theitem->getTempImageRegular() : $theitem->getRegularImage();
    $this->imgArrayExtra = $theitem->getExtraImagesFull();

  }


  public function executeChangeSaveItem (sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));        
    $theitem = $this->getUser()->getAttribute('myitem');
    
    $this->myitem = ItemPeer::retrieveByPk($this->getUser()->getAttribute('editmode')); 
    $this->forward404Unless($this->myitem->getStatus()->getId() == Status::approved || $this->myitem->getStatus()->getId() == Status::rejected );

    $this->forward404Unless($this->myitem);
    
    // Reset the item, using values from session
    Item::copySessionToItem($this->myitem, $theitem);

    // Change the ad status to "submitted"
    $mystatus = StatusPeer::retrieveByPk(Status::submitted);        
    $this->myitem->setStatus($mystatus);  
    //finnaly save
    $this->myitem->save();
    
    # If new images were supplied, they should also be "saved"
    # i.e, their status(es) need to be changed
    Image::saveTempImages($this->myitem);

    # Reset session variables
    $this->getUser()->setAttribute('myitem', null);
    $this->getUser()->setAttribute('editmode', null);
    
  }

  public function executeChangePost (sfWebRequest $request)
  {
    $this->logMessage("------------------------ enter change post_-------------,item_id=".$request->getParameter('item[id]'));            
    $this->forward404Unless($request->isMethod('post'));
    // determine type of action; image upload or to preview
    $img_upload = $this->getRequestParameter('regular_image');     
    $preview = $this->getRequestParameter('submitbtn');         
    $theitem = ItemPeer::retrieveByPk($request->getParameter('id'));   
    $this->forward404Unless($theitem);
    $this->form = new ItemFormChange($theitem);
    $this->forward404Unless($this->form);
    $this->forward404Unless($this->getUser()->getAttribute('editmode') == $theitem->getId());
    $this->forward404Unless($theitem->getStatus()->getId() == Status::approved || $theitem->getStatus()->getId() == Status::rejected);    
    // binding the form
    $this->form->bind($request->getParameter('item'), $request->getFiles('item'));

    if ($this->form->isValid())
      {
	$myitem = Item::makeTempItem($this->form, $theitem->getCategory()->getId());	
	// Handle image uploads here too
	
	$file  = $this->form->getValue('file'); // Regular image upload
	if($file)
	  {	
	    $this->logMessage("------------------------ FILE IS supplied _------------------");
	    Image::imageUploadChange($theitem, $file);	    
	  } else {
	  $this->logMessage("------------------------ FILE IS not supplied _------------------");
	}
	
	$this->getUser()->setAttribute('myitem', $myitem);		

	$this->logMessage("------------------------ FORM IS ACTUALLY VALID NOW --------------- img:".$img_upload);
	#Redirect, unless this was a image upload action
	if($preview)
	  $this->redirect('item/changepreview?id='.$request->getParameter('id'));	 		
	if($file) {
	  $this->logMessage("-------------------  _-----  IMG UPload post change");
	  $this->redirect('item/change?id='.$request->getParameter('id'));
	}	 			  	
      }
    else
      $this->logMessage("------------------------ FORM invalid ---------------");

    # construct img arrays so to be used by the template
    $this->imgRegular = ($theitem->hasTempImageRegular()) ? $theitem->getTempImageRegular() : $theitem->getRegularImage();
    $this->imgArrayExtra = $theitem->getExtraImagesFull(); 

    $this->item = $this->form->getObject(); 
    $this->itemCatId = $this->item->getCategory()->getId();
    $this->setTemplate('change');

  }

  // This is just a way to display the changeDeletedSuccess template,
  // to let the user know they succeeded in deleting their ad
  public function executeChangeDeleted (sfWebRequest $request)
  {
  }

  public function executeChangeDelete (sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));
    // must be correct login and pswd
    $this->forward404Unless($this->getUser()->getAttribute('editmode') == $request->getParameter('id'));

    $item = ItemPeer::retrieveByPk($request->getParameter('id'));   
    $this->forward404Unless($item);
    $this->currentId = $this->getUser()->getAttribute('editmode');        
    // must be correct login and pswd
    $this->forward404Unless($this->getUser()->getAttribute('editmode') == $request->getParameter('id'));
    // double check if user pwd = item pwd
    if($this->getUser()->getAttribute('editmode') == $item->getId())
      {
	//set status = deleted
	$mystatus = StatusPeer::retrieveByPk(Status::deleted);
	$item->setStatus($mystatus);
	$item->save();
	// clear session
	 $this->getUser()->setAttribute('editmode', null);
	//Redirect
    	$this->redirect('item/changeDeleted');
      }
       
  }

  public function executeChangeDeleteConfirm (sfWebRequest $request)
  {
    // must be correct login and pswd
    $this->forward404Unless($this->getUser()->getAttribute('editmode') == $request->getParameter('id'));
    $this->form = new ItemFormLogin(ItemPeer::retrieveByPk($request->getParameter('id')));   
    $this->forward404Unless($this->form);       
  }

  public function executeChange (sfWebRequest $request)
  {    
    $this->item = ItemPeer::retrieveByPk($request->getParameter('id'));   

    $this->itemCatId = $this->item->getCategory()->getId();
    $sessionItem = $this->getUser()->getAttribute('myitem');
    // If a session item exist, use those values instead since they are 
    // new user submitted values
    if($sessionItem != null)
      {
	Item::copySessionToItem($this->item, $sessionItem);
      }    
    $this->currentId = $this->getUser()->getAttribute('editmode');        
    $this->form = new ItemFormChange($this->item);
    // Security controls
    // must be valid ad
    $this->logMessage("--- before form check --");
    $this->forward404Unless($this->form);
    $this->logMessage("--- after form check -- user editmode = " . $this->getUser()->getAttribute('editmode') . " slug = " . $request->getParameter('id'));
    // must be correct login and pswd
    $this->forward404Unless($this->getUser()->getAttribute('editmode') == $this->item->getId());
    // ad must have correct status
    $this->forward404Unless($this->item->getStatus()->getId() == Status::approved || $this->item->getStatus()->getId() == Status::rejected);    
    $this->logMessage("------the session =  -" . $this->getUser()->getAttribute('editmode') . "-id=".$request->getParameter('id'));
    $this->imgRegular = ($this->item->hasTempImageRegular()) ? $this->item->getTempImageRegular() : $this->item->getRegularImage();
    $this->imgArrayExtra = $this->item->getExtraImagesFull(); 
  }

  public function executePrechange (sfWebRequest $request)
  {
    #$this->forward404Unless($request->isMethod('post'));    
    $this->logMessage("------the slug -- " . $request->getParameter('slug'));
    $item = $this->getRoute()->getObject();         
    $this->logMessage("------the item -- " . $item . ", item id = " . $item->getId());
    $this->form = new ItemFormLogin(ItemPeer::retrieveByPk($item->getId()));    
    // binding the form
    $this->form->bind($request->getParameter('item'), $request->getFiles('item'));
        
    if ($this->form->isValid())
      {	
	//Redirect
    	#$this->redirect('item/change?slug='.$item->getSlug());	 		
	$this->redirect('item/change?id='.$item->getId());	 		
      }
        
    $this->setTemplate('login');
  }

  public function executeLogin (sfWebRequest $request)
  {
   
    $this->item = ItemPeer::retrieveByPk($request->getParameter('id'));   
    $this->forward404Unless($this->item);
    $this->form = new ItemFormLogin(ItemPeer::retrieveByPk($this->item->getId()));   
    $this->forward404Unless($this->form);
  }

  public function executeLoginBySlug (sfWebRequest $request)
  {
    $this->item = $this->getRoute()->getObject();            
    $this->form = new ItemFormLogin(ItemPeer::retrieveByPk($this->item->getId()));   
    $this->forward404Unless($this->form);
    $this->setTemplate('login');
  }

  public function executePreview (sfWebRequest $request)
  {
    $this->form = new ItemFormShort(ItemPeer::retrieveByPk($request->getParameter('id')));   
    $this->forward404Unless($this->form);
  }

 public function executeCheckAd(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));    
    $this->form = new ItemForm(ItemPeer::retrieveByPk($request->getParameter('id')));    
    // binding the form
    $this->form->bind($request->getParameter('item'), $request->getFiles('item'));
    // Need to check if images are correctly uploaded
    $myItem = ItemPeer::retrieveByPk($request->getParameter('id'));    
    if($myItem->hasExtraImages() && !$myItem->hasRegularImage())
      {	
	$this->getUser()->setFlash('uploadinfo_extra', ErrorMsgHelper::getNoMainImageError());
	$this->redirect('item/edit?id='.$request->getParameter('id'));	    	
      }
    // Check if the form is valid
    if ($this->form->isValid())
      {
	$this->form->save();
    	$this->redirect('item/preview?id='.$request->getParameter('id'));	    	
      }
    else {
      $this->logMessage("-------- FORM IS NOT VALID will display edit pae again ------");      
    }

  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));
    // Go to checkAd section if that button was pressed
    $check_ad = $this->getRequestParameter('check_ad');     
    if($check_ad) {      
      $this->executeCheckAd($request);
    }    
    $this->form = new ItemForm(ItemPeer::retrieveByPk($request->getParameter('id')));    

    // binding the form
    $this->form->bind($request->getParameter('item'), $request->getFiles('item'));
    // Init the file
    $file = null;
    $filename = '';
    $uploadOk = true;
    $previousImage = false;

    // Check if images/files are to be uploaded	
    if ($this->form->isValid())
      {			
	$this->logMessage("----------------------------------------- form IS valid  ---------");
	$file  = $this->form->getValue('file'); // Regular image upload
    	$item = $this->form->save();

	// Handle image upload
	if($file)
	  {
	    Image::imageUpload($item, $file);	    
	  }

	// Redirect
    	$this->redirect('item/edit?id='.$item->getId());	 		
      } 
    
    $this->sublocs = SubLocationPeer::getSubLocationsById ($this->form['location_id']->getValue());    
    $this->setTemplate('edit');
  }

 public function executeDisplaySubLocation(sfWebRequest $request)
  { 
    // Security check
    $this->forward404Unless($this->getRequest()->isXmlHttpRequest());    
    $var = $this->getRequestParameter('id');
    $this->sublocations = SubLocationPeer::getSubLocationsById ($var);    
    $this->current = null;
    #return $this->renderPartial('item/sublocs');
  }

  public function executeCategorySelector(sfWebRequest $request)
  {  	   
    // Security check
    $this->forward404Unless($this->getRequest()->isXmlHttpRequest());    
    $id = $this->getRequestParameter('catId');
    $subcategories = SubCategoryPeer::getSubCategoriesById($id);
    $this->categoryType = Category::getCategoryName ($id);    
    $this->subcategories = $subcategories;     
  }

  public function executeToggleSite(sfWebRequest $request)
  {  	   
    // Security check
    $this->forward404Unless($this->getRequest()->isXmlHttpRequest());    
    $id = $this->getRequestParameter('theid');
    $customertype = CustomerTypePeer::retrieveByPk($id);
    $json = array();

    if($customertype->getId() == CustomerType::business)
	$json['type'] = 'business';
    elseif ($customertype->getId() == CustomerType::privat)
	$json['type'] = 'private';
    $this->getResponse()->setHttpHeader('Content-Type','application/json; charset=utf-8');
    return $this->renderText(json_encode($json));          

  }

  public function executeShowImages(sfWebRequest $request)
  {  	   
    // Security check
    $this->forward404Unless($this->getRequest()->isXmlHttpRequest());    
    // set view image preferences
      
    $this->getUser()->setAttribute('showImages', true);

    $this->getResponse()->setHttpHeader('Content-Type','application/json; charset=utf-8');
    return $this->renderText(json_encode(array()));          
  }

  public function executeHideImages(sfWebRequest $request)
  {  	   
    // Security check    
    $this->forward404Unless($this->getRequest()->isXmlHttpRequest());    
    // set view image preferences
      
    $this->getUser()->setAttribute('showImages', false);
    $this->getResponse()->setHttpHeader('Content-Type','application/json; charset=utf-8');
    return $this->renderText(json_encode(array()));          
  }
  
  // Delete image from the "change ad" section
  // make sure to only delete images that belongs to current item
 public function executeDeleteImageChange(sfWebRequest $request)
 {
    // Security check    
    $this->forward404Unless($this->getRequest()->isXmlHttpRequest());
    $idToUpdate = $this->getRequestParameter('divId');
    $imageId = $this->getRequestParameter('imageid');
    $type = $this->getRequestParameter('type');
    $myImage = ImagePeer::retrieveByPk($imageId);
    $myItem = $myImage->getItem();    
    // cannot remove anything unless session matches image
    $this->forward404Unless($myItem->getId() == $this->getUser()->getAttribute('editmode')); 

    $myImage = ImagePeer::retrieveByPk($imageId);
    $myImage->delete();              
  
    $json = array();
    $json['toHide'] = $idToUpdate;
    $this->getResponse()->setHttpHeader('Content-Type','application/json; charset=utf-8');
    return $this->renderText(json_encode($json));       
 }

 public function executeMailAdAjax(sfWebRequest $request)
  {  	   
    // Security check    
    $this->forward404Unless($this->getRequest()->isXmlHttpRequest());

    $sender_email = ltrim($this->getRequestParameter('sender_email'));
    $sender_name  = ltrim($this->getRequestParameter('sender_name'));
    $mail_body    = ltrim($this->getRequestParameter('mail_body'));
    $slug           = $this->getRequestParameter('id');

    $myItem = ItemPeer::retrieveBySlug($slug);
    $mailto = $myItem->getEmail();
    $error = false;

    // create response object
    $json = array();
    $json['error'] = array();

    if($sender_name == null)
      {
	$json['error']['sender_name'] = 'sender name missing!';
	$error = true;
      }
    if($mail_body == null || $mail_body == "")
      {
	$json['error']['mail_body'] = 'The body is missing!';
	$error = true;
      }

    try {
      MailHelper::checkCorrectMailAddress($sender_email);
    } catch (MalformedEmailException $ex) 
	{
	  $json['error']['sender_mail'] = 'The sender mail adress is missing or invalid';
	  $error = true;
	}

    if(!$error)
      {
	try 
	  {
	    MailHelper::sendMail($sender_email, $mailto, MailHelper::getRequestSubject($myItem->getTitle()), MailHelper::makeRequestBody($myItem->getTitle(),$sender_name, $sender_email, $mail_body, $slug) , MailHelper::getMailUser(), MailHelper::getMailPassword());
	  }
	catch(EmailTransferException $e)
	  {
	    $json['error']['send'] = 'There was an error sending the mail! ' . $e->getMessage();	    
	  }
      }

    $this->getResponse()->setHttpHeader('Content-Type','application/json; charset=utf-8');
    return $this->renderText(json_encode($json));          
  }

 public function executeMailFriendJson(sfWebRequest $request)
 {
   // Security check    
   $this->forward404Unless($this->getRequest()->isXmlHttpRequest());

   $mailto = $this->getRequestParameter('mailto');
   $from   = $this->getRequestParameter('friend');
   $id     = $this->getRequestParameter('id');
   // tip body
   $tipBody = MailHelper::makeTipBody($from, $id);    

   // create response object
   $json = array();
   $json['error'] = array();

   $isMailAddressError = false;
   $isFromMissing = false;
   $isMailSendError = false;
   
   if($from == null)
     {      
      $json['error']['from'] = 'From missing!';
      $isFromMissing = true;
   }
    
    try {
      MailHelper::checkCorrectMailAddress($mailto);
    } catch (MalformedEmailException $ex) 
	{	  
	  $json['error']['mail'] = 'Wrong email!';
	  $isMailAddressError = true;
	}
    
    if(!$isMailAddressError && !$isFromMissing)
      {
	try 
	  {
	    MailHelper::sendMail(MailHelper::getMailFrom(), $mailto, MailHelper::getTipSubject(), $tipBody, MailHelper::getMailUser(), MailHelper::getMailPassword());
	  }
	
	catch(EmailTransferException $e)
	  {
	    $json['error']['send'] = 'Error sending mail! ' . $e->getMessage() ;
	    $isMailSendError = true;
	  }
      }    

   $this->getResponse()->setHttpHeader('Content-Type','application/json; charset=utf-8');
   return $this->renderText(json_encode($json));

 }

 public function executeProlongItem(sfWebRequest $request)
 {
   // Security check    
    $this->forward404Unless($this->getRequest()->isXmlHttpRequest());
    $itemId = $this->getRequestParameter('item_id');
    $item = ItemPeer::retrieveByPk($itemId);
    $this->forward404Unless($item->getStatus()->getId() == Status::approved);

    $json = array();
    $json['error'] = array();
    try {
      $newDate = DateHelper::createValidUntilByDate($item->getValidUntil());
      $item->setValidUntil($newDate);
      $item->setNrOfExpirationReminders(null);
      $item->save();      
      $json['data'] = array();
      $json['data']['result'] = DateHelper::getFormattedDateSimple($item->getValidUntil());
    } catch (Exception $ex) {
      $json['error']['internal'] = 'Internal error';
    }
    $this->getResponse()->setHttpHeader('Content-Type','application/json; charset=utf-8');
    return $this->renderText(json_encode($json));
 }

 public function executeForgotPasswd(sfWebRequest $request)
  {  	   
    // Security check    
    $this->forward404Unless($this->getRequest()->isXmlHttpRequest());
    $slug = $this->getRequestParameter('slug');
    #get item
    $myItem = ItemPeer::retrieveBySlug($slug);    
    // create response object
    $json = array();
    $json['error'] = array();

    if(!$myItem)
      {
	$json['error']['generic'] = 'No item';
      }
    elseif ($myItem->getStatus() != null && $myItem->getStatus()->getId() == Status::deleted)
      {
	$json['error']['generic'] = 'Item is deleted';
      }
    else
      {
        #get mail address
	$mailto = $myItem->getEmail();
        #get password
	$passwd = $myItem->getPassword();
	$passwdBody = MailHelper::makePasswdBody($passwd, $myItem->getId());  
	# send the mail
	try 
	  {
	    MailHelper::sendMail(MailHelper::getMailFrom(), $mailto, MailHelper::getPasswdSubject(), $passwdBody, MailHelper::getMailUser(), MailHelper::getMailPassword());
	  }
	catch(EmailTransferException $e)
	  {
	    $json['error']['generic'] = 'Mail send error';
	  }
      }
    # return json array
    $this->getResponse()->setHttpHeader('Content-Type','application/json; charset=utf-8');
    return $this->renderText(json_encode($json));
  }

 public function executeDeleteImage(sfWebRequest $request)
  {  	   
    // Security check    
    $this->forward404Unless($this->getRequest()->isXmlHttpRequest());

    $imageId = $this->getRequestParameter('imageid');
    $idToUpdate = $this->getRequestParameter('divId');
    $myImage = ImagePeer::retrieveByPk($imageId);
    $myItem = $myImage->getItem();
    // Security Check, inspect status of the current Item 
    // can not delete for items already submitted (to avoid sabotage by manipulating the "id")    
    // Only delete if the status isn't already set, which means it's a brand new item in the making
    $myStatus = $myItem->getStatus(); 
    if($myStatus == null)
      $myImage->delete();
    
    $json = array();
    $json['toHide'] = $idToUpdate;
      $this->getResponse()->setHttpHeader('Content-Type','application/json; charset=utf-8');
    return $this->renderText(json_encode($json));                   
  }
  
}
