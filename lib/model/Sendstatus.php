<?php

class Sendstatus extends BaseSendstatus
{
  public function __toString()
  {
    return (string) $this->description;
  }
}
