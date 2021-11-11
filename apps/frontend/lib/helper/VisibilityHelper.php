<?php

function getVisibility($form)
{	
  $value = $form->getValue();
  $error = $form->renderError();
  if($error)
    return "";
  if($value == "" || !isset($value))
    return "none";	
  return "";
}

function getLinkVisibility($form)
{	
  $value = $form->getValue();
  $error = $form->renderError();
  if($error)
    return "";

  if($value == CustomerType::privat)
    return 'none';
  elseif($value == CustomerType::business)
    return '';

  return "none";
}

function getRegularVisibility($form)
{	
  $value = $form->getValue();
  $error = $form->renderError();
  if($error)
    return "";

  if($value == CustomerType::privat)
    return '';
  elseif($value == CustomerType::business)
    return 'none';

  return "";
}

function getBusinessVisibility($form)
{	
  $value = $form->getValue();
  $error = $form->renderError();
  if($error)
    return "";

  if($value == CustomerType::business)
    return '';
  elseif($value == CustomerType::privat)
    return 'none';
  
  return "none";
}

function getImageVisibility($imageSize)
{
  if($imageSize > 0)
    return "none";
  else
    return "";
}

function isImageVisible($params)
{
  $showImages = (isset($params['show_images'])) ? $params['show_images'] : null;
  
  if($showImages == null)
    return true;
  if($showImages == '')
    return true;
  if($showImages == 'true' || $showImages == true)
    return false;

  return false;
}
?>