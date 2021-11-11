<?php

/**
 * start actions.
 *
 * @package    internetbazar
 * @subpackage start
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class startActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    // Reset the location every time user goes to the startpage
    // so that he can choose a new location 
    $this->getUser()->setAttribute('locationId', null);
    
    // 18n stuff
    if (!$request->getParameter('sf_culture'))
      {
	if ($this->getUser()->isFirstRequest())
	  {
	    $culture = $request->getPreferredCulture(array('ru', 'uk'));
	    $this->getUser()->setCulture($culture);
	    $this->getUser()->isFirstRequest(false);
	  }
	else
	  {
	    $culture = $this->getUser()->getCulture();
	  }
	
	$this->redirect('@localized_homepage');
      } 
  }
}
