<?php

/**
 * service actions.
 *
 * @package    internetbazar
 * @subpackage service
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class serviceActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->culture = $this->getUser()->getCulture();
  }

  public function executeForbiddenWords(sfWebRequest $request)
  {    
    $wordlist = sfConfig::get('app_forbidden_str');    
    $this->wordlist = str_replace("|", ", ", $wordlist);
  }

  public function executeRules(sfWebRequest $request)
  {    
    
    $this->culture = $this->getUser()->getCulture();
  }

  public function executeFaq(sfWebRequest $request)
  {        
    $this->culture = $this->getUser()->getCulture();
  }

  public function executeProhibited_goods(sfWebRequest $request)
  {    
    
    $this->culture = $this->getUser()->getCulture();
  }
}
