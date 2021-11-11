<?php
/*
 * Mock request object
 * used for unit tests
 * @author: Johan Edlund
 */

class MyRequest
{

  private $params = array();

  public function __construct($xx)
    {
      $this->params = $xx;
    }

  public function getParameter($param)
  {
    return $this->params[$param];
  }
}

?>