<?php

class SystemSettingPeer extends BaseSystemSettingPeer
{
  public static function getSystemSetting($key)
  {
    $c = new Criteria();
    $c->add(SystemSettingPeer::NAME, $key);
    return $c;
  }
}
